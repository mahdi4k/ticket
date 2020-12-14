@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-right">

                <h1>{{$questionnaire->title}}</h1>
                @if($UserSurvey === false)
                    <form action="/ertebat/surveys/{{$questionnaire->id}}-{{Str::slug($questionnaire->title)}}"
                          method="post">
                        @csrf
                        @foreach ($questionnaire->questions as $key => $questions)

                            <div class="card mt-4">
                                <div class="card-header"><strong>{{$key + 1}}{{ $questions->question  }}</strong></div>
                                <div class="card-body">
                                    @error('responses.' . $key . '.answer_id')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                    <ul class="list-group">
                                        @foreach ($questions->answer as $value)
                                            <label for="answer{{$value->id}}">
                                                <li class="list-group-item ">
                                                    <input value="{{$value->id}}" type="radio"
                                                           {{(old('responses.'. $key . '.answer_id') == $value->id) ? 'checked' : ''}}
                                                           name="responses[{{$key}}][answer_id]"
                                                           id="answer{{$value->id}}">
                                                    {{$value->answer}}
                                                    <input type="hidden" name="responses[{{$key}}][question_id]"
                                                           value="{{$questions->id}}">
                                                </li>
                                            </label>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                        @endforeach

                        <input type="hidden" name="survey[name]"
                               value="{{\Illuminate\Support\Facades\Auth::user()->name}}" class="form-control"
                               id="name">

                        <input type="hidden" name="survey[email]"
                               value="{{\Illuminate\Support\Facades\Auth::user()->email}}" class="form-control"
                               id="email">


                        <input class="btn btn-dark mt-3" type="submit" value="ارسال">
                    </form>
                @else
                    <div class="d-flex alert alert-danger flex-row-reverse justify-content-between align-items-center">
                        <p class="mb-0">کاربر گرامی شما قبلا در این نظرسنجی شرکت کرده این</p>
                        <a href="{{url('ertebat/survey')}}" class="btn-danger btn">بازگشت</a>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
