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
        // auth()->loginUsingId($this->id);
        // dd(auth()->user());
        return [
            'message' => $this->getMessage($request),
            'id' => $this->id,
            'name'=> $this->name,
            // 'email' => $this->email,
            'email' => $this->when(
                $this->resource->is(auth()->user()),
                $this->email
            ),
            'registered_at' => $this->created_at,
            'is_admin' => (bool) $this->is_admin,
            'orders' => OrderResource::collection($this->whenLoaded('orders')),
        ];
    }

    protected function getMessage(Request $request) {

        $routeMessageMap = collect([
            'users.store' => 'Create Successful',
            'users.update' => 'Update Successful',
            'users.index' => 'Show All Successful',
            'users.show' => 'Show User number ' . $this->id . ' Successful',
            'users.destroy' => 'Delete Successful',
        ]);

        return $routeMessageMap->get($request->route()->getName(), null);
    }
}
