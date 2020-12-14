@extends('layouts.app')
@section('css')
    <style>
        .alert-warning{
            display: none;
        }
    </style>
    @endsection
@section('content')
    <div class="container">
        @if(Session::has('success'))
            <div class="alert alert-success d-flex flex-column">
              <p class="mb-0">{{session('success')}}</p>
            </div>
        @endif
      <div class="gWorks bg-white p-5 text-right">
          <h4 class="alert alert-primary align-items-center d-flex flex-row-reverse justify-content-between">
              <span>کارگروه های فعال</span>
              @if(auth()->user()->ticketit_admin)
                  <a class="btn btn-primary" href="{{url('/ertebat/gworks/create')}}">افزودن کارگروه</a>
              @endif
          </h4>
          <div>
               @foreach($Gworks as $gworks)
                  @if(in_array(auth()->user()->id,$gworks->user_id))
                <div class="mt-4 alert alert-link border align-items-center count-gwork d-flex flex-row-reverse justify-content-between">
                    <a class="d-block" style="font-size: 17px" href="{{route('gwork.show',['gworks'=>$gworks->id])}}">{{$gworks->title}}</a>
                    <a class="btn btn-outline-info" href="{{route('gwork.edit',['gWork'=>$gworks->id])}}">ویرایش</a>
                </div>
                  @endif
              @endforeach
              <p class="empty-gwork alert alert-warning"></p>
          </div>
      </div>
    </div>

@endsection
@section('js')
    <script>
        if($('.count-gwork').length === 0){
            $('.empty-gwork').show()
            $('.empty-gwork').html('در حال حاضر کارگروهی برای شما فعال نمی باشد')
        }
    </script>
@endsection
