<?php 
	$path = '../';
	$id = $_POST['id'];
	require_once $path.$path.'assets/commons/utils.php';
	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		header('location: '. $adminUrl . 'san-pham');
		die;
	}
	$origin_image = $_POST['origin-image'];
	$product_name = test_input($_POST['name']);
	$list_price = test_input($_POST['listprice']);
	$sale_price = test_input($_POST['saleprice']);
	$detail = $_POST['detail'];
	$cate_id = test_input($_POST['category']);
	$status = test_input($_POST['status']);
	$imgName = unique_file_check(test_input($_FILES['image']['name']));
	$imgType = $_FILES['image']['type'];
	$imgSize= $_FILES['image']['size'];
	$maxsize=2097152;
	$valid_img_type = array('image/jpeg','image/png','image/gif','image/jpg');
	$imgTmp = $_FILES['image']['tmp_name'];
	$imgUrl = 'assets/images/' . $imgName;
	$imgSRC = $path.$path.'assets/images/' . $imgName;
	if ($product_name=="") {
		header('location: '. $adminUrl .'san-pham/edit.php?id=' . $id. '&errName=Vui lòng không để trống tên sản phẩm');
		die;
	}
	$sql = "select * from categories where name = '$name' and id <> $id";
	$rs = getSimpleQuery($sql);
	if ($rs != false) {
		header('location: '. $adminUrl .'san-pham/edit.php?id=' . $id. '&errName=Tên sản phẩm đã tồn tại, vui lòng chọn tên khác');
		die;
	}
	$sql = "select * from categories where id = '$cate_id'";
	$rs2 = getSimpleQuery($sql);
	if ($rs2 == false) {
		header('location: '. $adminUrl .'san-pham/edit.php?id=' . $id. '&errCate=Danh mục bạn nhập không tồn tại');
		die;
	}
	if ($sale_price=="") {
		header('location: '. $adminUrl .'san-pham/edit.php?id=' . $id. '&errSalePrice=Vui lòng không để trống giá bán');
		die;
	}
	if (!is_numeric("$sale_price")) {
		header('location: '. $adminUrl .'san-pham/edit.php?id=' . $id. '&errSalePrice=Vui lòng nhập số');
		die;
	}
	if ((int)$sale_price != $sale_price) {
		header('location: '. $adminUrl .'san-pham/edit.php?id=' . $id. '&errSalePrice=Vui lòng nhập số nguyên');
		die;
	}
	if ($sale_price < 0) {
		header('location: '. $adminUrl .'san-pham/edit.php?id=' . $id. '&errSalePrice=Vui lòng nhập số nguyên dương');
		die;
	}
	if (!is_numeric("$list_price")) {
		header('location: '. $adminUrl .'san-pham/edit.php?id=' . $id. '&errListPrice=Vui lòng nhập số');
		die;
	}
	if ((int)$list_price != $list_price) {
		header('location: '. $adminUrl .'san-pham/edit.php?id=' . $id. '&errListPrice=Vui lòng nhập số nguyên');
		die;
	}
	if ($list_price < 0) {
		header('location: '. $adminUrl .'san-pham/edit.php?id=' . $id. '&errListPrice=Vui lòng nhập số nguyên dương');
		die;
	}
	if ($sale_price>$list_price) {
		header('location: '. $adminUrl .'san-pham/edit.php?id=' . $id. '&errSalePrice=Giá bán phải nhỏ hơn giá gốc');
		die;
	}
	if ($imgSize == 0) {
		$imgUrl = $origin_image;
	}
	else if (!in_array($imgType,$valid_img_type)) {
		header('location: '. $adminUrl .'san-pham/edit.php?id=' . $id. '&errImage=Sai định dạng file');
		die;
	}
	else if ($imgSize > $maxsize) {
		header('location: '. $adminUrl .'san-pham/edit.php?id=' . $id. '&errImage=Dung lượng quá lớn. Chỉ upload ảnh tối đa 2MB');
		die;
	}
	else {
		move_uploaded_file($imgTmp, $imgSRC);
	}
	
	$sql = "update products 
			set 
				product_name = :product_name,
				cate_id = :cate_id,
				detail = :detail,
				list_price = :list_price,
				sell_price = :sale_price,
				image = :image,
				status = :status			
			where id = :id";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':product_name', $product_name);
	$stmt->bindParam(':cate_id', $cate_id);
	$stmt->bindParam(':detail', $detail);
	$stmt->bindParam(':list_price', $list_price);
	$stmt->bindParam(':sale_price', $sale_price);
	$stmt->bindParam(':image', $imgUrl);
	$stmt->bindParam(':status', $status);
	$stmt->bindParam(':id', $id);
	$stmt->execute();
	header('location: '. $adminUrl . 'san-pham?edit-success=true');
	die;
?>