<?php
	include "koneksi.php";
	session_start();
	session_destroy(); //mematikan session
	header('location:masuk.php'); //dan mengarahkan pada masuk.php/form login
?>