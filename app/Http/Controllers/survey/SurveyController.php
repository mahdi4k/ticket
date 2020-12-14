<?php

namespace App\Http\Controllers\survey;

use App\Http\Controllers\Controller;
use App\Questionnaire;
use App\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    public function show(Questionnaire $questionnaire,$slug)
    {
        $UserSurvey = Survey::where(['questionnaire_id'=>$questionnaire->id,'email'=>Auth::user()->email])->exists();
        $questionnaire->load('questions.answer');
        return view('survey.show',compact('questionnaire','UserSurvey'));
    }

    public function store(Questionnaire $questionnaire)
    {

        $data = request()->validate([
            'responses.*.answer_id'=>'required',
            'responses.*.question_id' => 'required',
            'survey.name'=>'required',
            'survey.email'=>'required|email'
        ]);

        $survey = $questionnaire->surveys()->create($data['survey']);
        $survey->responses()->createMany($data['responses']);

        return redirect('/ertebat/survey')->with('success','نظرسنجی با موفقیت ثبت شد');
    }
}
