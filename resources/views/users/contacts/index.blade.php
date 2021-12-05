@extends('layouts.backend')

@section('title')
    Contacts
@endsection

@section('links')
    <li class="breadcrumb-item active">
        Contacts
    </li>
@endsection

@section('button-link')
    {{ route('dashboard.contacts.create') }}
@endsection

@section('button-icon')
    add
@endsection

@section('button-title')
    New Contact
@endsection

@section('main_content')
    <div class="container page__container">
        <div class="page-section">

            <div class="page-separator">
                <div class="page-separator__text">Contacts</div>
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
                                        <strong>All Contacts</strong>
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

                            <th>Name</th>

                            <th>Email</th>

                            <th>Category</th>

                            <th>Phone</th>

                            <th>Created</th>

                            <th ></th>
                        </tr>
                        </thead>
                        <tbody id="projects">
                        @foreach($contacts as $contact)
                            <tr class="">

                                <td class="pr-0">

                                    <div class="custom-control custom-checkbox"></div>
                                </td>

                                <td></td>

                                <td>

                                    <div class="media flex-nowrap align-items-center"
                                    style="white-space: nowrap;">
                                        <div class="avatar avatar-sm mr-8pt">
                                            <span class="avatar-title rounded bg-warning text-black-100">{{ initials($contact->contact_name) }}</span>
                                        </div>
                                        <div class="media-body">
                                            <div class="d-flex flex-column">
                                                <small class=""><strong>{{ $contact->contact_name }}</strong></small>
                                            </div>
                                        </div>
                                    </div>

                                </td>

                                <td>

                                    <a href="#"
                                       class="chip ">{{ $contact->contact_email }}</a>

                                </td>

                                <td>
                                    <div class="media flex-nowrap align-items-center"
                                         style="white-space: nowrap;">
                                        <div class="avatar avatar-sm mr-8pt">
                                            <span class="avatar-title rounded bg-dark text-white-100">{{ $contact->UserCategory ? initials($contact->UserCategory->name):'No'  }}</span>
                                        </div>
                                        <div class="media-body">
                                            <div class="d-flex flex-column">
                                                <small class=""><strong>{{ $contact->UserCategory ? $contact->UserCategory->name:'No Category' }}</strong></small>
                                                <small class=" text-50">{{ $contact->UserCategory ? $contact->UserCategory->status:'' }}</small>
                                                <span class="indicator-line rounded {{ $contact->UserCategory ? ($contact->UserCategory->status == 'active' ? 'bg-success':'bg-danger'):'bg-success' }}"></span>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <a href="#"
                                       class="chip chip-outline-secondary">{{ $contact->contact_phone }}</a>
                                </td>

                                <td>
                                    <div class="d-flex flex-column">
                                        <small class=""><strong>{{ date("F j, Y", strtotime($contact->created_at)) }}</strong></small>
                                        <small class="text-50">{{ $contact->created_at->diffForHumans() }}</small>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <a href="#" data-toggle="dropdown"
                                       class="btn text-50  text-70"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('dashboard.contacts.edit',$contact->id) }}" class="dropdown-item active"><i class="material-icons ">edit</i> Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a onclick="event.preventDefault(); document.getElementById('delete-form{{ $contact->id }}').submit();" class="dropdown-item"><i class="material-icons ">delete</i> Delete</a>
                                        <form id="delete-form{{ $contact->id }}" action="{{ route('dashboard.contacts.destroy',$contact->id) }}" method="POST" class="d-none">
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

                            <th>Job Title</th>

                            <th>Email</th>

                            <th>Phone</th>

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
