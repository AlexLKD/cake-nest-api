<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        // auth()->loginUsingId($this->id);
        // dd(auth()->user());
        return [
            'id' => $this->id,
            'name'=> $this->name,
            // 'email' => $this->email,
            'email' => $this->when(
                $this->resource->is(auth()->user()),
                $this->email
            ),
            'registered_at' => $this->created_at,
            'orders' => OrderResource::collection($this->whenLoaded('orders')),
        ];
    }
}
