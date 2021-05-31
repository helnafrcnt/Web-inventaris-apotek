<?php
require_once "database.php";
$username = $_POST['username'];
$password = $_POST['password'];

if ($query = mysqli_query($mysqli, "SELECT * FROM petugas WHERE USERNAME='$username' AND PASSWORD='$password'")
or die('Ada kesalahan pada query user: '.mysqli_error($mysqli))) {
	$data  = mysqli_fetch_assoc($query);
	session_start();
		$_SESSION['id'] = $data['ID_PETUGAS'];
		$_SESSION['username'] = $data['USERNAME'];
		$_SESSION['password'] = $data['PASSWORD'];
		$_SESSION['nama_petugas'] = $data['NAMA_PETUGAS'];
		header("location:../index.php?page=admin");}
else {
	header("Location: ../login.php?alert=1");
}

?>