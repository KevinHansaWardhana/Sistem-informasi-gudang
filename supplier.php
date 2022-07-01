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

<div class="wrapper">
 
   &nbsp &nbsp<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#tambahData">Tambah</button>
   <!-- Modal Tambah Data -->
   <div class="modal fade bs-example-modal-lg" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="tambahDataLabel">
	  <div class="modal-dialog  modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="tambahDataLabel">Tambah Supplier</h4>
	      </div>
	      <div class="modal-body">
	       	<form class="form-horizontal" action="functionsupplier.php" method="POST">
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Id Supplier</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" id="inputEmail3" name="id_supplier" placeholder="Id Supplier">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Nama Supplier</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputEmail3" name="nama_supplier" placeholder="Nama Supplier">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">No Telp</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputEmail3" name="no_telp" placeholder="No Telp">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
			    <div class="col-sm-10">
			      <textarea class="form-control" placeholder="Alamat" name="alamat"></textarea>
			    </div>
			  </div>
			
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
	        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
	       </form>
	      </div>
	    </div>
	  </div>
	</div>
<!-- Akhir modal tambah data -->
   <br>
   <br>
   <!-- Aksi Insert Data dalam DB -->
	
  <!-- Akhir insert data -->
 <!-- Menampilkan data  -->
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Id Supplier</th>
				<th>Nama Supplier</th>
				<th>No Telp</th>
				<th>Alamat</th>
				<th>AKSI</th>
			</tr>
		</thead>
		 <tbody>
		<?php 
		  $query = mysqli_query($conn,"SELECT * FROM supplier ORDER BY id_supplier DESC");
		  while ($data=mysqli_fetch_array($query)) {
		?>
		<tr>
			<td><?php echo $data['id_supplier']; ?></td>
			<td><?php echo $data['nama_supplier']; ?></td>
			<td><?php echo $data['no_telp']; ?></td>
			<td><?php echo $data['alamat']; ?></td>
		<td>
			    <!-- Edit Data -->
				<a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit<?php echo $data['id_supplier']; ?>">edit</a>

				<div class="modal fade bs-example-modal-lg" id="edit<?php echo $data['id_supplier']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog  modal-lg" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Edit Data Supplier</h4>
				      </div>
				      <div class="modal-body">
				        <form class="form-horizontal" action="functionsupplier.php" method="POST">
				          <input type="hidden" name="id_supplier" value="<?php echo $data['id_supplier']; ?>">
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Id Supplier</label>
						    <div class="col-sm-4">
						      <input type="text" class="form-control" id="inputEmail3" name="id_supplier" placeholder="Id Supplier" value="<?php echo $data['id_supplier']; ?>" readonly>
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Nama Supplier</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputEmail3" name="nama_supplier" placeholder="Nama Supplier" value="<?php echo $data['nama_supplier']; ?>">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">No Telp</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputEmail3" name="no_telp" placeholder="No Telp" value="<?php echo $data['no_telp']; ?>">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
						    <div class="col-sm-10">
						      <textarea class="form-control" placeholder="Alamat" name="alamat" value="<?php echo $data['alamat']; ?>"><?php echo $data['alamat']; ?></textarea>
						    </div>
						  </div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
				        <button type="submit" class="btn btn-primary" name="update">Simpan</button>
				       </form>
				      </div>
				    </div>
				  </div>
				</div>
                <!-- Akhir edit data -->
                <!-- Hapus data -->
				<a href="#" class="btn btn-danger btn-sm" data-target=".bs-example-modal-lg<?php echo $data['id_supplier']; ?>" data-toggle="modal">delete</a>

				<div class="modal fade bs-example-modal-lg<?php echo $data['id_supplier']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
				  <div class="modal-dialog modal-lg" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus data</h4>
				      </div>
				      <div class="modal-body">
				        <h4>Apakah anda benar-benar ingin menghapus data ini ?</h4>
				        <form action="functionsupplier.php" method="POST">
				        <input type="hidden" name="id_supplier" value="<?php echo $data['id_supplier']; ?>">
				      </div>
				       <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
				        <button type="submit" class="btn btn-primary" name="hapus">Hapus</button>
				       </form>
				      </div>
				    </div>
				  </div>
				</div>

				<!-- Akhir hapus data -->
			</td>
		</tr>
		<?php } ?>
		  </tbody>
	</table>
<!-- Menampilkan Data -->
</div>

<script src="jquery.js"></script>
<script type="text/javascript" src="jquery-1.12.4.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="jquery.dataTables.min.js"></script>
<script type="text/javascript" src="dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	    $('#example').DataTable();
	} );
</script>
</body>
</html>