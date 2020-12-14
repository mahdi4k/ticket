@extends('layouts.app')
@section('style')
    <style>
        .form-group span {

            margin-right: 6px;
            display: flex;
            color: #4a4a4a;
            font-size:10px
        }
        .content_box {

            margin: 14px auto 20px auto;

        }

        .center-items{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        footer{
            display: none;
        }
        .path1{
            height:100%;
            width: auto;
            position: absolute;
            left: 0;
            filter: hue-rotate(45deg) drop-shadow(2px 4px 6px #ccc);
        }
        .signUpImg{
            left: 1px;
            filter: hue-rotate(945deg);
            position: absolute;
            height: auto;
            width: 80%;
         }
        .mr-6{
            margin-right:4rem
        }
    </style>
    @endsection
@section('page')
ثبت نام
@endsection
@section('content')
    <div class="container center-items position-relative">
        <div class="row position-relative content_box w-100">
            <div class="col-md-6 d-none d-sm-block position-relative pl-0 ">

                <img class="path1"  src="{{url('img/method-draw-image.svg')}}" alt="">

                <img   class="signUpImg" src="{{url('img/sign-up.png')}}" alt="">
                <p style="position: absolute;bottom: 20%;width: 100%;text-align: center;color: white;font-size: 15pt ; margin-right: 10px ">
                    </p>
            </div>
            <div class="col-md-6 pt-3 ">
                <div class="register_form">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group pr-4 row">
                            <label for="name" class="col-md-8 col-form-label text-md-right">نام کاربری</label>

                            <div class="col-md-10 ">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}"   autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group pr-4 row">
                            <label for="email"
                                   class="col-md-8 col-form-label text-md-right">ایمیل</label>

                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}"   autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group pr-4 row">
                            <label for="job" class="col-md-8 col-form-label d-flex align-items-center text-md-right"> شغل <span
                                    class="optional_field_registeration">(اختیاری)</span></label>

                            <div class="col-md-10">
                                <input id="job" type="text" class="form-control @error('job') is-invalid @enderror"
                                       name="job" value="{{ old('job') }}" autocomplete="job" autofocus>

                                @error('job')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group pr-4 row">
                            <label for="degreeEducation" class="col-md-8 col-form-label d-flex align-items-center text-md-right"> مدرک تحصیلی
                                <span class="optional_field_registeration">(اختیاری)</span></label>

                            <div class="col-md-10">
                                <input id="degreeEducation" type="text"
                                       class="form-control @error('degreeEducation') is-invalid @enderror"
                                       name="degreeEducation" value="{{ old('degreeEducation') }}"
                                       autocomplete="degreeEducation" autofocus>

                                @error('degreeEducation')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group pr-4 row">
                            <label for="city" class="col-md-8 col-form-label d-flex align-items-center text-md-right">شهر<span
                                    class="optional_field_registeration">(اختیاری)</span></label>

                            <div class="col-md-10">
                                <input id="city" type="text"
                                       class="form-control @error('degreeEducation') is-invalid @enderror" name="city"
                                       value="{{ old('city') }}"   autocomplete="city" autofocus>

                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group pr-4 row">
                            <label for="phone_number" class="col-md-8 col-form-label d-flex align-items-center text-md-right">شماره تماس<span
                                    class="optional_field_registeration">(اختیاری)</span></label>

                            <div class="col-md-10">
                                <input id="phone_number" type="text"
                                       class="form-control @error('phone_number') is-invalid @enderror"
                                       name="phone_number" value="{{ old('phone_number') }}"
                                       autocomplete="phone_number" autofocus>

                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group pr-4 row">
                            <label for="password"
                                   class="col-md-8 col-form-label text-md-right">رمز عبور</label>

                            <div class="col-md-10">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                         autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group  pr-4 row">
                            <label for="password-confirm"
                                   class="col-md-10 col-form-label text-md-right">تایید رمز عبور</label>

                            <div class="col-md-10">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation"   autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group mr-2  row mb-0">
                            <div class="col-md-6 text-right  ">
                                <button type="submit" class="btn px-5 btn-primary">
                                    ثبت نام
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
