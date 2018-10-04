<?php 
	$path = '../';
	require_once $path.$path.'assets/commons/utils.php';
	$productId = $_GET['id'];
	$sqlRemove = "select * from products where id = $productId";
	$product = getSimpleQuery($sqlRemove);
	if (!$product) {
		header("location: " . $adminUrl . "san-pham");
		die;
	}
	unlink($path.$path.$product['image']);
	$sql = "delete from products where id = $productId";
	getSimpleQuery($sql);
	header("location: " . $adminUrl . "san-pham");
	die;
?>