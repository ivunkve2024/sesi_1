<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDU Online Shop - Premium E-Commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/stylesheet.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        body {
            background-color: #030712 !important; /* bg-gray-950 */
            color: #f3f4f6;
        }
        .bg-custom-dark {
            background-color: #111827 !important; /* bg-gray-900 */
        }
        .text-cyan {
            color: #22d3ee !important;
        }
        .btn-cyan {
            background-color: #06b6d4;
            color: #030712;
            font-weight: 700;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        .btn-cyan:hover {
            background-color: #22d3ee;
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(6, 182, 212, 0.4);
        }
        .hover-card {
            transition: all 0.3s ease;
            border: 1px solid rgba(255,255,255,0.05);
        }
        .hover-card:hover {
            transform: translateY(-8px);
            border-color: rgba(6, 182, 212, 0.3) !important;
        }
        .blur-bg {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            height: 300px;
            background: rgba(6, 182, 212, 0.1);
            filter: blur(80px);
            border-radius: 50%;
            pointer-events: none;
        }
        .line-clamp-1 {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;  
            overflow: hidden;
        }
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;  
            overflow: hidden;
        }
    </style>
</head>
<body class="d-flex flex-column min-h-screen">

    <nav class="navbar navbar-expand-lg bg-custom-dark border-bottom border-secondary border-opacity-25 sticky-top backdrop-blur">
        <div class="container-xl py-2">
            <a class="navbar-brand fw-black text-cyan tracking-wider" href="{{ route('home') }}">
                EDU<span class="text-light">SHOP</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <div class="navbar-nav gap-3 mt-3 mt-lg-0">
                    <a class="nav-link text-cyan fw-medium fs-7" href="{{ route('home') }}">Beranda</a>                    
                    <a class="nav-link text-secondary hover-text-cyan fw-medium fs-7 d-flex align-items-center gap-1" href="{{ route('cart') }}">
                        <i class="bi bi-cart3"></i> Keranjang
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <header class="position-relative overflow-hidden bg-gradient bg-custom-dark pt-5 pb-5 text-center border-bottom border-secondary border-opacity-10">
        <div class="container max-w-4xl position-relative z-1 py-5">
            <h1 class="display-4 fw-black tracking-tight mb-4 text-white">
                Selamat Datang di <span class="text-cyan">EDU Shop</span>
            </h1>
            <p class="lead text-secondary max-w-2xl mx-auto mb-4" style="max-w: 600px;">
                Temukan berbagai macam produk unggulan dengan harga terjangkau dan kualitas bintang lima yang siap menunjang produktivitasmu.
            </p>
            
        </div>
        <div class="blur-bg"></div>
    </header>

    <div class="container py-5 my-4">
        <div class="row g-4">
            
            <div class="col-12 col-md-4">
                <div class="bg-custom-dark p-4 rounded-4 h-100 hover-card">
                    <div class="text-cyan mb-3 d-flex align-items-center justify-content-center rounded-3" style="width: 50px; height: 50px; background-color: rgba(6, 182, 212, 0.15)">
                        <i class="bi bi-truck fs-4"></i>
                    </div>
                    <h5 class="fw-bold text-light mb-2">Pengiriman Cepat</h5>
                    <p class="text-secondary small mb-0">Pesanan diproses langsung secepat kilat setelah Anda mengonfirmasi checkout.</p>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="bg-custom-dark p-4 rounded-4 h-100 hover-card">
                    <div class="text-success mb-3 d-flex align-items-center justify-content-center rounded-3" style="width: 50px; height: 50px; background-color: rgba(25, 135, 84, 0.15)">
                        <i class="bi bi-shield-check fs-4"></i>
                    </div>
                    <h5 class="fw-bold text-light mb-2">Garansi Resmi</h5>
                    <p class="text-secondary small mb-0">Semua produk elektronik terjamin original dan bergaransi resmi distributor.</p>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="bg-custom-dark p-4 rounded-4 h-100 hover-card">
                    <div class="text-warning mb-3 d-flex align-items-center justify-content-center rounded-3" style="width: 50px; height: 50px; background-color: rgba(255, 193, 7, 0.15)">
                        <i class="bi bi-star fs-4"></i>
                    </div>
                    <h5 class="fw-bold text-light mb-2">Rating Terbaik</h5>
                    <p class="text-secondary small mb-0">Kepuasan pelanggan adalah prioritas utama kami dalam melayani jual-beli online.</p>
                </div>
            </div>

        </div>
    </div>

    <div class="container py-4 mb-5">
        <h2 class="fw-black text-center mb-5 tracking-tight text-white">
            Produk <span class="text-cyan">Unggulan</span>
            <div class="bg-cyan mx-auto mt-2 rounded-pill" style="width: 60px; height: 4px;"></div>
        </h2>
        
        <div class="row">
            @foreach($featuredProducts as $row)
                <div class="col">
                    <div class="card h-100 bg-custom-dark rounded-4 overflow-hidden hover-card border-0 shadow">
                        
                        <div class="position-relative" style="height: 200px;">
                            <img src="{{ $row['gambar'] }}" alt="{{ $row['nama'] }}" class="w-full h-100 object-fit-cover w-100">
                            <span class="position-absolute top-0 start-0 m-3 bg-dark bg-opacity-75 text-cyan small fw-semibold px-2.5 py-1 rounded-3 border border-secondary border-opacity-25">
                                {{ $row['kategori'] }}
                            </span>
                        </div>

                        <div class="card-body d-flex flex-column p-4">
                            <h5 class="card-title fs-6 fw-bold text-light mb-1 line-clamp-1">
                                {{ $row['nama'] }}
                            </h5>
                            <p class="text-success fw-bold fs-5 mb-2">
                                Rp {{ number_format($row['harga'], 0, ',', '.') }}
                            </p>
                            <p class="card-text text-secondary small mb-4 flex-grow-1 line-clamp-2">
                                {{ $row['deskripsi'] }}
                            </p>

                            <a href="{{ route('cart') }}" class="btn btn-outline-secondary text-light w-100 fw-bold py-2 rounded-3 small border-secondary border-opacity-50">
                                Beli Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <footer class="mt-auto bg-custom-dark border-top border-secondary border-opacity-10 py-4">
        <div class="container-xl">
            <div class="row align-items-center justify-content-between g-3 text-center text-md-start">
                <div class="col-12 col-md-auto">
                    <a class="fw-black text-cyan text-decoration-none tracking-wider fs-5" href="#">
                        EDU<span class="text-light">SHOP</span>
                    </a>
                    <p class="text-secondary small mb-0 mt-1">&copy; 2026 EDUSHOP. All rights reserved.</p>
                </div>
                <div class="col-12 col-md-auto">
                    <div class="d-flex justify-content-center justify-content-md-end gap-3">
                        <a href="#" class="text-secondary text-cyan-hover fs-5"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-secondary text-cyan-hover fs-5"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-secondary text-cyan-hover fs-5"><i class="bi bi-twitter-x"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>