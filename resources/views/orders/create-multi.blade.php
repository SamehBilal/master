@extends('layouts.backend')

@section('title')
    Orders
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('orders.index') }}">Orders</a>
    </li>
    <li class="breadcrumb-item active">
        create multi orders
    </li>
@endsection

@section('button-link')
    {{ route('orders.index') }}
@endsection

@section('button-icon')
    format_list_bulleted
@endsection

@section('button-title')
    All Orders
@endsection

@section('main_content')

    <div class="container page__container page-section">

            <div class="row mb-32pt">
                <div class="col-lg-4">
                    <div class="page-separator">
                        <div class="page-separator__text">Drag &amp; Drop Upload</div>
                    </div>
                   {{--  <p class="card-subtitle text-70 mb-16pt mb-lg-0">Drag and drop file uploads with image previews powered by Dropzone.js. Please read the <a href="http://www.dropzonejs.com/"                                                                                                                                        target="_blank">official plugin documentation</a> for a full list of options.</p>
                 --}}</div>
                <div class="col-lg-8 d-flex align-items-center">
                    <div class="flex"
                         style="max-width: 100%">

                        <div class="dropzone dropzone-multiple w-100 mb-24pt"
                             data-toggle="dropzone"
                             {{--data-dropzone-multiple--}}
                             data-dropzone-url="http://"
                             data-dropzone-files='["{{ asset('backend/images/256_daniel-gaffey-1060698-unsplash.jpg') }}"]'>

                            <div class="fallback">
                                <div class="custom-file">
                                    <input type="file"
                                           class="custom-file-input"
                                           id="customFileUploadMultiple">
                                    <label class="custom-file-label"
                                           for="customFileUploadMultiple">Choose file</label>
                                </div>
                            </div>

                            <ul class="dz-preview dz-preview-multiple list-group list-group-flush mt-16pt">
                                <li class="list-group-item">
                                    <div class="form-row align-items-center">
                                        <div class="col-auto">
                                            <div class="avatar">
                                                <img src="{{ asset('backend/images/account-add-photo.svg') }}"
                                                     class="avatar-img rounded"
                                                     alt="..."
                                                     data-dz-thumbnail>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-bold"
                                                 data-dz-name>...</div>
                                            <p class="small text-muted mb-0"
                                               data-dz-size>...</p>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#"
                                               class="text-muted-light"
                                               data-dz-remove>
                                                <i class="material-icons">close</i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </div>

                        {{-- <code class="highlight html  bg-transparent">&lt;div&nbsp;<br />
                            &nbsp;&nbsp;class=&quot;dropzone&nbsp;dropzone-multiple&nbsp;w-100&quot;&nbsp;<br />
                            &nbsp;&nbsp;data-toggle=&quot;dropzone&quot;&nbsp;<br />
                            &nbsp;&nbsp;data-dropzone-multiple&nbsp;<br />
                            &nbsp;&nbsp;data-dropzone-url=&quot;http://&quot;<br />
                            &nbsp;&nbsp;data-dropzone-files=&#39;[&quot;public/images/256_daniel-gaffey-1060698-unsplash.jpg&quot;,&nbsp;&quot;public/images/256_rsz_clem-onojeghuo-150467-unsplash.jpg&quot;,&nbsp;&quot;public/images/256_rsz_florian-perennes-594195-unsplash.jpg&quot;]&#39;&gt;...&lt;/div&gt;</code>
 --}}
                    </div>
                </div>
            </div>

        </div>

@endsection
