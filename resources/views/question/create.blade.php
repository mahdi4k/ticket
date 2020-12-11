@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-right">افزودن سوال جدید</div>

                    <div class="card-body text-right">
                        <form action="/ertebat/survey/{{$questionnaire->id}}/questions" method="post">

                            @csrf

                            <div class="form-group text-right">
                                <label for="question ">سوال</label>
                                <input type="text" class="form-control" name="question[question]" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="متن سوال را وارد کنید">

                                @error('question.question')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <fieldset>


                                    <div>
                                        <div class="form-group">
                                            <label for="answer1">گزینه اول</label>
                                            <input name="answers[][answer]" type="text" class="form-control" id="answer1" >
                                        </div>
                                        @error('answers.0.answer')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                    <div>
                                        <div class="form-group">
                                            <label for="answer2">گزینه دوم</label>
                                            <input name="answers[][answer]" type="text" class="form-control" id="answer2" >
                                        </div>
                                        @error('answers.1.answer')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                    <div>
                                        <div class="form-group">
                                            <label for="answer3">گزینه سوم</label>
                                            <input name="answers[][answer]" type="text" class="form-control" id="answer3" >
                                        </div>
                                        @error('answers.2.answer')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>

                                    <div>
                                        <div class="form-group">
                                            <label for="answer4">گزینه چهارم</label>
                                            <input name="answers[][answer]" type="text" class="form-control" id="answer4" >
                                        </div>
                                        @error('answers.3.answer')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>



                                </fieldset>
                            </div>
                            <button type="submit" class="btn btn-primary">ارسال </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
