@extends('layouts.backend')

@section('title')
    Profile
@endsection

@section('links')
    <li class="breadcrumb-item active">
        Profile
    </li>
@endsection

@section('main_content')
    <div class="page-section container page__container">
        <form method="POST" action="{{ route('profile.edit',$user->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="page-separator">
                <div class="page-separator__text">Basic Information</div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="col-md-6 p-0">

                        <div class="form-group">
                            <label class="form-label"
                                   for="name">Name:</label>
                            <input type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ $user->name }}"
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
                        <div class="form-group">
                            <label class="form-label"
                                   for="email">Email address:</label>
                            <input type="email"
                                   id="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ $user->email }}"
                                   required="required"
                                   name="email"
                                   autocomplete="email"
                                   placeholder="Your email address ...">
                            @error('email')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                            <div class="valid-feedback">Looks good!</div>
                            <small class="form-text text-muted">Note that if you change your email, you will have to confirm it again.</small>
                        </div>

                    </div>
                </div>

            </div>
            <div class="page-separator">
                <div class="page-separator__text">Change password</div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-6 p-0">
                        <div class="form-group">
                            <label class="form-label"
                                        for="password">New password:</label>
                            <input type="password"
                                   id="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   placeholder="Password ..."
                                   name="password"
                                   autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="form-group">
                            <label class="form-label"
                                   for="password-confirm">Confirm password:</label>
                            <input type="password"
                                   id="password-confirm"
                                   name="password_confirmation"
                                   autocomplete="new-password"
                                   class="form-control"
                                   placeholder="Confirm password ...">
                            @error('password_confirmation')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-separator">
                <div class="page-separator__text">Profile &amp; Privacy</div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="col-md-7 p-0">
                        <div class="form-group">
                            <label class="form-label">Your photo:</label>
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
                                               class="custom-file-input @error('file') is-invalid @enderror"
                                               id="avatar"
                                               name="avatar"
                                               onchange="readURL(this);"
                                        >
                                        <label class="custom-file-label"
                                               for="avatar">Choose file</label>
                                        @error('file')
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
                                   value="{{ $user->username }}"
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
                                   for="phone">Phone:</label>
                            <input type="text"
                                   class="form-control @error('phone') is-invalid @enderror"
                                   value="{{ $user->phone }}"
                                   id="phone"
                                   name="phone"
                                   data-mask="00000000000"
                                   placeholder="Your mobile phone ...">
                            @error('phone')
                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                            <div class="valid-feedback">Looks good!</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label"
                                   for="date_of_birth">Date of Birth:</label>
                            <input type="hidden"
                                   class="form-control @error('date_of_birth') is-invalid @enderror flatpickr-input"
                                   value="{{ $user->date_of_birth }}"
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
                                      placeholder="About you ...">{{ $user->bio }}</textarea>
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
            </div>
            <button type="submit"
                    class="btn btn-primary">Save Changes</button>
        </form>
    </div>
@endsection
