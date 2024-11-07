<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $lable = 'suppliers';
    protected $fillable = ['nama','email','alamat','no_telp'];


    public function stokObat()
    {
        return $this->hasMany(stokObat::class, 'supplier_id', 'id');

    }
}
