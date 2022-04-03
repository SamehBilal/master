@extends('layouts.backend')

@section('title')
    {{ __('dashboard.mission') }}
@endsection

@section('links')

    <li class="breadcrumb-item ">
        {{ __('dashboard.mission') }}
    </li>
@endsection

@section('button-link')
    {{ route('dashboard') }}
@endsection

@section('button-icon')
    dashboard
@endsection

@section('button-title')
    {{ __('dashboard.Dashboard') }}
@endsection

@section('main_content')
    <div class="container page__container page-section">
        <div class="page-separator">
            <div class="page-separator__text" >
                {{ __('dashboard.Basic Details') }}
            </div>
        </div>
        @if($info)
            <form method="POST" action="{{ route('dashboard.mission.update',$info->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
        @else
            <form method="POST" action="{{ route('dashboard.mission.index') }}" enctype="multipart/form-data">
                @csrf
        @endif
            <div class="card">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-lg-3 bg-light">
                            <div class="page-separator">
                                <div class="page-separator__text">{{ __('dashboard.Basic Details') }}</div>
                            </div>
                            <p class="card-subtitle text-70 mb-16pt mb-lg-0">{{ __('dashboard.Basic Details') }}</p>
                        </div>
                        <div class="col-lg-9 row p-2">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="mission">{{ __('dashboard.Mission') }}:</label>
                                    <textarea type="text"
                                           class="form-control @error('mission') is-invalid @enderror"
                                           id="mission"
                                           name="mission"
                                           required="required"
                                           placeholder="{{ __('dashboard.Mission') }} ..."
                                              autofocus>{{ $info == null ? old('mission'):old('mission',$info->mission) }}</textarea>
                                    @error('mission')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="vision">{{ __('dashboard.Vision') }}:</label>
                                    <textarea type="text"
                                              class="form-control @error('vision') is-invalid @enderror"
                                              id="vision"
                                              name="vision"
                                              required="required"
                                              placeholder="{{ __('dashboard.Vision') }} ..."
                                              autofocus>{{ $info == null ? old('vision'):old('vision',$info->vision) }}</textarea>
                                    @error('vision')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="footer_description">{{ __('dashboard.footer description') }}:</label>
                                    <textarea type="text"
                                              class="form-control @error('footer_description') is-invalid @enderror"
                                              id="footer_description"
                                              name="footer_description"
                                              required="required"
                                              placeholder="{{ __('dashboard.footer description') }} ..."
                                              autofocus>{{ $info == null ? old('footer_description'):old('footer_description',$info->footer_description) }}</textarea>
                                    @error('footer_description')
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
