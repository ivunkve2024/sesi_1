<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Produk Bootstrap</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-lg border-0 rounded-4">        
            <div class="card-header bg-dark-subtle text-dark-emphasis rounded-top-4 d-flex justify-content-center align-items-center">
                <h3 class="mb-0">Tambah Produk</h3>
            </div>
            <div class="card-body p-4">
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama produk">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="number" name="harga" class="form-control" placeholder="Masukkan harga">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="4" placeholder="Masukkan deskripsi produk"></textarea>
                    </div>                    
                    <button type="submit" class="btn btn-primary">
                        Simpan Produk
                    </button>
                    
                </form>
                <hr>

                <?php

                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $nama = $_POST['nama'];
                    $harga = $_POST['harga'];
                    $deskripsi = $_POST['deskripsi'];

                    // Validasi
                    if ($nama == "" || $harga == "" || $deskripsi == "") {

                        echo "
                        <div class='alert alert-danger mt-3'>
                            Semua data harus diisi!
                        </div>
                        ";

                    } // Validasi nama minimal 3 karakter
                    elseif (strlen($nama) < 3) {

                        echo "
                        <div class='alert alert-warning'>
                            Nama produk minimal 3 karakter!
                        </div>
                        ";

                    } else {

                        echo "
                        <div class='alert alert-success mt-3'>
                            Data berhasil disimpan!
                        </div>
                        ";

                        echo "
                        <div class='card mt-4 border-success'>
                            <div class='card-header bg-success text-white'>
                                Data Produk
                            </div>

                            <div class='card-body'>
                                <p><strong>Nama Produk:</strong> $nama</p>
                                <p><strong>Harga:</strong> Rp $harga</p>
                                <p><strong>Deskripsi:</strong> $deskripsi</p>
                            </div>
                        </div>
                        ";
                    }
                }

                ?>

            </div>
        </div>
    </div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>