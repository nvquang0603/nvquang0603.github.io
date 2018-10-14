<?php 
	session_start();
	$path = '../';
	require_once $path.$path.'assets/commons/utils.php';
	if($_SESSION['login']['role']!=1) {
      header('location: '.$adminUrl . '?errAdmin=Chỉ Admin mới truy cập được trang này');
      die;
    }
	$userId = $_GET['id'];
	$sqlRemove = "select * from users where id = $userId";
	$user = getSimpleQuery($sqlRemove);
	if (!$user) {
		header("location: " . $adminUrl . "users");
		die;
	}
	if ($user['role']==1) {
		header("location: " . $adminUrl . "tai-khoan?errAdmin=Không thể xóa tài khoản admin");
		die;
	}
	$sql = "delete from users where id = $userId";
	getSimpleQuery($sql);
	header("location: " . $adminUrl . "tai-khoan?remove-success=true");
	die;
?>