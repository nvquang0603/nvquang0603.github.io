<?php 
session_start();
$path = '../';
require_once $path.$path.'assets/commons/utils.php';
if($_SESSION['login']['role']!=1) {
	header('location: '.$adminUrl . '?errAdmin=Chỉ Admin mới truy cập được trang này');
	die;
}
?>
<!DOCTYPE html>
<html>
<head>
	<?php 
	include $path.'_share/style_assets.php';
	?>
	<title>AdminLTE 2 | Thêm tài khoản</title>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->

</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<?php 
		include $path.'_share/header.php';
		?>
		<!-- Left side column. contains the logo and sidebar -->
		<?php 
		include $path.'_share/sidebar.php';
		?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Dashboard
					<small>Control panel</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Dashboard</li>
				</ol>
			</section>
			<!-- Main content -->
			<section class="content">
				<form action="<?= $adminUrl ?>tai-khoan/save-add.php" method="post" enctype="multipart/form-data" name="add-users-form" onsubmit="return validateFormSubmit()">
					<div class="col-md-6">
						<div class="form-group has-feedback row">
							<div class="col-xs-12">
								<input type="text" class="form-control" name="fullname" placeholder="Họ và tên"> 
							</div>
						</div>
						<div class="form-group">
							<span class="text-danger" id="errFullname"></span>
							<?php if (isset($_GET['errName'])) {
								?>
								<span class="text-danger" id="errFullnameBack"><?php echo $_GET['errName'] ?></span>
								<?php
							} 
							?>
						</div>
						<div class="form-group has-feedback">
							<input type="email" class="form-control" name="email" placeholder="Email">
							<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
						</div>
						<div class="form-group">
							<span class="text-danger" id="errEmail"></span>
							<?php if (isset($_GET['errEmail'])) {
								?>
								<span class="text-danger" id="errEmailBack"><?php echo $_GET['errEmail'] ?></span>
								<?php
							} 
							?>
						</div>
						<div class="form-group has-feedback">
							<input type="password" class="form-control" name="password" placeholder="Mật khẩu">
							<span class="glyphicon glyphicon-lock form-control-feedback"></span>
						</div>
						<div class="form-group">
							<span class="text-danger" id="errPw"></span>
							<?php if (isset($_GET['errPassword'])) {
								?>
								<span class="text-danger" id="errPasswordBack"><?php echo $_GET['errPassword'] ?></span>
								<?php
							} 
							?>
						</div>
						<div class="form-group has-feedback">
							<input type="password" class="form-control" name="re-password" placeholder="Nhập lại mật khẩu">
							<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
						</div>
						<div class="form-group">
							<span class="text-danger" id="errRePw"></span>
							<?php if (isset($_GET['errRePassword'])) {
								?>
								<span class="text-danger" id="errRePasswordBack"><?php echo $_GET['errRePassword'] ?></span>
								<?php
							} 
							?>
						</div>
						<div class="form-group">
							<label>Phân quyền</label>
							<div class="checkbox icheck">
								<label><input type="radio" name="role" value="1"> Admin &nbsp;</label>
								<label><input type="radio" name="role" value="2"> Quản trị viên &nbsp;</label>
								<label><input type="radio" name="role" value="3" checked> Người dùng</label>
							</div>

							<?php if (isset($_GET['errRole'])) {
								?>
								<span class="text-danger" id="errStatusBack" "><?php echo $_GET['errRole'] ?></span>
								<?php
							} 
							?>
						</div>
						<div class="form-group">
							<div class="text-right">
								<a href="<?= $adminUrl?>users" class="btn btn-danger btn-md">Hủy</a>
								<button type="submit" class="btn btn-md btn-primary">Tạo mới</button>
							</div>
						</div>
					</div>
				</form>
			</section>
			<!-- /.content -->
		</div>
		<?php 
		include $path.'_share/footer.php';
		?>
		<!-- Control Sidebar -->

	</div>
	<!-- ./wrapper -->

	<?php 
	include $path.'_share/js_assets.php';
	?>
	<script type="text/javascript">
		$(document).ready(function(){
			$(function () {
				$('input').iCheck({
					checkboxClass: 'icheckbox_flat-red',
					radioClass: 'iradio_flat-red',
					increaseArea: '20%' /* optional */
				});
			});
			var img = document.querySelector('[name="image"]');
			img.onchange = function(){
				var anh = this.files[0];
				if(anh == undefined){
					document.querySelector('#showImage').src = "<?= $siteUrl?>assets/images/sample_image/default-picture.png";
				}else{
					getBase64(anh, '#showImage');
				}
			}
			function getBase64(file, selector) {
				var reader = new FileReader();
				reader.readAsDataURL(file);
				reader.onload = function () {
					document.querySelector(selector).src = reader.result;
				};
				reader.onerror = function (error) {
					console.log('Error: ', error);
				};
			}
		});
	</script>
	<script type="text/javascript">
		function validateFormSubmit() {
			var fullname = document.forms["add-users-form"]["fullname"];
			var email = document.forms["add-users-form"]["email"];
			var password = document.forms["add-users-form"]["password"];
			var repassword = document.forms["add-users-form"]["re-password"];
			var errFullname = document.getElementById("errFullnameBack");
			var errEmail = document.getElementById("errEmailBack");
			var errPw = document.getElementById("errPasswordBack");
			var errRePw = document.getElementById("errRePasswordBack");
			var regExName = /^[a-zA-ZđàáảãạăằắẳặâầấẩẫậậèéẻẽẹêềếểễệìíỉĩịòóỏõọôồốổỗộơờớởỡợùúủũụưừứửữựỳýỷỹỵĐÀÁẢÃẠĂẰẮẶẲÂẦẤẨẪẬÈÉẺẼẸÊỀẾỂỄỆÌÍỈĨỊÒÓỎÕỌÔỒỐỔỖỘƠỜỚỞỠỢÙÚỦŨỤƯỪỨỬỮỰỲÝỶỸỴ ]+$/u;
			var regExMail = /^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/;
			var regExPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,25}$/;
			if (fullname.value == "") {
				if (errFullname==null) {
					document.getElementById("errFullname").innerHTML = "Không để trống họ và tên";
					return false;
				}
				else {
					swal({
						title: "Dữ liệu sai định dạng!",
						text: "...kiểm tra lại nhé!",
						icon: "warning",
						dangerMode: true,
					});
					document.getElementById("errFullname").innerHTML = "Không để trống họ và tên";
					errFullname.style.display = "none";
					return false;
				}
			}
			else if (!regExName.test(fullname.value)) {
				if (errFullname==null) {
					document.getElementById("errFullname").innerHTML = "Định dạng họ và tên không đúng. Họ tên chỉ chứa chữ cái và khoảng trống";
					return false;
				}
				else {
					document.getElementById("errFullname").innerHTML = "Định dạng họ và tên không đúng. Họ tên chỉ chứa chữ cái và khoảng trống";
					errFullname.style.display = "none";
					return false;
				}
			}
			else {
				if (errFullname==null) {
					document.getElementById("errFullname").innerHTML = "";
				}
				else {
					document.getElementById("errFullname").innerHTML = "";
					errFullname.style.display = "none";
				}
			}
			if (email.value == "") {
				if (errEmail==null) {
					document.getElementById("errEmail").innerHTML = "Không để trống email";
					return false;
				}
				else {
					document.getElementById("errEmail").innerHTML = "Không để trống email";
					errEmail.style.display = "none";
					return false;
				}
			}
			else if (!regExMail.test(email.value)) {
				if (errEmail==null) {
					document.getElementById("errEmail").innerHTML = "Định dạng email không đúng. Email thường có dạng example@company.com";
					return false;
				}
				else {
					document.getElementById("errEmail").innerHTML = "Định dạng email không đúng. Email thường có dạng example@company.com";
					errEmail.style.display = "none";
					return false;
				}
			}
			else {
				if (errEmail==null) {
					document.getElementById("errEmail").innerHTML = "";
				}
				else {
					document.getElementById("errEmail").innerHTML = "";
					errEmail.style.display = "none";
				}
			}
			if (password.value == "") {
				document.getElementById("errPw").innerHTML = "Bạn chưa nhập mật khẩu";
				return false;
			}
			else if (!regExPassword.test(password.value)) {
				document.getElementById("errRePw").innerHTML = "Mật khẩu từ 8-25 ký tự. Gồm chữ thường, chữ hoa và số";
				return false;
			}
			if (repassword.value != password.value) {
				document.getElementById("errPw").innerHTML = "Mật khẩu bạn nhập lại không khớp với mật khẩu phía trên";
				return false;
			}
		}
	</script>
</body>
</html>