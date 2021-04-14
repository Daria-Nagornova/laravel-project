<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'title' => $this->title,
            'content' => $this->content,
            'created_at' => Carbon::parse($this->created_at)->format('d.m.Y'),
            'subcategory_name' => $this->subcategory->name,
            'category_name' => $this->category->name,
            'category_id' => $this->category->id,
            'user_name' => $this->user->name,
            'image' => $this->image->path
        ];
    }
}
