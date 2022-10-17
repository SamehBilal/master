@extends('layouts.website')
@php $locale = session()->get('locale'); @endphp

@section('contact-us')
    active
@endsection

@section('content')
    <header id="header" class="header-v3">
        @include('website.components.main-navigation')

        @include('website.components.search-top')

        @include('website.components.menu-mobile')

        @include('website.components.menu')
    </header><!-- /header -->

    <div class="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="{{ route('website.index') }}">{{ __('content.Home') }}</a></li>
                <li class="active">{{ __('content.Contact-us') }}</li>
            </ul>
        </div>
        <!-- End container -->
    </div>

    <div class="main-content">
        <div class="container">
            <div class="title-ver3 title-ver4">
                <h4>{{ __('content.GET IN TOUCH') }}</h4>
                @if($locale == 'ar')
                    <h3 style="color: #134E9E"><span>ا</span>رسل لنا</h3>
                @else
                    <h3 style="color: #134E9E"><span>C</span>ONTACT FORM</h3>
                @endif
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto</p>
            </div>
            @if (session('status'))
                <div class="alert alert-success animated jellyIn in" role="alert" style="color: #155724;background-color: #d4edda;border-color: #c3e6cb;">
                    {{ session('status') }}
                </div>
            @endif

            @if($message = \Illuminate\Support\Facades\Session::get('success'))
                <div class="alert alert-soft-success d-flex" role="alert" style="color: #155724;background-color: #d4edda;border-color: #c3e6cb;">
                    <div class="text-body"> <i class="material-icons mr-3">check_circle</i> {{ $message }}</div>
                </div>
            @endif

            <div class="contact-content">
                <div class="contact-form contact-form-bg">
                    <form class="form-horizontal" action="{{ route('contact-forms.store') }}" method="POST">
                        <div class="form-group col-md-6">
                            @csrf
                            <label class=" control-label" for="inputName">{{ __('content.Full name') }}</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="inputName" placeholder="{{ __('content.Full name') }}">
                            @error('name')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" control-label" for="inputEmail">{{ __('content.Email') }}</label>
                            <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="inputEmail" placeholder="{{ __('content.Email') }}">
                            @error('email')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label class=" control-label" for="message">{{ __('content.MESSAGE') }}</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" placeholder="{{ __('content.MESSAGE') }}">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                            @enderror
                            <div class="checkbox space-10"></div>
                            <button class="btn link-button width-100" type="submit">{{ __('content.Send your message') }}</button>
                        </div>
                    </form>
                </div>
                <!-- End col-md-9 -->
            </div>
        </div>
        <!-- End container -->
        <div class="title-ver3 title-ver4">
            <h4>{{ __('content.GET IN TOUCH') }}</h4>
            @if($locale == 'ar')
                <h3 style="color: #134E9E"><span>م</span>علومات الاتصال</h3>
            @else
                <h3 style="color: #134E9E"><span>C</span>ONTACT INFO</h3>
            @endif
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto</p>
        </div>
        <!-- End contact content -->
        <div {{--id="googleMap2"--}} style="z-index: 0">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3451.341359188153!2d31.340813384586312!3d30.113044122282954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145815c3b5ce2d21%3A0x2189d1a95462a8ca!2z2KzYp9mF2Lkg2KfZhNmB2KrYrQ!5e0!3m2!1sar!2seg!4v1639064650425!5m2!1sar!2seg" width="100%" height="640" style="border:0;" loading="lazy"></iframe>
        </div>
        <div class="container">
            <div class="box-icon-adress">
                <div class="col-md-4">
                    <div class="feature-box feature-box-v3 feature-box-center space-30">
                        <div class="fbox-icon">
                            <a href="#"><img src="{{ asset('frontend/assets/images/phone-book.png') }}" height="46" alt="icons"></a>
                        </div>
                        <div class="fbox-body">
                            <h4>{{ __('content.OUR ADDRESS') }}</h4>
                            <p class="open-sans">Misr Al gadeda, Cairo, Egypt</p>
                        </div>
                    </div>
                </div>
                <!-- End col-md-4 -->
                <div class="col-md-4">
                    <div class="feature-box feature-box-v3 feature-box-center space-30">
                        <div class="fbox-icon">
                            <a href="#"><img src="{{ asset('frontend/assets/images/address.png') }}" height="46" alt="icons"></a>
                        </div>
                        <div class="fbox-body">
                            <h4>{{ __('content.PHONE NUMBER') }}</h4>
                            <p class="open-sans">+(20) 10 4568 7895</p>
                        </div>
                    </div>
                </div>
                <!-- End col-md-4 -->
                <div class="col-md-4">
                    <div class="feature-box feature-box-v3 feature-box-center space-30">
                        <div class="fbox-icon">
                            <a href="#"><img src="{{ asset('frontend/assets/images/email.png') }}" height="46" alt="icons"></a>
                        </div>
                        <div class="fbox-body">
                            <h4>{{ __('content.EMAIL ADDRESS') }}</h4>
                            <p class="open-sans">info@droplin.com</p>
                        </div>
                    </div>
                </div>
                <!-- End col-md-4 -->
                <div class="border-cotact2">
                    <img src="{{ asset('frontend/assets/images/border-contact2.png') }}"  alt="border">
                </div>
            </div>
            <!-- End container -->
        </div>
        <!-- End box-icon-adress -->
        <div class="container">
            <div class="adress-info">
                @if($locale == 'ar')
                    <div class="col-md-3">
                        <div class="items">
                            <span class="icon open-sans">4</span>
                            <h3 class="open-sans">{{ __('content.Location') }} 04</h3>
                            <p><span>{{ __('content.Address') }}: </span>6 october, Cairo, Egypt</p>
                            <p><span>{{ __('content.Phone') }}: </span> +(20) 10 4568 7895</p>
                        </div>
                    </div>
                    <!-- End col-md-3 -->
                    <div class="col-md-3">
                        <div class="items">
                            <span class="icon open-sans">3</span>
                            <h3 class="open-sans">{{ __('content.Location') }} 03</h3>
                            <p><span>{{ __('content.Address') }}: </span>Giza, Cairo, Egypt</p>
                            <p><span>{{ __('content.Phone') }}: </span> +(20) 10 4568 7896</p>
                        </div>
                    </div>
                    <!-- End col-md-3 -->
                    <div class="col-md-3">
                        <div class="items">
                            <span class="icon open-sans">2</span>
                            <h3 class="open-sans">{{ __('content.Location') }} 02</h3>
                            <p><span>{{ __('content.Address') }}: </span>5th District, Cairo, Egypt</p>
                            <p><span>{{ __('content.Phone') }}: </span> +(20) 10 4568 7897</p>
                        </div>
                    </div>
                    <!-- End col-md-3 -->
                    <div class="col-md-3">
                        <div class="items">
                            <span class="icon open-sans">1</span>
                            <h3 class="open-sans">{{ __('content.Location') }} 01</h3>
                            <p><span>{{ __('content.Address') }}: </span>Nasr City, Cairo, Egypt</p>
                            <p><span>{{ __('content.Phone') }}: </span> +(20) 10 4568 7898</p>
                        </div>
                    </div>
                    <!-- End col-md-3 -->
                @else
                    <div class="col-md-3">
                        <div class="items">
                            <span class="icon">1</span>
                            <h3>{{ __('content.Location') }} 01</h3>
                            <p><span>{{ __('content.Address') }}: </span>6 october, Cairo, Egypt</p>
                            <p><span>{{ __('content.Phone') }}: </span> +(20) 10 4568 7895</p>
                        </div>
                    </div>
                    <!-- End col-md-3 -->
                    <div class="col-md-3">
                        <div class="items">
                            <span class="icon">2</span>
                            <h3>{{ __('content.Location') }} 02</h3>
                            <p><span>{{ __('content.Address') }}: </span>Giza, Cairo, Egypt</p>
                            <p><span>{{ __('content.Phone') }}: </span> +(20) 10 4568 7896</p>
                        </div>
                    </div>
                    <!-- End col-md-3 -->
                    <div class="col-md-3">
                        <div class="items">
                            <span class="icon">3</span>
                            <h3>{{ __('content.Location') }} 03</h3>
                            <p><span>{{ __('content.Address') }}: </span>5th District, Cairo, Egypt</p>
                            <p><span>{{ __('content.Phone') }}: </span> +(20) 10 4568 7897</p>
                        </div>
                    </div>
                    <!-- End col-md-3 -->
                    <div class="col-md-3">
                        <div class="items">
                            <span class="icon">4</span>
                            <h3>{{ __('content.Location') }} 04</h3>
                            <p><span>{{ __('content.Address') }}: </span>Nasr City, Cairo, Egypt</p>
                            <p><span>{{ __('content.Phone') }}: </span> +(20) 10 4568 7898</p>
                        </div>
                    </div>
                    <!-- End col-md-3 -->
                @endif
            </div>
        </div>
        <!-- end adress Info -->
    </div>
@endsection
