<?php

$conn = mysqli_connect(
"localhost",
"root",
"",
"inventaris_sklh"
);

if(isset($_POST['submit'])){

$rfid = $_POST['rfid'];
$nama = $_POST['nama'];
$barang = $_POST['barang'];

mysqli_query($conn,
"INSERT INTO peminjaman
(rfid,nama_peminjam,nama_barang,tanggal_pinjam,status)
VALUES
('$rfid','$nama','$barang',NOW(),'Dipinjam')");

echo "Data berhasil disimpan";

}

?>

<h2>Sistem Peminjaman Barang RFID</h2>

<form method="POST">

RFID:
<input type="text" name="rfid">

<br><br>

Nama:
<input type="text" name="nama">

<br><br>

Nama Barang:
<input type="text" name="barang">

<br><br>

<button type="submit" name="submit">
Pinjam
</button>

</form>