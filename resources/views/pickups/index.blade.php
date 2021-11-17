@extends('layouts.backend')

@section('title')
    Pickups
@endsection

@section('links')
    <li class="breadcrumb-item active">
        Pickups
    </li>
@endsection

@section('button-link')
    {{ route('pickups.create') }}
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

            <form action="{{ route('pickups.index') }}" method="GET">
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
                             <div class="col-sm-auto">
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
                             </div>
                        </div>
                    </div>
                    <button class="btn bg-alt border-left border-top border-top-sm-0 rounded-0"><i class="material-icons text-primary icon-20pt">refresh</i></button>
                </div>
            </form>

            <div class="page-separator">
                <div class="page-separator__text">Pickups</div>
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
                        @foreach($pickups as $pickup)
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
                                    <a href="{{ route('orders.show',$pickup->id) }}"
                                       class="chip text-underline">{{ $pickup->tracking_no }}</a>
                                </td>

                                <td>
                                    <div class="media flex-nowrap align-items-center" style="white-space: nowrap;">
                                        <div class="avatar avatar-sm mr-8pt">

                                            <span class="avatar-title rounded-circle">{{ $pickup->customer ? initials($pickup->customer->user->full_name):'' }}</span>

                                        </div>
                                        <div class="media-body">

                                            <div class="d-flex flex-column">
                                                <p class="mb-0"><strong class="js-lists-values-name">{{ $pickup->customer ? $pickup->customer->user->full_name:'' }}</strong></p>
                                                <small class="js-lists-values-email text-50">{{ $pickup->customer ? $pickup->customer->status:'' }}</small>
                                                <span class="indicator-line rounded @if($pickup->customer) {{ $pickup->customer->status == 'active' ? 'bg-success':'bg-danger' }} @endif"></span>
                                            </div>

                                        </div>
                                    </div>

                                </td>

                                <td>
                                    <div class="media flex-nowrap align-items-center"
                                         style="white-space: nowrap;">
                                        <div class="avatar avatar-sm mr-8pt">
                                                <span class="avatar-title rounded bg-primary text-black-100">
                                                     <img src="{{ asset('backend/images/icon/') }}"
                                                          alt="Avatar"
                                                          class="avatar-img ">
                                                </span>
                                        </div>
                                        <div class="media-body">
                                            <div class="d-flex flex-column">
                                                <small class=""><strong>{{ $pickup->type }}</strong></small>
                                                <span class="indicator-line rounded bg-"></span>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div href="#"
                                         class="chip chip-outline-secondary ">{{ $pickup->cash_on_delivery }} EGP</div>
                                </td>

                                <td>
                                    <div class="d-flex flex-column">
                                        <small class="badge badge-{{ random_color() }}">{{ $pickup->status }}</small>
                                    </div>
                                </td>


                                <td>
                                    <div class="d-flex flex-column">
                                        <small class=""><strong>{{ date("F j, Y", strtotime($pickup->created_at)) }}</strong></small>
                                        <small class="text-50">{{ $pickup->created_at->diffForHumans() }}</small>
                                    </div>
                                </td>

                                <td class="text-right">
                                    <a href="#" data-toggle="dropdown"
                                       class="btn text-50  text-70"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('orders.create.airwaybell',$pickup->id) }}" class="dropdown-item active"><i class="material-icons ">receipt</i> Print Airwaybell</a>
                                        <a href="{{ route('orders.show',$pickup->id) }}" class="dropdown-item"><i class="material-icons ">visibility</i> View</a>
                                        <a href="{{ route('orders.edit',$pickup->id) }}" class="dropdown-item"><i class="material-icons ">edit</i> Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a onclick="event.preventDefault(); document.getElementById('delete-form{{ $pickup->id }}').submit();" class="dropdown-item"><i class="material-icons ">delete</i> Delete</a>
                                        <form id="delete-form{{ $pickup->id }}" action="{{ route('orders.destroy',$pickup->id) }}" method="POST" class="d-none">
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
