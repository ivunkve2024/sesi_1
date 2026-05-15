<?php
include "koneksi.php";

$status = "";

// ======================
// SIMPAN DATA PRODUK
// ======================
if(isset($_POST['submit'])){

    $nama       = $_POST['nama'];
    $produk     = $_POST['produk'];
    $harga      = $_POST['harga'];
    $deskripsi  = $_POST['deskripsi'];
    $stok       = $_POST['stok'];

    $gambar = $_FILES['gambar']['name'];
    $tmp    = $_FILES['gambar']['tmp_name'];

    move_uploaded_file($tmp, "gambar/" . $gambar);

    $insert = mysqli_query($conn, "INSERT INTO products
    (nama, produk, harga, deskripsi, stok, gambar)
    VALUES
    ('$nama','$produk','$harga','$deskripsi','$stok','$gambar')");

    if($insert){
        $status = "success";
    }else{
        $status = "error";
    }
}

// ======================
// FILTER
// ======================
$filter = "";

if(isset($_GET['produk']) && $_GET['produk'] != ""){
    $produk = $_GET['produk'];
    $filter = "WHERE produk='$produk'";
}

// ======================
// DATA PRODUK
// ======================
$data = mysqli_query($conn, "SELECT * FROM products $filter");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDU Online Shop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f5f5f5;">

<div class="container mt-4">

    <!-- HEADER -->
    <div class="p-5 mb-4 bg-dark text-white rounded-4 shadow text-center">
        <h1 class="fw-bold">Selamat Datang di EDU Online Shop</h1>
        <p class="fs-5">Temukan produk terbaik dengan harga terjangkau</p>

        <button class="btn btn-warning mt-2"
                data-bs-toggle="modal"
                data-bs-target="#modalProduk">
            Tambah Produk
        </button>
    </div>

    <!-- FILTER -->
    <div class="card shadow border-0 rounded-4 mb-4">
        <div class="card-body">
            <form method="GET">
                <div class="row g-3">

                    <div class="col-lg-4">
                        <select name="produk" class="form-control">
                            <option value="">-- Pilih Kategori --</option>
                            <?php
                            $queryProduk = mysqli_query($conn, "SELECT DISTINCT produk FROM products");
                            while($dataProduk = mysqli_fetch_assoc($queryProduk)){
                            ?>
                                <option value="<?= $dataProduk['produk']; ?>">
                                    <?= $dataProduk['produk']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-lg-2">
                        <button class="btn btn-success w-100">Filter</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <!-- PRODUK -->
    <div class="row">

        <?php while($row = mysqli_fetch_assoc($data)){ ?>

        <div class="col-lg-3 col-md-6 mb-4">

            <div class="card h-100 shadow border-0 rounded-4">

                <img src="gambar/<?= $row['gambar']; ?>"
                     class="card-img-top"
                     style="height:220px; object-fit:cover;">

                <div class="card-body d-flex flex-column">

                    <span class="badge bg-primary mb-2">
                        <?= $row['produk']; ?>
                    </span>

                    <h5 class="fw-bold"><?= $row['nama']; ?></h5>

                    <p class="text-success fw-bold">
                        Rp <?= number_format($row['harga']); ?>
                    </p>

                    <p class="text-muted small"><?= $row['deskripsi']; ?></p>

                    <p><strong>Stok:</strong> <?= $row['stok']; ?></p>

                    <button class="btn btn-dark mt-auto w-100 rounded-pill">
                        Beli Sekarang
                    </button>

                </div>
            </div>

        </div>

        <?php } ?>

    </div>

</div>

<!-- MODAL -->
<div class="modal fade" id="modalProduk" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-4">

            <div class="modal-header">
                <h5 class="modal-title">Tambah Produk</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <form method="POST" enctype="multipart/form-data">

                    <input type="text" name="nama" class="form-control mb-2" placeholder="Nama Produk">

                    <input type="text" name="produk" class="form-control mb-2" placeholder="Kategori">

                    <input type="number" name="harga" class="form-control mb-2" placeholder="Harga">

                    <textarea name="deskripsi" class="form-control mb-2" placeholder="Deskripsi"></textarea>

                    <input type="number" name="stok" class="form-control mb-2" placeholder="Stok">

                    <input type="file" name="gambar" class="form-control mb-3">

                    <button type="submit" name="submit" class="btn btn-primary w-100">
                        Simpan Produk
                    </button>

                </form>

            </div>

        </div>
    </div>
</div>

<!-- SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- ALERT -->
<script>
<?php if($status == "success"){ ?>
Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: 'Produk berhasil ditambahkan'
}).then(() => {
    window.location = window.location.href;
});
<?php } ?>

<?php if($status == "error"){ ?>
Swal.fire({
    icon: 'error',
    title: 'Gagal',
    text: 'Produk gagal ditambahkan'
});
<?php } ?>
</script>

</body>
</html>