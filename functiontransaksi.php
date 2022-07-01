<?php 
$conn = mysqli_connect("localhost","root","","penjualan");
	if (isset($_REQUEST['simpan'])) {
		$id_transaksi   = $_REQUEST['id_transaksi'];
		$id_barang  = $_REQUEST['id_barang'];
		$id_pembeli = $_REQUEST['id_pembeli'];
		$tgl_bayar   = $_REQUEST['tgl_bayar'];
		$total_bayar   = $_REQUEST['total_bayar'];
		$keterangan   = $_REQUEST['keterangan'];

		$result = mysqli_query($conn,"INSERT INTO transaksi  (id_transaksi,id_barang ,id_pembeli,tgl_bayar,total_bayar,keterangan ) 
									  values ('$id_transaksi','$id_barang ','$id_pembeli','$tgl_bayar','$total_bayar','$keterangan')");
		if ($result) {
			echo "<br><div class='alert alert-success'><strong>Perhatian !!</strong> Data berhasil disimpan</div>";
			header('Location:transaksi.php');
		}else{
	        echo "<br><div class='alert alert-danger'><strong>Perhatian !!</strong> Data gagal disimpan</div>";
	        header('Location:transaksi.php');
		}
	}
  
    // Script update data
	if (isset($_REQUEST['update'])) {
		$id_transaksi   = $_REQUEST['id_transaksi'];
		$id_barang  = $_REQUEST['id_barang'];
		$id_pembeli = $_REQUEST['id_pembeli'];
		$tgl_bayar   = $_REQUEST['tgl_bayar'];
		$total_bayar   = $_REQUEST['total_bayar'];
		$keterangan   = $_REQUEST['keterangan'];
		
		$result = mysqli_query($conn,"UPDATE transaksi  SET 
									  id_barang ='$id_barang', 
									  id_pembeli='$id_pembeli', 
									  tgl_bayar='$tgl_bayar', 
									  total_bayar='$total_bayar',
									  keterangan='$keterangan'
									  WHERE id_transaksi  ='$id_transaksi'");
		if ($result) {
			echo "<br><div class='alert alert-success'><strong>Perhatian !!</strong> Data berhasil diedit</div>";
			header('Location: transaksi.php');
		}else{
	        echo "<br><div class='alert alert-danger'><strong>Perhatian !!</strong> Data gagal disimpan</div>";
	        header('Location: transaksi.php');
		}
	}
	// Akhir update data

	if (isset($_REQUEST['hapus'])) {
		$id_transaksi  =$_REQUEST['id_transaksi'];

		$result = mysqli_query($conn,"DELETE FROM transaksi  WHERE id_transaksi  ='$id_transaksi'");
		if ($result) {
			echo "<br><div class='alert alert-success'><strong>Perhatian !!</strong> Data berhasil dihapus</div>";
			header('Location:transaksi.php');
		}else{
	        echo "<br><div class='alert alert-danger'><strong>Perhatian !!</strong> Data gagal dihapus</div>";
	        header('Location:transaksi.php');
		}
	}
	?>