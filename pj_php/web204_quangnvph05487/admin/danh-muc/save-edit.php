<?php 
	$path = '../';
	require_once $path.$path.'assets/commons/utils.php';
	$id = $_POST['id'];
	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		header('location: '. $adminUrl . 'danh-muc');
		die;
	}
	$name = test_input($_POST['name']);
	$description = test_input($_POST['desc']);

	if ($name=="") {
		header('location: '. $adminUrl .'danh-muc/edit.php?id=' . $id. '&errName=Vui lòng không để trống danh mục');
		die;
	}
	$sql = "select * from categories where name = '$name' and id <> $id";
	$rs = getSimpleQuery($sql);
	if ($rs != false) {
		header('location: '. $adminUrl .'danh-muc/edit.php?id=' . $id. '&errName=Tên danh mục đã tồn tại, vui lòng chọn tên khác');
		die;
	}
	$sql = "update categories 
			set 
				name = :name,
				description = :description
			where id = :id";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':name', $name);
	$stmt->bindParam(':description', $description);
	$stmt->bindParam(':id', $id);
	$stmt->execute();
	header('location: '. $adminUrl . 'danh-muc?edit-success=true');
	die;
?>