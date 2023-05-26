<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventShowResource extends JsonResource
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
            'instructor' => $this->instructor,
            'thumbnail' => $this->thumbnail,
            'event_category_id' => $this->event_category->title,
            'status' => $this->status,
            'start_date' => $this->start_date->format('d M Y'),
            'end_date' => $this->end_date->format('d M Y'),
            'start_time' => $this->start_time->format('h:ia'),
            'end_time' => $this->end_time->format('h:ia'),
            'created_at' => $this->created_at->format('d M Y'),
            'updated_at' => $this->updated_at->format('d M Y'),
        ];
    }
}
