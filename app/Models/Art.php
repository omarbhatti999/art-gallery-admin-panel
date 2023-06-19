<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Art extends Model
{
protected $table = 'arts';

    protected $fillable = [
        'title',
        'slider_caption',
        'short_description',
        'long_description',
        'year',
        'materials',
        'size',
        'edition',
        'category_id',
        'series',
        'artist_id',
        'location',
        'availability',
        'featured',
        'sort_number',
        'active',
        'hidden',
        'banner_image',
        'thumb_image',
        'seo_image',
        'seo_keywords',
        'seo_title',
        'seo_meta',
        'price',
        'stock',
    ];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function artImages()
    {
        return $this->hasMany(ArtImage::class);
    }
    public function artImage()
    {
    return $this->hasOne(ArtImage::class);
    }
}
