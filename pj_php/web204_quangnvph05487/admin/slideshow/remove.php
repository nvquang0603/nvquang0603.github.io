<?php 
	session_start();
	$path = '../';
	require_once $path.$path.'assets/commons/utils.php';
	if($_SESSION['login']['role']!=1) {
      header('location: '.$adminUrl . '?errAdmin=Chỉ Admin mới truy cập được trang này');
      die;
    }
	$slideId = $_GET['id'];
	$sqlRemove = "select * from slideshows where id = $slideId";
	$slide = getSimpleQuery($sqlRemove);
	if (!$slide) {
		header("location: " . $adminUrl . "slide");
		die;
	}
	unlink($path.$path.$slide['image']);
	$sql = "delete from slideshows where id = $slideId";
	getSimpleQuery($sql);
	header("location: " . $adminUrl . "slideshow");
	die;
?>