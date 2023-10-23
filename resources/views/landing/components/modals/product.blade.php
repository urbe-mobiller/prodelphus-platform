<div class="modal">
    <div class="modal-dialog">
        <div class="modal-header">

        </div>
        <div class="modal-body">
            <span></span>
        </div>
        <div class="modal-footer">

        </div>
    </div>
</div>

@push('scripts')
    <script>



        function openModal() {
            $(".modal").removeClass('hide').addClass('show');
        }

        function closeModal() {
            $(".modal").removeClass('show').addClass('hide');
        }
    </script>
@endpush
