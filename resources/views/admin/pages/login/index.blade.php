@extends('admin.index')
@push('styles')
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/login.css') }}">
@endpush
@section('admin')
    <div class="login">
        <div class="card" style="width: 320px;">
            <form action="{{ route('login.auth') }}" method="POST">
                @csrf
                <div class="card-header text-center">
                    <span>Pro Delphus</span>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-12 col-xs-12">
                            @include('admin.components.toast')
                        </div>

                        <div class="col-md-12 col-xs-12 mb-2">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" autocomplete="off" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12 mb-3">
                            <div class="form-group">
                                <label for="">Senha</label>
                                <input type="password" name="password" autocomplete="new-password" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12 text-center">
                            <small role="button">Esqueci minha senha</small>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-grid gap-0">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
