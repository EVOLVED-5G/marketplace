<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NetappResource extends JsonResource
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
            'name' => $this->name,
            'about' => $this->about,
            'version' => $this->version,
            'user' => new UserResource($this->whenLoaded('user')),
            'logo' => $this->logo,
            'business_name' => $this->business_name,
            'created_at' => $this->created_at->format('j F Y'),
            'visible' => $this->visible
        ];
    }
}
