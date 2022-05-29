@extends('layouts.backend')

@section('title')
    {{ $pickup->pickup_id }}
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('dashboard.pickups.index') }}">pickups</a>
    </li>
    <li class="breadcrumb-item ">
        <a href="{{ route('dashboard.pickups.show',$pickup->id) }}">{{ $pickup->pickup_id }}</a>
    </li>
    <li class="breadcrumb-item active">
        Edit
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
        <form method="POST" action="{{ route('dashboard.pickups.update',$pickup->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
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
                            <div class="col-lg-12 invert location">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="select02">Pickup Locations:</label>
                                    <select id="select02"
                                            data-toggle="select"
                                            name="location_id"
                                            class="form-control form-control-sm @error('location_id') is-invalid @enderror">
                                        <option value="">Select location</option>
                                        @foreach($locations as $location)
                                            <option value="{{ $location->id }}" @if(old('location_id')) {{ old('location_id') == $location->id ? 'selected':'' }} @else {{ $pickup->location_id == $location->id ? 'selected':'' }} @endif >{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('location_id')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-lg-12 invert location">
                                <a href="#" class="text-dark" onclick="event.preventDefault();
                                                    display(module='location')">+ Create new Location</a>
                            </div>
                            <div class="col-12 hidden locations col-md-6 mb-3">
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
                            <div class="col-12 hidden locations col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="select01">State</label>
                                    <select id="select01"
                                            data-toggle="select"
                                            data-minimum-results-for-search="-1"
                                            class="form-control form-control-sm @error('state_id') is-invalid @enderror"
                                            name="state_id">
                                        @foreach($states as $state)
                                            <option value="{{ $state->id }}" {{ old('state_id') == $state->id ? 'selected':'' }} data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
                                                {{ $state->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('city_id')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-12 hidden locations col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="select03">City</label>
                                    <select id="select03"
                                            data-toggle="select"
                                            disabled
                                            data-minimum-results-for-search="-1"
                                            class="form-control form-control-sm @error('city_id') is-invalid @enderror"
                                            name="city_id">
                                        {{-- @foreach($cities as $city)
                                            <option value="{{ $city->id }}" data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
                                                {{ $city->name }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                    @error('city_id')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>


                            <div class="col-12 hidden locations col-md-6 mb-3">
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
                            <div class="col-12 hidden locations col-md-6 mb-3">
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


                            <div class="col-12 hidden locations col-md-6 mb-3">
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
                            <div class="col-12 hidden locations col-md-6 mb-3">
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
                            <div class="col-12 hidden locations col-md-12 mb-3">
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
                            <div class="col-md-12 hidden locations  mb-3">
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
                            <div class="col-lg-12 hidden locations">
                                <a href="#" class="text-dark" onclick="event.preventDefault();
                                                    displayInvert(module='location')">- Select from existed locations</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-separator">
                <div class="page-separator__text" style="line-height: 30px;">
                    <button type="button" class="btn btn-sm rounded-circle btn-dark">
                        &nbsp;  2 &nbsp;
                    </button>
                    &nbsp; Pickup Date
                </div>
            </div>
            <div class="card">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-lg-3 bg-light">
                            <div class="page-separator">
                                <div class="page-separator__text">Date Details</div>
                            </div>
                            <p class="card-subtitle text-70 mb-16pt mb-lg-0">Details of the date of the pickup.</p>
                        </div>
                        <div class="col-lg-9 row ">
                            <div class="page-separator col-lg-12">
                                <div class="page-separator__text" >
                                    &nbsp; Pickup Location
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="scheduled_date">Pickup Date:</label>
                                    <input type="hidden"
                                           class="form-control @error('scheduled_date') is-invalid @enderror flatpickr-input"
                                           value="{{ old('scheduled_date') ? old('scheduled_date'):$pickup->scheduled_date }}"
                                           id="scheduled_date"
                                           name="scheduled_date"
                                           data-toggle="flatpickr"
                                           placeholder="Pickup Date...">
                                    @error('scheduled_date')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-lg-12 invert date">
                                <a href="#" class="text-dark" onclick="event.preventDefault();
                                                    display(module='date')">Do you want to repeat the pickup?</a>
                            </div>
                            <div class="col-md-12 hidden dates">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="scheduled_date">Start Pickup Date:</label>
                                    <input type="hidden"
                                           class="form-control @error('scheduled_date') is-invalid @enderror flatpickr-input"
                                           value="{{ old('scheduled_date') ? old('scheduled_date'):$pickup->scheduled_date }}"
                                           id="scheduled_date"
                                           name="scheduled_date"
                                           data-toggle="flatpickr"
                                           placeholder="Pickup Date...">
                                    @error('scheduled_date')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-12 hidden dates">
                                <div class="form-group">
                                    <div class="custom-controls-stacked">
                                        <div class="custom-control custom-radio"  onclick="handleClick1();">
                                            <input id="radioStacked1"
                                                   name="type"
                                                   type="radio"
                                                   value="Daily"
                                                   class="custom-control-input"
                                                   {{ $pickup->type == 'Daily' ? 'checked=""':'' }}>
                                            <label for="radioStacked1"
                                                   class="custom-control-label">Daily</label>
                                        </div>
                                        <div class="custom-control custom-radio"  onclick="handleClick2();">
                                            <input id="radioStacked2"
                                                   name="type"
                                                   type="radio"
                                                   value="Weekly"
                                                   class="custom-control-input"
                                                {{ $pickup->type == 'Weekly' ? 'checked=""':'' }}>
                                            <label for="radioStacked2"
                                                   class="custom-control-label">Weekly</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 hidden multiple-select">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="select03">Multiple</label>
                                    <select id="select03"
                                            data-toggle="select"
                                            name="repeat_days"
                                            multiple
                                            class="form-control">
                                            <option value="Saturday"  @if($pickup->repeat_days){{ in_array('Saturday', $pickup->repeat_days)  ? 'selected':'' }}@endif>Saturday</option>
                                            <option value="Sunday"    @if($pickup->repeat_days){{ in_array('Sunday', $pickup->repeat_days) == 'Sunday' ? 'selected':'' }}@endif>Sunday</option>
                                            <option value="Monday"    @if($pickup->repeat_days){{ in_array('Monday', $pickup->repeat_days) == 'Monday' ? 'selected':'' }}@endif>Monday</option>
                                            <option value="Tuesday"   @if($pickup->repeat_days){{ in_array('Tuesday', $pickup->repeat_days) == 'Tuesday' ? 'selected':'' }}@endif>Tuesday</option>
                                            <option value="Wednesday" @if($pickup->repeat_days){{ in_array('Wednesday', $pickup->repeat_days) == 'Wednesday' ? 'selected':'' }}@endif>Wednesday</option>
                                            <option value="Thursday"  @if($pickup->repeat_days){{ in_array('Thursday', $pickup->repeat_days) == 'Thursday' ? 'selected':'' }}@endif>Thursday</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 hidden dates">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="end_date">End At:</label>
                                    <input type="hidden"
                                           class="form-control @error('end_date') is-invalid @enderror flatpickr-input"
                                           value="{{ old('end_date') ? old('end_date'):$pickup->end_date }}"
                                           id="end_date"
                                           name="end_date"
                                           data-toggle="flatpickr"
                                           placeholder="Pickup End Date...">
                                    @error('end_date')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-lg-12 hidden dates">
                                <a href="#" class="text-dark" onclick="event.preventDefault();
                                                    displayInvert(module='date')">- Stop recurring pickup</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-separator">
                <div class="page-separator__text" style="line-height: 30px;">
                    <button type="button" class="btn btn-sm rounded-circle btn-dark">
                        &nbsp;  3 &nbsp;
                    </button>
                    &nbsp; Contact Information
                </div>
            </div>
            <div class="card ">
                <div class="row card-body mb-32pt">
                    <div class="col-lg-3 bg-light">
                        <div class="page-separator">
                            <div class="page-separator__text">Contact Information</div>
                        </div>
                        <p class="card-subtitle text-70 mb-16pt mb-lg-0">
                            Add your pickup's contact information.
                        </p>
                    </div>
                    <div class="col-lg-9 row ">
                        <div class="col-lg-12 invert contact">
                            <div class="form-group">
                                <label class="form-label"
                                       for="select06">Contacts:</label>
                                <select id="select06"
                                        data-toggle="select"
                                        name="contact_id"
                                        class="form-control form-control-sm @error('contact_id') is-invalid @enderror">
                                    <option value="">Select Contact</option>
                                    @foreach($contacts as $contact)
                                        <option value="{{ $contact->id }}" @if(old('contact_id')) {{ old('contact_id') == $contact->id ? 'selected':'' }} @else {{ $pickup->contact_id == $contact->id ? 'selected':'' }} @endif>{{ $contact->contact_name }}</option>
                                    @endforeach
                                </select>
                                @error('contact_id')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                @enderror
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                        </div>
                        <div class="col-lg-12 invert contact">
                            <a href="#" class="text-dark" onclick="event.preventDefault();
                                                    display(module='contact')">+ Create new Contact</a>
                        </div>
                        <div class="col-6 col-md-6 mb-3 hidden contacts">
                            <div class="form-group">
                                <label class="form-label"
                                       for="contact_name">Contact name:</label>
                                <input type="text"
                                       class="form-control @error('contact_name') is-invalid @enderror"
                                       value="{{ old('contact_name') }}"
                                       autocomplete="contact_name"
                                       name="contact_name"
                                       id="contact_name"
                                       placeholder="Enter your contact name .."
                                       autofocus>
                                @error('contact_name')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                @enderror
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-6 mb-3 hidden contacts">
                            <div class="form-group">
                                <label class="form-label"
                                       for="contact_job_title">Job title:</label>
                                <input type="text"
                                       class="form-control @error('contact_job_title') is-invalid @enderror"
                                       value="{{ old('contact_job_title') }}"
                                       autocomplete="contact_job_title"
                                       name="contact_job_title"
                                       id="contact_job_title"
                                       placeholder="Enter your contact job title ..">
                                @error('contact_job_title')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                @enderror
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-6 mb-3 hidden contacts">
                            <div class="form-group">
                                <label class="form-label"
                                       for="contact_phone">Phone:</label>
                                <input type="text"
                                       class="form-control @error('contact_phone') is-invalid @enderror"
                                       value="{{ old('contact_phone') }}"
                                       autocomplete="contact_phone"
                                       name="contact_phone"
                                       id="contact_phone"
                                       placeholder="EG phone: +(20)10 0000 0000)"
                                       data-mask="01000000000">
                                @error('contact_phone')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                @enderror
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                        </div>
                        <div class="col-6 col-md-6 mb-3 hidden contacts">
                            <div class="form-group">
                                <label class="form-label"
                                       for="contact_email">Email:</label>
                                <input type="email"
                                       class="form-control @error('contact_email') is-invalid @enderror"
                                       value="{{ old('contact_email') }}"
                                       autocomplete="contact_email"
                                       name="contact_email"
                                       id="contact_email"
                                       placeholder="Enter your email address .."
                                       autofocus>
                                @error('contact_email')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                @enderror
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                        </div>
                        <div class="col-lg-12 hidden contacts">
                            <a href="#" class="text-dark" onclick="event.preventDefault();
                                                    displayInvert(module='contact')">- Select from existed contacts</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-separator">
                <div class="page-separator__text" style="line-height: 30px;">
                    <button type="button" class="btn btn-sm rounded-circle btn-dark">
                        &nbsp;  4 &nbsp;
                    </button>
                    &nbsp; Extra Information
                </div>
            </div>
            <div class="card ">
                <div class="row card-body mb-32pt">
                    <div class="col-lg-3 bg-light">
                        <div class="page-separator">
                            <div class="page-separator__text">Extra Information</div>
                        </div>
                        <p class="card-subtitle text-70 mb-16pt mb-lg-0">
                            Add your pickup's extra notes.
                        </p>
                    </div>
                    <div class="col-lg-9 row ">
                        <div class="col-lg-12 ">
                            <div class="form-group">
                                <label class="form-label"
                                       for="notes">Notes:</label>
                                <textarea rows="3"
                                          id="notes"
                                          name="notes"
                                          class="form-control @error('notes') is-invalid @enderror"
                                          placeholder="Notes ...">{{ old('notes') ? old('notes'):$pickup->notes }}</textarea>
                                @error('notes')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                @enderror
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-separator">
                <div class="page-separator__text" style="line-height: 30px;">
                    <button type="button" class="btn btn-sm rounded-circle btn-dark">
                        &nbsp;  5 &nbsp;
                    </button>
                    &nbsp; Pickup Status
                </div>
            </div>
            <div class="card ">
                <div class="row card-body mb-32pt">
                    <div class="col-lg-3 bg-light">
                        <div class="page-separator">
                            <div class="page-separator__text">Pickup Status</div>
                        </div>
                        <p class="card-subtitle text-70 mb-16pt mb-lg-0">
                            Update your pickup's status.
                        </p>
                    </div>
                    <div class="col-lg-9 row ">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label"
                                       for="select02">Pickup Status:</label>
                                <select id="select02"
                                        data-toggle="select"
                                        name="status"
                                        class="form-control form-control-sm @error('status') is-invalid @enderror">
                                    <option value="">Select status</option>
                                    <option value="Created" @if(old('status')) {{ old('status') == 'Created' ? 'selected':'' }} @else {{ $pickup->status == 'Created' ? 'selected':'' }} @endif >Created</option>
                                    <option value="Out for pickup" @if(old('status')) {{ old('status') == 'Out for pickup' ? 'selected':'' }} @else {{ $pickup->status == 'Out for pickup' ? 'selected':'' }} @endif >Out for pickup</option>
                                    <option value="Picked up" @if(old('status')) {{ old('status') == 'Picked up' ? 'selected':'' }} @else {{ $pickup->status == 'Picked up' ? 'selected':'' }} @endif >Picked up</option>

                                </select>
                                @error('status')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                @enderror
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="pickup_id" value="{{ $pickup->pickup_id }}">

            <button type="submit"
                    class="btn pull-right btn-primary">Submit</button>
        </form>
    </div>
@endsection

@section('extra-scripts')
    @include('components.locations_ajax')
@endsection
