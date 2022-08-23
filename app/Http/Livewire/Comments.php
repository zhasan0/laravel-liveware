<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Comments extends Component
{
    public $newComment;

    public $comments = [
        [
            'body' => 'Some quick example text to build on the card title and make up the bulk of the card content.',
            'created_at' => "3 minutes ago",
            'creator' => 'Zahid Hasan'
        ]
    ];

    public function addComment()
    {
        if ($this->newComment == '') {
            return;
        }
        array_unshift($this->comments, [
            'body' => $this->newComment,
            'created_at' => Carbon::now()->diffForHumans(),
            'creator' => 'Zahid Hasan'
        ]);
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
