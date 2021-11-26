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
                                       data-info="Deliver"
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
                                       data-info="Exchange"
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
                                       data-info="Return"
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
                                       data-info="Cash Collection"
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
                            <div class="tab-pane text-70  fade show active" id="deliver" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="row">
                                    <div class="col-lg-3 bg-light">
                                        <div class="page-separator">
                                            <div class="page-separator__text">Basic Details</div>
                                        </div>
                                        <p class="card-subtitle text-70 mb-16pt mb-lg-0">Basic details of the customer.</p>
                                    </div>
                                    <div class="col-lg-9 row ">
                                        <div class="page-separator col-lg-12">
                                            <div class="page-separator__text" >
                                                &nbsp; Customer Information
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
                                                               checked="">
                                                        <label for="with_cash_collection"
                                                               class="custom-control-label">With cash collection</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input id="without_cash_collection"
                                                               name="with_cash_collection"
                                                               type="radio"
                                                               value="without cash collection"
                                                               class="custom-control-input">
                                                        <label for="without_cash_collection"
                                                               class="custom-control-label">Without cash collection</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="cash_on_delivery">Cash on Delivery:</label>
                                                <input type="number"
                                                       class="form-control @error('cash_on_delivery') is-invalid @enderror"
                                                       value=""
                                                       min="0"
                                                       step="0.01"
                                                       id="cash_on_delivery"
                                                       name="cash_on_delivery"
                                                       autocomplete="cash_on_delivery"
                                                       placeholder="Cash on Delivery ..."
                                                       autofocus>
                                                @error('cash_on_delivery')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                @enderror
                                                <div class="valid-feedback">Looks good!</div>
                                                <small>Your customer shall pay this amount to courier upon delivery.</small>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="page-separator col-lg-12">
                                            <div class="page-separator__text" >
                                                &nbsp; Package Details
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="custom-controls-stacked">
                                                    <div class="custom-control custom-radio">
                                                        <input id="radioStacked1"
                                                               name="radio-stacked"
                                                               type="radio"
                                                               value="parcel"
                                                               class="custom-control-input"
                                                               checked="">
                                                        <label for="radioStacked1"
                                                               class="custom-control-label">Parcel</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input id="radioStacked2"
                                                               name="radio-stacked"
                                                               type="radio"
                                                               value="document"
                                                               class="custom-control-input">
                                                        <label for="radioStacked2"
                                                               class="custom-control-label">Document</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input id="radioStacked3"
                                                               name="radio-stacked"
                                                               type="radio"
                                                               value="bulky"
                                                               class="custom-control-input">
                                                        <label for="radioStacked3"
                                                               class="custom-control-label">Bulky</label>
                                                    </div>
                                                </div>
                                                <small>Select the package type to ensure the right vehicle is selected for pickup.</small>
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
                                                               checked="">
                                                        <label for="light_bulky"
                                                               class="custom-control-label">Light Bulky</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input id="heavy_bulky"
                                                               name="light_bulky"
                                                               value="heavy bulky"
                                                               type="radio"
                                                               class="custom-control-input">
                                                        <label for="heavy_bulky"
                                                               class="custom-control-label">Heavy Bulky</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="package_description">Package Description:</label> <small class="badge badge-secondary">optional</small>
                                                <textarea rows="3"
                                                          id="package_description"
                                                          name="package_description"
                                                          class="form-control @error('package_description') is-invalid @enderror"
                                                          placeholder="Product code - Color - Size">{{ old('package_description') }}</textarea>
                                                @error('package_description')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                @enderror
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="no_of_items">Number of Items:</label>
                                                <input type="number"
                                                       class="form-control @error('no_of_items') is-invalid @enderror"
                                                       value=""
                                                       min="0"
                                                       step="1"
                                                       id="no_of_items"
                                                       name="no_of_items"
                                                       autocomplete="no_of_items"
                                                       placeholder="Number of Items ..."
                                                       autofocus>
                                                @error('no_of_items')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                @enderror
                                                <div class="valid-feedback">Looks good!</div>
                                                <small>If your items don't fit in one flyer of any size, create multiple orders.</small>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="no_of_items">Order Reference:</label>
                                                <input type="text"
                                                       class="form-control @error('order_reference') is-invalid @enderror"
                                                       value=""
                                                       id="order_reference"
                                                       name="order_reference"
                                                       autocomplete="order_reference"
                                                       placeholder="B-123456"
                                                       autofocus>
                                                @error('order_reference')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                @enderror
                                                <div class="valid-feedback">Looks good!</div>
                                                <small>Add a reference that you can later use to search for the order.</small>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-3" id="allow_open_packages">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox"
                                                           class="custom-control-input"
                                                           name="working_hours"
                                                           id="customCheck1">
                                                    <label class="custom-control-label"
                                                           for="customCheck1">Allow customers to open packages ?</label>
                                                    <small class="form-text text-muted">Allowing customers to open package allows them to refuse taking it. In this case Bosta will return it back to you. Return fees will be applied.</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane text-70  fade " id="exchange" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="row">
                                    <div class="col-lg-3 bg-light">
                                        <div class="page-separator">
                                            <div class="page-separator__text">Basic Details</div>
                                        </div>
                                        <p class="card-subtitle text-70 mb-16pt mb-lg-0">Basic details of the customer.</p>
                                    </div>
                                    <div class="col-lg-9 row ">
                                        <div class="page-separator col-lg-12">
                                            <div class="page-separator__text" >
                                                &nbsp; Customer Information
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
                                                               checked="">
                                                        <label for="with_cash_difference"
                                                               class="custom-control-label">With cash difference</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input id="without_cash_difference"
                                                               name="with_cash_difference"
                                                               value="without cash difference"
                                                               type="radio"
                                                               class="custom-control-input">
                                                        <label for="without_cash_difference"
                                                               class="custom-control-label">Without cash difference</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="cash_exchange_amount">Cash Exchange Amount:</label>
                                                <input type="number"
                                                       class="form-control @error('cash_exchange_amount') is-invalid @enderror"
                                                       value=""
                                                       min="0"
                                                       step="0.01"
                                                       id="cash_exchange_amount"
                                                       name="cash_exchange_amount"
                                                       autocomplete="cash_exchange_amount"
                                                       placeholder="Cash Exchange Amount..."
                                                       autofocus>
                                                @error('cash_exchange_amount')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                @enderror
                                                <div class="valid-feedback">Looks good!</div>
                                                <small>Droplin courier shall pay/receive this amount to/from your customer upon pickup.</small>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="page-separator col-lg-12">
                                            <div class="page-separator__text" >
                                                &nbsp; Delivery Package Details
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="no_of_items">Number of Items:</label>
                                                <input type="number"
                                                       class="form-control @error('no_of_items') is-invalid @enderror"
                                                       value="1"
                                                       min="0"
                                                       step="1"
                                                       id="no_of_items"
                                                       name="no_of_items"
                                                       autocomplete="no_of_items"
                                                       placeholder="Number of Items ..."
                                                       autofocus>
                                                @error('no_of_items')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                @enderror
                                                <div class="valid-feedback">Looks good!</div>
                                                <small>If your items don't fit in one flyer of any size, create multiple orders.</small>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="package_description">Package Description:</label> <small class="badge badge-secondary">optional</small>
                                                <textarea rows="3"
                                                          id="package_description"
                                                          name="package_description"
                                                          class="form-control @error('package_description') is-invalid @enderror"
                                                          placeholder="Product code - Color - Size">{{ old('package_description') }}</textarea>
                                                @error('package_description')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                @enderror
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="no_of_items">Order Reference:</label>
                                                <input type="text"
                                                       class="form-control @error('order_reference') is-invalid @enderror"
                                                       value=""
                                                       id="order_reference"
                                                       name="order_reference"
                                                       autocomplete="order_reference"
                                                       placeholder="B-123456"
                                                       autofocus>
                                                @error('order_reference')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                @enderror
                                                <div class="valid-feedback">Looks good!</div>
                                                <small>Add a reference that you can later use to search for the order.</small>
                                            </div>
                                        </div>
                                        <div class="col-md-12  mb-3">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox"
                                                           class="custom-control-input"
                                                           name="working_hours"
                                                           id="customCheck1">
                                                    <label class="custom-control-label"
                                                           for="customCheck1">Allow customers to open packages ?</label>
                                                    <small class="form-text text-muted">Allowing customers to open package allows them to refuse taking it. In this case Bosta will return it back to you. Return fees will be applied.</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="page-separator col-lg-12">
                                            <div class="page-separator__text" >
                                                &nbsp; Return Package Details
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="no_of_items">Number of Items:</label>
                                                <input type="number"
                                                       class="form-control @error('no_of_items') is-invalid @enderror"
                                                       value="1"
                                                       min="0"
                                                       step="1"
                                                       id="no_of_items"
                                                       name="no_of_items"
                                                       autocomplete="no_of_items"
                                                       placeholder="Number of Items ..."
                                                       autofocus>
                                                @error('no_of_items')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                @enderror
                                                <div class="valid-feedback">Looks good!</div>
                                                <small>If your items don't fit in one flyer of any size, create multiple orders.</small>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="package_description">Package Description:</label> <small class="badge badge-secondary">optional</small>
                                                <textarea rows="3"
                                                          id="package_description"
                                                          name="package_description"
                                                          class="form-control @error('package_description') is-invalid @enderror"
                                                          placeholder="Product code - Color - Size">{{ old('package_description') }}</textarea>
                                                @error('package_description')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                @enderror
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 invert exchangelocation">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="select02">Return Location:</label>
                                                <select id="select02"
                                                        data-toggle="select"
                                                        name="return_location"
                                                        class="form-control form-control-sm @error('return_location') is-invalid @enderror">
                                                    <option value="">Select location</option>
                                                    @foreach($locations as $location)
                                                        <option value="{{ $location->id }}" {{ old('return_location') == $location->id ? 'selected':'' }}>{{ $location->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('return_location')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                @enderror
                                                <div class="valid-feedback">Looks good!</div>
                                                <small>Select the location to which the package should be returned.</small>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 invert exchangelocation">
                                            <a href="#" class="text-dark" onclick="event.preventDefault();
                                                    display(module='exchangelocation')">+ Create new Location</a>
                                        </div>
                                        <div class="col-12 hidden exchangelocations col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="select05">Country</label>
                                                <select id="select05"
                                                        data-toggle="select"
                                                        class="form-control form-control-sm @error('country_id') is-invalid @enderror"
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
                                        <div class="col-12 hidden exchangelocations col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="select01">State</label>
                                                <select id="select01"
                                                        data-toggle="select"
                                                        data-minimum-results-for-search="-1"
                                                        class="form-control form-control-sm @error('state_id') is-invalid @enderror"
                                                        name="state_id">
                                                    @foreach($states as $state)
                                                        <option value="{{ $state->id }}" {{ old('state_id') == $state->id ? 'selected':'' }} data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
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
                                        <div class="col-12 hidden exchangelocations col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="select03">City</label>
                                                <select id="select03"
                                                        data-toggle="select"
                                                        disabled
                                                        data-minimum-results-for-search="-1"
                                                        class="form-control form-control-sm @error('city_id') is-invalid @enderror"
                                                        name="city_id">
                                                </select>
                                                @error('city_id')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                @enderror
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                        </div>


                                        <div class="col-12 hidden exchangelocations col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="street">Street:</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="text"
                                                           class="form-control @error('street') is-invalid @enderror"
                                                           value="{{ old('street') }}"
                                                           autocomplete="street"
                                                           name="street"
                                                           id="street"
                                                           placeholder="Enter your street .."
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
                                        <div class="col-12 hidden exchangelocations col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="building">Building:</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="text"
                                                           class="form-control @error('building') is-invalid @enderror"
                                                           value="{{ old('building') }}"
                                                           autocomplete="building"
                                                           name="building"
                                                           id="building"
                                                           placeholder="Enter your building .."
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


                                        <div class="col-12 hidden exchangelocations col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="floor">Floor:</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="text"
                                                           class="form-control @error('floor') is-invalid @enderror"
                                                           value="{{ old('floor') }}"
                                                           autocomplete="floor"
                                                           name="floor"
                                                           id="floor"
                                                           placeholder="Enter your floor .."
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
                                        <div class="col-12 hidden exchangelocations col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="apartment">Apartment:</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="text"
                                                           class="form-control @error('apartment') is-invalid @enderror"
                                                           value="{{ old('apartment') }}"
                                                           autocomplete="apartment"
                                                           name="apartment"
                                                           id="apartment"
                                                           placeholder="Enter your apartment .."
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
                                        <div class="col-12 hidden exchangelocations col-md-12 mb-3">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="landmarks">Landmarks:</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="text"
                                                           class="form-control @error('landmarks') is-invalid @enderror"
                                                           value="{{ old('landmarks') }}"
                                                           autocomplete="landmarks"
                                                           name="landmarks"
                                                           id="landmarks"
                                                           placeholder="Enter your landmarks .."
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
                                        <div class="col-md-12 hidden exchangelocations  mb-3">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox"
                                                           class="custom-control-input"
                                                           name="working_hours"
                                                           id="customCheck1">
                                                    <label class="custom-control-label"
                                                           for="customCheck1">This is a work address</label>
                                                    <small class="form-text text-muted">Mark it to deliver it within business days and working hours.</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 hidden exchangelocations">
                                            <a href="#" class="text-dark" onclick="event.preventDefault();
                                                    displayInvert(module='exchangelocation')">- Select from existed locations</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane text-70  fade " id="return" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="row">
                                    <div class="col-lg-3 bg-light">
                                        <div class="page-separator">
                                            <div class="page-separator__text">Basic Details</div>
                                        </div>
                                        <p class="card-subtitle text-70 mb-16pt mb-lg-0">Basic details of the customer.</p>
                                    </div>
                                    <div class="col-lg-9 row ">
                                        <div class="page-separator col-lg-12">
                                            <div class="page-separator__text" >
                                                &nbsp; Customer Information
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="refund_amount">Refund Amount :</label>
                                                <input type="number"
                                                       class="form-control @error('refund_amount') is-invalid @enderror"
                                                       value=""
                                                       min="0"
                                                       step="0.01"
                                                       id="refund_amount"
                                                       name="refund_amount"
                                                       autocomplete="refund_amount"
                                                       placeholder="Refund amount ..."
                                                       autofocus>
                                                @error('refund_amount')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                @enderror
                                                <div class="valid-feedback">Looks good!</div>
                                                <small>Droplin courier shall pay this amount to your customer upon pickup.</small>
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
                                                               checked="">
                                                        <label for="with_refund"
                                                               class="custom-control-label">With refund</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input id="without_refund"
                                                               name="with_refund"
                                                               type="radio"
                                                               value="without refund"
                                                               class="custom-control-input">
                                                        <label for="without_refund"
                                                               class="custom-control-label">Without refund</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="page-separator col-lg-12">
                                            <div class="page-separator__text" >
                                                &nbsp; Return Package Details
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="no_of_items">Number of Items:</label>
                                                <input type="number"
                                                       class="form-control @error('no_of_items') is-invalid @enderror"
                                                       value="1"
                                                       min="0"
                                                       step="1"
                                                       id="no_of_items"
                                                       name="no_of_items"
                                                       autocomplete="no_of_items"
                                                       placeholder="Number of Items ..."
                                                       autofocus>
                                                @error('no_of_items')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                @enderror
                                                <div class="valid-feedback">Looks good!</div>
                                                <small>If your items don't fit in one flyer of any size, create multiple orders.</small>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="package_description">Package Description:</label> <small class="badge badge-secondary">optional</small>
                                                <textarea rows="3"
                                                          id="package_description"
                                                          name="package_description"
                                                          class="form-control @error('package_description') is-invalid @enderror"
                                                          placeholder="Product code - Color - Size">{{ old('package_description') }}</textarea>
                                                @error('package_description')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                @enderror
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="no_of_items">Order Reference:</label>
                                                <input type="text"
                                                       class="form-control @error('order_reference') is-invalid @enderror"
                                                       value=""
                                                       id="order_reference"
                                                       name="order_reference"
                                                       autocomplete="order_reference"
                                                       placeholder="B-123456"
                                                       autofocus>
                                                @error('order_reference')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                @enderror
                                                <div class="valid-feedback">Looks good!</div>
                                                <small>Add a reference that you can later use to search for the order.</small>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 invert returnlocation">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="select02">Return Location:</label>
                                                <select id="select02"
                                                        data-toggle="select"
                                                        name="return_location"
                                                        class="form-control form-control-sm @error('return_location') is-invalid @enderror">
                                                    <option value="">Select location</option>
                                                    @foreach($locations as $location)
                                                        <option value="{{ $location->id }}" {{ old('return_location') == $location->id ? 'selected':'' }}>{{ $location->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('return_location')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                @enderror
                                                <div class="valid-feedback">Looks good!</div>
                                                <small>Select the location to which the package should be returned.</small>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 invert returnlocation">
                                            <a href="#" class="text-dark" onclick="event.preventDefault();
                                                    display(module='returnlocation')">+ Create new Location</a>
                                        </div>
                                        <div class="col-12 hidden returnlocations col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="select05">Country</label>
                                                <select id="select05"
                                                        data-toggle="select"
                                                        class="form-control form-control-sm @error('country_id') is-invalid @enderror"
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
                                        <div class="col-12 hidden returnlocations col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="select01">State</label>
                                                <select id="select01"
                                                        data-toggle="select"
                                                        data-minimum-results-for-search="-1"
                                                        class="form-control form-control-sm @error('state_id') is-invalid @enderror"
                                                        name="state_id">
                                                    @foreach($states as $state)
                                                        <option value="{{ $state->id }}" {{ old('state_id') == $state->id ? 'selected':'' }} data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
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
                                        <div class="col-12 hidden returnlocations col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="select03">City</label>
                                                <select id="select03"
                                                        data-toggle="select"
                                                        disabled
                                                        data-minimum-results-for-search="-1"
                                                        class="form-control form-control-sm @error('city_id') is-invalid @enderror"
                                                        name="city_id">
                                                </select>
                                                @error('city_id')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                @enderror
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                        </div>


                                        <div class="col-12 hidden returnlocations col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="street">Street:</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="text"
                                                           class="form-control @error('street') is-invalid @enderror"
                                                           value="{{ old('street') }}"
                                                           autocomplete="street"
                                                           name="street"
                                                           id="street"
                                                           placeholder="Enter your street .."
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
                                        <div class="col-12 hidden returnlocations col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="building">Building:</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="text"
                                                           class="form-control @error('building') is-invalid @enderror"
                                                           value="{{ old('building') }}"
                                                           autocomplete="building"
                                                           name="building"
                                                           id="building"
                                                           placeholder="Enter your building .."
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


                                        <div class="col-12 hidden returnlocations col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="floor">Floor:</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="text"
                                                           class="form-control @error('floor') is-invalid @enderror"
                                                           value="{{ old('floor') }}"
                                                           autocomplete="floor"
                                                           name="floor"
                                                           id="floor"
                                                           placeholder="Enter your floor .."
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
                                        <div class="col-12 hidden returnlocations col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="apartment">Apartment:</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="text"
                                                           class="form-control @error('apartment') is-invalid @enderror"
                                                           value="{{ old('apartment') }}"
                                                           autocomplete="apartment"
                                                           name="apartment"
                                                           id="apartment"
                                                           placeholder="Enter your apartment .."
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
                                        <div class="col-12 hidden returnlocations col-md-12 mb-3">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="landmarks">Landmarks:</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="text"
                                                           class="form-control @error('landmarks') is-invalid @enderror"
                                                           value="{{ old('landmarks') }}"
                                                           autocomplete="landmarks"
                                                           name="landmarks"
                                                           id="landmarks"
                                                           placeholder="Enter your landmarks .."
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
                                        <div class="col-md-12 hidden returnlocations  mb-3">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox"
                                                           class="custom-control-input"
                                                           name="working_hours"
                                                           id="customCheck1">
                                                    <label class="custom-control-label"
                                                           for="customCheck1">This is a work address</label>
                                                    <small class="form-text text-muted">Mark it to deliver it within business days and working hours.</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 hidden returnlocations">
                                            <a href="#" class="text-dark" onclick="event.preventDefault();
                                                    displayInvert(module='returnlocation')">- Select from existed locations</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane text-70  fade " id="cash_collection" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="row">
                                    <div class="col-lg-3 bg-light">
                                        <div class="page-separator">
                                            <div class="page-separator__text">Basic Details</div>
                                        </div>
                                        <p class="card-subtitle text-70 mb-16pt mb-lg-0">Basic details of the customer.</p>
                                    </div>
                                    <div class="col-lg-9 row ">
                                        <div class="page-separator col-lg-12">
                                            <div class="page-separator__text" >
                                                &nbsp; Customer Information
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="cash_to_collect">Cash to Collect:</label>
                                                <input type="number"
                                                       class="form-control @error('cash_to_collect') is-invalid @enderror"
                                                       value=""
                                                       min="0"
                                                       step="0.01"
                                                       id="cash_to_collect"
                                                       name="cash_to_collect"
                                                       autocomplete="cash_to_collect"
                                                       placeholder="Cash to Collect ..."
                                                       autofocus>
                                                @error('cash_to_collect')
                                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                                @enderror
                                                <div class="valid-feedback">Looks good!</div>
                                                <small id="collect_cash_small">Droplin courier shall receive this amount from your customer.</small>
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
                                                               checked="">
                                                        <label for="collect_cash"
                                                               class="custom-control-label">Collect cash from customer</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input id="refund_cash"
                                                               name="collect_cash"
                                                               type="radio"
                                                               value="refund cash"
                                                               class="custom-control-input">
                                                        <label for="refund_cash"
                                                               class="custom-control-label">Refund cash to customer</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="page-separator col-lg-12">
                                            <div class="page-separator__text" >
                                                &nbsp; Return Package Details
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-label"
                                                       for="no_of_items">Order Reference:</label>
                                                <input type="text"
                                                       class="form-control @error('order_reference') is-invalid @enderror"
                                                       value=""
                                                       id="order_reference"
                                                       name="order_reference"
                                                       autocomplete="order_reference"
                                                       placeholder="B-123456"
                                                       autofocus>
                                                @error('order_reference')
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
                &nbsp; Customer Information
            </div>
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
                    <div class="col-lg-9 row ">
                        <div class="page-separator col-lg-12">
                            <div class="page-separator__text" >
                                &nbsp; Customer Information
                            </div>
                        </div>
                        <div class="col-lg-12 invert customer">
                            <div class="form-group">
                                <label class="form-label"
                                       for="select04">Customer's Locations:</label>
                                <select id="select04"
                                        data-toggle="select"
                                        name="customer_id"
                                        class="form-control form-control-sm @error('customer_id') is-invalid @enderror">
                                    <option value="">Select customer</option>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected':'' }}>{{ $customer->user->full_name }}</option>
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
                                                    display(module='customer')">+ Create new customer</a>
                        </div>
                        <div class="col-lg-6 hidden customers">
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
                        <div class="col-lg-6 hidden customers">
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
                        <div class="col-lg-6 hidden customers">
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
                        <div class="col-lg-6 hidden customers">
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
                        <div class="col-lg-12 hidden customers">
                            <div class="form-group">
                                <label class="form-label"
                                       for="delivery_notes">Delivery Notes:</label> <small class="badge badge-secondary">optional</small>
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
                        <div class="col-lg-12 hidden customers mb-1">
                            <a href="#" class="text-dark" onclick="event.preventDefault();
                                                    displayInvert(module='customer')">- Select from existed customers</a>
                        </div>
                        <div class="page-separator col-lg-12">
                            <div class="page-separator__text" >
                                &nbsp; Location Information
                            </div>
                        </div>
                        <div class="col-lg-12 invert location">
                            <div class="form-group">
                                <label class="form-label"
                                       for="select02">Customer's Locations:</label>
                                <select id="select02"
                                        data-toggle="select"
                                        name="location_id"
                                        class="form-control form-control-sm @error('location_id') is-invalid @enderror">
                                    <option value="">Select location</option>
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
                                                    display(module='location')">+ Create new Location</a>
                        </div>
                        <div class="col-12 hidden locations col-md-6 mb-3">
                            <div class="form-group">
                                <label class="form-label"
                                       for="select05">Country</label>
                                <select id="select05"
                                        data-toggle="select"
                                        class="form-control form-control-sm @error('country_id') is-invalid @enderror"
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
                                       for="select01">State</label>
                                <select id="select01"
                                        data-toggle="select"
                                        data-minimum-results-for-search="-1"
                                        class="form-control form-control-sm @error('state_id') is-invalid @enderror"
                                        name="state_id">
                                    @foreach($states as $state)
                                        <option value="{{ $state->id }}" {{ old('state_id') == $state->id ? 'selected':'' }} data-avatar-src="{{ asset('backend/images/icon/fast-delivery.png') }}">
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
                                       for="select03">City</label>
                                <select id="select03"
                                        data-toggle="select"
                                        disabled
                                        data-minimum-results-for-search="-1"
                                        class="form-control form-control-sm @error('city_id') is-invalid @enderror"
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
                                       for="street">Street:</label>
                                <div class="input-group input-group-merge">
                                    <input type="text"
                                           class="form-control @error('street') is-invalid @enderror"
                                           value="{{ old('street') }}"
                                           autocomplete="street"
                                           name="street"
                                           id="street"
                                           placeholder="Enter your street .."
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
                                       for="building">Building:</label>
                                <div class="input-group input-group-merge">
                                    <input type="text"
                                           class="form-control @error('building') is-invalid @enderror"
                                           value="{{ old('building') }}"
                                           autocomplete="building"
                                           name="building"
                                           id="building"
                                           placeholder="Enter your building .."
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
                                       for="floor">Floor:</label>
                                <div class="input-group input-group-merge">
                                    <input type="text"
                                           class="form-control @error('floor') is-invalid @enderror"
                                           value="{{ old('floor') }}"
                                           autocomplete="floor"
                                           name="floor"
                                           id="floor"
                                           placeholder="Enter your floor .."
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
                                       for="apartment">Apartment:</label>
                                <div class="input-group input-group-merge">
                                    <input type="text"
                                           class="form-control @error('apartment') is-invalid @enderror"
                                           value="{{ old('apartment') }}"
                                           autocomplete="apartment"
                                           name="apartment"
                                           id="apartment"
                                           placeholder="Enter your apartment .."
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
                                       for="landmarks">Landmarks:</label>
                                <div class="input-group input-group-merge">
                                    <input type="text"
                                           class="form-control @error('landmarks') is-invalid @enderror"
                                           value="{{ old('landmarks') }}"
                                           autocomplete="landmarks"
                                           name="landmarks"
                                           id="landmarks"
                                           placeholder="Enter your landmarks .."
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
                                           id="customCheck1">
                                    <label class="custom-control-label"
                                           for="customCheck1">This is a work address</label>
                                    <small class="form-text text-muted">Mark it to deliver it within business days and working hours.</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 hidden locations">
                            <a href="#" class="text-dark" onclick="event.preventDefault();
                                                    displayInvert(module='location')">- Select from existed locations</a>
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
                &nbsp; Request Pickup &nbsp; <small class="badge badge-secondary">Optional</small>
            </div>
        </div>
        <div class="card pickups_card">
            <div class="card-body ">
                <div class="row">
                    <div class="col-lg-3 bg-light">
                        <div class="page-separator">
                            <div class="page-separator__text">Request Pickup</div>
                        </div>
                        <p class="card-subtitle text-70 mb-16pt mb-lg-0">You can skip requesting a pickup now but make sure to request a pickup when you have packages ready to be shipped.</p>
                    </div>
                    <div class="col-lg-9 row p-2">
                        <div class="col-lg-12 invert location">
                            <div class="form-group">
                                <label class="form-label"
                                       for="select02">Pickup Locations:</label>
                                <select id="select02"
                                        data-toggle="select"
                                        name="pickup_location_id"
                                        class="form-control form-control-sm @error('pickup_location_id') is-invalid @enderror">
                                    <option value="">Select location</option>
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
                        <div class="col-lg-12 invert pickup">
                            <div class="form-group">
                                <label class="form-label"
                                       for="select06">Scheduled Pickups:</label>
                                <select id="select06"
                                        data-toggle="select"
                                        name="pickup_id"
                                        class="form-control form-control-sm @error('pickup_id') is-invalid @enderror">
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
                                                    display(module='pickup')">+ Create new Pickup</a>
                        </div>
                        <div class="col-md-12 hidden pickups">
                            <div class="form-group">
                                <label class="form-label"
                                       for="scheduled_date">Pickup Date:</label>
                                <input type="hidden"
                                       class="form-control @error('scheduled_date') is-invalid @enderror flatpickr-input"
                                       value="{{ old('scheduled_date') }}"
                                       id="scheduled_date"
                                       name="scheduled_date"
                                       data-toggle="flatpickr"
                                       placeholder="Pickup Date...">
                                @error('scheduled_date')
                                <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                @enderror
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                        </div>
                        <div class="col-lg-12 hidden pickups">
                            <div class="form-group">
                                <label class="form-label"
                                       for="select06">Contacts:</label>
                                <select id="select06"
                                        data-toggle="select"
                                        name="contact_id"
                                        class="form-control form-control-sm @error('contact_id') is-invalid @enderror">
                                    <option value="">Select Contact</option>
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
                        <div class="col-lg-12 hidden pickups">
                            <a href="#" class="text-dark" onclick="event.preventDefault();
                                                    displayInvert(module='pickup')">- Select from existed pickups</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="hidden_inputs">
            <input type="hidden" name="type" value="Deliver">
        </div>

        <button type="submit"
                class="btn pull-right btn-primary">Submit</button>

    </div>
@endsection

@section('extra-scripts')
    <script src="{{  asset('backend/js/locations_ajax.js') }}"></script>
@endsection
