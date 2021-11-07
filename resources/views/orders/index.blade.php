@extends('layouts.backend')

@section('title')
    Orders
@endsection

@section('links')
    <li class="breadcrumb-item active">
        Orders
    </li>
@endsection

@section('button-link')
    {{ route('orders.create') }}
@endsection

@section('button-icon')
    add
@endsection

@section('button-title')
    New Order
@endsection

@section('main_content')
    <div class="container page__container">
        <div class="page-section">

            <div class="page-separator">
                <div class="page-separator__text">Filter</div>
            </div>

            <form action="{{ route('orders.index') }}" method="GET">
                <div class="card card-form d-flex flex-column flex-sm-row mb-lg-32pt">
                    <div class="card-form__body card-body-form-group flex">
                        <div class="row">
                            <div class="col-sm-auto">
                                <div class="form-group">
                                    <label for="filter_name">Tracking No.</label>
                                    <input id="filter_name"
                                           type="text"
                                           name="tracking_no"
                                           value="{{ isset($_GET['tracking_no']) &&  $_GET['tracking_no'] >= 0?$_GET['tracking_no']:old('tracking_no') }}"
                                           class="form-control"
                                           placeholder="Search by Tracking No.">
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <div class="form-group">
                                    <label for="filter_category">Status</label><br>
                                    <select id="filter_category"
                                            class="custom-select"
                                            name="status"
                                            style="width: 200px;">
                                        <option value="" {{ old('status') == '' ?'selected':'' }}>All Status</option>
                                        @foreach($status as $item)
                                            <option value="{{ $item }}">{{ $item }}</option>
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
                                    <label for="price_range">COD</label>
                                    <input id="price_range" type="text" name="cash_on_delivery" data-toggle="ion-rangeslider" data-min="1" data-max="{{ $max_order + 1 }}" data-from="@if(old('cash_on_delivery')) {{ old('cash_on_delivery') }} @else {{ isset($_GET['cash_on_delivery']) &&  $_GET['cash_on_delivery'] >= 0?$_GET['cash_on_delivery']:$max_order/2 }} @endif" data-step="5" data-max-postfix=" EGP" {{--data-prefix="EGP"--}}>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn bg-alt border-left border-top border-top-sm-0 rounded-0"><i class="material-icons text-primary icon-20pt">refresh</i></button>
                </div>
            </form>

            <div class="page-separator">
                <div class="page-separator__text">Orders</div>
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
                                        <strong>All Orders</strong>
                                        <small class=" text-50">active</small>
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
                                        <strong>{{ $type['name'] }}</strong>
                                        <small class="text-20" >{{ $type['description'] }}</small>
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
                                   for="myInputTextField">Filter by:</label>
                            <input type="text"
                                   class="form-control search mb-2 mr-sm-2 mb-sm-0"
                                   id="myInputTextField"
                                   placeholder="Search ...">

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

                            <th>Tracking No.</th>

                            <th>Customer Info</th>

                            <th>Type</th>

                            <th>COD</th>

                            <th>Status</th>

                            <th>Created</th>

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
                                        <a href="{{ route('orders.show',$order->id) }}"
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
                                                    <small class="js-lists-values-email text-50">{{ $order->customer->status }}</small>
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
                                                    <small class=""><strong>{{ $order->type }}</strong></small>
                                                    <span class="indicator-line rounded bg-{{ $types[$order->type]['color'] }}"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div href="#"
                                           class="chip chip-outline-secondary ">{{ $order->cash_on_delivery }} EGP</div>
                                    </td>

                                    <td>
                                        <div class="d-flex flex-column">
                                            <small class="badge badge-{{ random_color() }}">{{ $order->status }}</small>
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
                                            <a href="{{ route('orders.create.airwaybell',$order->id) }}" class="dropdown-item active"><i class="material-icons ">receipt</i> Print Airwaybell</a>
                                            <a href="{{ route('orders.show',$order->id) }}" class="dropdown-item"><i class="material-icons ">visibility</i> View</a>
                                            <a href="{{ route('orders.edit',$order->id) }}" class="dropdown-item"><i class="material-icons ">edit</i> Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a onclick="event.preventDefault(); document.getElementById('delete-form{{ $order->id }}').submit();" class="dropdown-item"><i class="material-icons ">delete</i> Delete</a>
                                            <form id="delete-form{{ $order->id }}" action="{{ route('orders.destroy',$order->id) }}" method="POST" class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
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

                            <th>Tracking No.</th>

                            <th>Customer Info</th>

                            <th>Type</th>

                            <th>COD</th>

                            <th>Status</th>

                            <th>Created</th>

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
