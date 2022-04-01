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
        $resource = [
            'name' => $this->name,
            'email' => $this->email,
            'netapps' => new NetappResource($this->whenLoaded('netapps')),
            'purchasedNetapp' => new PurchasedNetappResource($this->whenLoaded('purchasedNetapp'))
        ];
        if ($this->netapps_count) {
            $resource['netapps_count'] = $this->netapps_count;
        }
        if ($this->purchased_netapp_count) {
            $resource['purchased_netapp_count'] = $this->purchased_netapp_count;
        }
        return $resource;
    }
}
