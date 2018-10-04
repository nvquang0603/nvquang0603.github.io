<?php 
	$path = '../';
	require_once $path.$path.'assets/commons/utils.php';
	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		header('location: '. $adminUrl . 'danh-muc');
		die;
	}
	$name = test_input($_POST['name']);
	$desc = test_input($_POST['desc']);

	if ($name=="") {
		header('location: '. $adminUrl .'danh-muc/add.php?errName=Vui lòng không để trống danh mục');
		die;
	}
	$sql = "select * from categories where name = '$name'";
	$rs = getSimpleQuery($sql);
	if ($rs != false) {
		header('location: '. $adminUrl .'danh-muc/add.php?errName=Tên danh mục đã tồn tại, vui lòng chọn tên khác');
		die;
	}
	$sql = "insert into categories values (null,'$name','$desc')";
	getSimpleQuery($sql);
	header('location: '. $adminUrl . 'danh-muc?success=true');
	die;
?>