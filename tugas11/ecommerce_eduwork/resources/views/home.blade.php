<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDU Online Shop - Premium E-Commerce</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-gray-950 text-gray-100 font-sans antialiased min-h-screen">

    <nav class="bg-gray-900 border-b border-gray-800 sticky top-0 z-50 backdrop-blur-md bg-opacity-90">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex-shrink-0">
                    <a class="text-xl font-black tracking-wider text-cyan-400" href="{{ route('home') }}">
                        EDU<span class="text-gray-100">SHOP</span>
                    </a>
                </div>
                <div class="flex space-x-6">
                    <a class="text-cyan-400 font-medium text-sm transition-colors" href="{{ route('home') }}">Beranda</a>
                    <a class="text-gray-400 hover:text-cyan-400 font-medium text-sm transition-colors" href="{{ route('products') }}">Produk</a>
                    <a class="text-gray-400 hover:text-cyan-400 font-medium text-sm transition-colors flex items-center gap-1" href="{{ route('cart') }}">
                        <i class="bi bi-cart3"></i> Keranjang
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <header class="relative overflow-hidden bg-gradient-to-b from-gray-900 to-gray-950 pt-20 pb-24 text-center border-b border-gray-900">
        <div class="max-w-4xl mx-auto px-4 relative z-10">
            <h1 class="text-4xl md:text-6xl font-black tracking-tight mb-6">
                Selamat Datang di <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500">EDU Shop</span>
            </h1>
            <p class="text-lg text-gray-400 max-w-2xl mx-auto mb-10 leading-relaxed">
                Temukan berbagai macam produk unggulan dengan harga terjangkau dan kualitas bintang lima yang siap menunjang produktivitasmu.
            </p>
            <a href="{{ route('products') }}" class="inline-flex items-center justify-center bg-cyan-500 hover:bg-cyan-400 text-gray-950 font-bold text-base px-8 py-3.5 rounded-full shadow-lg shadow-cyan-500/20 hover:shadow-cyan-500/40 transition-all duration-300 hover:-translate-y-0.5">
                Mulai Belanja <span class="ml-2">&rarr;</span>
            </a>
        </div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-cyan-500/10 blur-3xl rounded-full pointer-events-none"></div>
    </header>

    <div class="max-w-7xl mx-auto px-4 py-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div class="bg-gray-900 border border-gray-800/60 p-8 rounded-3xl transition-all duration-300 hover:-translate-y-2 hover:border-cyan-500/30 group">
                <div class="text-cyan-400 mb-4 bg-cyan-950/50 w-14 h-14 rounded-2xl flex items-center justify-center border border-cyan-500/20 group-hover:bg-cyan-500 group-hover:text-gray-950 transition-colors duration-300">
                    <i class="bi bi-truck fs-3"></i>
                </div>
                <h5 class="text-lg font-bold text-gray-100 mb-2">Pengiriman Cepat</h5>
                <p class="text-gray-400 text-sm leading-relaxed">Pesanan diproses langsung secepat kilat setelah Anda mengonfirmasi checkout.</p>
            </div>

            <div class="bg-gray-900 border border-gray-800/60 p-8 rounded-3xl transition-all duration-300 hover:-translate-y-2 hover:border-emerald-500/30 group">
                <div class="text-emerald-400 mb-4 bg-emerald-950/50 w-14 h-14 rounded-2xl flex items-center justify-center border border-emerald-500/20 group-hover:bg-emerald-500 group-hover:text-gray-950 transition-colors duration-300">
                    <i class="bi bi-shield-check fs-3"></i>
                </div>
                <h5 class="text-lg font-bold text-gray-100 mb-2">Garansi Resmi</h5>
                <p class="text-gray-400 text-sm leading-relaxed">Semua produk elektronik terjamin original dan bergaransi resmi distributor.</p>
            </div>

            <div class="bg-gray-900 border border-gray-800/60 p-8 rounded-3xl transition-all duration-300 hover:-translate-y-2 hover:border-amber-500/30 group">
                <div class="text-amber-400 mb-4 bg-amber-950/50 w-14 h-14 rounded-2xl flex items-center justify-center border border-amber-500/20 group-hover:bg-amber-500 group-hover:text-gray-950 transition-colors duration-300">
                    <i class="bi bi-star fs-3"></i>
                </div>
                <h5 class="text-lg font-bold text-gray-100 mb-2">Rating Terbaik</h5>
                <p class="text-gray-400 text-sm leading-relaxed">Kepuasan pelanggan adalah prioritas utama kami dalam melayani jual-beli online.</p>
            </div>

        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-12 mb-16">
        <h2 class="text-3xl font-black text-center mb-12 tracking-tight">
            Produk <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-500">Unggulan</span>
            <div class="w-16 h-1 bg-cyan-500 mx-auto mt-3 rounded-full"></div>
        </h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($featuredProducts as $row)
                <div class="bg-gray-900 rounded-3xl overflow-hidden border border-gray-800/60 hover:border-cyan-500/40 transition-all duration-300 flex flex-col group hover:-translate-y-1.5 shadow-lg">
                    
                    <div class="relative h-48 overflow-hidden bg-gray-950">
                        <img src="{{ $row['gambar'] }}" alt="{{ $row['nama'] }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <span class="absolute top-3 left-3 bg-gray-950/80 backdrop-blur-md text-cyan-400 text-xs font-semibold px-2.5 py-1 rounded-xl border border-cyan-500/20">
                            {{ $row['kategori'] }}
                        </span>
                    </div>

                    <div class="p-5 flex flex-col flex-grow">
                        <h3 class="text-base font-bold text-gray-100 group-hover:text-cyan-400 transition-colors duration-300 mb-1 line-clamp-1">
                            {{ $row['nama'] }}
                        </h3>
                        <p class="text-lg font-black text-emerald-400 mb-2">
                            Rp {{ number_format($row['harga'], 0, ',', '.') }}
                        </p>
                        <p class="text-gray-400 text-xs leading-relaxed mb-5 flex-grow line-clamp-2">
                            {{ $row['deskripsi'] }}
                        </p>

                        <a href="{{ route('cart') }}" class="w-full bg-gray-800 hover:bg-cyan-500 hover:text-gray-950 text-gray-200 text-center font-bold py-2.5 px-4 rounded-xl text-sm transition-all duration-300">
                            Beli Sekarang
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</body>
</html>