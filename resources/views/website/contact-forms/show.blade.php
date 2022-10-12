@extends('layouts.backend')

@section('title')
    {{ __('content.Website_messages') }}
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('dashboard.contact-forms.index') }}">{{ __('content.Website_messages') }}</a>
    </li>
    <li class="breadcrumb-item active">
        {{ $contactForm->name }}
    </li>
@endsection

@section('button-link')
    {{ route('dashboard.contact-forms.index') }}
@endsection

@section('button-icon')
    format_list_bulleted
@endsection

@section('button-title')
    {{ __('content.Website_messages') }}
@endsection

@section('main_content')

    <!-- Page Content -->

    <div class="page-section">
        <div class="container page__container">
            <div class="row align-items-start">
                <div class="col-md-12">

                    <div class="page-separator">
                        <div class="page-separator__text">{{ __('dashboard.Message') }}</div>
                    </div>
                    <ul class="list-group stack mb-40pt">
                        <li class="list-group-item d-flex">
                            <i class="material-icons text-70 icon-16pt icon--left">message</i>
                            <div class="flex d-flex flex-column">
                                <div class="card-title mb-4pt">{{ $contactForm->name }} ({{ $contactForm->email }})</div>
                                <div class="card-subtitle text-70 paragraph-max mb-16pt">{{ $contactForm->message }}</div>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
@endsection
