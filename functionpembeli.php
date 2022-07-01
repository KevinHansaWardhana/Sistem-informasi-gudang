<?php 
$conn = mysqli_connect("localhost","root","","penjualan");
	if (isset($_REQUEST['simpan'])) {
		$id_pembeli  = $_REQUEST['id_pembeli'];
		$nama_pembeli = $_REQUEST['nama_pembeli'];
		$jenkel = $_REQUEST['jenkel'];
		$no_telp = $_REQUEST['no_telp'];
		$alamat   = $_REQUEST['alamat'];

		$result = mysqli_query($conn,"INSERT INTO pembeli (id_pembeli ,nama_pembeli,jenkel,no_telp,alamat) 
									  values ('$id_pembeli','$nama_pembeli','$jenkel','$no_telp','$alamat')");
		if ($result) {
			echo "<br><div class='alert alert-success'><strong>Perhatian !!</strong> Data berhasil disimpan</div>";
			header('Location:pembeli.php');
		}else{
	        echo "<br><div class='alert alert-danger'><strong>Perhatian !!</strong> Data gagal disimpan</div>";
	        header('Location:pembeli.php');
		}
	}
  
    // Script update data
	if (isset($_REQUEST['update'])) {
		$id_pembeli  = $_REQUEST['id_pembeli'];
		$nama_pembeli = $_REQUEST['nama_pembeli'];
		$jenkel = $_REQUEST['jenkel'];
		$no_telp = $_REQUEST['no_telp'];
		$alamat   = $_REQUEST['alamat'];

		$result = mysqli_query($conn,"UPDATE pembeli SET 
									  nama_pembeli='$nama_pembeli', 
									  jenkel='$jenkel', 
									  no_telp='$no_telp', 
									  alamat='$alamat' 
									  WHERE id_pembeli ='$id_pembeli'");
		if ($result) {
			echo "<br><div class='alert alert-success'><strong>Perhatian !!</strong> Data berhasil diedit</div>";
			header('Location:pembeli.php');
		}else{
	        echo "<br><div class='alert alert-danger'><strong>Perhatian !!</strong> Data gagal disimpan</div>";
	        header('Location:pembeli.php');
		}
	}
	// Akhir update data

	if (isset($_REQUEST['hapus'])) {
		$id_pembeli =$_REQUEST['id_pembeli'];

		$result = mysqli_query($conn,"DELETE FROM pembeli WHERE id_pembeli ='$id_pembeli'");
		if ($result) {
			echo "<br><div class='alert alert-success'><strong>Perhatian !!</strong> Data berhasil dihapus</div>";
			header('Location:pembeli.php');
		}else{
	        echo "<br><div class='alert alert-danger'><strong>Perhatian !!</strong> Data gagal dihapus</div>";
	        header('Location:pembeli.php');
		}
	}
	?>