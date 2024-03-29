@extends('layouts.backend')

@section('title')
    {{ __('dashboard.clients') }}
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('dashboard.clients.index') }}">{{ __('dashboard.clients') }}</a>
    </li>
    <li class="breadcrumb-item ">
        <a href="{{ route('dashboard.clients.show',$client->id) }}">{{ $client->full_name }}</a>
    </li>
    <li class="breadcrumb-item active">
        {{ __('dashboard.create') }}
    </li>
@endsection

@section('button-link')
    {{ route('dashboard.clients.index') }}
@endsection

@section('button-icon')
    format_list_bulleted
@endsection

@section('button-title')
    {{ __('dashboard.clients') }}
@endsection

@section('main_content')
    <div class="container page__container page-section">
        <form method="POST" action="{{ route('dashboard.clients.update',$client->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="row card-body mb-32pt">
                    <div class="col-lg-4 bg-light">
                        <div class="page-separator">
                            <div class="page-separator__text">{{ __('dashboard.Basic Information') }}</div>
                        </div>
                        <p class="card-subtitle text-70 mb-16pt mb-lg-0">
                            {{ __('dashboard.Add your client basic information') }}
                        </p>
                    </div>
                    <div class="col-lg-8 d-flex align-items-center ">
                        <div class="flex"
                             style="max-width: 100%">
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="form-group">
                                        <label class="form-label"
                                               for="first_name">{{ __('dashboard.First name') }}:</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text"
                                                   class="form-control @error('first_name') is-invalid @enderror"
                                                   value="{{ old('first_name') ? old('first_name'):$client->first_name }}"
                                                   required="required"
                                                   autocomplete="first_name"
                                                   name="first_name"
                                                   id="first_name"
                                                   placeholder="{{ __('dashboard.Enter your first name') }} .."
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
                                               for="last_name">{{ __('dashboard.Last name') }}:</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text"
                                                   class="form-control @error('last_name') is-invalid @enderror"
                                                   value="{{ old('last_name') ? old('last_name'):$client->last_name }}"
                                                   required="required"
                                                   autocomplete="last_name"
                                                   name="last_name"
                                                   id="last_name"
                                                   placeholder="{{ __('dashboard.Enter your last name') }} .."
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
                                               for="full_name">{{ __('dashboard.Full name') }}:</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text"
                                                   class="form-control @error('full_name') is-invalid @enderror"
                                                   value="{{ old('full_name') ? old('full_name'):$client->full_name }}"
                                                   required="required"
                                                   autocomplete="full_name"
                                                   name="full_name"
                                                   id="full_name"
                                                   placeholder="{{ __('dashboard.Enter your full name') }} .."
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
                                               for="email">{{ __('dashboard.Email') }}:</label>
                                        <div class="input-group input-group-merge">
                                            <input type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   value="{{ old('email') ? old('email'):$client->email }}"
                                                   required="required"
                                                   autocomplete="email"
                                                   name="email"
                                                   id="email"
                                                   placeholder="{{ __('dashboard.Enter your email address') }} .."
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
                                               for="phone">{{ __('dashboard.Phone') }}:</label>
                                        <div class="input-group input-group-merge">
                                            <input type="tel"
                                                   class="form-control @error('phone') is-invalid @enderror"
                                                   value="{{ old('phone') ? old('phone'):$client->phone }}"
                                                   required="required"
                                                   autocomplete="phone"
                                                   name="phone"
                                                   id="phone"
                                                   {{-- pattern="[0][1][1-5]{9}" --}}
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
                                               for="select04">{{ __('dashboard.Category') }}:</label>
                                        <select id="select04"
                                                data-toggle="select"
                                                data-minimum-results-for-search="-1"
                                                class="form-control form-control-sm @error('user_category_id') is-invalid @enderror"
                                                name="user_category_id">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" @if(old('user_category_id') ==  $category->id)  selected @else {{  $client->user_category_id == $category->id  ? 'selected':'' }} @endif data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($client->location)
                <h4>{{ __('dashboard.client Locations\'') }}</h4>
            @endif
            @foreach($client->location as $location)
                <div class="page-separator">
                    <div class="page-separator__text col-auto">
                        <a href="{{ route('dashboard.locations.edit',$location->id) }}"
                           class="btn btn-outline-secondary">
                            <i class="material-icons icon--left">edit</i> {{ $location->name }}
                        </a>
                    </div>
                </div>
            @endforeach
            <div class="card address_card">
                <div class="row card-body mb-32pt">
                    <div class="col-lg-4 bg-light">
                        <div class="page-separator">
                            <div class="page-separator__text">{{ __('dashboard.Location Information') }}</div>
                        </div>
                        <p class="card-subtitle text-70 mb-16pt mb-lg-0">
                            {{ __('dashboard.Add your client address information') }}
                        </p>
                    </div>
                    <div class="col-lg-8 d-flex align-items-center">
                        <div class="flex"
                             style="max-width: 100%">
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="form-group">
                                        <label class="form-label"
                                               for="location_name">{{ __('dashboard.Name') }}:</label>
                                        <input type="text"
                                               class="form-control @error('name') is-invalid @enderror"
                                               value="{{ old('location_name') }}"
                                               id="location_name"
                                               name="location_name"
                                               autocomplete="location_name"
                                               placeholder="{{ __('dashboard.Name') }} ..."
                                               autofocus>
                                        @error('location_name')
                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                                <div class="col-12  col-md-6 mb-3">
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
                                <div class="col-12  col-md-6 mb-3">
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
                                <div class="col-12 col-md-6 mb-3">
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
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
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
                                            @error('name')
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
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
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
                                <div class="col-12 col-md-6 mb-3">
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
                                <div class="col-12 col-md-12 mb-3">
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

            <div class="card">
                <div class="row card-body mb-32pt">
                    <div class="col-lg-4 bg-light">
                        <div class="page-separator">
                            <div class="page-separator__text">{{ __('dashboard.Extra Settings') }}</div>
                        </div>
                        <p class="card-subtitle text-70 mb-16pt mb-lg-0">{{ __('dashboard.Replaces a standard checkbox input with a toggle button') }}</p>
                    </div>
                    <div class="col-lg-8 d-flex align-items-center">
                        <div class="flex"
                             style="max-width: 100%">
                            <div class="form-group">
                                <label class="form-label">{{ __('dashboard.Your photo') }}:</label>
                                <div class="media align-items-center">
                                    <a href="#"
                                       class="media-left mr-16pt">
                                        <img src="{{ $client->avatar == '' ? asset('backend/images/people/110/guy-3.jpg'):asset('storage/user/'.$client->avatar)  }}"
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
                                                   for="avatar">{{ __('dashboard.Choose file') }}</label>
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
                                       for="other_phone">{{ __('dashboard.Other Phone') }}:</label><small>({{ __('dashboard.optional') }})</small>
                                <input type="tel"
                                       class="form-control @error('other_phone') is-invalid @enderror"
                                       value="{{ old('other_phone') ? old('other_phone'):$client->other_phone }}"
                                       id="other_phone"
                                       name="other_phone"
                                       {{-- pattern="[0][1][1-5]{9}" --}}
                                       data-mask="00000000000"
                                       placeholder="{{ __('dashboard.Your other mobile phone') }} ...">
                                @error('other_phone')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                @enderror
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="form-group">
                                <label class="form-label"
                                       for="bio">{{ __('dashboard.About you') }}:</label>
                                <textarea rows="3"
                                          id="bio"
                                          name="bio"
                                          class="form-control @error('bio') is-invalid @enderror"
                                          placeholder="{{ __('dashboard.About you') }} ...">{{ old('bio') ? old('bio'):$client->bio }}</textarea>
                                @error('bio')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                @enderror
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="form-group">
                                <label class="form-label"
                                       for="status">{{ __('dashboard.Status') }}:</label><br>
                                <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                    <input @if(is_array(old('status')) && in_array('on', old('status'))) checked @else {{ $client->status == 'active' ?'checked':'' }} @endif
                                           type="checkbox"
                                           id="status"
                                           name="status"
                                           class="custom-control-input @error('status') is-invalid @enderror">
                                    <label class="custom-control-label"
                                           for="status">{{ __('dashboard.Yes') }}</label>
                                </div>
                                <label class="form-label mb-0"
                                       for="subscribe">{{ __('dashboard.Yes') }}</label>
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
                    class="btn pull-right btn-primary">{{ __('dashboard.Submit') }}</button>
        </form>
    </div>
