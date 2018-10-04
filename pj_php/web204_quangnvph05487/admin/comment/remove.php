<?php 
	$path = '../';
	require_once $path.$path.'assets/commons/utils.php';
	$commentId = $_GET['id'];
	$sqlRemove = "select * from comments where id = $commentId";
	$comment = getSimpleQuery($sqlRemove);
	if (!$comment) {
		header("location: " . $adminUrl . "comment");
		die;
	}
	$sql = "delete from comments where id = $commentId";
	getSimpleQuery($sql);
	header("location: " . $adminUrl . "comment");
	die;
?>