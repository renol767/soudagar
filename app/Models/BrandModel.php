<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    use HasFactory;

    protected $table = 'brand';
    public $timestamps = false;
    protected $fillable = [
        'nama_brand','logo_brand', 'deskripsi_brand'
    ];

}
