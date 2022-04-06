@extends('layouts.backend')

@section('title')
    {{ $deal->en_title }}
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('dashboard.deals.index') }}">{{ __('dashboard.deals') }}</a>
    </li>
    <li class="breadcrumb-item ">
        <a href="{{ route('dashboard.deals.show',$deal->id) }}">{{ $deal->en_title }}</a>
    </li>
    <li class="breadcrumb-item active">
        {{ __('dashboard.edit') }}
    </li>
@endsection

@section('button-link')
    {{ route('dashboard.deals.index') }}
@endsection

@section('button-icon')
    format_list_bulleted
@endsection

@section('button-title')
    {{ __('dashboard.All deals') }}
@endsection

@section('main_content')
    <div class="container page__container page-section">
        <div class="page-separator">
            <div class="page-separator__text" >
                {{ __('dashboard.Deals Information') }}
            </div>
        </div>
        <form method="POST" action="{{ route('dashboard.deals.update',$deal->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-lg-3 bg-light">
                            <div class="page-separator">
                                <div class="page-separator__text">{{ __('dashboard.Basic Details') }}</div>
                            </div>
                            <p class="card-subtitle text-70 mb-16pt mb-lg-0">{{ __('dashboard.Basic details of the deals') }}</p>
                        </div>
                        <div class="col-lg-9 row p-2">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="en_title">{{ __('dashboard.en_title') }}:</label>
                                    <input type="text"
                                           class="form-control @error('en_title') is-invalid @enderror"
                                           value="{{ old('en_title',$deal->en_title) }}"
                                           id="en_title"
                                           name="en_title"
                                           required="required"
                                           autocomplete="en_title"
                                           placeholder="{{ __('dashboard.en_title') }} ..."
                                           autofocus>
                                    @error('en_title')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="ar_title">{{ __('dashboard.ar_title') }}:</label>
                                    <input type="text"
                                           class="form-control @error('ar_title') is-invalid @enderror"
                                           value="{{ old('ar_title',$deal->ar_title) }}"
                                           id="ar_title"
                                           name="ar_title"
                                           required="required"
                                           autocomplete="ar_title"
                                           placeholder="{{ __('dashboard.ar_title') }} ..."
                                           autofocus>
                                    @error('ar_title')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="en_description">{{ __('dashboard.en_description') }}:</label>
                                    <textarea type="text"
                                           class="form-control @error('en_description') is-invalid @enderror"
                                           id="en_description"
                                           name="en_description"
                                           placeholder="{{ __('dashboard.en_description') }} ...">{{ old('en_description',$deal->en_description) }}</textarea>
                                    @error('en_description')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="ar_description">{{ __('dashboard.ar_description') }}:</label>
                                    <textarea type="text"
                                           class="form-control @error('ar_description') is-invalid @enderror"
                                           id="ar_description"
                                           name="ar_description"
                                           placeholder="{{ __('dashboard.ar_description') }} ...">{{ old('ar_description',$deal->ar_description) }}</textarea>
                                    @error('ar_description')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label" for="en_details">{{ __('dashboard.en_details') }}:</label><br>
                                    <textarea id="en_details" name="en_details" rows="5"  class="details form-control">{{ old('en_details',$deal->en_details) }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label" for="ar_details">{{ __('dashboard.ar_details') }}:</label><br>
                                    <textarea id="ar_details" name="ar_details" rows="5"  class="details form-control">{{ old('ar_details',$deal->ar_details) }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('dashboard.Images') }}:</label>
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <div class="custom-file">
                                                <input type="file" onchange="readURL(this);" name="images[]" class="custom-file-input " id="inputGroupFile01" multiple="multiple">
                                                <label class="custom-file-label" for="inputGroupFile01">{{ __('dashboard.Choose image') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('images')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label" for="status">{{ __('dashboard.Status') }}:</label><br>
                                    <select id="status" name="status" class="custom-select @error('status') is-invalid @enderror" style="width: 270px;">
                                        <option value="Public" {{ $deal->status == 'Public'?'selected':'' }}>{{ __('dashboard.Public') }}</option>
                                        <option value="Private" {{ $deal->status == 'Private'?'selected':'' }}>{{ __('dashboard.Private') }}</option>
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
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
