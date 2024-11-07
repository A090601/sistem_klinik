<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tindakanMedis extends Model
{
    use HasFactory;

    protected $lable = 'tindakan_medis';
    protected $fillable = ['pendaftaran_id','nama_penyakit','nama_tindakan','nama_obat','hasil_periksa'];

    public function Pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'pendaftaran_id', 'id');
    }

    public function Dokter()
    {
        return $this->belongsTo(Dokter::class, 'pendaftaran_id', 'id');
    }

    public function Obat()
    {
        return $this->hasMany(Obat::class, 'tindakan_id', 'id');
    }
}
