<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Activity;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $filter = $request->filter;
        $point = $this->points->sum('point');



        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'points' => $this->points_sum_point ?? 0,
            
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
