<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bills extends Model
{
    use HasFactory;
    protected $table = "bills";
    public function customer()
    {
        return $this->belongsTo("App\customer", "id_customer", "id");
    }
    public function bill_detail(){
        return $this->hasMany("App\bill_detail", "id_bill", "id");
    }
}
