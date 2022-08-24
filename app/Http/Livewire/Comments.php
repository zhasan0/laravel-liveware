<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $newComment;

//    public $comments;

//    public function mount()
//    {
////        $this->comments = Comment::latest()->get();
//
//    }

    public function updated()
    {
        $this->validate([
            'newComment' => 'required|max:100'
        ]);
    }

    public function addComment()
    {
        $this->validate(['newComment' => 'required']);

        // store new comment
        $createComment = Comment::create([
            'body' => $this->newComment,
            'user_id' => 1
        ]);
        // prepend to comments array
//        $this->comments->prepend($createComment);
        $this->newComment = "";

        session()->flash('message', 'Comment successfully created 😉.');
    }

    public function remove($recordId)
    {
        $comment = Comment::find($recordId);
        $comment->delete();
//        $this->comments = $this->comments->except($recordId);
        session()->flash('message', 'Comment successfully deleted 😪.');
    }

    public function render()
    {
        return view('livewire.comments', [
            'comments' => Comment::latest()->paginate(2)
        ]);
    }
}
