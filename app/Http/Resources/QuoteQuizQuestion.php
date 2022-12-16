<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read \App\Models\Quote $resource
 */
class QuoteQuizQuestion extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'content' => $this->resource->content,
            'said_by' => $this->resource->said_by,
        ];
    }
}
