@extends('layouts.backend')

@section('title')
{{ __('dashboard.Pickups') }}
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('dashboard.pickups.index') }}">{{ __('dashboard.Pickups') }}</a>
    </li>
    <li class="breadcrumb-item active">
        {{ __('dashboard.create') }}
    </li>
@endsection

@section('button-link')
    {{ route('dashboard.pickups.index') }}
@endsection

@section('button-icon')
    format_list_bulleted
@endsection

@section('button-title')
{{ __('dashboard.All Pickups') }}
@endsection

@section('main_content')
    <div class="container page__container page-section">

        @if($errors->any())
            <div class="card overlay--show card-lg overlay--primary-dodger-blue stack stack--1 card-group-row__card">

                <div class="card-body d-flex flex-column">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mt-16pt text-70 flex" :errors="$errors" />

                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('dashboard.pickups.index') }}" enctype="multipart/form-data">
            @csrf
            <div class="page-separator">
                <div class="page-separator__text" style="line-height: 30px;">
                    <button type="button" class="btn btn-sm rounded-circle btn-dark">
                        &nbsp;  1 &nbsp;
                    </button>
                    &nbsp; {{ __('dashboard.Location Information') }}
                </div>
            </div>
            <div class="card">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-lg-3 bg-light">
                            <div class="page-separator">
                                <div class="page-separator__text">{{ __('dashboard.Location Details') }}</div>
                            </div>
                            <p class="card-subtitle text-70 mb-16pt mb-lg-0">{{ __('dashboard.Basic details of the Location of the pickup') }}</p>
                        </div>
                        <div class="col-lg-9 row ">
                            <div class="page-separator col-lg-12">
                                <div class="page-separator__text" >
                                    &nbsp; {{ __('dashboard.Pickup location') }}
                                </div>
                            </div>
                            <div class="col-lg-12 invert location">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="location_id">{{ __('dashboard.Pickup Locations') }}:</label>
                                    <select id="location_id"
                                            data-toggle="select"
                                            name="location_id"
                                            class="form-control select005 form-control-sm @error('location_id') is-invalid @enderror">
                                        <option value="">{{ __('dashboard.Select location') }}</option>
                                        @foreach($locations as $location)
                                            <option value="{{ $location->id }}" {{ old('location_id') == $location->id ? 'selected':'' }}>{{ $location->name }}</option>
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
                                                    display(module='location')">+ {{ __('dashboard.Create new Location') }}</a>
                            </div>
                            <div class="col-12 hidden locations col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="name">{{ __('dashboard.Name') }}:</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text"
                                               class="form-control @error('name') is-invalid @enderror"
                                               value="{{ old('name') }}"
                                               autocomplete="name"
                                               name="name"
                                               id="name"
                                               placeholder="{{ __('dashboard.Enter your name') }} .."
                                               autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="material-icons">home_work</span>
                                            </div>
                                        </div>
                                        @error('name')
                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 hidden locations col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="country_id">{{ __('dashboard.Country') }}</label>
                                    <select id="country_id"
                                            data-toggle="select"
                                            class="form-control select05 select005 form-control-sm @error('country_id') is-invalid @enderror"
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
                                           for="state_id">{{ __('dashboard.State') }}</label>
                                    <select id="state_id"
                                            data-toggle="select"
                                            class="form-control select01 select005 form-control-sm @error('state_id') is-invalid @enderror"
                                            name="state_id">
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
                            <div class="col-12 hidden locations col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="city_id">{{ __('dashboard.City') }}</label>
                                    <select id="city_id"
                                            data-toggle="select"
                                            disabled
                                            class="form-control select03 select005 form-control-sm @error('city_id') is-invalid @enderror"
                                            name="city_id">
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
                                           for="street">{{ __('dashboard.Street') }}:</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text"
                                               class="form-control @error('street') is-invalid @enderror"
                                               value="{{ old('street') }}"
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
                            <div class="col-12 hidden locations col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="building">{{ __('dashboard.Building') }}:</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text"
                                               class="form-control @error('building') is-invalid @enderror"
                                               value="{{ old('building') }}"
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


                            <div class="col-12 hidden locations col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="floor">{{ __('dashboard.Floor') }}:</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text"
                                               class="form-control @error('floor') is-invalid @enderror"
                                               value="{{ old('floor') }}"
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
                            <div class="col-12 hidden locations col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="apartment">{{ __('dashboard.Apartment') }}:</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text"
                                               class="form-control @error('apartment') is-invalid @enderror"
                                               value="{{ old('apartment') }}"
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
                            <div class="col-12 hidden locations col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="landmarks">{{ __('dashboard.Landmarks') }}:</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text"
                                               class="form-control @error('landmarks') is-invalid @enderror"
                                               value="{{ old('landmarks') }}"
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
                            <div class="col-md-12 hidden locations  mb-3">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox"
                                               class="custom-control-input"
                                               name="working_hours"
                                               id="customCheck1"
                                            {{ old('working_hours') ?? 'checked="checked"' }}>
                                        <label class="custom-control-label"
                                               for="customCheck1">{{ __('dashboard.This is a work address') }}</label>
                                        <small class="form-text text-muted">{{ __('dashboard.Mark it to deliver it within business days and working hours') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 hidden locations">
                                <a href="#" class="text-dark" onclick="event.preventDefault();
                                                    displayInvert(module='location')">- {{ __('dashboard.Select from existed locations') }}</a>
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
                    &nbsp; {{ __('dashboard.Pickup Date') }}
                </div>
            </div>
            <div class="card">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-lg-3 bg-light">
                            <div class="page-separator">
                                <div class="page-separator__text">{{ __('dashboard.Date Details') }}</div>
                            </div>
                            <p class="card-subtitle text-70 mb-16pt mb-lg-0">{{ __('dashboard.Details of the date of the pickup') }}</p>
                        </div>
                        <div class="col-lg-9 row ">
                            <div class="page-separator col-lg-12">
                                <div class="page-separator__text" >
                                    &nbsp; {{ __('dashboard.Pickup Date') }}
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="scheduled_date">{{ __('dashboard.Pickup Date') }}:</label>
                                    <input type="hidden"
                                           class="form-control @error('scheduled_date') is-invalid @enderror flatpickr-input"
                                           value="{{ old('scheduled_date') }}"
                                           id="scheduled_date"
                                           name="scheduled_date"
                                           data-toggle="flatpickr"
                                           placeholder="{{ __('dashboard.Pickup Date') }}...">
                                    @error('scheduled_date')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-lg-12 invert date">
                                <a href="#" class="text-dark" onclick="event.preventDefault();
                                                    display(module='date')">{{ __('dashboard.Do you want to repeat the pickup?') }}</a>
                            </div>
                            <div class="col-md-12 hidden dates">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="start_date">{{ __('dashboard.Start Pickup Date') }}:</label>
                                    <input type="hidden"
                                           class="form-control @error('start_date') is-invalid @enderror flatpickr-input"
                                           value="{{ old('start_date') }}"
                                           id="start_date"
                                           name="start_date"
                                           data-toggle="flatpickr"
                                           placeholder="{{ __('dashboard.Pickup Date') }}...">
                                    @error('start_date')
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
                                                   checked="">
                                            <label for="radioStacked1"
                                                   class="custom-control-label">{{ __('dashboard.Daily') }}</label>
                                        </div>
                                        <div class="custom-control custom-radio"  onclick="handleClick2();">
                                            <input id="radioStacked2"
                                                   name="type"
                                                   type="radio"
                                                   value="Weekly"
                                                   class="custom-control-input">
                                            <label for="radioStacked2"
                                                   class="custom-control-label">{{ __('dashboard.Weekly') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 hidden multiple-select dates">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="select03">{{ __('dashboard.Multiple') }}</label>
                                    <select id="select03"
                                            data-toggle="select"
                                            name="repeat_days"
                                            multiple
                                            class="form-control ">
                                        <option value="Saturday">{{ __('dashboard.Saturday') }}</option>
                                        <option value="Sunday">{{ __('dashboard.Sunday') }}</option>
                                        <option value="Monday">{{ __('dashboard.Monday') }}</option>
                                        <option value="Tuesday">{{ __('dashboard.Tuesday') }}</option>
                                        <option value="Wednesday">{{ __('dashboard.Wednesday') }}</option>
                                        <option value="Thursday">{{ __('dashboard.Thursday') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 hidden dates">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="end_date">{{ __('dashboard.End At') }}:</label>
                                    <input type="hidden"
                                           class="form-control @error('end_date') is-invalid @enderror flatpickr-input"
                                           value="{{ old('end_date') }}"
                                           id="end_date"
                                           name="end_date"
                                           data-toggle="flatpickr"
                                           placeholder="{{ __('dashboard.Pickup End Date') }}...">
                                    @error('end_date')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-lg-12 hidden dates">
                                <a href="#" class="text-dark" onclick="event.preventDefault();
                                                    displayInvert(module='date')">- {{ __('dashboard.Stop recurring pickup') }}</a>
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
                    &nbsp; {{ __('dashboard.Contact Information') }}
                </div>
            </div>
            <div class="card ">
                <div class="row card-body mb-32pt">
                    <div class="col-lg-3 bg-light">
                        <div class="page-separator">
                            <div class="page-separator__text">{{ __('dashboard.Contact Information') }}</div>
                        </div>
                        <p class="card-subtitle text-70 mb-16pt mb-lg-0">
                            {{ __('dashboard.Add your pickup\'s contact information') }}
                        </p>
                    </div>
                    <div class="col-lg-9 row ">
                        <div class="col-lg-12 invert contact">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="contact_id">{{ __('dashboard.Contacts') }}:</label>
                                    <select id="contact_id"
                                            data-toggle="select"
                                            name="contact_id"
                                            class="form-control select005 form-control-sm @error('contact_id') is-invalid @enderror">
                                        <option value="">{{ __('dashboard.Select Contact') }}</option>
                                        @foreach($contacts as $contact)
                                            <option value="{{ $contact->id }}" {{ old('contact_id') == $contact->id ? 'selected':'' }}>{{ $contact->contact_name }}</option>
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
                                                    display(module='contact')">+ {{ __('dashboard.Create new Contact') }}</a>
                            </div>
                        <div class="col-6 col-md-6 mb-3 hidden contacts">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="contact_name">{{ __('dashboard.Contact name') }}:</label>
                                    <input type="text"
                                           class="form-control @error('contact_name') is-invalid @enderror"
                                           value="{{ old('contact_name') }}"
                                           autocomplete="contact_name"
                                           name="contact_name"
                                           id="contact_name"
                                           placeholder="{{ __('dashboard.Enter your contact name') }} .."
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
                                           for="contact_job_title">{{ __('dashboard.Job title') }}:</label>
                                    <input type="text"
                                           class="form-control @error('contact_job_title') is-invalid @enderror"
                                           value="{{ old('contact_job_title') }}"
                                           autocomplete="contact_job_title"
                                           name="contact_job_title"
                                           id="contact_job_title"
                                           placeholder="{{ __('dashboard.Enter your contact job title') }} ..">
                                    @error('contact_job_title')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                        <div class="col-6 col-md-6 mb-3 hidden contacts">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="contact_phone">{{ __('dashboard.Phone') }}:</label>
                                    <input type="tel"
                                           class="form-control @error('contact_phone') is-invalid @enderror"
                                           value="{{ old('contact_phone') }}"
                                           autocomplete="contact_phone"
                                           name="contact_phone"
                                           id="contact_phone"
                                           pattern="[0][1][1-5]{9}"
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
                                           for="contact_email">{{ __('dashboard.Email') }}:</label>
                                    <input type="email"
                                           class="form-control @error('contact_email') is-invalid @enderror"
                                           value="{{ old('contact_email') }}"
                                           autocomplete="contact_email"
                                           name="contact_email"
                                           id="contact_email"
                                           placeholder="{{ __('dashboard.Enter your email address') }} .."
                                           autofocus>
                                    @error('contact_email')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                        <div class="col-lg-12 hidden contacts">
                            <a href="#" class="text-dark" onclick="event.preventDefault();
                                                    displayInvert(module='contact')">- {{ __('dashboard.Select from existed contacts') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-separator">
                <div class="page-separator__text" style="line-height: 30px;">
                    <button type="button" class="btn btn-sm rounded-circle btn-dark">
                        &nbsp;  4 &nbsp;
                    </button>
                    &nbsp; {{ __('dashboard.Extra Information') }}
                </div>
            </div>
            <div class="card ">
                <div class="row card-body mb-32pt">
                    <div class="col-lg-3 bg-light">
                        <div class="page-separator">
                            <div class="page-separator__text">{{ __('dashboard.Extra Information') }}</div>
                        </div>
                        <p class="card-subtitle text-70 mb-16pt mb-lg-0">
                            {{ __('dashboard.Add your pickup\'s extra notes') }}
                        </p>
                    </div>
                    <div class="col-lg-9 row ">
                        <div class="col-lg-12 ">
                            <div class="form-group">
                                <label class="form-label"
                                       for="notes">{{ __('dashboard.Notes') }}:</label>
                                <textarea rows="3"
                                          id="notes"
                                          name="notes"
                                          class="form-control @error('notes') is-invalid @enderror"
                                          placeholder="{{ __('dashboard.Notes') }}...">{{ old('notes') }}</textarea>
                                @error('notes')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                @enderror
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="location_in" value="full">
            <input type="hidden" name="contact_in" value="full">
            <input type="hidden" name="date_in" value="full">
            <button type="submit"
                    class="btn pull-right btn-primary">{{ __('dashboard.Submit') }}</button>
        </form>
    </div>
@endsection

@section('extra-scripts')
    @include('components.locations_ajax')

    <script>
        $(document).ready(function() {
            $("#start_date,#scheduled_date,#end_date").flatpickr({
                minDate: "today",
            });

            $('.select005').select2();
        });
    </script>
@endsection
