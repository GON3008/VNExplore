<?php

namespace App\Http\Controllers\Admin;

use App\Models\Messager;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $messages = Messager::where(function ($query) use ($user) {
            $query->where('sender_id', $user->id)
                ->orWhere('receiver_id', $user->id);
        })->orderBy('created_at', 'desc')->get();

        // add list of users with messages
        $users = User::whereHas('sentMessages', function ($query) use ($user) {
            $query->where('receiver_id', $user->id);
        })->orWhereHas('receivedMessages', function ($query) use ($user) {
            $query->where('sender_id', $user->id);
        })->get();

        return view('admin.messages.index', ['messages' => $messages, 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string|max:1000',
        ]);

        $message = Messager::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        $message->load('sender', 'receiver');

        return response()->json([
            'message' => $message->message,
            'sender' => $message->sender,
            'receiver' => $message->receiver,
            'created_at' => $message->created_at->diffForHumans(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = Auth::user();
        $otherUser = User::findOrFail($id);
        $messages = Messager::where(function ($query) use ($user, $otherUser) {
            $query->where('sender_id', $user->id)
                ->where('receiver_id', $otherUser->id);
        })->orWhere(function($query) use ($user, $otherUser) {
            $query->where('sender_id', $otherUser->id)
                ->where('receiver_id', $user->id);
        })->orderBy('created_at', 'asc')->get();

        return view('admin.messages.list_chat', ['messages' => $messages, 'otherUser' => $otherUser]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
