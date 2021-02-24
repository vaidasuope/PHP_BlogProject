<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Blog extends JsonResource
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
            'id'=>$this->id,
            'title'=>$this->title,
            'body'=>$this->body,
            'category'=>$this->category,
            'created_at'=>(string)$this->created_at,
            'update_at'=>(string)$this->updated_at,
            'user'=>$this->user,
            'comments'=>$this->comments
        ];
    }
}
