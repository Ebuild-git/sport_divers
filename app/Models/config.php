<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class config extends Model
{
    use HasFactory;
    protected $table = 'configs';

    protected $fillable = [
        'logo',
        'logoHeader',
        'telephone',
        'addresse',
        'email',
        'description',
        'frais',
        'icon',
        'logocontact',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
        'linkedin',
        'tiktok',
        'fax',
        'twitter',
        'adherent',
        'coach',
        'seance',
        'tounoir',
        'des_apropos',
        'photos',
        'image_apropos',
        'titre_apropos',
        
    ];
}
