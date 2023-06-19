<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArtResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'shortDescription' => $this->short_desctiption,
            'longDescription'=> $this->long_description,
            'sliderCaption' => $this->slider_caption,
            'featuredImage'=> $this->featured_image,
            'year' => $this->year,
            'materials' => $this->materials,
            'size' => $this->size,
            'edition' => $this->edition,
            'location' => $this->location,
            'sortNumber' => $this->sort_number,
            'bannerImage' => $this->banner_image,
            'thumbImage' => $this->thumb_image,
            'seoImage' => $this->seo_image,
            'seoKeywords' => $this->seo_keywords,
            'seoTitle' => $this->seo_title,
            'seoMeta' => $this->seo_meta,
            'price' => $this->price,
            'stock' => $this->stock,

            'category' => new CategoryResource($this->whenLoaded('category')),
            'artImages' => ArtImageResource::collection($this->whenLoaded('artImages'))
        ];
    }
}
