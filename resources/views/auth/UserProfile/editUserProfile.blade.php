@extends('layouts.app')
@section('page')
    پروفایل کاربری
@endsection
@section('content')

    <div class="container">
        <p style="font-size: 18px" class="text-right mr-3"> ویرایش اطلاعات شخصی</p>
        <div class="content_box flex-column">
            @if(Session::has('success'))
                <p class="alert col-md-6 mx-auto text-right {{ Session::get('alert-class', 'alert-info') }}">
                    <a class="btn btn-secondary mr-3" href="{{route('profile.index')}}">بازگشت</a>
                    {{ Session::get('success') }}
                </p>
            @endif
            <form class="col-md-6 mx-auto mt-4 py-4 profileEditForm" method="post"
                  action="{{route('profile.update',$user['id'])}}">
                {{ csrf_field() }}
                {{ method_field('patch') }}
                <div class="form-group">
                    <label for="username">نام</label>
                    <input type="text"  name="name" value="{{$user['name']}}" class="form-control @error('name') is-invalid @enderror " id="username">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">پست الکترونیک :</label>
                    <input type="email" name="email" value="{{$user['email']}}" class="form-control @error('email') is-invalid @enderror" id="email"
                           placeholder="Password">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phoneNumber">شماره تلفن همراه:</label>
                    <input type="text" name="phone_number" value="{{$user['phone_number']}}" class="form-control @error('phone_number') is-invalid @enderror"
                           id="phoneNumber">
                    @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="job">شعل :</label>
                    <input type="text" name="job" class="form-control @error('job') is-invalid @enderror" value="{{$user['job']}}" id="job">
                    @error('job')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phoneNumber">مدرک تخصیلی :</label>
                    <input type="text" name="degreeEducation" value="{{$user['degreeEducation']}}" class="form-control @error('degreeEducation') is-invalid @enderror"
                           id="phoneNumber">
                    @error('degreeEducation')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phoneNumber">شهر :</label>
                    <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="{{$user['city']}}" id="phoneNumber">
                    @error('city')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">ویرایش</button>
            </form>
        </div>
    </div>

@endsection
