<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('partials.navbar')

<div class="container mt-4">

<h3>Edit Book</h3>

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card">
<div class="card-body">

<form action="{{ route('books.update',$book->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select name="category_id" class="form-select" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    {{ $category->id == $book->category_id ? 'selected' : '' }}>
                    {{ $category->nama_kategori }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text" name="judul" class="form-control" value="{{ $book->judul }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Penulis</label>
        <input type="text" name="penulis" class="form-control" value="{{ $book->penulis }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Tahun Terbit</label>
        <input type="number" name="tahun_terbit" class="form-control" value="{{ $book->tahun_terbit }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Stok</label>
        <input type="number" name="stok" class="form-control" value="{{ $book->stok }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Pengarang</label>
        <input type="text" name="pengarang" class="form-control" value="{{ $book->pengarang }}" placeholder="Nama Pengarang">
    </div>

    <div class="mb-3">
        <label class="form-label">Penerbit</label>
        <input type="text" name="penerbit" class="form-control" value="{{ $book->penerbit }}" placeholder="Nama Penerbit">
    </div>

    <div class="mb-3">
        <label class="form-label">Sinopsis</label>
        <textarea name="sinopsis" class="form-control" rows="4" placeholder="Sinopsis buku">{{ $book->sinopsis }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Cover Buku</label>
        <input type="file" name="cover_image" class="form-control" accept="image/*">
        <small class="text-muted">Format: JPG, PNG, GIF. Max: 2MB. Biarkan kosong jika tidak ingin mengubah.</small>
        @if($book->cover_image)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $book->cover_image) }}" class="img-thumbnail" style="width: 100px;" alt="Current Cover">
                <p class="mt-1">Cover saat ini</p>
            </div>
        @endif
    </div>

    <button class="btn btn-success">Update</button>
    <a href="{{ route('home') }}" class="btn btn-info">Home</a>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>

</form>

</div>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>