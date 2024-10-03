<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\MessageTo;
use App\Models\MessageKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
{
    public function inbox()
    {
        $userEmail = Auth::user()->email;
        $receivedMessages = MessageTo::where('receiver', $userEmail)->with('message')->get();

        return view('dashboard.messages.index', compact('receivedMessages'));
    }

    public function sent()
    {
        $userEmail = Auth::user()->email;
        $sentMessages = Message::where('sender', $userEmail)
            ->with('messageTo')
            ->get();

        return view('dashboard.messages.sent', compact('sentMessages'));
    }

    public function create()
    {
        $kategoriPesan = MessageKategori::all();
        $users = \App\Models\User::where('email', '!=', Auth::user()->email)->get();

        return view('dashboard.messages.create', compact('kategoriPesan', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'receiver' => 'required|email',
            'message_text' => 'required',
            'message_kategori_id' => 'required',
            'file' => 'nullable|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048'
        ]);

        $senderEmail = Auth::user()->email;

        if ($request->receiver == $senderEmail) {
            return redirect()->back()->withErrors(['error' => 'Anda tidak bisa mengirim pesan kepada diri sendiri.']);
        }

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('messages/files', 'public');
        }

        $message = Message::create([
            'sender' => $senderEmail,
            'message_kategori_id' => $request->message_kategori_id,
            'message_text' => $request->message_text,
            'file' => $filePath,
            'create_by' => Auth::user()->name
        ]);

        MessageTo::create([
            'message_id' => $message->id,
            'receiver' => $request->receiver
        ]);

        return redirect()->route('sent')->with('success', 'Pesan berhasil dikirim.');
    }

  public function show($id)
{
    $message = Message::findOrFail($id);

    // Cari balasan untuk pesan ini
    $replies = Message::where('message_kategori_id', $message->message_kategori_id)
                      ->where('sender', $message->sender)
                      ->where('id', '!=', $message->id) // Pastikan bukan pesan yang sama
                      ->get();

    return view('dashboard.messages.show', compact('message', 'replies'));
}


    public function sendReply(Request $request, $id)
{
    $validated = $request->validate([
        'message_text' => 'required',
        'file' => 'nullable|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048' // Validasi file
    ]);

    $originalMessage = Message::findOrFail($id);
    $senderEmail = Auth::user()->email;

    if ($originalMessage->sender == $senderEmail) {
        return redirect()->back()->withErrors(['error' => 'Anda tidak bisa mengirim balasan kepada diri sendiri.']);
    }

    $filePath = null;
    if ($request->hasFile('file')) {
        $filePath = $request->file('file')->store('messages/files', 'public');
    }

    $reply = Message::create([
        'sender' => $senderEmail,
        'message_kategori_id' => $originalMessage->message_kategori_id,
        'message_text' => $request->message_text,
        'file' => $filePath,
        'create_by' => Auth::user()->name
    ]);

    MessageTo::create([
        'message_id' => $reply->id,
        'receiver' => $originalMessage->sender
    ]);

    return redirect()->route('inbox')->with('success', 'Balasan berhasil dikirim.');
}


    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('inbox')->with('success', 'Pesan berhasil dihapus.');
    }
}
