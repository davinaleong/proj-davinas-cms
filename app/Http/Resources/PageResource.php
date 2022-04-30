<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PageResource extends JsonResource
{
    public $preserveKeys = true;

    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'text' => $this->text,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
        ];
    }
}
