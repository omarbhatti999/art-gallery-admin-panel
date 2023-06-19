<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Blog extends Model
{
    protected $fillable = [
        'title',
        'short_description',
        'long_description',
        'type',
        'active',
        'seo_title',
        'seo_meta_description',
        'seo_image',
        'thumbnail_image',
        'banner_image',
    ];
}
