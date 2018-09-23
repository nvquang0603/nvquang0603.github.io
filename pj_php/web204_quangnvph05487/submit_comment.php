<?php 
	require_once './public/assets/commons/utils.php';
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		header('location: '.$siteUrl);
		die;
	}
	$productId = $_POST['id'];
	$email = $_POST['email'];
	$content = $_POST['content'];

	$sql = "insert into comments
				(email, content, product_id)
			values
				('$email', '$content', $productId)";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	header('location: '. $siteUrl. 'product_detail.php?id='.$productId);
	die;
 ?>
