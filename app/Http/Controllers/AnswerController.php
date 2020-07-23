<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;

class AnswerController extends Controller
{
    public function store(Request $request) {
        Answer::create([
            'user_id' => $request->user_id,
            'question_id' => $request->question_id,
            'answer' => $request->answer
        ]);
        
        // ubah kalau udah ada halaman detail pertanyaan
        return redirect()->back(); 
    }

    public function edit($id){
        $answer = Answer::find($id);

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

    public function index()
    {
        $answers = Answer::orderBy('created_at', 'asc')->get();
        return view('AddAnswer', compact('answers'));
    }
}
