<?php

session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM barang");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">
<div class="table-wrapper">
    <table>
        ...
    </table>
</div>

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
        <form action="update_stock.php" method="GET">
            <input type="hidden" name="id" value="<?= $d['id']; ?>">
            <button type="submit">Update Stok</button>
        </form>

        <!-- tombol pinjam / kembali (opsional kalau nanti dipakai) -->
        <a href="kembali.php?id=<?= $d['id']; ?>">Kembalikan</a>
    </td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>