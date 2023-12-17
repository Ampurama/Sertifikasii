<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'namaLengkap', 'alamatktp', 'alamat', 'provinsi', 'kabupaten', 'kecamatan', 'nomortlp', 'nomorhp', 'email', 'kewarganegaraan', 'asalWNA', 'tanggallahir', 'tempatlahir', 'jk', 'statusMenikah', 'agama'];

}
