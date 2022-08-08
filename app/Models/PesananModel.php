<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananModel extends Model
{
    use HasFactory;

    protected $table = 'pesanan';
    protected $fillable = [
        'id_brand', 'id_produk',
        'id_user', 'kuantitas',
        'status', 'tanggal_pengambilan',
        'created_at', 'update_at', 'jumlah_harga'
    ];
}
