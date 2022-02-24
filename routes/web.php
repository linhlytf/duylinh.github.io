<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});
Route::get('/b1b1', function () {
	return view('Buoi01.Bai1');
});
Route::get('/b2b1', function () {
	return view('Buoi01.Bai2');
});
Route::get('/b3b1', function () {
	return view('Buoi01.Bai3');
});
Route::get('/b4b1', function () {
	return view('Buoi01.Bai4');
});
Route::get('/b1b2', function () {
	return view('Buoi02.Bai01');
});
Route::get('/b2b2', function () {
	return view('Buoi01.Bai02');
});
Route::get('/b3', function () {
	return view('Buoi03.trangchu');
});

//shop
Route::get("/index","QuanLyBanHang@getIndex")->name("trangchu");
Route::get("/product-type/{type}","QuanLyBanHang@getProducType")->name("loaisanpham");
Route::get("/product-detail/{id}","QuanLyBanHang@getProducDetail")->name("chitietsanpham");
Route::get("/add-to-cart/{id}","QuanLyBanHang@getAddtoCart")->name("themgiohang");
Route::get("/del-cart/{id}","QuanLyBanHang@getDelItemCart")->name("xoagiohang");
Route::get("/check-out","QuanLyBanHang@getCheckout")->name("dathang");
Route::post("/check-out","QuanLyBanHang@postCheckout")->name("dathang");
Route::get('/thongbao', function () {return view('website.thongbao');});
Route::get("/register","QuanLyBanHang@getRegister")->name("dangky");
Route::post("/register","QuanLyBanHang@postRegister")->name("dangky");
Route::get("/login","QuanLyBanHang@getLogin")->name("dangnhap");
Route::post("/login","QuanLyBanHang@postLogin")->name("dangnhap");
Route::get("/logout","QuanLyBanHang@getLogout")->name("dangxuat");
Route::get("/search","QuanLyBanHang@getSearch")->name("timkiem");
Route::get("/contacts","QuanLyBanHang@getContacts")->name("lienhe");
Route::get("/about","QuanLyBanHang@getAbout")->name("gioithieu");
//admin
Route::get("/adminproducts","QuanLyBanHang@getAdminProducts")->name("quanlysanpham");
Route::get("/delproduct/{id}","QuanLyBanHang@getDeleteProduct")->name("xoasanpham");
Route::get("/addproduct","QuanLyBanHang@getAddProduct")->name("themsanpham");
Route::post("/addproduct","QuanLyBanHang@postAddProduct")->name("themsanpham");
Route::get("/editproduct/{id}","QuanLyBanHang@getEditProduct")->name("suasanpham");
Route::post("/editproduct/{id}","QuanLyBanHang@postEditProduct")->name("suasanpham");
Route::get("/admintype-products","QuanLyBanHang@getAdminTypeProducts")->name("quanlyloaisanpham");
Route::get("/addtypeproduct","QuanLyBanHang@getAddTypeProduct")->name("themloaisanpham");
Route::post("/addtypeproduct","QuanLyBanHang@postAddTypeProduct")->name("themloaisanpham");
Route::get("/edittypeproduct/{id}","QuanLyBanHang@getEditTypeProduct")->name("sualoaisanpham");
Route::post("/edittypeproduct/{id}","QuanLyBanHang@postEditTypeProduct")->name("sualoaisanpham");
Route::get("/deltypeproduct/{id}","QuanLyBanHang@getDeleteTypeProduct")->name("xoaloaisanpham");
Route::get("/admin","QuanLyBanHang@getAdmin")->name("quanlythanhvien");
Route::get("/edit/{id}","QuanLyBanHang@getEdit")->name("suathanhvien");
Route::post("/edit/{id}","QuanLyBanHang@postEdit")->name("suathanhvien");
Route::get("/adduser","QuanLyBanHang@getThem")->name("themthanhvien");
Route::post("/adduser","QuanLyBanHang@postThem")->name("themthanhvien");
Route::get("/del/{id}","QuanLyBanHang@getDelete")->name("xoathanhvien");
Route::get("/adminbill","QuanLyBanHang@getAdminBill")->name("quanlydonhang");
Route::get("/billdetail/{id}","QuanLyBanHang@getBillDetail")->name("chitietdonhang");
Route::get("/edituser/{id}","QuanLyBanHang@getEditUser")->name("doithongtin");
Route::post("/edituser/{id}","QuanLyBanHang@postEditUser")->name("doithongtin");