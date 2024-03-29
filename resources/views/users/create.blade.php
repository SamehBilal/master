@extends('layouts.backend')

@section('title')
    {{ __('dashboard.New user') }}
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('dashboard.users.index') }}">{{ __('dashboard.Users') }}</a>
    </li>
    <li class="breadcrumb-item active">
        {{ __('dashboard.create') }}
    </li>
@endsection

@section('button-link')
    {{ route('dashboard.users.index') }}
@endsection

@section('button-icon')
    format_list_bulleted
@endsection

@section('button-title')
    {{ __('dashboard.All_Users') }}
@endsection

@section('main_content')
    <div class="container page__container page-section">
        <div class="page-separator">
            <div class="page-separator__text" >
                {{ __('dashboard.Users Information') }}
            </div>
        </div>
        <form method="POST" action="{{ route('dashboard.users.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-lg-3 bg-light">
                            <div class="page-separator">
                                <div class="page-separator__text">{{ __('dashboard.Basic Details') }}</div>
                            </div>
                            <p class="card-subtitle text-70 mb-16pt mb-lg-0">{{ __('dashboard.Basic details of the user information listed.') }}</p>
                        </div>
                        <div class="col-lg-9 row p-2">
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="first_name">{{ __('dashboard.First name') }}:</label>
                                    <input type="text"
                                           class="form-control @error('first_name') is-invalid @enderror"
                                           value="{{ old('first_name') }}"
                                           id="first_name"
                                           name="first_name"
                                           required="required"
                                           autocomplete="first_name"
                                           placeholder="{{ __('dashboard.First name') }} ..."
                                           autofocus>
                                    @error('first_name')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="last_name">{{ __('dashboard.Last name') }}:</label>
                                    <input type="text"
                                           class="form-control @error('last_name') is-invalid @enderror"
                                           value="{{ old('last_name') }}"
                                           id="last_name"
                                           name="last_name"
                                           required="required"
                                           autocomplete="last_name"
                                           placeholder="{{ __('dashboard.Last name') }} ..."
                                           autofocus>
                                    @error('last_name')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="full_name">{{ __('dashboard.Full name') }}:</label>
                                    <input type="text"
                                           class="form-control @error('full_name') is-invalid @enderror"
                                           value="{{ old('full_name') }}"
                                           id="full_name"
                                           name="full_name"
                                           required="required"
                                           autocomplete="full_name"
                                           placeholder="{{ __('dashboard.Full name') }} ..."
                                           autofocus>
                                    @error('full_name')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="email">{{ __('dashboard.Email address') }}:</label>
                                    <input type="email"
                                           id="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email') }}"
                                           required="required"
                                           name="email"
                                           autocomplete="email"
                                           placeholder="{{ __('dashboard.Your email address') }} ...">
                                    @error('email')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="other_email">{{ __('dashboard.Other Email address') }}:</label>
                                    <input type="email"
                                           id="other_email"
                                           class="form-control @error('other_email') is-invalid @enderror"
                                           value="{{ old('other_email') }}"
                                           name="other_email"
                                           autocomplete="other_email"
                                           placeholder="{{ __('dashboard.Your other email address') }} ...">
                                    @error('other_email')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="select04">{{ __('dashboard.Status') }}</label>
                                    <select id="select04"
                                            data-toggle="select"
                                            data-minimum-results-for-search="-1"
                                            class="form-control form-control-sm @error('status') is-invalid @enderror"
                                            name="status">
                                        <option value="1" {{ old('status') == '1' ? 'selected':'' }} >
                                            {{ __('dashboard.active') }}
                                        <option value="0" {{ old('status') == '0' ? 'selected':'' }} >
                                            {{ __('dashboard.inactive') }}
                                        </option>
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
            </div>
            <div class="page-separator">
                <div class="page-separator__text">{{ __('dashboard.Change password') }}</div>
            </div>
            <div class="card">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-lg-3 bg-light">
                            <div class="page-separator">
                                <div class="page-separator__text">{{ __('dashboard.Password & Security') }}</div>
                            </div>
                            <p class="card-subtitle text-70 mb-16pt mb-lg-0">{{ __('dashboard.Security details of user.') }}</p>
                        </div>
                        <div class="col-lg-9 row p-2">
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="password">{{ __('dashboard.New password') }}:</label>
                                    <input type="password"
                                           id="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           placeholder="{{ __('dashboard.Password') }} ..."
                                           name="password"
                                           autocomplete="new-password">
                                    @error('password')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="password-confirm">{{ __('dashboard.Confirm password') }}:</label>
                                    <input type="password"
                                           id="password-confirm"
                                           name="password_confirmation"
                                           autocomplete="new-password"
                                           class="form-control"
                                           placeholder="{{ __('dashboard.Confirm password') }} ...">
                                    @error('password_confirmation')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-separator">
                <div class="page-separator__text">{{ __('dashboard.Profile & Privacy') }}</div>
            </div>
            <div class="card">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-lg-3 bg-light">
                            <div class="page-separator">
                                <div class="page-separator__text">{{ __('dashboard.Profile & Privacy') }}</div>
                            </div>
                            <p class="card-subtitle text-70 mb-16pt mb-lg-0">{{ __('dashboard.Upload your photo and the remaining data') }}</p>
                        </div>
                        <div class="col-lg-9 row p-2">
                            <div class="col-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label">{{ __('dashboard.Your photo') }}:</label>
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
                                                       for="avatar">{{ __('dashboard.Choose file') }}</label>
                                                @error('avatar')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                @enderror
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="username">{{ __('dashboard.Profile name') }}:</label>
                                    <input type="text"
                                           id="username"
                                           class="form-control @error('username') is-invalid @enderror"
                                           value="{{ old('username') }}"
                                           name="username"
                                           placeholder="{{ __('dashboard.Your profile name') }} ...">
                                    @error('username')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                    {{--<small class="form-text text-muted">{{ __('dashboard.Your profile name will be used as part of your public profile URL address.') }}</small>--}}
                                </div>
                            </div>
                            <div class="col-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="phone">{{ __('dashboard.Phone') }}:</label>
                                    <input type="tel"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           value="{{ old('phone') }}"
                                           id="phone"
                                           name="phone"
                                           pattern="[0][1][1-5]{9}"
                                           data-mask="00000000000"
                                           placeholder="{{ __('dashboard.Your mobile phone') }} ...">
                                    @error('phone')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="other_phone">{{ __('dashboard.Other Phone') }}:</label>
                                    <input type="tel"
                                           class="form-control @error('other_phone') is-invalid @enderror"
                                           value="{{ old('other_phone') }}"
                                           id="other_phone"
                                           name="other_phone"
                                           pattern="[0][1][1-5]{9}"
                                           data-mask="00000000000"
                                           placeholder="{{ __('dashboard.Your other mobile phone') }} ...">
                                    @error('other_phone')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="select05">{{ __('dashboard.Gender') }}:</label>
                                    <select id="select05"
                                            data-toggle="select"
                                            name="gender"
                                            class="form-control form-control-sm @error('gender') is-invalid @enderror">
                                        <option value="Male" {{ old('gender') == 'Male' ? 'selected':'' }}>{{ __('dashboard.Male') }}</option>
                                        <option value="Female" {{ old('gender') == 'Female' ? 'selected':'' }}>{{ __('dashboard.Female') }}</option>
                                    </select>
                                    @error('gender')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="date_of_birth">{{ __('dashboard.Date of Birth') }}:</label>
                                    <input type="hidden"
                                           class="form-control @error('date_of_birth') is-invalid @enderror flatpickr-input"
                                           value="{{ old('date_of_birth') }}"
                                           id="date_of_birth"
                                           name="date_of_birth"
                                           data-toggle="flatpickr"
                                           placeholder="{{ __('dashboard.Your Birth date') }} ...">
                                    @error('date_of_birth')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="bio">{{ __('dashboard.About you') }}:</label> <small class="badge badge-secondary">{{ __('dashboard.optional') }}</small>
                                    <textarea rows="3"
                                              id="bio"
                                              name="bio"
                                              class="form-control @error('bio') is-invalid @enderror"
                                              placeholder="{{ __('dashboard.About you') }} ...">{{ old('bio') }}</textarea>
                                    @error('bio')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-separator">
                <div class="page-separator__text">{{ __('dashboard.Roles') }}</div>
            </div>
            <div class="card">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-lg-3 bg-light">
                            <div class="page-separator">
                                <div class="page-separator__text">{{ __('dashboard.Roles') }}</div>
                            </div>
                            <p class="card-subtitle text-70 mb-16pt mb-lg-0">{{ __('dashboard.Edit the role of this user to manage what he can do in the app.') }}</p>
                        </div>
                        <div class="col-lg-9 row p-2">
                            <div class="col-12 col-md-12 mb-12">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="select04">{{ __('dashboard.Roles') }}</label>
                                    <select id="select04"
                                            data-toggle="select"
                                            class="form-control form-control-sm @error('role') is-invalid @enderror"
                                            name="role">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->name }}"  {{ old('role') == $role->name ? 'selected':'' }} >
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
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
