@extends('layouts.backend')

@section('title')
    {{ $role->name}}
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('dashboard.roles.index') }}">{{ __('dashboard.Roles') }}</a>
    </li>
    <li class="breadcrumb-item active">
        {{ __('dashboard.edit') }}
    </li>
@endsection

@section('button-link')
    {{ route('dashboard.roles.index') }}
@endsection

@section('button-icon')
    format_list_bulleted
@endsection

@section('button-title')
{{ __('dashboard.edit') }}
@endsection

@section('main_content')
    <div class="container page__container page-section">
        <div class="page-separator">
            <div class="page-separator__text" >
                {{ __('dashboard.Roles Information') }}
            </div>
        </div>
        <form method="POST" action="{{ route('dashboard.roles.update',$role->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
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
                                           value="{{ old('name') ? old('name'):$role->name }}"
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
                            <div class="col-12 col-md-12 mb-3">
                                <div class="row">

                                    @foreach($permissions as $chunk)
                                    
                                    <div class="col-xl-4">
                                        <!--begin::List Widget 4-->
                                        <div class="card card-custom card-stretch gutter-b">
                                            <!--begin::Header-->
                                            <div class="card-header border-0">
                                                <h3 class="card-title font-weight-bolder text-dark">{{ Str::afterLast(array_values($chunk->toArray())[0]['name'], ' ') }}</h3>
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Body-->
                                            <div class="card-body pt-2">
                                                @foreach($chunk as $permission)
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center mb-5">
                                                    <!--begin::Bullet-->
                                                    <span class="bullet bullet-bar bg-success align-self-stretch"></span>
                                                    <!--end::Bullet-->
                                                    <!--begin::Checkbox-->
                                                    <label class="checkbox checkbox-lg checkbox-success checkbox-inline flex-shrink-0 m-0 mx-4">
                                                        <input type="checkbox" {{ in_array($permission['id'], $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }} name="permissions[{{ $permission['id'] }}]">
                                                        <span></span>
                                                    </label>
                                                    <!--end::Checkbox-->
                                                    <!--begin::Text-->
                                                    <div class="d-flex flex-column flex-grow-1">
                                                        <label class="text-dark-75 text-hover-success font-weight-bold font-size-lg mb-1">{{ Str::beforeLast($permission['name'], ' ') }}</label>
                                                    </div>
                                                    <!--end::Text-->
                                                </div>
                                                <!--end:Item-->
                                                @endforeach 
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end:List Widget 4-->
                                    </div>
                                    @endforeach 
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

@section('extra-scripts')
    <script src="{{  asset('backend/js/locations_ajax.js') }}"></script>
@endsection
