@extends('layouts.backend')

@section('title')
    Dashboard
@endsection

@section('links')
    <li class="breadcrumb-item active">
        Dashboard
    </li>
@endsection

@section('button-link')
    {{ route('dashboard.orders.create') }}
@endsection

@section('button-icon')
    add
@endsection

@section('button-title')
    New Orders
@endsection

@section('main_content')
    <div class="container page__container" >
        <div class="page-section">
            <div class="card card-form d-flex flex-column flex-sm-row mb-lg-32pt">
                <div class="card-form__body card-body-form-group flex">
                    <div class="row">
                        <div class="col-sm-auto">
                            <div class="form-group">
                                <label for="filter_name">Name</label>
                                <input id="filter_name"
                                       type="text"
                                       class="form-control"
                                       placeholder="Search by name">
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div class="form-group">
                                <label for="filter_category">Status</label><br>
                                <select id="filter_category"
                                        class="custom-select"
                                        style="width: 200px;">
                                    <option value="all">Done</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div class="form-group">
                                <label for="filter_stock">Delivered?</label>
                                <div class="custom-control custom-checkbox mt-sm-2">
                                    <input type="checkbox"
                                           class="custom-control-input"
                                           id="filter_stock"
                                           checked="">
                                    <label class="custom-control-label"
                                           for="filter_stock">Yes</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div class="form-group"
                                 style="width: 200px;">
                                <label for="filter_date">Order date</label>
                                <input id="filter_date"
                                       type="text"
                                       class="form-control"
                                       placeholder="Select date ..."
                                       value="13/03/2018 to 20/03/2018"
                                       data-toggle="flatpickr"
                                       data-flatpickr-mode="range"
                                       data-flatpickr-alt-format="d/m/Y"
                                       data-flatpickr-date-format="d/m/Y">
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn bg-alt border-left border-top border-top-sm-0 rounded-0"><i class="material-icons text-primary icon-20pt">refresh</i></button>
            </div>

            <div class="row card-group-row mb-lg-8pt">
                <div class="col-lg-4 col-md-6 card-group-row__col">
                    <div class="card card-group-row__card">
                        <div class="card-body d-flex align-items-center">
                            <div class="flex d-flex align-items-center">
                                <div class="h2 mb-0 mr-3">3</div>
                                <div class="flex">
                                    <div class="card-title">Tickets</div>
                                    <p class="card-subtitle text-50 d-flex align-items-center">
                                        31.5%
                                        <i class="material-icons text-accent ml-4pt icon-16pt">keyboard_arrow_up</i>
                                    </p>
                                </div>
                            </div>
                            <i class="material-icons icon-32pt text-20 ml-8pt">confirmation_number</i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 card-group-row__col">
                    <div class="card card-group-row__card">
                        <div class="card-body d-flex align-items-center">
                            <div class="flex d-flex align-items-center">
                                <div class="h2 mb-0 mr-3">40</div>
                                <div class="flex">
                                    <div class="card-title">Orders</div>
                                    <p class="card-subtitle text-50 d-flex align-items-center">
                                        51.5%
                                        <i class="material-icons text-accent ml-4pt icon-16pt">keyboard_arrow_up</i>
                                    </p>
                                </div>
                            </div>
                            <i class="material-icons icon-32pt text-20 ml-8pt">shopping_basket</i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 card-group-row__col">
                    <div class="card card-group-row__card">
                        <div class="card-body d-flex align-items-center">
                            <div class="flex d-flex align-items-center">
                                <div class="h2 mb-0 mr-3">78</div>
                                <div class="flex">
                                    <div class="card-title">Customers</div>
                                    <p class="card-subtitle text-50 d-flex align-items-center">
                                        20%
                                        <i class="material-icons text-accent ml-4pt icon-16pt">keyboard_arrow_up</i>
                                    </p>
                                </div>
                            </div>
                            <i class="material-icons icon-32pt text-20 ml-8pt">perm_identity</i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row card-group-row">
                <div class="col-lg-4 col-md-6 card-group-row__col">
                    <div class="card card-group-row__card">
                        <div class="card-body d-flex flex-row align-items-center flex-0">
                            <div class="h2 mb-0 mr-3">82.99 EGP</div>
                            <div class="flex">
                                <div class="card-title">Total sales</div>
                                <div class="card-subtitle text-50 d-flex align-items-center">2.6% <i class="material-icons text-accent icon-16pt ml-4pt">keyboard_arrow_up</i></div>
                            </div>
                            <div class="ml-3 align-self-start">
                                <!--<div class="dropdown mb-2">
                                    <a href=""
                                       class="dropdown-toggle"
                                       data-toggle="dropdown"
                                       data-caret="false"><i class="material-icons text-50">more_horiz</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href=""
                                           class="dropdown-item">View report</a>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                        <div class="card-body flex-0">
                            <small class="d-flex align-items-center font-weight-bold text-muted mb-1">
                                <span class="flex text-body">This Week</span>
                                <span class="mx-3">50.99 EGP</span>
                                <span class="d-flex align-items-center"><i class="material-icons text-success icon-16pt mr-1">keyboard_arrow_up</i> 3.2%</span>
                            </small>
                            <small class="d-flex align-items-center font-weight-bold text-muted">
                                <span class="flex text-body">Last Week</span>
                                <span class="mx-3">32.00 EGP</span>
                                <span class="d-flex align-items-center"><i class="material-icons text-danger icon-16pt mr-1">keyboard_arrow_down</i> 7.0%</span>
                            </small>
                        </div>
                        <div class="card-body text-muted flex d-flex flex-column align-items-center justify-content-center">
                            <div class="chart w-100"
                                 style="height: 150px;">
                                <canvas class="chart-canvas js-update-chart-line js-update-chart-area"
                                        id="totalSalesChart"
                                        data-chart-legend="#totalSalesChartLegend"
                                        data-chart-line-background-color="gradient:primary"
                                        data-chart-line-background-opacity="0.24"
                                        data-chart-line-border-color="primary"
                                        data-chart-prefix="EGP"
                                        data-chart-dark-mode="false">
                                    <span style="font-size: 1rem;"><strong>Total Sales</strong> chart goes here.</span>
                                </canvas>
                            </div>
                            <div id="totalSalesChartLegend"
                                 class="chart-legend chart-legend--horizontal mt-16pt"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 card-group-row__col">
                    <div class="card card-group-row__card">
                        <div class="card-body d-flex flex-row align-items-center flex-0">
                            <div class="h2 mb-0 mr-3">78</div>
                            <div class="flex">
                                <div class="card-title">Total Customers</div>
                                <div class="card-subtitle text-50 d-flex align-items-center">9.6% <i class="material-icons text-accent icon-16pt ml-4pt">keyboard_arrow_down</i></div>
                            </div>
                            <div class="ml-3 align-self-start">
                                <!--<div class="dropdown mb-2">
                                    <a href=""
                                       class="dropdown-toggle"
                                       data-toggle="dropdown"
                                       data-caret="false"><i class="material-icons text-50">more_horiz</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href=""
                                           class="dropdown-item">View report</a>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                        <div class="card-body text-muted flex d-flex flex-column align-items-center justify-content-center">
                            <div class="chart w-100"
                                 style="height: 200px;">
                                <canvas class="chart-canvas js-update-chart-bar"
                                        id="totalVisitorsChart"
                                        data-chart-legend="#totalVisitorsChartLegend"
                                        data-chart-line-background-color="gradient:primary"
                                        data-chart-suffix="k"
                                        data-chart-dark-mode="false">
                                    <span style="font-size: 1rem;"><strong>Total Customers</strong> chart goes here.</span>
                                </canvas>
                            </div>
                            <div id="totalVisitorsChartLegend"
                                 class="chart-legend chart-legend--horizontal mt-16pt"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 card-group-row__col">
                    <div class="card card-group-row__card">
                        <div class="card-body d-flex flex-row align-items-center flex-0">
                            <div class="h2 mb-0 mr-3">5.43%</div>
                            <div class="flex">
                                <div class="card-title">Repeat customer</div>
                                <div class="card-subtitle text-50 d-flex align-items-center">2.6% <i class="material-icons text-accent icon-16pt ml-4pt">keyboard_arrow_up</i></div>
                            </div>
                            <div class="ml-3 align-self-start">
                                <!--<div class="dropdown mb-2">
                                    <a href=""
                                       class="dropdown-toggle"
                                       data-toggle="dropdown"
                                       data-caret="false"><i class="material-icons text-50">more_horiz</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href=""
                                           class="dropdown-item">View report</a>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                        <div class="card-body text-muted flex d-flex flex-column align-items-center justify-content-center">
                            <div class="chart w-100"
                                 style="height: 200px;">
                                <canvas class="chart-canvas js-update-chart-line-2nd-accent"
                                        id="repeatCustomerRateChart"
                                        data-chart-legend="#repeatCustomerRateChartLegend"
                                        data-chart-line-border-color="primary,gray"
                                        data-chart-suffix="%"
                                        data-chart-dark-mode="false">
                                    <span style="font-size: 1rem;"><strong>Repeat Customer Rate</strong> chart goes here.</span>
                                </canvas>
                            </div>
                            <div id="repeatCustomerRateChartLegend"
                                 class="chart-legend chart-legend--horizontal mt-16pt"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row card-group-row">
                <div class="col-lg-4 col-md-6 card-group-row__col">
                    <div class="card card-group-row__card">
                        <div class="card-body d-flex flex-row align-items-center flex-0">
                            <div class="h2 mb-0 mr-3">40</div>
                            <div class="flex">
                                <div class="card-title">Total orders</div>
                                <div class="card-subtitle text-50 d-flex align-items-center">92% <i class="material-icons text-accent icon-16pt ml-4pt">keyboard_arrow_up</i></div>
                            </div>
                            <div class="ml-3 align-self-start">
                                <!--<div class="dropdown mb-2">
                                    <a href=""
                                       class="dropdown-toggle"
                                       data-toggle="dropdown"
                                       data-caret="false"><i class="material-icons text-50">more_horiz</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href=""
                                           class="dropdown-item">View report</a>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                        <div class="card-body text-muted flex d-flex flex-column align-items-center justify-content-center">
                            <div class="chart w-100"
                                 style="height: 150px;">
                                <canvas class="chart-canvas js-update-chart-line"
                                        id="totalOrdersChart"
                                        data-chart-legend="#totalOrdersChartLegend"
                                        data-chart-line-border-color="primary"
                                        data-chart-dark-mode="false">
                                    <span style="font-size: 1rem;"><strong>Total Orders</strong> chart goes here.</span>
                                </canvas>
                            </div>
                            <div id="totalOrdersChartLegend"
                                 class="chart-legend chart-legend--horizontal mt-16pt"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 card-group-row__col">
                    <div class="card card-group-row__card">
                        <div class="card-body d-flex flex-row align-items-center flex-0">
                            <div class="h2 mb-0 mr-3">25 EGP</div>
                            <div class="flex">
                                <div class="card-title">Average order</div>
                                <div class="card-subtitle text-50 d-flex align-items-center">6.7% <i class="material-icons text-accent icon-16pt ml-4pt">keyboard_arrow_up</i></div>
                            </div>
                            <div class="ml-3 align-self-start">
                                <!--<div class="dropdown mb-2">
                                    <a href=""
                                       class="dropdown-toggle"
                                       data-toggle="dropdown"
                                       data-caret="false"><i class="material-icons text-50">more_horiz</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href=""
                                           class="dropdown-item">View report</a>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                        <div class="card-body text-muted flex d-flex flex-column align-items-center justify-content-center">
                            <div class="chart w-100"
                                 style="height: 150px;">
                                <canvas class="chart-canvas js-update-chart-line"
                                        id="averageOrderValueChart"
                                        data-chart-legend="#averageOrderValueChartLegend"
                                        data-chart-line-border-color="primary"
                                        data-chart-prefix="EGP"
                                        data-chart-dark-mode="false">
                                    <span style="font-size: 1rem;"><strong>Average Order Value</strong> chart goes here.</span>
                                </canvas>
                            </div>
                            <div id="averageOrderValueChartLegend"
                                 class="chart-legend chart-legend--horizontal mt-16pt"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 card-group-row__col">
                    <div class="card card-group-row__card">
                        <div class="card-body d-flex flex-row align-items-center flex-0">
                            <div class="h2 mb-0 mr-3">10</div>
                            <div class="flex">
                                <div class="card-title">Tickets</div>
                                <div class="card-subtitle text-50 d-flex align-items-center">56.7% <i class="material-icons text-accent icon-16pt ml-4pt">keyboard_arrow_up</i></div>
                            </div>
                            <div class="ml-3 align-self-start">
                                <!--<div class="dropdown mb-2">
                                    <a href=""
                                       class="dropdown-toggle"
                                       data-toggle="dropdown"
                                       data-caret="false"><i class="material-icons text-50">more_horiz</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href=""
                                           class="dropdown-item">View report</a>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                        <div class="card-body text-muted flex d-flex align-items-center">
                            <div class="chart w-100"
                                 style="height: 150px;">
                                <div class="position-relative">
                                    <div class="text-center fullbleed d-flex align-items-center justify-content-center flex-column z-0">
                                        <h3 class="mb-0">59%</h3>
                                        <small class="text-uppercase">Open</small>
                                    </div>
                                    <canvas id="visitsByDeviceChart"
                                            class="chart-canvas"
                                            data-chart-line-background-color="primary;gray.300"
                                            data-chart-dark-mode="false">
                                        <span style="font-size: 1rem;"><strong>Tickets</strong> chart goes here.</span>
                                    </canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-body flex-0">
                            <small class="d-flex align-items-center font-weight-bold text-muted mb-1">
                                <span class="flex text-body">Open</span>
                                <span class="mx-3">267</span>
                                <span class="d-flex align-items-center"><i class="material-icons text-success icon-16pt mr-1">keyboard_arrow_up</i> 2.1%</span>
                            </small>
                            <small class="d-flex align-items-center font-weight-bold text-muted mb-1">
                                <span class="flex text-body">Close</span>
                                <span class="mx-3">184</span>
                                <span class="d-flex align-items-center"><i class="material-icons text-danger icon-16pt mr-1">keyboard_arrow_down</i> 4.8%</span>
                            </small>
                            <!-- <small class="d-flex align-items-center font-weight-bold text-muted">
                                <span class="flex text-body">Tablet</span>
                                <span class="mx-3">0</span>
                                <span>&mdash;</span>
                            </small> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-lg-32pt">
                <div class="card-header d-flex align-items-center">
                    <div class="flatpickr-wrapper flex">
                        <div id="recent_orders_date">
                            <strong class="card-title d-block">Recent Orders</strong>
                        </div>
                    </div>
                </div>

                <div class="table-responsive"
                     data-toggle="lists"
                     data-lists-sort-by="js-lists-values-count-name"
                     data-lists-values='["js-lists-values-employee-name", "js-lists-values-employer-name", "js-lists-values-projects", "js-lists-values-activity", "js-lists-values-earnings"]'>

                    <table class="table mb-0 thead-border-top-0 table-nowrap">
                        <thead>
                        <tr>

                            <th style="width: 18px;"
                                class="pr-0"
                                data-sort="js-lists-values-count-name">
                               #
                            </th>

                            <th>
                                <a href="javascript:void(0)"
                                   class="sort"
                                   data-sort="js-lists-values-employee-name">Customers</a>
                            </th>

                            <th style="width: 150px;">
                                <a href="javascript:void(0)"
                                   class="sort"
                                   data-sort="js-lists-values-employer-name">Package No.</a>
                            </th>

                            <th style="width: 37px;">Status</th>

                            <th style="width: 120px;">
                                <a href="javascript:void(0)"
                                   class="sort"
                                   data-sort="js-lists-values-activity">Created</a>
                            </th>
                            <th style="width: 51px;">
                                <a href="javascript:void(0)"
                                   class="sort"
                                   data-sort="js-lists-values-earnings">Earnings</a>
                            </th>
                            <th style="width: 24px;"
                                class="pl-0"></th>
                        </tr>
                        </thead>
                        <tbody class="list"
                               id="users">

                        <tr>

                            <td class="pr-0">
                               1
                            </td>

                            <td>

                                <div class="media flex-nowrap align-items-center"
                                     style="white-space: nowrap;">
                                    <div class="avatar avatar-sm mr-8pt">

                                        <img src="{{ asset('backend/images/people/110/guy-1.jpg') }}"
                                             alt="Avatar"
                                             class="avatar-img rounded-circle">

                                    </div>
                                    <div class="media-body">

                                        <div class="d-flex flex-column">
                                            <p class="mb-0"><strong class="js-lists-values-employee-name">Michael Smith</strong></p>
                                            <small class="js-lists-values-employee-email text-50"></small>
                                        </div>

                                    </div>
                                </div>

                            </td>

                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#"
                                       class="text-warning"><i class="material-icons mr-8pt">cases</i></a>
                                    <a href=""
                                       class="text-70"><span class="js-lists-values-employer-name">#H86955</span></a>
                                </div>
                            </td>

                            <td>
                                <div class="d-flex flex-column">
                                    <small class="js-lists-values-status text-50 mb-4pt">pending</small>
                                    <span class="indicator-line rounded bg-warning"></span>
                                </div>
                            </td>

                            <td class="js-lists-values-earnings small">12,402 EGP</td>
                            <td class="text-50 js-lists-values-activity small">3 days ago</td>
                            <td class="text-right pl-0">
                                <a href=""
                                   class="text-50"><i class="material-icons">more_vert</i></a>
                            </td>
                        </tr>

                        <tr>

                            <td class="pr-0">
                               2
                            </td>

                            <td>

                                <div class="media flex-nowrap align-items-center"
                                     style="white-space: nowrap;">
                                    <div class="avatar avatar-sm mr-8pt">

                                        <span class="avatar-title rounded-circle">CS</span>

                                    </div>
                                    <div class="media-body">

                                        <div class="d-flex flex-column">
                                            <p class="mb-0"><strong class="js-lists-values-employee-name">Connie Smith</strong></p>
                                            <small class="js-lists-values-employee-email text-50"></small>
                                        </div>

                                    </div>
                                </div>

                            </td>

                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#"
                                       class="text-warning"><i class="material-icons mr-8pt">cases</i></a>
                                    <a href=""
                                       class="text-70"><span class="js-lists-values-employer-name">#H98955</span></a>
                                </div>
                            </td>

                            <td>
                                <div class="d-flex flex-column">
                                    <small class="js-lists-values-status text-50 mb-4pt">Active</small>
                                    <span class="indicator-line rounded bg-success"></span>
                                </div>
                            </td>

                            <td class="js-lists-values-earnings small">1,943 EGP</td>
                            <td class="text-50 js-lists-values-activity small">1 week ago</td>
                            <td class="text-right pl-0">
                                <a href=""
                                   class="text-50"><i class="material-icons">more_vert</i></a>
                            </td>
                        </tr>

                        <tr>

                            <td class="pr-0">
                                3
                            </td>

                            <td>

                                <div class="media flex-nowrap align-items-center"
                                     style="white-space: nowrap;">
                                    <div class="avatar avatar-sm mr-8pt">

                                        <img src="{{ asset('backend/images/people/110/guy-2.jpg') }}"
                                             alt="Avatar"
                                             class="avatar-img rounded-circle">

                                    </div>
                                    <div class="media-body">

                                        <div class="d-flex flex-column">
                                            <p class="mb-0"><strong class="js-lists-values-employee-name">John Connor</strong></p>
                                            <small class="js-lists-values-employee-email text-50"></small>
                                        </div>

                                    </div>
                                </div>

                            </td>

                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#"
                                       class="text-warning"><i class="material-icons mr-8pt">cases</i></a>
                                    <a href=""
                                       class="text-70"><span class="js-lists-values-employer-name">#H86989</span></a>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column">
                                    <small class="js-lists-values-status text-50 mb-4pt">Active</small>
                                    <span class="indicator-line rounded bg-success"></span>
                                </div>
                            </td>

                            <td class="js-lists-values-earnings small">1,401 EGP</td>
                            <td class="text-50 js-lists-values-activity small">2 weeks ago</td>
                            <td class="text-right pl-0">
                                <a href=""
                                   class="text-50"><i class="material-icons">more_vert</i></a>
                            </td>
                        </tr>

                        <tr>

                            <td class="pr-0">
                                4
                            </td>

                            <td>

                                <div class="media flex-nowrap align-items-center"
                                     style="white-space: nowrap;">
                                    <div class="avatar avatar-sm mr-8pt">

                                        <span class="avatar-title rounded-circle">LB</span>

                                    </div>
                                    <div class="media-body">

                                        <div class="d-flex flex-column">
                                            <p class="mb-0"><strong class="js-lists-values-employee-name">Laza Bogdan</strong></p>
                                            <small class="js-lists-values-employee-email text-50"></small>
                                        </div>

                                    </div>
                                </div>

                            </td>

                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#"
                                       class="text-warning"><i class="material-icons mr-8pt">cases</i></a>
                                    <a href=""
                                       class="text-70"><span class="js-lists-values-employer-name">#H86761</span></a>
                                </div>
                            </td>

                            <td>
                                <div class="d-flex flex-column">
                                    <small class="js-lists-values-status text-50 mb-4pt">Active</small>
                                    <span class="indicator-line rounded bg-success"></span>
                                </div>
                            </td>

                            <td class="js-lists-values-earnings small">22,402 EGP</td>
                            <td class="text-50 js-lists-values-activity small">3 weeks ago</td>
                            <td class="text-right pl-0">
                                <a href=""
                                   class="text-50"><i class="material-icons">more_vert</i></a>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>

                <div class="card-footer p-8pt">

                    <ul class="pagination justify-content-start pagination-xsm m-0">
                        <li class="page-item disabled">
                            <a class="page-link"
                               href="#"
                               aria-label="Previous">
                                        <span aria-hidden="true"
                                              class="material-icons">chevron_left</span>
                                <span>Prev</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link"
                               href="#"
                               aria-label="Page 1">
                                <span>1</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link"
                               href="#"
                               aria-label="Page 2">
                                <span>2</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link"
                               href="#"
                               aria-label="Next">
                                <span>Next</span>
                                <span aria-hidden="true"
                                      class="material-icons">chevron_right</span>
                            </a>
                        </li>
                    </ul>

                </div>

            </div>


        </div>
    </div>
@endsection
