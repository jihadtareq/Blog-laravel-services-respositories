<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id'=>$this->id,
            'fullName'=> $this->first_name.' '.$this->last_name,
            'userName'=> $this->user_name,
            'birthday'=> $this->birthday,
            'gender'=> $this->gender,
            'phone'=> $this->phone,
            'email'=> $this->email,
            'bio'=> $this->bio,
            'picture'=> url('/images').'/'.$this->picture,
            'createdAt'=> $this->created_at,
            'updatedAt'=> $this->updated_at,
            'accessToken'=> $this->accessToken,
            'isDeactivate'=> $this->is_deactivate,
        ];
    }
}
