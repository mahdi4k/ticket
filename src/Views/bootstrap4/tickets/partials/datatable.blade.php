<table class="ticketit-table table table-striped  dt-responsive nowrap" style="width:100%;direction: rtl">
    <thead>
        <tr>
            <td>{{ trans('ticketit::lang.table-id',[],'fa') }}</td>
            <td>{{ trans('ticketit::lang.table-subject',[],'fa') }}</td>

            <td>{{ 'نوع درخواست' }}</td>
            <td>{{ 'حوزه پیگیری' }}</td>

            <td>{{ trans('ticketit::lang.table-status',[],'fa') }}</td>
            <td>{{ trans('ticketit::lang.table-last-updated',[],'fa') }}</td>
            <td>{{ trans('ticketit::lang.table-agent',[],'fa') }}</td>
          @if( $u->isAgent() || $u->isAdmin() )
            <td>{{ trans('ticketit::lang.table-priority',[],'fa') }}</td>
            <td>{{ trans('ticketit::lang.table-owner',[],'fa') }}</td>
            <td>{{ trans('ticketit::lang.table-category',[],'fa') }}</td>
          @endif
        </tr>
    </thead>
</table>
