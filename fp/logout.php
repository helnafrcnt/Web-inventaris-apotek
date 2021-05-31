<?php
include "session.php"; error_reporting(0);
include "session.php";
session_start();
session_destroy();

header('Location: login.php?alert=3');
?>