@extends('layouts.backend')

@section('title')
    Pickups
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('dashboard.pickups.index') }}">pickups</a>
    </li>
    <li class="breadcrumb-item active">
        create
    </li>
@endsection

@section('button-link')
    {{ route('dashboard.pickups.index') }}
@endsection

@section('button-icon')
    format_list_bulleted
@endsection

@section('button-title')
    All Pickups
@endsection

@section('main_content')
    <div class="container page__container page-section">
        <form method="POST" action="{{ route('dashboard.pickups.index') }}" enctype="multipart/form-data">
            @csrf
            <div class="page-separator">
                <div class="page-separator__text" style="line-height: 30px;">
                    <button type="button" class="btn btn-sm rounded-circle btn-dark">
                        &nbsp;  1 &nbsp;
                    </button>
                    &nbsp; Location Information
                </div>
            </div>
            <div class="card">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-lg-3 bg-light">
                            <div class="page-separator">
                                <div class="page-separator__text">Location Details</div>
                            </div>
                            <p class="card-subtitle text-70 mb-16pt mb-lg-0">Basic details of the Location of the pickup.</p>
                        </div>
                        <div class="col-lg-9 row ">
                            <div class="page-separator col-lg-12">
                                <div class="page-separator__text" >
                                    &nbsp; Pickup Location
                                </div>
                            </div>
                            <div class="col-lg-12 d-flex align-items-center">
                                <div class="flex"
                                     style="max-width: 100%">
                                    <div class="form-row">
                                        <div class="col-12 col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="location_name">Name:</label>
                                                <input type="text"
                                                       class="form-control @error('location_name') is-invalid @enderror"
                                                       value="{{ old('location_name') }}"
                                                       id="location_name"
                                                       name="location_name[]"
                                                       required="required"
                                                       autocomplete="location_name"
                                                       placeholder="name ..."
                                                       autofocus>
                                                @error('location_name')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                @enderror
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="select05">Country</label>
                                                <select id="select05"
                                                        data-toggle="select"
                                                        class="form-control select05 form-control-sm @error('country_id') is-invalid @enderror"
                                                        name="country_id[]">
                                                    @foreach($countries as $country)
                                                        <option value="{{ $country->id }}" {{ $country->id == 64 ? 'selected':'' }} data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
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
                                                       for="select01">State</label>
                                                <select id="select01"
                                                        data-toggle="select"
                                                        data-minimum-results-for-search="-1"
                                                        class="form-control select01 form-control-sm @error('state_id') is-invalid @enderror"
                                                        name="state_id[]">
                                                    @foreach($states as $state)
                                                        <option value="{{ $state->id }}" {{ old('state_id') == $state->id ? 'selected':'' }} data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
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
                                                       for="select03">City</label>
                                                <select id="select03"
                                                        data-toggle="select"
                                                        disabled
                                                        data-minimum-results-for-search="-1"
                                                        class="form-control select03 form-control-sm @error('city_id') is-invalid @enderror"
                                                        name="city_id[]">
                                                </select>
                                                @error('city_id')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                @enderror
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-12 col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="street">Street:</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="text"
                                                           class="form-control @error('street') is-invalid @enderror"
                                                           value="{{ old('street[]') }}"
                                                           autocomplete="street"
                                                           name="street[]"
                                                           id="street"
                                                           placeholder="Enter your street .."
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
                                                       for="building">Building:</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="text"
                                                           class="form-control @error('building') is-invalid @enderror"
                                                           value="{{ old('building[]') }}"
                                                           autocomplete="building"
                                                           name="building[]"
                                                           id="building"
                                                           placeholder="Enter your building .."
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
                                    </div>
                                    <div class="form-row">
                                        <div class="col-12 col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="floor">Floor:</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="text"
                                                           class="form-control @error('floor') is-invalid @enderror"
                                                           value="{{ old('floor[]') }}"
                                                           autocomplete="floor"
                                                           name="floor[]"
                                                           id="floor"
                                                           placeholder="Enter your floor .."
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
                                                       for="apartment">Apartment:</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="text"
                                                           class="form-control @error('apartment') is-invalid @enderror"
                                                           value="{{ old('apartment[]') }}"
                                                           autocomplete="apartment"
                                                           name="apartment[]"
                                                           id="apartment"
                                                           placeholder="Enter your apartment .."
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
                                                       for="landmarks">Landmarks:</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="text"
                                                           class="form-control @error('landmarks') is-invalid @enderror"
                                                           value="{{ old('landmarks') }}"
                                                           autocomplete="landmarks"
                                                           name="landmarks[]"
                                                           id="landmarks"
                                                           placeholder="Enter your landmarks .."
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
                    </div>
                </div>
            </div>


            <input type="hidden" name="location_in" value="full">
            <button type="submit"
                    class="btn pull-right btn-primary">Submit</button>
        </form>
    </div>
@endsection

@section('extra-scripts')
    <script src="{{  asset('backend/js/locations_ajax.js') }}"></script>
@endsection
