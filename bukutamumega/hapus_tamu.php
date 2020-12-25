<?php 
session_start();
if (isset($_SESSION['login']) ){
	include 'koneksi.php';
	$hapus = mysqli_query($konek , "DELETE FROM tamu WHERE idtamu = '$_GET[id]'");
	if (!$hapus) {
		echo "
		<script>
		alert('data gagal dihapus');
		document.location.href = 'tampil_tamu.php';
		</script>
		";
	}else {
		echo "
		<script>
		alert('data berhasil dihapus');
		document.location.href = 'tampil_tamu.php';
		</script>
		";
	}
}

 ?>