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
$nama = $_POST['nama'];
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
(rfid,nama_peminjam,nama_barang,kode_barang,tanggal_pinjam,status,status_pinjam)
VALUES
('$rfid','$nama','$nama_barang','$kode_barang',NOW(),'Dipinjam','Dipinjam')");

mysqli_query($conn,
"UPDATE barang
SET stok = stok - 1
WHERE kode_barang='$kode_barang'");

$pesan = "Peminjaman berhasil";

}else{

$pesan = "Stok habis";

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

<label>RFID Siswa</label>
<input type="text" name="rfid">

<label>Nama Siswa</label>
<input type="text" name="nama">

<label>Scan Barcode Barang</label>
<input type="text" name="kode_barang">

<button type="submit" name="submit">
Pinjam
</button>

</form>

</div>

</body>
</html>