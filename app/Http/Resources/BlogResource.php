<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
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
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'excerpt' => $this->excerpt,
            'author_name' => $this->author_name,
            'designer_name' => $this->designer_name,
            'category' => $this->category->title,
            'image' => $this->image,
        ];
    }
}
