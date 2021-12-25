@extends('layouts.backend')

@section('title')
{{ __('dashboard.Profile') }}
@endsection

@section('links')
    <li class="breadcrumb-item active">
        {{ __('dashboard.Profile') }}
    </li>
@endsection

@section('button-link')
    {{ route('dashboard') }}
@endsection

@section('button-icon')
    dashboard
@endsection

@section('button-title')
{{ __('dashboard.Dashboard') }}
@endsection

@section('main_content')
    <div class="page-section container page__container">
        <form method="POST" action="{{ route('dashboard.settings.profile.edit',$user->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="page-separator">
                <div class="page-separator__text">{{ __('dashboard.Basic Information') }}</div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 bg-light">
                            <div class="page-separator">
                                <div class="page-separator__text">{{ __('dashboard.Basic Details') }}</div>
                            </div>
                            <p class="card-subtitle text-70 mb-16pt mb-lg-0">{{ __('dashboard.Basic details of your profile') }}</p>
                        </div>
                        <div class="col-lg-9 row p-3">
                            <div class="col-md-5 p-0">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="first_name">{{ __('dashboard.First name') }}:</label>
                                    <input type="text"
                                           class="form-control @error('first_name') is-invalid @enderror"
                                           value="{{ $user->first_name }}"
                                           id="first_name"
                                           name="first_name"
                                           required="required"
                                           autocomplete="first_name"
                                           placeholder="{{ __('dashboard.Your first name') }} ..."
                                           autofocus>
                                    @error('first_name')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="offset-md-1 col-md-5 p-0">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="last_name">{{ __('dashboard.Last name') }}:</label>
                                    <input type="text"
                                           class="form-control @error('last_name') is-invalid @enderror"
                                           value="{{ $user->last_name }}"
                                           id="last_name"
                                           name="last_name"
                                           required="required"
                                           autocomplete="last_name"
                                           placeholder="{{ __('dashboard.Your last name') }} ..."
                                           autofocus>
                                    @error('last_name')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-md-12 p-0">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="full_name">{{ __('dashboard.Full name') }}:</label>
                                    <input type="text"
                                           class="form-control @error('full_name') is-invalid @enderror"
                                           value="{{ $user->full_name }}"
                                           id="full_name"
                                           name="full_name"
                                           required="required"
                                           autocomplete="full_name"
                                           placeholder="{{ __('dashboard.Your full name') }} ..."
                                           autofocus>
                                    @error('full_name')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-md-12 p-0">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="email">{{ __('dashboard.Email address') }}:</label>
                                    <input type="email"
                                           id="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           value="{{ $user->email }}"
                                           required="required"
                                           name="email"
                                           autocomplete="email"
                                           placeholder="{{ __('dashboard.Your email address') }} ...">
                                    @error('email')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                    <small class="form-text text-muted">{{ __('dashboard.Note that if you change your email, you will have to confirm it again') }}</small>
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
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 bg-light">
                            <div class="page-separator">
                                <div class="page-separator__text">{{ __('dashboard.Password & Security') }}</div>
                            </div>
                            <p class="card-subtitle text-70 mb-16pt mb-lg-0">{{ __('dashboard.Security details of your profile') }}</p>
                        </div>
                        <div class="col-lg-9 row p-3">
                            <div class="col-md-12 p-0">
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
                            <div class="col-md-12 p-0">
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
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 bg-light">
                            <div class="page-separator">
                                <div class="page-separator__text">{{ __('dashboard.Profile & Privacy') }}</div>
                            </div>
                            <p class="card-subtitle text-70 mb-16pt mb-lg-0">{{ __('dashboard.Upload your photo and the remaining data') }}</p>
                        </div>
                        <div class="col-lg-9 row p-3">
                            <div class="col-md-12 p-0">
                                <div class="form-group">
                                    <label class="form-label">{{ __('dashboard.Your photo') }}:</label>
                                    <div class="media align-items-center">
                                        <a href="#"
                                           class="media-left mr-16pt">
                                            <img src="{{ $user->avatar == '' ? asset('backend/images/people/110/guy-3.jpg'):asset('storage/user/'.$user->avatar) }}"
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
                            <div class="col-md-12 p-0">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="username">{{ __('dashboard.Profile name') }}:</label>
                                    <input type="text"
                                           id="username"
                                           class="form-control @error('username') is-invalid @enderror"
                                           value="{{ $user->username }}"
                                           name="username"
                                           placeholder="{{ __('dashboard.Your profile name') }} ...">
                                    @error('username')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                    {{--<small class="form-text text-muted">Your profile name will be used as part of your public profile URL address.</small>--}}
                                </div>
                            </div>
                            <div class="col-md-12 p-0">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="phone">{{ __('dashboard.Phone') }}:</label>
                                    <input type="text"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           value="{{ $user->phone }}"
                                           id="phone"
                                           name="phone"
                                           data-mask="00000000000"
                                           placeholder="{{ __('dashboard.Your mobile phone') }} ...">
                                    @error('phone')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-md-12 p-0">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="select05">{{ __('dashboard.Gender') }}:</label>
                                    <select id="select05"
                                            data-toggle="select"
                                            name="gender"
                                            class="form-control form-control-sm @error('gender') is-invalid @enderror">
                                        <option value="Male" @if($user->gender == 'Male') selected @endif>{{ __('dashboard.Male') }}</option>
                                        <option value="Female" @if($user->gender == 'Female') selected @endif>{{ __('dashboard.Female') }}</option>
                                    </select>
                                    @error('gender')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-md-12 p-0">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="date_of_birth">{{ __('dashboard.Date of Birth') }}:</label>
                                    <input type="hidden"
                                           class="form-control @error('date_of_birth') is-invalid @enderror flatpickr-input"
                                           value="{{ $user->date_of_birth }}"
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
                            <div class="col-md-12 p-0">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="bio">{{ __('dashboard.About you') }}:</label>
                                    <textarea rows="3"
                                              id="bio"
                                              name="bio"
                                              class="form-control @error('bio') is-invalid @enderror"
                                              placeholder="{{ __('dashboard.About you') }} ...">{{ $user->bio }}</textarea>
                                    @error('bio')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-md-12 p-0">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox"
                                               class="custom-control-input"
                                               name="real_name"
                                               checked
                                               id="customCheck1">
                                        <label class="custom-control-label"
                                               for="customCheck1">{{ __('dashboard.Display your real name on your profile') }}</label>
                                        <small class="form-text text-muted">{{ __('dashboard.If unchecked, your profile name will be displayed instead of your full name') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        {{--<div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox"
                                       class="custom-control-input"
                                       checked
                                       id="customCheck2">
                                <label class="custom-control-label"
                                       for="customCheck2">Allow everyone to see your profile</label>
                                <small class="form-text text-muted">If unchecked, your profile will be private and no one except you will be able to view it.</small>
                            </div>
                        </div>--}}
                </div>
            </div>
            <button type="submit"
                    class="btn btn-primary">{{ __('dashboard.Save Changes') }}</button>
        </form>
    </div>
@endsection
