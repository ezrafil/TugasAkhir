<?php

include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,
"SELECT * FROM peminjaman WHERE id='$id'");

$d = mysqli_fetch_array($data);

mysqli_query($conn,
"UPDATE peminjaman
SET status_pinjam='Dikembalikan'
WHERE id='$id'");

$barang = $d['kode_barang'];

mysqli_query($conn,
"UPDATE barang
SET stok = stok + 1
WHERE kode_barang='$barang'");

header("Location: dashboard.php");

?>