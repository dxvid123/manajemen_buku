<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Buku</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body { background: #f0faf4; color: #0d2b1a; }
        .navbar { background: #1a6e3c !important; }
        .navbar-brand, .navbar .btn { color: #fff !important; }
        .navbar .btn { background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.4); }
        .navbar .btn:hover { background: #145c30 !important; border-color: #0f4424 !important; }
        .btn-primary { background: #1e8449; border-color: #196a3b; }
        .btn-primary:hover { background: #166a3a; border-color: #0f4424; }
        .card { border: 1px solid #a8d5b5; transition: transform 0.2s ease; }
        .card:hover { transform: translateY(-4px); box-shadow: 0 10px 30px rgba(26,110,60,0.2); }
        h1, h5, .card-title { color: #0d3b22; }
        p { color: #1e5c35; }
        .table thead { background: #1a6e3c; color: white; }
        .badge-admin { background: #1a6e3c; }
    </style>
</head>
<body>

@include('partials.navbar')

<div class="container mt-4">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>