@if (session($key ?? 'status'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session($key ?? 'status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
