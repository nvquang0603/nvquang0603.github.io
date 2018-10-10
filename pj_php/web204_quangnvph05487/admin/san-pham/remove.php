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
	if ($product['image'] != "assets/images/sample-product.jpg") {
		unlink($path.$path.$product['image']);
	}
	$sql = "delete from comments where product_id = $productId";
	getSimpleQuery($sql);
	$sql = "delete from products where id = $productId";
	getSimpleQuery($sql);
	header("location: " . $adminUrl . "san-pham");
	die;
?>