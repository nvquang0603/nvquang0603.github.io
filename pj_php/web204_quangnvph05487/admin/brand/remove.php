<?php 
	$path = '../';
	require_once $path.$path.'assets/commons/utils.php';
	$brandId = $_GET['id'];
	$sqlRemove = "select * from brands where id = $brandId";
	$brand = getSimpleQuery($sqlRemove);
	if (!$brand) {
		header("location: " . $adminUrl . "brand");
		die;
	}
	unlink($path.$path.$brand['image']);
	$sql = "delete from brands where id = $brandId";
	getSimpleQuery($sql);
	header("location: " . $adminUrl . "brand");
	die;
?>