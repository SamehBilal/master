@extends('layouts.backend')

@section('title')
{{ __('dashboard.Permissions') }}
@endsection

@section('links')
    <li class="breadcrumb-item active">
        {{ __('dashboard.Permissions') }}
    </li>
@endsection
@can('create permissions')
    @section('button-link')
        {{ route('dashboard.permissions.create') }}
    @endsection
@endcan
@section('button-icon')
    add
@endsection

@section('button-title')
{{ __('dashboard.New Permission') }}
@endsection

@section('main_content')
    <div class="container page__container">
        <div class="page-section">

            <div class="row mb-32pt">
                <div class="col-lg-4">
                    <div class="page-separator">
                        <div class="page-separator__text">{{ __('dashboard.Permissions') }}</div>
                    </div>
                    <p class="card-subtitle text-70 mb-16pt mb-lg-0">{{ __('dashboard.All the Permissions listed in the app') }}</p>
                </div>
                <div class="col-8 d-flex align-items-center">
                    <div class="flex"
                         style="max-width: 100%">

                        <div class="card m-0">

                            <div class="table-responsive"
                                 data-toggle="lists"
                                 data-lists-sort-by="js-lists-values-name"
                                 data-lists-values='["js-lists-values-name", "js-lists-values-model", "js-lists-values-status", "js-lists-values-created"]'>

                                <div class="card-header">
                                    <div class="search-form">
                                        <input type="text"
                                               class="form-control search"
                                               placeholder="{{ __('dashboard.Search') }} ...">
                                        <button class="btn"
                                                type="button"><i class="material-icons">search</i></button>
                                    </div>
                                </div>

                                <table class="table mb-0 thead-border-top-0 table-nowrap">
                                    <thead>
                                    <tr>

                                        <th>
                                            <a href="javascript:void(0)"
                                               class="sort"
                                               data-sort="js-lists-values-name">{{ __('dashboard.Name') }}</a>
                                        </th>

                                        <th style="width: 24px;"
                                            class="pl-0"></th>
                                    </tr>
                                    </thead>
                                    <tbody class="list"
                                           id="search">
                                    @foreach($permissions as $permission)

                                        <tr>

                                            <td>

                                                <div class="media flex-nowrap align-items-center"
                                                     style="white-space: nowrap;">
                                                    <div class="avatar avatar-sm mr-8pt ">

                                                        <span class="avatar-title  rounded">{{ initials($permission->name) }}</span>

                                                    </div>
                                                    <div class="media-body">

                                                        <div class="d-flex flex-column">
                                                            <p class="mb-0"><strong class="js-lists-values-name">{{ $permission->name }}</strong></p>
                                                        </div>

                                                    </div>
                                                </div>

                                            </td>
                                            <td class="text-right">
                                                <a href="#" data-toggle="dropdown"
                                                   class="btn text-50  text-70"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    @can('edit permissions')
                                                        <a href="{{ route('dashboard.permissions.edit',$permission->id) }}" class="dropdown-item active"><i class="material-icons ">edit</i> {{ __('dashboard.Edit') }}</a>
                                                    @endcan
                                                    {{-- <div class="dropdown-divider"></div>
                                                    <a onclick="event.preventDefault(); document.getElementById('delete-form{{ $permission->id }}').submit();" class="dropdown-item"><i class="material-icons ">delete</i> Delete</a>
                                                    <form id="delete-form{{ $permission->id }}" action="{{ route('dashboard.permissions.destroy',$permission->id) }}" method="POST" class="d-none">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form> --}}
                                                </div>
                                            </td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
