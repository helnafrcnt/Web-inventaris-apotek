<?php 

$server 	= "localhost";
$username 	= "root";
$password	= "";
$database	= "apotek_fix";

$mysqli = mysqli_connect($server, $username, $password, $database) or die('Koneksi Database Gagal : '.$mysqli->connect_error)
?>