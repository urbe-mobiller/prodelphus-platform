@extends('landing.index')
@push('styles')
    <link rel="stylesheet" href="{{ asset('landing/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/modal.css') }}">
@endpush
@section('landing')
    @include('landing.components.header')
    @include('landing.components.home')
    @include('landing.components.about')
    @include('landing.components.services')
    @include('landing.components.simulators')
    @include('landing.components.clients')
    @include('landing.components.products')
    @include('landing.components.contact')
    @include('landing.components.footer')

    @include('landing.components.modals.product')
@endsection
