<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
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
            'user' => new UserResource($this->user),
            'title' => $this->title,
            'slug' => $this->slug,
            'studio' => $this->studio,
            'runtime' => $this->runtime,
            'description' => $this->description,
            'genre' => ucfirst($this->genre),
            'release_date' => $this->release_date->format('Y-m-d'),
            'release_year' => $this->release_year,
            'review_count' => $this->reviews_count,
            'avg_rating' => number_format($this->reviews_avg_rating, 1),
            'reviews' => ReviewResource::collection($this->whenLoaded('reviews')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
