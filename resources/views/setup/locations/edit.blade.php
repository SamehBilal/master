@extends('layouts.backend')

@section('title')
    {{ $location->name}}
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('dashboard.locations.index') }}">{{ __('dashboard.Locations') }}</a>
    </li>
    <li class="breadcrumb-item ">
        <a href="{{ route('dashboard.locations.show', $location->id) }}">{{ $location->name}}</a>
    </li>
    <li class="breadcrumb-item active">
        {{ __('dashboard.Edit') }}
    </li>
@endsection

@section('button-link')
    {{ route('dashboard.locations.index') }}
@endsection

@section('button-icon')
    format_list_bulleted
@endsection

@section('button-title')
{{ __('dashboard.Edit') }}
@endsection

@section('main_content')
    <div class="container page__container page-section">
        <div class="page-separator">
            <div class="page-separator__text" >
                {{ __('dashboard.Location Information') }}
            </div>
        </div>
        <form method="POST" action="{{ route('dashboard.locations.update',$location->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-lg-3 bg-light">
                            <div class="page-separator">
                                <div class="page-separator__text">{{ __('dashboard.Basic Details') }}</div>
                            </div>
                            <p class="card-subtitle text-70 mb-16pt mb-lg-0">{{ __('dashboard.Basic details of the user locations listed') }}</p>
                        </div>
                        <div class="col-lg-9 row p-2">
                        <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="name">{{ __('dashboard.Name') }}:</label>
                                    <input type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') ? old('name'):$location->name }}"
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
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="country_id">{{ __('dashboard.Country') }}</label>
                                    <select id="country_id"
                                            data-toggle="select"
                                            class="form-control select05 select005 form-control-sm @error('country_id') is-invalid @enderror"
                                            name="country_id">
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}" {{ $country->id == $location->country_id ? 'selected':'' }} data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="state_id">{{ __('dashboard.State') }}</label>
                                    <select id="state_id"
                                            data-toggle="select"
                                            class="form-control select01 select005 form-control-sm @error('state_id') is-invalid @enderror"
                                            name="state_id">
                                        @foreach($states as $state)
                                            <option value="{{ $state->id }}" {{ $state->id == $location->state_id ? 'selected':'' }} data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
                                                {{ $state->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('state_id')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="city_id">{{ __('dashboard.City') }}</label>
                                    <select id="city_id"
                                            data-toggle="select"
                                            class="form-control select03 select005 form-control-sm @error('city_id') is-invalid @enderror"
                                            name="city_id">
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}" {{ $city->id == $location->city_id ? 'selected':'' }} data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
                                                {{ $city->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('city_id')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>


                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="street">{{ __('dashboard.Street') }}:</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text"
                                               class="form-control @error('street') is-invalid @enderror"
                                               value="{{ old('street') ? old('street'):$location->street }}"
                                               autocomplete="street"
                                               name="street"
                                               id="street"
                                               placeholder="{{ __('dashboard.Enter your street') }} .."
                                               autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="material-icons">home_work</span>
                                            </div>
                                        </div>
                                        @error('street')
                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="building">{{ __('dashboard.Building') }}:</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text"
                                               class="form-control @error('building') is-invalid @enderror"
                                               value="{{ old('building') ? old('building'):$location->building }}"
                                               autocomplete="building"
                                               name="building"
                                               id="building"
                                               placeholder="{{ __('dashboard.Enter your building') }} .."
                                               autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="material-icons">home</span>
                                            </div>
                                        </div>
                                        @error('building')
                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="floor">{{ __('dashboard.Floor') }}:</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text"
                                               class="form-control @error('floor') is-invalid @enderror"
                                               value="{{ old('floor') ? old('floor'):$location->floor }}"
                                               autocomplete="floor"
                                               name="floor"
                                               id="floor"
                                               placeholder="{{ __('dashboard.Enter your floor') }} .."
                                               autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="material-icons">local_convenience_store</span>
                                            </div>
                                        </div>
                                        @error('floor')
                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="apartment">{{ __('dashboard.Apartment') }}:</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text"
                                               class="form-control @error('apartment') is-invalid @enderror"
                                               value="{{ old('apartment') ? old('apartment'):$location->apartment }}"
                                               autocomplete="apartment"
                                               name="apartment"
                                               id="apartment"
                                               placeholder="{{ __('dashboard.Enter your apartment') }} .."
                                               autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="material-icons">apartment</span>
                                            </div>
                                        </div>
                                        @error('apartment')
                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="landmarks">{{ __('dashboard.Landmarks') }}:</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text"
                                               class="form-control @error('landmarks') is-invalid @enderror"
                                               value="{{ old('landmarks') ? old('landmarks'):$location->landmarks }}"
                                               autocomplete="landmarks"
                                               name="landmarks"
                                               id="landmarks"
                                               placeholder="{{ __('dashboard.Enter your landmarks') }} .."
                                               autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="material-icons">apartment</span>
                                            </div>
                                        </div>
                                        @error('landmarks')
                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="pickup_id" value="{{ isset($_GET['pickup']) ? $_GET['pickup']:'' }}">
            <button type="submit"
                    class="btn pull-right btn-primary">{{ __('dashboard.Submit') }}</button>
        </form>
    </div>
@endsection

@section('extra-scripts')
    @include('components.locations_ajax')

    <script>
        $(document).ready(function() {

            $('.select005').select2();
        });
    </script>
@endsection
