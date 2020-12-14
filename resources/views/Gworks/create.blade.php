@extends('layouts.app')
@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('content')
    <div class="container">
      <div class="col-md-8 mx-auto ">
          <div class="card p-4">
              <div class="alert alert-primary d-flex justify-content-between align-items-center flex-row-reverse">
                  <div class=" text-right  ">افزودن کارگروه</div>
                  <a class="btn btn-primary" href="{{url('/ertebat/gworks/')}}">بازگشت</a>
              </div>

              <form action="{{route('gwork.store')}}" method="post">

                  @csrf

                  <div class="form-group text-right">
                      <label for="question ">عنوان </label>
                      <input type="text" class="form-control" name="title" id="exampleInputEmail1"
                             aria-describedby="emailHelp" placeholder="متن سوال را وارد کنید">
                      @error('title')
                      <small class="text-danger">{{$message}}</small>
                      @enderror
                  </div>
                  <div class="form-group text-right">
                      <label for="question ">متن </label>
                      <input type="text" class="form-control" name="body" id="exampleInputEmail1"
                             aria-describedby="emailHelp" placeholder="متن را وارد کنید">
                      @error('body')
                      <small class="text-danger">{{$message}}</small>
                      @enderror
                  </div>
                  <div class="form-group text-right">
                      <label for="user_list">کاربران مجاز</label>
                      <select id="user_list" name="user_id[]" multiple class="form-control"  >
                          @foreach($allUser as $user)
                              <option value="{{$user->id}}">{{$user->name}}</option>
                          @endforeach
                      </select>
                      @error('body')
                      <small class="text-danger">کاربر مجاز انتخاب نشده است</small>
                      @enderror
                  </div>
                  <button class="btn btn-primary text-right float-right" type="submit">ارسال</button>
              </form>
          </div>
      </div>
@endsection
@section('js')
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

            <script>

                    $('#user_list').select2();

            </script>
@endsection
