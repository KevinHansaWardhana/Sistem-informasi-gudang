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
	        <h4 class="modal-title" id="tambahDataLabel">Tambah Barang</h4>
	      </div>
	      <div class="modal-body">
	       	<form class="form-horizontal" action="functionbarang.php" method="POST">
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Id Barang</label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" id="inputEmail3" name="id_barang" placeholder="Id Barang">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Nama Barang</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputEmail3" name="nama_barang" placeholder="Nama Barang">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Harga</label>
			    <div class="col-sm-10">
				  <input type="text" class="form-control" id="inputEmail3" name="harga" placeholder="Harga">
			    </div>
			  </div>
			<div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Stok</label>
			    <div class="col-sm-10">
				  <input type="text" class="form-control" id="inputEmail3" name="stok" placeholder="Stok">
			    </div>
			  </div>
			<div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Nama Supplier</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="id_supplier">
				  <option>Pilih Nama Pembeli</option>
			      	<?php 
$sql ="select *from supplier";
$retval = mysqli_query($conn,$sql );
while($row = mysqli_fetch_array($retval)){
	echo "<option value= '$row[id_supplier]'>$row[nama_supplier]</option>";
}
	?>
			      </select>
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
				<th>Id Barang</th>
				<th>Nama Barang</th>
				<th>Harga</th>
				<th>Stok</th>
				<th>Nama Supplier</th>
				<th>AKSI</th>
			</tr>
		</thead>
		 <tbody>
		<?php 
		  $query = mysqli_query($conn,"SELECT  id_barang, nama_barang, harga,stok, supplier.nama_supplier from barang,supplier where barang.id_supplier=supplier.id_supplier ORDER BY id_barang DESC");
		  while ($data=mysqli_fetch_array($query)) {
		?>
		<tr>
			<td><?php echo $data['id_barang']; ?></td>
			<td><?php echo $data['nama_barang']; ?></td>
			<td><?php echo $data['harga']; ?></td>
			<td><?php echo $data['stok']; ?></td>
			<td><?php echo $data['nama_supplier']; ?></td>
			<td>
			    <!-- Edit Data -->
				<a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit<?php echo $data['id_barang']; ?>">edit</a>

				<div class="modal fade bs-example-modal-lg" id="edit<?php echo $data['id_barang']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog  modal-lg" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Edit Data barang</h4>
				      </div>
				      <div class="modal-body">
				        <form class="form-horizontal" action="functionbarang.php" method="POST">
				          <input type="hidden" name="id_barang" value="<?php echo $data['id_barang']; ?>">
						  <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Id Barang</label>
						    <div class="col-sm-4">
						      <input type="text" class="form-control" id="inputEmail3" name="id_barang" placeholder="Id Barang" value="<?php echo $data['id_barang']; ?>" readonly>
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label">Nama Barang</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputPassword3" name="nama_barang" placeholder="Nama Barang" value="<?php echo $data['nama_barang']; ?>">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label">Harga Barang</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="inputPassword3" name="harga" placeholder="Harga Barang" value="<?php echo $data['harga']; ?>">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="inputPassword3" class="col-sm-2 control-label">Stok</label>
						    <div class="col-sm-10">
							 <input type="text" class="form-control" id="inputPassword3" name="stok" placeholder="Stok" value="<?php echo $data['stok']; ?>">
						    </div>
						  </div>
				<div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">Nama Supplier</label>
			    <div class="col-sm-10">
			      <select class="form-control" name="id_supplier">
				  <option>Pilih Nama Pembeli</option>
			      	<?php 
$sql ="select *from supplier";
$retval = mysqli_query($conn,$sql );
while($row = mysqli_fetch_array($retval)){
	echo "<option value= '$row[id_supplier]'>$row[nama_supplier]</option>";
}
	?>
			      </select>
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
				<a href="#" class="btn btn-danger btn-sm" data-target=".bs-example-modal-lg<?php echo $data['id_barang']; ?>" data-toggle="modal">delete</a>

				<div class="modal fade bs-example-modal-lg<?php echo $data['id_barang']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
				  <div class="modal-dialog modal-lg" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus data</h4>
				      </div>
				      <div class="modal-body">
				        <h4>Apakah anda benar-benar ingin menghapus data ini ?</h4>
				        <form action="functionbarang.php" method="POST">
				        <input type="hidden" name="id_barang" value="<?php echo $data['id_barang']; ?>">
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