<div class="pt-2">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <table class="table">
                <thead>
                    <tr>
                        <th width="50%">Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($clients) > 0)
                        @foreach ($clients as $item)
                            <tr class="align-middle">
                                <td width="50%">{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-muted">Não há clientes cadastrados</td>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>
</div>
