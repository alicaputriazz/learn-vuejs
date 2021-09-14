<?php

namespace App\Http\Controllers\Notes;

use App\Http\Controllers\Controller;
use App\Http\Resources\NoteResource;
use App\Models\Note;
use App\Models\Subject;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::with('subject')->latest()->get();
        return NoteResource::collection($notes);
    }

    public function show(Subject $subject, Note $note)
    {
        return new NoteResource($note);
    }

    public function store()
    {
        request()->validate([
            'subject'     => 'required',
            'title'       => 'required',
            'description' => 'required'
        ]);

        $subject = Subject::findOrFail(request('subject'));
        $note = Note::create([
            'subject_id' => $subject->id,
            'title' => request('title'),
            'slug' => \Str::slug(request('title')),
            'description' => request('description'),
        ]);

        return response()->json([
            'message' => 'New note has created',
            'note' => $note,
        ]);
    }

    public function update(Note $note)
    {
        request()->validate([
            'subject'     => 'required',
            'title'       => 'required',
            'description' => 'required'
        ]);
        
        $subject = Subject::findOrFail(request('subject'));
        $note->update([
            'subject_id' => $subject->id,
            'title' => request('title'),
            'description' => request('description'),
        ]);

        return response()->json([
            'message' => 'New note has updated',
            'note' => $note,
        ]);

    }
}
