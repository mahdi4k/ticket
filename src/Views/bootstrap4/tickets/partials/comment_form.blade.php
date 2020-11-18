{!! CollectiveForm::open(['method' => 'POST', 'route' => $setting->grab('main_route').'-comment.store', 'class' => '']) !!}


{!! CollectiveForm::hidden('ticket_id', $ticket->id ) !!}


{!! CollectiveForm::textarea('content', null, ['class' => 'form-control rtl summernote-editor', 'rows' => "3"]) !!}

<div class="d-flex justify-content-end ">
    {!! CollectiveForm::submit( trans('ticketit::lang.reply'), ['class' => 'btn btn-primary text-right pull-right mt-3 px-4 mb-3']) !!}
</div>

{!! CollectiveForm::close() !!}
