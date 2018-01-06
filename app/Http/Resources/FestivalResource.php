<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class FestivalResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'date' => $this->date,
            'province' => $this->province,
            'location' => $this->location,
            'artists' => ArtistResource::collection($this->whenLoaded('artists')),
            'confirmed' => $this->whenPivotLoaded('artist_festival', function () {
                return $this->pivot->confirmed;
            }),
            'genres' => GenreResource::collection($this->whenLoaded('genres')),
            'photos' => PhotoResource::collection($this->whenLoaded('photos')),
            'posts' => PostResource::collection($this->whenLoaded('posts'))
        ];
    }
}
