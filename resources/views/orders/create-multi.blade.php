@extends('layouts.backend')

@section('title')
{{ __('dashboard.Orders') }}
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('dashboard.orders.index') }}">{{ __('dashboard.Orders') }}</a>
    </li>
    <li class="breadcrumb-item active">
        {{ __('dashboard.create multi orders') }}
    </li>
@endsection

@section('button-link')
    {{ route('dashboard.orders.index') }}
@endsection

@section('button-icon')
    format_list_bulleted
@endsection

@section('button-title')
{{ __('dashboard.All_orders') }}
@endsection

@section('main_content')

    <div class="container page__container page-section">

            <div class="row mb-32pt">
                <div class="col-lg-4">
                    <div class="page-separator">
                        <div class="page-separator__text">{{ __('dashboard.Upload Multiple Orders') }}</div>
                    </div>
                   {{--  <p class="card-subtitle text-70 mb-16pt mb-lg-0">Drag and drop file uploads with image previews powered by Dropzone.js. Please read the <a href="http://www.dropzonejs.com/"                                                                                                                                        target="_blank">official plugin documentation</a> for a full list of options.</p>
                 --}}</div>

                    <div class="col-lg-8 d-flex align-items-center">
                        <div class="flex"
                             style="max-width: 100%">
                            <form id="multi-form" action="{{ route('dashboard.orders.create.multi.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group m-0">
                                    <div class="custom-file">
                                        <input type="file"
                                               id="file"
                                               name="file"
                                               class="custom-file-input">
                                        <label for="file"
                                               class="custom-file-label">{{ __('dashboard.Choose file') }}</label>
                                        @foreach ($errors->all() as $error)

                                            <div>{{ $error }}</div>

                                        @endforeach
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

            </div>

        </div>

@endsection

@section('extra-scripts')
    <script>
        document.getElementById("file").onchange = function() {
            document.getElementById("multi-form").submit();
        };
    </script>
@endsection
