@extends('layouts.backend')

@section('title')
    Contacts
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('contacts.index') }}">Contacts</a>
    </li>
    <li class="breadcrumb-item active">
        create
    </li>
@endsection

@section('button-link')
    {{ route('contacts.index') }}
@endsection

@section('button-icon')
    format_list_bulleted
@endsection

@section('button-title')
    All Contacts
@endsection

@section('main_content')
    <div class="container page__container page-section">
        <div class="page-separator">
            <div class="page-separator__text" >
                Contact Information
            </div>
        </div>
        <form method="POST" action="{{ route('contacts.index') }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-lg-3 bg-light">
                            <div class="page-separator">
                                <div class="page-separator__text">Basic Details</div>
                            </div>
                            <p class="card-subtitle text-70 mb-16pt mb-lg-0">Basic details of the user contacts listed.</p>
                        </div>
                        <div class="col-lg-9 p-4 row">
                            <div class="flex"
                                style="max-width: 100%">
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                for="contact_name">Contact name:</label>
                                            <div class="">
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
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                for="contact_job_title">Job title:</label>
                                            <div>
                                                <input type="text"
                                                    class="form-control @error('contact_job_title') is-invalid @enderror"
                                                    value="{{ old('contact_job_title') }}"
                                                    autocomplete="contact_job_title"
                                                    name="contact_job_title"
                                                    id="contact_job_title"
                                                    placeholder="Enter your contact job title .."
                                                    >

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
                                            <div>
                                                <input type="text"
                                                    class="form-control @error('contact_phone') is-invalid @enderror"
                                                    value="{{ old('contact_phone') }}"
                                                    autocomplete="contact_phone"
                                                    name="contact_phone"
                                                    id="contact_phone"
                                                    placeholder="EG phone: +(20)10 0000 0000)"
                                                    data-mask="01000000000"
                                                    >

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
                                            <div>
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
                                    </div>
                                </div>
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
