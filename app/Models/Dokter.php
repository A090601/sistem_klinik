<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;


    protected $lable = 'dokters';
    protected $fillable = ['no_izin', 'nama', 'jenis_kelamin', 'npwp', 'tempat_lahir', 'tanggal_lahir', 'spesialisasi', 'email', 'no_hp', 'alamat', 'tanggal_masuk', 'status', 'image'];


    public function Pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'dokter_id', 'id');
    }

    public function tindakanMedis()
    {
        return $this->hasMany(tindakanMedis::class, 'pendaftaran_id', 'id');
    }
}
