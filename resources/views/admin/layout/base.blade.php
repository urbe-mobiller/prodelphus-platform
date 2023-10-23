@extends('admin.index')
@push('styles')
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/sidebar.css') }}">
@endpush
@section('admin')
    <div class="main">
        @include('admin.components.sidebar')
        <div class="wrapper">
            @yield('root')
        </div>
    </div>
@endsection
