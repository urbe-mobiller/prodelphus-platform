@extends('admin.layout.base')

@section('root')
    <div class="p-4">
        <div class="card">
            <div class="card-header py-3">
                <h4 class="m-0 p-0 fs-5 text-dark">Orçamentos</h4>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-12 col-xs-12">
                        @include('admin.pages.budgets.filters')
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white">
                @include('admin.pages.budgets.table')
            </div>
        </div>
    </div>
@endsection
