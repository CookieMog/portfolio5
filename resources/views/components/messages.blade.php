@if ($errors->any())
    <div class="error" id="error" role="alert">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        <button type="button" class="btn-close" id="btn-close" data-bs-dismiss="alert" label="Close">Fermer</button>
    </div>
@endif

@if (session('success'))
    <div class="success" id="success" role="alert">
        <li>{{ session('success') }}</li>
        <button type="button" class="btn-close" id="btn-close" data-bs-dismiss="alert" label="Close">Fermer</button>
    </div>
    <script>
        let closeBtn = document.getElementById('btn-close');
        let error = document.getElementById('error');
        let success = document.getElementById('success');
        closeBtn.addEventListener('click', function() {
            if (error) {
                error.style.display = 'none';
            } else if (success) {
                success.style.display = 'none';
            }
        });
    </script>
@endif
