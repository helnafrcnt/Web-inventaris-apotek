<?php 
if(isset($_GET['page'])){
	$page = $_GET['page'];

	switch ($page) {
		case 'home':
		include "home.php";
		break;

		//admin
		case 'admin':
		include 'home.php';
		break;

		//transaksi
		case 'transaksi':
		include 'modul/transaksi/index.php';
		break;

		case 'tambah_transaksi':
		include 'modul/transaksi/tambah_transaksi2.php';
		break;

		case 'kembali_transaksi':
		include 'modul/transaksi/kembali_transaksi.php';
		break;

		case 'cetak_transaksi':
		include 'modul/transaksi/cetak_transaksi.php';
		break;
		
		default:
		echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
		break;

		//barang
		case 'barang':
		include 'modul/barang/index.php';
		break;

		case 'tambah_barang':
		include 'modul/barang/tambah_barang.php';
		break;

		case 'edit_barang':
		include 'modul/barang/edit_barang.php';
		break;

		//jenis
		case 'jenis':
		include 'modul/jenis/index.php';
		break;

		case 'tambah_jenis':
		include 'modul/jenis/tambah_jenis.php';
		break;

		case 'edit_jenis':
		include 'modul/jenis/edit_jenis.php';
		break;
	}
}else{
	include "home.php";
}

?>