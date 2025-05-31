<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ChatBox extends Component
{
    public $receiverId;
    public $receiver;
    public $body;
    public $messages = [];

    protected $rules = [
        'body' => 'required|string',
    ];

    public function mount($receiverId)
    {
        $this->receiverId = $receiverId;
        $this->receiver = User::find($receiverId);
        $this->loadMessages();
    }

    public function loadMessages()
    {
        // Mark messages as read (sent by selected user to the current user)
        Message::where('sender_id', $this->receiverId)
            ->where('receiver_id', Auth::id())
            ->where('is_read', false)
            ->update(['is_read' => true]);
        
        // Let the parent component know
        $this->dispatch('messagesRead', $this->receiverId);

        // Load messages
        $messages = Message::with('sender')
            ->where(function ($query) {
                $query->where('sender_id', Auth::id())
                    ->where('receiver_id', $this->receiverId);
            })->orWhere(function ($query) {
                $query->where('sender_id', $this->receiverId)
                    ->where('receiver_id', Auth::id());
            })->orderBy('created_at')->get();

        // Format each message as array with sender details
        $this->messages = $messages->map(function ($msg) {
            return [
                'id' => $msg->id,
                'sender_id' => $msg->sender_id,
                'receiver_id' => $msg->receiver_id,
                'body' => $msg->body,
                'created_at' => $msg->created_at,
                'is_read' => $msg->is_read,
                'sender_name' => optional($msg->sender)->firstName ?? 'User',
                'sender_profile' => $msg->sender && $msg->sender->profile_photo_path
                    ? Storage::url($msg->sender->profile_photo_path)
                    : Storage::url('users/avatar.png'),
            ];
        })->toArray();
    }

    public function sendMessage()
    {
        $this->validate();

        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $this->receiverId,
            'body' => $this->body,
        ]);

        $this->body = '';
        $this->loadMessages(); // Reload chat thread safely
    }

    public function updatedMessages()
    {
        $this->dispatchBrowserEvent('scrollToBottom');
    }

    public function render()
    {
        return view('livewire.chat-box');
    }
}
