<!DOCTYPE html>
<html>
<head>
    <title>Detail Book</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{background:#e8f2ff;color:#0f2f59;}
        .navbar{background:#154e9f!important;}
        .navbar-brand, .navbar .btn{color:#fff!important;}
        .navbar .btn{background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.5);}
        .navbar .btn:hover, .navbar .btn:focus{background:#0f3e89!important; border-color:#0a2f67!important; color:#fff!important;}
        .card{border:1px solid #95b5ea;}
        h2{color:#0c2b54;}
        .btn-secondary{background:#697d9b;border-color:#5f6f88;}
    </style>
</head>
<body>

@include('partials.navbar')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            @if($book->cover_image)
                <img src="{{ asset('storage/' . $book->cover_image) }}" class="img-fluid rounded" alt="Cover">
            @else
                <div class="bg-light p-5 text-center rounded">
                    <span class="text-muted">No Cover</span>
                </div>
            @endif
        </div>
        <div class="col-md-8">
            <h2>{{ $book->judul }}</h2>
            <p class="text-muted">Penulis: {{ $book->penulis }}</p>
            <p class="text-muted">Pengarang: {{ $book->pengarang ?? '-' }}</p>
            <p><strong>Penerbit:</strong> {{ $book->penerbit ?? '-' }}</p>
            <div class="mt-3">
                <a href="{{ route('home') }}" class="btn btn-secondary">Kembali ke Home</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>