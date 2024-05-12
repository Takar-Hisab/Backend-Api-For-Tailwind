<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VendorResource extends JsonResource
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
              'user_id' => $this->user_id,
              'join_date' => $this->register_date,
              'referal_code' => $this->referal_code,
              'customers' => $this->whenLoaded('customers', fn($customes) => CustomerResource::collection($customes))
        ];
    }
}
