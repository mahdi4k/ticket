<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        return redirect('tickets');
    }

    public function landing()
    {
        return view('landing');
    }

    public function survey()
    {
        $questionnaires = auth()->user()->questionnaires;
        return view('questionnaire.index',compact('questionnaires'));
    }
    public function destroy(Questionnaire $questionnaire)
    {
        $questionnaire->load('questions.answer.responses');
        $questionnaire->delete();
        return redirect()->back()->with('deleteQuestionnaire','نظرسنجی با موفقیت حذف شد');
    }
}
