@extends('layouts.backend')

@section('title')
{{ __('dashboard.Pickups') }}
@endsection

@section('links')
    <li class="breadcrumb-item active">
        {{ __('dashboard.Pickups') }}
    </li>
@endsection
@can('create pickups')
    @section('button-link')
        {{ route('dashboard.pickups.create') }}
    @endsection
@endcan
@section('button-icon')
    add
@endsection

@section('button-title')
{{ __('dashboard.New Pickup') }}
@endsection

@section('main_content')
    <div class="container page__container">
        <div class="page-section">

            <div class="page-separator">
                <div class="page-separator__text">{{ __('dashboard.Filter') }}</div>
            </div>

            <form action="{{ route('dashboard.pickups.index') }}" method="GET">
                <div class="card card-form d-flex flex-column flex-sm-row mb-lg-32pt">
                    <div class="card-form__body card-body-form-group flex">
                        <div class="row">
                            <div class="col-sm-auto">
                                <div class="form-group">
                                    <label for="pickup_id">{{ __('dashboard.Pickup ID') }}</label>
                                    <input id="pickup_id"
                                           type="text"
                                           name="pickup_id"
                                           value="{{ isset($_GET['pickup_id']) &&  $_GET['pickup_id'] >= 0?$_GET['pickup_id']:old('pickup_id') }}"
                                           class="form-control"
                                           placeholder="{{ __('dashboard.Search by Pickup ID') }}">
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <div class="form-group">
                                    <label for="filter_category">{{ __('dashboard.Locations') }}</label><br>
                                    <select id="filter_category"
                                            class="custom-select"
                                            name="location"
                                            style="width: 200px;">
                                        <option value="" {{ old('location') == '' ?'selected':'' }}>{{ __('dashboard.Select location') }}</option>
                                        @foreach($locations as $location)
                                            <option value="{{ $location->id }}"  {{ isset($_GET['location']) &&  $_GET['location'] == $location->id ? 'selected':''}}>{{ $location->name }}</option>
                                        @endforeach
                                    </select>
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
                                            <option value="{{ $item }}"  {{ isset($_GET['status']) &&  $_GET['status'] == $item ? 'selected':''}}>{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <div class="form-group">
                                    <label for="filter_stock">{{ __('dashboard.One Time?') }}</label>
                                    <div class="custom-control custom-checkbox mt-sm-2">
                                        <input type="checkbox"
                                               class="custom-control-input"
                                               id="filter_stock"
                                               name="type"
                                               value="One Time"
                                            {{ isset($_GET['type']) &&  $_GET['type'] == 'One Time'?'checked=""':'' }}>
                                        <label class="custom-control-label"
                                               for="filter_stock">{{ __('dashboard.Yes') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn bg-alt border-left border-top border-top-sm-0 rounded-0"><i class="material-icons text-primary icon-20pt">refresh</i></button>
                </div>
            </form>

            <div class="page-separator">
                <div class="page-separator__text">{{ __('dashboard.Pickups') }}</div>
            </div>

            <div class="card dashboard-area-tabs p-relative o-hidden mb-32pt">

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

                            <th>{{ __('dashboard.Pickup ID') }}</th>

                            <th>{{ __('dashboard.Pickup location') }}</th>

                            <th>{{ __('dashboard.Scheduled date') }}</th>

                            <th>{{ __('dashboard.Orders') }}</th>

                            <th>{{ __('dashboard.Pickup type') }}</th>

                            <th>{{ __('dashboard.Status') }}</th>

                            <th>{{ __('dashboard.Created_At') }}</th>

                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="projects">
                        @foreach($pickups as $pickup)
                            <tr class="">

                                <td class="pr-0">
                                    <div class="custom-control custom-checkbox"></div>
                                </td>

                                <td></td>

                                <td>
                                    <a href="{{ route('dashboard.pickups.show',$pickup->id) }}"
                                       class="chip text-underline">{{ $pickup->pickup_id }}</a>
                                </td>

                                <td>
                                    <div class="media flex-nowrap align-items-center"
                                         style="white-space: nowrap;">
                                        <div class="avatar avatar-sm mr-8pt">
                                                <span class="avatar-title rounded bg-transparent text-black-100">
                                                        <img src="{{ asset('backend/images/icon/map.png') }}"
                                                             alt="Avatar"
                                                             class="avatar-img ">
                                                </span>
                                        </div>
                                        <div class="media-body">
                                            <div class="d-flex flex-column">
                                                <small class=""><strong>{{ $pickup->location ? $pickup->location->name:'' }}</strong></small>
                                                <span class=" rounded ">{{ $pickup->location ? $pickup->location->apartment.$pickup->location->building.$pickup->location->street:'' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="media flex-nowrap align-items-center"
                                         style="white-space: nowrap;">
                                        <div class="avatar avatar-sm mr-8pt">
                                                <span class="avatar-title rounded bg-primary text-black-100">
                                                     <img src="{{ asset('backend/images/icon/fast-delivery.png') }}"
                                                          alt="Avatar"
                                                          class="avatar-img ">
                                                </span>
                                        </div>
                                        <div class="media-body">
                                            <div class="d-flex flex-column">
                                                <small class=""><strong>{{ date("F j, Y", strtotime($pickup->scheduled_date)) }}</strong></small>
                                                <span class="">{{ date("g:i A", strtotime($pickup->scheduled_date)) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div href="#"
                                         class="chip chip-info ">{{ $pickup->orders ? $pickup->orders->count():0 }}</div>
                                </td>

                                <td>
                                    <div href="#"
                                         class="chip chip-outline-secondary ">{{ $pickup->type }}</div>
                                </td>

                                <td>
                                    <div class="d-flex flex-column">
                                        <small class="badge {{$pickup->status_color}}">{{ $pickup->status }}</small>
                                    </div>
                                </td>


                                <td>
                                    <div class="d-flex flex-column">
                                        <small class=""><strong>{{ date("F j, Y g:i A", strtotime($pickup->created_at)) }}</strong></small>
                                        <small class="text-50">{{ $pickup->created_at->diffForHumans() }}</small>
                                    </div>
                                </td>

                                <td class="text-right">
                                    <a href="#" data-toggle="dropdown"
                                       class="btn text-50  text-70"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        @can('show pickups')
                                            <a href="{{ route('dashboard.pickups.show',$pickup->id) }}" class="dropdown-item"><i class="material-icons ">visibility</i> View</a>
                                        @endcan
                                        @can('edit pickups')
                                            <a href="{{ route('dashboard.pickups.edit',$pickup->id) }}" class="dropdown-item"><i class="material-icons ">edit</i> Edit</a>
                                        @endcan
                                        @can('delete pickups')
                                            <div class="dropdown-divider"></div>
                                            <a onclick="event.preventDefault(); document.getElementById('delete-form{{ $pickup->id }}').submit();" class="dropdown-item"><i class="material-icons ">delete</i> Delete</a>
                                            <form id="delete-form{{ $pickup->id }}" action="{{ route('dashboard.pickups.destroy',$pickup->id) }}" method="POST" class="d-none">
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

                            <th>{{ __('dashboard.Pickup ID') }}</th>

                            <th>{{ __('dashboard.Pickup location') }}</th>

                            <th>{{ __('dashboard.Scheduled date') }}</th>

                            <th>{{ __('dashboard.Orders') }}</th>

                            <th>{{ __('dashboard.Pickup type') }}</th>

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
