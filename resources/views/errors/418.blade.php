
{{ $exception->getMessage() }}

<a href="{{ route('dashboard') }}" class="btn btn-primary">Kembali Ke Dashboard</a>

<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container-fluid flex">
        <p>418, I'm a teapot :> </p>
        {{ $exception->getMessage() }}
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Kembali Ke Dashboard</a>
    </div>
</body>
