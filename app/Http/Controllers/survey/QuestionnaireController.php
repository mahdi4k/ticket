<?php

namespace App\Http\Controllers\survey;

use App\Http\Controllers\Controller;
use App\Questionnaire;
use App\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionnaireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create(){
        return view('questionnaire.create');
    }
    public function store()
    {

        $data = request()->validate([
            'title'=>'required',
            'purpose'=>'required'
        ]);
        //  $data['user_id']=auth()->user()->id;
        //  $questionaire = Questionnaire::create($data);
        $questionaire = auth()->user()->questionnaires()->create($data);
        return redirect('ertebat/survey/'.$questionaire->id);
    }

    public function show(Questionnaire $questionnaire)
    {
        $UserSurvey = Survey::where(['questionnaire_id'=>$questionnaire->id,'email'=>Auth::user()->email])->exists();

        $questionnaire->load('questions.answer.responses');

        return view('questionnaire.show',compact('questionnaire','UserSurvey'));
    }
}
