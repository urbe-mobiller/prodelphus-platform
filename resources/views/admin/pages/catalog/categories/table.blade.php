<div class="pt-2">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <table class="table">
                <thead>
                    <tr>
                        <th width="70%">Nome</th>
                        <th>Status</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($categories) > 0)
                        @foreach ($categories as $item)
                            <tr>
                                <td width="70%">{{ $item->name }}</td>
                                <td>{{ getStatusTable($item->status) }}</td>
                                <td class="text-end">
                                    <small role="button" class="text-dark me-2" data-bs-toggle="modal"
                                        data-bs-target="#modalUpdate" data-dados="{{ $item }}">Editar</small>
                                    <small role="button" class="text-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalRemove" data-dados="{{ $item }}">Remover</small>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">Não há categorias cadastradas</td>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>
</div>
