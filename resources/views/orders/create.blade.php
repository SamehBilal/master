@extends('layouts.backend')

@section('title')
{{ __('dashboard.Orders') }}
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('dashboard.orders.index') }}">{{ __('dashboard.Orders') }}</a>
    </li>
    <li class="breadcrumb-item active">
        {{ __('dashboard.create') }}
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

        @if($errors->any())
        <div class="card overlay--show card-lg overlay--primary-dodger-blue stack stack--1 card-group-row__card">

            <div class="card-body d-flex flex-column">
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mt-16pt text-70 flex" :errors="$errors" />

            </div>
        </div>
        @endif

        <form method="POST" action="{{ route('dashboard.orders.store') }}" enctype="multipart/form-data" id="order_form">
            @csrf
            <div class="page-separator">
                <div class="page-separator__text" style="line-height: 30px;">
                    <button type="button" class="btn btn-sm rounded-circle btn-dark">
                        &nbsp;  1 &nbsp;
                    </button>
                    &nbsp;{{ __('dashboard.Order_Information') }}
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
                                           data-info="Deliver"
                                           aria-selected="true"
                                           class="dashboard-area-tabs__tab card-body d-flex flex-row align-items-center justify-content-start {{ old('type') ? (old('type') == 'Deliver' ? 'active':''):'active' }}">
                                            <span class="h2 mb-0 mr-3">
                                                <div class="avatar mr-8pt">

                                                <img src="{{ asset('backend/images/icon/fast-delivery.png') }}"
                                                 alt="Avatar"
                                                 class="avatar-img rounded-circle">

                                                </div>
                                            </span>
                                            <span class="flex d-flex flex-column">
                                                            <strong class="card-title">{{ __('dashboard.Deliver') }}</strong>
                                                            <small class="card-subtitle text-20">{{ __('dashboard.Deliver a package') }} <br>{{ __('dashboard.to your customer') }}</small>
                                                        </span>
                                        </a>
                                    </div>
                                    <div class="col-auto border-left border-right">
                                        <a href="#exchange"
                                           data-toggle="tab"
                                           role="tab"
                                           data-info="Exchange"
                                           aria-selected="false"
                                           class="dashboard-area-tabs__tab card-body d-flex flex-row align-items-center justify-content-start {{ old('type') == 'Exchange' ? 'active':'' }}">
                                            <span class="h2 mb-0 mr-3">
                                                <div class="avatar mr-8pt">

                                                <img src="{{ asset('backend/images/icon/transfer.png') }}"
                                                     alt="Avatar"
                                                     class="avatar-img rounded-circle">

                                                </div>
                                            </span>
                                            <span class="flex d-flex flex-column">
                                                            <strong class="card-title">{{ __('dashboard.Exchange') }}</strong>
                                                            <small class="card-subtitle text-20">{{ __('dashboard.Exchange packages') }}<br>{{ __('dashboard.with your customer') }}</small>
                                                        </span>
                                        </a>
                                    </div>
                                    <div class="col-auto border-left border-right">
                                        <a href="#return"
                                           data-toggle="tab"
                                           role="tab"
                                           data-info="Return"
                                           aria-selected="false"
                                           class="dashboard-area-tabs__tab card-body d-flex flex-row align-items-center justify-content-start {{ old('type') == 'Return' ? 'active':'' }}">
                                            <span class="h2 mb-0 mr-3">
                                                <div class="avatar mr-8pt">

                                                <img src="{{ asset('backend/images/icon/return-on-investment.png') }}"
                                                     alt="Avatar"
                                                     class="avatar-img rounded-circle">

                                                </div>
                                            </span>
                                            <span class="flex d-flex flex-column">
                                                            <strong class="card-title">{{ __('dashboard.Return') }}</strong>
                                                            <small class="card-subtitle text-20">{{ __('dashboard.Pickup a package') }} <br>{{ __('dashboard.from your customer') }}</small>
                                                        </span>
                                        </a>
                                    </div>
                                    <div class="col-auto border-left border-right">
                                        <a href="#cash_collection"
                                           data-toggle="tab"
                                           role="tab"
                                           data-info="Cash Collection"
                                           aria-selected="false"
                                           class="dashboard-area-tabs__tab card-body d-flex flex-row align-items-center justify-content-start {{ old('type') == 'Cash Collection' ? 'active':'' }}">
                                            <span class="h2 mb-0 mr-3">
                                                  <div class="avatar  mr-8pt">

                                                <img src="{{ asset('backend/images/icon/money.png') }}"
                                                     alt="Avatar"
                                                     class="avatar-img rounded-circle">

                                                </div>
                                            </span>
                                            <span class="flex d-flex flex-column">
                                                            <strong class="card-title">{{ __('dashboard.Cash Collection') }}</strong>
                                                            <small class="card-subtitle text-20">{{ __('dashboard.Collect or refund') }} <br>{{ __('dashboard.cash to your customer') }}</small>
                                                        </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body tab-content">
                                <div class="tab-pane text-70  fade {{ old('type') ? (old('type') == 'Deliver' ? 'show active':''):'show active' }}" id="deliver" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="row">
                                        <div class="col-lg-3 bg-light">
                                            <div class="page-separator">
                                                <div class="page-separator__text">{{ __('dashboard.Basic Details') }}</div>
                                            </div>
                                            <p class="card-subtitle text-70 mb-16pt mb-lg-0">{{ __('dashboard.Basic details of the customer') }}</p>
                                        </div>
                                        <div class="col-lg-9 row ">
                                            <div class="page-separator col-lg-12">
                                                <div class="page-separator__text" >
                                                    &nbsp; {{ __('dashboard.Customer Information') }}
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="custom-controls-stacked">
                                                        <div class="custom-control custom-radio">
                                                            <input id="with_cash_collection"
                                                                   name="with_cash_collection"
                                                                   type="radio"
                                                                   class="custom-control-input"
                                                                   value="with cash collection"
                                                                   @if(old('with_cash_collection') == 'with cash collection' && old('with_cash_collection') != null) checked="checked" @else checked="checked" @endif >
                                                            <label for="with_cash_collection"
                                                                   class="custom-control-label">{{ __('dashboard.With cash collection') }}</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input id="without_cash_collection"
                                                                   name="with_cash_collection"
                                                                   type="radio"
                                                                   value="without cash collection"
                                                                   class="custom-control-input"
                                                                   @if(old('with_cash_collection') == 'without cash collection') checked="checked" @endif>
                                                            <label for="without_cash_collection"
                                                                   class="custom-control-label">{{ __('dashboard.Without cash collection') }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="cash_on_delivery">{{ __('dashboard.Cash on Delivery') }}:</label>
                                                    <input type="number"
                                                           class="form-control @error('cash_on_delivery') is-invalid @enderror"
                                                           value="{{ old('cash_on_delivery') }}"
                                                           min="0"
                                                           step="1"
                                                           id="cash_on_delivery"
                                                           name="cash_on_delivery"
                                                           autocomplete="cash_on_delivery"
                                                           placeholder="{{ __('dashboard.Cash on Delivery') }} ..."
                                                           autofocus>
                                                    @error('cash_on_delivery')
                                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                    @enderror
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <small>{{ __('dashboard.Without cash collection') }}</small>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="page-separator col-lg-12">
                                                <div class="page-separator__text" >
                                                    &nbsp; {{ __('dashboard.Package Details') }}
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="custom-controls-stacked">
                                                        <div class="custom-control custom-radio">
                                                            <input id="radioStacked1"
                                                                   name="radio_stacked"
                                                                   type="radio"
                                                                   value="parcel"
                                                                   class="custom-control-input"
                                                                   @if(old('radio_stacked') == 'parcel' && old('radio_stacked') != null) checked="checked" @else checked="checked" @endif>
                                                            <label for="radioStacked1"
                                                                   class="custom-control-label">{{ __('dashboard.Parcel') }}</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input id="radioStacked2"
                                                                   name="radio_stacked"
                                                                   type="radio"
                                                                   value="document"
                                                                   class="custom-control-input"
                                                                   @if(old('radio_stacked') == 'document') checked="checked" @endif>
                                                            <label for="radioStacked2"
                                                                   class="custom-control-label">{{ __('dashboard.Document') }}</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input id="radioStacked3"
                                                                   name="radio_stacked"
                                                                   type="radio"
                                                                   value="bulky"
                                                                   class="custom-control-input"
                                                                   @if(old('radio_stacked') == 'bulky') checked="checked" @endif>
                                                            <label for="radioStacked3"
                                                                   class="custom-control-label">{{ __('dashboard.Bulky') }}</label>
                                                        </div>
                                                    </div>
                                                    <small>{{ __('dashboard.Select the package type to ensure the right vehicle is selected for pickup') }}.</small>
                                                </div>
                                            </div>
                                            <div class="col-12 hidden" id="bulky_type">
                                                <div class="form-group">
                                                    <div class="custom-controls-stacked">
                                                        <div class="custom-control custom-radio">
                                                            <input id="light_bulky"
                                                                   name="light_bulky"
                                                                   type="radio"
                                                                   value="light bulky"
                                                                   class="custom-control-input"
                                                                   @if(old('light_bulky') == 'light bulky' && old('light_bulky') != null) checked="checked" @else checked="checked" @endif>
                                                            <label for="light_bulky"
                                                                   class="custom-control-label">Light Bulky</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input id="heavy_bulky"
                                                                   name="light_bulky"
                                                                   value="heavy bulky"
                                                                   type="radio"
                                                                   class="custom-control-input"
                                                                   @if(old('light_bulky') == 'heavy bulky') checked="checked" @endif>
                                                            <label for="heavy_bulky"
                                                                   class="custom-control-label">Heavy Bulky</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="package_description">{{ __('dashboard.Package Description') }}:</label> <small class="badge badge-secondary">{{ __('dashboard.optional') }}</small>
                                                    <textarea rows="3"
                                                              id="package_description"
                                                              name="package_description"
                                                              class="form-control @error('package_description') is-invalid @enderror"
                                                              placeholder="{{ __('dashboard.Product code - Color - Size') }}">{{ old('package_description') }}</textarea>
                                                    @error('package_description')
                                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                    @enderror
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="no_of_items">{{ __('dashboard.Number of Items') }}:</label>
                                                    <input type="number"
                                                           class="form-control @error('no_of_items') is-invalid @enderror"
                                                           value="{{ old('no_of_items') }}"
                                                           min="0"
                                                           step="1"
                                                           id="no_of_items"
                                                           name="no_of_items"
                                                           autocomplete="no_of_items"
                                                           placeholder="{{ __('dashboard.Number of Items') }} ..."
                                                           autofocus>
                                                    @error('no_of_items')
                                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                    @enderror
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <small>{{ __("dashboard.If your items don't fit in one flyer of any size, create multiple orders") }}</small>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="order_reference">{{ __('dashboard.Order Reference') }}:</label>
                                                    <input type="text"
                                                           class="form-control @error('order_reference') is-invalid @enderror"
                                                           value="{{ old('order_reference') }}"
                                                           id="order_reference"
                                                           name="order_reference"
                                                           autocomplete="order_reference"
                                                           placeholder="B-123456"
                                                           autofocus>
                                                    @error('order_reference')
                                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                    @enderror
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <small>{{ __('dashboard.Add a reference that you can later use to search for the order') }}</small>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3" id="allow_open_packages">
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox"
                                                               class="custom-control-input"
                                                               name="open_package"
                                                               id="customCheck1"
                                                            {{ old('open_package') ?? "checked='checked'" }}>
                                                        <label class="custom-control-label"
                                                               for="customCheck1">{{ __('dashboard.Allow customers to open packages ?') }}</label>
                                                        <small class="form-text text-muted">{{ __('dashboard.Allowing customers to open package allows them to refuse taking it. In this case Droplin will return it back to you. Return fees will be applied') }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane text-70  fade {{ old('type') == 'Exchange' ? 'show active':'' }}" id="exchange" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="row">
                                        <div class="col-lg-3 bg-light">
                                            <div class="page-separator">
                                                <div class="page-separator__text">{{ __('dashboard.Basic Details') }}</div>
                                            </div>
                                            <p class="card-subtitle text-70 mb-16pt mb-lg-0">{{ __('dashboard.Basic details of the customer') }}</p>
                                        </div>
                                        <div class="col-lg-9 row ">
                                            <div class="page-separator col-lg-12">
                                                <div class="page-separator__text" >
                                                    &nbsp; {{ __('dashboard.Customer Information') }}
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="custom-controls-stacked">
                                                        <div class="custom-control custom-radio">
                                                            <input id="with_cash_difference"
                                                                   name="with_cash_difference"
                                                                   type="radio"
                                                                   class="custom-control-input"
                                                                   value="with cash difference"
                                                                   @if(old('with_cash_difference') == 'with cash difference' && old('with_cash_difference') != null) checked="checked" @else checked="checked" @endif>
                                                            <label for="with_cash_difference"
                                                                   class="custom-control-label">{{ __('dashboard.With cash difference') }}</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input id="without_cash_difference"
                                                                   name="with_cash_difference"
                                                                   value="without cash difference"
                                                                   type="radio"
                                                                   class="custom-control-input"
                                                                   @if(old('with_cash_difference') == 'without cash difference') checked="checked" @endif>
                                                            <label for="without_cash_difference"
                                                                   class="custom-control-label">{{ __('dashboard.Without cash difference') }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="cash_exchange_amount">{{ __('dashboard.Cash Exchange Amount') }}:</label>
                                                    <input type="number"
                                                           class="form-control @error('cash_exchange_amount') is-invalid @enderror"
                                                           value="{{ old('cash_exchange_amount') }}"
                                                           min="0"
                                                           step="1"
                                                           id="cash_exchange_amount"
                                                           name="cash_exchange_amount"
                                                           autocomplete="cash_exchange_amount"
                                                           placeholder="{{ __('dashboard.Cash Exchange Amount') }}..."
                                                           autofocus>
                                                    @error('cash_exchange_amount')
                                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                    @enderror
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <small>{{ __('dashboard.Droplin courier shall pay/receive this amount to/from your customer upon pickup') }}</small>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="page-separator col-lg-12">
                                                <div class="page-separator__text" >
                                                    &nbsp; {{ __('dashboard.Delivery Package Details') }}
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="no_of_items">{{ __('dashboard.Number of Items') }}:</label>
                                                    <input type="number"
                                                           class="form-control @error('no_of_items_exchange') is-invalid @enderror"
                                                           value="{{ old('no_of_items_exchange',1) }}"
                                                           min="0"
                                                           step="1"
                                                           id="no_of_items_exchange"
                                                           name="no_of_items_exchange"
                                                           autocomplete="no_of_items_exchange"
                                                           placeholder="Number of Items ..."
                                                           autofocus>
                                                    @error('no_of_items_exchange')
                                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                    @enderror
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <small>{{ __("dashboard.If your items don't fit in one flyer of any size, create multiple orders") }}</small>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="package_description_exchange">{{ __('dashboard.Package Description') }}:</label> <small class="badge badge-secondary">{{ __('dashboard.optional') }}</small>
                                                    <textarea rows="3"
                                                              id="package_description_exchange"
                                                              name="package_description_exchange"
                                                              class="form-control @error('package_description_exchange') is-invalid @enderror"
                                                              placeholder="{{ __('dashboard.Product code - Color - Size') }}">{{ old('package_description_exchange') }}</textarea>
                                                    @error('package_description_exchange')
                                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                    @enderror
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="order_reference_exchange">{{ __('dashboard.Order Reference') }}:</label>
                                                    <input type="text"
                                                           class="form-control @error('order_reference_exchange') is-invalid @enderror"
                                                           value="{{ old('order_reference_exchange') }}"
                                                           id="order_reference_exchange"
                                                           name="order_reference_exchange"
                                                           autocomplete="order_reference_exchange"
                                                           placeholder="B-123456"
                                                           autofocus>
                                                    @error('order_reference_exchange')
                                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                    @enderror
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <small>{{ __('dashboard.Add a reference that you can later use to search for the order') }}</small>
                                                </div>
                                            </div>
                                            <div class="col-md-12  mb-3">
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox"
                                                               class="custom-control-input"
                                                               name="allow_opening"
                                                               id="customCheck1_allow"
                                                            {{ old('allow_opening') ?? 'checked="checked"' }}>
                                                        <label class="custom-control-label"
                                                               for="customCheck1_allow">{{ __('dashboard.Allow customers to open packages ?') }}</label>
                                                        <small class="form-text text-muted">{{ __('dashboard.Allowing customers to open package allows them to refuse taking it. In this case Droplin will return it back to you. Return fees will be applied') }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="page-separator col-lg-12">
                                                <div class="page-separator__text" >
                                                    &nbsp; {{ __('dashboard.Return Package Details') }}
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="no_of_items_of_return_package_exchange">{{ __('dashboard.Number of Items') }}:</label>
                                                    <input type="number"
                                                           class="form-control @error('no_of_items_of_return_package_exchange') is-invalid @enderror"
                                                           value="{{ old('no_of_items_of_return_package_exchange',1) }}"
                                                           min="0"
                                                           step="1"
                                                           id="no_of_items_of_return_package_exchange"
                                                           name="no_of_items_of_return_package_exchange"
                                                           autocomplete="no_of_items_of_return_package_exchange"
                                                           placeholder="{{ __('dashboard.Number of Items') }} ..."
                                                           autofocus>
                                                    @error('no_of_items_of_return_package_exchange')
                                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                    @enderror
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <small>{{ __("dashboard.If your items don't fit in one flyer of any size, create multiple orders") }}</small>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="package_description_return_package_exchange">{{ __('dashboard.Package Description') }}:</label> <small class="badge badge-secondary">{{ __('dashboard.optional') }}</small>
                                                    <textarea rows="3"
                                                              id="package_description_return_package_exchange"
                                                              name="package_description_return_package_exchange"
                                                              class="form-control @error('package_description_return_package_exchange') is-invalid @enderror"
                                                              placeholder="{{ __('dashboard.Product code - Color - Size') }}">{{ old('package_description_return_package') }}</textarea>
                                                    @error('package_description_return_package_exchange')
                                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                    @enderror
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 invert exchangelocation">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="return_location_exchange">{{ __('dashboard.Return Location') }}:</label>
                                                    <select id="return_location_exchange"
                                                            data-toggle="select"
                                                            name="return_location_exchange"
                                                            class="form-control select005 form-control-sm @error('return_location_exchange') is-invalid @enderror">
                                                        <option value="">{{ __('dashboard.Select location') }}</option>
                                                        @foreach($locations as $location)
                                                            <option value="{{ $location->id }}" {{ old('return_location_exchange') == $location->id ? 'selected':'' }}>{{ $location->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('return_location_exchange')
                                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                    @enderror
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <small>{{ __('dashboard.Select the location to which the package should be returned') }}</small>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 invert exchangelocation">
                                                <a href="#" class="text-dark" onclick="event.preventDefault();
                                                        display(module='exchangelocation')">+ {{ __('dashboard.Create new Location') }}</a>
                                            </div>
                                            <div class="col-12 hidden exchangelocations col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="country_id_exchange">{{ __('dashboard.Country') }}</label>
                                                    <select id="country_id_exchange"
                                                            data-toggle="select"
                                                            class="form-control select005 select05 form-control-sm @error('country_id_exchange') is-invalid @enderror"
                                                            name="country_id_exchange">
                                                        @foreach($countries as $country)
                                                            <option value="{{ $country->id }}" {{ $country->id == 64 ? 'selected':'' }} data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
                                                                {{ $country->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('country_id_exchange')
                                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                    @enderror
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                            </div>
                                            <div class="col-12 hidden exchangelocations col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="state_id_exchange">{{ __('dashboard.State') }}</label>
                                                    <select id="state_id_exchange"
                                                            data-toggle="select"
                                                            class="form-control select01 select005 form-control-sm @error('state_id_exchange') is-invalid @enderror"
                                                            name="state_id_exchange">
                                                        @foreach($states as $state)
                                                            <option value="{{ $state->id }}" {{ old('state_id_exchange') == $state->id ? 'selected':'' }} data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
                                                                {{ $state->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('state_id_exchange')
                                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                    @enderror
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                            </div>
                                            <div class="col-12 hidden exchangelocations col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="city_id_exchange">{{ __('dashboard.City') }}</label>
                                                    <select id="city_id_exchange"
                                                            data-toggle="select"
                                                            disabled
                                                            class="form-control select03 select005 form-control-sm @error('city_id_exchange') is-invalid @enderror"
                                                            name="city_id_exchange">
                                                    </select>
                                                    @error('city_id_exchange')
                                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                    @enderror
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                            </div>


                                            <div class="col-12 hidden exchangelocations col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="street_exchange">{{ __('dashboard.Street') }}:</label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="text"
                                                               class="form-control @error('street_exchange') is-invalid @enderror"
                                                               value="{{ old('street_exchange') }}"
                                                               autocomplete="street_exchange"
                                                               name="street_exchange"
                                                               id="street_exchange"
                                                               placeholder="{{ __('dashboard.Enter your street') }} .."
                                                               autofocus>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="material-icons">home_work</span>
                                                            </div>
                                                        </div>
                                                        @error('street_exchange')
                                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                        @enderror
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 hidden exchangelocations col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="building_exchange">{{ __('dashboard.Building') }}:</label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="text"
                                                               class="form-control @error('building_exchange') is-invalid @enderror"
                                                               value="{{ old('building_exchange') }}"
                                                               autocomplete="building_exchange"
                                                               name="building_exchange"
                                                               id="building_exchange"
                                                               placeholder="{{ __('dashboard.Enter your building') }} .."
                                                               autofocus>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="material-icons">home</span>
                                                            </div>
                                                        </div>
                                                        @error('building_exchange')
                                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                        @enderror
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-12 hidden exchangelocations col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="floor_exchange">{{ __('dashboard.Floor') }}:</label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="text"
                                                               class="form-control @error('floor_exchange') is-invalid @enderror"
                                                               value="{{ old('floor_exchange') }}"
                                                               autocomplete="floor_exchange"
                                                               name="floor_exchange"
                                                               id="floor_exchange"
                                                               placeholder="{{ __('dashboard.Enter your floor') }} .."
                                                               autofocus>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="material-icons">local_convenience_store</span>
                                                            </div>
                                                        </div>
                                                        @error('floor_exchange')
                                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                        @enderror
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 hidden exchangelocations col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="apartment_exchange">{{ __('dashboard.Apartment') }}:</label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="text"
                                                               class="form-control @error('apartment_exchange') is-invalid @enderror"
                                                               value="{{ old('apartment_exchange') }}"
                                                               autocomplete="apartment_exchange"
                                                               name="apartment_exchange"
                                                               id="apartment_exchange"
                                                               placeholder="{{ __('dashboard.Enter your apartment') }} .."
                                                               autofocus>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="material-icons">apartment</span>
                                                            </div>
                                                        </div>
                                                        @error('apartment_exchange')
                                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                        @enderror
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 hidden exchangelocations col-md-12 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="landmarks_exchange">{{ __('dashboard.Landmarks') }}:</label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="text"
                                                               class="form-control @error('landmarks_exchange') is-invalid @enderror"
                                                               value="{{ old('landmarks_exchange') }}"
                                                               autocomplete="landmarks_exchange"
                                                               name="landmarks_exchange"
                                                               id="landmarks_exchange"
                                                               placeholder="{{ __('dashboard.Enter your landmarks') }} .."
                                                               autofocus>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="material-icons">apartment</span>
                                                            </div>
                                                        </div>
                                                        @error('landmarks_exchange')
                                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                        @enderror
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 hidden exchangelocations  mb-3">
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox"
                                                               class="custom-control-input"
                                                               name="working_hours_exchange"
                                                               id="customCheck1_exchange"
                                                                {{ old('working_hours_exchange') ?? 'checked="checked"' }}>
                                                        <label class="custom-control-label"
                                                               for="customCheck1_exchange">{{ __('dashboard.This is a work address') }}</label>
                                                        <small class="form-text text-muted">{{ __('dashboard.Mark it to deliver it within business days and working hours') }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 hidden exchangelocations">
                                                <a href="#" class="text-dark" onclick="event.preventDefault();
                                                        displayInvert(module='exchangelocation')">- {{ __('dashboard.Select from existed locations') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane text-70  fade {{ old('type') == 'Return' ? 'show active':'' }}" id="return" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="row">
                                        <div class="col-lg-3 bg-light">
                                            <div class="page-separator">
                                                <div class="page-separator__text">{{ __('dashboard.Basic Details') }}</div>
                                            </div>
                                            <p class="card-subtitle text-70 mb-16pt mb-lg-0">{{ __('dashboard.Basic details of the customer') }}</p>
                                        </div>
                                        <div class="col-lg-9 row ">
                                            <div class="page-separator col-lg-12">
                                                <div class="page-separator__text" >
                                                    &nbsp; {{ __('dashboard.Customer Information') }}
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="refund_amount">{{ __('dashboard.Refund Amount') }} :</label>
                                                    <input type="number"
                                                           class="form-control @error('refund_amount') is-invalid @enderror"
                                                           value="{{ old('refund_amount') }}"
                                                           min="0"
                                                           step="1"
                                                           id="refund_amount"
                                                           name="refund_amount"
                                                           autocomplete="refund_amount"
                                                           placeholder="{{ __('dashboard.Refund Amount') }} ..."
                                                           autofocus>
                                                    @error('refund_amount')
                                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                    @enderror
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <small>{{ __('dashboard.Droplin courier shall pay this amount to your customer upon pickup') }}</small>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="custom-controls-stacked">
                                                        <div class="custom-control custom-radio">
                                                            <input id="with_refund"
                                                                   name="with_refund"
                                                                   type="radio"
                                                                   class="custom-control-input"
                                                                   value="with refund"
                                                                   @if(old('with_refund') == 'with refund' && old('with_refund') != null) checked="checked" @else checked="checked" @endif>
                                                            <label for="with_refund"
                                                                   class="custom-control-label">{{ __('dashboard.With refund') }}</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input id="without_refund"
                                                                   name="with_refund"
                                                                   type="radio"
                                                                   value="without refund"
                                                                   class="custom-control-input"
                                                                   @if(old('with_refund') == 'without refund') checked="checked" @endif>
                                                            <label for="without_refund"
                                                                   class="custom-control-label">{{ __('dashboard.Without refund') }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="page-separator col-lg-12">
                                                <div class="page-separator__text" >
                                                    &nbsp; {{ __('dashboard.Return Package Details') }}
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="no_of_items_return">{{ __('dashboard.Number of Items') }}:</label>
                                                    <input type="number"
                                                           class="form-control @error('no_of_items_return') is-invalid @enderror"
                                                           value="{{ old('no_of_items_return',1) }}"
                                                           min="0"
                                                           step="1"
                                                           id="no_of_items_return"
                                                           name="no_of_items_return"
                                                           autocomplete="no_of_items_return"
                                                           placeholder="{{ __('dashboard.Number of Items') }} ..."
                                                           autofocus>
                                                    @error('no_of_items_return')
                                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                    @enderror
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <small>{{ __("dashboard.If your items don't fit in one flyer of any size, create multiple orders") }}</small>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="package_description_return">{{ __('dashboard.Package Description') }}:</label> <small class="badge badge-secondary">{{ __('dashboard.optional') }}</small>
                                                    <textarea rows="3"
                                                              id="package_description_return"
                                                              name="package_description_return"
                                                              class="form-control @error('package_description_return') is-invalid @enderror"
                                                              placeholder="{{ __('dashboard.Product code - Color - Size') }}">{{ old('package_description_return') }}</textarea>
                                                    @error('package_description_return')
                                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                    @enderror
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="order_reference_return">{{ __('dashboard.Order Reference') }}:</label>
                                                    <input type="text"
                                                           class="form-control @error('order_reference_return') is-invalid @enderror"
                                                           value="{{ old('order_reference_return') }}"
                                                           id="order_reference_return"
                                                           name="order_reference_return"
                                                           autocomplete="order_reference_return"
                                                           placeholder="B-123456"
                                                           autofocus>
                                                    @error('order_reference_return')
                                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                    @enderror
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <small>{{ __('dashboard.Add a reference that you can later use to search for the order') }}</small>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 invert returnlocation">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="return_location">{{ __('dashboard.Return Location') }}:</label>
                                                    <select id="return_location"
                                                            data-toggle="select"
                                                            name="return_location"
                                                            class="form-control select005 form-control-sm @error('return_location') is-invalid @enderror">
                                                        <option value="">{{ __('dashboard.Select location') }}</option>
                                                        @foreach($locations as $location)
                                                            <option value="{{ $location->id }}" {{ old('return_location') == $location->id ? 'selected':'' }}>{{ $location->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('return_location')
                                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                    @enderror
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <small>{{ __('dashboard.Select the location to which the package should be returned') }}</small>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 invert returnlocation">
                                                <a href="#" class="text-dark" onclick="event.preventDefault();
                                                        display(module='returnlocation')">+ {{ __('dashboard.Create new Location') }}</a>
                                            </div>
                                            <div class="col-12 hidden returnlocations col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="country_id_return">{{ __('dashboard.Country') }}</label>
                                                    <select id="country_id_return"
                                                            data-toggle="select"
                                                            class="form-control select005 select05 form-control-sm @error('country_id_return') is-invalid @enderror"
                                                            name="country_id_return">
                                                        @foreach($countries as $country)
                                                            <option value="{{ $country->id }}" {{ $country->id == 64 ? 'selected':'' }} data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
                                                                {{ $country->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('country_id_return')
                                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                    @enderror
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                            </div>
                                            <div class="col-12 hidden returnlocations col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="state_id_return">{{ __('dashboard.State') }}</label>
                                                    <select id="state_id_return"
                                                            data-toggle="select"
                                                            class="form-control select005 select01 form-control-sm @error('state_id_return') is-invalid @enderror"
                                                            name="state_id_return">
                                                        @foreach($states as $state)
                                                            <option value="{{ $state->id }}" {{ old('state_id_return') == $state->id ? 'selected':'' }} data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
                                                                {{ $state->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('state_id_return')
                                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                    @enderror
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                            </div>
                                            <div class="col-12 hidden returnlocations col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="city_id_return">{{ __('dashboard.City') }}</label>
                                                    <select id="city_id_return"
                                                            data-toggle="select"
                                                            disabled
                                                            class="form-control select005 select03 form-control-sm @error('city_id_return') is-invalid @enderror"
                                                            name="city_id_return">
                                                    </select>
                                                    @error('city_id_return')
                                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                    @enderror
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                            </div>


                                            <div class="col-12 hidden returnlocations col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="street">{{ __('dashboard.Street') }}:</label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="text"
                                                               class="form-control @error('street_return') is-invalid @enderror"
                                                               value="{{ old('street_return') }}"
                                                               autocomplete="street_return"
                                                               name="street_return"
                                                               id="street_return"
                                                               placeholder="{{ __('dashboard.Enter your street') }} .."
                                                               autofocus>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="material-icons">home_work</span>
                                                            </div>
                                                        </div>
                                                        @error('street_return')
                                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                        @enderror
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 hidden returnlocations col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="building">{{ __('dashboard.Building') }}:</label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="text"
                                                               class="form-control @error('building_return') is-invalid @enderror"
                                                               value="{{ old('building_return') }}"
                                                               autocomplete="building_return"
                                                               name="building_return"
                                                               id="building_return"
                                                               placeholder="{{ __('dashboard.Enter your building') }} .."
                                                               autofocus>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="material-icons">home</span>
                                                            </div>
                                                        </div>
                                                        @error('building_return')
                                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                        @enderror
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-12 hidden returnlocations col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="floor">Floor:</label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="text"
                                                               class="form-control @error('floor_return') is-invalid @enderror"
                                                               value="{{ old('floor_return') }}"
                                                               autocomplete="floor_return"
                                                               name="floor_return"
                                                               id="floor_return"
                                                               placeholder="{{ __('dashboard.Enter your floor') }} .."
                                                               autofocus>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="material-icons">local_convenience_store</span>
                                                            </div>
                                                        </div>
                                                        @error('floor_return')
                                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                        @enderror
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 hidden returnlocations col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="apartment">{{ __('dashboard.Apartment') }}:</label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="text"
                                                               class="form-control @error('apartment_return') is-invalid @enderror"
                                                               value="{{ old('apartment_return') }}"
                                                               autocomplete="apartment_return"
                                                               name="apartment_return"
                                                               id="apartment_return"
                                                               placeholder="{{ __('dashboard.Enter your apartment') }} .."
                                                               autofocus>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="material-icons">apartment</span>
                                                            </div>
                                                        </div>
                                                        @error('apartment_return')
                                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                        @enderror
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 hidden returnlocations col-md-12 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="landmarks">{{ __('dashboard.Landmarks') }}:</label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="text"
                                                               class="form-control @error('landmarks_return') is-invalid @enderror"
                                                               value="{{ old('landmarks_return') }}"
                                                               autocomplete="landmarks_return"
                                                               name="landmarks_return"
                                                               id="landmarks_return"
                                                               placeholder="{{ __('dashboard.Enter your landmarks') }} .."
                                                               autofocus>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="material-icons">apartment</span>
                                                            </div>
                                                        </div>
                                                        @error('landmarks_return')
                                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                        @enderror
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 hidden returnlocations  mb-3">
                                                <div class="form-group">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox"
                                                               class="custom-control-input"
                                                               name="working_hours_return"
                                                               id="customCheck1_return"
                                                            {{ old('working_hours_return' ?? 'checked="checked"') }}>
                                                        <label class="custom-control-label"
                                                               for="customCheck1_return">{{ __('dashboard.This is a work address') }}</label>
                                                        <small class="form-text text-muted">{{ __('dashboard.Mark it to deliver it within business days and working hours') }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 hidden returnlocations">
                                                <a href="#" class="text-dark" onclick="event.preventDefault();
                                                        displayInvert(module='returnlocation')">- {{ __('dashboard.Select from existed locations') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane text-70  fade {{ old('type') == 'Cash Collection' ? 'show active':'' }}" id="cash_collection" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div class="row">
                                        <div class="col-lg-3 bg-light">
                                            <div class="page-separator">
                                                <div class="page-separator__text">{{ __('dashboard.Basic Details') }}</div>
                                            </div>
                                            <p class="card-subtitle text-70 mb-16pt mb-lg-0">{{ __('dashboard.Basic details of the customer') }}</p>
                                        </div>
                                        <div class="col-lg-9 row ">
                                            <div class="page-separator col-lg-12">
                                                <div class="page-separator__text" >
                                                    &nbsp; {{ __('dashboard.Customer Information') }}
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="cash_to_collect">{{ __('dashboard.Cash to Collect') }}:</label>
                                                    <input type="number"
                                                           class="form-control @error('cash_to_collect') is-invalid @enderror"
                                                           value="{{ old('cash_to_collect') }}"
                                                           min="0"
                                                           step="1"
                                                           id="cash_to_collect"
                                                           name="cash_to_collect"
                                                           autocomplete="cash_to_collect"
                                                           placeholder="{{ __('dashboard.Cash to Collect') }} ..."
                                                           autofocus>
                                                    @error('cash_to_collect')
                                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                    @enderror
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <small id="collect_cash_small">{{ __('dashboard.Droplin courier shall receive this amount from your customer') }}</small>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="custom-controls-stacked">
                                                        <div class="custom-control custom-radio">
                                                            <input id="collect_cash"
                                                                   name="collect_cash"
                                                                   type="radio"
                                                                   class="custom-control-input"
                                                                   value="collect cash"
                                                                   @if(old('collect_cash') == 'collect cash' && old('collect_cash') != null) checked="checked" @else checked="checked" @endif>
                                                            <label for="collect_cash"
                                                                   class="custom-control-label">{{ __('dashboard.Collect cash from customer') }}</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input id="refund_cash"
                                                                   name="collect_cash"
                                                                   type="radio"
                                                                   value="refund cash"
                                                                   class="custom-control-input"
                                                                   @if(old('collect_cash') == 'refund cash') checked="checked" @endif>
                                                            <label for="refund_cash"
                                                                   class="custom-control-label">{{ __('dashboard.Refund cash to customer') }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="page-separator col-lg-12">
                                                <div class="page-separator__text" >
                                                    &nbsp; {{ __('dashboard.Return Package Details') }}
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="no_of_items">{{ __('dashboard.Order Reference') }}:</label>
                                                    <input type="text"
                                                           class="form-control @error('order_reference_cash_collection') is-invalid @enderror"
                                                           value="{{ old('order_reference_cash_collection') }}"
                                                           id="order_reference_cash_collection"
                                                           name="order_reference_cash_collection"
                                                           autocomplete="order_reference_cash_collection"
                                                           placeholder="B-123456"
                                                           autofocus>
                                                    @error('order_reference_cash_collection')
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
            </div>
            <div class="page-separator">
                <div class="page-separator__text" style="line-height: 30px;">
                    <button type="button" class="btn btn-sm rounded-circle btn-dark">
                        &nbsp;  2 &nbsp;
                    </button>
                    &nbsp; {{ __('dashboard.Customer Information') }}
                </div>
            </div>
            <div class="card">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-lg-3 bg-light">
                            <div class="page-separator">
                                <div class="page-separator__text">{{ __('dashboard.Basic Details') }}</div>
                            </div>
                            <p class="card-subtitle text-70 mb-16pt mb-lg-0">{{ __('dashboard.Basic details of the customer') }}</p>
                        </div>
                        <div class="col-lg-9 row ">
                            <div class="page-separator col-lg-12">
                                <div class="page-separator__text" >
                                    &nbsp; {{ __('dashboard.Customer Information') }}
                                </div>
                            </div>
                            <div class="col-lg-12 invert customer">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="client_id">{{ __('dashboard.Customer') }}:</label>
                                    <select id="client_id"
                                            data-toggle="select"
                                            name="client_id"
                                            class="form-control select005 form-control-sm @error('client_id') is-invalid @enderror">
                                        <option value="">{{ __('dashboard.Select customer') }}</option>
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected':'' }}>{{ $client->full_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('client_id')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-lg-12 invert customer mb-1">
                                <a href="#" class="text-dark" onclick="event.preventDefault();
                                                        display(module='customer')">+ {{ __('dashboard.Create new customer') }}</a>
                            </div>
                            <div class="col-lg-6 hidden customers">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="name">{{ __('dashboard.Name') }}:</label>
                                    <input type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}"
                                           id="name"
                                           name="name"
                                           autocomplete="name"
                                           placeholder="{{ __('dashboard.Your first name') }} ..."
                                           autofocus>
                                    @error('name')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-lg-6 hidden customers">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="email">{{ __('dashboard.Email address') }}:</label>
                                    <input type="email"
                                           id="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email') }}"
                                           name="email"
                                           autocomplete="email"
                                           placeholder="{{ __('dashboard.Your email address') }} ...">
                                    @error('email')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-lg-6 hidden customers">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="phone">{{ __('dashboard.Phone') }}:</label>
                                    <input type="tel"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           value="{{ old('phone') }}"
                                           id="phone"
                                           pattern="[0][1][1-5]{9}"
                                           name="phone"
                                           data-mask="00000000000"
                                           placeholder="{{ __('dashboard.Your mobile phone') }} ...">
                                    @error('phone')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-lg-6 hidden customers">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="secondary_phone">{{ __('dashboard.Secondary Phone') }}:</label>
                                    <input type="tel"
                                           class="form-control @error('secondary_phone') is-invalid @enderror"
                                           value="{{ old('secondary_phone') }}"
                                           id="secondary_phone"
                                           pattern="[0][1][1-5]{9}"
                                           name="secondary_phone"
                                           data-mask="00000000000"
                                           placeholder="{{ __('dashboard.Your secondary phone') }} ...">
                                    @error('secondary_phone')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-lg-12 hidden customers mb-1">
                                <a href="#" class="text-dark" onclick="event.preventDefault();
                                                        displayInvert(module='customer')">- {{ __('dashboard.Select from existed customers') }}</a>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="delivery_notes">{{ __('dashboard.Delivery Notes') }}:</label> <small class="badge badge-secondary">{{ __('dashboard.optional') }}</small>
                                    <textarea rows="3"
                                              id="delivery_notes"
                                              name="delivery_notes"
                                              class="form-control @error('delivery_notes') is-invalid @enderror"
                                              placeholder="{{ __('dashboard.Delivery Notes') }} ...">{{ old('delivery_notes') }}</textarea>
                                    @error('delivery_notes')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="page-separator col-lg-12">
                                <div class="page-separator__text" >
                                    &nbsp; {{ __('dashboard.Location Information') }}
                                </div>
                            </div>
                            <div class="col-lg-12 invert location">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="location_id">{{ __("dashboard.Customer's Locations") }}:</label>
                                    <select id="location_id"
                                            data-toggle="select"
                                            name="location_id"
                                            class="form-control select005 form-control-sm @error('location_id') is-invalid @enderror">
                                        <option value="">{{ __('dashboard.Select location') }}</option>
                                        @foreach($locations as $location)
                                            <option value="{{ $location->id }}" {{ old('location_id') == $location->id ? 'selected':'' }}>{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('location_id')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-lg-12 invert location">
                                <a href="#" class="text-dark" onclick="event.preventDefault();
                                                        display(module='location')">+ {{ __('dashboard.Create new Location') }}</a>
                            </div>
                            <div class="col-12 hidden locations col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="country_id">Country</label>
                                    <select id="country_id"
                                            data-toggle="select"
                                            class="form-control select005 select05 form-control-sm @error('country_id') is-invalid @enderror"
                                            name="country_id">
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}" data-closest-select="state_id" {{ $country->id == 64 ? 'selected':'' }} data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-12 hidden locations col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="state_id">{{ __('dashboard.State') }}</label>
                                    <select id="state_id"
                                            data-toggle="select"
                                            class="form-control select005 select01 form-control-sm @error('state_id') is-invalid @enderror"
                                            name="state_id">
                                        @foreach($states as $state)
                                            <option value="{{ $state->id }}" {{ old('state_id') == $state->id ? 'selected':'' }} data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
                                                {{ $state->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('state_id')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-12 hidden locations col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="city_id">{{ __('dashboard.City') }}</label>
                                    <select id="city_id"
                                            data-toggle="select"
                                            disabled
                                            class="form-control select005 select03 form-control-sm @error('city_id') is-invalid @enderror"
                                            name="city_id">
                                    </select>
                                    @error('city_id')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>


                            <div class="col-12 hidden locations col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="street">{{ __('dashboard.Street') }}:</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text"
                                               class="form-control @error('street') is-invalid @enderror"
                                               value="{{ old('street') }}"
                                               autocomplete="street"
                                               name="street"
                                               id="street"
                                               placeholder="{{ __('dashboard.Enter your street') }} .."
                                               autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="material-icons">home_work</span>
                                            </div>
                                        </div>
                                        @error('street')
                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 hidden locations col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="building">{{ __('dashboard.Building') }}:</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text"
                                               class="form-control @error('building') is-invalid @enderror"
                                               value="{{ old('building') }}"
                                               autocomplete="building"
                                               name="building"
                                               id="building"
                                               placeholder="{{ __('dashboard.Enter your building') }} .."
                                               autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="material-icons">home</span>
                                            </div>
                                        </div>
                                        @error('building')
                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 hidden locations col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="floor">{{ __('dashboard.Floor') }}:</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text"
                                               class="form-control @error('floor') is-invalid @enderror"
                                               value="{{ old('floor') }}"
                                               autocomplete="floor"
                                               name="floor"
                                               id="floor"
                                               placeholder="{{ __('dashboard.Enter your floor') }} .."
                                               autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="material-icons">local_convenience_store</span>
                                            </div>
                                        </div>
                                        @error('floor')
                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 hidden locations col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="apartment">{{ __('dashboard.Apartment') }}:</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text"
                                               class="form-control @error('apartment') is-invalid @enderror"
                                               value="{{ old('apartment') }}"
                                               autocomplete="apartment"
                                               name="apartment"
                                               id="apartment"
                                               placeholder="{{ __('dashboard.Enter your apartment') }} .."
                                               autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="material-icons">apartment</span>
                                            </div>
                                        </div>
                                        @error('apartment')
                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 hidden locations col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="landmarks">{{ __('dashboard.Landmarks') }}:</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text"
                                               class="form-control @error('landmarks') is-invalid @enderror"
                                               value="{{ old('landmarks') }}"
                                               autocomplete="landmarks"
                                               name="landmarks"
                                               id="landmarks"
                                               placeholder="{{ __('dashboard.Enter your landmarks') }} .."
                                               autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="material-icons">apartment</span>
                                            </div>
                                        </div>
                                        @error('landmarks')
                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 hidden locations  mb-3">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox"
                                               class="custom-control-input"
                                               name="working_hours"
                                               id="customCheck1_customer"
                                                {{ old('working_hours') ?? 'checked="checked"' }}>
                                        <label class="custom-control-label"
                                               for="customCheck1_customer">{{ __('dashboard.This is a work address') }}</label>
                                        <small class="form-text text-muted">{{ __('dashboard.Mark it to deliver it within business days and working hours') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 hidden locations">
                                <a href="#" class="text-dark" onclick="event.preventDefault();
                                                        displayInvert(module='location')">- {{ __('dashboard.Select from existed locations') }}</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="page-separator pickups_card {{ old('type') == 'Return' || old('type') == 'Cash Collection' ? 'hidden':'' }}">
                <div class="page-separator__text" style="line-height: 30px;">
                    <button type="button" class="btn btn-sm rounded-circle btn-dark">
                        &nbsp;  3 &nbsp;
                    </button>
                    &nbsp; {{ __('dashboard.Request Pickup') }} &nbsp; <small class="badge badge-secondary">{{ __('dashboard.optional') }}</small>
                </div>
            </div>
            <div class="card pickups_card {{ old('type') == 'Return' || old('type') == 'Cash Collection' ? 'hidden':'' }}">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-lg-3 bg-light">
                            <div class="page-separator">
                                <div class="page-separator__text">{{ __('dashboard.Request Pickup') }}</div>
                            </div>
                            <p class="card-subtitle text-70 mb-16pt mb-lg-0">{{ __('dashboard.You can skip requesting a pickup now but make sure to request a pickup when you have packages ready to be shipped') }}</p>
                        </div>
                        <div class="col-lg-9 row p-2">

                            <div class="col-lg-12 invert pickup">
                                <div class="form-group">
                                    <label class="form-label"
                                    for="pickup_id">{{ __('dashboard.Scheduled Pickups') }}:</label>
                                    <select id="pickup_id"
                                            data-toggle="select"
                                            name="pickup_id"
                                            class="form-control select005 form-control-sm @error('pickup_id') is-invalid @enderror">
                                        <option value="">{{ __('dashboard.Choose pickup') }}</option>
                                        @foreach($pickups as $pickup)
                                            <option value="{{ $pickup->id }}" {{ old('pickup_id') == $pickup->id ? 'selected':'' }}>{{ $pickup->pickup_id }}</option>
                                        @endforeach
                                    </select>
                                    @error('pickup_id')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-lg-12 invert pickup">
                                <a href="#" class="text-dark" onclick="event.preventDefault();
                                                        display(module='pickup')">+ {{ __('dashboard.New Pickup') }}</a>
                            </div>
                            <div class="col-md-12 hidden pickups">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="scheduled_date">{{ __('dashboard.Pickup Date') }}:</label>
                                    <input type="hidden"
                                           class="form-control @error('scheduled_date') is-invalid @enderror flatpickr-input"
                                           value="{{ old('scheduled_date') }}"
                                           id="scheduled_date"
                                           name="scheduled_date"
                                           data-toggle="flatpickr"
                                           placeholder="{{ __('dashboard.Pickup Date') }}...">
                                    @error('scheduled_date')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-lg-12 hidden pickups">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="contact_id">{{ __('dashboard.Contacts') }}:</label>
                                    <select id="contact_id"
                                            data-toggle="select"
                                            name="contact_id"
                                            class="form-control select005 form-control-sm @error('contact_id') is-invalid @enderror">
                                        <option value="">{{ __('dashboard.Select Contact') }}</option>
                                        @foreach($contacts as $contact)
                                            <option value="{{ $contact->id }}" {{ old('contact_id') == $contact->id ? 'selected':'' }}>{{ $contact->contact_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('contact_id')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="page-separator hidden pickups  col-lg-12">
                                <div class="page-separator__text" >
                                    &nbsp; {{ __('dashboard.Location Information') }}
                                </div>
                            </div>
                            <div class="col-lg-12 hidden pickups invert pickup-location ">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="pickup_location_id">{{ __('dashboard.Pickup Locations') }}:</label>
                                    <select id="pickup_location_id"
                                            data-toggle="select"
                                            name="pickup_location_id"
                                            class="form-control select005 form-control-sm @error('pickup_location_id') is-invalid @enderror">
                                        <option value="">{{ __('dashboard.Select location') }}</option>
                                        @foreach($locations as $location)
                                            <option value="{{ $location->id }}" {{ old('pickup_location_id') == $location->id ? 'selected':'' }}>{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('pickup_location_id')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-lg-12 hidden invert pickups pickup-location">
                                <a href="#" class="text-dark" onclick="event.preventDefault();
                                                    display(module='pickup-location')">+ {{ __('dashboard.Create new Location') }}</a>
                            </div>
                            <div class="col-12 hidden  pickup-locations col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="pickup_country_id">{{ __('dashboard.Country') }}</label>
                                    <select id="pickup_country_id"
                                            data-toggle="select"
                                            class="form-control select05 select005 form-control-sm @error('pickup_country_id') is-invalid @enderror"
                                            name="pickup_country_id">
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}" {{ $country->id == 64 ? 'selected':'' }} data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('pickup_country_id')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-12 hidden pickup-locations col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="pickup_state_id">{{ __('dashboard.State') }}</label>
                                    <select id="pickup_state_id"
                                            data-toggle="select"
                                            class="form-control select01 select005 form-control-sm @error('pickup_state_id') is-invalid @enderror"
                                            name="pickup_state_id">
                                        @foreach($states as $state)
                                            <option value="{{ $state->id }}" {{ old('pickup_state_id') == $state->id ? 'selected':'' }} data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
                                                {{ $state->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('pickup_state_id')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-12 hidden  pickup-locations col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="pickup_city_id">{{ __('dashboard.City') }}</label>
                                    <select id="pickup_city_id"
                                            data-toggle="select"
                                            disabled
                                            class="form-control select03 select005 form-control-sm @error('pickup_city_id') is-invalid @enderror"
                                            name="pickup_city_id">
                                    </select>
                                    @error('pickup_city_id')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>


                            <div class="col-12 hidden  pickup-locations col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="street">{{ __('dashboard.Street') }}:</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text"
                                               class="form-control @error('pickup_street') is-invalid @enderror"
                                               value="{{ old('pickup_street') }}"
                                               autocomplete="pickup_street"
                                               name="pickup_street"
                                               id="pickup_street"
                                               placeholder="{{ __('dashboard.Enter your street') }} .."
                                               autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="material-icons">home_work</span>
                                            </div>
                                        </div>
                                        @error('pickup_street')
                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 hidden  pickup-locations col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="pickup_building">{{ __('dashboard.Building') }}:</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text"
                                               class="form-control @error('pickup_building') is-invalid @enderror"
                                               value="{{ old('pickup_building') }}"
                                               autocomplete="pickup_building"
                                               name="pickup_building"
                                               id="pickup_building"
                                               placeholder="{{ __('dashboard.Enter your building') }} .."
                                               autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="material-icons">home</span>
                                            </div>
                                        </div>
                                        @error('pickup_building')
                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12 hidden  pickup-locations col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="pickup_floor">{{ __('dashboard.Floor') }}:</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text"
                                               class="form-control @error('pickup_floor') is-invalid @enderror"
                                               value="{{ old('pickup_floor') }}"
                                               autocomplete="pickup_floor"
                                               name="pickup_floor"
                                               id="pickup_floor"
                                               placeholder="{{ __('dashboard.Enter your floor') }} .."
                                               autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="material-icons">local_convenience_store</span>
                                            </div>
                                        </div>
                                        @error('pickup_floor')
                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 hidden  pickup-locations col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="pickup_apartment">{{ __('dashboard.Apartment') }}:</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text"
                                               class="form-control @error('pickup_apartment') is-invalid @enderror"
                                               value="{{ old('pickup_apartment') }}"
                                               autocomplete="pickup_apartment"
                                               name="pickup_apartment"
                                               id="pickup_apartment"
                                               placeholder="{{ __('dashboard.Enter your apartment') }} .."
                                               autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="material-icons">apartment</span>
                                            </div>
                                        </div>
                                        @error('pickup_apartment')
                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 hidden  pickup-locations col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="pickup_landmarks">{{ __('dashboard.Landmarks') }}:</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text"
                                               class="form-control @error('pickup_landmarks') is-invalid @enderror"
                                               value="{{ old('pickup_landmarks') }}"
                                               autocomplete="pickup_landmarks"
                                               name="pickup_landmarks"
                                               id="pickup_landmarks"
                                               placeholder="{{ __('dashboard.Enter your landmarks') }} .."
                                               autofocus>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="material-icons">apartment</span>
                                            </div>
                                        </div>
                                        @error('pickup_landmarks')
                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                        @enderror
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 hidden  pickup-locations mb-3">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox"
                                               class="custom-control-input"
                                               name="pickup_working_hours"
                                               id="pickup_working_hours"
                                            {{ old('pickup_working_hours') ?? 'checked="checked"' }}>
                                        <label class="custom-control-label"
                                               for="pickup_working_hours">{{ __('dashboard.This is a work address') }}</label>
                                        <small class="form-text text-muted">{{ __('dashboard.Mark it to deliver it within business days and working hours') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 hidden pickup-locations">
                                <a href="#" class="text-dark" onclick="event.preventDefault();
                                                    displayInvert(module='pickup-location')">- {{ __('dashboard.Select from existed locations') }}</a>
                            </div>
                            <div class="col-lg-12 hidden pickups">
                                <a href="#" class="text-dark" onclick="event.preventDefault();
                                                        displayInvert(module='pickup')">- {{ __('dashboard.Select from existed pickups') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="hidden_inputs">
                <input type="hidden" name="type" value="{{ old('type','Deliver') }}">
                @php $user = \App\Models\User::find(auth()->user()->id); @endphp
                <input type="hidden" name="customer_id" value="{{ $user->customer ? $user->customer->id:null }}">

                <input type="hidden" id="sweet_state" name="sweet_state">
                <input type="hidden" id="sweet_city" name="sweet_city">
                <input type="hidden" id="sweet_street" name="sweet_street">
                <input type="hidden" id="sweet_floor" name="sweet_floor">
                <input type="hidden" id="sweet_apartment" name="sweet_apartment">
                <input type="hidden" id="sweet_building" name="sweet_building">

                <input type="hidden" id="sweet_state_exchange" name="sweet_state_exchange">
                <input type="hidden" id="sweet_city_exchange" name="sweet_city_exchange">
                <input type="hidden" id="sweet_street_exchange" name="sweet_street_exchange">
                <input type="hidden" id="sweet_floor_exchange" name="sweet_floor_exchange">
                <input type="hidden" id="sweet_apartment_exchange" name="sweet_apartment_exchange">
                <input type="hidden" id="sweet_building_exchange" name="sweet_building_exchange">

                <input type="hidden" id="sweet_state_return" name="sweet_state_return">
                <input type="hidden" id="sweet_city_return" name="sweet_city_return">
                <input type="hidden" id="sweet_street_return" name="sweet_street_return">
                <input type="hidden" id="sweet_floor_return" name="sweet_floor_return">
                <input type="hidden" id="sweet_apartment_return" name="sweet_apartment_return">
                <input type="hidden" id="sweet_building_return" name="sweet_building_return">

                <input type="hidden" id="sweet_customer" name="sweet_customer">
                {{--<input type="hidden" name="location_in" value="full">
                <input type="hidden" name="contact_in" value="full">
                <input type="hidden" name="date_in" value="full">--}}
            </div>

            <button id="btn-confirm"
                    type="submit"
                    class="btn pull-right btn-primary">{{ __('dashboard.Submit') }}</button>

            {{--<a id="btn-confirm"
                class="btn btn-danger">
                Confirm
            </a>--}}
        </form>
    </div>

@endsection

@section('extra-scripts')
    @include('components.locations_ajax_order')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.17/sweetalert2.min.js"></script>


    <script>

        $(document).ready(function() {
            $("#scheduled_date").flatpickr({
                minDate: "today",
            });

            $('.select005').select2();

            $('#btn-confirm').on('click',function (e) {
                e.preventDefault();
                var type                                        = $("input[name='type']").val();

                /* Customer */
                var customer                                    = $('#client_id').val();
                var customer_div                                = '';

                var name                                        = $('#name').val();

                var location_id                                 = $('#location_id').val();
                var location_div                                = '';
                var country_id                                  = $('#country_id').val();
                var state_id                                    = $('#state_id').val();
                var city_id                                     = $('#city_id').val();
                var street                                      = $('#street').val();
                var building                                    = $('#building').val();
                var floor                                       = $('#floor').val();
                var apartment                                   = $('#apartment').val();
                var landmarks                                   = $('#landmarks').val();
                var working_hours                               = $("#customCheck1_customer").val();


                /* Cash Collection */
                var cash_to_collect                             = $("#cash_to_collect").val();

                /* Return */
                var refund_amount                               = $('#refund_amount').val();
                var no_of_items_return                          = $('#no_of_items_return').val();
                var return_location                             = $('#return_location').val();
                var return_location_div                         = '';

                var country_id_return                           = $('#country_id_return').val();
                var state_id_return                             = $('#state_id_return').val();
                var city_id_return                              = $('#city_id_return').val();
                var street_return                               = $('#street_return').val();
                var building_return                             = $('#building_return').val();
                var floor_return                                = $('#floor_return').val();
                var apartment_return                            = $('#apartment_return').val();
                var landmarks_return                            = $('#landmarks_return').val();
                var working_hours_return                        = $('#working_hours_return').val();

                /* Exchange */
                var cash_exchange_amount                        = $('#cash_exchange_amount').val();
                var no_of_items_exchange                        = $('#no_of_items_exchange').val();
                var no_of_items_of_return_package_exchange      = $('#no_of_items_of_return_package_exchange').val();
                var return_location_exchange                    = $('#return_location_exchange').val();
                var exchange_location_div                       = '';

                var country_id_exchange                         = $('#country_id_exchange').val();
                var state_id_exchange                           = $('#state_id_exchange').val();
                var city_id_exchange                            = $('#city_id_exchange').val();
                var street_exchange                             = $('#street_exchange').val();
                var building_exchange                           = $('#building_exchange').val();
                var floor_exchange                              = $('#floor_exchange').val();
                var apartment_exchange                          = $('#apartment_exchange').val();
                var landmarks_exchange                          = $('#landmarks_exchange').val();
                var working_hours_exchange                      = $('#working_hours_exchange').val();

                /* Deliver */
                var cash_on_delivery                            = $('#cash_on_delivery').val();
                var no_of_items                                 = $('#no_of_items').val();

                if(!location_id)
                {
                    state_id    = $('#sweet_state').val();
                    city_id     = $('#sweet_city').val();

                }else{
                    state_id    = $('#sweet_state').val();
                    city_id     = $('#sweet_city').val();
                    apartment   = $('#sweet_apartment').val();
                    floor       = $('#sweet_floor').val();
                    building    = $('#sweet_building').val();
                    street      = $('#sweet_street').val();

                }


                if(!customer)
                {
                    customer_div = name;
                }else{
                    customer_div = $('#sweet_customer').val();
                }


                var div = '';
                var order_name = '{{ $user->full_name }}';
                switch(type) {
                    case 'Deliver':

                        div = "<table class='container text-center border' style='text-align: center'>" +
                            "<tr class='border'> <td class='border'>Type</td> <td class='border'>"+type+"</td> </tr>" +
                            "<tr class='border'> <td class='border'>From:</td> <td class='border'>"+order_name+"</td> </tr>" +
                            "<tr class='border'> <td class='border'>To:</td> <td class='border'>"+customer_div+"</td> </tr>" +
                            "<tr class='border'> <td class='border'>State:</td> <td class='border'>"+state_id+"</td> </tr>" +
                            "<tr class='border'> <td class='border'>City:</td> <td class='border'>"+city_id+"</td> </tr>" +
                            "<tr class='border'> <td class='border'>Address:</td> <td class='border'>"+apartment+","+floor+","+building+","+street+"</td> </tr>" +
                            "<tr class='border'> <td class='border'>COD:</td> <td class='border'>"+cash_on_delivery+"</td> </tr>" +
                            "<tr class='border'> <td class='border'>No of items:</td> <td class='border'>"+no_of_items+"</td> </tr> " +
                            "</table>";
                        break;
                    case 'Exchange':

                        if(!return_location_exchange)
                        {
                            state_id_exchange   = $('#sweet_state_exchange').val();
                            city_id_exchange    = $('#sweet_city_exchange').val();
                        }else{
                            state_id_exchange   = $('#sweet_state_exchange').val();
                            city_id_exchange    = $('#sweet_city_exchange').val();
                            apartment_exchange  = $('#sweet_apartment_exchange').val();
                            floor_exchange      = $('#sweet_floor_exchange').val();
                            building_exchange   = $('#sweet_building_exchange').val();
                            street_exchange     = $('#sweet_street_exchange').val();
                        }

                        div = "<table class='container text-center border' style='text-align: center'>" +
                            "<tr class='border'> <td class='border'>Type</td> <td class='border'>"+type+"</td> </tr>" +
                            "<tr class='border'> <td class='border'>From:</td> <td class='border'>"+order_name+"</td> </tr>" +
                            "<tr class='border'> <td class='border'>To:</td> <td class='border'>"+customer_div+"</td> </tr>" +
                            "<tr class='border'> <td class='border'>State:</td> <td class='border'>"+state_id+"</td> </tr>" +
                            "<tr class='border'> <td class='border'>City:</td> <td class='border'>"+city_id+"</td> </tr>" +
                            "<tr class='border'> <td class='border'>Address:</td> <td class='border'>"+apartment+","+floor+","+building+","+street+"</td> </tr>" +
                            "<tr class='border'> <td class='border'>COD:</td> <td class='border'>"+cash_exchange_amount+"</td> </tr>" +
                            "<tr class='border'> <td class='border'>No of items:</td> <td class='border'>"+no_of_items_exchange+"</td> </tr> " +
                            "</table>";
                        break;
                    case 'Return':

                        if(!return_location)
                        {
                            state_id_return     = $('#sweet_state_return').val();
                            city_id_return      = $('#sweet_city_return').val();

                        }else{
                            state_id_return     = $('#sweet_state_return').val();
                            city_id_return      = $('#sweet_city_return').val();
                            apartment_return    = $('#sweet_apartment_return').val();
                            floor_return        = $('#sweet_floor_return').val();
                            building_return     = $('#sweet_building_return').val();
                            street_return       = $('#sweet_street_return').val();
                        }

                        div = "<table class='container text-center border' style='text-align: center'>" +
                            "<tr class='border'> <td class='border'>Type</td> <td class='border'>"+type+"</td> </tr>" +
                            "<tr class='border'> <td class='border'>From:</td> <td class='border'>"+order_name+"</td> </tr>" +
                            "<tr class='border'> <td class='border'>To:</td> <td class='border'>"+customer_div+"</td> </tr>" +
                            "<tr class='border'> <td class='border'>State:</td> <td class='border'>"+state_id+"</td> </tr>" +
                            "<tr class='border'> <td class='border'>City:</td> <td class='border'>"+city_id+"</td> </tr>" +
                            "<tr class='border'> <td class='border'>Address:</td> <td class='border'>"+apartment+","+floor+","+building+","+street+"</td> </tr>" +
                            "<tr class='border'> <td class='border'>COD:</td> <td class='border'>"+refund_amount+"</td> </tr>" +
                            "<tr class='border'> <td class='border'>No of items:</td> <td class='border'>"+no_of_items_return+"</td> </tr> " +
                            "</table>";
                        break;
                    case 'Cash Collection':

                        div = "<table class='container text-center border' style='text-align: center'>" +
                            "<tr class='border'> <td class='border'>Type</td> <td class='border'>"+type+"</td> </tr>" +
                            "<tr class='border'> <td class='border'>From:</td> <td class='border'>"+order_name+"</td> </tr>" +
                            "<tr class='border'> <td class='border'>To:</td> <td class='border'>"+customer_div+"</td> </tr>" +
                            "<tr class='border'> <td class='border'>State:</td> <td class='border'>"+state_id+"</td> </tr>" +
                            "<tr class='border'> <td class='border'>City:</td> <td class='border'>"+city_id+"</td> </tr>" +
                            "<tr class='border'> <td class='border'>Address:</td> <td class='border'>"+apartment+","+floor+","+building+","+street+"</td> </tr>" +
                            "<tr class='border'> <td class='border'>COD:</td> <td class='border'>"+cash_to_collect+"</td> </tr>" +
                            "<tr class='border'> <td class='border'>No of items:</td> <td class='border'>"+no_of_items_exchange+"</td> </tr> " +
                            "</table>";
                        break;
                    default:
                        div = "<table class='container text-center border' style='text-align: center'>" +
                            "<tr class='border'> <td class='border'>Type</td> <td class='border'>"+type+"</td> </tr>" +
                            "<tr class='border'> <td class='border'>From:</td> <td class='border'>Sameh</td> </tr>" +
                            "<tr class='border'> <td class='border'>To:</td> <td class='border'>Mohamed</td> </tr>" +
                            "<tr class='border'> <td class='border'>State:</td> <td class='border'>Cairo</td> </tr>" +
                            "<tr class='border'> <td class='border'>City:</td> <td class='border'>Ataba</td> </tr>" +
                            "<tr class='border'> <td class='border'>Address:</td> <td class='border'>12 mah st, jskdjahsd</td> </tr>" +
                            "<tr class='border'> <td class='border'>COD:</td> <td class='border'>145</td> </tr>" +
                            "<tr class='border'> <td class='border'>No of items:</td> <td class='border'>4</td> </tr> " +
                            "</table>";
                }
                if(!customer && !name)
                {
                    return false;
                }

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: "Order Details",
                    html: div,
                    imageUrl: '{{ asset('backend/images/paths/angular_430x168 copy.png') }}',
                    imageWidth: 430,
                    imageHeight: 168,
                    imageAlt: 'Custom image',
                    showCancelButton: true,
                    confirmButtonText: 'Confirm!',
                    cancelButtonText: 'Keep editing',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        swalWithBootstrapButtons.fire(
                            'Confirmed!',
                            'Your order has successfully submitted!".',
                            'success'
                        )
                        $('#order_form').submit();
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        //
                    }
                })

                $('.swal2-cancel').css('margin-right','1rem')

            })
        });

    </script>
@endsection
