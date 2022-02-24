<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    protected $table = "customer";
    public function bills()
    {
        return $this->hasMany("App\bills","id_customer", "id");
    }
}
