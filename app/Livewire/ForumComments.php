<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ForumComment;

class ForumComments extends Component
{
    public $postId;
    public $commentBody;

    public function mount($postId)
    {
        $this->postId = $postId;
    }

    public function addComment()
    {
        $this->validate([
            'commentBody' => 'required|min:3',
        ]);

        ForumComment::create([
            'forum_post_id' => $this->postId,
            'user_id' => auth()->id(),
            'body' => $this->commentBody,
        ]);

        $this->commentBody = '';
    }

    public function render()
    {
        $comments = ForumComment::where('forum_post_id', $this->postId)
            ->with('user')
            ->orderBy('created_at', 'asc')
            ->get();

        return view('livewire.forum-comments', ['comments' => $comments]);
    }
}
