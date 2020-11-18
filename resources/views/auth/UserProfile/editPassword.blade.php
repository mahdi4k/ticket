@extends('layouts.app')
@section('page')
ویرایش رمز عبور
@endsection
@section('content')

    <div class="container">
        <p style="font-size: 18px" class="text-center  mr-3">ویرایش رمز عبور</p>
        @if(Session::has('success'))
            <p class="alert col-md-6 mx-auto text-right {{ Session::get('alert-class', 'alert-info') }}">
                <a class="btn btn-secondary mr-3" href="{{route('profile.index')}}">بازگشت</a>
                {{ Session::get('success') }}
            </p>
        @endif

        @if(Session::has('failure'))
            <div class="d-flex col-md-6 mx-auto justify-content-center">
                 <p class="alert text-right {{ Session::get('alert-class', 'alert-danger') }}">

                     {{ Session::get('failure') }}
                </p>
            </div>
        @endif

            <form class="col-md-6 mx-auto mt-4 py-4 bg-white rtl profileEditForm" method="post"
                  action="{{route('editUserPassword')}}">
                {{ csrf_field() }}
                <div class="form-group text-right">
                    <label   for="current-password">رمز عبور فعلی</label>
                    <input type="password"  name="current-password"   class="form-control @error('current-password') is-invalid @enderror " id="current-password">
                    @error('current-password')
                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group text-right">
                    <label   for="password">رمز عبور جدید</label>
                    <input type="password"  name="password"   class="form-control @error('password') is-invalid @enderror " id="password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary d-flex justify-content-end text-right">ویرایش</button>
            </form>

    </div>

@endsection
