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
                                    <p class="card-subtitle text-50 d-flex align-items-center">
                                        31.5%
                                        <i class="material-icons text-accent ml-4pt icon-16pt">keyboard_arrow_up</i>
                                    </p>
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
                                    <p class="card-subtitle text-50 d-flex align-items-center">
                                        51.5%
                                        <i class="material-icons text-accent ml-4pt icon-16pt">keyboard_arrow_up</i>
                                    </p>
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
                                    <p class="card-subtitle text-50 d-flex align-items-center">
                                        20%
                                        <i class="material-icons text-accent ml-4pt icon-16pt">keyboard_arrow_up</i>
                                    </p>
                                </div>
                            </div>
                            <i class="material-icons icon-32pt text-20 ml-8pt">perm_identity</i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row card-group-row">
                <div class="col-lg-4 col-md-6 card-group-row__col">
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
                            <div class="h2 mb-0 mr-3">78</div>
                            <div class="flex">
                                <div class="card-title">{{ __('dashboard.Total_Customers') }}</div>
                                <div class="card-subtitle text-50 d-flex align-items-center">9.6% <i class="material-icons text-accent icon-16pt ml-4pt">keyboard_arrow_down</i></div>
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
                <div class="col-lg-4 col-md-12 card-group-row__col">
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
                <div class="col-lg-4 col-md-6 card-group-row__col">
                    <div class="card card-group-row__card">
                        <div class="card-body d-flex flex-row align-items-center flex-0">
                            <div class="h2 mb-0 mr-3">{{ $ordersCount }}</div>
                            <div class="flex">
                                <div class="card-title">{{ __('dashboard.Total_orders') }}</div>
                                <div class="card-subtitle text-50 d-flex align-items-center">92% <i class="material-icons text-accent icon-16pt ml-4pt">keyboard_arrow_up</i></div>
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
                <div class="col-lg-4 col-md-12 card-group-row__col">
                    <div class="card card-group-row__card">
                        <div class="card-body d-flex flex-row align-items-center flex-0">
                            <div class="h2 mb-0 mr-3">{{ $ordersAVG }} {{ __('dashboard.EGP')}}</div>
                            <div class="flex">
                                <div class="card-title">{{ __('dashboard.Average_order') }}</div>
                                <div class="card-subtitle text-50 d-flex align-items-center">6.7% <i class="material-icons text-accent icon-16pt ml-4pt">keyboard_arrow_up</i></div>
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
                                <div class="card-subtitle text-50 d-flex align-items-center">56.7% <i class="material-icons text-accent icon-16pt ml-4pt">keyboard_arrow_up</i></div>
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
                                        <h3 class="mb-0">59%</h3>
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
                                <span class="d-flex align-items-center"><i class="material-icons text-success icon-16pt mr-1">keyboard_arrow_up</i> 2.1%</span>
                            </small>
                            <small class="d-flex align-items-center font-weight-bold text-muted mb-1">
                                <span class="flex text-body">{{ __('dashboard.Close') }}</span>
                                <span class="mx-3">{{ $closedTicketsCount }}</span>
                                <span class="d-flex align-items-center"><i class="material-icons text-danger icon-16pt mr-1">keyboard_arrow_down</i> 4.8%</span>
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

                                            <span class="avatar-title rounded-circle">{{ initials($order->customer->user->full_name) }}</span>

                                        </div>
                                        <div class="media-body">

                                            <div class="d-flex flex-column">
                                                <p class="mb-0"><strong class="js-lists-values-employee-name">{{ $order->customer->user->full_name }}</strong></p>
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
                                        <small class="badge badge-{{ random_color() }}">{{ __("dashboard.{$order->status}")  }}</small>
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
                                <td class="text-50 js-lists-values-activity small">
                                    <div class="d-flex flex-column">
                                        <small class=""><strong>{{ date("F j, Y", strtotime($order->created_at)) }}</strong></small>
                                        <small class="text-50">{{ $order->created_at->diffForHumans() }}</small>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <a href="#" data-toggle="dropdown"
                                       class="btn text-50  text-70"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('dashboard.orders.create.airwaybell',$order->id) }}" class="dropdown-item active"><i class="material-icons ">receipt</i> Print Airwaybell</a>
                                        @can('show orders')
                                            <a href="{{ route('dashboard.orders.show',$order->id) }}" class="dropdown-item"><i class="material-icons ">visibility</i> View</a>
                                        @endcan
                                        @can('edit orders')
                                            <a href="{{ route('dashboard.orders.edit',$order->id) }}" class="dropdown-item"><i class="material-icons ">edit</i> Edit</a>
                                        @endcan
                                        @can('delete orders')
                                            <div class="dropdown-divider"></div>
                                            <a onclick="event.preventDefault(); document.getElementById('delete-form{{ $order->id }}').submit();" class="dropdown-item"><i class="material-icons ">delete</i> Delete</a>
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
