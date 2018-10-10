<?php 
	session_start();
	require_once './assets/commons/utils.php';
	if (isset($_SESSION['login'])) {
		unset($_SESSION['login']);
		header('location: '. $siteUrl . 'login.php');
	}
	else {
		header('location: '. $siteUrl . 'login.php?msg=Bạn phải đăng nhập thì mới đăng xuất được');
	}
	
?>