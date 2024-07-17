<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'description' => $this->description,
            'due_date' => (new Carbon($this->due_date))->format('Y-m-d'),
            'status' => $this->status,
            'img_path' => $this->img_path,
            'created_by' => $this->whenLoaded('creator', function () {
                return new UserResource($this->creator);
            }),
            'updated_by' => $this->whenLoaded('updater', function () {
                return new UserResource($this->updater);
            }),
            'created_at' => (new Carbon($this->created_at))->format('Y-m-d'),
         ];
    }
}
