<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\UserInput;
use LucianoTonet\GroqPHP\Groq;

class ChatController extends Controller
{
    public function index()
    {
        // Retrieve chat history from the session
        $chatHistory = Session::get('chat_history', []);

        return view('chat.index', ['chatHistory' => $chatHistory]);
    }

    public function send(Request $request)
    {
        $message = $request->input('message');
        $groq = new Groq('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');

        // Simpan input user ke database
        UserInput::create();

        // Retrieve relevant data from the database based on the message
        $teamStats = DB::table('statistik_team')->get();
        $teams = DB::table('team')->get();

        $messageForGroq = "Answer the following question based on the provided data:\n\n";
        $messageForGroq .= "Database data:\n";
        $messageForGroq .= "Team statistics: " . json_encode($teamStats) . "\n\n";
        $messageForGroq .= "Teams: " . json_encode($teams) . "\n\n";
        $messageForGroq .= "Question: $message";

        $chatCompletion = $groq->chat()->completions()->create([
            'model' => 'mixtral-8x7b-32768',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $messageForGroq
                ],
            ]
        ]);

        $response = $chatCompletion['choices'][0]['message']['content'];

        // Retrieve chat history from the session
        $chatHistory = Session::get('chat_history', []);

        // Add the new question and answer to the chat history
        $chatHistory[] = ['question' => $message, 'answer' => $response];

        // Save the updated chat history back to the session
        Session::put('chat_history', $chatHistory);

        return view('chat.index', ['chatHistory' => $chatHistory]);
    }
}
