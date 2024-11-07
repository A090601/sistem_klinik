<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
    protected $lable = 'obats';
    protected $fillable = ['pendaftaran_id','nama_obat_id','dosis_obat','jumlah_obat'];

    public function Obat()
    {
        return $this->belongsTo(Obat::class, 'pendaftaran_id', 'id');
    }

    public function stokObat()
    {
        return $this->belongsTo(StokObat::class, 'nama_obat_id', 'id');
    }

    public function Pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'pendaftaran_id', 'id');
    }
}
