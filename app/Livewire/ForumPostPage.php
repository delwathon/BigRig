<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ForumPost;

class ForumPostPage extends Component
{
    public $postId;
    public $post;

    public function mount($postId)
    {
        $this->postId = $postId;
        $this->post = ForumPost::with('user')->findOrFail($this->postId);
    }

    public function render()
    {
        $post = ForumPost::with('user')->findOrFail($this->postId);

        $popularPosts = ForumPost::with('user')
            ->withCount('comments')
            ->orderBy('comments_count', 'desc')
            ->take(5)
            ->get();

        $categories = ForumPost::select('category')
            ->distinct()
            ->whereNotNull('category')
            ->orderBy('category')
            ->get()
            ->map(function ($item) {
                return (object) [
                    'slug' => \Illuminate\Support\Str::slug($item->category),
                    'name' => $item->category
                ];
            });
        
        $meetups = [
            (object)[
                'date' => '2025-07-12',
                'title' => 'BigRig Driver Networking Event',
                'link' => '#',
                'avatars' => ['avatar-02.jpg', 'avatar-03.jpg', 'avatar-04.jpg'],
                'participants_count' => 22,
            ],
            // more meetups...
        ];

        return view('livewire.forum-post-page', [
            'post' => $post,
            'popularPosts' => $popularPosts,
            'categories' => $categories,
            'meetups' => $meetups,
        ]);
    }
}
