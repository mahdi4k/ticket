@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{url('css/fileinput-rtl.min.css')}}">
    <style>
        .list-unstyled{
            direction: rtl;
            background: white;
            padding: 25px;
            margin-bottom: 25px;
        }
        .media{
            margin-bottom: 25px;
            text-align: right;
            padding: 11px 11px 0 11px;
            border-right: 2px solid #e6e6e6;
        }
        .media img{
            border-radius: 50px;
        }
        .media-body{
            margin-right: 15px;
        }
        .kv-zoom-cache{
            display: none;
        }
        .file-preview-image{
            width: 25% !important;
        }
    </style>
@endsection
@section('content')

    <div class="container">
       <div class="text-right bg-white p-4 mb-5">
           <h2>{{$gWork->title}}</h2>
           <p>
               {{$gWork->body}}
           </p>
       </div>
        <div>
            @comments(['model' => $gWork])
         </div>
    </div>

@endsection
@section('js')
<script src="{{url('js/fileinput.min.js')}}"></script>
<script src="{{url('js/fa.js')}}"></script>
    <script>

        $("#input-id").fileinput(
            {
                language: "fa",
                showCaption: false,
                showRemove: false,
                showUpload: false,
                maxFileSize: 3000,
                showCancel: false,
                browseLabel: "انتخاب فایل",
            }
        );

    </script>
@endsection
