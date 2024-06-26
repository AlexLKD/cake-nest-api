<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CupcakeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'message' => $this->getMessage($request),
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'quantity' => $this->quantity,
            'price' => $this->price,
        ];
    }

    protected function getMessage(Request $request) {

        $routeMessageMap = collect([
            'cupcakes.store' => 'Create Successful',
            'cupcakes.update' => 'Update Successful',
            'cupcakes.index' => 'Show every cupcake Successful',
            'cupcakes.show' => 'Show cupcake number ' . $this->id . ' Successful',
            'cupcakes.destroy' => 'Delete Successful',
        ]);

        return $routeMessageMap->get($request->route()->getName(), null);
    }
}
