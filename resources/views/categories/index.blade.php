<!DOCTYPE html>
<html>
<head>
    <title>Data Kategori</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #eef3f9;
            color: #1f2937;
        }

        .card-custom {
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.12);
            border: 1px solid #dbe4f2;
            background: #ffffff;
        }

        .btn-custom {
            border-radius: 8px;
        }

        .table thead th {
            background: #1b4d8f;
            color: #ffffff;
        }

        .table tbody tr:hover {
            background: #f1f6ff;
        }

        .table td, .table th {
            vertical-align: middle;
            border-color: #e2e8f0;
        }
    </style>
</head>
<body>

<!-- ✅ Navbar harus di luar container -->
@include('partials.navbar')

<div class="container py-4">

    <!-- ✅ Biar ga terlalu lebar -->
    <div class="mx-auto" style="max-width: 1000px;">

        <!-- ✅ Tombol atas -->
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('home') }}" class="btn btn-outline-primary btn-custom">Home</a>
            <a href="{{ route('books.index') }}" class="btn btn-outline-secondary btn-custom">Book</a>
        </div>

        <div class="card card-custom p-4">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0 fw-bold">📂 Data Kategori</h3>

                @if(auth()->check() && auth()->user()->isAdmin())
                    <a href="{{ route('categories.create') }}" class="btn btn-primary btn-custom px-3">
                        + Tambah
                    </a>
                @endif
            </div>

            <!-- Alert -->
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-hover align-middle">

                    <thead class="text-center">
                        <tr>
                            <th style="width: 70px;">No</th>
                            <th>Nama Kategori</th>
                            <th style="width: 200px;">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($categories as $key => $category)
                        <tr>
                            <td class="text-center">{{ $key+1 }}</td>
                            <td>{{ $category->nama_kategori }}</td>
                            <td class="text-center">

                                @if(auth()->check() && auth()->user()->isAdmin())

                                    <a href="{{ route('categories.edit',$category->id) }}"
                                       class="btn btn-warning btn-sm btn-custom me-2">
                                        Edit
                                    </a>

                                    <form action="{{ route('categories.destroy',$category->id) }}"
                                          method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm btn-custom"
                                                onclick="return confirm('Yakin mau hapus kategori ini?')">
                                            Hapus
                                        </button>
                                    </form>

                                @endif

                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

            <!-- Footer -->
            <div class="mt-4">
                <a href="{{ route('books.index') }}" class="btn btn-secondary w-100 btn-custom">
                    ← Kembali ke Book
                </a>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>