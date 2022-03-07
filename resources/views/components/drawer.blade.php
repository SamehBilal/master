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

            <div class="sidebar-heading">{{ __('dashboard.Application') }}</div>
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item {{ set_active(['dashboard/dashboard'])}}">
                    <a class="sidebar-menu-button"
                       href="{{ route('dashboard') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">dashboard</span>
                        {{ __('dashboard.Dashboard') }}
                    </a>
                </li>
                <li class="sidebar-menu-item {{ set_active(['dashboard/orders*'],'active open')}}">
                    <a class="sidebar-menu-button js-sidebar-collapse"
                       data-toggle="collapse"
                       href="#student_menu">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">shopping_cart</span>
                        {{ __('dashboard.Orders') }}
                        {{--<span class="sidebar-menu-badge badge badge-accent badge-notifications ml-auto">2</span>
                        <span class="sidebar-menu-toggle-icon"></span>--}}
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>
                    <ul class="sidebar-submenu collapse {{ set_active(['dashboard/orders*'],'show')}} sm-indent"
                        id="student_menu">
                        @can('view orders')
                        <li class="sidebar-menu-item {{ set_active(['dashboard/orders'])}}">
                            <a class="sidebar-menu-button"
                               href="{{ route('dashboard.orders.index') }}">
                                <span class="sidebar-menu-text">{{ __('dashboard.All_orders') }}</span>
                            </a>
                        </li>
                        @endcan
                        @can('create orders')
                        <li class="sidebar-menu-item {{ set_active(['dashboard/orders/create'])}}">
                            <a class="sidebar-menu-button"
                               href="{{ route('dashboard.orders.create') }}">
                                <span class="sidebar-menu-text">{{ __('dashboard.Single_order') }}</span>
                            </a>
                        </li>
                        @endcan 
                        @can('create multi orders')
                        <li class="sidebar-menu-item {{ set_active(['dashboard/orders/create/multi'])}}">
                            <a class="sidebar-menu-button"
                               href="{{ route('dashboard.orders.create.multi') }}">
                                <span class="sidebar-menu-text">{{ __('dashboard.Multi_orders') }}</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @can('view pickups')
                <li class="sidebar-menu-item {{ set_active(['dashboard/pickups*'])}}">
                    <a class="sidebar-menu-button"
                       href="{{ route('dashboard.pickups.index') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">map</span>
                        {{ __('dashboard.Pickups') }}
                    </a>
                </li>
                @endcan
                @can('view tickets')
                <li class="sidebar-menu-item {{ set_active(['dashboard/tickets*'])}}">
                    <a class="sidebar-menu-button"
                       href="{{ route('dashboard.tickets.index') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">confirmation_number</span>
                        {{ __('dashboard.Support_Tickets') }}
                    </a>
                </li>
                @endcan
            </ul>

            <div class="sidebar-heading">{{ __('dashboard.Website') }}</div>
            <ul class="sidebar-menu">
                @can('view subscribers')
                <li class="sidebar-menu-item {{ set_active(['dashboard/subscribers*'])}}">
                    <a class="sidebar-menu-button"
                       href="{{ route('dashboard.subscribers.index') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">card_membership</span>
                        {{ __('dashboard.Subscribers') }}
                    </a>
                </li>
                @endcan
                @can('view contact form')
                <li class="sidebar-menu-item {{ set_active(['dashboard/contact-forms*'])}}">
                    <a class="sidebar-menu-button"
                       href="{{ route('dashboard.contact-forms.index') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">insert_drive_file</span>
                        {{ __('dashboard.Contact_Forms') }}
                    </a>
                </li>
                @endcan
                @can('view pickups')
                    <li class="sidebar-menu-item {{ set_active(['dashboard/pickups*'])}}">
                        <a class="sidebar-menu-button"
                        href="{{ route('dashboard.pickups.index') }}">
                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">map</span>
                            {{ __('dashboard.Pickups') }}
                        </a>
                    </li>
                @endcan
                @can('view tickets')
                    <li class="sidebar-menu-item {{ set_active(['dashboard/tickets*'])}}">
                        <a class="sidebar-menu-button"
                        href="{{ route('dashboard.tickets.index') }}">
                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">confirmation_number</span>
                            {{ __('dashboard.Support_Tickets') }}
                        </a>
                    </li>
                @endcan
                @can('view subscribers')
                    <li class="sidebar-menu-item {{ set_active(['dashboard/subscribers*'])}}">
                        <a class="sidebar-menu-button"
                        href="{{ route('dashboard.subscribers.index') }}">
                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">card_membership</span>
                            {{ __('dashboard.Subscribers') }}
                        </a>
                    </li>
                @endcan
                @can('view contact form')
                    <li class="sidebar-menu-item {{ set_active(['dashboard/contact-forms*'])}}">
                        <a class="sidebar-menu-button"
                        href="{{ route('dashboard.contact-forms.index') }}">
                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">insert_drive_file</span>
                            {{ __('dashboard.Contact_Forms') }}
                        </a>
                    </li>
                @endcan
            </ul>
            <div class="sidebar-heading">{{ __('dashboard.Users') }}</div>
            <ul class="sidebar-menu">
                @can('view customers')
                    <li class="sidebar-menu-item {{ set_active(['dashboard/customers*'])}}">
                        <a class="sidebar-menu-button"
                        href="{{ route('dashboard.customers.index') }}">
                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">person</span>
                            {{ __('dashboard.Customers') }}
                        </a>
                    </li>
                @endcan
                @can('view businesses')
                    <li class="sidebar-menu-item {{ set_active(['dashboard/businesses*'])}}">
                        <a class="sidebar-menu-button"
                        href="{{ route('dashboard.businesses.index') }}">
                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">business</span>
                            Business
                        </a>
                    </li>
                @endcan
                @can('view contacts')
                    <li class="sidebar-menu-item {{ set_active(['dashboard/contacts*'])}}">
                        <a class="sidebar-menu-button"
                        href="{{ route('dashboard.contacts.index') }}">
                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">perm_contact_calendar</span>
                            {{ __('dashboard.Contacts') }}
                        </a>
                    </li>
                @endcan
                @can('view user categories')
                    <li class="sidebar-menu-item {{ set_active(['dashboard/user-categories*'])}}">
                        <a class="sidebar-menu-button"
                        href="{{ route('dashboard.user-categories.index') }}">
                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">badge</span>
                            {{ __('dashboard.User_Categories') }}
                        </a>
                    </li>
                @endcan
                @can('view users')
                    <li class="sidebar-menu-item {{ set_active(['dashboard/users*'])}}">
                        <a class="sidebar-menu-button"
                        href="{{ route('dashboard.users.index') }}">
                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">group</span>
                            {{ __('dashboard.All_Users') }}
                        </a>
                    </li>
                @endcan
            </ul>

            <div class="sidebar-heading">{{ __('dashboard.Setup') }}</div>
            <ul class="sidebar-menu">
                {{--<li class="sidebar-menu-item {{ set_active(['dashboard/currencies*'])}}">
                    <a class="sidebar-menu-button"
                       href="{{ route('dashboard.currencies.index') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">monetization_on</span>
                        {{ __('dashboard.Currencies') }}
                    </a>
                </li>--}}
                @can('view locations')
                <li class="sidebar-menu-item {{ set_active(['dashboard/locations*'])}}">
                    <a class="sidebar-menu-button"
                       href="{{ route('dashboard.locations.index') }}">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">map</span>
                        {{ __('dashboard.Locations') }}
                    </a>
                </li>
                @endcan
                @can('view roles','view permissions')
                <li class="sidebar-menu-item {{ set_active(['dashboard/roles*','dashboard/permissions*'],'active open')}}">
                    <a class="sidebar-menu-button js-sidebar-collapse"
                       data-toggle="collapse"
                       href="#role_menu">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">security</span>
                        {{ __('dashboard.Permissions') }}
                        {{--<span class="sidebar-menu-badge badge badge-accent badge-notifications ml-auto">2</span>
                        <span class="sidebar-menu-toggle-icon"></span>--}}
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>
                    <ul class="sidebar-submenu collapse {{ set_active(['dashboard/roles*','dashboard/permissions*'],'show')}} sm-indent"
                        id="role_menu">
                        @can('view roles')
                            <li class="sidebar-menu-item {{ set_active(['dashboard/roles'])}}">
                                <a class="sidebar-menu-button"
                                href="{{ route('dashboard.roles.index') }}">
                                    <span class="sidebar-menu-text">{{ __('dashboard.Roles') }}</span>
                                </a>
                            </li>
                        @endcan
                        @can('view permissions')
                            <li class="sidebar-menu-item {{ set_active(['dashboard/permissions*'])}}">
                                <a class="sidebar-menu-button"
                                href="{{ route('dashboard.permissions.index') }}">
                                    <span class="sidebar-menu-text">{{ __('dashboard.Permissions') }}</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
                @endcan
                <li class="sidebar-menu-item {{ set_active(['dashboard/settings*'],'active open')}}">
                    <a class="sidebar-menu-button js-sidebar-collapse"
                       data-toggle="collapse"
                       href="#settings_menu">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">settings</span>
                        {{ __('dashboard.Settings') }}
                        {{--<span class="sidebar-menu-badge badge badge-accent badge-notifications ml-auto">2</span>
                        <span class="sidebar-menu-toggle-icon"></span>--}}
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>
                    <ul class="sidebar-submenu collapse {{ set_active(['dashboard/settings*'],'show')}} sm-indent"
                        id="settings_menu">
                        <li class="sidebar-menu-item {{ set_active(['dashboard/settings/profile'])}}">
                            <a class="sidebar-menu-button"
                               href="{{ route('dashboard.settings.profile') }}">
                                <span class="sidebar-menu-text">{{ __('dashboard.Profile') }}</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item {{ set_active(['dashboard/settings/language'])}}">
                            <a class="sidebar-menu-button"
                               href="{{ route('dashboard.settings.language') }}">
                                <span class="sidebar-menu-text">{{ __('dashboard.Language') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- // END Sidebar Content -->
        </div>
    </div>
</div>
