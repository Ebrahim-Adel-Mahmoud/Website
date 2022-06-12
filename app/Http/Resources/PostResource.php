<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'id'=>$this->id,
            'image'=>asset($this->image),
            'created'=>$this->created_at->format('Y-M-d') ,
            'title'=>$this->title,
            'content'=>$this->content,
            'smallDesc'=>$this->smallDesc,
            'blog'=>$this->smallDesc .$this->content,
            'writer'=>$this->whenLoaded('user'),
            'Category'=>CategoryResource::make($this->whenLoaded('category')),
        ];
    }
}
