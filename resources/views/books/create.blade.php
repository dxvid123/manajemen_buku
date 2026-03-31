<!DOCTYPE html>

<html>
<head>
    <title>Tambah Book</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap 5 CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

@include('partials.navbar')

<div class="container mt-4">

<h3>Tambah Book</h3>

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

<form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<!-- CATEGORY -->

<div class="mb-3">
    <label class="form-label">Kategori</label>

<select name="category_id" class="form-select" required>
    <option value="">-- Pilih Kategori --</option>

    @forelse($categories as $category)
        <option value="{{ $category->id }}"
            {{ old('category_id') == $category->id ? 'selected' : '' }}>
            {{ $category->nama_kategori }}
        </option>
    @empty
        <option disabled>Belum ada kategori</option>
    @endforelse
</select>

<small class="text-muted">
    Belum ada kategori?
    <a href="{{ route('categories.create') }}">Tambah kategori</a>
</small>

</div>

<!-- JUDUL -->

<div class="mb-3">
    <label class="form-label">Judul</label>
    <input type="text"
           name="judul"
           class="form-control"
           value="{{ old('judul') }}"
           required>
</div>

<!-- PENULIS -->

<div class="mb-3">
    <label class="form-label">Penulis</label>
    <input type="text"
           name="penulis"
           class="form-control"
           value="{{ old('penulis') }}"
           required>
</div>

<!-- TAHUN -->

<div class="mb-3">
    <label class="form-label">Tahun Terbit</label>
    <input type="number"
           name="tahun_terbit"
           class="form-control"
           value="{{ old('tahun_terbit') }}"
           required>
</div>

<!-- STOK -->

<div class="mb-3">
    <label class="form-label">Stok</label>
    <input type="number"
           name="stok"
           class="form-control"
           value="{{ old('stok') }}"
           required>
</div>

<!-- PENGARANG -->
<div class="mb-3">
    <label class="form-label">Pengarang</label>
    <input type="text"
           name="pengarang"
           class="form-control"
           value="{{ old('pengarang') }}"
           placeholder="Contoh: Nama Lengkap Pengarang">
</div>

<!-- PENERBIT -->
<div class="mb-3">
    <label class="form-label">Penerbit</label>
    <input type="text"
           name="penerbit"
           class="form-control"
           value="{{ old('penerbit') }}"
           placeholder="Contoh: Nama Penerbit">
</div>

<!-- SINOPSIS -->
<div class="mb-3">
    <label class="form-label">Sinopsis</label>
    <textarea name="sinopsis" class="form-control" rows="4" placeholder="Ringkasan cerita buku">{{ old('sinopsis') }}</textarea>
</div>

<!-- COVER IMAGE -->

<div class="mb-3">
    <label class="form-label">Cover Buku</label>
    <input type="file"
           name="cover_image"
           class="form-control"
           accept="image/*">
    <small class="text-muted">Format: JPG, PNG, GIF. Max: 2MB</small>
</div>

<button class="btn btn-success">Simpan</button> <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>

</form>

</div>
</div>

</div>
</body>
</html>
