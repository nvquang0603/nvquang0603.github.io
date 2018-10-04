<?php 
	$path = '../';
	require_once $path.$path.'assets/commons/utils.php';
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