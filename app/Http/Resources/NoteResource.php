<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'subject' => $this->subject->name,
            'subjectId' => $this->subject_id,
            'description' => $this->description,
            'published' => $this->created_at->format('d F, Y'),
            'detail' => route('notes.show', [$this->slug]),
        ];
    }
}
