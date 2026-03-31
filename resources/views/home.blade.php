<!DOCTYPE html>
<html>
<head>
    <title>Pustaka Digital</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body { background: #f0faf4; color: #0d2b1a; }
        .card { border: 1px solid #a8d5b5; transition: transform 0.2s ease; }
        .card:hover { transform: translateY(-4px); box-shadow: 0 10px 30px rgba(26,110,60,0.2); }
        .btn-primary { background: #1e8449; border-color: #196a3b; }
        .btn-primary:hover { background: #166a3a; }
        h1, h5, .card-title { color: #0d3b22; }
        .carousel-caption h5, .carousel-caption p { color: #fff !important; }
        .section-title { border-left: 5px solid #1a6e3c; padding-left: 12px; }
    </style>
</head>
<body>

@include('partials.navbar')

<div class="container-fluid p-0">
    <div id="homeCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3500">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.pexels.com/photos/1370295/pexels-photo-1370295.jpeg" class="d-block w-100" style="height:500px;object-fit:cover;" alt="Slide 1">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                    <h5 class="display-5 fw-bold"><i class="bi bi-book me-2"></i>Pustaka Digital</h5>
                    <p class="lead">Temukan ribuan koleksi buku pilihan untuk kamu.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.pexels.com/photos/694740/pexels-photo-694740.jpeg" class="d-block w-100" style="height:500px;object-fit:cover;" alt="Slide 2">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                    <h5>Ruang Baca Nyaman</h5>
                    <p>Jelajahi berbagai genre buku dari seluruh dunia.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.pexels.com/photos/159711/books-bookstore-book-reading-159711.jpeg" class="d-block w-100" style="height:500px;object-fit:cover;" alt="Slide 3">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                    <h5>Koleksi Selalu Diperbarui</h5>
                    <p>Buku baru hadir setiap saat untuk menemani harimu.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>

<div class="container mt-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold section-title d-inline-block">Koleksi Buku Kami</h1>
        <p class="lead text-secondary mt-2">Klik cover buku untuk melihat detail lengkap.</p>
    </div>

    <div class="row">
        @foreach($books as $book)
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card h-100 border-0 shadow-sm">
                    <a href="{{ route('books.show', $book->id) }}" class="text-decoration-none text-dark">
                        @if($book->cover_image)
                            <img src="{{ asset('storage/' . $book->cover_image) }}" class="card-img-top" style="height:240px;object-fit:cover;" alt="Cover">
                        @else
                            <div class="d-flex align-items-center justify-content-center text-white" style="height:240px;background:#1a6e3c;">
                                <i class="bi bi-book" style="font-size:3rem;"></i>
                            </div>
                        @endif
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->judul }}</h5>
                        <p class="card-text mb-1 small"><i class="bi bi-person me-1"></i>{{ $book->penulis }}</p>
                        <p class="card-text mb-1 small"><i class="bi bi-building me-1"></i>{{ $book->penerbit ?? '-' }}</p>
                    </div>
                    <div class="card-footer bg-white border-top-0">
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary btn-sm w-100">
                            <i class="bi bi-eye me-1"></i>Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>