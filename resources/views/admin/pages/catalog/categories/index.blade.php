@extends('admin.layout.base')

@section('root')
    <div class="p-4">
        <div class="card">
            <div class="card-header py-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="">
                        <h4 class="m-0 p-0 fs-5 text-primary">Categorias</h4>
                        <small class="text-muted">Lista de categorias</small>
                    </div>
                    <button class="btn btn-primary" data-bs-target="#modalStore" data-bs-toggle="modal">Adicionar</button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        @include('admin.components.toast')
                    </div>

                    <div class="col-md-12 col-xs-12">
                        @include('admin.pages.catalog.categories.filters')
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white">

                @include('admin.pages.catalog.categories.table')
            </div>
        </div>
    </div>

    @include('admin.pages.catalog.categories.store')
    @include('admin.pages.catalog.categories.update')
    @include('admin.pages.catalog.categories.remove')
@endsection
