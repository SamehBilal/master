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
    <div class="dropdown-menu dropdown-menu-right">
        <div data-perfect-scrollbar
             class="position-relative">
            <div class="dropdown-header"><strong>{{ __('dashboard.System_notifications') }}</strong></div>
            <div class="list-group list-group-flush mb-0">
                @if(count($user->unreadnotifications) > 0)
                    @foreach($user->unreadnotifications as $note)
                        @if($note->type == 'App\Notifications\NewBusiness')
                        @elseif($note->type == 'App\Notifications\NewContactForm')
                        @elseif($note->type == 'App\Notifications\NewOrder')
                        @elseif($note->type == 'App\Notifications\NewPickup')
                        @elseif($note->type == 'App\Notifications\NewSubscriber')
                        @elseif($note->type == 'App\Notifications\NewTicket')
                        @elseif($note->type == 'App\Notifications\NewTicketChat')
                        @elseif($note->type == 'App\Notifications\NewUser')
                        @elseif($note->type == 'App\Notifications\OrderLog')
                        @elseif($note->type == 'App\Notifications\UpdatedOrder')
                        @elseif($note->type == 'App\Notifications\UpdatedPickup')
                        @elseif($note->type == 'App\Notifications\UpdatedTicket')
                            <a href="javascript:void(0);"
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

                                    <span class="text-black-70">{{ $note['data']['name'] }}Your profile information has not been synced correctly.</span>
                                </span>
                            </span>
                            </a>
                        @endif
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
