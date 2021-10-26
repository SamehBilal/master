@extends('layouts.backend')

@section('title')
    Customers
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('customers.index') }}">Customers</a>
    </li>
    <li class="breadcrumb-item active">
        Create
    </li>
@endsection

@section('button-link')
    {{ route('customers.index') }}
@endsection

@section('button-icon')
    format_list_bulleted
@endsection

@section('button-title')
    All Customers
@endsection

@section('main_content')
    <div class="container page__container page-section">
        <form method="POST" action="{{ route('customers.index') }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="row card-body mb-32pt">
                    <div class="col-lg-4 bg-light">
                        <div class="page-separator">
                            <div class="page-separator__text">Basic Information</div>
                        </div>
                        <p class="card-subtitle text-70 mb-16pt mb-lg-0">
                            Add your customer basic information.
                        </p>
                    </div>
                    <div class="col-lg-8 d-flex align-items-center ">
                        <div class="flex"
                             style="max-width: 100%">
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="form-group">
                                        <label class="form-label"
                                               for="first_name">First name:</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text"
                                                   class="form-control @error('first_name') is-invalid @enderror"
                                                   value="{{ old('first_name') }}"
                                                   required="required"
                                                   autocomplete="first_name"
                                                   name="first_name"
                                                   id="first_name"
                                                   placeholder="Enter your first name .."
                                                   autofocus>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="material-icons">person</span>
                                                </div>
                                            </div>
                                            @error('first_name')
                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                            @enderror
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="form-group">
                                        <label class="form-label"
                                               for="last_name">Last name:</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text"
                                                   class="form-control @error('last_name') is-invalid @enderror"
                                                   value="{{ old('last_name') }}"
                                                   required="required"
                                                   autocomplete="last_name"
                                                   name="last_name"
                                                   id="last_name"
                                                   placeholder="Enter your last name .."
                                                   autofocus>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="material-icons">person</span>
                                                </div>
                                            </div>
                                            @error('last_name')
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
                                               for="full_name">Full name:</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text"
                                                   class="form-control @error('full_name') is-invalid @enderror"
                                                   value="{{ old('full_name') }}"
                                                   required="required"
                                                   autocomplete="full_name"
                                                   name="full_name"
                                                   id="full_name"
                                                   placeholder="Enter your full name .."
                                                   autofocus>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="material-icons">person</span>
                                                </div>
                                            </div>
                                            @error('full_name')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                            @enderror
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="form-group">
                                        <label class="form-label"
                                               for="email">Email:</label>
                                        <div class="input-group input-group-merge">
                                            <input type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   value="{{ old('email') }}"
                                                   required="required"
                                                   autocomplete="email"
                                                   name="email"
                                                   id="email"
                                                   placeholder="Enter your email address .."
                                                   autofocus>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="material-icons">email</span>
                                                </div>
                                            </div>
                                            @error('email')
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
                                               for="phone">Phone:</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text"
                                                   class="form-control @error('phone') is-invalid @enderror"
                                                   value="{{ old('phone') }}"
                                                   required="required"
                                                   autocomplete="phone"
                                                   name="phone"
                                                   id="phone"
                                                   placeholder="EG phone: +(20)10 0000 0000)"
                                                   data-mask="01000000000"
                                                   autofocus>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="material-icons">phone</span>
                                                </div>
                                            </div>
                                            @error('phone')
                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                            @enderror
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="form-group">
                                        <label class="form-label"
                                               for="fax">Fax:</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text"
                                                   class="form-control @error('fax') is-invalid @enderror"
                                                   value="{{ old('fax') }}"
                                                   autocomplete="fax"
                                                   name="fax"
                                                   id="fax"
                                                   placeholder="Enter your fax .."
                                                   >
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="material-icons">description</span>
                                                </div>
                                            </div>
                                            @error('fax')
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
                                               for="select04">Category</label>
                                        <select id="select04"
                                                data-toggle="select"
                                                data-minimum-results-for-search="-1"
                                                class="form-control form-control-sm @error('user_category_id') is-invalid @enderror"
                                                name="user_category_id">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('user_category_id')
                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="form-group">
                                        <label class="form-label"
                                               for="select03">Currency</label>
                                        <select id="select03"
                                                data-toggle="select"
                                                data-minimum-results-for-search="-1"
                                                class="form-control form-control-sm @error('currency_id') is-invalid @enderror"
                                                name="currency_id">
                                            @foreach($currencies as $currency)
                                                <option value="{{ $currency->id }}" data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
                                                    {{ $currency->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('currency_id')
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
            <div class="page-separator">
                <div class="page-separator__text col-auto">
                    <a href="javascript:void(0)" onclick="doubling_address()"
                       class="btn btn-outline-secondary">
                        <i class="material-icons icon--left">add</i> New address
                    </a>
                </div>
            </div>
            <div class="card address_card">
                <div class="row card-body mb-32pt">
                <div class="col-lg-4 bg-light">
                    <div class="page-separator">
                        <div class="page-separator__text">Location Information</div>
                    </div>
                    <p class="card-subtitle text-70 mb-16pt mb-lg-0">
                        Add your customer address information.
                    </p>
                </div>
                <div class="col-lg-8 d-flex align-items-center">
                    <div class="flex"
                         style="max-width: 100%">
                        <div class="form-row">
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="select05">Country</label>
                                    <select id="select05"
                                            data-toggle="select"
                                            class="form-control form-control-sm @error('country_id') is-invalid @enderror"
                                            name="country_id[]">
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}" data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
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
                                            name="city_id[]">
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
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="page-separator">
                <div class="page-separator__text col-auto">
                    <a href="javascript:void(0)" onclick="doubling()"
                       class="btn btn-outline-secondary">
                        <i class="material-icons icon--left">add</i> New contact
                    </a>
                </div>
            </div>
            <div class="card contact_card">
                <div class="row card-body mb-32pt">
                    <div class="col-lg-4 bg-light">
                        <div class="page-separator">
                            <div class="page-separator__text">Contact Information</div>
                        </div>
                        <p class="card-subtitle text-70 mb-16pt mb-lg-0">
                            Add your customer's contact information.
                        </p>
                    </div>
                    <div class="col-lg-8 d-flex align-items-center">
                        <div class="flex"
                             style="max-width: 100%">
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="form-group">
                                        <label class="form-label"
                                               for="contact_name">Contact name:</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text"
                                                   class="form-control @error('contact_name') is-invalid @enderror"
                                                   value="{{ old('contact_name[]') }}"
                                                   autocomplete="contact_name"
                                                   name="contact_name[]"
                                                   id="contact_name"
                                                   placeholder="Enter your contact name .."
                                                   autofocus>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="material-icons">person</span>
                                                </div>
                                            </div>
                                            @error('contact_name')
                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                            @enderror
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="form-group">
                                        <label class="form-label"
                                               for="contact_job_title">Job title:</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text"
                                                   class="form-control @error('contact_job_title') is-invalid @enderror"
                                                   value="{{ old('contact_job_title[]') }}"
                                                   autocomplete="contact_job_title"
                                                   name="contact_job_title[]"
                                                   id="contact_job_title"
                                                   placeholder="Enter your contact job title .."
                                                   >
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="material-icons">person</span>
                                                </div>
                                            </div>
                                            @error('contact_job_title')
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
                                               for="contact_phone">Phone:</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text"
                                                   class="form-control @error('contact_phone') is-invalid @enderror"
                                                   value="{{ old('contact_phone[]') }}"
                                                   autocomplete="contact_phone"
                                                   name="contact_phone[]"
                                                   id="contact_phone"
                                                   placeholder="EG phone: +(20)10 0000 0000)"
                                                   data-mask="01000000000"
                                                   >
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="material-icons">phone</span>
                                                </div>
                                            </div>
                                            @error('contact_phone')
                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                            @enderror
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="form-group">
                                        <label class="form-label"
                                               for="contact_email">Email:</label>
                                        <div class="input-group input-group-merge">
                                            <input type="email"
                                                   class="form-control @error('contact_email') is-invalid @enderror"
                                                   value="{{ old('contact_email[]') }}"
                                                   autocomplete="contact_email"
                                                   name="contact_email[]"
                                                   id="contact_email"
                                                   placeholder="Enter your email address .."
                                                   autofocus>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="material-icons">email</span>
                                                </div>
                                            </div>
                                            @error('contact_email')
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
            <div class="card">
                <div class="row card-body mb-32pt">
                <div class="col-lg-4 bg-light">
                    <div class="page-separator">
                        <div class="page-separator__text">Extra Settings</div>
                    </div>
                    <p class="card-subtitle text-70 mb-16pt mb-lg-0">Replaces a standard checkbox input with a toggle button.</p>
                </div>
                    <div class="col-lg-8 d-flex align-items-center">
                        <div class="flex"
                             style="max-width: 100%">
                            <div class="form-group">
                                <label class="form-label">Your photo:</label>
                                <div class="media align-items-center">
                                    <a href="#"
                                       class="media-left mr-16pt">
                                        <img src="{{ asset('backend/images/people/110/guy-3.jpg') }}"
                                             alt="people"
                                             width="56"
                                             class="rounded-circle profilePic" />
                                    </a>
                                    <div class="media-body">
                                        <div class="custom-file">
                                            <input type="file"
                                                   class="custom-file-input @error('avatar') is-invalid @enderror"
                                                   id="avatar"
                                                   name="avatar"
                                                   onchange="readURL(this);"
                                            >
                                            <label class="custom-file-label"
                                                   for="avatar">Choose file</label>
                                            @error('avatar')
                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                            @enderror
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label"
                                       for="username">Profile name:</label>
                                <input type="text"
                                       id="username"
                                       class="form-control @error('username') is-invalid @enderror"
                                       value="{{ old('username') }}"
                                       name="username"
                                       placeholder="Your profile name ...">
                                @error('username')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                @enderror
                                <div class="valid-feedback">Looks good!</div>
                                <small class="form-text text-muted">Your profile name will be used as part of your public profile URL address.</small>
                            </div>
                            <div class="form-group">
                                <label class="form-label"
                                       for="other_phone">Other Phone:</label><small>(Optional)</small>
                                <input type="text"
                                       class="form-control @error('other_phone') is-invalid @enderror"
                                       value="{{ old('other_phone') }}"
                                       id="other_phone"
                                       name="other_phone"
                                       data-mask="00000000000"
                                       placeholder="Your other mobile phone ...">
                                @error('other_phone')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                @enderror
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="form-group">
                                <label class="form-label"
                                       for="select06">Gender:</label>
                                <select id="select06"
                                        data-toggle="select"
                                        name="gender"
                                        class="form-control form-control-sm @error('gender') is-invalid @enderror">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                @error('gender')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                @enderror
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="form-group">
                                <label class="form-label"
                                       for="date_of_birth">Date of Birth:</label>
                                <input type="hidden"
                                       class="form-control @error('date_of_birth') is-invalid @enderror flatpickr-input"
                                       value="{{ old('date_of_birth') }}"
                                       id="date_of_birth"
                                       name="date_of_birth"
                                       data-toggle="flatpickr"
                                       placeholder="Your Birth date ...">
                                @error('date_of_birth')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                @enderror
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="form-group">
                                <label class="form-label"
                                       for="bio">About you:</label>
                                <textarea rows="3"
                                          id="bio"
                                          name="bio"
                                          class="form-control @error('bio') is-invalid @enderror"
                                          placeholder="About you ...">{{ old('bio') }}</textarea>
                                @error('bio')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                @enderror
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox"
                                           class="custom-control-input"
                                           name="real_name"
                                           checked
                                           id="customCheck1">
                                    <label class="custom-control-label"
                                           for="customCheck1">Display your real name on your profile</label>
                                    <small class="form-text text-muted">If unchecked, your profile name will be displayed instead of your full name.</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label"
                                       for="status">Status:</label><br>
                                <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                    <input checked=""
                                           type="checkbox"
                                           id="status"
                                           name="status"
                                           class="custom-control-input @error('status') is-invalid @enderror">
                                    <label class="custom-control-label"
                                           for="status">Yes</label>
                                </div>
                                <label class="form-label mb-0"
                                       for="subscribe">Yes</label>
                                @error('status')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                @enderror
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit"
                        class="btn pull-right btn-primary">Submit</button>
        </form>
    </div>
@endsection

@section('extra-scripts')
    <script>
        function doubling()
        {
            let html = '<div class="card contact_card">\n' +
                '                <div class="row card-body mb-32pt">\n' +
                '                    <div class="col-lg-4 bg-light">\n' +
                '                        <div class="page-separator">\n' +
                '                            <div class="page-separator__text">Contact Information</div>\n' +
                '                        </div>\n' +
                '                        <p class="card-subtitle text-70 mb-16pt mb-lg-0">\n' +
                '                            Add your customer\'s contact information.\n' +
                '                        </p>\n' +
                '                    </div>\n' +
                '                    <div class="col-lg-8 d-flex align-items-center">\n' +
                '                        <div class="flex"\n' +
                '                             style="max-width: 100%">\n' +
                '                            <div class="form-row">\n' +
                '                                <div class="col-12 col-md-6 mb-3">\n' +
                '                                    <div class="form-group">\n' +
                '                                        <label class="form-label"\n' +
                '                                               for="contact_name">Contact name:</label>\n' +
                '                                        <div class="input-group input-group-merge">\n' +
                '                                            <input type="text"\n' +
                '                                                   class="form-control @error('contact_name') is-invalid @enderror"\n' +
                '                                                   value="{{ old('contact_name') }}"\n' +
                '                                                   autocomplete="contact_name"\n' +
                '                                                   name="contact_name[]"\n' +
                '                                                   id="contact_name"\n' +
                '                                                   placeholder="Enter your contact name .."\n' +
                '                                                   autofocus>\n' +
                '                                            <div class="input-group-append">\n' +
                '                                                <div class="input-group-text">\n' +
                '                                                    <span class="material-icons">person</span>\n' +
                '                                                </div>\n' +
                '                                            </div>\n' +
                '                                            @error('contact_name')\n' +
                '                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>\n' +
                '                                            @enderror\n' +
                '                                            <div class="valid-feedback">Looks good!</div>\n' +
                '                                        </div>\n' +
                '                                    </div>\n' +
                '                                </div>\n' +
                '                                <div class="col-12 col-md-6 mb-3">\n' +
                '                                    <div class="form-group">\n' +
                '                                        <label class="form-label"\n' +
                '                                               for="contact_job_title">Job title:</label>\n' +
                '                                        <div class="input-group input-group-merge">\n' +
                '                                            <input type="text"\n' +
                '                                                   class="form-control @error('contact_job_title') is-invalid @enderror"\n' +
                '                                                   value="{{ old('contact_job_title') }}"\n' +
                '                                                   autocomplete="contact_job_title"\n' +
                '                                                   name="contact_job_title[]"\n' +
                '                                                   id="contact_job_title"\n' +
                '                                                   placeholder="Enter your contact job title .."\n' +
                '                                                   >\n' +
                '                                            <div class="input-group-append">\n' +
                '                                                <div class="input-group-text">\n' +
                '                                                    <span class="material-icons">person</span>\n' +
                '                                                </div>\n' +
                '                                            </div>\n' +
                '                                            @error('contact_job_title')\n' +
                '                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>\n' +
                '                                            @enderror\n' +
                '                                            <div class="valid-feedback">Looks good!</div>\n' +
                '                                        </div>\n' +
                '                                    </div>\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                            <div class="form-row">\n' +
                '                                <div class="col-12 col-md-6 mb-3">\n' +
                '                                    <div class="form-group">\n' +
                '                                        <label class="form-label"\n' +
                '                                               for="contact_phone">Phone:</label>\n' +
                '                                        <div class="input-group input-group-merge">\n' +
                '                                            <input type="text"\n' +
                '                                                   class="form-control @error('contact_phone') is-invalid @enderror"\n' +
                '                                                   value="{{ old('contact_phone') }}"\n' +
                '                                                   autocomplete="contact_phone"\n' +
                '                                                   name="contact_phone[]"\n' +
                '                                                   id="contact_phone"\n' +
                '                                                   placeholder="EG phone: +(20)10 0000 0000)"\n' +
                '                                                   data-mask="01000000000"\n' +
                '                                                   >\n' +
                '                                            <div class="input-group-append">\n' +
                '                                                <div class="input-group-text">\n' +
                '                                                    <span class="material-icons">phone</span>\n' +
                '                                                </div>\n' +
                '                                            </div>\n' +
                '                                            @error('contact_phone')\n' +
                '                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>\n' +
                '                                            @enderror\n' +
                '                                            <div class="valid-feedback">Looks good!</div>\n' +
                '                                        </div>\n' +
                '                                    </div>\n' +
                '                                </div>\n' +
                '                                <div class="col-12 col-md-6 mb-3">\n' +
                '                                    <div class="form-group">\n' +
                '                                        <label class="form-label"\n' +
                '                                               for="contact_email">Email:</label>\n' +
                '                                        <div class="input-group input-group-merge">\n' +
                '                                            <input type="email"\n' +
                '                                                   class="form-control @error('contact_email') is-invalid @enderror"\n' +
                '                                                   value="{{ old('contact_email') }}"\n' +
                '                                                   autocomplete="contact_email"\n' +
                '                                                   name="contact_email[]"\n' +
                '                                                   id="contact_email"\n' +
                '                                                   placeholder="Enter your email address .."\n' +
                '                                                   autofocus>\n' +
                '                                            <div class="input-group-append">\n' +
                '                                                <div class="input-group-text">\n' +
                '                                                    <span class="material-icons">email</span>\n' +
                '                                                </div>\n' +
                '                                            </div>\n' +
                '                                            @error('contact_email')\n' +
                '                                            <div class="invalid-feedback" role="alert">{{ $message }}</div>\n' +
                '                                            @enderror\n' +
                '                                            <div class="valid-feedback">Looks good!</div>\n' +
                '                                        </div>\n' +
                '                                    </div>\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                    </div>\n' +
                '                </div>\n' +
                '            </div>'
            $(html).insertAfter('.contact_card');
        }
        function doubling_address()
        {
            let html = '<div class="card address_card">\n' +
                '                <div class="row card-body mb-32pt">\n' +
                '                <div class="col-lg-4 bg-light">\n' +
                '                    <div class="page-separator">\n' +
                '                        <div class="page-separator__text">Location Information</div>\n' +
                '                    </div>\n' +
                '                    <p class="card-subtitle text-70 mb-16pt mb-lg-0">\n' +
                '                        Add your customer address information.\n' +
                '                    </p>\n' +
                '                </div>\n' +
                '                <div class="col-lg-8 d-flex align-items-center">\n' +
                '                    <div class="flex"\n' +
                '                         style="max-width: 100%">\n' +
                '                        <div class="form-row">\n' +
                '                            <div class="col-12 col-md-6 mb-3">\n' +
                '                                <div class="form-group">\n' +
                '                                    <label class="form-label"\n' +
                '                                           for="select06">Country</label>\n' +
                '                                    <select id="select06"\n' +
                '                                            data-toggle="select"\n' +
                '                                            data-minimum-results-for-search="-1"\n' +
                '                                            class="form-control form-control-sm @error('country_id') is-invalid @enderror"\n' +
                '                                            name="country_id[]">\n' +
                '                                        @foreach($countries as $country)\n' +
                '                                            <option value="{{ $country->id }}" data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">\n' +
                '                                                {{ $country->country_name }}\n' +
                '                                            </option>\n' +
                '                                        @endforeach\n' +
                '                                    </select>\n' +
                '                                    @error('country_id')\n' +
                '                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>\n' +
                '                                    @enderror\n' +
                '                                    <div class="valid-feedback">Looks good!</div>\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                            <div class="col-12 col-md-6 mb-3">\n' +
                '                                <div class="form-group">\n' +
                '                                    <label class="form-label"\n' +
                '                                           for="select01">City</label>\n' +
                '                                    <select id="select01"\n' +
                '                                            data-toggle="select"\n' +
                '                                            data-minimum-results-for-search="-1"\n' +
                '                                            class="form-control form-control-sm @error('city_id') is-invalid @enderror"\n' +
                '                                            name="city_id[]">\n' +
                '                                        @foreach($cities as $city)\n' +
                '                                            <option value="{{ $city->id }}" data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">\n' +
                '                                                {{ $city->name }}\n' +
                '                                            </option>\n' +
                '                                        @endforeach\n' +
                '                                    </select>\n' +
                '                                    @error('city_id')\n' +
                '                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>\n' +
                '                                    @enderror\n' +
                '                                    <div class="valid-feedback">Looks good!</div>\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                        <div class="form-row">\n' +
                '                            <div class="col-12 col-md-6 mb-3">\n' +
                '                                <div class="form-group">\n' +
                '                                    <label class="form-label"\n' +
                '                                           for="street">Street:</label>\n' +
                '                                    <div class="input-group input-group-merge">\n' +
                '                                        <input type="text"\n' +
                '                                               class="form-control @error('street') is-invalid @enderror"\n' +
                '                                               value="{{ old('street') }}"\n' +
                '                                               autocomplete="street"\n' +
                '                                               name="street[]"\n' +
                '                                               id="street"\n' +
                '                                               placeholder="Enter your street .."\n' +
                '                                               autofocus>\n' +
                '                                        <div class="input-group-append">\n' +
                '                                            <div class="input-group-text">\n' +
                '                                                <span class="material-icons">home_work</span>\n' +
                '                                            </div>\n' +
                '                                        </div>\n' +
                '                                        @error('street')\n' +
                '                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>\n' +
                '                                        @enderror\n' +
                '                                        <div class="valid-feedback">Looks good!</div>\n' +
                '                                    </div>\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                            <div class="col-12 col-md-6 mb-3">\n' +
                '                                <div class="form-group">\n' +
                '                                    <label class="form-label"\n' +
                '                                           for="building">Building:</label>\n' +
                '                                    <div class="input-group input-group-merge">\n' +
                '                                        <input type="text"\n' +
                '                                               class="form-control @error('building') is-invalid @enderror"\n' +
                '                                               value="{{ old('building') }}"\n' +
                '                                               autocomplete="building"\n' +
                '                                               name="building[]"\n' +
                '                                               id="building"\n' +
                '                                               placeholder="Enter your building .."\n' +
                '                                               autofocus>\n' +
                '                                        <div class="input-group-append">\n' +
                '                                            <div class="input-group-text">\n' +
                '                                                <span class="material-icons">home</span>\n' +
                '                                            </div>\n' +
                '                                        </div>\n' +
                '                                        @error('building')\n' +
                '                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>\n' +
                '                                        @enderror\n' +
                '                                        <div class="valid-feedback">Looks good!</div>\n' +
                '                                    </div>\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                        <div class="form-row">\n' +
                '                            <div class="col-12 col-md-6 mb-3">\n' +
                '                                <div class="form-group">\n' +
                '                                    <label class="form-label"\n' +
                '                                           for="floor">Floor:</label>\n' +
                '                                    <div class="input-group input-group-merge">\n' +
                '                                        <input type="text"\n' +
                '                                               class="form-control @error('floor') is-invalid @enderror"\n' +
                '                                               value="{{ old('floor') }}"\n' +
                '                                               autocomplete="floor"\n' +
                '                                               name="floor[]"\n' +
                '                                               id="floor"\n' +
                '                                               placeholder="Enter your floor .."\n' +
                '                                               autofocus>\n' +
                '                                        <div class="input-group-append">\n' +
                '                                            <div class="input-group-text">\n' +
                '                                                <span class="material-icons">local_convenience_store</span>\n' +
                '                                            </div>\n' +
                '                                        </div>\n' +
                '                                        @error('floor')\n' +
                '                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>\n' +
                '                                        @enderror\n' +
                '                                        <div class="valid-feedback">Looks good!</div>\n' +
                '                                    </div>\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                            <div class="col-12 col-md-6 mb-3">\n' +
                '                                <div class="form-group">\n' +
                '                                    <label class="form-label"\n' +
                '                                           for="apartment">Apartment:</label>\n' +
                '                                    <div class="input-group input-group-merge">\n' +
                '                                        <input type="text"\n' +
                '                                               class="form-control @error('apartment') is-invalid @enderror"\n' +
                '                                               value="{{ old('apartment') }}"\n' +
                '                                               autocomplete="apartment"\n' +
                '                                               name="apartment[]"\n' +
                '                                               id="apartment"\n' +
                '                                               placeholder="Enter your apartment .."\n' +
                '                                               autofocus>\n' +
                '                                        <div class="input-group-append">\n' +
                '                                            <div class="input-group-text">\n' +
                '                                                <span class="material-icons">apartment</span>\n' +
                '                                            </div>\n' +
                '                                        </div>\n' +
                '                                        @error('apartment')\n' +
                '                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>\n' +
                '                                        @enderror\n' +
                '                                        <div class="valid-feedback">Looks good!</div>\n' +
                '                                    </div>\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                    </div>\n' +
                '                </div>\n' +
                '                </div>\n' +
                '            </div>'
            $(html).insertAfter('.address_card');
        }
        function removeSpaces(string) {
            string = string.split(' ').join('');
            /*var value = string;
            $(this).val(value);*/
            //onkeyup="removeSpaces(this.value);"
        }

        $('#first_name, #last_name').keyup(function(){
            /*var id	= '{{--{{$newid}}--}}';
            var value = $('#firstname').val()+'.'+$('#middlename').val()+'.'+ id +'@meis-eg.com';
            var val = value.split(' ').join('');*/
            var full_name = $('#first_name').val()+' '+$('#last_name').val();
            //$('#email').val(val);
            $('#full_name').val(full_name);
        })

    </script>
@endsection
