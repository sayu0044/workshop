<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\MessageTo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailController extends Controller
{
    // Method to display the list of emails
    public function index()
    {
        // Fetch all messages for the logged-in user
        $messages = Message::where('sender', Auth::id())->get();

        // Return view with message data
        return view('dashboard.email.index', compact('messages'));
    }

    // Method to save a new email
    public function store(Request $request)
    {
        $request->validate([
            'to' => 'required|email',
            'subject' => 'required|string|max:255',
            'message_text' => 'required|string',
        ]);

        // Create a new message
        $message = Message::create([
            'sender' => Auth::user()->id,
            'message_reference' => $request->input('message_reference', null),
            'subject' => $request->input('subject'),
            'message_text' => $request->input('message_text'),
            'message_status' => 'sent', // Set status as 'sent'
            'create_by' => Auth::user()->id,
            'delete_mark' => false,
        ]);

        // Create recipients for the message
        MessageTo::create([
            'message_id' => $message->id,
            'to' => $request->input('to'),
            'cc' => $request->input('cc', null),
            'create_by' => Auth::user()->id,
            'delete_mark' => false,
        ]);

        return redirect()->route('email.index')->with('success', 'Email berhasil dikirim.');
    }

    // Method to display the email creation form
    public function create()
    {
        return view('dashboard.email.create');
    }

    // Method to display the details of a specific email
    public function show($id)
    {
        $message = Message::findOrFail($id);
        return view('dashboard.email.show', compact('message'));
    }

    // Method to display the email editing form
    public function edit($id)
    {
        $message = Message::findOrFail($id);
        return view('dashboard.email.edit', compact('message'));
    }

    // Method to update the email
    public function update(Request $request, $id)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message_text' => 'required|string',
        ]);

        $message = Message::findOrFail($id);
        $message->update([
            'subject' => $request->input('subject'),
            'message_text' => $request->input('message_text')
        ]);

        return redirect()->route('email.index')->with('success', 'Email berhasil diperbarui.');
    }

    // Method to delete an email
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('email.index')->with('success', 'Email berhasil dihapus.');
    }

    // Method to display sent emails
    public function sent()
    {
        // Mengambil email yang sudah terkirim dari user yang login
        $sentMessages = Message::where('sender', Auth::id())
                               ->where('message_status', 'sent')
                               ->get();
    
        return view('dashboard.email.sent', compact('sentMessages'));
    }
}