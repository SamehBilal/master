@extends('layouts.backend')

@section('title')
{{ __('dashboard.Currencies') }}
@endsection

@section('links')
    <li class="breadcrumb-item active">
        {{ __('dashboard.Currencies') }}
    </li>
@endsection
@can('create currencies')
    @section('button-link')
        {{ route('dashboard.currencies.create') }}
    @endsection
@endcan
@section('button-icon')
    add
@endsection

@section('button-title')
{{ __('dashboard.New Currency') }}
@endsection

@section('main_content')
    <div class="container page__container">
        <div class="page-section">

            <div class="row mb-32pt">
                <div class="col-lg-4">
                    <div class="page-separator">
                        <div class="page-separator__text">{{ __('dashboard.Currencies') }}</div>
                    </div>
                    <p class="card-subtitle text-70 mb-16pt mb-lg-0">{{ __('dashboard.All the currencies listed in the app') }}</p>
                </div>
                <div class="col-8 d-flex align-items-center">
                    <div class="flex"
                         style="max-width: 100%">

                        <div class="card m-0">

                            <div class="table-responsive"
                                 data-toggle="lists"
                                 data-lists-sort-by="js-lists-values-name"
                                 data-lists-values='["js-lists-values-name", "js-lists-values-rate", "js-lists-values-created"]'>

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

                                        <th style="width: 37px;"
                                            data-sort="js-lists-values-rate">{{ __('dashboard.Rate') }}</th>

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
                                    @foreach($currencies as $currency)

                                        <tr>

                                            <td>

                                                <div class="media flex-nowrap align-items-center"
                                                     style="white-space: nowrap;">
                                                    <div class="avatar avatar-sm mr-8pt">

                                                        <span class="avatar-title rounded-circle">{{ $currency->name }}</span>

                                                    </div>
                                                    <div class="media-body">

                                                        <div class="d-flex flex-column">
                                                            <p class="mb-0"><strong class="js-lists-values-name">{{ $currency->name }}</strong></p>
                                                            <small class="js-lists-values-rate text-50">{{ $currency->rate }}</small>
                                                        </div>

                                                    </div>
                                                </div>

                                            </td>


                                            <td class="js-lists-values-rate small">{{ $currency->rate }}</td>

                                            <td class=" js-lists-values-created small" data-sort="{{ $currency->created_at }}">
                                                <div class="d-flex flex-column">
                                                    <small class=""><strong>{{--{{ date("F j, Y, g:i a", strtotime($customer->created_at)) }}--}}{{ date("F j, Y", strtotime($currency->created_at)) }}</strong></small>
                                                    <small class="text-50">{{ $currency->created_at->diffForHumans() }}</small>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <a href="#" data-toggle="dropdown"
                                                   class="btn text-50  text-70"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    @can('edit currencies')
                                                        <a href="{{ route('dashboard.currencies.edit',$currency->id) }}" class="dropdown-item active"><i class="material-icons ">edit</i> Edit</a>
                                                    @endcan
                                                    @can('delete currencies')
                                                        <div class="dropdown-divider"></div>
                                                        <a onclick="event.preventDefault(); document.getElementById('delete-form{{ $currency->id }}').submit();" class="dropdown-item"><i class="material-icons ">delete</i> Delete</a>
                                                        <form id="delete-form{{ $currency->id }}" action="{{ route('dashboard.currencies.destroy',$currency->id) }}" method="POST" class="d-none">
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
