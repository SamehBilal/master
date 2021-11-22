@extends('layouts.backend')

@section('title')
    Pickups
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('pickups.index') }}">pickups</a>
    </li>
    <li class="breadcrumb-item active">
        create
    </li>
@endsection

@section('button-link')
    {{ route('pickups.index') }}
@endsection

@section('button-icon')
    format_list_bulleted
@endsection

@section('button-title')
    All Pickups
@endsection

@section('main_content')
    <div class="container page__container page-section">

        <div class="page-separator">
            <div class="page-separator__text" style="line-height: 30px;">
                <button type="button" class="btn btn-sm rounded-circle btn-dark">
                    &nbsp;  2 &nbsp;
                </button>
                &nbsp; Customer Information
            </div>
        </div>
        <div class="card">
            <div class="card-body ">
                <div class="row">
                    <div class="col-lg-3 bg-light">
                        <div class="page-separator">
                            <div class="page-separator__text">Basic Details</div>
                        </div>
                        <p class="card-subtitle text-70 mb-16pt mb-lg-0">Basic details of the customer.</p>
                    </div>
                    <div class="col-lg-9 row ">
                        <div class="page-separator col-lg-12">
                            <div class="page-separator__text" >
                                &nbsp; Customer Information
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label"
                                       for="name">Name:</label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       value=""
                                       id="name"
                                       name="name"
                                       required="required"
                                       autocomplete="name"
                                       placeholder="Your first name ..."
                                       autofocus>
                                @error('name')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                @enderror
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label"
                                       for="email">Email address:</label>
                                <input type="email"
                                       id="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       value=""
                                       required="required"
                                       name="email"
                                       autocomplete="email"
                                       placeholder="Your email address ...">
                                @error('email')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                @enderror
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label"
                                       for="phone">Phone:</label>
                                <input type="text"
                                       class="form-control @error('phone') is-invalid @enderror"
                                       value=""
                                       id="phone"
                                       name="phone"
                                       data-mask="00000000000"
                                       placeholder="Your mobile phone ...">
                                @error('phone')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                @enderror
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label"
                                       for="secondary_phone">Secondary Phone:</label>
                                <input type="text"
                                       class="form-control @error('secondary_phone') is-invalid @enderror"
                                       value=""
                                       id="secondary_phone"
                                       name="secondary_phone"
                                       data-mask="00000000000"
                                       placeholder="Your secondary phone ...">
                                @error('secondary_phone')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                @enderror
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label"
                                       for="delivery_notes">Delivery Notes:</label> <small class="badge badge-secondary">optional</small>
                                <textarea rows="3"
                                          id="delivery_notes"
                                          name="delivery_notes"
                                          class="form-control @error('delivery_notes') is-invalid @enderror"
                                          placeholder="Delivery Notes ..."></textarea>
                                @error('delivery_notes')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                @enderror
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                        </div>
                        <div class="page-separator col-lg-12">
                            <div class="page-separator__text" >
                                &nbsp; Location Information
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label"
                                       for="select05">Country</label>
                                <select id="select05"
                                        data-toggle="select"
                                        class="form-control form-control-sm @error('country_id') is-invalid @enderror"
                                        name="country_id">
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
                                       for="select01">City</label>
                                <select id="select01"
                                        data-toggle="select"
                                        data-minimum-results-for-search="-1"
                                        class="form-control form-control-sm @error('city_id') is-invalid @enderror"
                                        name="city_id">
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
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
                                       for="street">Street:</label>
                                <div class="input-group input-group-merge">
                                    <input type="text"
                                           class="form-control @error('street') is-invalid @enderror"
                                           value="{{ old('street') }}"
                                           autocomplete="street"
                                           name="street"
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
                                           value="{{ old('building') }}"
                                           autocomplete="building"
                                           name="building"
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


                        <div class="col-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label"
                                       for="floor">Floor:</label>
                                <div class="input-group input-group-merge">
                                    <input type="text"
                                           class="form-control @error('floor') is-invalid @enderror"
                                           value="{{ old('floor') }}"
                                           autocomplete="floor"
                                           name="floor"
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
                                           value="{{ old('apartment') }}"
                                           autocomplete="apartment"
                                           name="apartment"
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
                                           name="landmarks"
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
                        <div class="col-md-12  mb-3">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox"
                                           class="custom-control-input"
                                           name="working_hours"
                                           id="customCheck1">
                                    <label class="custom-control-label"
                                           for="customCheck1">This is a work address</label>
                                    <small class="form-text text-muted">Mark it to deliver it within business days and working hours.</small>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <button type="submit"
                class="btn pull-right btn-primary">Submit</button>

    </div>
@endsection
