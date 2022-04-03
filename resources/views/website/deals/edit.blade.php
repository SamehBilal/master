@extends('layouts.backend')

@section('title')
    {{ $deal->title }}
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('dashboard.deals.index') }}">{{ __('dashboard.deals') }}</a>
    </li>
    <li class="breadcrumb-item ">
        <a href="{{ route('dashboard.deals.show',$deal->id) }}">{{ $deal->title }}</a>
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
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="title">{{ __('dashboard.Title') }}:</label>
                                    <input type="text"
                                           class="form-control @error('title') is-invalid @enderror"
                                           value="{{ old('title',$deal->title) }}"
                                           id="title"
                                           name="title"
                                           required="required"
                                           autocomplete="title"
                                           placeholder="{{ __('dashboard.Title') }} ..."
                                           autofocus>
                                    @error('title')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="description">{{ __('dashboard.Description') }}:</label>
                                    <textarea type="text"
                                              class="form-control @error('description') is-invalid @enderror"
                                              id="description"
                                              name="description"
                                              placeholder="{{ __('dashboard.Description') }} ...">{{ old('description',$deal->description) }}</textarea>
                                    @error('rate')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label" for="status">{{ __('dashboard.Details') }}:</label><br>
                                    <textarea id="details" name="details" rows="5"  class="form-control">{{ old('details',$deal->details) }}</textarea>
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
