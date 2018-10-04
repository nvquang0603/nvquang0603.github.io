<?php 
	require_once './assets/commons/utils.php';
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		header('location: '.$siteUrl);
		die;
	}
	$productId = $_POST['id'];
	$email = $_POST['email'];
	if ($email=="") {
		header('location: '. $siteUrl .'product_detail.php?id='. $productId .'&errEmail=Vui lòng không để trống Email');
		die;
	}
	else {
		$email = test_input($email);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	    	header('location: '. $siteUrl .'product_detail.php?id='. $productId .'&errEmail=Sai định dạng email. Email thường có định dạng example@company.com');
	    	die;
	    }
	}
	$content = $_POST['content'];
	if ($content=="") {
		header('location: '. $siteUrl .'product_detail.php?id='. $productId .'&errContent=Vui lòng không để trống nội dung bình luận');
		die;
	}
	else {
		$content = test_input($content);
		if (strlen($content)<25 || strlen($content)>200) {
			header('location: '. $siteUrl .'product_detail.php?id='. $productId .'&errContent=Nội dung bình luận dài tối thiểu 25 ký tự và tối đa 200 ký tự');
			die;
		}
	}
	$sql = "insert into " . TABLE_COMMENT .
			" (email, content, product_id) values ('$email', '$content', $productId)";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	header('location: '. $siteUrl. 'product_detail.php?id='.$productId);
	die;
 ?>
