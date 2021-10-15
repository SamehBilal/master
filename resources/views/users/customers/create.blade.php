@extends('layouts.backend')

@section('title')
    Customers
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('customers.index') }}">Customers</a>
    </li>
    <li class="breadcrumb-item active">
        Customers
    </li>
@endsection

@section('main_content')
    <div class="container page__container page-section">

        <div class="row mb-32pt">
            <div class="col-lg-4">
                <div class="page-separator">
                    <div class="page-separator__text">Basic Information</div>
                </div>
                <p class="card-subtitle text-70 mb-16pt mb-lg-0">
                    Add your customer basic information.
                </p>
            </div>
            <div class="col-lg-8 d-flex align-items-center">
                <div class="flex"
                     style="max-width: 100%">

                    <div class="form-row">
                        <div class="col-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label"
                                       for="name">Your name:</label>
                                <div class="input-group input-group-merge">
                                    <input type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}"
                                           required="required"
                                           autocomplete="name"
                                           name="name"
                                           id="name"
                                           placeholder="Enter your name .."
                                           autofocus>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="material-icons">person</span>
                                        </div>
                                    </div>
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
                                       for="email">Your email:</label>
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
                                       for="phone">Your phone:</label>
                                <div class="input-group input-group-merge">
                                    <input type="text"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           value="{{ old('phone') }}"
                                           required="required"
                                           autocomplete="phone"
                                           name="phone"
                                           id="phone"
                                           placeholder="EG phone: +(20)10 0000 0000)"
                                           data-mask="+(20)10 0000 0000"
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
                                       for="fax">Your fax:</label>
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
                </div>
            </div>
        </div>

        <div class="row mb-32pt">
            <div class="col-lg-4">
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
                                       for="country">Country:</label>
                                <div class="input-group input-group-merge">
                                    <input type="text"
                                           class="form-control @error('country') is-invalid @enderror"
                                           value="{{ old('country') }}"
                                           required="required"
                                           autocomplete="country"
                                           name="country"
                                           id="country"
                                           placeholder="Enter your country .."
                                           autofocus>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="material-icons">map</span>
                                        </div>
                                    </div>
                                    @error('country')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label"
                                       for="city">City:</label>
                                <div class="input-group input-group-merge">
                                    <input type="text"
                                           class="form-control @error('city') is-invalid @enderror"
                                           value="{{ old('city') }}"
                                           required="required"
                                           autocomplete="city"
                                           name="city"
                                           id="city"
                                           placeholder="Enter your city .."
                                           autofocus>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="material-icons">emoji_transportation</span>
                                        </div>
                                    </div>
                                    @error('city')
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
                                       for="street">Street:</label>
                                <div class="input-group input-group-merge">
                                    <input type="text"
                                           class="form-control @error('street') is-invalid @enderror"
                                           value="{{ old('street') }}"
                                           required="required"
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
                                           required="required"
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
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label"
                                       for="floor">Floor:</label>
                                <div class="input-group input-group-merge">
                                    <input type="text"
                                           class="form-control @error('floor') is-invalid @enderror"
                                           value="{{ old('floor') }}"
                                           required="required"
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
                                           required="required"
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
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-32pt">
            <div class="col-lg-4">
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
                        <label class="form-label">Profile name:</label>
                        <div class="input-group input-group-merge">
                            <input type="text"
                                   class="form-control @error('profile_name') is-invalid @enderror"
                                   value="{{ old('profile_name') ? old('profile_name'):'app.com/alexander' }}"
                                   name="profile_name"
                                   placeholder="Your profile name ...">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="material-icons">link</span>
                                </div>
                            </div>
                            @error('profile_name')
                            <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                            <div class="valid-feedback">Looks good!</div>
                        </div>
                            <small class="form-text text-muted">Your profile name will be used as part of your public profile URL address.</small>
                    </div>

                    <div class="form-group">
                        <label class="form-label">About you:</label>
                        <textarea rows="3"
                                  class="form-control @error('bio') is-invalid @enderror"
                                  placeholder="About you ..."
                                  name="bio">{{ old('bio') }}</textarea>
                        @error('bio')
                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                        @enderror
                        <div class="valid-feedback">Looks good!</div>
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

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox"
                                   class="custom-control-input"
                                   checked
                                   id="customCheck2">
                            <label class="custom-control-label"
                                   for="customCheck2">Allow everyone to see your profile</label>
                            <small class="form-text text-muted">If unchecked, your profile will be private and no one except you will be able to view it.</small>
                        </div>
                    </div>

                    <button type="submit"
                            class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>

    </div>
@endsection
