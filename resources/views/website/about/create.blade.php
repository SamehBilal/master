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
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="en_mission">{{ __('dashboard.en_mission') }}:</label>
                                    <textarea type="text"
                                           class="form-control @error('en_mission') is-invalid @enderror"
                                           id="en_mission"
                                           name="en_mission"
                                           required="required"
                                           placeholder="{{ __('dashboard.en_mission') }} ..."
                                              autofocus>{{ $info == null ? old('en_mission'):old('en_mission',$info->en_mission) }}</textarea>
                                    @error('en_mission')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="ar_mission">{{ __('dashboard.ar_mission') }}:</label>
                                    <textarea type="text"
                                           class="form-control @error('ar_mission') is-invalid @enderror"
                                           id="ar_mission"
                                           name="ar_mission"
                                           required="required"
                                           placeholder="{{ __('dashboard.ar_mission') }} ..."
                                              autofocus>{{ $info == null ? old('ar_mission'):old('ar_mission',$info->ar_mission) }}</textarea>
                                    @error('ar_mission')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="en_vision">{{ __('dashboard.en_vision') }}:</label>
                                    <textarea type="text"
                                              class="form-control @error('en_vision') is-invalid @enderror"
                                              id="en_vision"
                                              name="en_vision"
                                              required="required"
                                              placeholder="{{ __('dashboard.en_vision') }} ..."
                                              autofocus>{{ $info == null ? old('en_vision'):old('en_vision',$info->en_vision) }}</textarea>
                                    @error('en_vision')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="ar_vision">{{ __('dashboard.ar_vision') }}:</label>
                                    <textarea type="text"
                                              class="form-control @error('ar_vision') is-invalid @enderror"
                                              id="ar_vision"
                                              name="ar_vision"
                                              required="required"
                                              placeholder="{{ __('dashboard.ar_vision') }} ..."
                                              autofocus>{{ $info == null ? old('ar_vision'):old('ar_vision',$info->ar_vision) }}</textarea>
                                    @error('ar_vision')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="en_footer_description">{{ __('dashboard.en_footer_description') }}:</label>
                                    <textarea type="text"
                                              class="form-control @error('en_footer_description') is-invalid @enderror"
                                              id="en_footer_description"
                                              name="en_footer_description"
                                              required="required"
                                              placeholder="{{ __('dashboard.en_footer_description') }} ..."
                                              autofocus>{{ $info == null ? old('en_footer_description'):old('en_footer_description',$info->en_footer_description) }}</textarea>
                                    @error('en_footer_description')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="ar_footer_description">{{ __('dashboard.ar_footer_description') }}:</label>
                                    <textarea type="text"
                                              class="form-control @error('ar_footer_description') is-invalid @enderror"
                                              id="ar_footer_description"
                                              name="ar_footer_description"
                                              required="required"
                                              placeholder="{{ __('dashboard.ar_footer_description') }} ..."
                                              autofocus>{{ $info == null ? old('ar_footer_description'):old('ar_footer_description',$info->ar_footer_description) }}</textarea>
                                    @error('ar_footer_description')
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
