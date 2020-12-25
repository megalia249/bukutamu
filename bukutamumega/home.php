<?php
session_start();
if ( !isset($_SESSION['login']) ) {
	header('location: index.php');

} 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/buku.png">

    <title>BUKU TAMU</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
	 <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="tampilAD.php">DATA ADMIN</a></li>
            <li><a href="tampil_pegawai.php">DATA PEGAWAI</a></li>
            <li><a href="tampil_tamu.php">DATA TAMU</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <hr/>
    <hr/>
    <hr/>
    <h3 align="center">SELAMAT DATANG ADMIN BUKU TAMU</h3>
    <table align="center"></table>
</body>