<?php

$conn = mysqli_connect(
"localhost",
"root",
"",
"inventaris_sklh"
);

$pesan = "";

if(isset($_POST['submit'])){

$rfid = $_POST['rfid'];

$cari = mysqli_query($conn,
"SELECT * FROM anggota
WHERE rfid='$rfid'");

$siswa = mysqli_fetch_array($cari);

if($siswa){

$nama = $siswa['nama'];

$kode_barang = $_POST['kode_barang'];

$cekBarang = mysqli_query($conn,
"SELECT * FROM barang
WHERE kode_barang='$kode_barang'");

$barang = mysqli_fetch_array($cekBarang);

$nama_barang = $barang['nama_barang'];
$stok = $barang['stok'];

if($stok > 0){

mysqli_query($conn,
"INSERT INTO peminjaman
(rfid,nama_peminjam,nama_barang,kode_barang,tanggal_pinjam,status_pinjam)
VALUES
('$rfid','$nama','$nama_barang','$kode_barang',NOW(),'Dipinjam')");

mysqli_query($conn,
"UPDATE barang
SET stok = stok - 1
WHERE kode_barang='$kode_barang'");

$pesan = "Peminjaman berhasil";

}else{

$pesan = "Stok habis";

}

}else{

$pesan = "RFID tidak terdaftar";

}

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Sistem Peminjaman</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h2>Sistem Peminjaman Alat Olahraga</h2>

<?php if($pesan != ""){ ?>

<div class="pesan">
<?= $pesan; ?>
</div>

<?php } ?>

<form method="POST">

<label>Scan RFID</label>
<input type="text" name="rfid" required>

<label>Scan Barcode Barang</label>
<input type="text" name="kode_barang" required>

<button type="submit" name="submit">
Pinjam
</button>

</form>

</div>

</body>
</html>