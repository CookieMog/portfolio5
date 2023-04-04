@if ($errors->any())
    <div class="error" role="alert">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        <button type="button" class="btn-close" data-bs-dismiss="alert" label="Close">Fermer</button>
    </div>
@endif

@if (session('success'))
    <div class="success" role="alert">
        <li>{{ session('success') }}</li>
        <button type="button" class="btn-close" data-bs-dismiss="alert" label="Close">Fermer</button>
    </div>
@endif
