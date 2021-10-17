@extends('layouts.backend')

@section('title')
    Dashboard
@endsection

@section('links')
    <li class="breadcrumb-item active">
        Dashboard
    </li>
@endsection

@section('main_content')
    <div class="container page__container">
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
                                <label for="filter_stock">In stock?</label>
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
                                <div class="h2 mb-0 mr-3">12.3 EGP</div>
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
                            <div class="h2 mb-0 mr-3">&dollar;82.99</div>
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
                                <span class="flex text-body">Online Store</span>
                                <span class="mx-3">&dollar;50.99</span>
                                <span class="d-flex align-items-center"><i class="material-icons text-success icon-16pt mr-1">keyboard_arrow_up</i> 3.2%</span>
                            </small>
                            <small class="d-flex align-items-center font-weight-bold text-muted">
                                <span class="flex text-body">Facebook</span>
                                <span class="mx-3">&dollar;32.00</span>
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
                                        data-chart-prefix="$"
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
                                        data-chart-prefix="$"
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

            <div class="card mb-0">
                <div class="card-header d-flex align-items-center">
                    <div class="flatpickr-wrapper flex">
                        <div id="recent_orders_date"
                             data-toggle="flatpickr"
                             data-flatpickr-wrap="true"
                             data-flatpickr-static="true"
                             data-flatpickr-mode="range"
                             data-flatpickr-alt-format="d/m/Y"
                             data-flatpickr-date-format="d/m/Y">
                            <strong class="card-title d-block">Recent Orders</strong>
                            <a href="javascript:void(0)"
                               class="link-date"
                               data-toggle>13/03/2018 to 20/03/2018</a>
                            <input class="d-none"
                                   type="hidden"
                                   value="13/03/2018 to 20/03/2018"
                                   data-input>
                        </div>
                    </div>
                    <i class="material-icons text-20">help_outline</i>
                </div>
                <div class="table-responsive"
                     data-toggle="lists"
                     data-lists-sort-by="js-lists-values-orders-name"
                     data-lists-values='["js-lists-values-orders-name", "js-lists-values-orders-date", "js-lists-values-orders-amount"]'>
                    <table class="table mb-0 table-nowrap thead-border-top-0">
                        <thead>
                        <tr>
                            <th style="width: 18px;">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox"
                                           class="custom-control-input js-toggle-check-all"
                                           data-target="#orders"
                                           id="customCheckAll">
                                    <label class="custom-control-label"
                                           for="customCheckAll"><span class="text-hide">Toggle all</span></label>
                                </div>
                            </th>
                            <th>
                                <a href="javascript:void(0)"
                                   class="sort"
                                   data-sort="js-lists-values-orders-name">Name</a>
                            </th>
                            <th style="width: 150px;">
                                <a href="javascript:void(0)"
                                   class="sort"
                                   data-sort="js-lists-values-orders-date">Date</a>
                            </th>
                            <th style="width: 100px;">
                                <a href="javascript:void(0)"
                                   class="sort"
                                   data-sort="js-lists-values-orders-amount">Amount</a>
                            </th>
                            <th style="width: 24px;"></th>
                        </tr>
                        </thead>
                        <tbody class="list"
                               id="orders">

                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox"
                                           class="custom-control-input js-check-selected-row"
                                           id="customCheck1_1">
                                    <label class="custom-control-label"
                                           for="customCheck1_1"><span class="text-hide">Check</span></label>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="material-icons text-20 mr-8pt">contacts</i>
                                    <a class="js-lists-values-orders-name"
                                       href="">Jenell D. Matney</a>
                                </div>
                            </td>
                            <td class="js-lists-values-orders-date text-50">4 days ago</td>
                            <td>
                                <a class="js-lists-values-orders-amount"
                                   href="">&dollar;246</a>
                            </td>
                            <td class="text-right">
                                <a href=""
                                   class="text-50"><i class="material-icons">more_vert</i></a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox"
                                           class="custom-control-input js-check-selected-row"
                                           id="customCheck1_2">
                                    <label class="custom-control-label"
                                           for="customCheck1_2"><span class="text-hide">Check</span></label>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="material-icons text-20 mr-8pt">contacts</i>
                                    <a class="js-lists-values-orders-name"
                                       href="">Sherri J. Cardenas</a>
                                </div>
                            </td>
                            <td class="js-lists-values-orders-date text-50">3 days ago</td>
                            <td>
                                <a class="js-lists-values-orders-amount"
                                   href="">&dollar;369</a>
                            </td>
                            <td class="text-right">
                                <a href=""
                                   class="text-50"><i class="material-icons">more_vert</i></a>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox"
                                           class="custom-control-input js-check-selected-row"
                                           id="customCheck1_3">
                                    <label class="custom-control-label"
                                           for="customCheck1_3"><span class="text-hide">Check</span></label>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="material-icons text-20 mr-8pt">contacts</i>
                                    <a class="js-lists-values-orders-name"
                                       href="">Joseph S. Ferland</a>
                                </div>
                            </td>
                            <td class="js-lists-values-orders-date text-50">2 days ago</td>
                            <td>
                                <a class="js-lists-values-orders-amount"
                                   href="">&dollar;492</a>
                            </td>
                            <td class="text-right">
                                <a href=""
                                   class="text-50"><i class="material-icons">more_vert</i></a>
                            </td>
                        </tr>

                        <tr class="selected">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox"
                                           class="custom-control-input js-check-selected-row"
                                           checked=""
                                           id="customCheck1_4">
                                    <label class="custom-control-label"
                                           for="customCheck1_4"><span class="text-hide">Check</span></label>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="material-icons text-20 mr-8pt">contacts</i>
                                    <a class="js-lists-values-orders-name"
                                       href="">Bryan K. Davis</a>
                                </div>
                            </td>
                            <td class="js-lists-values-orders-date text-50">1 day ago</td>
                            <td>
                                <a class="js-lists-values-orders-amount"
                                   href="">&dollar;615</a>
                            </td>
                            <td class="text-right">
                                <a href=""
                                   class="text-50"><i class="material-icons">more_vert</i></a>
                            </td>
                        </tr>

                        <tr class="selected">
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox"
                                           class="custom-control-input js-check-selected-row"
                                           checked=""
                                           id="customCheck1_5">
                                    <label class="custom-control-label"
                                           for="customCheck1_5"><span class="text-hide">Check</span></label>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="material-icons text-20 mr-8pt">contacts</i>
                                    <a class="js-lists-values-orders-name"
                                       href="">Elizabeth J. Ohara</a>
                                </div>
                            </td>
                            <td class="js-lists-values-orders-date text-50">4 hours ago</td>
                            <td>
                                <a class="js-lists-values-orders-amount"
                                   href="">&dollar;738</a>
                            </td>
                            <td class="text-right">
                                <a href=""
                                   class="text-50"><i class="material-icons">more_vert</i></a>
                            </td>
                        </tr>

                    </table>
                </div>
                <div class="card-footer">

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

                    <!-- <ul class="pagination justify-content-center pagination-sm">
<li class="page-item disabled">
<a class="page-link" href="#" aria-label="Previous">
<span aria-hidden="true" class="material-icons">chevron_left</span>
<span>Prev</span>
</a>
</li>
<li class="page-item active">
<a class="page-link" href="#" aria-label="1">
<span>1</span>
</a>
</li>
<li class="page-item">
<a class="page-link" href="#" aria-label="1">
<span>2</span>
</a>
</li>
<li class="page-item">
<a class="page-link" href="#" aria-label="Next">
<span>Next</span>
<span aria-hidden="true" class="material-icons">chevron_right</span>
</a>
</li>
</ul> -->
                </div>
            </div>

        </div>
    </div>
@endsection
