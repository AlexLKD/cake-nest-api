<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray(Request $request): array
    {

        $total = $this->cupcakes->sum(function ($cupcake) {
            return $cupcake->pivot->total_price;
        });

        return [
            'id' => $this->id,
            'user' => UserResource::make($this->whenLoaded('user')),
            'user_id' => $this->user_id,
            'items' => $this->cupcakes->map(function ($cupcake) {
                // créer ressource pour prix et quantité
                return [
                    'id' => $cupcake->id,
                    'name' => $cupcake->name,
                    'quantity' => $cupcake->pivot->quantity,
                    'total_price' => $cupcake->pivot->total_price,
                ];
            }),
            'total' => sprintf('%0.2f', $total),
        ];
    }
}
