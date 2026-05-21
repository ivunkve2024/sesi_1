<?php
session_start();
include "koneksi.php";

// Jika keranjang kosong, tendang kembali ke index.php
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: index.php");
    exit;
}

// Salin data keranjang ke variabel sementara untuk invoice sebelum keranjang dihapus
$invoice_items = $_SESSION['cart'];
$no_invoice = "INV-" . date("Ymd") . "-" . rand(1000, 9999);
$tanggal = date("d F Y, H:i");
$total_bayar = 0;

// =======================================================
// PROSES PENGURANGAN STOK DI DATABASE & HITUNG TOTAL
// =======================================================
foreach ($invoice_items as $id_produk => $item) {
    $qty_dibeli = $item['quantity'];
    $subtotal = $item['harga'] * $qty_dibeli;
    $total_bayar += $subtotal;

    // Query untuk mengurangi stok produk berdasarkan ID
    // Stok baru = Stok lama - Qty dibeli
    $update_stok = mysqli_query($conn, "UPDATE products SET stok = stok - $qty_dibeli WHERE id = '$id_produk'");
}

// Setelah stok berhasil dikurangi, kosongkan keranjang belanja di session
unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - <?= $no_invoice; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body style="background:#f5f5f5;">

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <!-- Tombol Navigasi (Hilang saat dicetak) -->
            <div class="d-flex justify-content-between mb-3 no-print">
                <a href="index.php" class="btn btn-secondary">&larr; Kembali ke Toko</a>
                <button onclick="window.print()" class="btn btn-primary">Cetak / Simpan PDF</button>
            </div>

            <!-- KARTU INVOICE -->
            <div class="card shadow border-0 rounded-4 p-5 bg-white">
                
                <!-- Header Invoice -->
                <div class="row border-bottom pb-3 mb-4">
                    <div class="col-md-6">
                        <h2 class="fw-bold text-dark">EDU Online Shop</h2>
                        <p class="text-muted small">Nota Pembelian Resmi</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <h4 class="fw-bold text-success">INVOICE</h4>
                        <span class="text-muted">Nomor:</span> <strong class="text-dark"><?= $no_invoice; ?></strong><br>
                        <span class="text-muted">Tanggal:</span> <span><?= $tanggal; ?></span>
                    </div>
                </div>

                <!-- Status Pembayaran -->
                <div class="alert alert-success border-0 text-center fw-bold rounded-3 mb-4">
                    STATUS: LUNAS (Pembayaran Berhasil)
                </div>

                <!-- Tabel Detail Item -->
                <div class="table-responsive mb-4">
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Nama Produk</th>
                                <th class="text-center">Harga Satuan</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-end">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($invoice_items as $id => $item): ?>
                                <tr>
                                    <td>
                                        <span class="fw-bold"><?= $item['nama']; ?></span>
                                    </td>
                                    <td class="text-center">Rp <?= number_format($item['harga']); ?></td>
                                    <td class="text-center"><?= $item['quantity']; ?> pcs</td>
                                    <td class="text-end fw-bold">Rp <?= number_format($item['harga'] * $item['quantity']); ?></td>
                                </tr>                            
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Total Pembayaran -->
                <div class="row justify-content-end">
                    <div class="col-md-5">
                        <div class="d-flex justify-content-between border-top pt-3">
                            <span class="fs-5 fw-bold">Total Bayar:</span>
                            <span class="fs-5 fw-bold text-success">Rp <?= number_format($total_bayar); ?></span>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-5 pt-4 border-top text-muted small">
                    Terima kasih telah berbelanja di EDU Online Shop!<br>
                    Harap simpan invoice ini sebagai bukti pembayaran yang sah.
                </div>

            </div> <!-- /card -->

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>