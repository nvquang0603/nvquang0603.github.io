<?php 
	session_start();
	$path = '../';
	require_once $path.$path.'assets/commons/utils.php';
	if($_SESSION['login']['role']!=1) {
      header('location: '.$adminUrl . '?errAdmin=Chỉ Admin mới truy cập được trang này');
      die;
    }
	$slideId = $_GET['id'];
	$stt = $_GET['stt'];
	$sqlSlide = "select * from slideshows where id = $slideId";
	$slide = getSimpleQuery($sqlSlide);
	if (!$slide) {
		header("location: " . $adminUrl . "slide");
		die;
	}
	$sql = "update slideshows set status = (1-$stt) where id = $slideId";
	getSimpleQuery($sql);
	header("location: " . $adminUrl . "slideshow");
	die;
?>