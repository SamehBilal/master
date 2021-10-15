@extends('layouts.backend')

@section('title')
    Orders
@endsection

@section('links')
    <li class="breadcrumb-item ">
        <a href="{{ route('orders.index') }}">Orders</a>
    </li>
    <li class="breadcrumb-item active">
        Orders
    </li>
@endsection

@section('main_content')

<div class="container mt-4">
    <div class="mb-3">{!! $qr; !!}</div>
    <div class="mb-3">{!! DNS1D::getBarcodeHTML('4445645656', 'C128') !!}</div>
    <h3>Product: 4445645656</h3>
</div>
@endsection
