<?php 
	$path = '../';
	require_once $path.$path.'assets/commons/utils.php';
	$id = $_POST['id'];
	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		header('location: '. $adminUrl . 'slideshow');
		die;
	}
	$origin_image = $_POST['origin-image'];
	$desc = test_input($_POST['desc']);
	$url = test_input($_POST['url']);
	$status = $_POST['status'];
	$order_number = test_input($_POST['ordernumber']);
	$imgName = unique_file_check(test_input($_FILES['image']['name']));
	$imgType = $_FILES['image']['type'];
	$imgSize= $_FILES['image']['size'];
	$maxsize=2097152;
	$valid_img_type = array('image/jpeg','image/png','image/gif','image/jpg');
	$imgTmp = $_FILES['image']['tmp_name'];
	$imgUrl = 'assets/images/' . $imgName;
	$imgSRC = $path.$path.'assets/images/' . $imgName;
	if (!is_numeric("$order_number")) {
		header('location: '. $adminUrl .'slideshow/edit.php?id=' . $id. '&errOrderNumber=Vui lòng nhập số');
		die;
	}
	if ((int)$order_number != $order_number) {
		header('location: '. $adminUrl .'slideshow/edit.php?id=' . $id. '&errOrderNumber=Vui lòng nhập số nguyên');
		die;
	}
	if ($imgSize == 0) {
		$imgUrl = $origin_image;
	}
	else if (!in_array($imgType,$valid_img_type)) {
		header('location: '. $adminUrl .'slideshow/edit.php?id=' . $id. '&errImage=Sai định dạng file');
		die;
	}
	else if ($imgSize > $maxsize) {
		header('location: '. $adminUrl .'slideshow/edit.php?id=' . $id. '&errImage=Dung lượng quá lớn. Chỉ upload ảnh tối đa 2MB');
		die;
	}
	else {
		move_uploaded_file($imgTmp, $imgSRC);
	}	
	$sql = "update slideshows 
			set 
				image = :image,
				description = :description,
				url = :url,
				status = :status,
				order_number = :order_number		
			where id = :id";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':description', $desc);
	$stmt->bindParam(':url', $url);
	$stmt->bindParam(':order_number', $order_number);
	$stmt->bindParam(':image', $imgUrl);
	$stmt->bindParam(':status', $status);
	$stmt->bindParam(':id', $id);
	$stmt->execute();
	header('location: '. $adminUrl . 'slideshow?edit-success=true');
	die;
?>