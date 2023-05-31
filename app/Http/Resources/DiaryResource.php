<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiaryResource extends JsonResource
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
            'calory_intake' => $this->calory_intake,
            'blood_sugar' => $this->blood_sugar,
            'blood_presure' => $this->blood_presure,
            'injury_img' => $this->injury_img,
            'injury_desc' => $this->injury_desc,
            'temperature' => $this->temperature,
            'last_visit' => $this->last_visit,
            'diary' => $this->diary,
            'user' =>  $this->whenLoaded('user'),
            'created_at' => date_format($this->created_at, "d-m-Y H:i:s"),
        ];
    }
}
