<?php

namespace App\Http\Resources\User;

use App\Http\Resources\RoleResource;
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
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'has_subscription' => $this->hasSubscription(),
            'roles' => RoleResource::collection($this->whenLoaded('roles')),
            'permissions' => $this->getPermissions()
        ];
    }
}
