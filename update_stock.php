<?php

session_start();

if(!isset($_SESSION['login'])){

header("Location: login.php");

exit;

}

include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,
"SELECT * FROM barang WHERE id='$id'");

$d = mysqli_fetch_array($data);

if(isset($_POST['update'])){

$stok = $_POST['stok'];

mysqli_query($conn,
"UPDATE barang
SET stok='$stok'
WHERE id='$id'");

header("Location: dashboard.php");

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Update Stok</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h2>Update Stok</h2>

<form method="POST">

<label>Nama Barang</label>

<input type="text"
value="<?= $d['nama_barang']; ?>"
disabled>

<label>Stok</label>

<input type="number"
name="stok"
value="<?= $d['stok']; ?>">

<button type="submit" name="update">
Update
</button>

</form>

</div>

</body>
</html>