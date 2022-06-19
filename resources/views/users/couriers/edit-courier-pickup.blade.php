@extends('layouts.backend')

@section('title')
    {{ __('dashboard.pickups') }}
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('dashboard.pickups.index') }}">{{ __('dashboard.pickups') }}</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.pickups.show',$pickup->id) }}">{{ $pickup->pickup_id }}</a>
    </li>
    <li class="breadcrumb-item active">
        {{ $log->courier->full_name }}
    </li>
@endsection

@section('button-link')
    {{ route('dashboard.pickups.index') }}
@endsection

@section('button-icon')
    format_list_bulleted
@endsection

@section('button-title')
    {{ __('dashboard.All_pickups') }}
@endsection

@section('main_content')

    <div class="container page__container page-section">

        <div class="row mb-32pt">
            <div class="col-lg-4">
                <div class="page-separator">
                    <div class="page-separator__text">{{ __('dashboard.Update Courier for the pickup') }}</div>
                </div>
            </div>

            <div class="col-lg-8 d-flex align-items-center">
                <div class="flex"
                     style="max-width: 100%">
                    <form id="multi-form" action="{{ route('dashboard.pickups.update.courier',[$pickup->id,$log->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="form-label"
                                   for="select04">{{ __('dashboard.courier') }}:</label>
                            <select id="select04"
                                    data-toggle="select"
                                    name="courier_id"
                                    class="form-control form-control-sm @error('courier_id') is-invalid @enderror">
                                <option value="">{{ __('dashboard.Select courier') }}</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" @if(old('courier_id')) {{ old('courier_id') == $user->id ? 'selected':'' }} @else {{ $log->courier_id == $user->id ? 'selected':'' }} @endif>{{ $user->full_name }}</option>
                                @endforeach
                            </select>
                            @error('courier_id')
                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                        <button type="submit"
                                class="btn pull-right btn-primary">Submit</button>
                        <a onclick="event.preventDefault(); document.getElementById('delete-form').submit();" class="btn btn-danger ml-0">Delete</a>

                    </form>
                    <form id="delete-form" action="{{ route('dashboard.pickups.delete.courier',[$pickup->id,$log->id]) }}" method="POST" class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>

        </div>

    </div>

@endsection
