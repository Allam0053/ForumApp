<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{
    public function store(Request $request) {
        Question::create([
            'user_id' => $request->user_id,
            'question' => $request->question
        ]);
        
        // ubah kalau udah ada halaman detail pertanyaan
        return redirect()->back(); 
    }

    public function edit($id){
        $question = Question::find($id);

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
}
