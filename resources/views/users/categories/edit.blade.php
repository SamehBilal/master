@extends('layouts.backend')

@section('title')
    Categories
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('user-categories.index') }}">Categories</a>
    </li>
    <li class="breadcrumb-item ">
        <a href="{{ route('user-categories.show',$userCategory->id) }}">{{ $userCategory->name }}</a>
    </li>
    <li class="breadcrumb-item active">
        edit
    </li>
@endsection

@section('button-link')
    {{ route('user-categories.index') }}
@endsection

@section('button-icon')
    format_list_bulleted
@endsection

@section('button-title')
    All Categories
@endsection

@section('main_content')
    <div class="container page__container page-section">
        <div class="page-separator">
            <div class="page-separator__text" >
                Categories Information
            </div>
        </div>
        <form method="POST" action="{{ route('user-categories.update',$userCategory->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-lg-3 bg-light">
                            <div class="page-separator">
                                <div class="page-separator__text">Basic Details</div>
                            </div>
                            <p class="card-subtitle text-70 mb-16pt mb-lg-0">Basic details of the user categories listed.</p>
                        </div>
                        <div class="col-lg-9 row p-2">
                            <div class="col-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="name">Name:</label>
                                    <input type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') ? old('name'):$userCategory->name }}"
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
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="select04">Model</label>
                                    <select id="select04"
                                            data-toggle="select"
                                            data-minimum-results-for-search="-1"
                                            class="form-control form-control-sm @error('model') is-invalid @enderror"
                                            name="model">
                                        <option @if(old('model')) {{ old('model') == 'App\Models\Customer' ? 'selected':'' }} @else {{ $userCategory->model == 'App\Models\Customer' ? 'selected':'' }} @endif value="App\Models\Customer" data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
                                            Customer
                                        <option @if(old('model')) {{ old('model') == 'App\Models\User' ? 'selected':'' }} @else {{ $userCategory->model == 'App\Models\User' ? 'selected':'' }} @endif value="App\Models\User" data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
                                            User
                                        </option>
                                    </select>
                                    @error('model')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="select03">Status</label>
                                    <select id="select03"
                                            data-toggle="select"
                                            data-minimum-results-for-search="-1"
                                            class="form-control form-control-sm @error('status') is-invalid @enderror"
                                            name="status">
                                        <option value="active" @if(old('model')) {{ old('status') == 'active' ? 'selected':'' }} @else {{ $userCategory->status == 'active' ? 'selected':'' }} @endif>
                                            active
                                        <option value="inactive" @if(old('model')) {{ old('status') == 'inactive' ? 'selected':'' }} @else {{ $userCategory->status == 'inactive' ? 'selected':'' }} @endif>
                                            inactive
                                        </option>
                                    </select>
                                    @error('status')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="description">Description:</label> <small class="badge badge-secondary">optional</small>
                                    <textarea rows="3"
                                              id="description"
                                              name="description"
                                              class="form-control @error('description') is-invalid @enderror"
                                              placeholder="Description">{{ old('description') ? old('description'):$userCategory->description }}</textarea>
                                    @error('description')
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
