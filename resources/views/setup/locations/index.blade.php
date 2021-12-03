@extends('layouts.backend')

@section('title')
    Locations
@endsection

@section('links')
    <li class="breadcrumb-item active">
        Locations
    </li>
@endsection

@section('button-link')
    {{ route('dashboard.locations.create') }}
@endsection

@section('button-icon')
    add
@endsection

@section('button-title')
    New Location
@endsection

@section('main_content')
    <div class="container page__container">
        <div class="page-section">

            <div class="page-separator">
                <div class="page-separator__text">Locations</div>
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
                                    {{-- <a href="#"
                                        class="btn btn-link dropdown-toggle text-70"
                                        data-toggle="dropdown">All Topics</a>
                                     <div class="dropdown-menu dropdown-menu-right">
                                         <a href=""
                                            class="dropdown-item active">All Topics</a>
                                         <a href=""
                                            class="dropdown-item">My Topics</a>
                                     </div>--}}
                                </div>
                                {{-- <a href="#"
                                    class="btn ml-2 btn-accent">Ask a question</a>--}}
                                {{--<a href="#"
                                   class="btn ml-2 btn-success">Ask </a>--}}
                            </div>

                            {{-- <div class="ml-auto mb-2 mb-sm-0 custom-control-inline mr-0">
                                 <label class="form-label mb-0"
                                        for="active">Active</label>
                                 <div class="custom-control custom-checkbox-toggle ml-8pt">
                                     <input checked=""
                                            type="checkbox"
                                            id="active"
                                            class="custom-control-input">
                                     <label class="custom-control-label"
                                            for="active">Active</label>
                                 </div>
                             </div>--}}
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

                            <th>Name</th>

                            <th>Address</th>

                            <th>City</th>

                            <th>State</th>

                            <th>Created</th>

                            <th ></th>
                        </tr>
                        </thead>
                        <tbody id="projects">
                        @foreach($locations as $location)
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

                                    <div class="media flex-nowrap align-items-center"
                                         style="white-space: nowrap;">

                                        <div class="media-body">

                                            <div class="d-flex align-items-center">
                                                <div class="flex d-flex flex-column">
                                                    <p class="mb-0"><strong class="">{{ $location->name }}</strong></p>

                                                </div>
                                                {{--<div class="d-flex align-items-center ml-24pt">
                                                    <i class="material-icons text-20 icon-16pt">message</i>
                                                    <small class="ml-4pt"><strong class="text-50">2</strong></small>
                                                </div>--}}
                                            </div>

                                        </div>
                                    </div>

                                </td>

                                <td>

                                    <div class="rounded mr-12pt z-0 o-hidden">
                                        <div class="overlay">
                                            <img src="{{ asset('backend/images/icon/map.png') }}"
                                                width="40"
                                                height="40"
                                                alt="Angular"
                                                class="rounded">
                                            <small class="ml-4pt"><strong class="">{{ $location->apartment.', '.$location->building.', '.$location->street}}</strong></small>
                                        </div>

                                    </div>

                                </td>

                                <td>

                                    <a href="#"
                                       class="chip ">{{ $location->state ? $location->state->name:'' }}</a>

                                </td>

                                <td>
                                    <a href="#"
                                       class="chip chip-outline-secondary">{{ $location->city ? $location->city->name:'' }}</a>
                                </td>

                                <td>
                                    <div class="d-flex flex-column">
                                        <small class=""><strong>{{ date("F j, Y", strtotime($location->created_at)) }}</strong></small>
                                        <small class="text-50">{{ $location->created_at->diffForHumans() }}</small>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <a href="#" data-toggle="dropdown"
                                       class="btn text-50  text-70"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('dashboard.locations.edit',$location->id) }}" class="dropdown-item active"><i class="material-icons ">edit</i> Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a onclick="event.preventDefault(); document.getElementById('delete-form{{ $location->id }}').submit();" class="dropdown-item"><i class="material-icons ">delete</i> Delete</a>
                                        <form id="delete-form{{ $location->id }}" action="{{ route('dashboard.locations.destroy',$location->id) }}" method="POST" class="d-none">
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

                            <th>Name</th>

                            <th>Address</th>

                            <th>City</th>

                            <th>State</th>

                            <th>Created</th>

                            <th ></th>
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
