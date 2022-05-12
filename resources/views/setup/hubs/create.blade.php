@extends('layouts.backend')

@section('title')
{{ __('dashboard.hubs') }}
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('dashboard.hubs.index') }}">{{ __('dashboard.hubs') }}</a>
    </li>
    <li class="breadcrumb-item active">
        {{ __('dashboard.create') }}
    </li>
@endsection

@section('button-link')
    {{ route('dashboard.hubs.index') }}
@endsection

@section('button-icon')
    format_list_bulleted
@endsection

@section('button-title')
{{ __('dashboard.All hubs') }}
@endsection

@section('main_content')
    <div class="container page__container page-section">
        <div class="page-separator">
            <div class="page-separator__text" >
                {{ __('dashboard.Hubs Information') }}
            </div>
        </div>
        <form method="POST" action="{{ route('dashboard.hubs.index') }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-lg-3 bg-light">
                            <div class="page-separator">
                                <div class="page-separator__text">{{ __('dashboard.Basic Details') }}</div>
                            </div>
                            <p class="card-subtitle text-70 mb-16pt mb-lg-0">{{ __('dashboard.Basic details of the hub') }}</p>
                        </div>
                        <div class="col-lg-9 row p-2">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="ar_name">{{ __('dashboard.ar_Name') }}:</label>
                                    <input type="text"
                                           class="form-control @error('ar_name') is-invalid @enderror"
                                           value="{{ old('ar_name') }}"
                                           id="ar_name"
                                           name="ar_name"
                                           required="required"
                                           autocomplete="ar_name"
                                           placeholder="{{ __('dashboard.ar_Name') }} ..."
                                           autofocus>
                                    @error('ar_name')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="en_name">{{ __('dashboard.en_Name') }}:</label>
                                    <input type="text"
                                           class="form-control @error('en_name') is-invalid @enderror"
                                           value="{{ old('en_name') }}"
                                           id="en_name"
                                           name="en_name"
                                           required="required"
                                           autocomplete="en_name"
                                           placeholder="{{ __('dashboard.en_Name') }} ..."
                                           autofocus>
                                    @error('en_name')
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
                    class="btn pull-right btn-primary">{{ __('dashboard.Submit') }}</button>
        </form>
    </div>
@endsection
