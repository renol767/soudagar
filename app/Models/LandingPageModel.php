<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPageModel extends Model
{
    use HasFactory;
    protected $table            = 'kontenweb';
    public $timestamps          = false;

    protected $allowedFields = [
        'showcase1', 'deskripsi_showcase1', 'img_showcase1',
        'showcase2', 'deskripsi_showcase2', 'img_fadeInLeft_Showcase2',
        'img_fadeInUp_Showcase2','img_fadeInUp_Showcase3',
        'showcase3', 'deskripsi_showcase3', 'img_fadeInLeft_Showcase3',
        'tagline_produkdanbrand', 'tagline_benefit', 'deskripsi_benefit',
        'img_benefit', 'tagline_keunggulan', 'deskripsi_keunggulan',
        'img_keunggulan', 'poin_keunggulan', 'deskripsi_poin_keunggulan',
        'poin_benefit', 'deskripsi_poin_benefit', 'facebook', 'instagram',
        'youtube', 'telegram', 'whatsapp', 'alamat'
    
    ];
}
