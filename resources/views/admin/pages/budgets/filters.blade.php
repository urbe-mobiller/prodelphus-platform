<div class="row align-items-end">
    <div class="col-md-2 col-xs-12">
        <div class="form-group">
            <label for="filterStatus">Status</label>
            <select name="status" id="filterStatus" class="form-control">
                <option value="">Todos</option>
                <option value="">Novos</option>
                <option value="">Andamento</option>
                <option value="">Concluídos</option>
            </select>
        </div>
    </div>
    <div class="col-md col-xs-12">
        <div class="form-group">
            <label for="filterStatus">Cliente</label>
            <input type="text" class="form-control" placeholder="Pesquise pelo nome do cliente">
        </div>
    </div>
    <div class="col-md-2 col-xs-12">
        <div class="form-group">
            <label for="filterStartDate">Inicio</label>
            <input type="date" class="form-control" max="{{ date('Y-m-d') }}">
        </div>
    </div>
    <div class="col-md-2 col-xs-12">
        <div class="form-group">
            <label for="filterStartDate">Termino</label>
            <input type="date" class="form-control" max="{{ date('Y-m-d') }}">
        </div>
    </div>
    <div class="col-md-1 col-xs-12">
        <div class="d-grid gap-0">
            <button class="btn btn-primary">Buscar</button>
        </div>
    </div>
</div>
