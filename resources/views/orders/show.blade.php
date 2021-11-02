@extends('layouts.backend')

@section('title')
    Orders
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('orders.index') }}">Orders</a>
    </li>
    <li class="breadcrumb-item active">
        {{ $order->tracking_no }}
    </li>
@endsection

@section('button-link')
    {{ route('orders.create') }}
@endsection

@section('button-icon')
    add
@endsection

@section('button-title')
    All Orders
@endsection

@section('main_content')

<div class="container mt-4">
    <div class="mb-3">{!! $qr; !!}</div>
    <div class="mb-3">{!! DNS1D::getBarcodeHTML('4445645656', 'C128') !!} <h5 class="text-spacing">{{ $order->tracking_no }}</h5></div>
</div>
@endsection
