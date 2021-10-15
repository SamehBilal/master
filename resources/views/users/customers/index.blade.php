@extends('layouts.backend')

@section('title')
    Customers
@endsection

@section('links')
    <li class="breadcrumb-item active">
        Customers
    </li>
@endsection

@section('main_content')
    <div class="container page__container">
        <div class="page-section">

            <div class="page-separator">
                <div class="page-separator__text">Customers</div>
            </div>

            {{--<div class="card card-form d-flex flex-column flex-sm-row mb-lg-32pt">
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
                                <label for="filter_category">Category</label><br>
                                <select id="filter_category"
                                        class="custom-select"
                                        style="width: 200px;">
                                    <option value="all">All Categories</option>
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
                        <div class="ml-auto col-sm-auto">
                            <div class="form-group" style="width: 150px;">
                                <label for="price_range">Price</label>
                                <input id="price_range" type="text" data-toggle="ion-rangeslider" data-min="0" data-max="100" data-from="50" data-step="5" data-max-postfix="+" data-prefix="$">
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn bg-alt border-left border-top border-top-sm-0 rounded-0"><i class="material-icons text-primary icon-20pt">refresh</i></button>
            </div>--}}

            <div class="card dashboard-area-tabs p-relative o-hidden mb-32pt">
                <div class="card-header p-0 nav">
                    <div class="row no-gutters"
                         role="tablist">
                        @foreach($categories as $category)
                            <div class="col-auto {{ $category->id != 1 ? 'border-left border-right':'' }}">
                                <a href="#"
                                   data-toggle="tab"
                                   role="tab"
                                   aria-selected="{{ $category->id == 1 ? 'true':'false' }}"
                                   class="dashboard-area-tabs__tab card-body d-flex flex-row align-items-center justify-content-start {{ $category->id == 1 ? 'active':'' }}">
                                    {{--<span class="h2 mb-0 mr-3">{{ $category->id }}</span>--}}
                                    <div class="avatar avatar-sm mr-8pt">
                                        <span class="avatar-title rounded bg-warning text-black-100">{{  substr($category->name, 0, 1)  }}</span>
                                    </div>
                                    <span class="flex d-flex flex-column">
                                        <strong>{{ $category->name }}</strong>
                                        <small class=" text-50">{{ $category->status }}</small>
                                        <span class="indicator-line rounded {{ $category->status == 'active' ? 'bg-success':'bg-danger' }}"></span>
                                    </span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="table-responsive">
                    <div class="card-header">
                        <form class="form-inline">
                            <label class="mr-sm-2 form-label"
                                   for="myInputTextField">Filter by:</label>
                            <input type="text"
                                   class="form-control search mb-2 mr-sm-2 mb-sm-0"
                                   id="myInputTextField"
                                   placeholder="Search ...">

                            <label class="sr-only"
                                   for="inlineFormRole">Role</label>
                            <select id="inlineFormRole"
                                    class="custom-select mb-2 mr-sm-2 mb-sm-0">
                                <option value="All Roles">All Roles</option>
                            </select>

                            <div class="col-lg d-flex flex-wrap align-items-center">
                                <div class="ml-lg-auto dropdown">
                                    <a href="#"
                                       class="btn btn-link dropdown-toggle text-70"
                                       data-toggle="dropdown">All Topics</a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href=""
                                           class="dropdown-item active">All Topics</a>
                                        <a href=""
                                           class="dropdown-item">My Topics</a>
                                    </div>
                                </div>
                                <div class="dropdown mr-8pt">
                                    <a href="#"
                                       class="btn btn-link dropdown-toggle text-70"
                                       data-toggle="dropdown">Newest</a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href=""
                                           class="dropdown-item active">Newest</a>
                                        <a href=""
                                           class="dropdown-item">Unanswered</a>
                                    </div>
                                </div>
                                <a href="discussions-ask.html"
                                   class="btn btn-accent">Ask a question</a>
                            </div>

                            <div class="ml-auto mb-2 mb-sm-0 custom-control-inline mr-0">
                                <label class="form-label mb-0"
                                       for="active">Active</label>
                                <div class="custom-control custom-checkbox-toggle ml-8pt">
                                    <input checked=""
                                           type="checkbox"
                                           id="active"
                                           class="custom-control-input">
                                    <label class="custom-control-label"
                                           for="active">Active</label>
                                </div>
                            </div>
                        </form>

                    </div>

                    <table
                           class="datatable-func display table mb-0 thead-border-top-0 table-nowrap"
                           style="width:100%">
                        <thead>
                        <tr>

                            <th style="width: 18px;"
                                class="pr-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox"
                                           class="custom-control-input js-toggle-check-all"
                                           data-target="#projects"
                                           id="customCheckAll">
                                    <label class="custom-control-label"
                                           for="customCheckAll"><span class="text-hide">Toggle all</span></label>
                                </div>
                            </th>

                            <th>#</th>

                            <th >Name</th>

                            <th>Category</th>

                            <th>Phone</th>

                            <th>Status</th>

                            {{--<th style="width: 48px;">Budget</th>--}}

                            <th>Created</th>

                            <th ></th>
                        </tr>
                        </thead>
                        <tbody
                               id="projects">
                        @foreach($customers as $customer)
                            <tr class="">

                                <td class="pr-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox"
                                               class="custom-control-input "
                                               checked=""
                                               id="customCheck1_5">
                                        <label class="custom-control-label"
                                               for="customCheck1_5"><span class="text-hide">Check</span></label>
                                    </div>
                                </td>

                                <td></td>

                                <td>

                                    <div class="media flex-nowrap align-items-center"
                                         style="white-space: nowrap;">
                                        <div class="avatar avatar-sm mr-8pt">

                                            <img src="{{ asset('backend/images/people/110/guy-3.jpg') }}"
                                                 alt="Avatar"
                                                 class="avatar-img rounded-circle">

                                        </div>
                                        <div class="media-body">

                                            <div class="d-flex align-items-center">
                                                <div class="flex d-flex flex-column">
                                                    <p class="mb-0"><strong class="">{{ $customer->name }}</strong></p>
                                                    <small class="">{{ $customer->email }}</small>
                                                </div>
                                                <div class="d-flex align-items-center ml-24pt">
                                                    <i class="material-icons text-20 icon-16pt">message</i>
                                                    <small class="ml-4pt"><strong class="text-50">2</strong></small>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </td>

                                <td>

                                    <div class="media flex-nowrap align-items-center"
                                         style="white-space: nowrap;">
                                        <div class="avatar avatar-sm mr-8pt">
                                            <span class="avatar-title rounded bg-warning text-black-100">{{ $customer->UserCategory ? substr($customer->UserCategory->name, 0, 1):''  }}</span>
                                        </div>
                                        <div class="media-body">
                                            <div class="d-flex flex-column">
                                                <small class=""><strong>{{ $customer->UserCategory ? $customer->UserCategory->name:'' }}</strong></small>
                                                <small class=" text-50">{{ $customer->UserCategory ? $customer->UserCategory->status:'' }}</small>
                                                <span class="indicator-line rounded {{ $customer->UserCategory->status == 'active' ? 'bg-success':'bg-danger' }}"></span>
                                            </div>
                                        </div>
                                    </div>

                                </td>

                                <td>

                                    <a href="#"
                                       class="chip ">{{ $customer->phone }}</a>

                                </td>

                                <td>
                                    <div class="d-flex flex-column">
                                        <button class="btn btn-sm {{ $customer->status == 'active' ? 'btn-success':'btn-danger' }}">{{ $customer->status }}</button>
                                    </div>
                                </td>

                                {{--<td>
                                    <div class="d-flex flex-column">
                                        <small class=""><strong>&dollar;130</strong></small>
                                        <small class="text-danger">Overdue</small>
                                    </div>
                                </td>--}}

                                <td>
                                    <div class="d-flex flex-column">
                                        <small class=""><strong>{{ date("F j, Y, g:i a", strtotime($customer->created_at)) }}</strong></small>
                                        <small class="text-50">{{ $customer->created_at->diffForHumans() }}</small>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <a href="#" data-toggle="dropdown"
                                       class="btn text-50  text-70"><i class="material-icons">more_vert</i></a>
                                   {{-- <a href="#"
                                       class="btn btn-link dropdown-toggle text-70"
                                       data-toggle="dropdown"><i class="material-icons">more_vert</i></a>--}}
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('customers.show',$customer->id) }}" class="dropdown-item active"><i class="material-icons ">visibility</i> View</a>
                                        <a href="{{ route('customers.edit',$customer->id) }}" class="dropdown-item"><i class="material-icons ">edit</i> Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a onclick="event.preventDefault(); document.getElementById('delete-form{{ $customer->id }}').submit();" class="dropdown-item"><i class="material-icons ">delete</i> Delete</a>
                                        <form id="delete-form{{ $customer->id }}" action="{{ route('customers.destroy',$customer->id) }}" method="POST" class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>

                                       {{-- <a href="#" data-toggle="dropdown" data-caret="false" class="text-muted"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">

                                        </div>--}}

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th style="width: 18px;"
                                class="pr-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox"
                                           class="custom-control-input js-toggle-check-all"
                                           data-target="#projects"
                                           id="customCheckAll1">
                                    <label class="custom-control-label"
                                           for="customCheckAll1"><span class="text-hide">Toggle all</span></label>
                                </div>
                            </th>

                            <th>#</th>

                            <th >Name</th>

                            <th>Category</th>

                            <th>Phone</th>

                            <th>Status</th>

                            {{--<th style="width: 48px;">Budget</th>--}}

                            <th >Created</th>

                            <th ></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="card-footer p-8pt">

                    <ul class="pagination justify-content-start pagination-xsm m-0">
                       {{-- <li class="page-item disabled">
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
                        </li>--}}
                        <li class="text-right info-pagination"></li>
                    </ul>
                    {{--<div class="card-body text-right">
                       1 <span class="text-muted">of 15</span> <a href="#" class="text-muted-light"><i class="material-icons ml-1">arrow_forward</i></a>
                    </div>--}}
                </div>
            </div>
        </div>

        {{--<div id="demo_info">
            <div id="events">
                Row selected count - new information added at the top
            </div>
            <table border="0" cellspacing="5" cellpadding="5">
                <tbody><tr>
                    <td>Minimum age:</td>
                    <td><input type="text" id="min" name="min"></td>
                </tr>
                <tr>
                    <td>Maximum age:</td>
                    <td><input type="text" id="max" name="max"></td>
                </tr>
                </tbody></table>
            <button id="button">count</button>

        <table  class=" display table mb-0 thead-border-top-0" style="width:100%">
            <thead>
            <tr>
                <th></th>
                <th>#</th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td></td>
                <td></td>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>$170,750</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>2009/01/12</td>
                <td>$86,000</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Cedric Kelly</td>
                <td>Senior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2012/03/29</td>
                <td>$433,060</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Airi Satou</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>33</td>
                <td>2008/11/28</td>
                <td>$162,700</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Brielle Williamson</td>
                <td>Integration Specialist</td>
                <td>New York</td>
                <td>61</td>
                <td>2012/12/02</td>
                <td>$372,000</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Herrod Chandler</td>
                <td>Sales Assistant</td>
                <td>San Francisco</td>
                <td>59</td>
                <td>2012/08/06</td>
                <td>$137,500</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Rhona Davidson</td>
                <td>Integration Specialist</td>
                <td>Tokyo</td>
                <td>55</td>
                <td>2010/10/14</td>
                <td>$327,900</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Colleen Hurst</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>39</td>
                <td>2009/09/15</td>
                <td>$205,500</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Sonya Frost</td>
                <td>Software Engineer</td>
                <td>Edinburgh</td>
                <td>23</td>
                <td>2008/12/13</td>
                <td>$103,600</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Jena Gaines</td>
                <td>Office Manager</td>
                <td>London</td>
                <td>30</td>
                <td>2008/12/19</td>
                <td>$90,560</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Quinn Flynn</td>
                <td>Support Lead</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2013/03/03</td>
                <td>$342,000</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Charde Marshall</td>
                <td>Regional Director</td>
                <td>San Francisco</td>
                <td>36</td>
                <td>2008/10/16</td>
                <td>$470,600</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Haley Kennedy</td>
                <td>Senior Marketing Designer</td>
                <td>London</td>
                <td>43</td>
                <td>2012/12/18</td>
                <td>$313,500</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Tatyana Fitzpatrick</td>
                <td>Regional Director</td>
                <td>London</td>
                <td>19</td>
                <td>2010/03/17</td>
                <td>$385,750</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Michael Silva</td>
                <td>Marketing Designer</td>
                <td>London</td>
                <td>66</td>
                <td>2012/11/27</td>
                <td>$198,500</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Paul Byrd</td>
                <td>Chief Financial Officer (CFO)</td>
                <td>New York</td>
                <td>64</td>
                <td>2010/06/09</td>
                <td>$725,000</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Gloria Little</td>
                <td>Systems Administrator</td>
                <td>New York</td>
                <td>59</td>
                <td>2009/04/10</td>
                <td>$237,500</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Bradley Greer</td>
                <td>Software Engineer</td>
                <td>London</td>
                <td>41</td>
                <td>2012/10/13</td>
                <td>$132,000</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Dai Rios</td>
                <td>Personnel Lead</td>
                <td>Edinburgh</td>
                <td>35</td>
                <td>2012/09/26</td>
                <td>$217,500</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Jenette Caldwell</td>
                <td>Development Lead</td>
                <td>New York</td>
                <td>30</td>
                <td>2011/09/03</td>
                <td>$345,000</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Yuri Berry</td>
                <td>Chief Marketing Officer (CMO)</td>
                <td>New York</td>
                <td>40</td>
                <td>2009/06/25</td>
                <td>$675,000</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Caesar Vance</td>
                <td>Pre-Sales Support</td>
                <td>New York</td>
                <td>21</td>
                <td>2011/12/12</td>
                <td>$106,450</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Doris Wilder</td>
                <td>Sales Assistant</td>
                <td>Sydney</td>
                <td>23</td>
                <td>2010/09/20</td>
                <td>$85,600</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Angelica Ramos</td>
                <td>Chief Executive Officer (CEO)</td>
                <td>London</td>
                <td>47</td>
                <td>2009/10/09</td>
                <td>$1,200,000</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Gavin Joyce</td>
                <td>Developer</td>
                <td>Edinburgh</td>
                <td>42</td>
                <td>2010/12/22</td>
                <td>$92,575</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Jennifer Chang</td>
                <td>Regional Director</td>
                <td>Singapore</td>
                <td>28</td>
                <td>2010/11/14</td>
                <td>$357,650</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Brenden Wagner</td>
                <td>Software Engineer</td>
                <td>San Francisco</td>
                <td>28</td>
                <td>2011/06/07</td>
                <td>$206,850</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Fiona Green</td>
                <td>Chief Operating Officer (COO)</td>
                <td>San Francisco</td>
                <td>48</td>
                <td>2010/03/11</td>
                <td>$850,000</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Shou Itou</td>
                <td>Regional Marketing</td>
                <td>Tokyo</td>
                <td>20</td>
                <td>2011/08/14</td>
                <td>$163,000</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Michelle House</td>
                <td>Integration Specialist</td>
                <td>Sydney</td>
                <td>37</td>
                <td>2011/06/02</td>
                <td>$95,400</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Suki Burks</td>
                <td>Developer</td>
                <td>London</td>
                <td>53</td>
                <td>2009/10/22</td>
                <td>$114,500</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Prescott Bartlett</td>
                <td>Technical Author</td>
                <td>London</td>
                <td>27</td>
                <td>2011/05/07</td>
                <td>$145,000</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Gavin Cortez</td>
                <td>Team Leader</td>
                <td>San Francisco</td>
                <td>22</td>
                <td>2008/10/26</td>
                <td>$235,500</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Martena Mccray</td>
                <td>Post-Sales support</td>
                <td>Edinburgh</td>
                <td>46</td>
                <td>2011/03/09</td>
                <td>$324,050</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Unity Butler</td>
                <td>Marketing Designer</td>
                <td>San Francisco</td>
                <td>47</td>
                <td>2009/12/09</td>
                <td>$85,675</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Howard Hatfield</td>
                <td>Office Manager</td>
                <td>San Francisco</td>
                <td>51</td>
                <td>2008/12/16</td>
                <td>$164,500</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Hope Fuentes</td>
                <td>Secretary</td>
                <td>San Francisco</td>
                <td>41</td>
                <td>2010/02/12</td>
                <td>$109,850</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Vivian Harrell</td>
                <td>Financial Controller</td>
                <td>San Francisco</td>
                <td>62</td>
                <td>2009/02/14</td>
                <td>$452,500</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Timothy Mooney</td>
                <td>Office Manager</td>
                <td>London</td>
                <td>37</td>
                <td>2008/12/11</td>
                <td>$136,200</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Jackson Bradshaw</td>
                <td>Director</td>
                <td>New York</td>
                <td>65</td>
                <td>2008/09/26</td>
                <td>$645,750</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Olivia Liang</td>
                <td>Support Engineer</td>
                <td>Singapore</td>
                <td>64</td>
                <td>2011/02/03</td>
                <td>$234,500</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Bruno Nash</td>
                <td>Software Engineer</td>
                <td>London</td>
                <td>38</td>
                <td>2011/05/03</td>
                <td>$163,500</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Sakura Yamamoto</td>
                <td>Support Engineer</td>
                <td>Tokyo</td>
                <td>37</td>
                <td>2009/08/19</td>
                <td>$139,575</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Thor Walton</td>
                <td>Developer</td>
                <td>New York</td>
                <td>61</td>
                <td>2013/08/11</td>
                <td>$98,540</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Finn Camacho</td>
                <td>Support Engineer</td>
                <td>San Francisco</td>
                <td>47</td>
                <td>2009/07/07</td>
                <td>$87,500</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Serge Baldwin</td>
                <td>Data Coordinator</td>
                <td>Singapore</td>
                <td>64</td>
                <td>2012/04/09</td>
                <td>$138,575</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Zenaida Frank</td>
                <td>Software Engineer</td>
                <td>New York</td>
                <td>63</td>
                <td>2010/01/04</td>
                <td>$125,250</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Zorita Serrano</td>
                <td>Software Engineer</td>
                <td>San Francisco</td>
                <td>56</td>
                <td>2012/06/01</td>
                <td>$115,000</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Jennifer Acosta</td>
                <td>Junior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>43</td>
                <td>2013/02/01</td>
                <td>$75,650</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Cara Stevens</td>
                <td>Sales Assistant</td>
                <td>New York</td>
                <td>46</td>
                <td>2011/12/06</td>
                <td>$145,600</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Hermione Butler</td>
                <td>Regional Director</td>
                <td>London</td>
                <td>47</td>
                <td>2011/03/21</td>
                <td>$356,250</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Lael Greer</td>
                <td>Systems Administrator</td>
                <td>London</td>
                <td>21</td>
                <td>2009/02/27</td>
                <td>$103,500</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Jonas Alexander</td>
                <td>Developer</td>
                <td>San Francisco</td>
                <td>30</td>
                <td>2010/07/14</td>
                <td>$86,500</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Shad Decker</td>
                <td>Regional Director</td>
                <td>Edinburgh</td>
                <td>51</td>
                <td>2008/11/13</td>
                <td>$183,000</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Michael Bruce</td>
                <td>Javascript Developer</td>
                <td>Singapore</td>
                <td>29</td>
                <td>2011/06/27</td>
                <td>$183,000</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Donna Snider</td>
                <td>Customer Support</td>
                <td>New York</td>
                <td>27</td>
                <td>2011/01/25</td>
                <td>$112,000</td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th></th>
                <th>#</th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
            </tfoot>
        </table>
        </div>--}}
    </div>
@endsection
