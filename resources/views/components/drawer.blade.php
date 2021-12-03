<div class="mdk-drawer js-mdk-drawer"
     id="default-drawer">
    <div class="mdk-drawer__content">
        <div class="sidebar sidebar-dark-pickled-bluewood sidebar-left"
             data-perfect-scrollbar>

            <!-- Sidebar Content -->

            {{--<div class="d-flex align-items-center navbar-height">
                <form action="{{ route('dashboard') }}"
                      class="search-form search-form--black mx-16pt pr-0 pl-16pt">
                    <input type="text"
                           class="form-control pl-0"
                           placeholder="Search">
                    <button class="btn"
                            type="submit"><i class="material-icons">search</i></button>
                </form>
            </div>--}}

            <a href="{{ route('dashboard') }}"
               class="sidebar-brand ">
               {{-- <img class="sidebar-brand-icon" src="{{ asset('backend/images/illustration/student/128/white.svg') }}" alt="Luma">--}}

                <span class="avatar avatar-xl sidebar-brand-icon h-auto">
                    <span class="avatar-title rounded bg-transparent"><img src="{{ asset('backend/images/illustration/student/128/black.png') }}"
                                                                       class="img-fluid"
                                                                       alt="logo" /></span>

                            </span>

                <span>{{ config('app.name', 'Laravel') }}</span>
            </a>

            <div class="sidebar-heading">Application</div>
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item {{ set_active(['dashboard/dashboard'])}}">
                    <a class="sidebar-menu-button"
                       href="{{ route('dashboard') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">dashboard</span>
                        Dashboard
                    </a>
                </li>
                <li class="sidebar-menu-item {{ set_active(['dashboard/orders*'],'active open')}}">
                    <a class="sidebar-menu-button js-sidebar-collapse"
                       data-toggle="collapse"
                       href="#student_menu">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">shopping_cart</span>
                        Orders
                        {{--<span class="sidebar-menu-badge badge badge-accent badge-notifications ml-auto">2</span>
                        <span class="sidebar-menu-toggle-icon"></span>--}}
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>
                    <ul class="sidebar-submenu collapse {{ set_active(['dashboard/orders*'],'show')}} sm-indent"
                        id="student_menu">
                        <li class="sidebar-menu-item {{ set_active(['dashboard/orders'])}}">
                            <a class="sidebar-menu-button"
                               href="{{ route('dashboard.orders.index') }}">
                                <span class="sidebar-menu-text">All orders</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item {{ set_active(['dashboard/orders/create'])}}">
                            <a class="sidebar-menu-button"
                               href="{{ route('dashboard.orders.create') }}">
                                <span class="sidebar-menu-text">Single order</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item {{ set_active(['dashboard/orders/create/multi'])}}">
                            <a class="sidebar-menu-button"
                               href="{{ route('dashboard.orders.create.multi') }}">
                                <span class="sidebar-menu-text">Multi orders</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-menu-item {{ set_active(['dashboard/pickups*'])}}">
                    <a class="sidebar-menu-button"
                       href="{{ route('dashboard.pickups.index') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">map</span>
                        Pickups
                    </a>
                </li>
                <li class="sidebar-menu-item {{ set_active(['dashboard/tickets*'])}}">
                    <a class="sidebar-menu-button"
                       href="{{ route('dashboard.tickets.index') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">confirmation_number</span>
                        Support Tickets
                    </a>
                </li>
                <li class="sidebar-menu-item {{ set_active(['dashboard/subscribers*'])}}">
                    <a class="sidebar-menu-button"
                       href="{{ route('dashboard.subscribers.index') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">card_membership</span>
                        Subscribers
                    </a>
                </li>
                <li class="sidebar-menu-item {{ set_active(['dashboard/contact-forms*'])}}">
                    <a class="sidebar-menu-button"
                       href="{{ route('dashboard.contact-forms.index') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">insert_drive_file</span>
                        Contact Forms
                    </a>
                </li>
            </ul>
            <div class="sidebar-heading">Users</div>
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item {{ set_active(['dashboard/customers*'])}}">
                    <a class="sidebar-menu-button"
                       href="{{ route('dashboard.customers.index') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">person</span>
                        Customers
                    </a>
                </li>
                <li class="sidebar-menu-item {{ set_active(['dashboard/contacts*'])}}">
                    <a class="sidebar-menu-button"
                       href="{{ route('dashboard.contacts.index') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">perm_contact_calendar</span>
                        Contacts
                    </a>
                </li>
                <li class="sidebar-menu-item {{ set_active(['dashboard/user-categories*'])}}">
                    <a class="sidebar-menu-button"
                       href="{{ route('dashboard.user-categories.index') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">badge</span>
                        User Categories
                    </a>
                </li>
                <li class="sidebar-menu-item {{ set_active(['dashboard/users*'])}}">
                    <a class="sidebar-menu-button"
                       href="{{ route('dashboard.users.index') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">group</span>
                        All Users
                    </a>
                </li>
            </ul>

            <div class="sidebar-heading">Setup</div>
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item {{ set_active(['dashboard/currencies*'])}}">
                    <a class="sidebar-menu-button"
                       href="{{ route('dashboard.currencies.index') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">monetization_on</span>
                        Currencies
                    </a>
                </li>
                <li class="sidebar-menu-item {{ set_active(['dashboard/locations*'])}}">
                    <a class="sidebar-menu-button"
                       href="{{ route('dashboard.locations.index') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">map</span>
                        Locations
                    </a>
                </li>

                <li class="sidebar-menu-item {{ set_active(['dashboard/settings*'],'active open')}}">
                    <a class="sidebar-menu-button js-sidebar-collapse"
                       data-toggle="collapse"
                       href="#settings_menu">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">settings</span>
                        Settings
                        {{--<span class="sidebar-menu-badge badge badge-accent badge-notifications ml-auto">2</span>
                        <span class="sidebar-menu-toggle-icon"></span>--}}
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>
                    <ul class="sidebar-submenu collapse {{ set_active(['dashboard/settings*'],'show')}} sm-indent"
                        id="settings_menu">
                        <li class="sidebar-menu-item {{ set_active(['dashboard/settings/profile'])}}">
                            <a class="sidebar-menu-button"
                               href="{{ route('dashboard.settings.profile') }}">
                                <span class="sidebar-menu-text">Profile</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- // END Sidebar Content -->
        </div>
    </div>
</div>
