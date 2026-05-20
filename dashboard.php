<?php

session_start();

if(!isset($_SESSION['login'])){

header("Location: login.php");

exit;

}

include 'koneksi.php';

$data = mysqli_query($conn,
"SELECT * FROM barang");

?>

<!DOCTYPE html>
<html>

<head>

<title>Dashboard</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h2>Dashboard Admin</h2>



<a href="logout.php">Logout</a>

<br><br>

<table border="1" cellpadding="10">

<tr>

<th>No</th>
<th>Kode</th>
<th>Nama Barang</th>
<th>Stok</th>
<th>Aksi</th>

</tr>

<?php
$no = 1;

while($d = mysqli_fetch_array($data)){
?>

<tr>

<td><?= $no++; ?></td>

<td><?= $d['kode_barang']; ?></td>

<td><?= $d['nama_barang']; ?></td>

<td><?= $d['stok']; ?></td>

<td>

<a href="http://localhost/inventaris_sklh/update_stok.php?id=<?= $d['id']; ?>">
Update Stok
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>