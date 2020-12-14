@extends('layouts.app')
 @section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
 @endsection
@section('content')
    <div class="container bg-white p-3">
        @if(Session::has('success'))
            <p class="alert alert-info">{{ Session::get('success') }}</p>
        @endif
        <div class="d-flex justify-content-between alert flex-row-reverse align-items-center alert-primary ">
            <h4 class="mb-0">ویرایش کارگروه</h4>
            <a class="btn btn-outline-info" href="{{url('ertebat/gworks')}}">بازگشت</a>
        </div>
        <form action="{{route('gwork.update',['gWork'=>$gWork])}}" method="post">

             @csrf

            <div class="form-group text-right">
                <label for="question ">عنوان </label>
                <input value="{{$gWork->title}}" type="text" class="form-control" name="title" id="exampleInputEmail1"
                       aria-describedby="emailHelp" placeholder="متن سوال را وارد کنید">
                @error('title')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group text-right">
                <label for="question ">متن </label>
                <textarea type="text"  class="form-control" name="body" id="exampleInputEmail1"
                          aria-describedby="emailHelp" >{{$gWork->body}}</textarea>
                @error('body')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group text-right">
                <label for="user_list">کاربران مجاز</label>
                <select id="user_list" name="user_id[]" multiple class="form-control"  >
                    @foreach($allUser as $user)
                        <option @if(in_array($user->id,$gWork->user_id)) selected @endif value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                @error('body')
                <small class="text-danger">کاربر مجاز انتخاب نشده است</small>
                @enderror
            </div>
            <button class="btn btn-primary text-right float-right" type="submit">ارسال</button>
        </form>
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script>

        $('#user_list').select2();

    </script>
@endsection
