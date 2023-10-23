<div class="row align-items-end">
    <div class="col-md col-xs-12">
        <div class="form-group">
            <label for="">Nome</label>
            <input type="text" class="form-control" placeholder="Pesquise pelo nome do produto" required>
        </div>
    </div>
    <div class="col-md col-xs-12">
        <div class="form-group">
            <label for="">Categoria</label>
            <select name="" id="" class="form-control">
                <option value="">Todas</option>
                @foreach (getCategories() as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="col-md-2 col-xs-12">
        <div class="form-group">
            <label for="">Status</label>
            <select name="" id="" class="form-control">
                <option value="">Todas</option>
                <option value="1">Ativo</option>
                <option value="1">Inativo</option>
            </select>
        </div>
    </div>

    <div class="col-md-2 col-xs-12">
        <div class="d-grid gap-0">
            <button class="btn btn-secondary">Buscar</button>
        </div>
    </div>
</div>
