<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Question;
use App\User;

class AnswerController extends Controller
{
    public function store(Request $request) {
        $user = User::find($request->user_id);
        $question = Question::find($request->question_id);

        if($user !== null && $question !== null) {
            $answer = $user->answer()->create([
                'answer' => $request->answer,
                'question_id' => $request->question_id
            ]);
        }
        
        // ubah kalau udah ada halaman detail pertanyaan
        return redirect()->back(); 
    }

    public function edit($id){
        $answer = Answer::find($id);

        // ubah kalau udah ada halaman detail pertanyaan
        return view('EditAnswer', compact('answer'));
    }

    public function update(Request $request){
        Answer::where('id', $request->id)->update([
            'answer' => $request->answer
        ]);
        
        // ubah kalau udah ada halaman detail pertanyaan
        return redirect()->route('addanswer');
    }
    
    public function delete($id) {
        Answer::where('id', $id)->delete();

        // ubah kalau udah ada halaman detail pertanyaan
        return redirect()->route('addanswer');
    }

    // sepertinya gak diperlukan
    public function index()
    {
        $answers = Answer::orderBy('created_at', 'asc')->get();

        // ubah kalau udah ada halaman detail pertanyaan
        return view('AddAnswer', compact('answers'));
    }

    public function answerByQuestion($question_id) {
        $question = Question::find($question_id);
        $answers = $question->answer()->orderBy('created_at', 'asc')->get();

        // ubah kalau udah ada halaman detail pertanyaan
        return $answers;
    }

    public function answerByUser($user_id) {
        $user = User::find($user_id);
        $answers = $user->answer()->orderBy('created_at', 'asc')->get();

        // ubah kalau udah ada halaman jawaban per user
        return $answers;
    }
}
