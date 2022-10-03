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

    <div class="container page__container">
        <div class="page-section">

            <div class="page-separator">
                <div class="page-separator__text">{{ __('dashboard.overview') }}</div>
            </div>

            <div class="row card-group-row mb-lg-8pt">
                <div class="col-lg-4 col-md-6 card-group-row__col">
                    <div class="card card-group-row__card p-relative o-hidden">
                        <div class="card-body d-flex flex-row align-items-center">
                            <div class="flex">
                                <p class="card-title d-flex align-items-center">
                                    <strong>{{ __('dashboard.Orders') }}</strong>
                                    <span class="text-20 ml-8pt">{{ \Carbon\Carbon::now()->year }}</span>
                                    {{--<i class="material-icons text-accent ml-4pt icon-16pt">keyboard_arrow_up</i>--}}
                                </p>
                                <span class="h2 m-0">{{ $count_orders = \App\Models\Order::whereYear('created_at', \Carbon\Carbon::now()->year)->count() }}</span>
                            </div>
                            <i class="material-icons icon-32pt text-20 ml-8pt">monetization_on</i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 card-group-row__col">
                    <div class="card card-group-row__card p-relative o-hidden">
                        <div class="card-body d-flex flex-row align-items-center">
                            <div class="flex">
                                <p class="card-title d-flex align-items-center">
                                    <strong>{{ __('dashboard.Pickups') }}</strong>
                                    <span class="text-20 ml-8pt">{{ \Carbon\Carbon::now()->year }}</span>
                                </p>
                                <span class="h2 m-0">{{ $count_pickups = \App\Models\Pickup::whereYear('created_at', \Carbon\Carbon::now()->year)->count() }}</span>
                            </div>
                            <i class="material-icons icon-32pt text-20 ml-8pt">gps_fixed</i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 card-group-row__col">
                    <div class="card card-group-row__card">
                        <div class="card-body d-flex flex-row align-items-center">
                            <div class="card-title flex">
                                <strong>{{ __('dashboard.Completed_Orders') }}</strong>
                                <span class="text-20 ml-8pt">{{ \Carbon\Carbon::now()->year }}</span>
                                <div class="h2 m-0">{{ $count_orders = \App\Models\Order::where('status','completed')->whereYear('created_at', \Carbon\Carbon::now()->year)->count() }}</div>
                            </div>
                            <i class="material-icons icon-32pt text-20">contacts</i>
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
                                        <small class="badge badge-{{ random_color() }}">{{ __("dashboard.{$order->status}")  }}</small>
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
