@extends('layouts.backend')

@section('title')
    Pickup Customer Logs
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('dashboard.pickups.show',$pickup->id) }}">#{{ $pickup->pickup_id }}</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="{{ route('dashboard.pickup-customer-logs.index',$pickup->id) }}">Pickup Customer Logs</a>
    </li>
    <li class="breadcrumb-item active">
        create
    </li>
@endsection

@section('button-link')
    {{ route('dashboard.pickup-customer-logs.index',$pickup->id) }}
@endsection

@section('button-icon')
    format_list_bulleted
@endsection

@section('button-title')
    All Pickup Customer Logs
@endsection

@section('main_content')
    <div class="container page__container page-section">
        <div class="page-separator">
            <div class="page-separator__text" >
                Pickup Customer Logs Information
            </div>
        </div>
        <form method="POST" action="{{ route('dashboard.pickup-customer-logs.store',$pickup->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-lg-3 bg-light">
                            <div class="page-separator">
                                <div class="page-separator__text">Basic Details</div>
                            </div>
                            <p class="card-subtitle text-70 mb-16pt mb-lg-0">Basic details of the user pickup customer Logs listed.</p>
                        </div>
                        <div class="col-lg-9 row p-2">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="description">Notes:</label>
                                    <textarea rows="3"
                                              id="notes"
                                              name="notes"
                                              class="form-control @error('notes') is-invalid @enderror"
                                              placeholder="Notes">{{ old('notes') }}</textarea>
                                    @error('notes')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="select03">Status</label>
                                    <select id="select03"
                                            data-toggle="select"
                                            data-minimum-results-for-search="-1"
                                            class="form-control form-control-sm @error('status') is-invalid @enderror"
                                            name="status">
                                        @foreach($logs as $log)
                                            <option value="{{ $log['type'] }}" {{ old('status') == $log['type'] ? 'selected':'' }}>
                                                {{ $log['type'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="select02">Hub</label>
                                    <select id="select02"
                                            data-toggle="select"
                                            class="form-control form-control-sm @error('hub_id') is-invalid @enderror"
                                            name="hub_id">
                                        @foreach($hubs as $hub)
                                            <option value="{{ $hub->id }}" {{ old('hub_id') == $hub->id ? 'selected':'' }}>
                                                {{ $hub->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('hub_id')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit"
                    class="btn pull-right btn-primary">Submit</button>
        </form>
    </div>
@endsection
