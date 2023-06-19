<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'long_description',
        'instagram',
        'facebook',
        'youtube',
        'twitter',
        'tiktok',
        'active',
        'sort_number',
        'image',
        'seo_title',
        'seo_meta',
        'seo_image',
        'seo_keywords',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
