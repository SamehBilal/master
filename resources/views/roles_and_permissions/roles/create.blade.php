@extends('layouts.backend')

@section('title')
{{ __('dashboard.Roles') }}
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('dashboard.roles.index') }}">{{ __('dashboard.Roles') }}</a>
    </li>
    <li class="breadcrumb-item active">
        {{ __('dashboard.create') }}
    </li>
@endsection

@section('button-link')
    {{ route('dashboard.roles.index') }}
@endsection

@section('button-icon')
    format_list_bulleted
@endsection

@section('button-title')
{{ __('dashboard.All Roles') }}
@endsection

@section('main_content')
    <div class="container page__container page-section">
        <div class="page-separator">
            <div class="page-separator__text" >
                {{ __('dashboard.Role Information') }}
            </div>
        </div>
        <form method="POST" action="{{ route('dashboard.roles.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-lg-3 bg-light">
                            <div class="page-separator">
                                <div class="page-separator__text">{{ __('dashboard.Basic Details') }}</div>
                            </div>
                            <p class="card-subtitle text-70 mb-16pt mb-lg-0">{{ __('dashboard.Basic details of the Roles listed') }}</p>
                        </div>
                        <div class="col-lg-9 row p-2">
                            <div class="col-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="name">{{ __('dashboard.Name') }}:</label>
                                    <input type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}"
                                           id="name"
                                           name="name"
                                           required="required"
                                           autocomplete="name"
                                           placeholder="{{ __('dashboard.Name') }} ..."
                                           autofocus>
                                    @error('name')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="select03">{{ __('dashboard.Select Role Permissions') }}</label>
                                    <select id="select03"
                                            name="permissions[]"
                                            data-toggle="select"
                                            multiple
                                            class="form-control">
										@foreach ($permissions as $permission)
											<option value="{{$permission->id}}">{{$permission->name}}</option>
										@endforeach
                                    </select>
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
