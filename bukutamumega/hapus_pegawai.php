<?php 
session_start();
if (isset($_SESSION['login']) ){
	include 'koneksi.php';
	$hapus = mysqli_query($konek , "DELETE FROM pegawai WHERE idpegawai = '$_GET[id]'");
	if (!$hapus) {
		echo "
		<script>
		alert('data gagal dihapus');
		document.location.href = 'tampil_pegawai.php';
		</script>
		";
	}else {
		echo "
		<script>
		alert('data berhasil dihapus');
		document.location.href = 'tampil_pegawai.php';
		</script>
		";
	}
}

 ?>