@extends('layouts.backend')

@section('title')
    Subscribers
@endsection

@section('links')
    <li class="breadcrumb-item active">
        Subscribers
    </li>
@endsection

@section('button-link')
    #
@endsection

@section('button-icon')
    add
@endsection

@section('button-title')
    New Subscriber
@endsection

@section('main_content')
    <div class="container page__container">
        <div class="page-section">

            <div class="page-separator">
                <div class="page-separator__text">Subscribers</div>
            </div>

            <div class="card dashboard-area-tabs p-relative o-hidden mb-32pt">

                <div class="table-responsive">
                    <table
                        class=" display table mb-0 thead-border-top-0 table-nowrap"
                        style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>

                            <th>Email</th>

                            <th>Created</th>
                        </tr>
                        </thead>
                        <tbody id="projects">
                        @php $count = 1; @endphp
                        @foreach($subscribers as $subscriber)
                            <tr class="">
                                <td>{{ $count }}</td>

                                <td>
                                    <div class="media flex-nowrap align-items-center"
                                         style="white-space: nowrap;">
                                        <div class="avatar avatar-sm mr-8pt">
                                            <span class="avatar-title rounded bg-warning text-black-100">{{ initials($subscriber->email) }}</span>
                                        </div>
                                        <div class="media-body">
                                            <div class="d-flex flex-column">
                                                <small class=""><strong>{{ $subscriber->email }}</strong></small>
                                                {{-- <small class=" text-50">{{ $customer->UserCategory ? $customer->UserCategory->status:'' }}</small> --}}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="d-flex flex-column">
                                        <small class=""><strong>{{ date("F j, Y", strtotime($subscriber->created_at)) }}</strong></small>
                                        <small class="text-50">{{ $subscriber->created_at->diffForHumans() }}</small>
                                    </div>
                                </td>
                                {{--<td class="text-right">
                                    <a href="#" data-toggle="dropdown"
                                       class="btn text-50  text-70"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('contact-forms.show',$contact->id) }}" class="dropdown-item active"><i class="material-icons ">visibility</i> View</a>
                                        <a href="{{ route('contact-forms.edit',$contact->id) }}" class="dropdown-item"><i class="material-icons ">edit</i> Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a onclick="event.preventDefault(); document.getElementById('delete-form{{ $contact->id }}').submit();" class="dropdown-item"><i class="material-icons ">delete</i> Delete</a>
                                        <form id="delete-form{{ $contact->id }}" action="{{ route('contact-forms.destroy',$contact->id) }}" method="POST" class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>--}}
                            </tr>
                            @php $count++ @endphp
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>

                            <th>Email</th>

                            <th>Created</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
