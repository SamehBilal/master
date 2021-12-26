@extends('layouts.backend')

@section('title')
    Businesses
@endsection

@section('links')
    <li class="breadcrumb-item active">
        Businesses
    </li>
@endsection

@section('button-link')
    {{ route('dashboard.businesses.create') }}
@endsection

@section('button-icon')
    add
@endsection

@section('button-title')
    New Business
@endsection

@section('main_content')
    <div class="container page__container">
        <div class="page-section">

            <div class="page-separator">
                <div class="page-separator__text">Businesses</div>
            </div>

            <div class="card dashboard-area-tabs p-relative o-hidden mb-32pt">

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

                            <th>Pickup Id</th>

                            <th>Pickup location</th>

                            <th>Scheduled date</th>

                            <th>Pickup type</th>

                            <th>Status</th>

                            <th>Created</th>

                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="projects">
                        @foreach($business as $item)
                            <tr class="">

                                <td class="pr-0">
                                    <div class="custom-control custom-checkbox"></div>
                                </td>

                                <td></td>

                                <td>
                                    <a href="{{ route('dashboard.pickups.show',$item->id) }}"
                                       class="chip text-underline">{{ $item->pickup_id }}</a>
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
                                                <small class=""><strong>{{ $item->location ? $item->location->name:'' }}</strong></small>
                                                <span class=" rounded ">{{ $item->location ? $item->location->apartment.$item->location->building.$item->location->street:'' }}</span>
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
                                                <small class=""><strong>{{ date("F j, Y", strtotime($item->scheduled_date)) }}</strong></small>
                                                <span class="">{{ date("g:i a", strtotime($item->scheduled_date)) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div href="#"
                                         class="chip chip-outline-secondary ">{{ $item->type }}</div>
                                </td>

                                <td>
                                    <div class="d-flex flex-column">
                                        <small class="badge badge-{{ random_color() }}">{{ $item->status }}</small>
                                    </div>
                                </td>


                                <td>
                                    <div class="d-flex flex-column">
                                        <small class=""><strong>{{ date("F j, Y", strtotime($item->created_at)) }}</strong></small>
                                        <small class="text-50">{{ $item->created_at->diffForHumans() }}</small>
                                    </div>
                                </td>

                                <td class="text-right">
                                    <a href="#" data-toggle="dropdown"
                                       class="btn text-50  text-70"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('dashboard.pickups.show',$item->id) }}" class="dropdown-item"><i class="material-icons ">visibility</i> View</a>
                                        <a href="{{ route('dashboard.pickups.edit',$item->id) }}" class="dropdown-item"><i class="material-icons ">edit</i> Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a onclick="event.preventDefault(); document.getElementById('delete-form{{ $item->id }}').submit();" class="dropdown-item"><i class="material-icons ">delete</i> Delete</a>
                                        <form id="delete-form{{ $item->id }}" action="{{ route('dashboard.pickups.destroy',$item->id) }}" method="POST" class="d-none">
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

                            <th>Pickup Id</th>

                            <th>Pickup location</th>

                            <th>Scheduled date</th>

                            <th>Pickup type</th>

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
