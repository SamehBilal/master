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
        <div class="page-separator">
            <div class="page-separator__text">Basic Information</div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="col-md-6 p-0">
                    <form>
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <input type="text"
                                   class="form-control"
                                   value="{{ $user->name }}"
                                   placeholder="Your first name ...">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email address</label>
                            <input type="email"
                                   class="form-control"
                                   value="{{ $user->email }}"
                                   placeholder="Your email address ...">
                            <small class="form-text text-muted">Note that if you change your email, you will have to confirm it again.</small>
                        </div>
                    </form>
                </div>
            </div>

        </div>


        <div class="page-separator">
            <div class="page-separator__text">Change password</div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="col-lg-6 p-0">

            <form>
                <div class="form-group">
                    <label class="form-label">New password</label>
                    <input type="password"
                           class="form-control"
                           placeholder="Password ...">
                </div>
                <div class="form-group">
                    <label class="form-label">Confirm password</label>
                    <input type="password"
                           class="form-control"
                           placeholder="Confirm password ...">
                </div>

            </form>
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
                <label class="form-label">Your photo</label>
                <div class="media align-items-center">
                    <a href=""
                       class="media-left mr-16pt">
                        <img src="{{ asset('backend/images/people/110/guy-3.jpg') }}"
                             alt="people"
                             width="56"
                             class="rounded-circle" />
                    </a>
                    <div class="media-body">
                        <div class="custom-file">
                            <input type="file"
                                   class="custom-file-input"
                                   id="inputGroupFile01">
                            <label class="custom-file-label"
                                   for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Luma profile name</label>
                <input type="text"
                       class="form-control"
                       value="Luma.com/alexander"
                       placeholder="Your profile name ...">
                <small class="form-text text-muted">Your profile name will be used as part of your public profile URL address.</small>
            </div>

            <div class="form-group">
                <label class="form-label">About you</label>
                <textarea rows="3"
                          class="form-control"
                          placeholder="About you ..."></textarea>
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox"
                           class="custom-control-input"
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
    </div>
@endsection
