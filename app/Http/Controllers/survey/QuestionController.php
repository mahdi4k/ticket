<?php

namespace App\Http\Controllers\survey;

use App\Http\Controllers\Controller;
use App\Question;
use App\Questionnaire;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create(Questionnaire $questionnaire)
    {

        return view('question.create',compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire)
    {
        $data = request()->validate([
            'question.question'=>'required',
            'answers.*.answer'=>'required'
        ]);

        $question = $questionnaire->questions()->create($data['question']);
        $question->answer()->createMany($data['answers']);
        return redirect('/ertebat/survey/'.$questionnaire->id);
    }

    public function destroy(Questionnaire $questionnaire , Question $question)
    {
        $question->answer()->delete();
        $question->delete();
        return  redirect($questionnaire->path());
    }
}
