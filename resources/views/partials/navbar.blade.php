<nav class="navbar navbar-dark" style="background:#1a6e3c;">
    <div class="container d-flex justify-content-between align-items-center">
        <div>
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                <i class="bi bi-book-half me-1"></i> Pustaka Digital
            </a>

            @auth
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('books.index') }}" class="btn btn-sm ms-2" style="background:rgba(255,255,255,0.15);color:#fff;border:1px solid rgba(255,255,255,0.4);">
                        <i class="bi bi-journal-richtext me-1"></i>Data Buku
                    </a>
                    <a href="{{ route('categories.index') }}" class="btn btn-sm ms-2" style="background:rgba(255,255,255,0.15);color:#fff;border:1px solid rgba(255,255,255,0.4);">
                        <i class="bi bi-tags me-1"></i>Kategori
                    </a>
                @else
                    <span class="text-light ms-2 small"><i class="bi bi-eye me-1"></i>Mode Pengunjung</span>
                @endif
            @endauth
        </div>

        <div>
            @auth
                <span class="text-light me-2 small">Halo, {{ auth()->user()->name }} ({{ auth()->user()->role }})</span>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm" style="background:rgba(255,255,255,0.15);color:#fff;border:1px solid rgba(255,255,255,0.4);">
                        <i class="bi bi-box-arrow-right me-1"></i>Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-sm me-1" style="background:rgba(255,255,255,0.15);color:#fff;border:1px solid rgba(255,255,255,0.4);">Login</a>
                <a href="{{ route('register') }}" class="btn btn-sm" style="background:rgba(255,255,255,0.15);color:#fff;border:1px solid rgba(255,255,255,0.4);">Register</a>
            @endauth
        </div>
    </div>
</nav>