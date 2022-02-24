<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bill_detail extends Model
{
    use HasFactory;
    protected $table = "bill_detail";
    public function bills()
    {
        return $this->belongsTo("App\bills", "id_bill", "id");
    }
    public function products()
    {
        return $this->belongsTo("App\products", "id_product", "id");
    }
}