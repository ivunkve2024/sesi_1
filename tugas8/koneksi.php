<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "ecommerce";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Koneksi gagal");
}

?>