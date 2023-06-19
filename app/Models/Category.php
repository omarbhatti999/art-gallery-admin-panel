<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name','slug', 'description', 'seo_title', 'seo_meta', 'seo_image', 'icon_image', 'sort_number', 'active',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function arts()
    {
        return $this->hasMany(Art::class);
    }
}
