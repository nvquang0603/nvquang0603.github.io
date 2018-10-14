<?php 
session_start();
$path = '../';
require_once $path.$path.'assets/commons/utils.php';
if($_SESSION['login']['role']!=1) {
	header('location: '.$adminUrl . '?errAdmin=Chỉ Admin mới truy cập được trang này');
	die;
}
$id = $_GET['id'];
$sql = "select * from users where id = $id";
$getUser = getSimpleQuery($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<?php 
	include $path.'_share/style_assets.php';
	?>
	<title>Cập nhật tài khoản | <?php echo $getUser['email'] ?></title>
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
				<form action="<?= $adminUrl ?>tai-khoan/save-edit.php" method="post" enctype="multipart/form-data" name="edit-users-form" onsubmit="return validateFormSubmit()">
					<input type="hidden" name="id" value="<?php echo $getUser['id']?>">
					<div class="col-md-6">
						<div class="form-group has-feedback row">
							<div class="col-xs-12">
								<label for="fullname">Họ và tên</label>
								<input type="text" class="form-control" name="fullname" placeholder="Họ và tên" value="<?php echo $getUser['fullname']?>"> 
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
							<label for="email">Email</label>
							<input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $getUser['email']?>" readonly>
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
						<div class="form-group">
							<label>Giới tính</label>
							<div class="checkbox icheck">
								<label><input type="radio" name="gender" id="gender-1" value="1"> Nam &nbsp;</label>
								<label><input type="radio" name="gender" id="gender-2" value="0"> Nữ &nbsp;</label>
							</div>

							<?php if (isset($_GET['errGender'])) {
								?>
								<span class="text-danger" id="errGenderBack" "><?php echo $_GET['errGender'] ?></span>
								<?php
							} 
							?>
						</div>
						<div class="form-group">
							<label>Phân quyền</label>
							<div class="checkbox icheck">
								<label><input type="radio" name="role" id="role-1" value="1"> Admin &nbsp;</label>
								<label><input type="radio" name="role" id="role-2" value="2"> Quản trị viên &nbsp;</label>
								<label><input type="radio" name="role" id="role-3" value="3"> Người dùng</label>
							</div>

							<?php if (isset($_GET['errRole'])) {
								?>
								<span class="text-danger" id="errRoleBack" "><?php echo $_GET['errRole'] ?></span>
								<?php
							} 
							?>
						</div>
						<div class="form-group has-feedback">
							<label for="address">Địa chỉ</label>
							<input type="text" class="form-control" name="address" placeholder="Địa chỉ (không bắt buộc)" value="<?php echo $getUser['address']?>">
							<span class="glyphicon glyphicon-home form-control-feedback"></span>
						</div>
						<div class="form-group">
							<span class="text-danger" id="errAddress"></span>
							<?php if (isset($_GET['errAddress'])) {
								?>
								<span class="text-danger" id="errAddressBack"><?php echo $_GET['errAddress'] ?></span>
								<?php
							} 
							?>
						</div>
						<div class="form-group has-feedback">
							<label for="phone">SĐT</label>
							<input type="text" class="form-control" name="phone" placeholder="SĐT (không bắt buộc)" value="<?php echo $getUser['phone_number']?>">
							<span class="glyphicon glyphicon-earphone form-control-feedback"></span>
							<span class="text-danger" id="errPhone"></span>
						</div>
						<div class="form-group">
							<span class="text-danger" id="errPhone"></span>
							<?php if (isset($_GET['errPhone'])) {
								?>
								<span class="text-danger" id="errPhoneBack"><?php echo $_GET['errPhone'] ?></span>
								<?php
							} 
							?>
						</div>
						<div class="form-group">
							<div class="text-right">
								<a href="<?= $adminUrl?>users" class="btn btn-danger btn-md">Hủy</a>
								<button type="submit" class="btn btn-md btn-primary">Cập nhật</button>
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
			if (<?= $getUser['gender']?>==1) {
				$("#gender-1").attr("checked", true);
			}
			else {
				$("#gender-2").attr("checked", true);
			}
			if (<?= $getUser['role']?>==1) {
				$("#role-1").attr("checked", true);
				$("#role-2").attr("disabled", true);
				$("#role-3").attr("disabled", true);
			}
			else if (<?= $getUser['role']?>==2){
				$("#role-2").attr("checked", true);
			}
			else {
				$("#role-3").attr("checked", true);
			}
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
			var fullname = document.forms["edit-users-form"]["fullname"];
			var email = document.forms["edit-users-form"]["email"];
			var password = document.forms["edit-users-form"]["password"];
			var repassword = document.forms["edit-users-form"]["re-password"];
			var address = document.forms["edit-users-form"]["address"];
			var phone = document.forms["edit-users-form"]["phone"];
			var errFullname = document.getElementById("errFullnameBack");
			var errEmail = document.getElementById("errEmailBack");
			var errPw = document.getElementById("errPasswordBack");
			var errRePw = document.getElementById("errRePasswordBack");
			var errAddress = document.getElementById("errAddressBack");
			var errPhone = document.getElementById("errPhoneBack");
			var regExPhone = /(09|01[2|6|8|9])+([0-9]{8})\b/g;
			var regExName = /^[a-zA-ZđàáảãạăằắẳặâầấẩẫậậèéẻẽẹêềếểễệìíỉĩịòóỏõọôồốổỗộơờớởỡợùúủũụưừứửữựỳýỷỹỵĐÀÁẢÃẠĂẰẮẶẲÂẦẤẨẪẬÈÉẺẼẸÊỀẾỂỄỆÌÍỈĨỊÒÓỎÕỌÔỒỐỔỖỘƠỜỚỞỠỢÙÚỦŨỤƯỪỨỬỮỰỲÝỶỸỴ ]+$/u;
			var regExMail = /^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/;
			var regExPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,25}$/;
			var regExAddress = /^[a-zA-Z0-9đàáảãạăằắẳặâầấẩẫậậèéẻẽẹêềếểễệìíỉĩịòóỏõọôồốổỗộơờớởỡợùúủũụưừứửữựỳýỷỹỵĐÀÁẢÃẠĂẰẮẶẲÂẦẤẨẪẬÈÉẺẼẸÊỀẾỂỄỆÌÍỈĨỊÒÓỎÕỌÔỒỐỔỖỘƠỜỚỞỠỢÙÚỦŨỤƯỪỨỬỮỰỲÝỶỸỴ ,.-]+$/u;
			if (fullname.value == "") {
				if (errFullname==null) {
					swal({
						title: "Dữ liệu sai định dạng!",
						text: "...kiểm tra lại nhé!",
						icon: "warning",
						dangerMode: true,
					});
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
					swal({
						title: "Lỗi: Họ tên không hợp lệ",
						text: "...kiểm tra lại nhé!",
						icon: "warning",
						dangerMode: true,
					});
					document.getElementById("errFullname").innerHTML = "Định dạng họ và tên không đúng. Họ tên chỉ chứa chữ cái và khoảng trống";
					return false;
				}
				else {
					swal({
						title: "Lỗi: Họ tên không hợp lệ",
						text: "...kiểm tra lại nhé!",
						icon: "warning",
						dangerMode: true,
					});
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
					swal({
						title: "Dữ liệu sai định dạng!",
						text: "...kiểm tra lại nhé!",
						icon: "warning",
						dangerMode: true,
					});
					document.getElementById("errEmail").innerHTML = "Không để trống email";
					return false;
				}
				else {
					swal({
						title: "Dữ liệu sai định dạng!",
						text: "...kiểm tra lại nhé!",
						icon: "warning",
						dangerMode: true,
					});
					document.getElementById("errEmail").innerHTML = "Không để trống email";
					errEmail.style.display = "none";
					return false;
				}
			}
			else if (!regExMail.test(email.value)) {
				if (errEmail==null) {
					swal({
						title: "Cảnh báo: Địa chỉ Email không hợp lệ",
						text: "...kiểm tra lại nhé!",
						icon: "warning",
						dangerMode: true,
					});
					document.getElementById("errEmail").innerHTML = "Định dạng email không đúng. Email thường có dạng example@company.com";
					return false;
				}
				else {
					swal({
						title: "Cảnh báo: Địa chỉ Email không hợp lệ",
						text: "...kiểm tra lại nhé!",
						icon: "warning",
						dangerMode: true,
					});
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
				swal({
					title: "Cảnh báo: Không bỏ trống mật khẩu",
					text: "...kiểm tra lại nhé!",
					icon: "warning",
					dangerMode: true,
				});
				document.getElementById("errPw").innerHTML = "Bạn chưa nhập mật khẩu";
				return false;
			}
			else if (!regExPassword.test(password.value)) {
				swal({
					title: "Cảnh báo: Mật khẩu không hợp lệ",
					text: "...kiểm tra lại nhé!",
					icon: "warning",
					dangerMode: true,
				});
				document.getElementById("errRePw").innerHTML = "Mật khẩu từ 8-25 ký tự. Gồm chữ thường, chữ hoa và số";
				return false;
			}
			if (repassword.value != password.value) {
				swal({
					title: "Cảnh báo: Mật khẩu nhập lại không khớp",
					text: "...kiểm tra lại nhé!",
					icon: "warning",
					dangerMode: true,
				});
				document.getElementById("errPw").innerHTML = "Mật khẩu bạn nhập lại không khớp với mật khẩu phía trên";
				return false;
			}
			if (address.value == "") {
				document.getElementById("errAddress").innerHTML = "";
			}
			else if (!regExAddress.test(address.value)) {
				swal({
					title: "Lỗi: Địa chỉ không hợp lệ",
					text: "...kiểm tra lại nhé!",
					icon: "warning",
					dangerMode: true,
				});
				document.getElementById("errAddress").innerHTML = "Định dạng địa chỉ bạn vừa nhập chứa ký tự không hợp lệ. ";
				return false;
			}
			if (phone.value=="") {
				document.getElementById("errPhone").innerHTML = "";
			}
			else if (!regExPhone.test(phone.value)) {
				swal({
					title: "Lỗi: Số điện thoại không hợp lệ",
					text: "...kiểm tra lại nhé!",
					icon: "warning",
					dangerMode: true,
				});
				document.getElementById("errPhone").innerHTML = "Định dạng số điện thoại không đúng. Số điện thoại bắt đầu bằng số 0 và có độ dài 10-11 số";
				return false;
			}
		}
	</script>
</body>
</html>