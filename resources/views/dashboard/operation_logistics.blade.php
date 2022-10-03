@extends('layouts.backend')

@section('title')
    {{ __('dashboard.Dashboard') }}
@endsection

@section('links')
    <li class="breadcrumb-item active">
        {{ __('dashboard.Dashboard') }}
    </li>
@endsection

@section('button-link')
    {{ route('dashboard') }}
@endsection

@section('button-icon')
    dashboard
@endsection

@section('button-title')
    {{ __('dashboard.Dashboard') }}
@endsection

@section('main_content')
    <!-- Page Content -->

    <div class="container page__container">
        <div class="page-section">

            {{--<div class="row mb-lg-8pt">
                <div class="col-lg-8">

                    <div class="page-separator">
                        <div class="page-separator__text">Overview</div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">

                            <div class="card ">
                                <div class="card-header pb-0 border-0 d-flex">
                                    <div class="flex">
                                        <div class="h2 mb-0">130</div>
                                        <p class="card-title">Contacts</p>
                                    </div>
                                    <i class="material-icons text-50">more_horiz</i>
                                </div>
                                <div class="card-body">
                                    <div class="text-50 mb-16pt">

                                        <div class="mb-4pt">
                                            <p class="d-flex align-items-center mb-0">
                                                <small class="flex lh-24pt">Customers</small>
                                                <small class="lh-24pt">70</small>
                                            </p>
                                            <div class="progress"
                                                 style="height: 4px;">
                                                <div class="progress-bar bg-primary"
                                                     role="progressbar"
                                                     style="width: 53%;"
                                                     aria-valuenow="53"
                                                     aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>

                                        <div class="mb-4pt">
                                            <p class="d-flex align-items-center mb-0">
                                                <small class="flex lh-24pt">Leads</small>
                                                <small class="lh-24pt">21</small>
                                            </p>
                                            <div class="progress"
                                                 style="height: 4px;">
                                                <div class="progress-bar bg-primary"
                                                     role="progressbar"
                                                     style="width: 16%;"
                                                     aria-valuenow="16"
                                                     aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>

                                        <div class="mb-4pt">
                                            <p class="d-flex align-items-center mb-0">
                                                <small class="flex lh-24pt">Opportunities</small>
                                                <small class="lh-24pt">12</small>
                                            </p>
                                            <div class="progress"
                                                 style="height: 4px;">
                                                <div class="progress-bar bg-primary"
                                                     role="progressbar"
                                                     style="width: 9%;"
                                                     aria-valuenow="9"
                                                     aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>

                                        <div>
                                            <p class="d-flex align-items-center mb-0">
                                                <small class="flex lh-24pt">Subscribers</small>
                                                <small class="lh-24pt">27</small>
                                            </p>
                                            <div class="progress"
                                                 style="height: 4px;">
                                                <div class="progress-bar bg-primary"
                                                     role="progressbar"
                                                     style="width: 20%;"
                                                     aria-valuenow="20"
                                                     aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="text-center">
                                        <a href=""
                                           class="btn btn-sm btn-outline-secondary">View contacts</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="card ">
                                <div class="card-header pb-0 border-0 d-flex">
                                    <div class="flex">
                                        <div class="h2 mb-0">53</div>
                                        <p class="card-title">Companies</p>
                                    </div>
                                    <i class="material-icons text-50">more_horiz</i>
                                </div>
                                <div class="card-body">
                                    <div class="text-50 mb-16pt">

                                        <div class="mb-4pt">
                                            <p class="d-flex align-items-center mb-0">
                                                <small class="flex lh-24pt">Customers</small>
                                                <small class="lh-24pt">20</small>
                                            </p>
                                            <div class="progress"
                                                 style="height: 4px;">
                                                <div class="progress-bar bg-primary"
                                                     role="progressbar"
                                                     style="width: 37%;"
                                                     aria-valuenow="37"
                                                     aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>

                                        <div class="mb-4pt">
                                            <p class="d-flex align-items-center mb-0">
                                                <small class="flex lh-24pt">Leads</small>
                                                <small class="lh-24pt">12</small>
                                            </p>
                                            <div class="progress"
                                                 style="height: 4px;">
                                                <div class="progress-bar bg-primary"
                                                     role="progressbar"
                                                     style="width: 22%;"
                                                     aria-valuenow="22"
                                                     aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>

                                        <div class="mb-4pt">
                                            <p class="d-flex align-items-center mb-0">
                                                <small class="flex lh-24pt">Opportunities</small>
                                                <small class="lh-24pt">7</small>
                                            </p>
                                            <div class="progress"
                                                 style="height: 4px;">
                                                <div class="progress-bar bg-primary"
                                                     role="progressbar"
                                                     style="width: 13%;"
                                                     aria-valuenow="13"
                                                     aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>

                                        <div>
                                            <p class="d-flex align-items-center mb-0">
                                                <small class="flex lh-24pt">Subscribers</small>
                                                <small class="lh-24pt">14</small>
                                            </p>
                                            <div class="progress"
                                                 style="height: 4px;">
                                                <div class="progress-bar bg-primary"
                                                     role="progressbar"
                                                     style="width: 26%;"
                                                     aria-valuenow="26"
                                                     aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="text-center">
                                        <a href=""
                                           class="btn btn-sm btn-outline-secondary">View companies</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row card-group-row">
                        <div class="col-md-6 card-group-row__col">

                            <div class="card card-group-row__card">
                                <div class="card-header d-flex">
                                    <div class="flex d-flex align-items-center">
                                        <div class="h2 mb-0 mr-3">20%</div>
                                        <div class="flex d-flex flex-column">
                                            <p class="card-title">Renewals</p>
                                            <p class="card-subtitle text-50">This month</p>
                                        </div>
                                    </div>
                                    <a href="#"><i class="material-icons text-50">more_horiz</i></a>
                                </div>
                                <div class="card-body d-flex flex-column justify-content-center">

                                    <div class="mb-4pt">
                                        <p class="d-flex align-items-center mb-0">
                                            <small class="flex lh-24pt"><strong>Rend A Car, Frankfurt</strong></small>
                                            <small class="text-50 lh-24pt">expires in 12 days</small>
                                        </p>
                                        <div class="progress"
                                             style="height: 4px;">
                                            <div class="progress-bar bg-warning"
                                                 role="progressbar"
                                                 style="width: 20%;"
                                                 aria-valuenow="20"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                    <div class="mb-4pt">
                                        <p class="d-flex align-items-center mb-0">
                                            <small class="flex lh-24pt"><strong>Rend A Car, Frankfurt</strong></small>
                                            <small class="text-50 lh-24pt">expires in 30 days</small>
                                        </p>
                                        <div class="progress"
                                             style="height: 4px;">
                                            <div class="progress-bar bg-accent"
                                                 role="progressbar"
                                                 style="width: 100%;"
                                                 aria-valuenow="100"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="col-md-6 card-group-row__col">

                            <div class="card card-group-row__card">
                                <div class="card-header p-0 nav border-0">
                                    <div class="row no-gutters flex"
                                         role="tablist">
                                        <div class="col-auto">
                                            <div class="p-card-header d-flex align-items-center">
                                                <div class="h2 mb-0 mr-3">20%</div>
                                                <div class="flex">
                                                    <p class="card-title">Conversion rate</p>
                                                    <div class="d-flex align-items-center">
                                                        <p class="text-50 mb-0 d-flex align-items-center mr-16pt">
                                                            <i class="indicator-line rounded bg-gray mr-8pt"></i>
                                                            <small>Lead</small>
                                                        </p>
                                                        <p class="text-50 mb-0 d-flex align-items-center">
                                                            <i class="indicator-line rounded bg-primary mr-8pt"></i>
                                                            <small>Cust.</small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto ml-sm-auto">
                                            <div class="p-card-header pl-0"><a href="#"><i class="material-icons text-50">more_horiz</i></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body position-relative o-hidden p-0">
                                    <div class="chart z-0"
                                         style="height: 125px;">
                                        <canvas id="viewsChart"
                                                class="chart-canvas js-update-chart-line js-update-chart-line-2nd-accent"
                                                data-chart-line-border-color="primary,gray"
                                                data-chart-suffix=" views"
                                                data-chart-hide-axes="true"></canvas>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-lg-4">

                    <div class="page-separator">
                        <div class="page-separator__text">Schedule</div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div class="flex">
                                    <strong class="card-title">Today</strong>
                                </div>
                                <i class="material-icons text-50">more_horiz</i>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-soft-warning mb-0 p-8pt">
                                <div class="d-flex align-items-start">
                                    <div class="mr-8pt">
                                        <i class="material-icons">error_outline</i>
                                    </div>
                                    <div class="flex">
                                        <small class="text-100">Nothing scheduled for today.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div class="flex">
                                    <strong class="card-title">Upcoming</strong>
                                    <span class="text-20">(2)</span>
                                </div>
                                <i class="material-icons text-50">more_horiz</i>
                            </div>

                        </div>

                        <div class="list-group list-group-flush">

                            <div class="list-group-item d-flex align-items-start p-16pt">
                                <div class="d-flex flex-column mr-16pt">
                                    <small class="text-uppercase text-50">FEB</small>
                                    <strong class="border-bottom-2 border-bottom-accent">18</strong>
                                </div>
                                <div class="flex">
                                    <div><strong>Developers Meeting</strong></div>

                                    <div class="lh-1 mb-16pt"><small class="text-50">Tuesday 17:30 - 18:30</small></div>

                                    <div class="avatar-group mb-16pt">

                                        <div class="avatar avatar-xs"
                                             data-toggle="tooltip"
                                             data-placement="top"
                                             title="Janell D.">
                                            <img src="../../public/images/256_rsz_1andy-lee-642320-unsplash.jpg"
                                                 alt="Avatar"
                                                 class="avatar-img rounded-circle">
                                        </div>

                                        <div class="avatar avatar-xs"
                                             data-toggle="tooltip"
                                             data-placement="top"
                                             title="Janell D.">
                                            <img src="../../public/images/256_michael-dam-258165-unsplash.jpg"
                                                 alt="Avatar"
                                                 class="avatar-img rounded-circle">
                                        </div>

                                        <div class="avatar avatar-xs"
                                             data-toggle="tooltip"
                                             data-placement="top"
                                             title="Janell D.">
                                            <img src="../../public/images/256_luke-porter-261779-unsplash.jpg"
                                                 alt="Avatar"
                                                 class="avatar-img rounded-circle">
                                        </div>

                                    </div>

                                    <p class="mb-0 text-50">Moreover the striking, brilliant and vivid colors are the reason why we are attracted to the posters that we see.</p>

                                </div>
                            </div>

                            <div class="list-group-item d-flex align-items-start p-16pt">
                                <div class="d-flex flex-column mr-16pt">
                                    <small class="text-uppercase text-50">FEB</small>
                                    <strong class="border-bottom-2 border-bottom-accent">17</strong>
                                </div>
                                <div class="flex">
                                    <div><strong>Meeting with Jane B.</strong></div>

                                    <div class="lh-1"><small class="text-50">Tuesday 17:30 - 18:30</small></div>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>--}}

            <div class="page-separator">
                <div class="page-separator__text">{{ __('dashboard.Orders') }}</div>
            </div>

            <div class="card dashboard-area-tabs p-relative o-hidden mb-32pt">
                <div class="card-header p-0 nav">
                    <div class="row no-gutters"
                         role="tablist">
                        <div class="col-auto">
                            <a href="#"
                               data-toggle="tab"
                               role="tab"
                               aria-selected="true"
                               class="dashboard-area-tabs__tab card-body d-flex flex-row align-items-center justify-content-start active">
                                {{--<span class="h2 mb-0 mr-3">{{ $category->id }}</span>--}}
                                <div class="avatar avatar-sm mr-8pt">
                                    <span class="avatar-title rounded bg-transparent text-black-100">
                                        <img src="{{ asset('backend/images/icon/all.png') }}"
                                             alt="Avatar"
                                             class="avatar-img ">
                                        </span>
                                </div>
                                <span class="flex d-flex flex-column">
                                        <strong>{{ __('dashboard.All_orders') }}</strong>
                                        <small class=" text-50">{{ __("dashboard.active")  }}</small>
                                        <span class="indicator-line rounded bg-success"></span>
                                    </span>
                            </a>
                        </div>
                        @foreach($types as $type)
                            <div class="col-auto border-left border-right">
                                <a href="#"
                                   data-toggle="tab"
                                   role="tab"
                                   data-name="{{ $type['name'] }}"
                                   aria-selected="false"
                                   class="dashboard-area-tabs__tab card-body d-flex flex-row align-items-center justify-content-start ">
                                    {{--<span class="h2 mb-0 mr-3">{{ $category->id }}</span>--}}
                                    <div class="avatar avatar-sm mr-8pt">
                                        <span class="avatar-title rounded bg-primary text-black-100">
                                           <img src="{{ asset('backend/images/icon/'.$type['image']) }}"
                                                alt="Avatar"
                                                class="avatar-img ">
                                        </span>
                                    </div>
                                    <span class="flex d-flex flex-column">
                                        <strong>{{ __("dashboard.{$type['name']}")  }}</strong>
                                        <small class="text-20" >{{ __("dashboard.{$type['description']}")  }}</small>
                                        <span class="indicator-line rounded bg-{{ $type['color'] }}"></span>
                                    </span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="table-responsive">
                    <div class="card-header">
                        <form class="form-inline">
                            <label class="mr-sm-2 form-label"
                                   for="myInputTextField">{{ __('dashboard.Filter_by') }}:</label>
                            <input type="text"
                                   class="form-control search mb-2 mr-sm-2 mb-sm-0"
                                   id="myInputTextField"
                                   placeholder="{{ __('dashboard.Search') }} ...">

                            <div class="col-lg d-flex flex-wrap buttons-datatable-add">
                                <div class="ml-lg-auto dropdown select-datatable-add">

                                </div>
                            </div>
                        </form>

                    </div>

                    <table
                        class="datatable-func display table mb-0 thead-border-top-0 table-nowrap"
                        style="width:100%">
                        <thead>
                        <tr>

                            <th style="width: 18px;"
                                class="pr-0 select-checkbox">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox"
                                           class="custom-control-input js-toggle-check-all"
                                           data-target="#projects"
                                           id="customCheckAll">
                                    <label class="custom-control-label"
                                           for="customCheckAll"><span class="text-hide">Toggle all</span></label>
                                </div>
                            </th>

                            <th>#</th>

                            <th>{{ __('dashboard.Tracking_No') }}</th>

                            <th>{{ __('dashboard.Customer_Info') }}</th>

                            <th>{{ __('dashboard.Type') }}</th>

                            <th>{{ __('dashboard.COD') }}</th>

                            <th>{{ __('dashboard.Status') }}</th>

                            <th>{{ __('dashboard.Created_At') }}</th>

                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="projects">
                        @foreach($orders as $order)
                            <tr class="">

                                <td class="pr-0">
                                    {{--<div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="checkItem" class="checkItem " name="checkItem"  />
                                        <label class=""
                                               for="checkItem"><span class="text-hide">Check</span></label>
                                    </div>--}}

                                    <div class="custom-control custom-checkbox">
                                        {{--<input type="checkbox"
                                               class="custom-control-input "
                                               checked=""
                                               id="customCheck1_5">
                                        <label class="custom-control-label"
                                               for="customCheck1_5"><span class="text-hide">Check</span></label>--}}
                                    </div>
                                </td>

                                <td></td>

                                <td>
                                    <a href="{{ route('dashboard.orders.show',$order->id) }}"
                                       class="chip text-underline">{{ $order->tracking_no }}</a>
                                </td>

                                <td>
                                    <div class="media flex-nowrap align-items-center" style="white-space: nowrap;">
                                        <div class="avatar avatar-sm mr-8pt">

                                            <span class="avatar-title rounded-circle">{{ initials($order->customer->user->full_name) }}</span>

                                        </div>
                                        <div class="media-body">

                                            <div class="d-flex flex-column">
                                                <p class="mb-0"><strong class="js-lists-values-name">{{ $order->customer->user->full_name }}</strong></p>
                                                <small class="js-lists-values-email text-50">{{ $order->customer->user->phone }}</small>
                                                <span class="indicator-line rounded {{ $order->customer->status == 'active' ? 'bg-success':'bg-danger' }}"></span>
                                            </div>

                                        </div>
                                    </div>

                                </td>

                                <td>
                                    <div class="media flex-nowrap align-items-center"
                                         style="white-space: nowrap;">
                                        <div class="avatar avatar-sm mr-8pt">
                                                <span class="avatar-title rounded bg-primary text-black-100">
                                                     <img src="{{ asset('backend/images/icon/'.$types[$order->type]['image']) }}"
                                                          alt="Avatar"
                                                          class="avatar-img ">
                                                </span>
                                        </div>
                                        <div class="media-body">
                                            <div class="d-flex flex-column">
                                                <small class=""><strong>{{ __("dashboard.{$order->type}")  }}</strong></small>
                                                <span class="indicator-line rounded bg-{{ $types[$order->type]['color'] }}"></span>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div href="#"
                                         class="chip chip-outline-secondary ">{{ $order->cash_on_delivery }} {{ __('dashboard.EGP')}}</div>
                                </td>

                                <td>
                                    <div class="d-flex flex-column">
                                        <small class="badge {{$order->status_color}}">{{ __("dashboard.{$order->status}")  }}</small>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex flex-column">
                                        <small class=""><strong>{{ date("F j, Y", strtotime($order->created_at)) }}</strong></small>
                                        <small class="text-50">{{ $order->created_at->diffForHumans() }}</small>
                                    </div>
                                </td>

                                <td class="text-right">
                                    <a href="#" data-toggle="dropdown"
                                       class="btn text-50  text-70"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('dashboard.orders.create.airwaybell',$order->id) }}" class="dropdown-item active"><i class="material-icons ">receipt</i> {{ __('dashboard.Airwaybell') }}</a>
                                        @can('show orders')
                                            <a href="{{ route('dashboard.orders.show',$order->id) }}" class="dropdown-item"><i class="material-icons ">visibility</i> {{ __('dashboard.View') }}</a>
                                        @endcan
                                        @can('edit orders')
                                            <a href="{{ route('dashboard.orders.edit',$order->id) }}" class="dropdown-item"><i class="material-icons ">edit</i> {{ __('dashboard.Edit') }}</a>
                                        @endcan
                                        @can('delete orders')
                                            <div class="dropdown-divider"></div>
                                            <a onclick="event.preventDefault(); document.getElementById('delete-form{{ $order->id }}').submit();" class="dropdown-item"><i class="material-icons ">delete</i> {{ __('dashboard.Delete') }}</a>
                                            <form id="delete-form{{ $order->id }}" action="{{ route('dashboard.orders.destroy',$order->id) }}" method="POST" class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th style="width: 18px;"
                                class="pr-0 select-checkbox">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox"
                                           class="custom-control-input js-toggle-check-all"
                                           data-target="#projects"
                                           id="customCheckAll1">
                                    <label class="custom-control-label"
                                           for="customCheckAll1"><span class="text-hide">Toggle all</span></label>
                                </div>
                            </th>

                            <th>#</th>

                            <th>{{ __('dashboard.Tracking_No') }}</th>

                            <th>{{ __('dashboard.Customer_Info') }}</th>

                            <th>{{ __('dashboard.Type') }}</th>

                            <th>{{ __('dashboard.COD') }}</th>

                            <th>{{ __('dashboard.Status') }}</th>

                            <th>{{ __('dashboard.Created_At') }}</th>

                            <th></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="card-footer p-8pt">

                    <ul class="pagination justify-content-start pagination-xsm m-0">
                        <li class="text-right info-pagination"></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <!-- // END Page Content -->
@endsection
