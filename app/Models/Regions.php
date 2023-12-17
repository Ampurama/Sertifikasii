<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regions extends Model
{
    use HasFactory;
    protected $table = 'regions'; // Nama tabel di database

    protected $fillable = [
        'name', 'province_id', // dan kolom lain yang Anda ingin gunakan
    ];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
}
