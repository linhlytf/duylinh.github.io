<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $table = "products";
    public function type_products()
    {
        return $this->belongsTo("App\\type_products", "id_type", "id");
    }
    public function bill_detail()
    {
        return $this->hasMany("App\bill_detail", "id_product", "id");
    }
    
}
