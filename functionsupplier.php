<?php 
$conn = mysqli_connect("localhost","root","","penjualan");
	if (isset($_REQUEST['simpan'])) {
		$id_supplier  = $_REQUEST['id_supplier'];
		$nama_supplier = $_REQUEST['nama_supplier'];
		$no_telp = $_REQUEST['no_telp'];
		$alamat = $_REQUEST['alamat'];
		
		$result = mysqli_query($conn,"INSERT INTO supplier (id_supplier ,nama_supplier,no_telp, alamat) 
									  values ('$id_supplier','$nama_supplier','$no_telp','$alamat')");
		if ($result) {
			echo "<br><div class='alert alert-success'><strong>Perhatian !!</strong> Data berhasil disimpan</div>";
			header('Location:supplier.php');
		}else{
	        echo "<br><div class='alert alert-danger'><strong>Perhatian !!</strong> Data gagal disimpan</div>";
	        header('Location:supplier.php');
		}
	}
  
    // Script update data
	if (isset($_REQUEST['update'])) {
		$id_supplier  = $_REQUEST['id_supplier'];
		$nama_supplier = $_REQUEST['nama_supplier'];
		$no_telp = $_REQUEST['no_telp'];
		$alamat = $_REQUEST['alamat'];
		

		$result = mysqli_query($conn,"UPDATE supplier SET 
									  nama_supplier='$nama_supplier', 
									  no_telp='$no_telp', 
									  alamat='$alamat'
									  WHERE id_supplier ='$id_supplier'");
		if ($result) {
			echo "<br><div class='alert alert-success'><strong>Perhatian !!</strong> Data berhasil diedit</div>";
			header('Location:supplier.php');
		}else{
	        echo "<br><div class='alert alert-danger'><strong>Perhatian !!</strong> Data gagal disimpan</div>";
	        header('Location:supplier.php');
		}
	}
	// Akhir update data

	if (isset($_REQUEST['hapus'])) {
		$id_supplier =$_REQUEST['id_supplier'];

		$result = mysqli_query($conn,"DELETE FROM supplier WHERE id_supplier ='$id_supplier'");
		if ($result) {
			echo "<br><div class='alert alert-success'><strong>Perhatian !!</strong> Data berhasil dihapus</div>";
			header('Location:supplier.php');
		}else{
	        echo "<br><div class='alert alert-danger'><strong>Perhatian !!</strong> Data gagal dihapus</div>";
	        header('Location:supplier.php');
		}
	}
	?>