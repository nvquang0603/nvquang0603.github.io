<?php 
	$path = '../';
	require_once $path.$path.'assets/commons/utils.php';
	$cateId = $_GET['id'];
	$sqlRemove = "select * from categories where id = $cateId";
	$cate = getSimpleQuery($sqlRemove);
	if (!$cate) {
		header("location: " . $adminUrl . "danh-muc");
		die;
	}
	$sql = "delete from products where cate_id = $cateId";
	getSimpleQuery($sql);
	$sql = "delete from categories where id = $cateId";
	getSimpleQuery($sql);
	header("location: " . $adminUrl . "danh-muc");
	die;
?>