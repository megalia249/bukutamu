<?php
    session_start();
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	include 'koneksi.php';
	$data = mysqli_fetch_assoc($query);
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/buku2.jpg">

    <title>BUKU TAMU</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<div class="container">
	<div class="page-header">
		<h2 align="center">BUKU TAMU</h2>
	</div>
	<tr>
		<td>
			<a class="btn btn-primary" href="loginAD.php">LOGIN ADMIN</a>
		</td>
	</tr>
<div class="container">
<form action="" method="post" enctype="multipart/form-data">
	<table class="table" >

		<tr>
			<td>NIK</td>
			<td></td>
			<td>
				<input class="form-control" type="text" name="nik" placeholder="Masukan NIK Anda" size="30">
			</td>
		</tr>
		<tr>
			<td>Nama Lengkap</td>
			<td></td>
			<td>
				<input class="form-control" type="text" name="namatamu" placeholder="Masukan Nama Lengkap Anda" size="30">
			</td>
		</tr>
		<tr>
			<td>Pekerjaan</td>
			<td></td>
			<td>
				<input class="form-control" type="text" name="pekerjaan" placeholder="Masukan Pekerjaan Anda" size="30">
			</td>
		</tr><tr>
			<td>Alamat/Instansi</td>
			<td></td>
			<td>
				<input  class="form-control" type="text" name="alamat" placeholder="Masukan Alamat/Instansi Anda" size="30">
			</td>
		</tr>
		<tr>
			<td>No HP</td>
			<td></td>
			<td>
				<input  class="form-control" type="text" name="nohp" placeholder="Masukan Nomor HP Anda" size="30">
			</td>
		</tr>
		<tr>
			<td>Keperluan</td>
			<td></td>
			<td>
				<input class="form-control" type="text" name="keperluan" placeholder="Jelaskan Keperluan Anda" size="30">
			</td>
		</tr>
		<tr>
			<td>Foto</td>
			<td></td>
			<td>
				<input type="file" name="foto" size="30">
			</td>
		</tr>
		<tr>
			<td>Nama Pegawai</td>
			<td></td>
			<td>
				<input class="form-control" type="text" name="pegawai" placeholder="Masukan Nama Pegawai yang akan Ditemui" size="30">
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>
				<button class="btn btn-success btn-lg" type="submit" name="simpan">Simpan</button>
			</td>
		</tr>                           
	</table>
</form>
</div>
</div>
</body>

<?php 
 if (isset($_POST['simpan'])){
 	include 'koneksi.php';
 	$nik    = htmlspecialchars(strtolower($_POST['nik']));
 	$namatamu    = htmlspecialchars(strtolower($_POST['namatamu']));
 	$pekerjaan    = htmlspecialchars(strtolower($_POST['pekerjaan']));
 	$alamat  = htmlspecialchars(strtolower($_POST['alamat']));
 	$nohp = htmlspecialchars(strtolower($_POST['nohp']));
 	$pegawai = htmlspecialchars(strtolower($_POST['pegawai']));
 	$keperluan    = htmlspecialchars(strtolower($_POST['keperluan']));
 	$foto  = $_FILES['foto'];
	$namaFile = $_FILES['foto']['name'];
	if ($foto == '' || $_FILES['foto']['tmp_name'] == ''){
		echo "
		<script>
		alert('Masukan Foto');
		document.location.href = 'index.php';
		</script>
		";
		exit();
	} 
	$ekstensiValid = ['jpg','jpeg','png'];
	$ekstensi     = explode('.', $namaFile);
	$ekstensi     = strtolower(end($ekstensi));
	if (!in_array($ekstensi, $ekstensiValid) ) {
		echo "
		<script>
		alert('data yang anda masukan bukan merupakan gambar');
	
		</script>
		";
		exit();
	}else {
		$filePath  = uniqid();
		$filePath .= '.';
		$filePath .= $ekstensi;

		move_uploaded_file($_FILES['foto']['tmp_name'], 'img/' . $filePath);
	}



 	if ($nik == '' || $namatamu =='' || $pekerjaan =='' || $alamat =='' || $nohp =='' || $keperluan =='' || $pegawai =='' || $foto ==''){
 		echo "
 		<script>
 		alert('data belum lengkap');
 		document.location.href = 'index.php';
 		</script>
 		";
 	}
 	$data = mysqli_query($konek ,"SELECT * FROM tamu WHERE nik ='$nik'");
	$jml= mysqli_num_rows($data);
	if ($jml > 0){
		echo "
		<Script>
		alert('NIK sudah ada');
		document.location.href = 'index.php';
		</script>
		";
		exit();
	}else {
 		$simpan = mysqli_query($konek , "INSERT INTO tamu VALUES (null,'$nik','$namatamu','$pekerjaan','$alamat','$nohp','$pegawai','$keperluan','$foto')
 			");
 		if ($simpan){
 			echo "
 		<script>
 		alert('data berhasil disimpan');
 		document.location.href = 'index.php';
 		</script>
 		";
 		}else {
 			echo "
 		<script>
 		alert('data gagal disimpan');
 		document.location.href = 'index.php';
 		</script>
 		";
 		}
 		}
 	}
 
 ?>