@extends('layouts.backend')

@section('title')
    Customers
@endsection

@section('links')
    <li class="breadcrumb-item active">
        Customers
    </li>
@endsection

@section('button-link')
    {{ route('dashboard.customers.create') }}
@endsection

@section('button-icon')
    add
@endsection

@section('button-title')
    New Customer
@endsection

@section('main_content')
    <div class="container page__container">
        <div class="page-section">

            <div class="page-separator">
                <div class="page-separator__text">Customers</div>
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
                                <div class="avatar avatar-sm mr-8pt">
                                    <span class="avatar-title rounded bg-transparent text-black-100">
                                         <img src="{{ asset('backend/images/icon/all.png') }}"
                                              alt="Avatar"
                                              class="avatar-img ">
                                    </span>
                                </div>
                                <span class="flex d-flex flex-column">
                                        <strong>All Customers</strong>
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

                                <th>Phone</th>

                                <th>Status</th>

                                <th>Created</th>

                                <th ></th>
                            </tr>
                        </thead>
                        <tbody id="projects">
                            @foreach($customers as $customer)
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
                                                        <p class="mb-0"><strong class="">{{ $customer->user->full_name }}</strong></p>
                                                        <small class="">{{ $customer->user->email }}</small>
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
                                                <span class="avatar-title rounded bg-warning text-black-100">{{ $customer->UserCategory ? initials($customer->UserCategory->name):''  }}</span>
                                            </div>
                                            <div class="media-body">
                                                <div class="d-flex flex-column">
                                                    <small class=""><strong>{{ $customer->UserCategory ? $customer->UserCategory->name:'' }}</strong></small>
                                                    <small class=" text-50">{{ $customer->UserCategory ? $customer->UserCategory->status:'' }}</small>
                                                    <span class="indicator-line rounded {{ $customer->UserCategory->status == 'active' ? 'bg-success':'bg-danger' }}"></span>
                                                </div>
                                            </div>
                                        </div>

                                    </td>

                                    <td>

                                        <a href="#"
                                           class="chip ">{{ $customer->user->phone }}</a>

                                    </td>

                                    <td>
                                        <div class="d-flex flex-column">
                                            <button class="btn btn-sm {{ $customer->status == 'active' ? 'btn-success':'btn-danger' }}">{{ $customer->status }}</button>
                                        </div>
                                    </td>

                                    {{--<td>
                                        <div class="d-flex flex-column">
                                            <small class=""><strong>&dollar;130</strong></small>
                                            <small class="text-danger">Overdue</small>
                                        </div>
                                    </td>--}}

                                    <td>
                                        <div class="d-flex flex-column">
                                            <small class=""><strong>{{--{{ date("F j, Y, g:i a", strtotime($customer->created_at)) }}--}}{{ date("F j, Y", strtotime($customer->created_at)) }}</strong></small>
                                            <small class="text-50">{{ $customer->created_at->diffForHumans() }}</small>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <a href="#" data-toggle="dropdown"
                                           class="btn text-50  text-70"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="{{ route('dashboard.customers.show',$customer->id) }}" class="dropdown-item active"><i class="material-icons ">visibility</i> View</a>
                                            <a href="{{ route('dashboard.customers.edit',$customer->id) }}" class="dropdown-item "><i class="material-icons ">edit</i> Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a onclick="event.preventDefault(); document.getElementById('delete-form{{ $customer->id }}').submit();" class="dropdown-item"><i class="material-icons ">delete</i> Delete</a>
                                            <form id="delete-form{{ $customer->id }}" action="{{ route('dashboard.customers.destroy',$customer->id) }}" method="POST" class="d-none">
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

        {{--<div id="demo_info">
            <div id="events">
                Row selected count - new information added at the top
            </div>
            <table border="0" cellspacing="5" cellpadding="5">
                <tbody><tr>
                    <td>Minimum age:</td>
                    <td><input type="text" id="min" name="min"></td>
                </tr>
                <tr>
                    <td>Maximum age:</td>
                    <td><input type="text" id="max" name="max"></td>
                </tr>
                </tbody></table>
            <button id="button">count</button>

        </div>--}}
    </div>
@endsection
