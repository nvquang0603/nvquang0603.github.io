<?php 
	session_start();
	$path = '../';
	require_once $path.$path.'assets/commons/utils.php';
	if($_SESSION['login']['role']!=1) {
      header('location: '.$adminUrl . '?errAdmin=Chỉ Admin mới truy cập được trang này');
      die;
    }
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