<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stokObat extends Model
{
    use HasFactory;

    protected $table = 'stok_obats';

    protected $fillable = [
        'supplier_id', 'nama_obat', 'jenis_obat', 'harga_beli', 'jumlah', 'satuan', 'total'
    ];


    public function Supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    public function Obat()
    {
        return $this->hasMany(Obat::class, 'nama_obat_id', 'id');
    }
}
