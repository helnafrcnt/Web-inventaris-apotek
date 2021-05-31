<?php 
	session_start();
	require_once"config/database.php";

 	if(!isset($_SESSION['username']) && !isset($_SESSION['password']))
 	{
		header('Location: login.php?alert=2');
 	}
 ?>