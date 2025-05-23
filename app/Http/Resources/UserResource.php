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
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'avatar_url' => $this->avatar ? asset('storage/' . $this->avatar) : null,
            'role' => [
                'id' => $this->role->id ?? null,
                'name' => $this->role->name ?? null,
                'slug' => $this->role->slug ?? null,
            ],
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
