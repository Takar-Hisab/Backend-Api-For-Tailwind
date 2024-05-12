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
          'phone' => $this->phone,
          'type' => $this->type,
          'avatar' => loadAvatar($this->name),
          'vendor' => $this->whenLoaded('vendor', fn($vendor) => VendorResource::make($vendor)),
          'customer' => $this->whenLoaded('customer', fn($customer) => CustomerResource::make($customer))
        ];
    }
}
