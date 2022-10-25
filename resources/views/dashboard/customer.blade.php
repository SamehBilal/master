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
    <!-- Page Content -->

    <div class="container page__container page__container page-section">

        <div class="page-separator">
            <div class="page-separator__text">{{ __('dashboard.overview') }}</div>
        </div>

        <div class="row card-group-row mb-lg-8pt">
            <div class="col-lg-4 col-md-6 card-group-row__col">
                <div class="card card-group-row__card p-relative o-hidden">
                    <div class="card-body d-flex flex-row align-items-center">
                        <div class="flex">
                            <p class="card-title d-flex align-items-center">
                                <strong>{{ __('dashboard.New_Orders') }}</strong>
                                <span class="text-20 ml-8pt">{{ \Carbon\Carbon::now()->year }}</span>
                                {{--<i class="material-icons text-accent ml-4pt icon-16pt">keyboard_arrow_up</i>--}}
                            </p>
                            <span class="h2 m-0">{{ $new_orders = \App\Models\Order::where('status','New')->where('business_user_id', auth()->user()->id)->whereYear('created_at', \Carbon\Carbon::now()->year)->count() }}</span>
                        </div>
                        <i class="material-icons icon-32pt text-20 ml-8pt">add_box</i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 card-group-row__col">
                <div class="card card-group-row__card p-relative o-hidden">
                    <div class="card-body d-flex flex-row align-items-center">
                        <div class="flex">
                            <p class="card-title d-flex align-items-center">
                                <strong>{{ __('dashboard.Canceled_Orders') }}</strong>
                                <span class="text-20 ml-8pt">{{ \Carbon\Carbon::now()->year }}</span>
                            </p>
                            <span class="h2 m-0">{{ $canceled_orders = \App\Models\Order::where('status','Canceled')->where('business_user_id', auth()->user()->id)->whereYear('created_at', \Carbon\Carbon::now()->year)->count() }}</span>
                        </div>
                        <i class="material-icons icon-32pt text-20 ml-8pt">close</i>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 card-group-row__col">
                <div class="card card-group-row__card">
                    <div class="card-body d-flex flex-row align-items-center">
                        <div class="card-title flex">
                            <strong>{{ __('dashboard.Completed_Orders') }}</strong>
                            <span class="text-20 ml-8pt">{{ \Carbon\Carbon::now()->year }}</span>
                            <div class="h2 m-0">{{ $count_orders = \App\Models\Order::where('status','Completed')->where('business_user_id', auth()->user()->id)->whereYear('created_at', \Carbon\Carbon::now()->year)->count() }}</div>
                        </div>
                        <i class="material-icons icon-32pt text-20">check_circle</i>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-lg-32pt">
            <div class="card-header d-flex align-items-center">
                <strong class="card-title">{{ __('dashboard.Earnings') }}</strong>
                {{--<div class="flatpickr-wrapper flatpickr-calendar-right d-flex ml-auto">
                    <div id="recent_orders_date"
                         data-toggle="flatpickr"
                         data-flatpickr-wrap="true"
                         data-flatpickr-static="true"
                         data-flatpickr-mode="range"
                         data-flatpickr-alt-format="d/m/Y"
                         data-flatpickr-date-format="d/m/Y">
                        <a href="javascript:void(0)"
                           class="link-date"
                           data-toggle>13/03/2018 to 20/03/2018</a>
                        <input class="d-none"
                               type="hidden"
                               value="13/03/2018 to 20/03/2018"
                               data-input>
                    </div>
                </div>--}}
            </div>
            <div class="card-body">
                <div class="chart-legend mt-0 mb-24pt justify-content-start"
                     id="ordersChartLegend"></div>
                <div class="chart">
                    <canvas id="ordersChart"
                            class="chart-canvas js-update-chart-bar"
                            data-chart-legend="#ordersChartLegend"
                            data-chart-prefix=""
                            data-chart-suffix=" {{ __('content.EGP') }}"
                            data-chart-line-background-color="primary"></canvas>
                </div>
            </div>
        </div>

        <div class="page-separator">
            <div class="page-separator__text">{{ __('dashboard.Recent_Orders') }}</div>
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

                                        <span class="avatar-title rounded-circle">{{ initials($order->client->full_name) }}</span>

                                    </div>
                                    <div class="media-body">

                                        <div class="d-flex flex-column">
                                            <p class="mb-0"><strong class="js-lists-values-name">{{ $order->client->full_name }}</strong></p>
                                            <small class="js-lists-values-email text-50">{{ $order->client->phone }}</small>
                                            <span class="indicator-line rounded {{ $order->client->status == 'active' ? 'bg-success':'bg-danger' }}"></span>
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
                                     class="chip chip-outline-secondary ">{{ $order->cash_on_delivery }} {{--{{ __('dashboard.EGP')}}--}}</div>
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

    <!-- // END Page Content -->
@endsection

@section('extra-scripts')
    <script>
        !function(e){var t={};function r(n){if(t[n])return t[n].exports;var o=t[n]={i:n,l:!1,exports:{}};return e[n].call(o.exports,o,o.exports,r),o.l=!0,o.exports}r.m=e,r.c=t,r.d=function(e,t,n){r.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},r.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},r.t=function(e,t){if(1&t&&(e=r(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(r.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)r.d(n,o,function(t){return e[t]}.bind(null,o));return n},r.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(t,"a",t),t},r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},r.p="/",r(r.s=586)}({586:function(e,t,r){e.exports=r(587)},587:function(e,t,r){"use strict";r.r(t);r(588)},588:function(e,t){!function(){"use strict";!function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:"roundedBar",r=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};/*r=Chart.helpers.merge({title:{display:!0,fontSize:12,fontColor:"rgba(54, 76, 102, 0.54)",position:"top",text:"{{ __('dashboard.Earnings') }}"}},r);*/var n={labels:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],datasets:[{label:"{{ __('dashboard.Earnings') }}",data:[
            @foreach($sum as $s)
                {{ $s }},
            @endforeach
                    ],barPercentage:.5,barThickness:20}]};Charts.create(e,t,r,n)}("#ordersChart")}()}});
    </script>
@endsection
