<?php 
	$path = '../';
	require_once $path.$path.'assets/commons/utils.php';
	$id = $_POST['id'];
	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		header('location: '. $adminUrl . 'brand');
		die;
	}
	$origin_image = $_POST['origin-image'];
	$name = test_input($_POST['name']);
	$imgName = unique_file_check($_FILES['image']['name']);
	$imgType = $_FILES['image']['type'];
	$imgSize= $_FILES['image']['size'];
	$maxsize=2097152;
	$valid_img_type = array('image/jpeg','image/png','image/gif','image/jpg');
	$imgTmp = $_FILES['image']['tmp_name'];
	$imgUrl = 'assets/images/' . $imgName;
	$imgSRC = $path.$path.'assets/images/' . $imgName;
	$url = test_input($_POST['url']);
	if ($name=="") {
		header('location: '. $adminUrl .'brand/edit.php?id=' . $id. '&errName=Vui lòng không để trống tên thương hiệu');
		die;
	}
	$sql = "select * from brands where name = '$name' and id <> $id";
	$rs = getSimpleQuery($sql);
	if ($rs != false) {
		header('location: '. $adminUrl .'brand/edit.php?id=' . $id. '&errName=Tên thương hiệu đã tồn tại, vui lòng chọn tên khác');
		die;
	}
	if ($imgSize == 0) {
		$imgUrl = $origin_image;
	}
	else if (!in_array($imgType,$valid_img_type)) {
		header('location: '. $adminUrl .'brand/edit.php?id=' . $id. '&errImage=Sai định dạng file');
		die;
	}
	else if ($imgSize > $maxsize) {
		header('location: '. $adminUrl .'brand/edit.php?id=' . $id. '&errImage=Dung lượng quá lớn. Chỉ upload ảnh tối đa 2MB');
		die;
	}
	else {
		move_uploaded_file($imgTmp, $imgSRC);
	}	
	$sql = "update brands 
			set 
				image = :image,
				name = :name,
				url = :url	
			where id = :id";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':name', $name);
	$stmt->bindParam(':url', $url);
	$stmt->bindParam(':image', $imgUrl);
	$stmt->bindParam(':id', $id);
	$stmt->execute();
	header('location: '. $adminUrl . 'brand?edit-success=true');
	die;
?>