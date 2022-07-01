<?php 
$conn = mysqli_connect("localhost","root","","penjualan");
	if (isset($_REQUEST['simpan'])) {
		$id_barang = $_REQUEST['id_barang'];
		$nama_barang = $_REQUEST['nama_barang'];
		$harga = $_REQUEST['harga'];
		$stok = $_REQUEST['stok'];
		$id_supplier   = $_REQUEST['id_supplier'];

		$result = mysqli_query($conn,"INSERT INTO barang (id_barang,nama_barang,harga,stok,id_supplier) 
									  values ('$id_barang','$nama_barang','$harga','$stok','$id_supplier')");
		if ($result) {
			echo "<br><div class='alert alert-success'><strong>Perhatian !!</strong> Data berhasil disimpan</div>";
			header('Location:barang.php');
		}else{
	        echo "<br><div class='alert alert-danger'><strong>Perhatian !!</strong> Data gagal disimpan</div>";
	        header('Location:barang.php');
		}
	}
  
    // Script update data
	if (isset($_REQUEST['update'])) {
		$id_barang = $_REQUEST['id_barang'];
		$nama_barang = $_REQUEST['nama_barang'];
		$harga = $_REQUEST['harga'];
		$stok = $_REQUEST['stok'];
		$id_supplier   = $_REQUEST['id_supplier'];

		$result = mysqli_query($conn,"UPDATE barang SET 
									  nama_barang='$nama_barang', 
									  harga='$harga', 
									  stok='$stok', 
									  id_supplier='$id_supplier' 
									  WHERE id_barang='$id_barang'");
		if ($result) {
			echo "<br><div class='alert alert-success'><strong>Perhatian !!</strong> Data berhasil diedit</div>";
			header('Location:barang.php');
		}else{
	        echo "<br><div class='alert alert-danger'><strong>Perhatian !!</strong> Data gagal disimpan</div>";
	        header('Location:barang.php');
		}
	}
	// Akhir update data

	if (isset($_REQUEST['hapus'])) {
		$id_barang=$_REQUEST['id_barang'];

		$result = mysqli_query($conn,"DELETE FROM barang WHERE id_barang='$id_barang'");
		if ($result) {
			echo "<br><div class='alert alert-success'><strong>Perhatian !!</strong> Data berhasil dihapus</div>";
			header('Location:barang.php');
		}else{
	        echo "<br><div class='alert alert-danger'><strong>Perhatian !!</strong> Data gagal dihapus</div>";
	        header('Location:barang.php');
		}
	}
	?>