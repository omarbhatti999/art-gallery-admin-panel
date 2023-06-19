<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArtImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'artId' => $this->art_id,
            'imagePath' => $this->image_path,
            'featuredImage' => $this->featured_image,
            'imageType' => $this->image_type,

        ];
    }
}
