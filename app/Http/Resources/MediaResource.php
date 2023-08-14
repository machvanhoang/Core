<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MediaResource extends JsonResource
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
            'alt' => $this->alt,
            'caption' => $this->caption,
            'type' => $this->type,
            'extension' => $this->extension,
            'file_name' => $this->file_name,
            'sort' => $this->sort,
            'status' => $this->status,
            'url' => $this->url,
        ];
    }
}
