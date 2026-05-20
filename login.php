<?php

session_start();

include 'koneksi.php';

if(isset($_POST['login'])){

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn,
"SELECT * FROM admin
WHERE username='$username'
AND password='$password'");

$cek = mysqli_num_rows($query);

if($cek > 0){

$_SESSION['login'] = true;

header("Location: dashboard.php");

}else{

echo "Username atau password salah";

}

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Login Admin</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h2>Login Admin</h2>

<form method="POST">

<label>Username</label>
<input type="text" name="username">

<label>Password</label>
<input type="password" name="password">

<button type="submit" name="login">
Login
</button>

</form>

</div>

</body>
</html>