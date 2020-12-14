@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-right">

                    <div class="card-header">{{$questionnaire->title}}</div>

                    <div class="align-items-center card-body d-flex justify-content-end">
                        <a class="btn btn-outline-secondary"
                           href="/ertebat/survey/{{$questionnaire->id}}/questions/create">افزودن سوال </a>
                        @if($UserSurvey === true)
                            <p style="direction: rtl" class="alert alert-info mb-0 ml-3 ">شما قبلا در این نظر سنجی شرکت کرده این.</p>
                        @else

                        @endif
                    </div>

                </div>
                @foreach ($questionnaire->questions as $item)
                    <div class="card mt-4 text-right">
                        <div class="card-header">{{$item->question}}</div>
                        <div class="card-body">
                            <ul class="list-group">
                                @php
                                    $answerValue =[];
                                    $CountAnswer = [];
                                @endphp

                                @foreach ($item->answer as $value)
                                    <li class="list-group-item d-flex flex-row-reverse text-right justify-content-between">
                                        @php
                                            array_push($answerValue,$value->answer);
                                            array_push($CountAnswer,intval($value->responses->count()))
                                        @endphp
                                        <div> {{$value->answer}}</div>
                                        @if($value->responses->count())
                                            <div>{{(intval($value->responses->count() * 100) / $item->responses->count()) }}
                                                %
                                            </div>
                                        @endif
                                    </li>

                                @endforeach

                            </ul>
                        </div>
                        <div class="col-lg-9 offset-3 mx-auto mb-4">

                            <canvas style="box-shadow: unset !important;" data-answer="{{ implode(",",$answerValue)}}"
                                    data-count="{{implode(",",$CountAnswer)}}"
                                    class="rounded oilChart shadow"></canvas>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <form action="/ertebat/questionnaires/{{$questionnaire->id}}/questions/{{$item->id}}"
                              method="post">
                            @method('DELETE')
                            @csrf

                            <button type="submit" class="btn text-right btn-sm btn-outline-danger">حذف سوال</button>
                        </form>
                    </div>

                @endforeach

            </div>

        </div>

    </div>


@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

    <script>
        $('.oilChart').each(function (index, element) {

            let dataAnswer = $(this).attr('data-answer')
            let NamesChart = dataAnswer.split(",")
            let DataCountAnswer = $(this).attr('data-count')
            let CountAnswer = DataCountAnswer.split(",")

            /*let GetNames = allData.filter(function (Names) {
                let questionId = Names.question_id

                  return questionId === questionId
             })*/
            //console.log(GetNames)


            Chart.defaults.global.defaultFontFamily = "Lato";
            Chart.defaults.global.defaultFontSize = 18;

            var oilData = {
                labels: NamesChart,
                datasets: [
                    {
                        data: CountAnswer,
                        backgroundColor: [
                            "#FF6384",
                            "#63FF84",
                            "#fff763",
                            "#8463FF",

                        ]
                    }]
            };

            var pieChart = new Chart(element, {
                type: 'pie',
                data: oilData
            });
        })


    </script>
@endsection
