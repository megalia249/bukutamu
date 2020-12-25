<?php include 'koneksi.php'; 

include 'home.php';
?>
<div class="container">
	<div class="page-header">
<h2 >TAMBAH DATA PEGAWAI</h2>
	</div>
<form action="" method="post">
<table class="table table-bordered" align="center">
	<tr>
		<td>NIP</td>
		
		<td>
			<input class="form-control" type="text" name="nip" placeholder="NIP di Perusahaan" size="30" maxlength="50">
		</td>
	</tr>
	<tr>
		<td>Nama Lengkap Pegawai</td>
		
		<td>
			<input class="form-control" type="text" name="namapegawai" placeholder="Nama Lengkap Pegawai" size="30" maxlength="50">
		</td>
	</tr>
	<tr>
		<td>Jabatan</td>
	
		<td>
			<input class="form-control" type="text" name="jabatan" placeholder="Jabatan di Perusahaan" size="30" max="50">
		</td>
	</tr>
	<tr>
		<td></td>

		<td>
			<button class="btn btn-success " type="submit" name="tambah">SIMPAN</button>
		</td>
	</tr>
</table>
</div>
<form>
<?php 
if (isset($_POST['tambah']) ) {
	$nip = $_POST['nip'];
	$namapegawai = $_POST['namapegawai'];
	$jabatan = $_POST['jabatan'];

	if($nip == '' || $namapegawai == '' || $jabatan==''){
		echo "
		<Script>
		alert('data belum lengkap');
		document.location.href = 'tambah_pegawai.php';
		</script>
		";
		exit();
	}
	$data = mysqli_query($konek ,"SELECT * FROM pegawai WHERE nip ='$nip'");
	$jml= mysqli_num_rows($data);
	if ($jml > 0){
		echo "
		<Script>
		alert('NIP sudah ada');
		document.location.href = 'tambah_pegawai.php';
		</script>
		";
		exit();
	}else {
		$simpan = mysqli_query($konek , "INSERT INTO pegawai VALUES (null ,'$nip','$namapegawai','$jabatan')
			");
		if ($simpan) {
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
			document.location.href = 'tambah_pegawai.php';
			</script>
			";
			
		}
	}
}


 ?>