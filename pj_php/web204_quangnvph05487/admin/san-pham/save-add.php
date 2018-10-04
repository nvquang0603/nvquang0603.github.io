<?php 
	$path = '../';
	require_once $path.$path.'assets/commons/utils.php';
	if ($_SERVER['REQUEST_METHOD'] != 'POST') {
		header('location: '. $adminUrl . 'san-pham');
		die;
	}
	$product_name = test_input($_POST['name']);
	$list_price = test_input($_POST['listprice']);
	$sale_price = test_input($_POST['saleprice']);
	$detail = test_input($_POST['detail']);
	$cate_id = $_POST['category'];
	$status = $_POST['status'];
	$imgName = unique_file_check(test_input($_FILES['image']['name']));
	$imgType = $_FILES['image']['type'];
	$imgSize= $_FILES['image']['size'];
	$maxsize=2097152;
	$valid_img_type = array('image/jpeg','image/png','image/gif','image/jpg');
	$imgTmp = $_FILES['image']['tmp_name'];
	$imgUrl = 'assets/images/' . $imgName;
	$imgSRC = $path.$path.'assets/images/' . $imgName;
	if ($product_name=="") {
		header('location: '. $adminUrl .'san-pham/add.php?errName=Vui lòng không để trống tên sản phẩm');
		die;
	}
	$sql = "select * from products where product_name = '$product_name'";
	$rs = getSimpleQuery($sql);
	if ($rs != false) {
		header('location: '. $adminUrl .'san-pham/add.php?errName=Tên sản phẩm đã tồn tại, vui lòng chọn tên khác');
		die;
	}
	if ($sale_price=="") {
		header('location: '. $adminUrl .'san-pham/add.php?errSalePrice=Vui lòng không để trống giá bán');
		die;
	}
	if (!is_numeric("$sale_price")) {
		header('location: '. $adminUrl .'san-pham/add.php?errSalePrice=Vui lòng nhập số');
		die;
	}
	if ((int)$sale_price != $sale_price) {
		header('location: '. $adminUrl .'san-pham/add.php?errSalePrice=Vui lòng nhập số nguyên');
		die;
	}
	if ($sale_price < 0) {
		header('location: '. $adminUrl .'san-pham/add.php?errSalePrice=Vui lòng nhập số nguyên dương');
		die;
	}
	if (!is_numeric("$list_price")) {
		header('location: '. $adminUrl .'san-pham/add.php?errListPrice=Vui lòng nhập số');
		die;
	}
	if ((int)$list_price != $list_price) {
		header('location: '. $adminUrl .'san-pham/add.php?errListPrice=Vui lòng nhập số nguyên');
		die;
	}
	if ($list_price < 0) {
		header('location: '. $adminUrl .'san-pham/add.php?errListPrice=Vui lòng nhập số nguyên dương');
		die;
	}
	if ($sale_price>$list_price) {
		header('location: '. $adminUrl .'san-pham/add.php?errSalePrice=Giá bán phải nhỏ hơn giá gốc');
		die;
	}
	if ($imgSize == 0) {
		$imgUrl = 'assets/images/sample-product.jpg';
	}
	else if (!in_array($imgType,$valid_img_type)) {
		header('location: '. $adminUrl .'san-pham/add.php?errImage=Sai định dạng file');
		die;
	}
	else if ($imgSize > $maxsize) {
		header('location: '. $adminUrl .'san-pham/add.php?errImage=Dung lượng quá lớn. Chỉ upload ảnh tối đa 2MB');
		die;
	}
	else {
		move_uploaded_file($imgTmp, $imgSRC);
	}	
	$sql = "insert into products values (null,'$cate_id','$product_name','$detail','$list_price','$sale_price','$imgUrl','$status',0)";
	$sc = getSimpleQuery($sql);
	header('location: '. $adminUrl . 'san-pham?success=true');
	die;
?>