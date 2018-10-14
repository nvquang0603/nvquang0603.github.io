<?php 
session_start();
$path = '../';
require_once $path.$path.'assets/commons/utils.php';
$id = $_GET['id'];
$sql = "select * from contacts where id = $id";
$getContact = getSimpleQuery($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<?php 
	include $path.'_share/style_assets.php';
	?>
	<title>Sửa liên hệ | <?php echo $getContact['email'] ?></title>
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
				<form action="<?= $adminUrl ?>lien-he/save-edit.php" method="post" enctype="multipart/form-data" name="edit-contacts-form" onsubmit="return validateFormSubmit()">
					<input type="hidden" name="id" value="<?php echo $getContact['id']?>">
					<div class="col-md-6">
						<div class="form-group has-feedback row">
							<div class="col-xs-12">
								<label for="fullname">Họ và tên</label>
								<input type="text" class="form-control" name="fullname" placeholder="Họ và tên" value="<?php echo $getContact['fullname']?>"> 
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
							<input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $getContact['email']?>">
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
							<label for="phone">SĐT</label>
							<input type="text" class="form-control" name="phone" placeholder="SĐT (không bắt buộc)" value="<?php echo $getContact['phone_number']?>">
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
								<a href="<?= $adminUrl?>contacts" class="btn btn-danger btn-md">Hủy</a>
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
		function validateFormSubmit() {
			var fullname = document.forms["edit-contacts-form"]["fullname"];
			var email = document.forms["edit-contacts-form"]["email"];
			var phone = document.forms["edit-contacts-form"]["phone"];
			var errFullname = document.getElementById("errFullnameBack");
			var errEmail = document.getElementById("errEmailBack");
			var errPhone = document.getElementById("errPhoneBack");
			var regExPhone = /(09|01[2|6|8|9])+([0-9]{8})\b/g;
			var regExName = /^[a-zA-ZđàáảãạăằắẳặâầấẩẫậậèéẻẽẹêềếểễệìíỉĩịòóỏõọôồốổỗộơờớởỡợùúủũụưừứửữựỳýỷỹỵĐÀÁẢÃẠĂẰẮẶẲÂẦẤẨẪẬÈÉẺẼẸÊỀẾỂỄỆÌÍỈĨỊÒÓỎÕỌÔỒỐỔỖỘƠỜỚỞỠỢÙÚỦŨỤƯỪỨỬỮỰỲÝỶỸỴ ]+$/u;
			var regExMail = /^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/;
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
			if (phone.value == "") {
				if (errPhone==null) {
					document.getElementById("errPhone").innerHTML = "";
				}
				else {
					document.getElementById("errPhone").innerHTML = "";
					errPhoneBack.style.display = "none";
				}
			}
			else if (!regExPhone.test(phone.value)) {
				if (errPhone==null) {
					swal({
						title: "Lỗi: Họ tên không hợp lệ",
						text: "...kiểm tra lại nhé!",
						icon: "warning",
						dangerMode: true,
					});
					document.getElementById("errPhone").innerHTML = "Số điện thoại không hợp lệ";
					return false;
				}
				else {
					swal({
						title: "Lỗi: Họ tên không hợp lệ",
						text: "...kiểm tra lại nhé!",
						icon: "warning",
						dangerMode: true,
					});
					document.getElementById("errPhone").innerHTML = "Số điện thoại không hợp lệ";
					errPhoneBack.style.display = "none";
					return false;
				}
			}
		}
	</script>
</body>
</html>