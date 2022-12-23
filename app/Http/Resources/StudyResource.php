<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class StudyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $today = Carbon::today();
        $this->created_at = Carbon::parse($this->created_at);
        return [
            'title' => $this->title,
            'category' => $this->language,
            'user' => $this->userName,
            'created_at' => ($today <= $this->created_at) ? $this->created_at->format('H:i') : $this->created_at->format('Y.m.d'),
            'updated_at' => $this->updated_at
        ];
    }
}
