@if (session('alert'))
    <div class="alert alert-{{session('type') ?? 'success'}}">
        {{ session('message') }}
    </div>
@endif
