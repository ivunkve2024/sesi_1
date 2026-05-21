<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDU Online Shop - Premium E-Commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .hero-section {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 90px 0;
            border-radius: 0 0 40px 40px;
        }
        .feature-card { transition: transform 0.3s ease; }
        .feature-card:hover { transform: translateY(-10px); }
    </style>
</head>
<body style="background: #f8f9fa;">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-warning" href="{{ route('home') }}">EDU SHOP</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="{{ route('home') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('products') }}">Produk</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('cart') }}"><i class="bi bi-cart3"></i> Keranjang</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero-section text-center mb-5 shadow">
        <div class="container">
            <h1 class="display-3 fw-bold mb-3">Selamat Datang di <span class="text-warning">EDU Shop</span></h1>
            <p class="lead mb-4">Temukan berbagai macam produk unggulan dengan harga terjangkau dan kualitas bintang lima.</p>
            <a href="{{ route('products') }}" class="btn btn-warning btn-lg rounded-pill px-5 fw-bold shadow">Mulai Belanja &rarr;</a>
        </div>
    </header>

    <div class="container my-5">
        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 feature-card rounded-4">
                    <div class="text-primary mb-3"><i class="bi bi-truck fs-1"></i></div>
                    <h5 class="fw-bold">Pengiriman Cepat</h5>
                    <p class="text-muted small">Pesanan diproses langsung secepat kilat setelah Anda mengonfirmasi checkout.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 feature-card rounded-4">
                    <div class="text-success mb-3"><i class="bi bi-shield-check fs-1"></i></div>
                    <h5 class="fw-bold">Garansi Resmi</h5>
                    <p class="text-muted small">Semua produk elektronik terjamin original dan bergaransi resmi distributor.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 feature-card rounded-4">
                    <div class="text-warning mb-3"><i class="bi bi-star fs-1"></i></div>
                    <h5 class="fw-bold">Rating Terbaik</h5>
                    <p class="text-muted small">Kepuasan pelanggan adalah prioritas utama kami dalam melayani jual-beli online.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <h2 class="fw-bold text-center mb-4">Produk <span class="text-primary">Unggulan</span></h2>
        <div class="row g-4">
            @foreach($featuredProducts as $row)
                <div class="col-lg-3 col-md-6 mx-auto">
                    <div class="card h-100 shadow border-0 rounded-4">
                        <img src="{{ $row['gambar'] }}" class="card-img-top" style="height:200px; object-fit:cover;">
                        <div class="card-body d-flex flex-column">
                            <span class="badge bg-primary mb-2 align-self-start">{{ $row['kategori'] }}</span>
                            <h5 class="fw-bold fs-6">{{ $row['nama'] }}</h5>
                            <p class="text-success fw-bold">Rp {{ number_format($row['harga']) }}</p>
                            <p class="text-muted small">{{ $row['deskripsi'] }}</p>
                            <a href="{{ route('cart') }}" class="btn btn-dark w-100 rounded-pill btn-sm mt-auto">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</body>
</html>