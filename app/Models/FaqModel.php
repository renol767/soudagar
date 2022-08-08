<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqModel extends Model
{
    use HasFactory;

    protected $table = 'faq';
    public $timestamps      = false;

    protected $fillable = [
        'slug', 'deskripsi'
    ];
}
