<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;

class Comment extends Component
{

    public $comment = '';
    public $lesson = '';

    public function sendComment(Request $request) {


        $this->validate([
            'comment' => 'required',
        ]);

        \App\Models\Comment::create([
            'comment' => $this->comment,
            'user_id' => auth()->id(),
            'lesson_id' => 1
        ]);

        $this->comment = '';

        return session()->flash('success','Comment Envoyer avec succée');
    }


    public function deleteComment() {
        dd('deleted');
    }

    public function render()
    {
        $comments = \App\Models\Comment::latest()->get();
        return view('livewire.comment',compact('comments'));
    }
}
