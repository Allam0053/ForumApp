<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\User;
use App\Answer;

class QuestionController extends Controller
{
    public function store(Request $request) {
        $user = User::find($request->user_id);

        if($user !== null) {
            $question = $user->question()->create([
                'question' => $request->question
            ]);
        }
        
        // ubah kalau udah ada halaman detail pertanyaan
        return redirect()->back(); 
    }

    public function edit($id){
        $question = Question::find($id);

        // ubah kalau udah ada halaman detail pertanyaan
        return view('EditQuestion', compact('question'));
    }

    public function update(Request $request){
        Question::where('id', $request->id)->update([
            'question' => $request->question
        ]);
        
        // ubah kalau udah ada halaman detail pertanyaan
        return redirect()->route('addquestion');
    }
    
    public function delete($id) {
        Question::where('id', $id)->delete();

        // ubah kalau udah ada halaman detail pertanyaan
        return redirect()->route('addquestion');
    }

    public function index()
    {
        $questions = Question::orderBy('updated_at', 'desc')->get();

        // ubah kalau udah ada halaman detail pertanyaan
        return view('AddQuestion', compact('questions'));
    }

    public function forum()
    {
        $questions = Question::orderBy('updated_at', 'desc')->paginate(5);
        $answers = Answer::orderBy('updated_at', 'desc')->get();
        // ubah kalau udah ada halaman detail pertanyaan
        return view('forums', compact(['questions','asnwer']));
    }

    public function questionByUser($user_id) {
        $user = User::find($user_id);
        $questions = $user->question()->orderBy('created_at', 'asc')->get();

        // ubah kalau udah ada halaman pertanyaan per user
        return $questions;
    }

}
