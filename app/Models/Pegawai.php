<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $lable = 'pegawais';
    protected $fillable = ['nip','nama','jenis_kelamin','npwp','tempat_lahir','tanggal_lahir','jabatan','email','no_hp','alamat','tanggal_masuk','status','image'];
}
