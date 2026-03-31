<!DOCTYPE html>
<html>
<head>
    <title>Data Kategori</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #eef1f5;
        }

        .card {
            border-radius: 16px;
        }

        .table th {
            font-weight: 600;
        }

        .btn {
            border-radius: 8px;
        }
    </style>
</head>
<body>

@include('partials.navbar')

<div class="container py-4">

    <div class="mx-auto" style="max-width: 1000px;">

        <div class="card shadow-sm border-0 p-4">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0">📂 Data Kategori</h3>

                <a href="{{ route('categories.create') }}" class="btn btn-primary px-4">
                    + Tambah
                </a>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-hover align-middle">

                    <thead class="table-primary text-center">
                        <tr>
                            <th style="width: 80px;">No</th>
                            <th>Nama Kategori</th>
                            <th style="width: 200px;">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($categories as $index => $category)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $category->nama_kategori }}</td>
                            <td class="text-center">

                                <a href="{{ route('categories.edit', $category->id) }}"
                                   class="btn btn-warning btn-sm me-2">
                                    Edit
                                </a>

                                <form action="{{ route('categories.destroy', $category->id) }}"
                                      method="POST"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin mau hapus?')">
                                        Hapus
                                    </button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

            <!-- Footer -->
            <div class="mt-4">
                <a href="{{ route('books.index') }}" class="btn btn-secondary w-100">
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