<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regions extends Model
{
    use HasFactory;
    protected $table = 'regions'; 

    protected $fillable = [
        'name', 'province_id', 
    ];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }
}
