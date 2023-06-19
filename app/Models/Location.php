<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country',
        'address',
        'city',
        'state',
        'zip_code',
        'seo_title',
        'seo_meta',
        'seo_keywords',
        'seo_image',
        'thumbnail',
        'status',
    ];
}
