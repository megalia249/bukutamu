<?php 
include 'koneksi.php';
$data = mysqli_query($konek ,"SELECT * FROM pegawai");

include 'home.php';
 ?>

<!DOCTYPE html>
<html>

<body>
	<div class="container">
	<div class="page-header">
<h2> DATA PEGAWAI</h2>
	</div>
<a class="btn btn-primary btn-sm" href="tambah_pegawai.php">TAMBAH DATA</a>

<table style="margin-top: 10px;" class="table table-bordered table-striped">
 		<tr>
		<th style="text-align: center;">No</th>
		<th>NIP</th>
		<th>Nama Pegawai</th>
		<th>Jabatan</th>
		<th>Aksi</th>
	</tr>
	<?php 
	$i=1;
	while($dta = mysqli_fetch_assoc($data) ) :
	 ?>
	<tr>
		<td width="50px" style="text-align: center;"><?= $i; ?></td>
		<td width="100"><?= $dta['nip'] ?></td>
		<td width="200px"><?= $dta['namapegawai'] ?></td>
		<td width="100"><?= $dta['jabatan'] ?></td>
		<td width="100px">
			<a class="btn btn-warning btn-sm" href="edit_pegawai.php?id=<?= $dta['idpegawai'] ?>">EDIT</a> 
			<a class="btn btn-danger btn-sm" href="hapus_pegawai.php?id=<?= $dta['idpegawai'] ?>" onclick= "return confirm('apakah anda yakin ingin menghapus data?')">DELETE</a>
		</td>
	</tr>
	<?php $i++; ?>
<?php endwhile; ?>
</table>
</div>
</body>
</html>