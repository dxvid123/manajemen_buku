<!DOCTYPE html>
<html>
<head>
    <title>Edit Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('partials.navbar')

<div class="container mt-4" style="max-width: 600px;">
    <h2>Edit Kategori</h2>

<form action="{{ route('categories.update',$category->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama Kategori</label><br>
    <input type="text"
           name="nama_kategori"
           value="{{ $category->nama_kategori }}"><br><br>

    <button>Update</button>
</form>

<br>
<a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>