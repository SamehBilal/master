@extends('layouts.backend')

@section('title')
{{ __('dashboard.Orders') }}
@endsection

@section('links')
    <li class="breadcrumb-item active">
        {{ __('dashboard.Orders') }}
    </li>
@endsection
@can('create orders')
    @section('button-link')
        {{ route('dashboard.orders.create') }}
    @endsection
@endcan
@section('button-icon')
    add
@endsection

@section('button-title')
{{ __('dashboard.New_Order') }}
@endsection

@section('main_content')
    <div class="container page__container">
        <div class="page-section">

            <div class="page-separator">
                <div class="page-separator__text">{{ __('dashboard.Filter') }}</div>
            </div>

            <form action="{{ route('dashboard.orders.index') }}" method="GET">
                <div class="card card-form d-flex flex-column flex-sm-row mb-lg-32pt">
                    <div class="card-form__body card-body-form-group flex">
                        <div class="row">
                            <div class="col-sm-auto">
                                <div class="form-group">
                                    <label for="filter_name">{{ __('dashboard.Tracking_No') }}</label>
                                    <input id="filter_name"
                                           type="text"
                                           name="tracking_no"
                                           value="{{ isset($_GET['tracking_no']) &&  $_GET['tracking_no'] >= 0?$_GET['tracking_no']:old('tracking_no') }}"
                                           class="form-control"
                                           placeholder="{{ __('dashboard.Search_by_Tracking_No') }}">
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <div class="form-group">
                                    <label for="filter_category">{{ __('dashboard.Status') }}</label><br>
                                    <select id="filter_category"
                                            class="custom-select"
                                            name="status"
                                            style="width: 200px;">
                                        <option value="" {{ old('status') == '' ?'selected':'' }}>{{ __('dashboard.All_Status') }}</option>
                                        @foreach($status as $item)
                                            <option value="{{ $item }}" {{ isset($_GET['status']) &&  $_GET['status'] == $item ? 'selected':''}}>{{ __("dashboard.{$item}")  }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                           {{-- <div class="col-sm-auto">
                                <div class="form-group">
                                    <label for="filter_stock">In stock?</label>
                                    <div class="custom-control custom-checkbox mt-sm-2">
                                        <input type="checkbox"
                                               class="custom-control-input"
                                               id="filter_stock"
                                               checked="">
                                        <label class="custom-control-label"
                                               for="filter_stock">Yes</label>
                                    </div>
                                </div>
                            </div>--}}
                            {{--<div class="col-sm-auto">
                                <div class="form-group"
                                     style="width: 200px;">
                                    <label for="filter_date">Order date</label>
                                    <input id="filter_date"
                                           type="text"
                                           name="date"
                                           class="form-control"
                                           placeholder="Select date ..."
                                           value="@if(old('date')) {{ old('date') }} @else {{ isset($_GET['date']) &&  $_GET['date'] >= 0?$_GET['date']:'01-03-2021 to '.date('d-m-y') }} @endif"
                                           data-toggle="flatpickr"
                                           data-flatpickr-mode="range"
                                           data-flatpickr-alt-format="d/m/Y"
                                           data-flatpickr-date-format="d/m/Y">
                                </div>
                            </div>--}}
                            <div class="ml-auto col-sm-auto">
                                <div class="form-group" style="width: 150px;">
                                    <label for="price_range">{{ __('dashboard.COD') }}</label>
                                    <input id="price_range" type="text" name="cash_on_delivery" data-toggle="ion-rangeslider" data-min="1" data-max="{{ $max_order + 1 }}" data-from="@if(old('cash_on_delivery')) {{ old('cash_on_delivery') }} @else {{ isset($_GET['cash_on_delivery']) &&  $_GET['cash_on_delivery'] >= 0?$_GET['cash_on_delivery']:$max_order/2 }} @endif" data-step="5" data-max-postfix=" EGP" {{--data-prefix="EGP"--}}>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn bg-alt border-left border-top border-top-sm-0 rounded-0"><i class="material-icons text-primary icon-20pt">refresh</i></button>
                </div>
            </form>

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
                                           class="chip chip-outline-secondary ">
                                            @switch($order->type)
                                                @case ('Deliver')
                                                    {{ $order->cash_on_delivery ? $order->cash_on_delivery:0 }}
                                                    @break
                                                @case ('Exchange')
                                                    {{ $order->cash_exchange_amount ? $order->cash_exchange_amount:0 }}
                                                    @break
                                                @case ('Return')
                                                    {{ $order->refund_amount ? $order->refund_amount:0 }}
                                                    @break
                                                @case ('Cash Collection')
                                                    {{ $order->cash_to_collect ? $order->cash_to_collect:0 }}
                                                    @break
                                                @default
                                                    {{ $order->cash_on_delivery ? $order->cash_on_delivery:0 }}
                                            @endswitch
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex flex-column">
                                            <small class="badge {{$order->status_color}}">{{ __("dashboard.{$order->status}")  }}</small>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex flex-column">
                                            <small class=""><strong>{{ date("F j, Y g:i A", strtotime($order->created_at)) }}</strong></small>
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
                                                @if($order->log->first() && $customer == 1)
                                                    @if($order->log->first()->status == 'New')
                                                        <a href="{{ route('dashboard.orders.edit',$order->id) }}" class="dropdown-item"><i class="material-icons ">edit</i> {{ __('dashboard.Edit') }}</a>
                                                    @endif
                                                @else
                                                    <a href="{{ route('dashboard.orders.edit',$order->id) }}" class="dropdown-item"><i class="material-icons ">edit</i> {{ __('dashboard.Edit') }}</a>
                                                @endif
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
@endsection
