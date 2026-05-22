<?php

session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

$data = mysqli_query($conn,
"SELECT * FROM barang");

$peminjaman = mysqli_query($conn,
"SELECT * FROM peminjaman");

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


<h3>Data Barang</h3>

<div class="table-wrapper">

<table>

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

        <form action="update_stok.php" method="GET">

            <input
            type="hidden"
            name="id"
            value="<?= $d['id']; ?>">

            <button type="submit">
                Update Stok
            </button>

        </form>

    </td>

</tr>

<?php } ?>

</table>

</div>

<br><br>


<h3>Data Peminjaman</h3>

<div class="table-wrapper">

<table>

<tr>
    <th>No</th>
    <th>RFID</th>
    <th>Nama</th>
    <th>Barang</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

<?php
$no = 1;

while($p = mysqli_fetch_array($peminjaman)){
?>

<tr>

    <td><?= $no++; ?></td>

    <td><?= $p['rfid']; ?></td>

    <td><?= $p['nama_peminjam']; ?></td>

    <td><?= $p['nama_barang']; ?></td>

    <td><?= $p['status_pinjam']; ?></td>

    <td>

    <?php if($p['status_pinjam'] == 'Dipinjam'){ ?>

        <a href="kembali.php?id=<?= $p['id']; ?>">
            Kembalikan
        </a>

    <?php } else { ?>

        Sudah Kembali

    <?php } ?>

    </td>

</tr>

<?php } ?>

</table>

</div>

</div>

</body>
</html>