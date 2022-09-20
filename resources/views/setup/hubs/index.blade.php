@extends('layouts.backend')

@section('title')
{{ __('dashboard.hubs') }}
@endsection

@section('links')
    <li class="breadcrumb-item active">
        {{ __('dashboard.hubs') }}
    </li>
@endsection
@can('create hubs')
    @section('button-link')
        {{ route('dashboard.hubs.create') }}
    @endsection
@endcan
@section('button-icon')
    add
@endsection

@section('button-title')
{{ __('dashboard.New Hub') }}
@endsection

@section('main_content')
    <div class="container page__container">
        <div class="page-section">

            <div class="row mb-32pt">
                <div class="col-lg-4">
                    <div class="page-separator">
                        <div class="page-separator__text">{{ __('dashboard.hubs') }}</div>
                    </div>
                    <p class="card-subtitle text-70 mb-16pt mb-lg-0">{{ __('dashboard.All the hubs listed in the app') }}</p>
                </div>
                <div class="col-8 d-flex align-items-center">
                    <div class="flex"
                         style="max-width: 100%">

                        <div class="card m-0">

                            <div class="table-responsive"
                                 data-toggle="lists"
                                 data-lists-sort-by="js-lists-values-name"
                                 data-lists-values='["js-lists-values-name", "js-lists-values-created"]'>

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

                                        <th style="width: 120px;">
                                            <a href="javascript:void(0)"
                                               class="sort"
                                               data-sort="js-lists-values-created">{{ __('dashboard.Created_At') }}</a>
                                        </th>

                                        <th style="width: 24px;"
                                            class="pl-0"></th>
                                    </tr>
                                    </thead>
                                    <tbody class="list"
                                           id="search">
                                    @foreach($hubs as $hub)

                                        <tr>

                                            <td>

                                                <div class="media flex-nowrap align-items-center"
                                                     style="white-space: nowrap;">
                                                    <div class="avatar avatar-sm mr-8pt">

                                                        <span class="avatar-title rounded-circle">{{ $hub->ar_name }}</span>

                                                    </div>
                                                    <div class="media-body">

                                                        <div class="d-flex flex-column">
                                                            <p class="mb-0"><strong class="js-lists-values-name">{{ $hub->ar_name }}</strong></p>
                                                            <small class="js-lists-values-rate text-50">{{ $hub->en_name }}</small>
                                                        </div>

                                                    </div>
                                                </div>

                                            </td>


                                            <td class=" js-lists-values-created small">
                                                <div class="d-flex flex-column">
                                                    <small class=""><strong>{{--{{ date("F j, Y, g:i a", strtotime($customer->created_at)) }}--}}{{ date("F j, Y", strtotime($hub->created_at)) }}</strong></small>
                                                    <small class="text-50">{{ $hub->created_at->diffForHumans() }}</small>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" data-toggle="dropdown"
                                                   class="btn text-50  text-70"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    @can('edit hubs')
                                                        <a href="{{ route('dashboard.hubs.edit',$hub->id) }}" class="dropdown-item active"><i class="material-icons ">edit</i> {{ __('dashboard.Edit') }}</a>
                                                    @endcan
                                                    @can('delete hubs')
                                                        <div class="dropdown-divider"></div>
                                                        <a onclick="event.preventDefault(); document.getElementById('delete-form{{ $hub->id }}').submit();" class="dropdown-item"><i class="material-icons ">delete</i> {{ __('dashboard.Delete') }}</a>
                                                        <form id="delete-form{{ $hub->id }}" action="{{ route('dashboard.hubs.destroy',$hub->id) }}" method="POST" class="d-none">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    @endcan
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
