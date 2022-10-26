@extends('layouts.backend')

@section('title')
{{ __('dashboard.Users') }}
@endsection

@section('links')
    <li class="breadcrumb-item active">
        {{ __('dashboard.Users') }}
    </li>
@endsection

@section('button-link')
    {{ route('dashboard.users.create') }}
@endsection

@section('button-icon')
    add
@endsection

@section('button-title')
{{ __('dashboard.New user') }}
@endsection

@section('main_content')
    <div class="container page__container">
        <div class="page-section">

            <div class="page-separator">
                <div class="page-separator__text">{{ __('dashboard.Users') }}</div>
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
                                        <strong>{{ __('dashboard.All_Users') }}</strong>
                                        <small class=" text-50">{{ __('dashboard.active') }}</small>
                                        <span class="indicator-line rounded bg-success"></span>
                                    </span>
                            </a>
                        </div>
                        @hasanyrole('finance|operation admin|operation logistics')

                        @else
                        <div class="col-auto border-left border-right">
                            <a href="#"
                               data-toggle="tab"
                               role="tab"
                               data-name="Staff"
                               aria-selected="false"
                               class="dashboard-area-tabs__tab card-body d-flex flex-row align-items-center justify-content-start ">
                                <div class="avatar avatar-sm mr-8pt">
                                    <span class="avatar-title rounded bg-transparent text-black-100">
                                         <img src="{{ asset('backend/images/icon/staff.png') }}"
                                              alt="Avatar"
                                              class="avatar-img ">
                                    </span>
                                </div>
                                <span class="flex d-flex flex-column">
                                    <strong>{{ __('dashboard.Staff') }}</strong>
                                    <small class=" text-50">{{ __('dashboard.active') }}</small>
                                    <span class="indicator-line rounded bg-success"></span>
                                </span>
                            </a>
                        </div>
                        <div class="col-auto border-left border-right">
                            <a href="#"
                               data-toggle="tab"
                               role="tab"
                               data-name="Customers"
                               aria-selected="false"
                               class="dashboard-area-tabs__tab card-body d-flex flex-row align-items-center justify-content-start ">
                                <div class="avatar avatar-sm mr-8pt">
                                    <span class="avatar-title rounded bg-transparent text-black-100">
                                         <img src="{{ asset('backend/images/icon/customer.png') }}"
                                              alt="Avatar"
                                              class="avatar-img ">
                                    </span>
                                </div>
                                <span class="flex d-flex flex-column">
                                    <strong>{{ __('dashboard.Customers') }}</strong>
                                    <small class=" text-50">{{ __('dashboard.active') }}</small>
                                    <span class="indicator-line rounded bg-success"></span>
                                </span>
                            </a>
                        </div>
                        @endhasanyrole
                    </div>
                </div>
                <div class="table-responsive">
                    <div class="card-header">
                        <form class="form-inline">
                            <label class="mr-sm-2 form-label"
                                   for="myInputTextField">{{ __('dashboard.Filter by') }}:</label>
                            <input type="text"
                                   class="form-control search mb-2 mr-sm-2 mb-sm-0"
                                   id="myInputTextField"
                                   placeholder="{{ __('dashboard.Search') }} ...">

                            <div class="col-lg d-flex flex-wrap buttons-datatable-add">
                                <div class="ml-lg-auto dropdown select-datatable-add"></div>
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

                            <th >{{ __('dashboard.Name') }}</th>

                            <th>{{ __('dashboard.Category') }}</th>

                            @hasrole('operation logistics')
                                <th>{{ __('dashboard.Orders') }}</th>
                                <th>{{ __('dashboard.Pickups') }}</th>
                            @else
                                <th>{{ __('dashboard.Role') }}</th>
                            @endhasrole

                            <th>{{ __('dashboard.Status') }}</th>

                            <th>{{ __('dashboard.Created_At') }}</th>

                            <th ></th>
                        </tr>
                        </thead>
                        <tbody id="projects">
                        @foreach($users as $user)
                            <tr class="">
                                <td class="pr-0">
                                    <div class="custom-control custom-checkbox"></div>
                                </td>
                                <td></td>
                                <td>
                                    <div class="media flex-nowrap align-items-center"
                                         style="white-space: nowrap;">
                                        <div class="avatar avatar-sm mr-8pt">
                                            <img src="{{ asset('backend/images/people/110/guy-3.jpg') }}"
                                                 alt="Avatar"
                                                 class="avatar-img rounded-circle">
                                        </div>
                                        <div class="media-body">
                                            <div class="d-flex align-items-center">
                                                <div class="flex d-flex flex-column">
                                                    <p class="mb-0"><strong class="">{{ $user->full_name }}</strong></p>
                                                    <small class="">{{ $user->email }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="media flex-nowrap align-items-center"
                                         style="white-space: nowrap;">
                                        <div class="avatar avatar-sm mr-8pt">
                                            <span class="avatar-title rounded bg-transparent text-black-100">
                                                 <img src="{{ $user->hasRole(['Super Admin','admin','sales','finance','operation admin','operation logistics','operation courier']) ? asset('backend/images/icon/staff.png'): asset('backend/images/icon/customer.png') }}"
                                                      alt="Avatar"
                                                      class="avatar-img ">
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <div class="d-flex flex-column">
                                                <small class=""><strong>{{ $user->hasRole(['Super Admin','admin','sales','finance','operation admin','operation logistics','operation courier']) ? __("dashboard.Staff"): __("dashboard.Customers") }}</strong></small>
                                                <small class=" text-50">{{ $user->status == 1 ? __("dashboard.active"):'' }}</small>
                                                <span class="indicator-line rounded {{ $user->status == 1 ? 'bg-success':'bg-danger' }} "></span>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                @hasrole('operation logistics')
                                    <td>
                                        <a href="#"
                                            class="chip chip-info">{{ $user->order->count() }}</a>
                                    </td>

                                    <td>
                                        <a href="#"
                                            class="chip chip-dark">{{ $user->pickup->count() }}</a>
                                    </td>
                                @else
                                    <td>
                                        @foreach($user->roles as $role)
                                            <a href="#"
                                            class="chip chip-outline-secondary">{{ $role->name }}</a>
                                        @endforeach
                                    </td>
                                @endhasrole

                                <td>
                                    <div class="d-flex flex-column">
                                        <button class="btn btn-sm {{ $user->status == 1 ? 'btn-success':'btn-danger' }}">{{ $user->status == 1 ? __("dashboard.active"):__("dashboard.inctive") }}</button>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <small class=""><strong>{{--{{ date("F j, Y, g:i a", strtotime($user->created_at)) }}--}}{{ date("F j, Y", strtotime($user->created_at)) }}</strong></small>
                                        <small class="text-50">{{ $user->created_at->diffForHumans() }}</small>
                                    </div>
                                </td>
                                <td class="text-right">
                                    @can('edit users')
                                        <a href="{{ route('dashboard.users.edit',$user->id) }}" title="{{ __('dashboard.Edit') }}" {{--data-toggle="dropdown"--}}
                                            class="btn text-50  text-70" style="padding: 0!important;"><i class="material-icons ">edit</i> </a>
                                    @endcan
                                    @can('edit users')
                                        <a href="{{ route('dashboard.users.login',$user->id) }}" title="Login as" {{--data-toggle="dropdown"--}}
                                            class="btn text-50  text-70" style="padding: 0!important;"><i class="material-icons">exit_to_app</i> </a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th style="width: 18px;"
                                class="pr-0">
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

                            <th >{{ __('dashboard.Name') }}</th>

                            <th>{{ __('dashboard.Category') }}</th>

                            @hasrole('operation logistics')
                                <th>{{ __('dashboard.Orders') }}</th>
                                <th>{{ __('dashboard.Pickups') }}</th>
                            @else
                                <th>{{ __('dashboard.Role') }}</th>
                            @endhasrole

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
