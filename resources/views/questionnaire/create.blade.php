@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-right">
                    <div class="card-header">افزودن نظرسنجی</div>

                    <div class="card-body">
                        <form action="{{url('ertebat/survey/questionnaires')}}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="title">عنوان</label>
                                <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="عنوان را وارد کنید">
                                <small id="emailHelp" class="form-text text-muted">سوال خود را در این قسمت بپرسید</small>
                                @error('title')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="title">هدف از نظرسنجی</label>
                                <input type="text" name="purpose" class="form-control" id="purpose" aria-describedby="emailHelp" placeholder="">
                                <small id="purpose" class="form-text text-muted" > توضیح مختصر از نظرسنجی</small>
                                @error('purpose')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">ارسال </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
