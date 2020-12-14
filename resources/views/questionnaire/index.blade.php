@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(Session::has('success'))
                    <p class="alert alert-info">{{ Session::get('success') }}</p>
                @endif
                @if(auth()->user()->ticketit_admin === 1)
                    <div class="card">

                        <div class="card-body text-right">
                            @if (session('deleteQuestionnaire'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('deleteQuestionnaire') }}
                                </div>
                            @endif

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif


                            <a href="{{route('survey.create')}}" class="btn btn-dark">افزودن نظرسنجی</a>

                        </div>

                    </div>
                @endif
                <div class="card mt-4 text-right">
                    <div class="card-header">نظرسنجی های فعال</div>

                    <div class="card-body">

                        <ul class="list-group">

                            @foreach($questionnaires as $questionnaire)

                                <li class="list-group-item border mb-4">
                                    <h3 class="font-weight-bolder">{{$questionnaire->title}}</h3>

                                    <div class="mt-3 d-flex flex-column">

                                             <a href="{{$questionnaire->publicPath()}}">
                                                شرکت در این نظرسنجی
                                             </a>

                                        <a class="mt-2" href="{{$questionnaire->path()}}">مشاهده نتایج</a>
                                        <form class="mt-3" action="/ertebat/questionnaires/{{$questionnaire->id}}/questions "
                                              method="post">
                                            @method('DELETE')
                                            @csrf
                                            @if(auth()->user()->ticketit_admin === 1)
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    حذف نظرسنجی
                                                </button>
                                            @endif
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
