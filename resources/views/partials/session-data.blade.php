@if (session('status'))
    <div class="alert alert-{{ session('alert-class') }}">{{ session('status') }}</div>
@endif
