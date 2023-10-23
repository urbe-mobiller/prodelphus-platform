<div class="modal fade" id="modalRemove" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalRemoveLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('categories.remove') }}" method="POST">
                @csrf
                <input type="hidden" name="id">
                <div class="modal-header">
                    <h1 class="modal-title fs-6" id="modalRemoveLabel">Remover categoria</h1>
                </div>
                <div class="modal-body">
                    <span class="message"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-danger">Remover</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $("#modalRemove").on("show.bs.modal", function(event) {
            var modal = $(this);
            var button = $(event.relatedTarget);
            var dados = button.data('dados');
            modal.find('input[name=id]').val(dados.id);
            modal.find('.message').html("Deseja remover a catergoria <strong>" + dados.name + "</strong>?")
        });
    </script>
@endpush
