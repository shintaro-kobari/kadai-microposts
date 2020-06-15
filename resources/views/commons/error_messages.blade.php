@if (count($errors) > 0)
    <ul class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
            <li class="ml-4">{{ $error }}</li>
        @endforeach
    </ul>
@endif

@if (session()->has('message'))
    <ul class="alert alert-info" role="alert">
        {{ session('message') }}
    </ul>
@endif
