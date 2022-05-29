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

    <div class="container page__container page__container page-section">
        <div class="page-separator">
            <div class="page-separator__text">Overview</div>
        </div>

        <div class="row card-group-row mb-lg-8pt">
            <div class="col-lg-12 card-group-row__col">

                <div class="card card-group-row__card d-flex flex-column">
                    <div class="row no-gutters flex">
                        <div class="col-6">
                            <div class="card-body">
                                <h6 class="text-50">Overview</h6>

                                <div class="h2 mb-0">{{ $orders->count() }}</div>
                                <div class="d-flex flex-column">
                                    <strong>Total Orders</strong>
                                    <small class="text-50">{{--13 this week--}}</small>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="h2 mb-0">{{ $orders->where('status','New')->count() }}</div>
                                <div class="d-flex flex-column">
                                    <strong>New Orders</strong>
                                    <small class="text-50"></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 border-left">
                            <div class="card-body">
                                <h6 class="text-50">Completed Orders</h6>

                                <div class="h2 mb-0">{{ $orders->where('status','Completed')->count() }}</div>
                                <div class="d-flex flex-column">
                                    <strong>Total Views</strong>
                                    <small class="text-50">{{--1.3k today--}}</small>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="h2 mb-0">{{ $orders->where('status','Out for delivery')->count() }}</div>
                                <strong>Out for delivery Orders</strong>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            {{--<div class="col-lg-5 card-group-row__col">

                <div class="card card-group-row__card">
                    <div class="card-body">
                        <h6>Latest Posts</h6>

                        <div class="d-flex align-items-center">
                            <div class="mr-12pt">
                                <div class="avatar avatar-xl avatar-4by3">
                                    <img src="{{ asset('backend/images/paths/invision_200x168.png') }}"
                                         alt="Avatar"
                                         class="avatar-img rounded">
                                </div>
                            </div>
                            <div class="flex">
                                <a href=""
                                   class="card-title">Design Systems Essentials</a>
                                <small class="text-50">35 views this week</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="d-flex align-items-center mb-8pt">
                            <div class="mr-8pt">
                                <div class="avatar avatar-sm avatar-4by3">
                                    <img src="{{ asset('backend/images/paths/photoshop_200x168.png') }}"
                                         alt="Avatar"
                                         class="avatar-img rounded">
                                </div>
                            </div>
                            <div class="flex d-flex flex-column">
                                <a href=""
                                   class="card-title">Semantic Logo Design</a>
                                <small class="text-50">78 views this week</small>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <div class="mr-8pt">
                                <div class="avatar avatar-sm avatar-4by3">
                                    <img src="{{ asset('backend/images/paths/sketch_200x168.png') }}"
                                         alt="Avatar"
                                         class="avatar-img rounded">
                                </div>
                            </div>
                            <div class="flex d-flex flex-column">
                                <a href=""
                                   class="card-title">Merge Inconsistent Symbols</a>
                                <small class="text-50">78 views this week</small>
                            </div>
                        </div>

                    </div>
                </div>

            </div>--}}
        </div>

        <div class="page-separator">
            <div class="page-separator__text">Latest Orders</div>
        </div>

        <div class="posts-cards mb-24pt">
            @foreach($porders as $order)
                <div class="card posts-card" >
                    <div class="posts-card__content d-flex align-items-center flex-wrap">
                        <div class="avatar avatar-lg mr-3" style="cursor: pointer">
                            <a href="{{ route('dashboard.orders.show',$order->id) }}"><img src="{{ asset('backend/images/icon/'.$types[$order->type]['image']) }}"
                                            alt="avatar"
                                            class="avatar-img rounded"></a>
                        </div>
                        <div class="posts-card__title flex d-flex flex-column" style="cursor: pointer">
                            <a href="{{ route('dashboard.orders.show',$order->id) }}"
                               class="card-title mr-3">{{ $order->tracking_no }}</a>
                            <small class="text-50">{{ $order->created_at->diffForHumans() }}</small>
                        </div>
                        <div class="d-flex align-items-center flex-column flex-sm-row posts-card__meta" onclick="location.href='{{ route('dashboard.orders.show',$order->id) }}'" style="cursor: pointer">
                            <div class="mr-3 text-50 text-uppercase posts-card__tag d-flex align-items-center">
                                <i class="material-icons text-muted-light mr-1">folder_open</i> {{ $order->type }}
                            </div>
                            <div class="mr-3 text-50 posts-card__date">
                                <small>{{ date("F j, Y", strtotime($order->created_at)) }}</small>
                            </div>
                            <div class="media mr-2 ml-sm-auto align-items-center">
                                <div class="media flex-nowrap align-items-center" style="white-space: nowrap;">
                                    <div class="avatar avatar-xs mr-8pt">

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
                            </div>
                        </div>
                        <div class="dropdown ml-auto">
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
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @if($porders->count() == 5)
        <div class="card p-8pt mb-0 d-inline-block">
            {!! $porders->render() !!}
            {{--<ul class="pagination justify-content-start pagination-xsm m-0">
                <li class="page-item disabled">
                    <a class="page-link"
                       href="#"
                       aria-label="Previous">
                                    <span aria-hidden="true"
                                          class="material-icons">chevron_left</span>
                        <span>Prev</span>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link"
                       href="#"
                       aria-label="Page 1">
                        <span>1</span>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link"
                       href="#"
                       aria-label="Page 2">
                        <span>2</span>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link"
                       href="#"
                       aria-label="Next">
                        <span>Next</span>
                        <span aria-hidden="true"
                              class="material-icons">chevron_right</span>
                    </a>
                </li>
            </ul>--}}

        </div>
            @endif

    </div>

    <!-- // END Page Content -->
@endsection
