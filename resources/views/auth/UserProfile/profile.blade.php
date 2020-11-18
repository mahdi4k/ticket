@extends('layouts.app')
@section('page')
پروفایل کاربری
@endsection
@section('content')

    <div class="container">
        <p class="text-right">اطلاعات شخصی</p>
        <div class="row content_box justify-content-center">

            <div class="col-md-6 profile-sections">
                <span class="span-profile">نام</span>
                <p>{{$user['name']}}</p>
            </div>
            <div class="col-md-6 profile-sections">
                <span class="span-profile">پست الکترونیک :</span>
                <p>{{$user['email']}}</p>
            </div>

            <div class="col-md-6 profile-sections">
                <span class="span-profile">شماره تلفن همراه:</span>
                <p>{{$user['phone_number']}}</p>
            </div>
            <div class="col-md-6 profile-sections ">
                <span class="span-profile">شعل :</span>
                <p>{{$user['job']}}</p>
            </div>

            <div class="col-md-6 profile-sections">
                <span class="span-profile">مدرک تخصیلی :</span>
                <p>{{$user['degreeEducation']}}</p>
            </div>
            <div class="col-md-6 profile-sections">
                <span class="span-profile">شهر :</span>
                <p>{{$user['city']}}</p>
            </div>
            <a class="btn btn-outline-danger mr-3 my-3" href="{{route('userPassword')}}">ویرایش رمز عبور</a>
            <a class="btn btn-outline-info my-3" href="{{route('profile.show',$user['id'])}}">ویرایش اطلاعات شخصی </a>

        </div>

    </div>
@endsection
