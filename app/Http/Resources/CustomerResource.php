<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'joinDate' => $this->register_date,
            'referalCode' => $this->referal_code,
            'plan' => $this->whenLoaded('plan', fn($plan) => PlanResource::make($plan)),
            'user' => $this->whenLoaded('user', fn($user) => UserResource::make($user))
        ];
    }
}