@endsection

@section('extra-scripts')
    @include('components.locations_ajax')

    <script>

        function doubling_address()
        {
            let html = '<div class="card address_card">\n' +
                '                <div class="row card-body mb-32pt">\n' +
                '                <div class="col-lg-4 bg-light">\n' +
                '                    <div class="page-separator">\n' +
                '                        <div class="page-separator__text">{{ __("dashboard.Location Information") }}</div>\n' +
                '                    </div>\n' +
                '                    <p class="card-subtitle text-70 mb-16pt mb-lg-0">\n' +
                '                        {{ __("dashboard.Add your client address information") }}\n' +
                '                    </p>\n' +
                '                </div>\n' +
                '                <div class="col-lg-8 d-flex align-items-center">\n' +
                '                    <div class="flex"\n' +
                '                         style="max-width: 100%">\n' +
                '                        <div class="form-row">\n' +
                '                            <div class="col-12 col-md-6 mb-3">\n' +
                '                                <div class="form-group">\n' +
                '                                    <label class="form-label"\n' +
                '                                           for="select06">{{ __("dashboard.Country") }}</label>\n' +
                '                                    <select id="select06"\n' +
                '                                            data-toggle="select"\n' +
                '                                            data-minimum-results-for-search="-1"\n' +
                '                                            class="form-control form-control-sm @error('country_id') is-invalid @enderror"\n' +
                '                                            name="country_id">\n' +
                '                                        @foreach($countries as $country)\n' +
                '                                            <option value="{{ $country->id }}" {{ $country->id == 64 ? 'selected':'' }} data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">\n' +
                '                                                {{ $country->name }}\n' +
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
                '                                           for="select01">{{ __("dashboard.State") }}</label>\n' +
                '                                    <select id="select01"\n' +
                '                                            data-toggle="select"\n' +
                '                                            data-minimum-results-for-search="-1"\n' +
                '                                            class="form-control select03 form-control-sm @error('state_id') is-invalid @enderror"\n' +
                '                                            name="state_id">\n' +
                '                                        @foreach($states as $state)\n' +
                '                                            <option value="{{ $state->id }}" data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">\n' +
                '                                                {{ $state->name }}\n' +
                '                                            </option>\n' +
                '                                        @endforeach\n' +
                '                                    </select>\n' +
                '                                    @error('state_id')\n' +
                '                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>\n' +
                '                                    @enderror\n' +
                '                                    <div class="valid-feedback">Looks good!</div>\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                            <div class="col-12 col-md-6 mb-3">\n' +
                '                                <div class="form-group">\n' +
                '                                    <label class="form-label"\n' +
                '                                           for="select01">{{ __("dashboard.City") }}</label>\n' +
                '                                    <select id="select01"\n' +
                '                                            data-toggle="select"\n' +
                '                                            data-minimum-results-for-search="-1"\n' +
                '                                            class="form-control form-control-sm @error('city_id') is-invalid @enderror"\n' +
                '                                            name="city_id">\n' +
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
                '                                           for="street">{{ __("dashboard.Street") }}:</label>\n' +
                '                                    <div class="input-group input-group-merge">\n' +
                '                                        <input type="text"\n' +
                '                                               class="form-control @error('street') is-invalid @enderror"\n' +
                '                                               value="{{ old('street') }}"\n' +
                '                                               autocomplete="street"\n' +
                '                                               name="street"\n' +
                '                                               id="street"\n' +
                '                                               placeholder="{{ __("dashboard.Enter your street") }} .."\n' +
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
                '                                           for="building">{{ __("dashboard.Building") }}:</label>\n' +
                '                                    <div class="input-group input-group-merge">\n' +
                '                                        <input type="text"\n' +
                '                                               class="form-control @error('building') is-invalid @enderror"\n' +
                '                                               value="{{ old('building') }}"\n' +
                '                                               autocomplete="building"\n' +
                '                                               name="building"\n' +
                '                                               id="building"\n' +
                '                                               placeholder="{{ __("dashboard.Enter your building") }} .."\n' +
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
                '                                           for="floor">{{ __("dashboard.Floor") }}:</label>\n' +
                '                                    <div class="input-group input-group-merge">\n' +
                '                                        <input type="text"\n' +
                '                                               class="form-control @error('floor') is-invalid @enderror"\n' +
                '                                               value="{{ old('floor') }}"\n' +
                '                                               autocomplete="floor"\n' +
                '                                               name="floor"\n' +
                '                                               id="floor"\n' +
                '                                               placeholder="{{ __("dashboard.Enter your floor") }} .."\n' +
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
                '                                           for="apartment">{{ __("dashboard.Apartment") }}:</label>\n' +
                '                                    <div class="input-group input-group-merge">\n' +
                '                                        <input type="text"\n' +
                '                                               class="form-control @error('apartment') is-invalid @enderror"\n' +
                '                                               value="{{ old('apartment') }}"\n' +
                '                                               autocomplete="apartment"\n' +
                '                                               name="apartment"\n' +
                '                                               id="apartment"\n' +
                '                                               placeholder="{{ __("dashboard.Enter your apartment") }} .."\n' +
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

        $('.select005').select2();
    </script>
@endsection
