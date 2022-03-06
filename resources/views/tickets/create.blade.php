@extends('layouts.backend')

@section('title')
{{ __('dashboard.Tickets') }}
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('dashboard.tickets.index') }}">{{ __('dashboard.Tickets') }}</a>
    </li>
    <li class="breadcrumb-item active">
        {{ __('dashboard.create') }}
    </li>
@endsection

@section('button-link')
    {{ route('dashboard.tickets.index') }}
@endsection

@section('button-icon')
    format_list_bulleted
@endsection

@section('button-title')
{{ __('dashboard.All Tickets') }}
@endsection

@section('main_content')
    <div class="container page__container page-section">
        <div class="page-separator">
            <div class="page-separator__text" >
                {{ __('dashboard.Create New Ticket') }}
            </div>
        </div>
        <form method="POST" action="{{ route('dashboard.tickets.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-lg-3 bg-light">
                            <div class="page-separator">
                                <div class="page-separator__text">{{ __('dashboard.New Ticket') }}</div>
                            </div>
                            <p class="card-subtitle text-70 mb-16pt mb-lg-0">{{ __('dashboard.Tell us more about your issue') }}</p>
                        </div>
                        <div class="col-lg-9 row p-2">
                            <div class="col-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="name">{{ __('dashboard.Tracking_No') }}:</label> <small class="badge badge-secondary">{{ __('dashboard.optional') }}</small>
                                    <input type="text"
                                           class="form-control @error('tracking_number') is-invalid @enderror"
                                           value="{{ old('tracking_number') }}"
                                           id="tracking_number"
                                           name="tracking_number"
                                           required="required"
                                           autocomplete="tracking_number"
                                           placeholder="{{ __('dashboard.You can add more than one tracking number') }} ..."
                                           autofocus>
                                    @error('tracking_number')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="select03">{{ __('dashboard.I\'ve got a problem with') }}</label>
                                    <select id="select03"
                                            data-toggle="select"
                                            data-minimum-results-for-search="-1"
                                            class="form-control form-control-sm @error('ticket_issue_id') is-invalid @enderror"
                                            name="ticket_issue_id" required>
                                            <option value="">{{ __('dashboard.Select Proplem') }}</option>
                                            @foreach ($ticketIssues as $ticketIssue)
                                                <option value="{{$ticketIssue->id}}" {{ old('ticket_issue_id') == $ticketIssue->id ? 'selected':'' }}>
                                                    {{$ticketIssue->issue}}
                                                </option>
                                            @endforeach
                                    </select>
                                    @error('ticket_issue_id')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="name">{{ __('dashboard.Ticket subject') }}:</label>
                                    <input type="text"
                                           class="form-control @error('subject') is-invalid @enderror"
                                           value="{{ old('subject') }}"
                                           id="subject"
                                           name="subject"
                                           required="required"
                                           autocomplete="Ticket subject"
                                           placeholder="{{ __('dashboard.Ticket subject') }} ..."
                                           required>
                                    @error('subject')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="description">{{ __('dashboard.Description') }}:</label> <small class="badge badge-secondary">{{ __('dashboard.optional') }}</small>
                                    <textarea rows="8"
                                              id="description"
                                              name="description"
                                              class="form-control @error('description') is-invalid @enderror"
                                              placeholder="{{ __('dashboard.Description') }}">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label"
                                           for="files">{{ __('dashboard.Images or Excelsheets') }}:</label> <small class="badge badge-secondary">{{ __('dashboard.optional') }}</small>
                                           <input type="file"
                                           @error('files') is-invalid @enderror"
                                           id="files"
                                           name="files[]"
                                           multiple>
                                    @error('files')
                                    <div class="invalid-feedback" role="alert">{{ $message }}</div>
                                    @enderror
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit"
                    class="btn pull-right btn-primary">{{ __('dashboard.Submit') }}</button>
        </form>
    </div>
@endsection
