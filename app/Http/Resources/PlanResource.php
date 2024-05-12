<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
          'id' => $this->id,
          'name' => $this->name,
          'price' => $this->price,
          'maxProducts' => $this->max_products,
          'maxUsers' => $this->max_users,
          'maxInvoice' => $this->max_invoice
        ];
    }
}
