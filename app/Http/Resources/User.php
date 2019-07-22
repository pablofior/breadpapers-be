<?php

namespace App\Http\Resources;

use App\Repositories\BreadpaperRepository;
use App\Repositories\Criterias\IsOwner;
use Illuminate\Http\Resources\Json\JsonResource;

class   User extends JsonResource
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
            'email' => $this->email,
            'created_at' => formatDate('Y-m-d H:i:s', $this->created_at, 'd/m/Y H:i:s'),
            'updated_at' => formatDate('Y-m-d H:i:s', $this->updated_at, 'd/m/Y H:i:s'),
            'owned_breadpapers' => new BreadpaperCollection($this->ownedBreadpapers),
            'collaborating' => new BreadpaperCollection($this->breadpapers),
        ];
    }
}
