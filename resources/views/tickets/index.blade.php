@extends('layouts.backend')

@section('title')
    tickets
@endsection

@section('links')
    <li class="breadcrumb-item active">
        tickets
    </li>
@endsection

@section('button-link')
    {{ route('dashboard.tickets.create') }}
@endsection

@section('button-icon')
    add
@endsection

@section('button-title')
    New Pickup
@endsection

@section('main_content')
    <div class="container page__container">
        <div class="page-section">

            <div class="page-separator">
                <div class="page-separator__text">Filter</div>
            </div>

            <form action="{{ route('dashboard.tickets.index') }}" method="GET">
                <div class="card card-form d-flex flex-column flex-sm-row mb-lg-32pt">
                    <div class="card-form__body card-body-form-group flex">
                        <div class="row">
                            <div class="col-sm-auto">
                                <div class="form-group">
                                    <label for="pickup_id">Pickup ID</label>
                                    <input id="pickup_id"
                                           type="text"
                                           name="pickup_id"
                                           value="{{ isset($_GET['pickup_id']) &&  $_GET['pickup_id'] >= 0?$_GET['pickup_id']:old('pickup_id') }}"
                                           class="form-control"
                                           placeholder="Search by Pickup ID">
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
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                             <div class="col-sm-auto">
                                 <div class="form-group">
                                     <label for="filter_stock">One Time?</label>
                                     <div class="custom-control custom-checkbox mt-sm-2">
                                         <input type="checkbox"
                                                class="custom-control-input"
                                                id="filter_stock"
                                                name="type"
                                                value="One Time"
                                                {{ isset($_GET['type']) &&  $_GET['type'] == 'One Time'?'checked=""':'' }}>
                                         <label class="custom-control-label"
                                                for="filter_stock">Yes</label>
                                     </div>
                                 </div>
                             </div>
                        </div>
                    </div>
                    <button class="btn bg-alt border-left border-top border-top-sm-0 rounded-0"><i class="material-icons text-primary icon-20pt">refresh</i></button>
                </div>
            </form>

            <div class="page-separator">
                <div class="page-separator__text">tickets</div>
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
                        @foreach($tickets as $ticket)
                            <tr class="">

                                <td class="pr-0">
                                    <div class="custom-control custom-checkbox"></div>
                                </td>

                                <td></td>

                                <td>
                                    <a href="{{ route('dashboard.tickets.show',$ticket->id) }}"
                                       class="chip text-underline">{{ $ticket->pickup_id }}</a>
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
                                                <small class=""><strong>{{ $ticket->location ? $ticket->location->name:'' }}</strong></small>
                                                <span class=" rounded ">{{ $ticket->location ? $ticket->location->apartment.$ticket->location->building.$ticket->location->street:'' }}</span>
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
                                                <small class=""><strong>{{ date("F j, Y", strtotime($ticket->scheduled_date)) }}</strong></small>
                                                <span class="">{{ date("g:i a", strtotime($ticket->scheduled_date)) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div href="#"
                                         class="chip chip-outline-secondary ">{{ $ticket->type }}</div>
                                </td>

                                <td>
                                    <div class="d-flex flex-column">
                                        <small class="badge badge-{{ random_color() }}">{{ $ticket->status }}</small>
                                    </div>
                                </td>


                                <td>
                                    <div class="d-flex flex-column">
                                        <small class=""><strong>{{ date("F j, Y", strtotime($ticket->created_at)) }}</strong></small>
                                        <small class="text-50">{{ $ticket->created_at->diffForHumans() }}</small>
                                    </div>
                                </td>

                                <td class="text-right">
                                    <a href="#" data-toggle="dropdown"
                                       class="btn text-50  text-70"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('dashboard.tickets.show',$ticket->id) }}" class="dropdown-item"><i class="material-icons ">visibility</i> View</a>
                                        <a href="{{ route('dashboard.tickets.edit',$ticket->id) }}" class="dropdown-item"><i class="material-icons ">edit</i> Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a onclick="event.preventDefault(); document.getElementById('delete-form{{ $ticket->id }}').submit();" class="dropdown-item"><i class="material-icons ">delete</i> Delete</a>
                                        <form id="delete-form{{ $ticket->id }}" action="{{ route('dashboard.tickets.destroy',$ticket->id) }}" method="POST" class="d-none">
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
