@extends('layouts.backend')

@section('title')
    Pickup Customer Logs
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('dashboard.pickups.show',$pickup->id) }}">#{{ $pickup->pickup_id }}</a>
    </li>
    <li class="breadcrumb-item active">
        Pickup Logs
    </li>
@endsection

@section('button-link')
    {{ route('dashboard.pickup-customer-logs.create',$pickup->id) }}
@endsection

@section('button-icon')
    add
@endsection

@section('button-title')
    New Pickup Customer Log
@endsection

@section('main_content')
    <div class="container page__container">
        <div class="page-section">
            <div class="page-separator">
                <div class="page-separator__text">Pickup Customer Logs</div>
            </div>


            <div class="card m-0">

                <div class="table-responsive"
                     data-toggle="lists"
                     data-lists-sort-by="js-lists-values-name"
                     data-lists-values='["js-lists-values-name", "js-lists-values-model", "js-lists-values-status", "js-lists-values-created"]'>

                    <div class="card-header">
                        <div class="search-form">
                            <input type="text"
                                   class="form-control search"
                                   placeholder="Search ...">
                            <button class="btn"
                                    type="button"><i class="material-icons">search</i></button>
                        </div>
                    </div>

                    <table class="table mb-0 thead-bpickup-top-0 table-nowrap">
                        <thead>
                        <tr>

                            <th>
                                <a href="javascript:void(0)"
                                   class="sort"
                                   data-sort="js-lists-values-name">Notes</a>
                            </th>

                            <th style="width: 37px;"
                                data-sort="js-lists-values-status">Status</th>

                            <th style="width: 120px;">
                                <a href="javascript:void(0)"
                                   class="sort"
                                   data-sort="js-lists-values-created">Created</a>
                            </th>

                            <th style="width: 24px;"
                                class="pl-0"></th>
                        </tr>
                        </thead>
                        <tbody class="list"
                               id="search">
                        @foreach($pickup->customerlog as $log)

                            <tr>

                                <td>

                                    <div class="media flex-nowrap align-items-center"
                                         style="white-space: nowrap;">

                                        <div class="media-body">

                                            <div class="d-flex flex-column">
                                                <p class="mb-0"><strong class="js-lists-values-name">{{ $log->notes }}</strong></p>
                                            </div>

                                        </div>
                                    </div>

                                </td>

                                <td class="js-lists-values-status small">
                                    <a href="#"
                                       class="chip chip-outline-secondary">{{ $log->status }}</a>
                                </td>


                                <td class=" js-lists-values-created small">
                                    <div class="d-flex flex-column">
                                        <small class=""><strong>{{ date("F j, Y, g:i a", strtotime($log->created_at)) }}</strong></small>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <a onclick="event.preventDefault(); document.getElementById('delete-form{{ $log->id }}').submit();" class="dropdown-item"><i class="material-icons ">delete</i> </a>
                                    <form id="delete-form{{ $log->id }}" action="{{ route('dashboard.pickup-customer-logs.destroy',[$pickup->id,$log->id]) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>

            </div>


        </div>

    </div>
@endsection
