<?php 
$conn = mysqli_connect("localhost","root","","penjualan");
session_start();
if (!isset($_SESSION["username"])) {
	echo "<center>Anda harus login dulu <br><a href='login.php'>Klik disini</a></center>";
	exit;
}
$username=$_SESSION["username"];
$nama=$_SESSION["nama"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Penjualan Barang</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="dataTables.bootstrap.min.css">
</head>
<body>

<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="barang.php">Data Barang</a></li>
  <li><a href="supplier.php">Data Supplier</a></li>
  <li><a href="pembeli.php">Data Pembeli</a></li>
  <li><a href="transaksi.php">Data Transaksi</a></li>
  <a href="logout.php" class="btn btn-danger" role="button">Logout</a></li>
</ul>
<br>
<center>
<h1> Selamat Datang <h1>
<center>
</body>
</html>