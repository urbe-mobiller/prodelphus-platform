@extends('admin.layout.base')

@section('root')
    <div class="p-4">
        <div class="card">
            <div class="card-header py-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="">
                        <h4 class="m-0 p-0 fs-5 text-primary">Produtos</h4>
                        <small class="text-muted">Lista de produtos</small>
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
                        @include('admin.pages.catalog.products.filters')
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white">
                @include('admin.pages.catalog.products.table')
            </div>
        </div>
    </div>
    @include('admin.pages.catalog.products.store')
    @include('admin.pages.catalog.products.update')
@endsection

@push('scripts')
    <script>
        function previewImage(event, imageNumber) {
            const input = event.target;
            const reader = new FileReader();

            reader.onload = function() {
                const imgElement = document.getElementById(`image-preview-${imageNumber}`);
                imgElement.src = reader.result || '';
            };

            reader.readAsDataURL(input.files[0]);
        }
    </script>
@endpush
