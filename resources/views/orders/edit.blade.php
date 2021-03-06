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
        <form method="POST" action="{{ route('dashboard.orders.store') }}" enctype="multipart/form-data">
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
                                           aria-selected="{{ $order->type == 'Deliver' ? 'true':'false' }}"
                                           class="dashboard-area-tabs__tab card-body d-flex flex-row align-items-center justify-content-start {{ $order->type == 'Deliver' ? 'active':'' }}">
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
                                           aria-selected="{{ $order->type == 'Exchange' ? 'true':'false' }}"
                                           class="dashboard-area-tabs__tab card-body d-flex flex-row align-items-center justify-content-start {{ $order->type == 'Exchange' ? 'active':'' }}">
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
                                           aria-selected="{{ $order->type == 'Return' ? 'true':'false' }}"
                                           class="dashboard-area-tabs__tab card-body d-flex flex-row align-items-center justify-content-start {{ $order->type == 'Return' ? 'active':'' }}">
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
                                           aria-selected="{{ $order->type == 'Cash Collection' ? 'true':'false' }}"
                                           class="dashboard-area-tabs__tab card-body d-flex flex-row align-items-center justify-content-start {{ $order->type == 'Cash Collection' ? 'active':'' }}">
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
                                <div class="tab-pane text-70  fade {{ $order->type == 'Deliver' ? 'show active':'' }}" id="deliver" role="tabpanel" aria-labelledby="nav-home-tab">
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
                                                                {{ $order->with_cash_collection == 'with cash collection' ? 'checked="checked"':'' }}>
                                                            <label for="with_cash_collection"
                                                                   class="custom-control-label">{{ __('dashboard.With cash collection') }}</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input id="without_cash_collection"
                                                                   name="with_cash_collection"
                                                                   type="radio"
                                                                   value="without cash collection"
                                                                   class="custom-control-input"
                                                                {{ $order->with_cash_collection == 'without cash collection' ? 'checked="checked"':'' }}>
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
                                                           value="{{ old('cash_on_delivery',$order->cash_on_delivery) }}"
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
                                                                {{ $order->radio_stacked == 'parcel' ? 'checked="checked"':'' }}>
                                                            <label for="radioStacked1"
                                                                   class="custom-control-label">{{ __('dashboard.Parcel') }}</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input id="radioStacked2"
                                                                   name="radio_stacked"
                                                                   type="radio"
                                                                   value="document"
                                                                   class="custom-control-input"
                                                                {{ $order->radio_stacked == 'document' ? 'checked="checked"':'' }}>
                                                            <label for="radioStacked2"
                                                                   class="custom-control-label">{{ __('dashboard.Document') }}</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input id="radioStacked3"
                                                                   name="radio_stacked"
                                                                   type="radio"
                                                                   value="bulky"
                                                                   class="custom-control-input"
                                                                {{ $order->radio_stacked == 'bulky' ? 'checked="checked"':'' }}>
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
                                                                {{ $order->light_bulky == 'light bulky' ? 'checked="checked"':'' }}>
                                                            <label for="light_bulky"
                                                                   class="custom-control-label">Light Bulky</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input id="heavy_bulky"
                                                                   name="light_bulky"
                                                                   value="heavy bulky"
                                                                   type="radio"
                                                                   class="custom-control-input"
                                                                {{ $order->light_bulky == 'heavy bulky' ? 'checked="checked"':'' }}>
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
                                                              placeholder="{{ __('dashboard.Product code - Color - Size') }}">{{ old('package_description',$order->package_description) }}</textarea>
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
                                                           value="{{ old('no_of_items',$order->no_of_items) }}"
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
                                                           for="no_of_items">{{ __('dashboard.Order Reference') }}:</label>
                                                    <input type="text"
                                                           class="form-control @error('order_reference') is-invalid @enderror"
                                                           value="{{ old('order_reference',$order->order_reference) }}"
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
                                                            {{ $order->open_package  ? 'checked="checked"':'' }}>
                                                        <label class="custom-control-label"
                                                               for="customCheck1">{{ __('dashboard.Allow customers to open packages ?') }}</label>
                                                        <small class="form-text text-muted">{{ __('dashboard.Allowing customers to open package allows them to refuse taking it. In this case Bosta will return it back to you. Return fees will be applied') }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane text-70  fade {{ $order->type == 'Exchange' ? 'show active':'' }}" id="exchange" role="tabpanel" aria-labelledby="nav-home-tab">
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
                                                                   {{ $order->with_cash_difference == 'with cash difference' ? 'checked="checked"':'' }}>
                                                            <label for="with_cash_difference"
                                                                   class="custom-control-label">{{ __('dashboard.With cash difference') }}</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input id="without_cash_difference"
                                                                   name="with_cash_difference"
                                                                   value="without cash difference"
                                                                   type="radio"
                                                                   class="custom-control-input"
                                                                {{ $order->with_cash_difference == 'without cash difference' ? 'checked="checked"':'' }}>
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
                                                           value="{{ old('cash_exchange_amount',$order->cash_exchange_amount) }}"
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
                                                           value="{{ old('no_of_items_exchange',$order->no_of_items_exchange) }}"
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
                                                              placeholder="{{ __('dashboard.Product code - Color - Size') }}">{{ old('package_description_exchange',$order->package_description_exchange) }}</textarea>
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
                                                           value="{{ old('order_reference_exchange',$order->order_reference_exchange) }}"
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
                                                            {{ $order->allow_opening  ? 'checked="checked"':'' }}>
                                                        <label class="custom-control-label"
                                                               for="customCheck1_allow">{{ __('dashboard.Allow customers to open packages ?') }}</label>
                                                        <small class="form-text text-muted">{{ __('dashboard.Allowing customers to open package allows them to refuse taking it. In this case Bosta will return it back to you. Return fees will be applied') }}</small>
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
                                                           value="{{ old('no_of_items_of_return_package_exchange',$order->no_of_items_of_return_package_exchange) }}"
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
                                                              placeholder="{{ __('dashboard.Product code - Color - Size') }}">{{ old('package_description_return_package',$order->package_description_return_package_exchange) }}</textarea>
                                                    @error('package_description_return_package_exchange')
                                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                    @enderror
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 invert exchangelocation">
                                                <div class="form-group">
                                                    <label class="form-label"
                                                           for="select02">{{ __('dashboard.Return Location') }}:</label>
                                                    <select id="select02"
                                                            data-toggle="select"
                                                            name="return_location_exchange"
                                                            class="form-control select005 form-control-sm @error('return_location_exchange') is-invalid @enderror">
                                                        <option value="">{{ __('dashboard.Select location') }}</option>
                                                        @foreach($locations as $location)
                                                            <option value="{{ $location->id }}" {{ $order->return_location_exchange == $location->id ? 'selected':'' }}>{{ $location->name }}</option>
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
                                                           for="select05">{{ __('dashboard.Country') }}</label>
                                                    <select id="select05"
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
                                                           for="select01">{{ __('dashboard.State') }}</label>
                                                    <select id="select01"
                                                            data-toggle="select"
                                                            data-minimum-results-for-search="-1"
                                                            class="form-control select005 select01 form-control-sm @error('state_id_exchange') is-invalid @enderror"
                                                            name="state_id_exchange">
                                                        @foreach($states as $state)
                                                            <option value="{{ $state->id }}" {{ ($order->return_locations_exchange) ? $order->return_locations_exchange->state_id == $state->id ? 'selected':'':'' }} data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
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
                                                           for="select03">{{ __('dashboard.City') }}</label>
                                                    <select id="select03"
                                                            data-toggle="select"
                                                            disabled
                                                            data-minimum-results-for-search="-1"
                                                            class="form-control select005 select03 form-control-sm @error('city_id_exchange') is-invalid @enderror"
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
                                                               value="{{ ($order->return_locations_exchange) ? old('street_exchange',$order->return_locations_exchange->street):old('street_exchange') }}"
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
                                                               value="{{ ($order->return_locations_exchange) ? old('building_exchange',$order->return_locations_exchange->building):old('building_exchange') }}"
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
                                                               value="{{ ($order->return_locations_exchange) ? old('floor_exchange',$order->return_locations_exchange->floor):old('floor_exchange') }}"
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
                                                               value="{{ ($order->return_locations_exchange) ? old('apartment_exchange',$order->return_locations_exchange->apartment):old('apartment_exchange') }}"
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
                                                               value="{{ ($order->return_locations_exchange) ? old('landmarks_exchange',$order->return_locations_exchange->landmarks):old('landmarks_exchange') }}"
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
                                                            {{ ($order->return_locations_exchange) ? $order->return_locations_exchange->created_at ? 'checked="checked"':'':'' }}>
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
                                <div class="tab-pane text-70  fade {{ $order->type == 'Return' ? 'show active':'' }}" id="return" role="tabpanel" aria-labelledby="nav-home-tab">
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
                                                           value="{{ old('refund_amount',$order->refund_amount) }}"
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
                                                                   {{ $order->with_refund == 'with refund' ? 'checked="checked"':'' }}>
                                                            <label for="with_refund"
                                                                   class="custom-control-label">{{ __('dashboard.With refund') }}</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input id="without_refund"
                                                                   name="with_refund"
                                                                   type="radio"
                                                                   value="without refund"
                                                                   class="custom-control-input"
                                                                    {{ $order->with_refund == 'without refund' ? 'checked="checked"':'' }}>
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
                                                           value="{{ old('no_of_items_return',$order->no_of_items_return) }}"
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
                                                              placeholder="{{ __('dashboard.Product code - Color - Size') }}">{{ old('package_description_return',$order->package_description_return) }}</textarea>
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
                                                           value="{{ old('order_reference_return',$order->order_reference_return) }}"
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
                                                           for="select02">{{ __('dashboard.Return Location') }}:</label>
                                                    <select id="select02"
                                                            data-toggle="select"
                                                            name="return_location"
                                                            class="form-control select005 form-control-sm @error('return_location') is-invalid @enderror">
                                                        <option value="">{{ __('dashboard.Select location') }}</option>
                                                        @foreach($locations as $location)
                                                            <option value="{{ $location->id }}" {{ $order->return_location == $location->id ? 'selected':'' }}>{{ $location->name }}</option>
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
                                                           for="select05">{{ __('dashboard.Country') }}</label>
                                                    <select id="select05"
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
                                                           for="select01">{{ __('dashboard.State') }}</label>
                                                    <select id="select01"
                                                            data-toggle="select"
                                                            class="form-control select005 select01 form-control-sm @error('state_id_return') is-invalid @enderror"
                                                            name="state_id_return">
                                                        @foreach($states as $state)
                                                            <option value="{{ $state->id }}" {{ ($order->return_locations) ? $order->return_locations->state_id == $state->id ? 'selected':'':'' }} data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
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
                                                           for="select03">{{ __('dashboard.City') }}</label>
                                                    <select id="select03"
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
                                                               value="{{ ($order->return_locations) ? old('street_return',$order->return_locations->street):old('street_return') }}"
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
                                                               value="{{ ($order->return_locations) ? old('building_return',$order->return_locations->building):old('building_return') }}"
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
                                                               value="{{ ($order->return_locations) ? old('floor_return',$order->return_locations->floor):old('floor_return') }}"
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
                                                               value="{{ ($order->return_locations) ? old('apartment_return',$order->return_locations->apartment):old('apartment_return') }}"
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
                                                               value="{{ ($order->return_locations) ? old('landmarks_return',$order->return_locations->landmarks):old('landmarks_return') }}"
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
                                                            {{ ($order->return_locations) ? $order->return_locations->created_at ? 'checked="checked"':'':'' }}>
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
                                <div class="tab-pane text-70  fade {{ $order->type == 'Cash Collection' ? 'show active':'' }}" id="cash_collection" role="tabpanel" aria-labelledby="nav-home-tab">
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
                                                           value="{{ old('cash_to_collect',$order->cash_to_collect) }}"
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
                                                                   {{ $order->collect_cash == 'collect cash' ? 'checked=""':'' }}>
                                                            <label for="collect_cash"
                                                                   class="custom-control-label">{{ __('dashboard.Collect cash from customer') }}</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input id="refund_cash"
                                                                   name="collect_cash"
                                                                   type="radio"
                                                                   value="refund cash"
                                                                   class="custom-control-input"
                                                                {{ $order->collect_cash == 'refund cash' ? 'checked=""':'' }}>
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
                                                           value="{{ old('order_reference_cash_collection',$order->order_reference_cash_collection) }}"
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
                                           for="select04">{{ __('dashboard.Customer') }}:</label>
                                    <select id="select04"
                                            data-toggle="select"
                                            name="customer_id"
                                            class="form-control select005 form-control-sm @error('customer_id') is-invalid @enderror">
                                        <option value="">{{ __('dashboard.Select customer') }}</option>
                                        @foreach($customers as $customer)
                                            <option value="{{ $customer->id }}" {{ $order->customer_id == $customer->id ? 'selected':'' }}>{{ $customer->user->full_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('customer_id')
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
                                           value="{{ old('customer_id') ? old('customer_id'): $order->customer->user->full_name }}"
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
                                           value="{{ old('email') ? old('email'): $order->customer->user->email }}"
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
                                    <input type="text"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           value="{{ old('phone') ? old('phone'): $order->customer->user->phone }}"
                                           id="phone"
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
                                    <input type="text"
                                           class="form-control @error('secondary_phone') is-invalid @enderror"
                                           value="{{ old('secondary_phone') ? old('secondary_phone'): $order->customer->user->other_phone }}"
                                           id="secondary_phone"
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
                                              placeholder="{{ __('dashboard.Delivery Notes') }} ...">{{ old('delivery_notes') ? old('delivery_notes'): $order->delivery_notes }}</textarea>
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
                                           for="select02">{{ __("dashboard.Customer's Locations") }}:</label>
                                    <select id="select02"
                                            data-toggle="select"
                                            name="location_id"
                                            class="form-control select005 form-control-sm @error('location_id') is-invalid @enderror">
                                        <option value="">{{ __('dashboard.Select location') }}</option>
                                        @foreach($locations as $location)
                                            <option value="{{ $location->id }}" {{ $order->location_id == $location->id ? 'selected':'' }}>{{ $location->name }}</option>
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
                                           for="select05">Country</label>
                                    <select id="select05"
                                            data-toggle="select"
                                            class="form-control select005 select05 form-control-sm @error('country_id') is-invalid @enderror"
                                            name="country_id">
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}" {{ $country->id == 64 ? 'selected':'' }} data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
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
                                           for="select01">{{ __('dashboard.State') }}</label>
                                    <select id="select01"
                                            data-toggle="select"
                                            class="form-control select005 select01 form-control-sm @error('state_id') is-invalid @enderror"
                                            name="state_id">
                                        @foreach($states as $state)
                                            <option value="{{ $state->id }}" {{ $order->location->state_id == $state->id ? 'selected':'' }} data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
                                                {{ $state->name }}
                                            </option>
                                        @endforeach
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
                                           for="select03">{{ __('dashboard.City') }}</label>
                                    <select id="select03"
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
                                               value="{{ old('street',$order->location->street) }}"
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
                                               value="{{ old('building',$order->location->building) }}"
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
                                               value="{{ old('floor',$order->location->floor) }}"
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
                                               value="{{ old('apartment',$order->location->apartment) }}"
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
                                               value="{{ old('landmarks',$order->location->landmarks) }}"
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
                                               {{ $order->location->working_hours ? 'checked="checked"':'' }}
                                               id="customCheck1_customer">
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
            <div class="page-separator pickups_card">
                <div class="page-separator__text" style="line-height: 30px;">
                    <button type="button" class="btn btn-sm rounded-circle btn-dark">
                        &nbsp;  3 &nbsp;
                    </button>
                    &nbsp; {{ __('dashboard.Request Pickup') }} &nbsp; <small class="badge badge-secondary">{{ __('dashboard.optional') }}</small>
                </div>
            </div>
            <div class="card pickups_card">
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
                                           for="select06">{{ __('dashboard.Scheduled Pickups') }}:</label>
                                    <select id="select06"
                                            data-toggle="select"
                                            name="pickup_id"
                                            class="form-control select005 form-control-sm @error('pickup_id') is-invalid @enderror">
                                        <option value="">Choose pickup</option>
                                        @foreach($pickups as $pickup)
                                            <option value="{{ $pickup->id }}" {{ $order->pickup_id == $pickup->id ? 'selected':'' }}>{{ $pickup->pickup_id }}</option>
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
                                           value="{{ $order->pickup ? old('scheduled_date',$order->pickup->scheduled_date):old('scheduled_date') }}"
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
                                           for="select06">{{ __('dashboard.Contacts') }}:</label>
                                    <select id="select06"
                                            data-toggle="select"
                                            name="contact_id"
                                            class="form-control select005 form-control-sm @error('contact_id') is-invalid @enderror">
                                        <option value="">{{ __('dashboard.Select Contact') }}</option>
                                        @foreach($contacts as $contact)
                                            <option value="{{ $contact->id }}" {{ ($order->pickup) ? $order->pickup->contact_id == $contact->id ? 'selected':'':'' }}>{{ $contact->contact_name }}</option>
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
                            <div class="col-lg-12 hidden pickups invert pickup-location">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="select02">{{ __('dashboard.Pickup Locations') }}:</label>
                                    <select id="select02"
                                            data-toggle="select"
                                            name="pickup_location_id"
                                            class="form-control select005 form-control-sm @error('pickup_location_id') is-invalid @enderror">
                                        <option value="">{{ __('dashboard.Select location') }}</option>
                                        @foreach($locations as $location)
                                            <option value="{{ $location->id }}" {{ ($order->pickup) ? $order->pickup_location_id == $location->id ? 'selected':'':'' }}>{{ $location->name }}</option>
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
                <input type="hidden" name="type" value="{{ $order->type }}">
                {{--<input type="hidden" name="location_in" value="full">
                <input type="hidden" name="contact_in" value="full">
                <input type="hidden" name="date_in" value="full">--}}
            </div>

            <button type="submit"
                    class="btn pull-right btn-primary">{{ __('dashboard.Submit') }}</button>
        </form>
    </div>
@endsection

@section('extra-scripts')
    @include('components.locations_ajax_order')

    <script>
        $(document).ready(function() {
            $("#scheduled_date").flatpickr({
                minDate: "today",
            });
            $('.select005').select2();
        });
    </script>
@endsection
