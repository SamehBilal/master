<div class="nav-item ml-16pt dropdown dropdown-notifications dropdown-xs-down-full"
     data-toggle="tooltip"
     data-title="{{ __('dashboard.Notifications') }}"
     data-placement="bottom"
     data-boundary="window">
    <button class="nav-link btn-flush dropdown-toggle"
            type="button"
            data-toggle="dropdown"
            data-caret="false">
        <i class="material-icons">notifications_none</i>
        @php $user = Auth::user(); @endphp
        @if(count($user->unreadnotifications) > 0)
            <span class="badge badge-notifications badge-accent">{{ $user->unreadnotifications->count() }}</span>
        @endif
    </button>
    <div class="dropdown-menu dropdown-menu-right" >
        <div data-perfect-scrollbar
             class="position-relative" style="{{ count($user->unreadnotifications) > 0 ? 'height:320px;':'' }}">
            <div class="dropdown-header"><strong>{{ __('dashboard.System_notifications') }}</strong></div>
            <div class="list-group list-group-flush mb-0">
                @if(count($user->unreadnotifications) > 0)
                    @foreach($user->unreadnotifications as $note)
                       @switch($note->type)
                            @case('App\Notifications\NewBusiness')
                                <a href="{{ route('dashboard.business.index') }}"
                                    class="list-group-item list-group-item-action unread notification">
                                    <input type="hidden" class="notificatin_id" value="{{ $note->id }}">
                                    <span class="d-flex align-items-center mb-1">
                                        <small class="text-black-50">{{ $note->created_at->diffForHumans() }}</small>

                                        <span class="ml-auto unread-indicator bg-accent"></span>

                                    </span>
                                    <span class="d-flex">
                                        <span class="avatar avatar-xs mr-2">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <i class="material-icons font-size-16pt text-accent">account_circle</i>
                                            </span>
                                        </span>
                                        <span class="flex d-flex flex-column">

                                            <span class="text-black-70">{{ __('dashboard.A new business from') }} {{ DB::table('users')->where('id',$note['data']['business_user_id'])->value('full_name') }}</span>
                                        </span>
                                    </span>
                                </a>
                            @break
                            @case('App\Notifications\NewContactForm')
                                <a href="{{ route('dashboard.contact-forms.index') }}"
                                    class="list-group-item list-group-item-action unread notification">
                                    <input type="hidden" class="notificatin_id" value="{{ $note->id }}">
                                    <span class="d-flex align-items-center mb-1">
                                        <small class="text-black-50">{{ $note->created_at->diffForHumans() }}</small>

                                        <span class="ml-auto unread-indicator bg-accent"></span>

                                    </span>
                                    <span class="d-flex">
                                        <span class="avatar avatar-xs mr-2">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <i class="material-icons font-size-16pt text-accent">account_circle</i>
                                            </span>
                                        </span>
                                        <span class="flex d-flex flex-column">

                                            <span class="text-black-70">{{ __('dashboard.A new contact form from') }}{{ $note['data']['name'] }}</span>
                                        </span>
                                    </span>
                                </a>
                            @break
                            @case('App\Notifications\NewCourier')
                                <a href="{{ $note['data']['url'] }}"
                                   class="list-group-item list-group-item-action unread notification">
                                    <input type="hidden" class="notificatin_id" value="{{ $note->id }}">
                                    <span class="d-flex align-items-center mb-1">
                                        <small class="text-black-50">{{ $note->created_at->diffForHumans() }}</small>

                                        <span class="ml-auto unread-indicator bg-accent"></span>

                                    </span>
                                    <span class="d-flex">
                                        <span class="avatar avatar-xs mr-2">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <i class="material-icons font-size-16pt text-accent">account_circle</i>
                                            </span>
                                        </span>
                                        <span class="flex d-flex flex-column">
                                            @php $locale = session()->get('locale'); @endphp
                                            @if($locale == 'ar')
                                                <span class="text-black-70"> <a href="{{ $note['data']['url'] }}">طلب/طلب التقاط</a>  جديد تم تعيينه لك</span>
                                            @else
                                                <span class="text-black-70">A new <a href="{{ $note['data']['url'] }}">order/pickup</a> has been assigned to you.</span>
                                            @endif
                                        </span>
                                    </span>
                                </a>
                                @break
                            @case('App\Notifications\NewOrder')
                                <a href="{{ route('dashboard.orders.show',$note['data']['id']) }}"
                                    class="list-group-item list-group-item-action unread notification">
                                    <input type="hidden" class="notificatin_id" value="{{ $note->id }}">
                                    <span class="d-flex align-items-center mb-1">
                                        <small class="text-black-50">{{ $note->created_at->diffForHumans() }}</small>

                                        <span class="ml-auto unread-indicator bg-accent"></span>

                                    </span>
                                    <span class="d-flex">
                                        <span class="avatar avatar-xs mr-2">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <i class="material-icons font-size-16pt text-accent">account_circle</i>
                                            </span>
                                        </span>
                                        <span class="flex d-flex flex-column">

                                            <span class="text-black-70">{{ __('dashboard.A new order from') }} {{ DB::table('users')->where('id',$note['data']['business_user_id'])->value('full_name') }}</span>
                                        </span>
                                    </span>
                                </a>
                            @break
                            @case('App\Notifications\NewOrderCustomer')
                                <a href="{{ route('dashboard.orders.show',$note['data']['id']) }}"
                                   class="list-group-item list-group-item-action unread notification">
                                    <input type="hidden" class="notificatin_id" value="{{ $note->id }}">
                                    <span class="d-flex align-items-center mb-1">
                                        <small class="text-black-50">{{ $note->created_at->diffForHumans() }}</small>

                                        <span class="ml-auto unread-indicator bg-accent"></span>

                                    </span>
                                    <span class="d-flex">
                                        <span class="avatar avatar-xs mr-2">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <i class="material-icons font-size-16pt text-accent">account_circle</i>
                                            </span>
                                        </span>
                                        <span class="flex d-flex flex-column">

                                            <span class="text-black-70">{{ __('dashboard.Your order has been created') }} ({{ $note['data']['tracking_no'] }})</span>
                                        </span>
                                    </span>
                                </a>
                            @break
                            @case('App\Notifications\NewPickup')
                                <a href="{{ route('dashboard.pickups.show',$note['data']['id']) }}"
                                    class="list-group-item list-group-item-action unread notification">
                                    <input type="hidden" class="notificatin_id" value="{{ $note->id }}">
                                    <span class="d-flex align-items-center mb-1">
                                        <small class="text-black-50">{{ $note->created_at->diffForHumans() }}</small>

                                        <span class="ml-auto unread-indicator bg-accent"></span>

                                    </span>
                                    <span class="d-flex">
                                        <span class="avatar avatar-xs mr-2">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <i class="material-icons font-size-16pt text-accent">account_circle</i>
                                            </span>
                                        </span>
                                        <span class="flex d-flex flex-column">

                                            <span class="text-black-70">{{ __('dashboard.A new pickup from') }} {{ DB::table('users')->where('id',$note['data']['business_user_id'])->value('full_name') }}</span>
                                        </span>
                                    </span>
                                </a>
                            @break
                            @case('App\Notifications\NewPickupCustomer')
                                <a href="{{ route('dashboard.pickups.show',$note['data']['id']) }}"
                                   class="list-group-item list-group-item-action unread notification">
                                    <input type="hidden" class="notificatin_id" value="{{ $note->id }}">
                                    <span class="d-flex align-items-center mb-1">
                                        <small class="text-black-50">{{ $note->created_at->diffForHumans() }}</small>

                                        <span class="ml-auto unread-indicator bg-accent"></span>

                                    </span>
                                    <span class="d-flex">
                                        <span class="avatar avatar-xs mr-2">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <i class="material-icons font-size-16pt text-accent">account_circle</i>
                                            </span>
                                        </span>
                                        <span class="flex d-flex flex-column">

                                            <span class="text-black-70">{{ __('dashboard.Your pickup has been created') }} ({{ $note['data']['pickup_id'] }})</span>
                                        </span>
                                    </span>
                                </a>
                            @break
                            @case('App\Notifications\NewSubscriber')
                                <a href="{{ route('dashboard.subscribers.index') }}"
                                    class="list-group-item list-group-item-action unread notification">
                                    <input type="hidden" class="notificatin_id" value="{{ $note->id }}">
                                    <span class="d-flex align-items-center mb-1">
                                        <small class="text-black-50">{{ $note->created_at->diffForHumans() }}</small>

                                        <span class="ml-auto unread-indicator bg-accent"></span>

                                    </span>
                                    <span class="d-flex">
                                        <span class="avatar avatar-xs mr-2">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <i class="material-icons font-size-16pt text-accent">account_circle</i>
                                            </span>
                                        </span>
                                        <span class="flex d-flex flex-column">

                                            <span class="text-black-70">{{ __('dashboard.A new subscribe from') }} {{ $note['data']['email'] }}</span>
                                        </span>
                                    </span>
                                </a>
                            @break
                            @case('App\Notifications\NewTicket')
                                <a href="{{ route('dashboard.tickets.index') }}"
                                    class="list-group-item list-group-item-action unread notification">
                                    <input type="hidden" class="notificatin_id" value="{{ $note->id }}">
                                    <span class="d-flex align-items-center mb-1">
                                        <small class="text-black-50">{{ $note->created_at->diffForHumans() }}</small>

                                        <span class="ml-auto unread-indicator bg-accent"></span>

                                    </span>
                                    <span class="d-flex">
                                        <span class="avatar avatar-xs mr-2">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <i class="material-icons font-size-16pt text-accent">account_circle</i>
                                            </span>
                                        </span>
                                        <span class="flex d-flex flex-column">

                                            <span class="text-black-70">{{ __('dashboard.A new ticket from') }} {{ DB::table('users')->where('id',$note['data']['user_id'])->value('full_name') }} </span>
                                        </span>
                                    </span>
                                </a>
                            @break
                            @case('App\Notifications\NewTicketChat')
                                <a href="{{ route('dashboard.tickets.index').'?ticket_id='.$note['data']['ticket_id'] }}"
                                    class="list-group-item list-group-item-action unread notification">
                                    <input type="hidden" class="notificatin_id" value="{{ $note->id }}">
                                    <span class="d-flex align-items-center mb-1">
                                        <small class="text-black-50">{{ $note->created_at->diffForHumans() }}</small>

                                        <span class="ml-auto unread-indicator bg-accent"></span>

                                    </span>
                                    <span class="d-flex">
                                        <span class="avatar avatar-xs mr-2">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <i class="material-icons font-size-16pt text-accent">account_circle</i>
                                            </span>
                                        </span>
                                        <span class="flex d-flex flex-column">

                                            <span class="text-black-70">{{ __('dashboard.A new ticket message from') }} {{ DB::table('users')->where('id',$note['data']['user_id'])->value('full_name') }}</span>
                                        </span>
                                    </span>
                                </a>
                            @break
                            @case('App\Notifications\NewUser')
                                <a href="{{ route('dashboard.users.index') }}"
                                    class="list-group-item list-group-item-action unread notification">
                                    <input type="hidden" class="notificatin_id" value="{{ $note->id }}">
                                    <span class="d-flex align-items-center mb-1">
                                        <small class="text-black-50">{{ $note->created_at->diffForHumans() }}</small>

                                        <span class="ml-auto unread-indicator bg-accent"></span>

                                    </span>
                                    <span class="d-flex">
                                        <span class="avatar avatar-xs mr-2">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <i class="material-icons font-size-16pt text-accent">account_circle</i>
                                            </span>
                                        </span>
                                        <span class="flex d-flex flex-column">

                                            <span class="text-black-70">{{ __('dashboard.A new user has been created with the email of') }} ({{ $note['data']['email'] }})</span>
                                        </span>
                                    </span>
                                </a>
                            @break
                            @case('App\Notifications\OrderLog')
                                <a href="{{--javascript:void(0);--}}{{ route('dashboard.orders.show',$note['data']['id']) }}"
                                    class="list-group-item list-group-item-action unread notification">
                                    <input type="hidden" class="notificatin_id" value="{{ $note->id }}">
                                    <span class="d-flex align-items-center mb-1">
                                        <small class="text-black-50">{{ $note->created_at->diffForHumans() }}</small>

                                        <span class="ml-auto unread-indicator bg-accent"></span>

                                    </span>
                                    <span class="d-flex">
                                        <span class="avatar avatar-xs mr-2">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <i class="material-icons font-size-16pt text-accent">account_circle</i>
                                            </span>
                                        </span>
                                        <span class="flex d-flex flex-column">

                                            <span class="text-black-70">{{ __('dashboard.A new order log for') }} ({{ $note['data']['order_tracking_no'] }})</span>
                                        </span>
                                    </span>
                                </a>
                            @break
                            @case('App\Notifications\UpdatedOrder')
                                <a href="{{ route('dashboard.orders.show',$note['data']['id']) }}"
                                    class="list-group-item list-group-item-action unread notification">
                                    <input type="hidden" class="notificatin_id" value="{{ $note->id }}">
                                    <span class="d-flex align-items-center mb-1">
                                        <small class="text-black-50">{{ $note->created_at->diffForHumans() }}</small>

                                        <span class="ml-auto unread-indicator bg-accent"></span>

                                    </span>
                                    <span class="d-flex">
                                        <span class="avatar avatar-xs mr-2">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <i class="material-icons font-size-16pt text-accent">account_circle</i>
                                            </span>
                                        </span>
                                        <span class="flex d-flex flex-column">

                                            <span class="text-black-70">{{ __('Order with tracking No.') }} ({{ $note['data']['tracking_no'] }}) {{ __('dashboard.has been updated') }}</span>
                                        </span>
                                    </span>
                                </a>
                            @break
                            @case('App\Notifications\UpdatedPickup')
                                <a href="{{ route('dashboard.pickups.show',$note['data']['id']) }}"
                                    class="list-group-item list-group-item-action unread notification">
                                    <input type="hidden" class="notificatin_id" value="{{ $note->id }}">
                                    <span class="d-flex align-items-center mb-1">
                                        <small class="text-black-50">{{ $note->created_at->diffForHumans() }}</small>

                                        <span class="ml-auto unread-indicator bg-accent"></span>

                                    </span>
                                    <span class="d-flex">
                                        <span class="avatar avatar-xs mr-2">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <i class="material-icons font-size-16pt text-accent">account_circle</i>
                                            </span>
                                        </span>
                                        <span class="flex d-flex flex-column">

                                            <span class="text-black-70">{{ __('Pickup with tracking No.') }} ({{ $note['data']['pickup_id'] }}) {{ __('dashboard.has been updated') }}</span>
                                        </span>
                                    </span>
                                </a>
                            @break
                            @case('App\Notifications\UpdatedTicket')
                                <a href="{{ route('dashboard.tickets.index') }}"
                                    class="list-group-item list-group-item-action unread notification">
                                    <input type="hidden" class="notificatin_id" value="{{ $note->id }}">
                                    <span class="d-flex align-items-center mb-1">
                                        <small class="text-black-50">{{ $note->created_at->diffForHumans() }}</small>

                                        <span class="ml-auto unread-indicator bg-accent"></span>

                                    </span>
                                    <span class="d-flex">
                                        <span class="avatar avatar-xs mr-2">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <i class="material-icons font-size-16pt text-accent">account_circle</i>
                                            </span>
                                        </span>
                                        <span class="flex d-flex flex-column">

                                            <span class="text-black-70">{{ __('Ticket with tracking No.') }} ({{ $note['data']['tracking_number'] }}) {{ __('dashboard.has been updated') }}</span>
                                        </span>
                                    </span>
                                </a>
                            @break
                            @default
                        @endswitch
                    @endforeach
                @else
                    <a href="javascript:void(0);"
                       class="list-group-item list-group-item-action unread">
                        <span class="d-flex">
                            <span class="avatar avatar-sm mr-2">
                                <span class="avatar-title rounded-circle bg-light">
                                    <img src="{{ asset('backend/images/icon/disable-alarm.png') }}" alt="Avatar" class="avatar-img rounded">
                                </span>
                            </span>
                            <span class="flex d-flex flex-column">
                                <span class="text-black-70">{{ __('dashboard.No_New_Notifications') }}</span>
                            </span>
                        </span>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
