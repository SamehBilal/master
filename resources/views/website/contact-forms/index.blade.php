@extends('layouts.backend')

@section('title')
{{ __('content.Website_messages') }}
@endsection

@section('links')
    <li class="breadcrumb-item active">
        {{ __('content.Website_messages') }}
    </li>
@endsection

@section('button-link')
    #
@endsection

@section('button-icon')
    dashboard
@endsection

@section('button-title')
{{ __('dashboard.Dashboard') }}
@endsection

@section('main_content')
    <div class="container page__container">
        <div class="page-section">

            <div class="page-separator">
                <div class="page-separator__text">{{ __('content.Website_messages') }}</div>
            </div>

            <div class="card dashboard-area-tabs p-relative o-hidden mb-32pt">

                <div class="table-responsive">
                    <table
                        class=" display table mb-0 thead-border-top-0 table-nowrap"
                        style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>

                            <th>{{ __('dashboard.Name') }}</th>

                            <th>{{ __('dashboard.Email') }}</th>

                            <th>{{ __('dashboard.Message') }}</th>

                            <th>{{ __('dashboard.Created_At') }}</th>

                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="projects">
                        @php $count = 1; @endphp
                        @forelse($contactforms as $forms)
                            <tr class="">
                                <td>{{ $count }}</td>

                                <td>
                                    <div class="media flex-nowrap align-items-center"
                                         style="white-space: nowrap;">
                                        <div class="avatar avatar-sm mr-8pt">
                                            <span class="avatar-title rounded bg-warning text-black-100">{{ initials($forms->name) }}</span>
                                        </div>
                                        <div class="media-body">
                                            <div class="d-flex flex-column">
                                                <small class=""><strong>{{ $forms->name }}</strong></small>
                                                {{-- <small class=" text-50">{{ $customer->UserCategory ? $customer->UserCategory->status:'' }}</small> --}}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>

                                    <a href="#"
                                       class="chip ">{{ $forms->email }}</a>
                                </td>

                                <td>
                                    <a href="#"
                                       class="chip chip-outline-secondary">{{ strlen($forms->message) > 25 ? substr($forms->message, 0, 20).'....':$forms->message }}</a>
                                </td>

                                <td>
                                    <div class="d-flex flex-column">
                                        <small class=""><strong>{{ date("F j, Y", strtotime($forms->created_at)) }}</strong></small>
                                        <small class="text-50">{{ $forms->created_at->diffForHumans() }}</small>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <a href="{{ route('dashboard.contact-forms.show',$forms->id) }}" class=" active"><i class="material-icons ">visibility</i> </a>
                                </td>
                            </tr>
                            @php $count++ @endphp
                        @empty
                            <td></td>
                            <td colspan="3"><h4>{{ __('dashboard.There are no contact forms yet') }}</h4></td>
                        @endforelse
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>

                            <th>{{ __('dashboard.Name') }}</th>

                            <th>{{ __('dashboard.Email') }}</th>

                            <th>{{ __('dashboard.Message') }}</th>

                            <th>{{ __('dashboard.Created_At') }}</th>

                            <th></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
