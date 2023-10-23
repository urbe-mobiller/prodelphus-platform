<div class="pt-2">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <table class="table">
                <thead>
                    <tr>
                        <th width="50%">Nome</th>
                        <th>Categoria</th>
                        <th>Status</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($products) > 0)
                        @foreach ($products as $item)
                            <tr>
                                <td width="50%">{{ $item->name }}</td>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ getStatusTable($item->status) }}</td>
                                <td class="text-end">
                                    <span role="button" class="text-dark me-2" data-bs-target="#modalUpdate"
                                        data-bs-toggle="modal" data-dados="{{ $item }}">Editar</span>
                                    <span role="button" class="text-danger">Remover</span>
                                </td>
                            </tr>
                        @endforeach
                    @else
                    @endif
                </tbody>
            </table>

        </div>
    </div>
</div>
