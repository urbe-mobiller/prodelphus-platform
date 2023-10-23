<div class="modal fade" id="modalStore" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalStoreLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{ route('products.save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-6" id="modalStoreLabel">Adicionar produto</h1>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 col-xs-12 mb-2">
                            <div class="form-group">
                                <label for="">Nome</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12 mb-2">
                            <div class="form-group">
                                <label for="">Categoria</label>
                                <select name="id_category" class="form-control" required>
                                    <option value="" selected disabled>Selecione</option>
                                    @foreach (getCategories() as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12 mb-2">
                            <div class="form-group">
                                <label for="">Código</label>
                                <input type="text" name="code" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12 mb-2">
                            <div class="form-group">
                                <label for="">Destaque</label>
                                <select name="highlights" class="form-control">
                                    <option value="0">Não</option>
                                    <option value="1">Sim</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12 mb-2">
                            <div class="form-group">
                                <label for="">Lançamento</label>
                                <select name="releases" class="form-control">
                                    <option value="0">Não</option>
                                    <option value="1">Sim</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12 mb-3">
                            <div class="form-group">
                                <label for="">Descrição</label>
                                <textarea name="description" style="resize: none;" rows="5" maxlength="255" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span>Imagens</span>
                                        <span class="text-primary" role="button" id="btn-add-images">Adicionar</span>
                                    </div>
                                </div>
                                <div class="card-body" id="table-images"></div>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span>Modelos</span>
                                        <span class="text-primary" role="button" id="btn-add-models">Adicionar</span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row" id="table-models"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('products.index') }}" type="button" class="btn btn-secondary">Fechar</a>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $("#modalStore").on("show.bs.modal", function(event) {
            var images = 0;
            var models = 0;

            var modal = $(this);

            modal.find('#btn-add-images').on('click', function() {
                images++;
                modal.find('#table-images').append(`
                    <div class="row">
                        <div class="col-md col-xs-12 mb-2 text-center">
                            <img role="button" src="{{ asset('images/no-image.jpg') }}" class="rounded bg-light" width="80" height="80" id="image-preview-${images}"/>
                        </div>
                        <div class="col-md-10 col-xs-12">
                            <div class="form-group">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <label for="">Foto</label>
                                    <small class="text-danger text-end btn-remove-image" role="button">Remover</small>
                                </div>
                                <input class="form-control" type="file" name="images[${images}][image]" onchange="previewImage(event, ${images})"/>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12">
                            <hr class="hr" />
                        </div>
                    </div>
                `);
            });

            modal.find('#table-images').on('click', '.btn-remove-image', function() {
                images--;
                $(this).closest('.row').remove();
            });

            modal.find('#btn-add-models').on('click', function() {
                models++;
                modal.find("#table-models").append(`
                    <div class="col-md-12 col-xs-12 mb-2 item">
                        <div class="card">
                            <div class="card-body bg-light">
                                <div class="row">
                                    <div class="col-md-12 col-xs-12 mb-2">
                                        <div class="form-group">
                                            <label for="">Código</label>
                                            <input type="text" name="models[${models}][code]" class="form-control" required max="20" maxlength="20">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12 mb-2">
                                        <div class="form-group">
                                            <label for="">Nome</label>
                                            <input type="text" name="models[${models}][name]" class="form-control" required max="20" maxlength="20">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="">Descrição</label>
                                            <textarea name="models[${models}][description]" style="resize: none;" rows="4" class="form-control" maxlength="255"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end mt-2">
                                    <small class="text-danger btn-remove-model" role="button">Remover</small>
                                </div>
                            </div>
                        </div>
                    </div>
                `);
            });

            modal.find('#table-models').on('click', '.btn-remove-model', function() {
                images--;
                $(this).closest('.item').remove();
            });
        });
    </script>
@endpush
