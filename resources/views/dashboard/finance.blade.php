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

            <div class="page-separator">
                <div class="page-separator__text">{{ __('dashboard.overview') }}</div>
            </div>

            <div class="row card-group-row mb-lg-8pt">
                <div class="col-lg-6 card-group-row__col">

                    <div class="card card-group-row__card">
                        <div class="card-header d-flex">
                            <div class="flex row">
                                <div class="col-auto d-flex flex-column">
                                    <div class="h2 mb-0">{{ $new_orders = \App\Models\Order::where('status','New')->whereYear('created_at', \Carbon\Carbon::now()->year)->count() }}</div>
                                    <div class="card-title">{{ __('dashboard.New_Orders') }}</div>
                                </div>
                                <div class="col-auto d-flex flex-column">
                                    <div class="h2 mb-0">{{ $canceled_orders = \App\Models\Order::where('status','Completed')->whereYear('created_at', \Carbon\Carbon::now()->year)->count() }}</div>
                                    <div class="card-title">{{ __('dashboard.Completed_Orders') }}</div>
                                </div>
                            </div>
                            <a href="#"><i class="material-icons text-50">more_horiz</i></a>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center">

                            <div class="mb-8pt">
                                <p class="d-flex align-items-center mb-4pt">
                                    <small class="flex lh-24pt"><strong>{{ __('dashboard.New_Orders') }}</strong></small>
                                    <small class="text-50 lh-24pt">due in 12 days</small>
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

                            <div>
                                <p class="d-flex align-items-center mb-4pt">
                                    <small class="flex lh-24pt"><strong>{{ __('dashboard.Completed_Orders') }}</strong></small>
                                    <small class="text-50 lh-24pt">due in 30 days</small>
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


                <div class="col-lg-6 card-group-row__col">

                    <div class="card card-group-row__card">
                        <div class="card-header p-0 nav border-0">
                            <div class="row no-gutters flex"
                                 role="tablist">
                                <div class="col-auto">
                                    <div class="p-card-header pr-0">
                                        <div class="pr-12pt">
                                            <div class="h2 mb-0">{{ $orders->sum('cash_on_delivery') }} {{ __('content.EGP') }}</div>
                                            <div class="d-flex flex-column">
                                                <p class="mb-0"><strong>{{ __('dashboard.Earnings') }}</strong></p>
                                                <small class="text-50">This billing cycle</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto flex">
                                    <div class="p-card-header d-flex flex-column align-items-end">
                                        <a href="#"><i class="material-icons text-50">more_horiz</i></a>
                                        <div class="flex d-flex align-items-center align-self-start">
                                            <div class="position-relative mr-12pt">
                                                <div class="text-center fullbleed d-flex align-items-center justify-content-center flex-column z-0">
                                                    <small>60%</small>
                                                </div>
                                                <canvas width="48"
                                                        height="48"
                                                        class="chart-canvas position-relative z-1 js-update-chart-progress-accent"
                                                        id="invoicesProgressChart"
                                                        data-chart-line-background-color="accent;gray"
                                                        data-chart-disable-tooltips="true"></canvas>
                                            </div>
                                            <small class="text-50">4 of 12 bells</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body position-relative o-hidden p-0">
                            <div class="chart z-0"
                                 style="height: 98px;">
                                <canvas id="earningsChart"
                                        class="chart-canvas js-update-chart-line"
                                        data-chart-line-border-color="primary,gray"
                                        data-chart-hide-axes="true"></canvas>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

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
                                        <small class="badge {{ $order->status_color }}" >{{ __("dashboard.{$order->status}")  }}</small>
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
