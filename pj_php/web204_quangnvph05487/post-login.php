<?php 
	session_start();
	require_once './assets/commons/utils.php';
	if($_SERVER['REQUEST_METHOD'] != 'POST'){
		header('location: '. $siteUrl. 'login.php');
		die;
	}
	$email = test_input($_POST['email']);
	$password = test_input($_POST['password']);
	$sql = "select * from users where email = '$email'";
	$user = getSimpleQuery($sql);
	$verify_password = password_verify($password,$user['password']);
	if ($email=="" || $password=="") {
		header('location: '. $siteUrl. 'login.php?msg=Vui lòng điền đầy đủ email và mật khẩu!');
		die;
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header('location: '. $siteUrl. 'login.php?msg=Email không hợp lệ!');
		die;
	}
	else if (!$user) {
		header('location: '. $siteUrl. 'login.php?msg=Email không tồn tại!');
		die;
	}
	if (strlen($password) < 6) {
		header('location: '. $siteUrl. 'login.php?msg=Mật khẩu tối thiểu 6 ký tự!');
		die;	}

	if($verify_password==false){
		header('location: '. $siteUrl. 'login.php?msg=Thông tin đăng nhập không đúng');
		die;
	}
	$_SESSION['login'] = $user;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chúc mừng</title>
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  	<link rel="stylesheet" href="<?php echo $adminAssetUrl?>bower_components/font-awesome/css/font-awesome.min.css">
  	<title>Đang xử lý</title>
</head>
<body>
	<script src="<?php echo $adminAssetUrl?>bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?php echo $adminAssetUrl?>plugins/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			swal({
	            title: "Chào mừng",
	            text: "Bạn đã đăng nhập thành công",
	            icon: "success",
	            button: false,
	        });
		});
		setTimeout(function(){
			window.location.href = '<?= $adminUrl ?>';
		}, 2000);
	</script>
</body>
</html>
	