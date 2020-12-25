<?php 
include 'koneksi.php';
$data = mysqli_query($konek ,"SELECT * FROM tamu");

include 'home.php';
 ?>

<!DOCTYPE html>
<html>

<body>
	<div class="container">
	<div class="page-header">
<h2> DATA TAMU</h2>
	</div>

<table style="margin-top: 10px;" class="table table-bordered table-striped">
 		<tr>
		<th style="text-align: center;">No</th>
		<th>NIK</th>
		<th>Nama Tamu</th>
		<th>Pekerjaan</th>
		<th>Alamat/Instansi</th>
		<th>No HP</th>
		<th>Nama Pegawai</th>
		<th>Keperluan</th>
		<th>Aksi</th>
	</tr>
	<?php 
	$i=1;
	while($dta = mysqli_fetch_assoc($data) ) :
	 ?>
	<tr>
		<td width="50px" style="text-align: center;"><?= $i; ?></td>
		<td width="100"><?= $dta['nik'] ?></td>
		<td width="100"><?= $dta['namatamu'] ?></td>
		<td width="100"><?= $dta['pekerjaan'] ?></td>
		<td width="100"><?= $dta['alamat'] ?></td>
		<td width="100"><?= $dta['nohp'] ?></td>
		<td width="100"><?= $dta['pegawai'] ?></td>
		<td width="100"><?= $dta['keperluan'] ?></td>

		<td width="100px">
			<a class="btn btn-danger btn-sm" href="hapus_tamu.php?id=<?= $dta['idtamu'] ?>" onclick= "return confirm('apakah anda yakin ingin menghapus data?')">DELETE</a>
		</td>
	</tr>
	<?php $i++; ?>
<?php endwhile; ?>
</table>
</div>
</body>
</html>