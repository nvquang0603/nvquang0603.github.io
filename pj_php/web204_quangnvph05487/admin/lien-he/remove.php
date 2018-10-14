<?php 
	session_start();
	$path = '../';
	require_once $path.$path.'assets/commons/utils.php';
	$contactId = $_GET['id'];
	$sqlRemove = "select * from contacts where id = $contactId";
	$contact = getSimpleQuery($sqlRemove);
	if (!$contact) {
		header("location: " . $adminUrl . "lien-he");
		die;
	}
	$sql = "delete from contacts where id = $contactId";
	getSimpleQuery($sql);
	header("location: " . $adminUrl . "lien-he?remove-success=true");
	die;
?>