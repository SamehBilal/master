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
    {{ route('dashboard.orders.create') }}
@endsection

@section('button-icon')
    add
@endsection

@section('button-title')
{{ __('dashboard.New_Order') }}
@endsection

@section('main_content')
    <div class="container page__container" >
        <div class="page-section">
            <div class="card card-form d-flex flex-column flex-sm-row mb-lg-32pt">
                <div class="card-form__body card-body-form-group flex">
                    <div class="row">
                        <div class="col-sm-auto">
                            <div class="form-group">
                                <label for="filter_name">{{ __('dashboard.Name') }}</label>
                                <input id="filter_name"
                                       type="text"
                                       class="form-control"
                                       placeholder="{{ __('dashboard.Search_by_name') }}">
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div class="form-group">
                                <label for="filter_category">{{ __('dashboard.Status') }}</label><br>
                                <select id="filter_category"
                                        class="custom-select"
                                        style="width: 200px;">
                                    <option value="all">Done</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div class="form-group">
                                <label for="filter_stock">{{ __('dashboard.Delivered?') }}</label>
                                <div class="custom-control custom-checkbox mt-sm-2">
                                    <input type="checkbox"
                                           class="custom-control-input"
                                           id="filter_stock"
                                           checked="">
                                    <label class="custom-control-label"
                                           for="filter_stock">{{ __('dashboard.Yes') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div class="form-group"
                                 style="width: 200px;">
                                <label for="filter_date">{{ __('dashboard.Order_date') }}</label>
                                <input id="filter_date"
                                       type="text"
                                       class="form-control"
                                       placeholder="Select date ..."
                                       value="13/03/2018 to 20/03/2018"
                                       data-toggle="flatpickr"
                                       data-flatpickr-mode="range"
                                       data-flatpickr-alt-format="d/m/Y"
                                       data-flatpickr-date-format="d/m/Y">
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn bg-alt border-left border-top border-top-sm-0 rounded-0"><i class="material-icons text-primary icon-20pt">refresh</i></button>
            </div>

            <div class="row card-group-row mb-lg-8pt">
                <div class="col-lg-4 col-md-6 card-group-row__col">
                    <div class="card card-group-row__card">
                        <div class="card-body d-flex align-items-center">
                            <div class="flex d-flex align-items-center">
                                <div class="h2 mb-0 mr-3">{{ $openTicketsCount }}</div>
                                <div class="flex">
                                    <div class="card-title">{{ __('dashboard.Tickets') }}</div>
                                    {{--<p class="card-subtitle text-50 d-flex align-items-center">
                                        31.5%
                                        <i class="material-icons text-accent ml-4pt icon-16pt">keyboard_arrow_up</i>
                                    </p>--}}
                                </div>
                            </div>
                            <i class="material-icons icon-32pt text-20 ml-8pt">confirmation_number</i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 card-group-row__col">
                    <div class="card card-group-row__card">
                        <div class="card-body d-flex align-items-center">
                            <div class="flex d-flex align-items-center">
                                <div class="h2 mb-0 mr-3">{{ $ordersCount }}</div>
                                <div class="flex">
                                    <div class="card-title">{{ __('dashboard.Orders') }}</div>
                                    {{--<p class="card-subtitle text-50 d-flex align-items-center">
                                        51.5%
                                        <i class="material-icons text-accent ml-4pt icon-16pt">keyboard_arrow_up</i>
                                    </p>--}}
                                </div>
                            </div>
                            <i class="material-icons icon-32pt text-20 ml-8pt">shopping_basket</i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 card-group-row__col">
                    <div class="card card-group-row__card">
                        <div class="card-body d-flex align-items-center">
                            <div class="flex d-flex align-items-center">
                                <div class="h2 mb-0 mr-3">{{ $customersCount }}</div>
                                <div class="flex">
                                    <div class="card-title">{{ __('dashboard.Customers') }}</div>
                                    {{--<p class="card-subtitle text-50 d-flex align-items-center">
                                        20%
                                        <i class="material-icons text-accent ml-4pt icon-16pt">keyboard_arrow_up</i>
                                    </p>--}}
                                </div>
                            </div>
                            <i class="material-icons icon-32pt text-20 ml-8pt">perm_identity</i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row card-group-row">
                <div class="col-lg-4 col-md-6 card-group-row__col hidden">
                    <div class="card card-group-row__card">
                        <div class="card-body d-flex flex-row align-items-center flex-0">
                            <div class="h2 mb-0 mr-3">82.99 {{ __('dashboard.EGP')}}</div>
                            <div class="flex">
                                <div class="card-title">{{ __('dashboard.Total_Sales') }}</div>
                                <div class="card-subtitle text-50 d-flex align-items-center">2.6% <i class="material-icons text-accent icon-16pt ml-4pt">keyboard_arrow_up</i></div>
                            </div>
                            <div class="ml-3 align-self-start">
                                <!--<div class="dropdown mb-2">
                                    <a href=""
                                       class="dropdown-toggle"
                                       data-toggle="dropdown"
                                       data-caret="false"><i class="material-icons text-50">more_horiz</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href=""
                                           class="dropdown-item">View report</a>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                        <div class="card-body flex-0">
                            <small class="d-flex align-items-center font-weight-bold text-muted mb-1">
                                <span class="flex text-body">{{ __('dashboard.This_Week') }}</span>
                                <span class="mx-3">50.99 {{ __('dashboard.EGP')}}</span>
                                <span class="d-flex align-items-center"><i class="material-icons text-success icon-16pt mr-1">keyboard_arrow_up</i> 3.2%</span>
                            </small>
                            <small class="d-flex align-items-center font-weight-bold text-muted">
                                <span class="flex text-body">{{ __('dashboard.Last_Week') }}</span>
                                <span class="mx-3">32.00 {{ __('dashboard.EGP')}}</span>
                                <span class="d-flex align-items-center"><i class="material-icons text-danger icon-16pt mr-1">keyboard_arrow_down</i> 7.0%</span>
                            </small>
                        </div>
                        <div class="card-body text-muted flex d-flex flex-column align-items-center justify-content-center">
                            <div class="chart w-100"
                                 style="height: 150px;">
                                <canvas class="chart-canvas js-update-chart-line js-update-chart-area"
                                        id="totalSalesChart"
                                        data-chart-legend="#totalSalesChartLegend"
                                        data-chart-line-background-color="gradient:primary"
                                        data-chart-line-background-opacity="0.24"
                                        data-chart-line-border-color="primary"
                                        data-chart-prefix="{{ __('dashboard.EGP')}}"
                                        data-chart-dark-mode="false">
                                    <span style="font-size: 1rem;"><strong>{{ __('dashboard.Total_Sales') }}</strong> chart goes here.</span>
                                </canvas>
                            </div>
                            <div id="totalSalesChartLegend"
                                 class="chart-legend chart-legend--horizontal mt-16pt"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 card-group-row__col">
                    <div class="card card-group-row__card">
                        <div class="card-body d-flex flex-row align-items-center flex-0">
                            <div class="h2 mb-0 mr-3">{{ $ordersCount }}</div>
                            <div class="flex">
                                <div class="card-title">{{ __('dashboard.Total_orders') }}</div>
                                {{--<div class="card-subtitle text-50 d-flex align-items-center">92% <i class="material-icons text-accent icon-16pt ml-4pt">keyboard_arrow_up</i></div>--}}
                            </div>
                            <div class="ml-3 align-self-start">
                                <!--<div class="dropdown mb-2">
                                    <a href=""
                                       class="dropdown-toggle"
                                       data-toggle="dropdown"
                                       data-caret="false"><i class="material-icons text-50">more_horiz</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href=""
                                           class="dropdown-item">View report</a>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                        <div class="card-body text-muted flex d-flex flex-column align-items-center justify-content-center">
                            <div class="chart w-100"
                                 style="height: 150px;">
                                <canvas class="chart-canvas js-update-chart-line"
                                        id="totalOrdersChart"
                                        data-chart-legend="#totalOrdersChartLegend"
                                        data-chart-line-border-color="primary"
                                        data-chart-dark-mode="false">
                                    <span style="font-size: 1rem;"><strong>{{ __('dashboard.Total_orders') }}</strong> chart goes here.</span>
                                </canvas>
                            </div>
                            <div id="totalOrdersChartLegend"
                                 class="chart-legend chart-legend--horizontal mt-16pt"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 card-group-row__col">
                    <div class="card card-group-row__card">
                        <div class="card-body d-flex flex-row align-items-center flex-0">
                            <div class="h2 mb-0 mr-3">78</div>
                            <div class="flex">
                                <div class="card-title">{{ __('dashboard.Total_Customers') }}</div>
                                {{--<div class="card-subtitle text-50 d-flex align-items-center">9.6% <i class="material-icons text-accent icon-16pt ml-4pt">keyboard_arrow_down</i></div>--}}
                            </div>
                            <div class="ml-3 align-self-start">
                                <!--<div class="dropdown mb-2">
                                    <a href=""
                                       class="dropdown-toggle"
                                       data-toggle="dropdown"
                                       data-caret="false"><i class="material-icons text-50">more_horiz</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href=""
                                           class="dropdown-item">View report</a>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                        <div class="card-body text-muted flex d-flex flex-column align-items-center justify-content-center">
                            <div class="chart w-100"
                                 style="height: 200px;">
                                <canvas class="chart-canvas js-update-chart-bar"
                                        id="totalVisitorsChart"
                                        data-chart-legend="#totalVisitorsChartLegend"
                                        data-chart-line-background-color="gradient:primary"
                                        data-chart-suffix="k"
                                        data-chart-dark-mode="false">
                                    <span style="font-size: 1rem;"><strong>{{ __('dashboard.Total_Customers') }}</strong> chart goes here.</span>
                                </canvas>
                            </div>
                            <div id="totalVisitorsChartLegend"
                                 class="chart-legend chart-legend--horizontal mt-16pt"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 card-group-row__col" style="display: none">
                    <div class="card card-group-row__card">
                        <div class="card-body d-flex flex-row align-items-center flex-0">
                            <div class="h2 mb-0 mr-3">5.43%</div>
                            <div class="flex">
                                <div class="card-title">{{ __('dashboard.Repeat_customer') }}</div>
                                <div class="card-subtitle text-50 d-flex align-items-center">2.6% <i class="material-icons text-accent icon-16pt ml-4pt">keyboard_arrow_up</i></div>
                            </div>
                            <div class="ml-3 align-self-start">
                                <!--<div class="dropdown mb-2">
                                    <a href=""
                                       class="dropdown-toggle"
                                       data-toggle="dropdown"
                                       data-caret="false"><i class="material-icons text-50">more_horiz</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href=""
                                           class="dropdown-item">View report</a>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                        <div class="card-body text-muted flex d-flex flex-column align-items-center justify-content-center">
                            <div class="chart w-100"
                                 style="height: 200px;">
                                <canvas class="chart-canvas js-update-chart-line-2nd-accent"
                                        id="repeatCustomerRateChart"
                                        data-chart-legend="#repeatCustomerRateChartLegend"
                                        data-chart-line-border-color="primary,gray"
                                        data-chart-suffix="%"
                                        data-chart-dark-mode="false">
                                    <span style="font-size: 1rem;"><strong>Repeat Customer Rate</strong> chart goes here.</span>
                                </canvas>
                            </div>
                            <div id="repeatCustomerRateChartLegend"
                                 class="chart-legend chart-legend--horizontal mt-16pt"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row card-group-row">
                <div class="col-lg-8 col-md-12 card-group-row__col">
                    <div class="card card-group-row__card">
                        <div class="card-body d-flex flex-row align-items-center flex-0">
                            <div class="h2 mb-0 mr-3">{{ round($ordersAVG, 2) }} {{ __('dashboard.EGP')}}</div>
                            <div class="flex">
                                <div class="card-title">{{ __('dashboard.Average_order') }}</div>
                                {{--<div class="card-subtitle text-50 d-flex align-items-center">6.7% <i class="material-icons text-accent icon-16pt ml-4pt">keyboard_arrow_up</i></div>--}}
                            </div>
                            <div class="ml-3 align-self-start">
                                <!--<div class="dropdown mb-2">
                                    <a href=""
                                       class="dropdown-toggle"
                                       data-toggle="dropdown"
                                       data-caret="false"><i class="material-icons text-50">more_horiz</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href=""
                                           class="dropdown-item">View report</a>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                        <div class="card-body text-muted flex d-flex flex-column align-items-center justify-content-center">
                            <div class="chart w-100"
                                 style="height: 150px;">
                                <canvas class="chart-canvas js-update-chart-line"
                                        id="averageOrderValueChart"
                                        data-chart-legend="#averageOrderValueChartLegend"
                                        data-chart-line-border-color="primary"
                                        data-chart-prefix="{{ __('dashboard.EGP')}}"
                                        data-chart-dark-mode="false">
                                    <span style="font-size: 1rem;"><strong>Average Order Value</strong> chart goes here.</span>
                                </canvas>
                            </div>
                            <div id="averageOrderValueChartLegend"
                                 class="chart-legend chart-legend--horizontal mt-16pt"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 card-group-row__col">
                    <div class="card card-group-row__card">
                        <div class="card-body d-flex flex-row align-items-center flex-0">
                            <div class="h2 mb-0 mr-3">{{ $openTicketsCount }}</div>
                            <div class="flex">
                                <div class="card-title">{{ __('dashboard.Tickets') }}</div>
                                {{--<div class="card-subtitle text-50 d-flex align-items-center">56.7% <i class="material-icons text-accent icon-16pt ml-4pt">keyboard_arrow_up</i></div>--}}
                            </div>
                            <div class="ml-3 align-self-start">
                                <!--<div class="dropdown mb-2">
                                    <a href=""
                                       class="dropdown-toggle"
                                       data-toggle="dropdown"
                                       data-caret="false"><i class="material-icons text-50">more_horiz</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href=""
                                           class="dropdown-item">View report</a>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                        <div class="card-body text-muted flex d-flex align-items-center">
                            <div class="chart w-100"
                                 style="height: 150px;">
                                <div class="position-relative">
                                    <div class="text-center fullbleed d-flex align-items-center justify-content-center flex-column z-0">
                                        <h3 class="mb-0">{{ ($openTicketsCount+$closedTicketsCount) != 0 ? round($openTicketsCount/($openTicketsCount+$closedTicketsCount),2)*100:0 }}%</h3>
                                        <small class="text-uppercase">{{ __('dashboard.Open') }}</small>
                                    </div>
                                    <canvas id="visitsByDeviceChart"
                                            class="chart-canvas"
                                            data-chart-line-background-color="primary;gray.300"
                                            data-chart-dark-mode="false">
                                        <span style="font-size: 1rem;"><strong>Tickets</strong> chart goes here.</span>
                                    </canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-body flex-0">
                            <small class="d-flex align-items-center font-weight-bold text-muted mb-1">
                                <span class="flex text-body">{{ __('dashboard.Open') }}</span>
                                <span class="mx-3">{{ $openTicketsCount }}</span>
                                {{--<span class="d-flex align-items-center"><i class="material-icons text-success icon-16pt mr-1">keyboard_arrow_up</i> 2.1%</span>--}}
                            </small>
                            <small class="d-flex align-items-center font-weight-bold text-muted mb-1">
                                <span class="flex text-body">{{ __('dashboard.Close') }}</span>
                                <span class="mx-3">{{ $closedTicketsCount }}</span>
                                {{--<span class="d-flex align-items-center"><i class="material-icons text-danger icon-16pt mr-1">keyboard_arrow_down</i> 4.8%</span>--}}
                            </small>
                            <!-- <small class="d-flex align-items-center font-weight-bold text-muted">
                                <span class="flex text-body">Tablet</span>
                                <span class="mx-3">0</span>
                                <span>&mdash;</span>
                            </small> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-lg-32pt">
                <div class="card-header d-flex align-items-center">
                    <div class="flatpickr-wrapper flex">
                        <div id="recent_orders_date">
                            <strong class="card-title d-block">{{ __('dashboard.Recent_Orders') }}</strong>
                        </div>
                    </div>
                </div>

                <div class="table-responsive"
                     data-toggle="lists"
                     data-lists-sort-by="js-lists-values-count-name"
                     data-lists-values='["js-lists-values-employee-name", "js-lists-values-employer-name", "js-lists-values-projects", "js-lists-values-activity", "js-lists-values-earnings"]'>

                    <table class="table mb-0 thead-border-top-0 table-nowrap">
                        <thead>
                        <tr>

                            <th style="width: 18px;"
                                class="pr-0"
                                data-sort="js-lists-values-count-name">
                               #
                            </th>

                            <th>
                                <a href="javascript:void(0)"
                                   class="sort"
                                   data-sort="js-lists-values-employee-name">
                                    {{ __('dashboard.Customer_Info') }}
                                </a>
                            </th>

                            <th style="width: 150px;">
                                <a href="javascript:void(0)"
                                   class="sort"
                                   data-sort="js-lists-values-employer-name">{{ __('dashboard.Tracking_No') }}</a>
                            </th>

                            <th style="width: 37px;">{{ __('dashboard.Status') }}</th>

                            <th style="width: 120px;">
                                <a href="javascript:void(0)"
                                   class="sort"
                                   data-sort="js-lists-values-activity">{{ __('dashboard.Type') }}</a>
                            </th>
                            <th style="width: 51px;">
                                <a href="javascript:void(0)"
                                   class="sort"
                                   data-sort="js-lists-values-earnings">{{ __('dashboard.Created_Date') }}</a>
                            </th>
                            <th style="width: 24px;"
                                class="pl-0"></th>
                        </tr>
                        </thead>
                        <tbody class="list"
                               id="users">
                        @foreach($orders as $order)
                            <tr>

                                <td class="pr-0">
                                   1
                                </td>

                                <td>

                                    <div class="media flex-nowrap align-items-center"
                                         style="white-space: nowrap;">
                                        <div class="avatar avatar-sm mr-8pt">

                                            <span class="avatar-title rounded-circle">{{ initials($order->client->full_name) }}</span>

                                        </div>
                                        <div class="media-body">

                                            <div class="d-flex flex-column">
                                                <p class="mb-0"><strong class="js-lists-values-employee-name">{{ $order->client->full_name }}</strong></p>
                                                <small class="js-lists-values-employee-email text-50"></small>
                                            </div>

                                        </div>
                                    </div>

                                </td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="#"
                                           class="text-warning"><i class="material-icons mr-8pt">cases</i></a>
                                        <a href=""
                                           class="text-70"><span class="js-lists-values-employer-name">{{ $order->tracking_no }}</span></a>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex flex-column">
                                        <small class="badge {{$order->status_color}}">{{ __("dashboard.{$order->status}")  }}</small>
                                    </div>
                                </td>

                                <td class="js-lists-values-earnings small">
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
                                <td data-sort="{{ $order->created_at }}" class="text-50 js-lists-values-activity small">
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
                    </table>
                </div>



            </div>


        </div>
    </div>
@endsection

@section('extra-scripts')
    <script>
        !function(t){var r={};function n(e){if(r[e])return r[e].exports;var o=r[e]={i:e,l:!1,exports:{}};return t[e].call(o.exports,o,o.exports,n),o.l=!0,o.exports}n.m=t,n.c=r,n.d=function(t,r,e){n.o(t,r)||Object.defineProperty(t,r,{enumerable:!0,get:e})},n.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},n.t=function(t,r){if(1&r&&(t=n(t)),8&r)return t;if(4&r&&"object"==typeof t&&t&&t.__esModule)return t;var e=Object.create(null);if(n.r(e),Object.defineProperty(e,"default",{enumerable:!0,value:t}),2&r&&"string"!=typeof t)for(var o in t)n.d(e,o,function(r){return t[r]}.bind(null,o));return e},n.n=function(t){var r=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(r,"a",r),r},n.o=function(t,r){return Object.prototype.hasOwnProperty.call(t,r)},n.p="/",n(n.s=567)}({0:function(t,r,n){(function(r){var n=function(t){return t&&t.Math==Math&&t};t.exports=n("object"==typeof globalThis&&globalThis)||n("object"==typeof window&&window)||n("object"==typeof self&&self)||n("object"==typeof r&&r)||Function("return this")()}).call(this,n(49))},1:function(t,r){t.exports=function(t){try{return!!t()}catch(t){return!0}}},10:function(t,r,n){var e=n(33),o=n(12);t.exports=function(t){return e(o(t))}},103:function(t,r,n){var e=n(3);r.f=e},104:function(t,r,n){"use strict";var e,o,i,a=n(94),u=n(9),c=n(2),f=n(3),s=n(36),l=f("iterator"),p=!1;[].keys&&("next"in(i=[].keys())?(o=a(a(i)))!==Object.prototype&&(e=o):p=!0),null==e&&(e={}),s||c(e,l)||u(e,l,(function(){return this})),t.exports={IteratorPrototype:e,BUGGY_SAFARI_ITERATORS:p}},105:function(t,r,n){var e=n(8),o=n(125);t.exports=Object.setPrototypeOf||("__proto__"in{}?function(){var t,r=!1,n={};try{(t=Object.getOwnPropertyDescriptor(Object.prototype,"__proto__").set).call(n,[]),r=n instanceof Array}catch(t){}return function(n,i){return e(n),o(i),r?t.call(n,i):n.__proto__=i,n}}():void 0)},11:function(t,r,n){var e=n(16),o=Math.min;t.exports=function(t){return t>0?o(e(t),9007199254740991):0}},110:function(t,r,n){var e=n(71),o=n(13),i=n(126);e||o(Object.prototype,"toString",i,{unsafe:!0})},119:function(t,r,n){"use strict";var e=n(13),o=n(8),i=n(1),a=n(77),u=RegExp.prototype,c=u.toString,f=i((function(){return"/a/b"!=c.call({source:"a",flags:"b"})})),s="toString"!=c.name;(f||s)&&e(RegExp.prototype,"toString",(function(){var t=o(this),r=String(t.source),n=t.flags;return"/"+r+"/"+String(void 0===n&&t instanceof RegExp&&!("flags"in u)?a.call(t):n)}),{unsafe:!0})},12:function(t,r){t.exports=function(t){if(null==t)throw TypeError("Can't call method on "+t);return t}},125:function(t,r,n){var e=n(4);t.exports=function(t){if(!e(t)&&null!==t)throw TypeError("Can't set "+String(t)+" as a prototype");return t}},126:function(t,r,n){"use strict";var e=n(71),o=n(92);t.exports=e?{}.toString:function(){return"[object "+o(this)+"]"}},13:function(t,r,n){var e=n(0),o=n(9),i=n(2),a=n(21),u=n(39),c=n(28),f=c.get,s=c.enforce,l=String(String).split("String");(t.exports=function(t,r,n,u){var c=!!u&&!!u.unsafe,f=!!u&&!!u.enumerable,p=!!u&&!!u.noTargetGet;"function"==typeof n&&("string"!=typeof r||i(n,"name")||o(n,"name",r),s(n).source=l.join("string"==typeof r?r:"")),t!==e?(c?!p&&t[r]&&(f=!0):delete t[r],f?t[r]=n:o(t,r,n)):f?t[r]=n:a(r,n)})(Function.prototype,"toString",(function(){return"function"==typeof this&&f(this).source||u(this)}))},132:function(t,r,n){var e=n(10),o=n(37).f,i={}.toString,a="object"==typeof window&&window&&Object.getOwnPropertyNames?Object.getOwnPropertyNames(window):[];t.exports.f=function(t){return a&&"[object Window]"==i.call(t)?function(t){try{return o(t)}catch(t){return a.slice()}}(t):o(e(t))}},134:function(t,r,n){"use strict";var e=n(6),o=n(0),i=n(20),a=n(36),u=n(5),c=n(31),f=n(58),s=n(1),l=n(2),p=n(35),y=n(4),v=n(8),d=n(17),g=n(10),h=n(18),m=n(14),b=n(53),S=n(66),x=n(37),O=n(132),w=n(48),M=n(25),A=n(7),j=n(47),T=n(9),C=n(13),k=n(30),D=n(27),Y=n(19),L=n(26),P=n(3),E=n(103),_=n(97),I=n(72),R=n(28),F=n(44).forEach,V=D("hidden"),z=P("toPrimitive"),N=R.set,G=R.getterFor("Symbol"),B=Object.prototype,U=o.Symbol,W=i("JSON","stringify"),H=M.f,$=A.f,q=O.f,J=j.f,K=k("symbols"),Q=k("op-symbols"),X=k("string-to-symbol-registry"),Z=k("symbol-to-string-registry"),tt=k("wks"),rt=o.QObject,nt=!rt||!rt.prototype||!rt.prototype.findChild,et=u&&s((function(){return 7!=b($({},"a",{get:function(){return $(this,"a",{value:7}).a}})).a}))?function(t,r,n){var e=H(B,r);e&&delete B[r],$(t,r,n),e&&t!==B&&$(B,r,e)}:$,ot=function(t,r){var n=K[t]=b(U.prototype);return N(n,{type:"Symbol",tag:t,description:r}),u||(n.description=r),n},it=f?function(t){return"symbol"==typeof t}:function(t){return Object(t)instanceof U},at=function(t,r,n){t===B&&at(Q,r,n),v(t);var e=h(r,!0);return v(n),l(K,e)?(n.enumerable?(l(t,V)&&t[V][e]&&(t[V][e]=!1),n=b(n,{enumerable:m(0,!1)})):(l(t,V)||$(t,V,m(1,{})),t[V][e]=!0),et(t,e,n)):$(t,e,n)},ut=function(t,r){v(t);var n=g(r),e=S(n).concat(lt(n));return F(e,(function(r){u&&!ct.call(n,r)||at(t,r,n[r])})),t},ct=function(t){var r=h(t,!0),n=J.call(this,r);return!(this===B&&l(K,r)&&!l(Q,r))&&(!(n||!l(this,r)||!l(K,r)||l(this,V)&&this[V][r])||n)},ft=function(t,r){var n=g(t),e=h(r,!0);if(n!==B||!l(K,e)||l(Q,e)){var o=H(n,e);return!o||!l(K,e)||l(n,V)&&n[V][e]||(o.enumerable=!0),o}},st=function(t){var r=q(g(t)),n=[];return F(r,(function(t){l(K,t)||l(Y,t)||n.push(t)})),n},lt=function(t){var r=t===B,n=q(r?Q:g(t)),e=[];return F(n,(function(t){!l(K,t)||r&&!l(B,t)||e.push(K[t])})),e};(c||(C((U=function(){if(this instanceof U)throw TypeError("Symbol is not a constructor");var t=arguments.length&&void 0!==arguments[0]?String(arguments[0]):void 0,r=L(t),n=function(t){this===B&&n.call(Q,t),l(this,V)&&l(this[V],r)&&(this[V][r]=!1),et(this,r,m(1,t))};return u&&nt&&et(B,r,{configurable:!0,set:n}),ot(r,t)}).prototype,"toString",(function(){return G(this).tag})),C(U,"withoutSetter",(function(t){return ot(L(t),t)})),j.f=ct,A.f=at,M.f=ft,x.f=O.f=st,w.f=lt,E.f=function(t){return ot(P(t),t)},u&&($(U.prototype,"description",{configurable:!0,get:function(){return G(this).description}}),a||C(B,"propertyIsEnumerable",ct,{unsafe:!0}))),e({global:!0,wrap:!0,forced:!c,sham:!c},{Symbol:U}),F(S(tt),(function(t){_(t)})),e({target:"Symbol",stat:!0,forced:!c},{for:function(t){var r=String(t);if(l(X,r))return X[r];var n=U(r);return X[r]=n,Z[n]=r,n},keyFor:function(t){if(!it(t))throw TypeError(t+" is not a symbol");if(l(Z,t))return Z[t]},useSetter:function(){nt=!0},useSimple:function(){nt=!1}}),e({target:"Object",stat:!0,forced:!c,sham:!u},{create:function(t,r){return void 0===r?b(t):ut(b(t),r)},defineProperty:at,defineProperties:ut,getOwnPropertyDescriptor:ft}),e({target:"Object",stat:!0,forced:!c},{getOwnPropertyNames:st,getOwnPropertySymbols:lt}),e({target:"Object",stat:!0,forced:s((function(){w.f(1)}))},{getOwnPropertySymbols:function(t){return w.f(d(t))}}),W)&&e({target:"JSON",stat:!0,forced:!c||s((function(){var t=U();return"[null]"!=W([t])||"{}"!=W({a:t})||"{}"!=W(Object(t))}))},{stringify:function(t,r,n){for(var e,o=[t],i=1;arguments.length>i;)o.push(arguments[i++]);if(e=r,(y(r)||void 0!==t)&&!it(t))return p(r)||(r=function(t,r){if("function"==typeof e&&(r=e.call(this,t,r)),!it(r))return r}),o[1]=r,W.apply(null,o)}});U.prototype[z]||T(U.prototype,z,U.prototype.valueOf),I(U,"Symbol"),Y[V]=!0},135:function(t,r,n){"use strict";var e=n(6),o=n(5),i=n(0),a=n(2),u=n(4),c=n(7).f,f=n(56),s=i.Symbol;if(o&&"function"==typeof s&&(!("description"in s.prototype)||void 0!==s().description)){var l={},p=function(){var t=arguments.length<1||void 0===arguments[0]?void 0:String(arguments[0]),r=this instanceof p?new s(t):void 0===t?s():s(t);return""===t&&(l[r]=!0),r};f(p,s);var y=p.prototype=s.prototype;y.constructor=p;var v=y.toString,d="Symbol(test)"==String(s("test")),g=/^Symbol\((.*)\)[^)]+$/;c(y,"description",{configurable:!0,get:function(){var t=u(this)?this.valueOf():this,r=v.call(t);if(a(l,t))return"";var n=d?r.slice(7,-1):r.replace(g,"$1");return""===n?void 0:n}}),e({global:!0,forced:!0},{Symbol:p})}},136:function(t,r,n){var e=n(1);t.exports=!e((function(){function t(){}return t.prototype.constructor=null,Object.getPrototypeOf(new t)!==t.prototype}))},137:function(t,r,n){var e=n(0),o=n(81),i=n(93),a=n(9),u=n(3),c=u("iterator"),f=u("toStringTag"),s=i.values;for(var l in o){var p=e[l],y=p&&p.prototype;if(y){if(y[c]!==s)try{a(y,c,s)}catch(t){y[c]=s}if(y[f]||a(y,f,l),o[l])for(var v in i)if(y[v]!==i[v])try{a(y,v,i[v])}catch(t){y[v]=i[v]}}}},14:function(t,r){t.exports=function(t,r){return{enumerable:!(1&t),configurable:!(2&t),writable:!(4&t),value:r}}},146:function(t,r,n){n(97)("iterator")},147:function(t,r,n){var e=n(6),o=n(173);e({target:"Array",stat:!0,forced:!n(151)((function(t){Array.from(t)}))},{from:o})},148:function(t,r,n){var e=n(8);t.exports=function(t,r,n,o){try{return o?r(e(n)[0],n[1]):r(n)}catch(r){var i=t.return;throw void 0!==i&&e(i.call(t)),r}}},149:function(t,r,n){var e=n(3),o=n(61),i=e("iterator"),a=Array.prototype;t.exports=function(t){return void 0!==t&&(o.Array===t||a[i]===t)}},15:function(t,r){var n={}.toString;t.exports=function(t){return n.call(t).slice(8,-1)}},150:function(t,r,n){var e=n(92),o=n(61),i=n(3)("iterator");t.exports=function(t){if(null!=t)return t[i]||t["@@iterator"]||o[e(t)]}},151:function(t,r,n){var e=n(3)("iterator"),o=!1;try{var i=0,a={next:function(){return{done:!!i++}},return:function(){o=!0}};a[e]=function(){return this},Array.from(a,(function(){throw 2}))}catch(t){}t.exports=function(t,r){if(!r&&!o)return!1;var n=!1;try{var i={};i[e]=function(){return{next:function(){return{done:n=!0}}}},t(i)}catch(t){}return n}},152:function(t,r,n){"use strict";var e=n(104).IteratorPrototype,o=n(53),i=n(14),a=n(72),u=n(61),c=function(){return this};t.exports=function(t,r,n){var f=r+" Iterator";return t.prototype=o(e,{next:i(1,n)}),a(t,f,!1,!0),u[f]=c,t}},153:function(t,r,n){"use strict";var e=n(95).charAt,o=n(28),i=n(98),a=o.set,u=o.getterFor("String Iterator");i(String,"String",(function(t){a(this,{type:"String Iterator",string:String(t),index:0})}),(function(){var t,r=u(this),n=r.string,o=r.index;return o>=n.length?{value:void 0,done:!0}:(t=e(n,o),r.index+=t.length,{value:t,done:!1})}))},16:function(t,r){var n=Math.ceil,e=Math.floor;t.exports=function(t){return isNaN(t=+t)?0:(t>0?e:n)(t)}},17:function(t,r,n){var e=n(12);t.exports=function(t){return Object(e(t))}},173:function(t,r,n){"use strict";var e=n(67),o=n(17),i=n(148),a=n(149),u=n(11),c=n(59),f=n(150);t.exports=function(t){var r,n,s,l,p,y,v=o(t),d="function"==typeof this?this:Array,g=arguments.length,h=g>1?arguments[1]:void 0,m=void 0!==h,b=f(v),S=0;if(m&&(h=e(h,g>2?arguments[2]:void 0,2)),null==b||d==Array&&a(b))for(n=new d(r=u(v.length));r>S;S++)y=m?h(v[S],S):v[S],c(n,S,y);else for(p=(l=b.call(v)).next,n=new d;!(s=p.call(l)).done;S++)y=m?i(l,h,[s.value,S],!0):s.value,c(n,S,y);return n.length=S,n}},18:function(t,r,n){var e=n(4);t.exports=function(t,r){if(!e(t))return t;var n,o;if(r&&"function"==typeof(n=t.toString)&&!e(o=n.call(t)))return o;if("function"==typeof(n=t.valueOf)&&!e(o=n.call(t)))return o;if(!r&&"function"==typeof(n=t.toString)&&!e(o=n.call(t)))return o;throw TypeError("Can't convert object to primitive value")}},19:function(t,r){t.exports={}},2:function(t,r){var n={}.hasOwnProperty;t.exports=function(t,r){return n.call(t,r)}},20:function(t,r,n){var e=n(57),o=n(0),i=function(t){return"function"==typeof t?t:void 0};t.exports=function(t,r){return arguments.length<2?i(e[t])||i(o[t]):e[t]&&e[t][r]||o[t]&&o[t][r]}},21:function(t,r,n){var e=n(0),o=n(9);t.exports=function(t,r){try{o(e,t,r)}catch(n){e[t]=r}return r}},24:function(t,r,n){var e=n(5),o=n(1),i=n(2),a=Object.defineProperty,u={},c=function(t){throw t};t.exports=function(t,r){if(i(u,t))return u[t];r||(r={});var n=[][t],f=!!i(r,"ACCESSORS")&&r.ACCESSORS,s=i(r,0)?r[0]:c,l=i(r,1)?r[1]:void 0;return u[t]=!!n&&!o((function(){if(f&&!e)return!0;var t={length:-1};f?a(t,1,{enumerable:!0,get:c}):t[1]=1,n.call(t,s,l)}))}},25:function(t,r,n){var e=n(5),o=n(47),i=n(14),a=n(10),u=n(18),c=n(2),f=n(38),s=Object.getOwnPropertyDescriptor;r.f=e?s:function(t,r){if(t=a(t),r=u(r,!0),f)try{return s(t,r)}catch(t){}if(c(t,r))return i(!o.f.call(t,r),t[r])}},26:function(t,r){var n=0,e=Math.random();t.exports=function(t){return"Symbol("+String(void 0===t?"":t)+")_"+(++n+e).toString(36)}},27:function(t,r,n){var e=n(30),o=n(26),i=e("keys");t.exports=function(t){return i[t]||(i[t]=o(t))}},28:function(t,r,n){var e,o,i,a=n(69),u=n(0),c=n(4),f=n(9),s=n(2),l=n(27),p=n(19),y=u.WeakMap;if(a){var v=new y,d=v.get,g=v.has,h=v.set;e=function(t,r){return h.call(v,t,r),r},o=function(t){return d.call(v,t)||{}},i=function(t){return g.call(v,t)}}else{var m=l("state");p[m]=!0,e=function(t,r){return f(t,m,r),r},o=function(t){return s(t,m)?t[m]:{}},i=function(t){return s(t,m)}}t.exports={set:e,get:o,has:i,enforce:function(t){return i(t)?o(t):e(t,{})},getterFor:function(t){return function(r){var n;if(!c(r)||(n=o(r)).type!==t)throw TypeError("Incompatible receiver, "+t+" required");return n}}}},29:function(t,r){t.exports=["constructor","hasOwnProperty","isPrototypeOf","propertyIsEnumerable","toLocaleString","toString","valueOf"]},3:function(t,r,n){var e=n(0),o=n(30),i=n(2),a=n(26),u=n(31),c=n(58),f=o("wks"),s=e.Symbol,l=c?s:s&&s.withoutSetter||a;t.exports=function(t){return i(f,t)||(u&&i(s,t)?f[t]=s[t]:f[t]=l("Symbol."+t)),f[t]}},30:function(t,r,n){var e=n(36),o=n(40);(t.exports=function(t,r){return o[t]||(o[t]=void 0!==r?r:{})})("versions",[]).push({version:"3.6.5",mode:e?"pure":"global",copyright:"© 2020 Denis Pushkarev (zloirock.ru)"})},31:function(t,r,n){var e=n(1);t.exports=!!Object.getOwnPropertySymbols&&!e((function(){return!String(Symbol())}))},33:function(t,r,n){var e=n(1),o=n(15),i="".split;t.exports=e((function(){return!Object("z").propertyIsEnumerable(0)}))?function(t){return"String"==o(t)?i.call(t,""):Object(t)}:Object},35:function(t,r,n){var e=n(15);t.exports=Array.isArray||function(t){return"Array"==e(t)}},36:function(t,r){t.exports=!1},37:function(t,r,n){var e=n(42),o=n(29).concat("length","prototype");r.f=Object.getOwnPropertyNames||function(t){return e(t,o)}},38:function(t,r,n){var e=n(5),o=n(1),i=n(43);t.exports=!e&&!o((function(){return 7!=Object.defineProperty(i("div"),"a",{get:function(){return 7}}).a}))},39:function(t,r,n){var e=n(40),o=Function.toString;"function"!=typeof e.inspectSource&&(e.inspectSource=function(t){return o.call(t)}),t.exports=e.inspectSource},4:function(t,r){t.exports=function(t){return"object"==typeof t?null!==t:"function"==typeof t}},40:function(t,r,n){var e=n(0),o=n(21),i=e["__core-js_shared__"]||o("__core-js_shared__",{});t.exports=i},41:function(t,r,n){var e=n(16),o=Math.max,i=Math.min;t.exports=function(t,r){var n=e(t);return n<0?o(n+r,0):i(n,r)}},42:function(t,r,n){var e=n(2),o=n(10),i=n(60).indexOf,a=n(19);t.exports=function(t,r){var n,u=o(t),c=0,f=[];for(n in u)!e(a,n)&&e(u,n)&&f.push(n);for(;r.length>c;)e(u,n=r[c++])&&(~i(f,n)||f.push(n));return f}},43:function(t,r,n){var e=n(0),o=n(4),i=e.document,a=o(i)&&o(i.createElement);t.exports=function(t){return a?i.createElement(t):{}}},44:function(t,r,n){var e=n(67),o=n(33),i=n(17),a=n(11),u=n(65),c=[].push,f=function(t){var r=1==t,n=2==t,f=3==t,s=4==t,l=6==t,p=5==t||l;return function(y,v,d,g){for(var h,m,b=i(y),S=o(b),x=e(v,d,3),O=a(S.length),w=0,M=g||u,A=r?M(y,O):n?M(y,0):void 0;O>w;w++)if((p||w in S)&&(m=x(h=S[w],w,b),t))if(r)A[w]=m;else if(m)switch(t){case 3:return!0;case 5:return h;case 6:return w;case 2:c.call(A,h)}else if(s)return!1;return l?-1:f||s?s:A}};t.exports={forEach:f(0),map:f(1),filter:f(2),some:f(3),every:f(4),find:f(5),findIndex:f(6)}},45:function(t,r){function n(r){return"function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?t.exports=n=function(t){return typeof t}:t.exports=n=function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t},n(r)}t.exports=n},47:function(t,r,n){"use strict";var e={}.propertyIsEnumerable,o=Object.getOwnPropertyDescriptor,i=o&&!e.call({1:2},1);r.f=i?function(t){var r=o(this,t);return!!r&&r.enumerable}:e},48:function(t,r){r.f=Object.getOwnPropertySymbols},49:function(t,r,n){var e,o=n(45);e=function(){return this}();try{e=e||new Function("return this")()}catch(t){"object"===("undefined"==typeof window?"undefined":o(window))&&(e=window)}t.exports=e},5:function(t,r,n){var e=n(1);t.exports=!e((function(){return 7!=Object.defineProperty({},1,{get:function(){return 7}})[1]}))},53:function(t,r,n){var e,o=n(8),i=n(90),a=n(29),u=n(19),c=n(91),f=n(43),s=n(27),l=s("IE_PROTO"),p=function(){},y=function(t){return"<script>"+t+"<\/script>"},v=function(){try{e=document.domain&&new ActiveXObject("htmlfile")}catch(t){}var t,r;v=e?function(t){t.write(y("")),t.close();var r=t.parentWindow.Object;return t=null,r}(e):((r=f("iframe")).style.display="none",c.appendChild(r),r.src=String("javascript:"),(t=r.contentWindow.document).open(),t.write(y("document.F=Object")),t.close(),t.F);for(var n=a.length;n--;)delete v.prototype[a[n]];return v()};u[l]=!0,t.exports=Object.create||function(t,r){var n;return null!==t?(p.prototype=o(t),n=new p,p.prototype=null,n[l]=t):n=v(),void 0===r?n:i(n,r)}},54:function(t,r,n){var e=n(1),o=n(3),i=n(74),a=o("species");t.exports=function(t){return i>=51||!e((function(){var r=[];return(r.constructor={})[a]=function(){return{foo:1}},1!==r[t](Boolean).foo}))}},55:function(t,r,n){var e=n(1),o=/#|\.prototype\./,i=function(t,r){var n=u[a(t)];return n==f||n!=c&&("function"==typeof r?e(r):!!r)},a=i.normalize=function(t){return String(t).replace(o,".").toLowerCase()},u=i.data={},c=i.NATIVE="N",f=i.POLYFILL="P";t.exports=i},56:function(t,r,n){var e=n(2),o=n(70),i=n(25),a=n(7);t.exports=function(t,r){for(var n=o(r),u=a.f,c=i.f,f=0;f<n.length;f++){var s=n[f];e(t,s)||u(t,s,c(r,s))}}},567:function(t,r,n){t.exports=n(568)},568:function(t,r,n){"use strict";n.r(r);n(569)},569:function(t,r,n){function e(t,r){var n;if("undefined"==typeof Symbol||null==t[Symbol.iterator]){if(Array.isArray(t)||(n=function(t,r){if(!t)return;if("string"==typeof t)return o(t,r);var n=Object.prototype.toString.call(t).slice(8,-1);"Object"===n&&t.constructor&&(n=t.constructor.name);if("Map"===n||"Set"===n)return Array.from(t);if("Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))return o(t,r)}(t))||r&&t&&"number"==typeof t.length){n&&(t=n);var e=0,i=function(){};return{s:i,n:function(){return e>=t.length?{done:!0}:{done:!1,value:t[e++]}},e:function(t){throw t},f:i}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var a,u=!0,c=!1;return{s:function(){n=t[Symbol.iterator]()},n:function(){var t=n.next();return u=t.done,t},e:function(t){c=!0,a=t},f:function(){try{u||null==n.return||n.return()}finally{if(c)throw a}}}}function o(t,r){(null==r||r>t.length)&&(r=t.length);for(var n=0,e=new Array(r);n<r;n++)e[n]=t[n];return e}n(134),n(135),n(146),n(147),n(93),n(80),n(99),n(110),n(119),n(153),n(137),function(){"use strict";function t(t,r){return Math.floor(Math.random()*(r-t+1))+t}window["moment-range"].extendMoment(moment);!function(r){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"area",o=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};o=Chart.helpers.merge({title:{display:!0,fontSize:12,fontColor:"rgba(54, 76, 102, 0.54)",position:"top",text:"SALES OVER TIME"},scales:{xAxes:[{ticks:{padding:4,callback:function(t){return t}},gridLines:{display:!1},type:"time",time:{unit:"day",displayFormats:{day:"D/MM"},stepSize:2,maxTicksLimit:7,autoSkip:!1}}]}},o);var i,a=[],u=moment().subtract(6,"days").format("YYYY-MM-DD"),c=moment().format("YYYY-MM-DD"),f=moment.range(u,c),s=e(f.by("days"));try{for(s.s();!(i=s.n()).done;){var l=i.value;a.push({y:t(2,40),x:l.toDate()})}}catch(t){s.e(t)}finally{s.f()}a={datasets:[{label:"Total Sales",data:a}]};Charts.create(r,n,o,a)}("#totalSalesChart"),function(r){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"roundedBar",o=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};o=Chart.helpers.merge({title:{display:!0,fontSize:12,fontColor:"rgba(54, 76, 102, 0.54)",position:"top",text:"VISITORS OVER TIME"},scales:{xAxes:[{ticks:{padding:4,callback:function(t){return t}},offset:!0,gridLines:{display:!1},type:"time",time:{unit:"day",displayFormats:{day:"D/MM"},stepSize:2,maxTicksLimit:7}}]}},o);var i,a=[],u=moment().subtract(6,"days").format("YYYY-MM-DD"),c=moment().format("YYYY-MM-DD"),f=moment.range(u,c),s=e(f.by("days"));try{for(s.s();!(i=s.n()).done;){var l=i.value;a.push({y:t(10,30),x:l.toDate()})}}catch(t){s.e(t)}finally{s.f()}a={datasets:[{label:"Total Visitors",data:a,barThickness:20}]};Charts.create(r,n,o,a)}("#totalVisitorsChart"),function(r){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"line",o=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};o=Chart.helpers.merge({title:{display:!0,fontSize:12,fontColor:"rgba(54, 76, 102, 0.54)",position:"top",text:"CUSTOMERS"},scales:{yAxes:[{ticks:{autoSkip:!1,autoSkipPadding:0,padding:4,maxTicksLimit:4,callback:function(t){return t}}}],xAxes:[{ticks:{padding:4,callback:function(t){return t}},gridLines:{display:!1},type:"time",time:{unit:"day",displayFormats:{day:"D/MM"},stepSize:2,maxTicksLimit:7,autoSkip:!1}}]}},o);var i,a=[],u=[],c=moment().subtract(6,"days").format("YYYY-MM-DD"),f=moment().format("YYYY-MM-DD"),s=moment.range(c,f),l=e(s.by("days"));try{for(l.s();!(i=l.n()).done;){var p=i.value;a.push({y:t(0,5),x:p.toDate()}),u.push({y:t(5,10),x:p.toDate()})}}catch(t){l.e(t)}finally{l.f()}var y={datasets:[{label:"First time",data:a},{label:"Returning",data:u}]};Charts.create(r,n,o,y)}("#repeatCustomerRateChart"),function(r){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"line",o=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};o=Chart.helpers.merge({title:{display:!0,fontSize:12,fontColor:"rgba(54, 76, 102, 0.54)",position:"top",text:"ORDERS OVER TIME"},scales:{yAxes:[{ticks:{stepSize:1,callback:function(t){return t}}}],xAxes:[{ticks:{padding:4,callback:function(t){return t}},gridLines:{display:!1},type:"time",time:{unit:"day",displayFormats:{day:"D/MM"},stepSize:2,maxTicksLimit:7,autoSkip:!1}}]}},o);var i,a=[],u=moment().subtract(6,"days").format("YYYY-MM-DD"),c=moment().format("YYYY-MM-DD"),f=moment.range(u,c),s=e(f.by("days"));try{for(s.s();!(i=s.n()).done;){var l=i.value;a.push({y:t(0,2),x:l.toDate()})}}catch(t){s.e(t)}finally{s.f()}a={datasets:[{label:"Total Orders",data:a}]};Charts.create(r,n,o,a)}("#totalOrdersChart"),function(r){var n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"line",o=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};o=Chart.helpers.merge({title:{display:!0,fontSize:12,fontColor:"rgba(54, 76, 102, 0.54)",position:"top",text:"ORDER VALUE"},scales:{yAxes:[{ticks:{stepSize:10}}],xAxes:[{ticks:{padding:4,callback:function(t){return t}},gridLines:{display:!1},type:"time",time:{unit:"day",displayFormats:{day:"D/MM"},stepSize:2,maxTicksLimit:7,autoSkip:!1}}]}},o);var i,a=[],u=moment().subtract(6,"days").format("YYYY-MM-DD"),c=moment().format("YYYY-MM-DD"),f=moment.range(u,c),s=e(f.by("days"));try{for(s.s();!(i=s.n()).done;){var l=i.value;a.push({y:t(0,50),x:l.toDate()})}}catch(t){s.e(t)}finally{s.f()}a={datasets:[{label:"Order Value",data:a}]};Charts.create(r,n,o,a)}("#averageOrderValueChart"),function(t){var r=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"doughnut",n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{},e={labels:["Desktop","Mobile","Tablet"],datasets:[{data:[267,184,0]}]};Charts.create(t,r,n,e)}("#visitsByDeviceChart"),function(t){var r=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"line",n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};n=Chart.helpers.merge({scales:{xAxes:[{gridLines:{display:!1},type:"time",time:{unit:"day"}}]}},n);var o,i=[],a=[],u=moment().subtract(7,"days").format("YYYY-MM-DD"),c=moment().format("YYYY-MM-DD"),f=moment.range(u,c),s=e(f.by("days"));try{for(s.s();!(o=s.n()).done;){var l=o.value,p=Math.round(Math.floor(300*Math.random())+10);i.push({y:p,x:l.toDate()}),a.push({y:Math.round(.1*p),x:l.toDate()})}}catch(t){s.e(t)}finally{s.f()}i={datasets:[{label:"Conversion",data:a},{label:"Views",data:i}]};Charts.create(t,r,n,i)}("#viewsChart")}()},57:function(t,r,n){var e=n(0);t.exports=e},58:function(t,r,n){var e=n(31);t.exports=e&&!Symbol.sham&&"symbol"==typeof Symbol.iterator},59:function(t,r,n){"use strict";var e=n(18),o=n(7),i=n(14);t.exports=function(t,r,n){var a=e(r);a in t?o.f(t,a,i(0,n)):t[a]=n}},6:function(t,r,n){var e=n(0),o=n(25).f,i=n(9),a=n(13),u=n(21),c=n(56),f=n(55);t.exports=function(t,r){var n,s,l,p,y,v=t.target,d=t.global,g=t.stat;if(n=d?e:g?e[v]||u(v,{}):(e[v]||{}).prototype)for(s in r){if(p=r[s],l=t.noTargetGet?(y=o(n,s))&&y.value:n[s],!f(d?s:v+(g?".":"#")+s,t.forced)&&void 0!==l){if(typeof p==typeof l)continue;c(p,l)}(t.sham||l&&l.sham)&&i(p,"sham",!0),a(n,s,p,t)}}},60:function(t,r,n){var e=n(10),o=n(11),i=n(41),a=function(t){return function(r,n,a){var u,c=e(r),f=o(c.length),s=i(a,f);if(t&&n!=n){for(;f>s;)if((u=c[s++])!=u)return!0}else for(;f>s;s++)if((t||s in c)&&c[s]===n)return t||s||0;return!t&&-1}};t.exports={includes:a(!0),indexOf:a(!1)}},61:function(t,r){t.exports={}},65:function(t,r,n){var e=n(4),o=n(35),i=n(3)("species");t.exports=function(t,r){var n;return o(t)&&("function"!=typeof(n=t.constructor)||n!==Array&&!o(n.prototype)?e(n)&&null===(n=n[i])&&(n=void 0):n=void 0),new(void 0===n?Array:n)(0===r?0:r)}},66:function(t,r,n){var e=n(42),o=n(29);t.exports=Object.keys||function(t){return e(t,o)}},67:function(t,r,n){var e=n(68);t.exports=function(t,r,n){if(e(t),void 0===r)return t;switch(n){case 0:return function(){return t.call(r)};case 1:return function(n){return t.call(r,n)};case 2:return function(n,e){return t.call(r,n,e)};case 3:return function(n,e,o){return t.call(r,n,e,o)}}return function(){return t.apply(r,arguments)}}},68:function(t,r){t.exports=function(t){if("function"!=typeof t)throw TypeError(String(t)+" is not a function");return t}},69:function(t,r,n){var e=n(0),o=n(39),i=e.WeakMap;t.exports="function"==typeof i&&/native code/.test(o(i))},7:function(t,r,n){var e=n(5),o=n(38),i=n(8),a=n(18),u=Object.defineProperty;r.f=e?u:function(t,r,n){if(i(t),r=a(r,!0),i(n),o)try{return u(t,r,n)}catch(t){}if("get"in n||"set"in n)throw TypeError("Accessors not supported");return"value"in n&&(t[r]=n.value),t}},70:function(t,r,n){var e=n(20),o=n(37),i=n(48),a=n(8);t.exports=e("Reflect","ownKeys")||function(t){var r=o.f(a(t)),n=i.f;return n?r.concat(n(t)):r}},71:function(t,r,n){var e={};e[n(3)("toStringTag")]="z",t.exports="[object z]"===String(e)},72:function(t,r,n){var e=n(7).f,o=n(2),i=n(3)("toStringTag");t.exports=function(t,r,n){t&&!o(t=n?t:t.prototype,i)&&e(t,i,{configurable:!0,value:r})}},74:function(t,r,n){var e,o,i=n(0),a=n(85),u=i.process,c=u&&u.versions,f=c&&c.v8;f?o=(e=f.split("."))[0]+e[1]:a&&(!(e=a.match(/Edge\/(\d+)/))||e[1]>=74)&&(e=a.match(/Chrome\/(\d+)/))&&(o=e[1]),t.exports=o&&+o},77:function(t,r,n){"use strict";var e=n(8);t.exports=function(){var t=e(this),r="";return t.global&&(r+="g"),t.ignoreCase&&(r+="i"),t.multiline&&(r+="m"),t.dotAll&&(r+="s"),t.unicode&&(r+="u"),t.sticky&&(r+="y"),r}},79:function(t,r,n){var e=n(3),o=n(53),i=n(7),a=e("unscopables"),u=Array.prototype;null==u[a]&&i.f(u,a,{configurable:!0,value:o(null)}),t.exports=function(t){u[a][t]=!0}},8:function(t,r,n){var e=n(4);t.exports=function(t){if(!e(t))throw TypeError(String(t)+" is not an object");return t}},80:function(t,r,n){"use strict";var e=n(6),o=n(4),i=n(35),a=n(41),u=n(11),c=n(10),f=n(59),s=n(3),l=n(54),p=n(24),y=l("slice"),v=p("slice",{ACCESSORS:!0,0:0,1:2}),d=s("species"),g=[].slice,h=Math.max;e({target:"Array",proto:!0,forced:!y||!v},{slice:function(t,r){var n,e,s,l=c(this),p=u(l.length),y=a(t,p),v=a(void 0===r?p:r,p);if(i(l)&&("function"!=typeof(n=l.constructor)||n!==Array&&!i(n.prototype)?o(n)&&null===(n=n[d])&&(n=void 0):n=void 0,n===Array||void 0===n))return g.call(l,y,v);for(e=new(void 0===n?Array:n)(h(v-y,0)),s=0;y<v;y++,s++)y in l&&f(e,s,l[y]);return e.length=s,e}})},81:function(t,r){t.exports={CSSRuleList:0,CSSStyleDeclaration:0,CSSValueList:0,ClientRectList:0,DOMRectList:0,DOMStringList:0,DOMTokenList:1,DataTransferItemList:0,FileList:0,HTMLAllCollection:0,HTMLCollection:0,HTMLFormElement:0,HTMLSelectElement:0,MediaList:0,MimeTypeArray:0,NamedNodeMap:0,NodeList:1,PaintRequestList:0,Plugin:0,PluginArray:0,SVGLengthList:0,SVGNumberList:0,SVGPathSegList:0,SVGPointList:0,SVGStringList:0,SVGTransformList:0,SourceBufferList:0,StyleSheetList:0,TextTrackCueList:0,TextTrackList:0,TouchList:0}},85:function(t,r,n){var e=n(20);t.exports=e("navigator","userAgent")||""},9:function(t,r,n){var e=n(5),o=n(7),i=n(14);t.exports=e?function(t,r,n){return o.f(t,r,i(1,n))}:function(t,r,n){return t[r]=n,t}},90:function(t,r,n){var e=n(5),o=n(7),i=n(8),a=n(66);t.exports=e?Object.defineProperties:function(t,r){i(t);for(var n,e=a(r),u=e.length,c=0;u>c;)o.f(t,n=e[c++],r[n]);return t}},91:function(t,r,n){var e=n(20);t.exports=e("document","documentElement")},92:function(t,r,n){var e=n(71),o=n(15),i=n(3)("toStringTag"),a="Arguments"==o(function(){return arguments}());t.exports=e?o:function(t){var r,n,e;return void 0===t?"Undefined":null===t?"Null":"string"==typeof(n=function(t,r){try{return t[r]}catch(t){}}(r=Object(t),i))?n:a?o(r):"Object"==(e=o(r))&&"function"==typeof r.callee?"Arguments":e}},93:function(t,r,n){"use strict";var e=n(10),o=n(79),i=n(61),a=n(28),u=n(98),c=a.set,f=a.getterFor("Array Iterator");t.exports=u(Array,"Array",(function(t,r){c(this,{type:"Array Iterator",target:e(t),index:0,kind:r})}),(function(){var t=f(this),r=t.target,n=t.kind,e=t.index++;return!r||e>=r.length?(t.target=void 0,{value:void 0,done:!0}):"keys"==n?{value:e,done:!1}:"values"==n?{value:r[e],done:!1}:{value:[e,r[e]],done:!1}}),"values"),i.Arguments=i.Array,o("keys"),o("values"),o("entries")},94:function(t,r,n){var e=n(2),o=n(17),i=n(27),a=n(136),u=i("IE_PROTO"),c=Object.prototype;t.exports=a?Object.getPrototypeOf:function(t){return t=o(t),e(t,u)?t[u]:"function"==typeof t.constructor&&t instanceof t.constructor?t.constructor.prototype:t instanceof Object?c:null}},95:function(t,r,n){var e=n(16),o=n(12),i=function(t){return function(r,n){var i,a,u=String(o(r)),c=e(n),f=u.length;return c<0||c>=f?t?"":void 0:(i=u.charCodeAt(c))<55296||i>56319||c+1===f||(a=u.charCodeAt(c+1))<56320||a>57343?t?u.charAt(c):i:t?u.slice(c,c+2):a-56320+(i-55296<<10)+65536}};t.exports={codeAt:i(!1),charAt:i(!0)}},97:function(t,r,n){var e=n(57),o=n(2),i=n(103),a=n(7).f;t.exports=function(t){var r=e.Symbol||(e.Symbol={});o(r,t)||a(r,t,{value:i.f(t)})}},98:function(t,r,n){"use strict";var e=n(6),o=n(152),i=n(94),a=n(105),u=n(72),c=n(9),f=n(13),s=n(3),l=n(36),p=n(61),y=n(104),v=y.IteratorPrototype,d=y.BUGGY_SAFARI_ITERATORS,g=s("iterator"),h=function(){return this};t.exports=function(t,r,n,s,y,m,b){o(n,r,s);var S,x,O,w=function(t){if(t===y&&C)return C;if(!d&&t in j)return j[t];switch(t){case"keys":case"values":case"entries":return function(){return new n(this,t)}}return function(){return new n(this)}},M=r+" Iterator",A=!1,j=t.prototype,T=j[g]||j["@@iterator"]||y&&j[y],C=!d&&T||w(y),k="Array"==r&&j.entries||T;if(k&&(S=i(k.call(new t)),v!==Object.prototype&&S.next&&(l||i(S)===v||(a?a(S,v):"function"!=typeof S[g]&&c(S,g,h)),u(S,M,!0,!0),l&&(p[M]=h))),"values"==y&&T&&"values"!==T.name&&(A=!0,C=function(){return T.call(this)}),l&&!b||j[g]===C||c(j,g,C),p[r]=C,y)if(x={values:w("values"),keys:m?C:w("keys"),entries:w("entries")},b)for(O in x)(d||A||!(O in j))&&f(j,O,x[O]);else e({target:r,proto:!0,forced:d||A},x);return x}},99:function(t,r,n){var e=n(5),o=n(7).f,i=Function.prototype,a=i.toString,u=/^\s*function ([^ (]*)/;e&&!("name"in i)&&o(i,"name",{configurable:!0,get:function(){try{return a.call(this).match(u)[1]}catch(t){return""}}})}});
    </script>
@endsection
