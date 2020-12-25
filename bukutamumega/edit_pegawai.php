<?php include 'koneksi.php'; 
$pegawai = mysqli_query($konek , "SELECT * FROM pegawai WHERE idpegawai = '$_GET[id]'");
$ad = mysqli_fetch_assoc($pegawai);
include 'home.php';
?>
	<div class="container">
	<div class="page-header">
<h2> EDIT DATA PEGAWAI </h2>
	</div>
<form action="" method="post">
<table class=" table table bordered" align="center">
	<tr >
		<td>NIP</td>
		<td>:</td>
		<td>
			<input type="hidden" name="idpegawai" value="<?= $ad['idpegawai'] ?>">
			<input class="form-control"  type="text" name="nip" size="30" maxlength="50" value="<?= $ad['nip'] ?>">
		</td>
	</tr><tr >
		<td>Nama Pegawai</td>
		<td>:</td>
		<td>
			<input type="hidden" name="idpegawai" value="<?= $ad['idpegawai'] ?>">
			<input class="form-control"  type="text" name="namapegawai" size="30" maxlength="50" value="<?= $ad['namapegawai'] ?>">
		</td>
	</tr><tr >
		<td>Jabatan</td>
		<td>:</td>
		<td>
			<input type="hidden" name="idpegawai" value="<?= $ad['idpegawai'] ?>">
			<input class="form-control"  type="text" name="jabatan" size="30" maxlength="50" value="<?= $ad['jabatan'] ?>">
		</td>
	</tr>
		<td></td>
		<td></td>
		<td>
			<button class="btn btn-success" type="submit" name="ubah">EDIT</button>
		</td>
	</tr>
</table>
<form>
<?php 
if (isset($_POST['ubah']) ) {
	$idpegawai = $_POST['idpegawai'];
	$nip = $_POST['nip'];
	$namapegawai = $_POST['namapegawai'];
	$jabatan = $_POST['jabatan'];

		$edit = mysqli_query($konek , "UPDATE pegawai SET 
			nip    = '$nip',
			jabatan    = '$jabatan',
			namapegawai = '$namapegawai' WHERE idpegawai = '$idpegawai'
			");
		if ($edit) {
			echo "
			<Script>
			alert('data pegawai berhasil disimpan');
			document.location.href = 'tampil_pegawai.php';
			</script>
			";
		}else {
			echo "
			<Script>
			alert('data pegawai gagal disimpan');
			document.location.href = 'edit_pegawai.php';
			</script>
			";
		}
	}



 ?>
