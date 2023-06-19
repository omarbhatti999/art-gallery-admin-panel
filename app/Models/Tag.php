<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name',
        'description',
        'seo_title',
        'seo_meta',
        'seo_keywords',
        'seo_image',
        'thumbnail',
        'status',
    ];

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';

    // Define relationships here if needed

    // Additional methods or customizations can be added below

    public function isActive()
    {
        return $this->status === self::STATUS_ACTIVE;
    }
}
