<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FoodResource extends JsonResource
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
            'food_name' => $this->food_name,
            'calories' => $this->calories,
            'glucose' => $this->glucose,
            'fat' => $this->fat,
            'cholesterol' => $this->cholesterol,
            'protein' => $this->protein,
            'carbohydrate' => $this->carbohydrate,
            'user' =>  $this->whenLoaded('user'),
            'created_at' => date_format($this->created_at, "d-m-Y H:i:s"),
        ];
    }
}
