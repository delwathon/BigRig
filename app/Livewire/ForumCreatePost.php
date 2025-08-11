<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\ForumPost;

class ForumCreatePost extends Component
{
    public $title, $body, $category;

    public function createPost()
    {
        $this->validate([
            'title' => 'required|min:5',
            'body' => 'required|min:10',
        ]);

        ForumPost::create([
            'user_id' => Auth::id(),
            'title' => $this->title,
            'body' => $this->body,
            'category' => $this->category,
        ]);

        session()->flash('success', 'Post created successfully!');
        return redirect()->to('/forum');
    }
}
