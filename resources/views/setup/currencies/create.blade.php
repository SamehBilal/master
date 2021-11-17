@extends('layouts.backend')

@section('title')
    Currencies
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('currencies.index') }}">Currencies</a>
    </li>
    <li class="breadcrumb-item active">
        create
    </li>
@endsection

@section('button-link')
    {{ route('currencies.index') }}
@endsection

@section('button-icon')
    format_list_bulleted
@endsection

@section('button-title')
    All Currencies
@endsection

@section('main_content')
    <div class="container page__container page-section">
        <div class="page-separator">
            <div class="page-separator__text" >
                Currency Information
            </div>
        </div>
        <form method="POST" action="{{ route('currencies.index') }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-lg-3 bg-light">
                            <div class="page-separator">
                                <div class="page-separator__text">Basic Details</div>
                            </div>
                            <p class="card-subtitle text-70 mb-16pt mb-lg-0">Basic details of the currency.</p>
                        </div>
                        <div class="col-lg-9 row p-2">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="name">Name:</label>
                                    <input type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}"
                                           id="name"
                                           name="name"
                                           required="required"
                                           autocomplete="name"
                                           placeholder="Currency name ..."
                                           autofocus>
                                    @error('name')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="rate">Rate:</label>
                                    <input type="number"
                                           class="form-control @error('rate') is-invalid @enderror"
                                           value="{{ old('rate') }}"
                                           id="rate"
                                           name="rate"
                                           min="0"
                                           step="0.01"
                                           placeholder="Currency rate ...">
                                    @error('rate')
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
                    class="btn pull-right btn-primary">Submit</button>
        </form>
    </div>
@endsection
