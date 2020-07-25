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
                'question_id' => $request->question_id,
                'parent' => $request->parent
            ]);
        }
        
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
        
        return redirect()->back();
    }
    
    public function delete($id) {
        Answer::where('id', $id)->delete();

        return redirect()->back();
    }

    public function answerByUser() {
        $user = User::find(auth()->user()->id);
        $answers = $user->answer()->orderBy('created_at', 'desc')->paginate(6);

        return view('listA', compact(['answers']));
    }
}
