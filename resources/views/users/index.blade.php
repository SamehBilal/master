@extends('layouts.backend')

@section('title')
    Users
@endsection

@section('links')
    <li class="breadcrumb-item active">
        Users
    </li>
@endsection

@section('button-link')
    {{ route('users.create') }}
@endsection

@section('button-icon')
    add
@endsection

@section('button-title')
    New User
@endsection

@section('extra_styles')
    <style>
        /* table.dataTable tbody td.select-checkbox:before, table.dataTable tbody th.select-checkbox:before{
             content: " "!important;
             margin-top: -2px!important;
             margin-left: -6px!important;
             border: 1px solid red!important;
             border-radius: 3px!important;
         }
         table.dataTable tr.selected td.select-checkbox:after, table.dataTable tr.selected th.select-checkbox:after{
             content: "x"!important;
             font-size: 20px!important;
             margin-top: -19px!important;
             margin-left: -6px!important;
             text-align: center!important;
             text-shadow: 1px 1px #b0bed9, -1px -1px #b0bed9, 1px -1px #b0bed9, -1px 1px #b0bed9!important;
         }
         table.dataTable tbody td.select-checkbox, table.dataTable tbody th.select-checkbox {
             position: static !important;
         }*/
    </style>
@endsection

@section('main_content')
    <div class="container page__container">
        <div class="page-section">

            <div class="page-separator">
                <div class="page-separator__text">Users</div>
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
                                        <strong>All Users</strong>
                                        <small class=" text-50">active</small>
                                        <span class="indicator-line rounded bg-success"></span>
                                    </span>
                            </a>
                        </div>
                        @foreach($categories as $category)
                            <div class="col-auto border-left border-right{{--{{ $category->id != 1 ? 'border-left border-right':'' }}--}}">
                                <a href="#"
                                   data-toggle="tab"
                                   role="tab"
                                   data-name="{{ $category->name }}"
                                   aria-selected="false{{--{{ $category->id == 1 ? 'true':'false' }}--}}"
                                   class="dashboard-area-tabs__tab card-body d-flex flex-row align-items-center justify-content-start {{--{{ $category->id == 1 ? 'active':'' }}--}}">
                                    {{--<span class="h2 mb-0 mr-3">{{ $category->id }}</span>--}}
                                    <div class="avatar avatar-sm mr-8pt">
                                        <span class="avatar-title rounded bg-warning text-black-100">{{  initials($category->name)  }}</span>
                                    </div>
                                    <span class="flex d-flex flex-column">
                                        <strong>{{ $category->name }}</strong>
                                        <small class=" text-50">{{ $category->status }}</small>
                                        <span class="indicator-line rounded {{ $category->status == 'active' ? 'bg-success':'bg-danger' }}"></span>
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

                            <th >Name</th>

                            <th>Category</th>

                            <th>Role</th>

                            <th>Status</th>

                            <th>Created</th>

                            <th ></th>
                        </tr>
                        </thead>
                        <tbody id="projects">
                        @foreach($users as $user)
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
                                                {{--<div class="d-flex align-items-center ml-24pt">
                                                    <i class="material-icons text-20 icon-16pt">message</i>
                                                    <small class="ml-4pt"><strong class="text-50">2</strong></small>
                                                </div>--}}
                                            </div>

                                        </div>
                                    </div>

                                </td>

                                <td>

                                    <div class="media flex-nowrap align-items-center"
                                         style="white-space: nowrap;">
                                        <div class="avatar avatar-sm mr-8pt">
                                            <span class="avatar-title rounded bg-warning text-black-100">{{ $user->UserCategory ? initials($user->UserCategory->name):''  }}</span>
                                        </div>
                                        <div class="media-body">
                                            <div class="d-flex flex-column">
                                                <small class=""><strong>{{ $user->UserCategory ? $user->UserCategory->name:'' }}</strong></small>
                                                <small class=" text-50">{{ $user->UserCategory ? $user->UserCategory->status:'' }}</small>
                                                <span class="indicator-line rounded {{--{{ $user->UserCategory->status == 'active' ? 'bg-success':'bg-danger' }}--}}"></span>
                                            </div>
                                        </div>
                                    </div>

                                </td>

                                <td>
                                    @foreach($user->roles as $role)
                                        <a href="#"
                                           class="chip chip-outline-secondary">{{ $role->name }}</a>
                                    @endforeach
                                </td>

                                <td>
                                    <div class="d-flex flex-column">
                                        <button class="btn btn-sm {{ $user->status == 1 ? 'btn-success':'btn-danger' }}">{{ $user->status == 1 ? 'Active':'Inctive' }}</button>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex flex-column">
                                        <small class=""><strong>{{--{{ date("F j, Y, g:i a", strtotime($user->created_at)) }}--}}{{ date("F j, Y", strtotime($user->created_at)) }}</strong></small>
                                        <small class="text-50">{{ $user->created_at->diffForHumans() }}</small>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <a href="{{ route('users.edit',$user->id) }}" {{--data-toggle="dropdown"--}}
                                       class="btn text-50  text-70"><i class="material-icons ">edit</i> </a>
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

                            <th >Name</th>

                            <th>Category</th>

                            <th>Phone</th>

                            <th>Status</th>

                            <th >Created</th>

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
