@extends('layouts.backend')

@section('title')
    Orders
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('orders.index') }}">Orders</a>
    </li>
    <li class="breadcrumb-item active">
        create
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
        <div class="page-separator">
            <div class="page-separator__text" style="line-height: 30px;">
                <button type="button" class="btn btn-sm rounded-circle btn-dark">
                    &nbsp;  1 &nbsp;
                </button>
                &nbsp;Order Information
            </div>
        </div>
        <div class="row mb-32pt">
            <div class="col-lg-12 d-flex align-items-center">
                <div class="flex"
                     style="max-width: 100%">

                    <div class="card dashboard-area-tabs p-relative o-hidden mb-0">
                        <div class="card-header p-0 nav">
                            <div class="row no-gutters"
                                 role="tablist">
                                <div class="col-auto">
                                    <a href="#deliver"
                                       data-toggle="tab"
                                       role="tab"
                                       aria-selected="true"
                                       class="dashboard-area-tabs__tab card-body d-flex flex-row align-items-center justify-content-start active">
                                        <span class="h2 mb-0 mr-3">
                                            <div class="avatar mr-8pt">

                                            <img src="{{ asset('backend/images/icon/fast-delivery.png') }}"
                                             alt="Avatar"
                                             class="avatar-img rounded-circle">

                                            </div>
                                        </span>
                                        <span class="flex d-flex flex-column">
                                                        <strong class="card-title">Deliver</strong>
                                                        <small class="card-subtitle text-20">Deliver a package <br>to your customer.</small>
                                                    </span>
                                    </a>
                                </div>
                                <div class="col-auto border-left border-right">
                                    <a href="#exchange"
                                       data-toggle="tab"
                                       role="tab"
                                       aria-selected="false"
                                       class="dashboard-area-tabs__tab card-body d-flex flex-row align-items-center justify-content-start">
                                        <span class="h2 mb-0 mr-3">
                                            <div class="avatar mr-8pt">

                                            <img src="{{ asset('backend/images/icon/transfer.png') }}"
                                                 alt="Avatar"
                                                 class="avatar-img rounded-circle">

                                            </div>
                                        </span>
                                        <span class="flex d-flex flex-column">
                                                        <strong class="card-title">Exchange</strong>
                                                        <small class="card-subtitle text-20">Exchange packages <br>with your customer.</small>
                                                    </span>
                                    </a>
                                </div>
                                <div class="col-auto border-left border-right">
                                    <a href="#return"
                                       data-toggle="tab"
                                       role="tab"
                                       aria-selected="false"
                                       class="dashboard-area-tabs__tab card-body d-flex flex-row align-items-center justify-content-start">
                                        <span class="h2 mb-0 mr-3">
                                            <div class="avatar mr-8pt">

                                            <img src="{{ asset('backend/images/icon/return-on-investment.png') }}"
                                                 alt="Avatar"
                                                 class="avatar-img rounded-circle">

                                            </div>
                                        </span>
                                        <span class="flex d-flex flex-column">
                                                        <strong class="card-title">Return</strong>
                                                        <small class="card-subtitle text-20">Pickup a package <br>from your customer.</small>
                                                    </span>
                                    </a>
                                </div>
                                <div class="col-auto border-left border-right">
                                    <a href="#cash_collection"
                                       data-toggle="tab"
                                       role="tab"
                                       aria-selected="false"
                                       class="dashboard-area-tabs__tab card-body d-flex flex-row align-items-center justify-content-start">
                                        <span class="h2 mb-0 mr-3">
                                              <div class="avatar  mr-8pt">

                                            <img src="{{ asset('backend/images/icon/money.png') }}"
                                                 alt="Avatar"
                                                 class="avatar-img rounded-circle">

                                            </div>
                                        </span>
                                        <span class="flex d-flex flex-column">
                                                        <strong class="card-title">Cash Collection</strong>
                                                        <small class="card-subtitle text-20">Collect or refund <br>cash to your customer.</small>
                                                    </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body tab-content">
                            <div class="tab-pane text-70  fade show active" id="deliver" role="tabpanel" aria-labelledby="nav-home-tab">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam eaque error laborum ipsum consequatur nobis dicta totam facilis corporis, porro cupiditate inventore minus vero neque accusamus illo temporibus officiis natus.</div>
                            <div class="tab-pane text-70  fade " id="exchange" role="tabpanel" aria-labelledby="nav-home-tab">consectetur adipisicing elit. Aperiam eaque error laborum ipsum consequatur nobis dicta totam facilis corporis, porro cupiditate inventore minus vero neque accusamus illo temporibus officiis natus.</div>
                            <div class="tab-pane text-70  fade " id="return" role="tabpanel" aria-labelledby="nav-home-tab">consectetur adipisicing elit. Aperiam ecorporis, porro cupiditate inventore minus vero neque accusamus illo temporibus officiis natus.</div>
                            <div class="tab-pane text-70  fade " id="cash_collection" role="tabpanel" aria-labelledby="nav-home-tab">conro cupiditate inventore minus vero neque accusamus illo temporibus officiis natus.</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="page-separator">
            <div class="page-separator__text">Customer Information</div>
        </div>
        <div class="card">
            <div class="card-body ">
                <div class="row">
                    <div class="col-lg-3 bg-light">
                        <div class="page-separator">
                            <div class="page-separator__text">Basic Details</div>
                        </div>
                        <p class="card-subtitle text-70 mb-16pt mb-lg-0">Basic details of the customer.</p>
                    </div>
                    <div class="col-lg-9 row p-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label"
                                       for="name">Name:</label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       value=""
                                       id="name"
                                       name="name"
                                       required="required"
                                       autocomplete="name"
                                       placeholder="Your first name ..."
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
                                       for="email">Email address:</label>
                                <input type="email"
                                       id="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       value=""
                                       required="required"
                                       name="email"
                                       autocomplete="email"
                                       placeholder="Your email address ...">
                                @error('email')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                @enderror
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label"
                                       for="phone">Phone:</label>
                                <input type="text"
                                       class="form-control @error('phone') is-invalid @enderror"
                                       value=""
                                       id="phone"
                                       name="phone"
                                       data-mask="00000000000"
                                       placeholder="Your mobile phone ...">
                                @error('phone')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                @enderror
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label"
                                       for="secondary_phone">Secondary Phone:</label>
                                <input type="text"
                                       class="form-control @error('secondary_phone') is-invalid @enderror"
                                       value=""
                                       id="secondary_phone"
                                       name="secondary_phone"
                                       data-mask="00000000000"
                                       placeholder="Your secondary phone ...">
                                @error('secondary_phone')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                @enderror
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label"
                                       for="delivery_notes">Delivery Notes:</label> <small>(optional)</small>
                                <textarea rows="3"
                                          id="delivery_notes"
                                          name="delivery_notes"
                                          class="form-control @error('delivery_notes') is-invalid @enderror"
                                          placeholder="Delivery Notes ..."></textarea>
                                @error('delivery_notes')
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


    </div>

@endsection
