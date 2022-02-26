@extends('layouts.backend')

@section('title')
    {{ __('dashboard.Language') }}
@endsection

@section('links')
    <li class="breadcrumb-item active">
        {{ __('dashboard.Language') }}
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
    <div class="page-section container page__container">
        <form action="{{ route('website.index').'/lang/' }}" id="form_change">
            <div class="page-separator">
                <div class="page-separator__text">{{ __('dashboard.Language') }}</div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 bg-light">
                            <div class="page-separator">
                                <div class="page-separator__text">{{ __('dashboard.Change Language') }}</div>
                            </div>
                            <p class="card-subtitle text-70 mb-16pt mb-lg-0">{{ __('dashboard.Change the language of the system') }}</p>
                        </div>
                        <div class="col-lg-9 row p-3">
                            <div class="col-md-12 p-0">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="select05">{{ __('dashboard.Language') }}:</label>
                                    <select id="select05"
                                            data-toggle="select"
                                            name="language"
                                            class="form-control language-change form-control-sm @error('language') is-invalid @enderror">
                                        <option value="" >...</option>
                                        <option value="ar" >{{ __('dashboard.Arabic') }}</option>
                                        <option value="en" >{{ __('dashboard.English') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit"
                    class="btn btn-primary">{{ __('dashboard.Save Changes') }}</button>
        </form>

    </div>
@endsection
