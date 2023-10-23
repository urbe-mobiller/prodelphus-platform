@extends('admin.layout.base')
@push('styles')
    <link rel="stylesheet" href="{{ asset('admin/css/messages.css') }}">
@endpush
@section('root')
    <div class="p-4">
        <div class="card">
            <div class="card-header py-3">
                <h4 class="m-0 p-0 fs-5 text-dark">Mensagens</h4>
            </div>
            <div class="card-body">
                @if (count(getAllMessages()) > 0)
                    <div class="row">
                        <div class="col-md-3 col-xs-4">

                            <div class="mb-2">
                                <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                        <input type="text" class="form-control" placeholder="Pesquisar">
                                    </div>
                                </div>
                            </div>

                            <ul class="list-group">
                                @foreach (getAllMessages() as $item)
                                    <li class="list-group-item" role="button">
                                        <a href="{{ route('messages.open', ['id' => $item->id]) }}" class="nav-link">
                                            <div class="d-flex flex-column py-2">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <span class="text-dark fw-semibold">{{ $item->name }}</span>
                                                    <small class="text-primary"
                                                        style="font-size: 12px !important;">{{ convertStringDate(substr($item->created_at, 0, 10)) }}</small>
                                                </div>
                                                <small class="text-list-message text-secondary">A
                                                    {{ $item->message }}</small>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-9 col-xs-4">
                            @yield('messages')
                        </div>
                    </div>
                @else
                    <span>Não há mensagens a serem exibidas</span>
                @endif
            </div>
        </div>
    </div>
@endsection
