<!DOCTYPE html>

<html>
<head>
    <title>Data Book</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap 5 CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body{background:#ebf4ff;color:#0e2d55;}
    .navbar{background:#1a5dc5!important;}
    .navbar-brand, .navbar .btn{color:#fff!important;}
    .navbar .btn{background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.5);}
    .navbar .btn:hover, .navbar .btn:focus{background:#0e52b3!important; border-color:#0a3b82!important; color:#fff!important;}
    h3{color:#0b2e67;}
    .card{border:1px solid #93b8ef;}
    .btn-success{background:#1570d2;border-color:#1359ad;}
    .btn-danger{background:#d21f1f;border-color:#a31818;}
</style>

</head>
<body>

@include('partials.navbar')

<div class="container mt-4">

<!-- HEADER -->

<div class="d-flex justify-content-between mb-3">
    <h3>Data Book</h3>

<div>
    @if(auth()->check() && auth()->user()->isAdmin())
        <a href="{{ route('categories.index') }}" class="btn btn-success">Kelola Kategori</a>
        <a href="{{ route('books.create') }}" class="btn btn-primary">+ Tambah Book</a>
    @endif
</div>

</div>

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<!-- SEARCH & FILTER -->

<form method="GET" action="{{ route('books.index') }}" class="row mb-3">

<div class="col-md-4">
    <input type="text" name="search"
           class="form-control"
           placeholder="Cari Judul..."
           value="{{ request('search') }}">
</div>

<div class="col-md-4">
    <select name="category_id" class="form-select">
        <option value="">-- Filter Category --</option>

        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ request('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->nama_kategori }}
            </option>
        @endforeach

    </select>
</div>

<div class="col-md-4">
    <button class="btn btn-primary">Filter</button>
    <a href="{{ route('books.index') }}"
       class="btn btn-secondary">Reset</a>
</div>

</form>

<!-- TOTAL BOOK -->

<div class="alert alert-info">
    Total Book: <strong>{{ $totalBooks }}</strong>
</div>

<!-- TOTAL PER CATEGORY -->

<div class="card mb-3">
<div class="card-body">
    <h5>Total Book per Category</h5>
    <ul>
        @foreach($totalPerCategory as $category)
            <li>
                {{ $category->nama_kategori }} :
                {{ $category->books_count }}
            </li>
        @endforeach
    </ul>
</div>
</div>

<!-- TABLE -->

<div class="row">
    @foreach($books as $book)
    <div class="col-md-3 mb-4">
        <div class="card h-100">
            <div class="card-body text-center">
                <a href="{{ route('books.show', $book->id) }}" class="text-decoration-none">
                    @if($book->cover_image)
                        <img src="{{ asset('storage/' . $book->cover_image) }}" class="img-fluid mb-3" style="height: 200px; object-fit: cover;" alt="Cover">
                    @else
                        <div class="bg-light mb-3 d-flex align-items-center justify-content-center" style="height: 200px;">
                            <span class="text-muted">No Cover</span>
                        </div>
                    @endif
                    <h5 class="card-title">{{ $book->judul }}</h5>
                    <p class="card-text text-muted">{{ $book->penulis }}</p>
                </a>
                @if(auth()->check() && auth()->user()->isAdmin())
                    <div class="mt-2">
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">Hapus</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>

</div>
</body>
</html>
