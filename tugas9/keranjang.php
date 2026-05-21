<?php
session_start();
include "koneksi.php";

// ==========================================
// PROSES LOGIKA KERANJANG (ADD, DELETE, UPDATE)
// ==========================================

// 1. Tambah Produk ke Keranjang
if (isset($_GET['action']) && $_GET['action'] == "add" && $_SERVER['REQUEST_METHOD'] == "POST") {
    $id_produk = $_GET['id'];
    
    // Jika produk sudah ada di keranjang, tambah quantity-nya
    if (isset($_SESSION['cart'][$id_produk])) {
        $_SESSION['cart'][$id_produk]['quantity'] += 1;
    } else {
        // Jika belum ada, masukkan data baru
        $_SESSION['cart'][$id_produk] = [
            'nama' => $_POST['nama_produk'],
            'harga' => $_POST['harga_produk'],
            'gambar' => $_POST['gambar_produk'],
            'quantity' => 1
        ];
    }
    // Redirect kembali ke index.php atau tetap di keranjang
    header("Location: keranjang.php");
    exit;
}

// 2. Hapus Produk dari Keranjang
if (isset($_GET['action']) && $_GET['action'] == "delete") {
    $id_produk = $_GET['id'];
    if (isset($_SESSION['cart'][$id_produk])) {
        unset($_SESSION['cart'][$id_produk]);
    }
    header("Location: keranjang.php");
    exit;
}

// 3. Update Quantity (Jika pengguna mengubah jumlah lewat input)
if (isset($_POST['update_cart'])) {
    foreach ($_POST['quantity'] as $id => $qty) {
        if ($qty <= 0) {
            unset($_SESSION['cart'][$id]);
        } else {
            $_SESSION['cart'][$id]['quantity'] = $qty;
        }
    }
    header("Location: keranjang.php");
    exit;
}

// 4. Kosongkan Keranjang
if (isset($_GET['action']) && $_GET['action'] == "clear") {
    unset($_SESSION['cart']);
    header("Location: keranjang.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - EDU Online Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#f5f5f5;">

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><span class="fw-bold text-dark">Keranjang</span> Belanja Anda</h2>
        <a href="index.php" class="btn btn-outline-secondary">&larr; Kembali Belanja</a>
    </div>

    <?php if (empty($_SESSION['cart'])): ?>
        <!-- Tampilan jika keranjang kosong -->
        <div class="alert alert-warning p-5 rounded-4 shadow-sm text-center">
            <h4 class="fw-bold">Keranjangmu masih kosong nih...</h4>
            <p class="text-muted">Yuk, cari produk menarik di toko kami dan masukkan ke keranjang!</p>
            <a href="index.php" class="btn btn-warning mt-2 fw-bold">Lihat Produk</a>
        </div>
    <?php else: ?>
        <!-- Tampilan tabel keranjang -->
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="card shadow border-0 rounded-4 p-3">
                    <form method="POST" action="keranjang.php">
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th style="width: 100px;">Jumlah</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $total_belanja = 0;
                                    foreach ($_SESSION['cart'] as $id => $item): 
                                        $subtotal = $item['harga'] * $item['quantity'];
                                        $total_belanja += $subtotal;
                                    ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="gambar/<?= $item['gambar']; ?>" class="rounded shadow-sm me-3" style="width:60px; height:60px; object-fit:cover;">
                                                    <span class="fw-bold"><?= $item['nama']; ?></span>
                                                </div>
                                            </td>
                                            <td>Rp <?= number_format($item['harga']); ?></td>
                                            <td>
                                                <input type="number" name="quantity[<?= $id; ?>]" value="<?= $item['quantity']; ?>" class="form-control form-control-sm" min="1">
                                            </td>
                                            <td class="fw-bold text-success">Rp <?= number_format($subtotal); ?></td>
                                            <td>
                                                <a href="keranjang.php?action=delete&id=<?= $id; ?>" class="btn btn-sm btn-danger rounded-pill px-3">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="d-flex justify-content-between mt-3">
                            <a href="keranjang.php?action=clear" class="btn btn-sm btn-outline-danger" onclick="return confirm('Kosongkan keranjang?')">Kosongkan Keranjang</a>
                            <button type="submit" name="update_cart" class="btn btn-sm btn-primary">Perbarui Keranjang</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Ringkasan Belanja -->
            <div class="col-lg-4">
                <div class="card shadow border-0 rounded-4 bg-dark text-white p-4">
                    <h4 class="fw-bold mb-4">Ringkasan</h4>
                    <div class="d-flex justify-content-between mb-3 border-bottom pb-2">
                        <span>Total Item:</span>
                        <span>
                            <?php 
                            echo array_sum(array_column($_SESSION['cart'], 'quantity')); 
                            ?> pcs
                        </span>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                        <span class="fs-5">Total Bayar:</span>
                        <span class="fs-5 fw-bold text-warning">Rp <?= number_format($total_belanja); ?></span>
                    </div>
                    <a href="checkout.php" class="btn btn-warning w-100 fw-bold rounded-pill py-2 text-center" onclick="return confirm('Apakah Anda yakin ingin memproses checkout ini?')">
                        Checkout Sekarang
                    </a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>