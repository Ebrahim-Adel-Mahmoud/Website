<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'logo' =>asset($this->logo),
            'favicon'=>asset($this->favicon),
            'website-title' =>$this->title,
            'created'=>$this->created_at->format('Y-M-d'),
            'facebook'=>$this->facebook,
            'instagram'=>$this->instagram,
            'phone'=>$this->phone,
            'email'=>$this->email,
            'content'=>$this->content ,
            'address'=>$this->address,
        ];
    }
}
