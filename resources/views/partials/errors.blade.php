@if ($errors->any())
    <!-- Alert -->
    <div class="alert alert-warning w-100">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif
