@extends('ticketit::layouts.master')
@section('page', trans('ticketit::lang.create-ticket-title',[],'fa'))
@section('page_title', trans('ticketit::lang.create-new-ticket',[],'fa'))

@section('ticketit_content')
    {!! CollectiveForm::open([
                    'route'=>$setting->grab('main_route').'.store',
                    'method' => 'POST'
                    ]) !!}
        <div class="form-group row d-flex justify-content-center">
            {!! CollectiveForm::label('subject', trans('ticketit::lang.subject',[],'fa') . trans('ticketit::lang.colon'), ['class' => 'col-lg-2 text-center col-form-label']) !!}
            <div class="col-lg-10">
                {!! CollectiveForm::text('subject', null, ['class' => 'form-control', 'required' => 'required']) !!}
                <small class="form-text text-right text-muted">{!! trans('ticketit::lang.create-ticket-brief-issue') !!}</small>
            </div>
        </div>

        <div class="form-group row d-flex justify-content-center">
            {!! CollectiveForm::label('نوع درخواست :','',  ['class' => 'col-lg-2 text-center col-form-label']) !!}
            <div class="col-lg-10">
                {!! CollectiveForm::text('type_request', null, ['class' => 'form-control', 'required' => 'required']) !!}

            </div>
        </div>

        <div class="form-group row d-flex justify-content-center">
            {!! CollectiveForm::label(' حوزه پیگیری :','',  ['class' => 'col-lg-2 text-center col-form-label']) !!}
            <div class="col-lg-10">
                {!! CollectiveForm::text('FollowUp_area', null, ['class' => 'form-control', 'required' => 'required']) !!}

            </div>
        </div>

        <div class="form-group row d-flex justify-content-center">
            {!! CollectiveForm::label(' شماره تماس : ', '', ['class' => 'col-lg-2 text-center col-form-label']) !!}
            <div class="col-lg-10">
                {!! CollectiveForm::text('phone_number', null, ['class' => 'form-control', 'required' => 'required']) !!}
                {{--<small class="form-text text-muted">{!! trans('ticketit::lang.create-ticket-brief-issue') !!}</small>--}}
            </div>
        </div>

        <div class="form-group row d-flex justify-content-center">
            {!! CollectiveForm::label('متن تیکت', trans('ticketit::lang.description',[],'fa') . trans('ticketit::lang.colon'), ['class' => 'col-lg-2 text-center col-form-label']) !!}
            <div class="col-lg-10">
                {!! CollectiveForm::textarea('content', null, ['class' => 'form-control summernote-editor', 'rows' => '5', 'required' => 'required']) !!}
                <small class="form-text text-right text-muted">{!! trans('ticketit::lang.create-ticket-describe-issue') !!}</small>
            </div>
        </div>

        <div class="form-group row d-flex justify-content-center">
            <div class="form-row col-lg-8 text-right mt-5 justify-content-start">
                {!! CollectiveForm::label('priority', trans('ticketit::lang.priority',[],'fa') . trans('ticketit::lang.colon'), ['class' => 'col-lg-1 col-form-label']) !!}
                <div class="col-lg-6">
                    {!! CollectiveForm::select('priority_id', $priorities, null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
        </div>
        <div class="form-group row d-flex justify-content-center">
                <div class="form-row col-lg-8 text-right mt-5 justify-content-start">
                    {!! CollectiveForm::label('category', trans('ticketit::lang.category',[],'fa') . trans('ticketit::lang.colon'), ['class' => 'col-lg-1 col-form-label']) !!}
                    <div class="col-lg-6">
                        {!! CollectiveForm::select('category_id', $categories, null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                </div>
        </div>`
            {!! CollectiveForm::hidden('agent_id', 'auto') !!}

        <br>
        <div class="form-group row">
            <div class="col-lg-8 mx-auto text-right offset-lg-2">
                {!! CollectiveForm::submit(trans('ticketit::lang.btn-submit',[],'fa'), ['class' => 'btn pl-5 pr-5 btn-primary']) !!}
                {!! link_to_route($setting->grab('main_route').'.index', trans('ticketit::lang.btn-back',[],'fa'), null, ['class' => 'btn btn-link']) !!}
            </div>
        </div>
    {!! CollectiveForm::close() !!}
@endsection

@section('footer')
    @include('ticketit::tickets.partials.summernote')
@append
