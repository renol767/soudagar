<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    use HasFactory;

    protected $table = 'blog';

    protected $allowedFields = [
        'judul', 'slug', 'konten', 'status'
    ];
}