<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukModel extends Model
{
    use HasFactory;

    protected $table        = 'brand';
    public $timestamps      = false;
    protected $allowedFields = [
        'nama_produk','foto_produk', 'deskripsi_produk',
        'stok_produk', 'harga_reseller', 'harga_jual',
        'id_brand'
    ];
}
