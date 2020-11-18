<nav>
    <ul class="nav nav-pills flex-column flex-md-row text-right pr-0 pr-md-2">
        <li role="presentation" class="nav-item">
            <a class="nav-link {!! $tools->fullUrlIs(route(Kordy\Ticketit\Models\Setting::grab('main_route') . '.index')) ? "active" : "" !!}"
                href="{{ route(Kordy\Ticketit\Models\Setting::grab('main_route') . '.index') }}">{{ trans('ticketit::lang.nav-active-tickets',[],'fa') }}
                <span class="badge badge-pill badge-secondary ">
                     <?php
                        if ($u->isAdmin()) {
                            echo Kordy\Ticketit\Models\Ticket::active()->count();
                        } elseif ($u->isAgent()) {
                            echo Kordy\Ticketit\Models\Ticket::active()->agentUserTickets($u->id)->count();
                        } else {
                            echo Kordy\Ticketit\Models\Ticket::userTickets($u->id)->active()->count();
                        }
                    ?>
                </span>
            </a>
        </li>
        <li role="presentation" class="nav-item">
            <a class="nav-link {!! $tools->fullUrlIs(route(Kordy\Ticketit\Models\Setting::grab('main_route') . '-complete')) ? "active" : "" !!}"
                 href="{{ route(Kordy\Ticketit\Models\Setting::grab('main_route') . '-complete') }}">{{ trans('ticketit::lang.nav-completed-tickets',[],'fa') }}
                <span class="badge badge-pill badge-secondary">
                    <?php
                        if ($u->isAdmin()) {
                            echo Kordy\Ticketit\Models\Ticket::complete()->count();
                        } elseif ($u->isAgent()) {
                            echo Kordy\Ticketit\Models\Ticket::complete()->agentUserTickets($u->id)->count();
                        } else {
                            echo Kordy\Ticketit\Models\Ticket::userTickets($u->id)->complete()->count();
                        }
                    ?>
                </span>
            </a>
        </li>

        @if($u->isAdmin())
            <li role="presentation" class="nav-item">
                <a class="nav-link {!! $tools->fullUrlIs(action('\Kordy\Ticketit\Controllers\DashboardController@index')) || Request::is($setting->grab('admin_route').'/indicator*') ? "active" : "" !!}"
                    href="{{ action('\Kordy\Ticketit\Controllers\DashboardController@index') }}">{{ trans('ticketit::admin.nav-dashboard',[],'fa') }}</a>
            </li>

            <li role="presentation" class="nav-item dropdown">

                <a class="nav-link dropdown-toggle {!!
                    $tools->fullUrlIs(action('\Kordy\Ticketit\Controllers\StatusesController@index').'*') ||
                    $tools->fullUrlIs(action('\Kordy\Ticketit\Controllers\PrioritiesController@index').'*') ||
                    $tools->fullUrlIs(action('\Kordy\Ticketit\Controllers\CategoriesController@index').'*') ||
                    /*$tools->fullUrlIs(action('\Kordy\Ticketit\Controllers\ConfigurationsController@index').'*') ||*/
                    $tools->fullUrlIs(action('\Kordy\Ticketit\Controllers\AdministratorsController@index').'*')
                    ? "active" : "" !!}"
                    data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    {{ trans('ticketit::admin.nav-settings',[],'fa') }}
                </a>
                <div class="dropdown-menu">
                    <a  class="dropdown-item {!! $tools->fullUrlIs(action('\Kordy\Ticketit\Controllers\StatusesController@index').'*') ? "active" : "" !!}"
                        href="{{ action('\Kordy\Ticketit\Controllers\StatusesController@index') }}">{{ trans('ticketit::admin.nav-statuses',[],'fa') }}</a>

                    <a  class="dropdown-item {!! $tools->fullUrlIs(action('\Kordy\Ticketit\Controllers\PrioritiesController@index').'*') ? "active" : "" !!}"
                        href="{{ action('\Kordy\Ticketit\Controllers\PrioritiesController@index') }}">{{ trans('ticketit::admin.nav-priorities',[],'fa') }}</a>


                    <a  class="dropdown-item {!! $tools->fullUrlIs(action('\Kordy\Ticketit\Controllers\CategoriesController@index').'*') ? "active" : "" !!}"
                        href="{{ action('\Kordy\Ticketit\Controllers\CategoriesController@index') }}">{{ trans('ticketit::admin.nav-categories',[],'fa') }}</a>

                    <a  class="dropdown-item {!! $tools->fullUrlIs(action('\Kordy\Ticketit\Controllers\ConfigurationsController@index').'*') ? "active" : "" !!}"
                        href="{{ action('\Kordy\Ticketit\Controllers\ConfigurationsController@index') }}">{{ trans('ticketit::admin.nav-configuration',[],'fa') }}</a>

                    <a  class="dropdown-item {!! $tools->fullUrlIs(action('\Kordy\Ticketit\Controllers\AdministratorsController@index').'*') ? "active" : "" !!}"
                        href="{{ action('\Kordy\Ticketit\Controllers\AdministratorsController@index')}}">{{ trans('ticketit::admin.nav-administrator',[],'fa') }}</a>

                </div>
            </li>
        @endif

    </ul>
</nav>
