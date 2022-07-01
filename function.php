<?php 
$conn = mysqli_connect("localhost","root","","belajar");
	if (isset($_REQUEST['simpan'])) {
		$nim = $_REQUEST['nim'];
		$nama = $_REQUEST['nama'];
		$alamat = $_REQUEST['alamat'];
		$fakultas = $_REQUEST['fakultas'];
		$prodi   = $_REQUEST['prodi'];

		$result = mysqli_query($conn,"INSERT INTO mahasiswa (nim,nama,alamat,fakultas,prodi) 
									  values ('$nim','$nama','$alamat','$fakultas','$prodi')");
		if ($result) {
			echo "<br><div class='alert alert-success'><strong>Perhatian !!</strong> Data berhasil disimpan</div>";
			header('Location:index.php');
		}else{
	        echo "<br><div class='alert alert-danger'><strong>Perhatian !!</strong> Data gagal disimpan</div>";
	        header('Location:index.php');
		}
	}
  
    // Script update data
	if (isset($_REQUEST['update'])) {
		$id_mahasiswa = $_REQUEST['id_mahasiswa'];
		$nim = $_REQUEST['nim'];
		$nama = $_REQUEST['nama'];
		$alamat = $_REQUEST['alamat'];
		$fakultas = $_REQUEST['fakultas'];
		$prodi   = $_REQUEST['prodi'];

		$result = mysqli_query($conn,"UPDATE mahasiswa SET 
									  nim='$nim', 
									  nama='$nama', 
									  alamat='$alamat', 
									  fakultas='$fakultas', 
									  prodi='$prodi' 
									  WHERE id_mahasiswa='$id_mahasiswa'");
		if ($result) {
			echo "<br><div class='alert alert-success'><strong>Perhatian !!</strong> Data berhasil diedit</div>";
			header('Location:index.php');
		}else{
	        echo "<br><div class='alert alert-danger'><strong>Perhatian !!</strong> Data gagal disimpan</div>";
	        header('Location:index.php');
		}
	}
	// Akhir update data

	if (isset($_REQUEST['hapus'])) {
		$id_mahasiswa=$_REQUEST['id_mahasiswa'];

		$result = mysqli_query($conn,"DELETE FROM mahasiswa WHERE id_mahasiswa='$id_mahasiswa'");
		if ($result) {
			echo "<br><div class='alert alert-success'><strong>Perhatian !!</strong> Data berhasil dihapus</div>";
			header('Location:index.php');
		}else{
	        echo "<br><div class='alert alert-danger'><strong>Perhatian !!</strong> Data gagal dihapus</div>";
	        header('Location:index.php');
		}
	}
	?>