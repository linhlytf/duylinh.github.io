<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\slide;
use App\Models\products;
use App\Models\type_products;
use Session;
use App\Http\Controllers\Cart;
use App\Models\customer;
use App\Models\bills;
use App\Models\bill_detail;
use App\Models\users;
use Hash;
use Auth;
use App\Http\Requests;
use App\Http\Requests\SanphamAddRequest;
use Input,File;

class QuanlyBanHang extends Controller
{
    public function getIndex()
    {
        $sl_image = slide::all();
        $new_products=products::where("new",1)->paginate(4);
        $pro_products=products::where("promotion_price","!=",1)->paginate(4);
        return view("website.trangchu", compact("sl_image","new_products","pro_products"));
    }
    public function getProducType($type)
    {
        $sp_theoloai=products::where("id_type","=",$type)->get();
        $tenloai=type_products::where("id","=",$type)->get();
        $sp_khac=products::where("promotion_price","!=",0)->paginate(6);
        $loai_sp=type_products::All();
        return view("website.loai_sanpham", compact("sp_theoloai","tenloai","sp_khac","loai_sp"));
    }
    public function getProducDetail($id)
    {
        $chitietsp=products::where("id",$id)->first();
        $sp_tuongtu=products::where("id_type",$chitietsp->id_type)->get();
        $sp_moi=products::where("new",1)->get();
        $sp_banchay=products::where("best",1)->get();
        return view("website.chitiet_sanpham",compact("chitietsp","sp_tuongtu","sp_moi","sp_banchay"));
    }
    public function getContacts()
    {
        return view("website.lienhe");
    }
    public function getAbout()
    {
        return view("website.gioithieu");
    }
    public function getDelItemCart($id)
    {
        $oldcart=Session('cart')?Session::get('cart'):null;
        $cart=new Cart($oldcart);
        $cart->reduceByOne($id);
        if(count($cart->items)>0)
        {
            Session::put('cart',$cart);
        }
        else
        {
            Session::forget('cart');
        }
        return redirect()->back();
    }
    public function getAddtoCart(Request $req, $id)
    {
        $products=products::find($id);
        $oldcart=Session('cart')?Session::get('cart'):null;
        $cart=new Cart($oldcart);
        $cart->add($products,$id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }
    public function getCheckout(){
        if(session::has('cart'))
        {
            return view("website.dathang");
        }

    }
    public function postCheckout(Request $req){
        $cart = Session::get('cart');

        $cus = new customer;
        $cus->name = $req->name;
        $cus->gender = $req->gender;
        $cus->email = $req->email;
        $cus->address = $req->address;
        $cus->phone_number = $req->phone_number;
        $cus->note= $req->note;
        $cus->save();

        $bill= new bills;
        $bill->id_customer = $cus->id;
        $bill->date_order = date('Y-m-d');
        $bill ->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->note;
        $bill->save();

        foreach($cart->items as $key => $value){
            $bd = new bill_detail;
            $bd -> id_bill = $bill->id;
            $bd ->id_product= $key;
            $bd->quantity = $value['qty'];
            $bd->unit_price = ($value['price']/$value['qty']);
            $bd->save();
        }
        Session::forget('cart');
        return view("website.thongbao");
    }

    public function getRegister(){
        return view("website.dangky");
    }

    public function postRegister(Request $rq){
        $rq->validate(
        ['email'=>'required|email|unique:users',
        'password'=>'required|min:6|max:24',
        're_password'=>'required|same:password',
        'address'=>'required',
        'fullname'=>'required'
        ],
        ['email.required'=>'Chưa nhập địa chỉ email',
        'email.email'=>'Địa chỉ email không đúng định dạng',
        'email.unique'=>'Địa chỉ email này đã có người đăng ký',
        'password.required'=>'Chưa nhập mật khẩu',
        'password.min'=>'Mật khẩu tối thiểu 6 ký tự',
        'password.max'=>'Mật khẩu tối đa 24 ký tự',
        're_password.same'=>'Mật khẩu nhập lại không giống',
        're_password.required'=>'Chưa nhập lại mật khẩu',
        'address.required'=>'Chưa nhập địa chỉ',
        'fullname.required'=>'Chưa nhập họ và tên'
        ]);
        $user=new users;
        $user->full_name=$rq->fullname;
        $user->email=$rq->email;
        $user->password=Hash::make($rq->password);
        $user->phone=$rq->phone;
        $user->address=$rq->address;
        $user->save();
        return redirect()->back()->with("thongbao","Đăng ký thành công!");       
    }
    public function getLogin(){
        return view("website.dangnhap");
    }

    public function postLogin(Request $req){
        $req->validate(
        ['email'=>'required|email',
        'password'=>'required|min:6|max:24'
        ],
        ['email.required'=>'Chưa nhập địa chỉ email',
        'email.email'=>'Địa chỉ email không đúng định dạng',
        'password.required'=>'Chưa nhập mật khẩu',
        'password.min'=>'Mật khẩu tối thiểu 6 ký tự',
        'password.max'=>'Mật khẩu tối đa 24 ký tự'
        ]);
        $chungthuc=array('email'=>$req->email,'password'=>$req->password);
        if(Auth::attempt($chungthuc))
        {
            return redirect()->back()->with(['matb'=>'1','noidung'=>'Đăng nhập thành công!']);
        }
        else
        {
            return redirect()->back()->with(['matb'=>'0','noidung'=>'Đăng nhập thất bại!']);
        }    
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->route("trangchu");
    }

    public function getSearch(Request $req){
        $pro_products=products::where("promotion_price","!=",1)->paginate(8);
        if($req->key=="Khuyến mãi")
            $product =products::where("promotion_price",">",0)->get();
        else if($req->key=="không khuyến mãi")
            $product =products::where("promotion_price",0)->get();
        else
            $product = products::where('name','like','%'.$req->key.'%')
                                ->orwhere('unit_price',$req->key)
                                ->orwhere('promotion_price',$req->key)
                                ->get();
        return view("website.timkiem",compact("product","pro_products"));
    }

    public function getAdminProducts(){
        if(Auth::check())
        {
            if (Auth::user()->user_type==1) 
            {
                $soluong=type_products::All();
                $products=products::paginate(8);
                return view("admin.quanlysanpham",compact("products","soluong"));
            }
            else
            {
                return redirect()->route("trangchu");
            }
        }   
        else
        {
            return view("website.dangnhap");
        }
    }

    public function getDeleteProduct($id){
        $sanpham = products::where("id",$id)->first();
        $img = base_path().'/public/source/image/product/'.$sanpham->image;
        File::delete($img);
        products::where("id",$id)->delete();
        return redirect()->back()->with("thongbao","Xóa sản phẩm thành công!");
    }

    public function getAddProduct(){
        $cates = type_products::get();
        foreach ($cates as $key => $val) {
            $cate[] = ['id' => $val->id, 'name'=> $val->name];
        }
        return view("admin.themsanpham",compact('cate'));
    }

    public function postAddProduct(Request $req)
    {
        $req->validate(
        ['name'             => 'required|unique:products',
        'id_type'           => 'required',
        'new'               => 'required',
        'best'              => 'required',
        'unit_price'        => 'required',
        'promotion_price'   => 'required',
        'description'       => 'required',
        'unit'              => 'required',
        'image'             => 'required|mimes:jpeg,jpg,png|max:4000'
        ],
        ['required'         => 'Vui lòng không để trống dữ liệu này!',
        'unique'            => 'Dữ liệu này đã tồn tại!',    
        'mimes'             => 'Vui lòng chọn đúng file ảnh',
        'max'               => 'Vui lòng chọn file ảnh có kích thước không quá 2MB'
        ]);
        $filename=$req->file('image')->getClientOriginalName();
        $req->file('image')->move(
            base_path() . '/public/source/image/product/', $filename
        );
        $sanpham                    = new products;
        $sanpham->name              = $req->name;
        $sanpham->description       = $req->description;
        $sanpham->new               = $req->new ;
        $sanpham->best              = $req->best;
        $sanpham->unit_price        = $req->unit_price;
        $sanpham->promotion_price   = $req->promotion_price;
        $sanpham->image             = $filename;
        $sanpham->id_type           = $req->id_type;
        $sanpham->unit              = $req->unit;
        $sanpham->save();
        return redirect()->route('quanlysanpham')->with("thongbao","Thêm sản phẩm thành công!");
    }

    public function getEditProduct($id)
    {
        
        $cates = type_products::get();
        foreach ($cates as $key => $val) {
            $cate[] = ['id' => $val->id, 'name'=> $val->name];
        }
        $sanpham = products::where('id',$id)->first();
       
        return view('admin.suasanpham',compact('cate','sanpham'));
    }

    public function postEditProduct($id, Request $req)
    {
        $req->validate(
        ['name'             => 'required',
        'id_type'           => 'required',
        'new'               => 'required',
        'best'              => 'required',
        'unit_price'        => 'required',
        'promotion_price'   => 'required',
        'unit'              => 'required',
        'image'             => 'mimes:jpeg,jpg,png|max:4000'
        ],
        ['required'         => 'Vui lòng không để trống dữ liệu này!',  
        'mimes'             => 'Vui lòng chọn đúng file ảnh',
        'max'               => 'Vui lòng chọn file ảnh có kích thước không quá 2MB'
        ]);
        $sanpham                    = products::find($id);
        $sanpham->name              = $req->input('name');
        $sanpham->description       = $req->input('description');
        $sanpham->new               = $req->input('new');
        $sanpham->best              = $req->input('best');
        $sanpham->unit_price        = $req->input('unit_price');
        $sanpham->promotion_price   = $req->input('promotion_price');
        $sanpham->id_type           = $req->input('id_type');
        $sanpham->unit              = $req->input('unit');
        $img_old = 'public/source/image/product/'.$req->input('oldimage');
        if (!empty($req->file('image'))) {
             $filename=$req->file('image')->getClientOriginalName();
             $req->file('image')->move(
            base_path() . '/public/source/image/product/', $filename
        );
             $sanpham->image = $filename;
             File::delete($img_old);
        } else {
            echo "File empty";
        }
        $sanpham->save();
        return redirect()->route('quanlysanpham')->with("thongbao","Cập nhật sản phẩm thành công!");
    }
    public function getAdminTypeProducts(){
        if(Auth::check())
        {
            if (Auth::user()->user_type==1) 
            {
                $soluong=type_products::All();
                $type_products=type_products::paginate(5);
                return view("admin.quanlyloaisanpham",compact("type_products","soluong"));
            }
            else
            {
                return redirect()->route("trangchu");
            }
        }   
        else
        {
            return view("website.dangnhap");
        }
    }

    public function getAddTypeProduct(){
        return view("admin.themloaisanpham");
    }

    public function postAddTypeProduct(Request $req)
    {
        $req->validate(
        ['name'             => 'required|unique:type_products',
        ],
        ['required'         => 'Vui lòng không để trống dữ liệu này!',
        'unique'            => 'Dữ liệu này đã tồn tại!'   
        ]);
        $loaisanpham                    = new type_products;
        $loaisanpham->name              = $req->name;
        $loaisanpham->description       = $req->description;
        $loaisanpham->save();
        return redirect()->route('quanlyloaisanpham')->with("thongbao","Thêm loại sản phẩm thành công!");
    }

    public function getEditTypeProduct($id)
    {
        $loaisanpham = type_products::where('id',$id)->first();
        return view('admin.sualoaisanpham',compact('loaisanpham'));
    }

    public function postEditTypeProduct($id, Request $req)
    {
        $req->validate(
        ['name'             => 'required'
        ],
        ['required'         => 'Vui lòng không để trống dữ liệu này!'
        ]);
        $loaisanpham                    = type_products::find($id);
        $loaisanpham->name              = $req->input('name');
        $loaisanpham->description       = $req->input('description');
        $loaisanpham->save();
        return redirect()->route('quanlyloaisanpham')->with("thongbao","Cập nhật loại sản phẩm thành công!");
    }

    public function getDeleteTypeProduct($id){
        type_products::where("id",$id)->delete();
        return redirect()->back()->with("thongbao","Xóa loại sản phẩm thành công!");
    }

    public function getAdmin(){
        if(Auth::check())
        {
            if (Auth::user()->user_type==1) 
            {
                $soluong=users::All();
                $users=users::paginate(8);
                return view("admin.quanlythanhvien",compact("users","soluong"));
            }
            else
            {
                return redirect()->route("trangchu");
            }
        }   
        else
        {
            return view("website.dangnhap");
        }
    }

    public function getEdit($id)
    {
        
        
        $thanhvien = users::where('id',$id)->first();
       
        return view('admin.suathanhvien',compact('thanhvien'));
    }

    public function postEdit($id, Request $req)
    {
        $req->validate(
        ['full_name'        => 'required',
        'email'             => 'required',
        'address'              => 'required',
        'phone'        => 'required'
        ],
        ['required'         => 'Vui lòng không để trống dữ liệu này!'
        ]);
        $thanhvien                    = users::find($id);
        $thanhvien->full_name         = $req->input('full_name');
        $thanhvien->address           = $req->input('address');
        $thanhvien->phone             = $req->input('phone');
        $thanhvien->email             = $req->input('email');
        $thanhvien->user_type         = $req->input('user_type');
        $thanhvien->save();
        return redirect()->route('quanlythanhvien')->with("thongbao","Cập nhật thành viên thành công!");
    }
    public function getDelete($id){
        users::where("id",$id)->delete();
        return redirect()->back()->with("thongbao","Xóa thành viên thành công!");
    }

    public function getAdminBill(){
        if(Auth::check())
        {
            if (Auth::user()->user_type==1) 
            {
                $soluong=bills::All();
                $bills=bills::paginate(8);
                return view("admin.quanlydonhang",compact("bills","soluong"));
            }
            else
            {
                return redirect()->route("trangchu");
            }
        }   
        else
        {
            return view("website.dangnhap");
        }
    }

    public function getBillDetail($id)
    {
        return view('admin.quanlydonhang');
    }

    public function getEditUser($id)
    {
        
        
        $thanhvien = users::where('id',$id)->first();
       
        return view('admin.suathanhvien',compact('thanhvien'));
    }

    public function postEditUser($id, Request $req)
    {
        $req->validate(
        ['full_name'        => 'required',
        'address'           => 'required',
        'phone'             => 'required'
        ],
        ['required'         => 'Vui lòng không để trống dữ liệu này!'
        ]);
        $thanhvien                    = users::find($id);
        $thanhvien->full_name         = $req->input('full_name');
        $thanhvien->address           = $req->input('address');
        $thanhvien->phone             = $req->input('phone');
        $thanhvien->save();
        return redirect()->route('quanlythanhvien')->with("thongbao","Cập nhật thành viên thành công!");
    }

    public function getThem(){
        return view("admin.themthanhvien");
    }

    public function postThem(Request $rq){
        $rq->validate(
        ['email'=>'required|email|unique:users',
        'password'=>'required|min:6|max:24',
        're_password'=>'required|same:password',
        'address'=>'required',
        'fullname'=>'required'
        ],
        ['email.required'=>'Chưa nhập địa chỉ email',
        'email.email'=>'Địa chỉ email không đúng định dạng',
        'email.unique'=>'Địa chỉ email này đã có người đăng ký',
        'password.required'=>'Chưa nhập mật khẩu',
        'password.min'=>'Mật khẩu tối thiểu 6 ký tự',
        'password.max'=>'Mật khẩu tối đa 24 ký tự',
        're_password.same'=>'Mật khẩu nhập lại không giống',
        're_password.required'=>'Chưa nhập lại mật khẩu',
        'address.required'=>'Chưa nhập địa chỉ',
        'fullname.required'=>'Chưa nhập họ và tên'
        ]);
        $user=new users;
        $user->full_name=$rq->fullname;
        $user->email=$rq->email;
        $user->password=Hash::make($rq->password);
        $user->phone=$rq->phone;
        $user->address=$rq->address;
        $user->save();
        return redirect()->back()->with("thongbao","Thêm thành viên thành công!");       
    }
}
