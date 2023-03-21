<?php

namespace App\Http\Resources;

use JsonSerializable;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;

class PhotoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
        return [
            'name' => $request->name,
            'thumbnail' => asset('storage/thumbnail_'.$this->name),
            'md' => asset('storage/md_'.$this->name),
            'lg' => asset('storage/lg_'.$this->name),
        ];
    }
}
