<?php 
require_once './assets/commons/utils.php';	
$newProductsQuery = "select * 
from products 
order by id desc
limit 6";
$stmt = $conn->prepare($newProductsQuery);
$stmt->execute();

$newProducts = $stmt->fetchAll();
$mostViewProductsQuery = "	select * 
from products
order by views desc
limit 6";
$stmt = $conn->prepare($mostViewProductsQuery);
$stmt->execute();
$mostViewProducts = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php 
	include './assets/_share/header_assets.php'
	?>
	<title>Liên hệ</title>
</head>
<body>
	<!-- Mã nhúng fanpage -->
	<div id="fb-root"></div>
	<script>
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s);
			js.id = id;
			js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1&appId=195253094360623&autoLogAppEvents=1';
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	<!-- 	Mã nhúng fanpage -->
	<?php 
	include './assets/_share/header.php';
	?>
	<div class="container">
		<div class="row contact-body">
			<div class="about-content col-md-8">
				<h3>Địa chỉ</h3>
				<p>- 90 Xã Đàn, P. Phương Liên, Q. Đống Đa</p>
				<p>- 121 Xuân Thủy, P. Dịch Vọng Hậu, Q. Cầu Giấy</p>
				<?php echo $settings['map'] ?>
			</div>
			<div class="aside col-md-4">
				<h3>Liên lạc với chúng tôi</h3>
				<form name="contact-form" onsubmit="return validateFormSubmit()">
					<div class="form-group">
						<label for="exampleFormControlInput1">Họ và tên</label>
						<input type="text" class="form-control" id="exampleFormControlInput1" name="fullname" placeholder="Nguyễn Văn A">
						<span class="text-danger" id="errFullname"></span>
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">SĐT</label>
						<input type="text" class="form-control" id="exampleFormControlInput1" name="phone" placeholder="01653690011">
						<span class="text-danger" id="errPhone"></span>
					</div>
					<div class="form-group">
						<label for="exampleFormControlInput1">Email</label>
						<input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com">
						<span class="text-danger" id="errEmail"></span>
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Nội dung</label></label>
						<textarea class="form-control" rows="3" id="exampleFormControlInput1" name="content"></textarea>
						<span class="text-danger" id="errContent"></span>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary mb-2">Gửi</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<?php 
	include './assets/_share/footer.php';
	?>
	<script type="text/javascript">
		function validateFormSubmit() {
			var fullname = document.forms["contact-form"]["fullname"];
			var phone = document.forms["contact-form"]["phone"];
			var email = document.forms["contact-form"]["email"];
			var regExPhone = /(09|01[2|6|8|9])+([0-9]{8})\b/g;
			var regExFullname = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u;
			var regExMail = /^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/;
			var content = document.forms["contact-form"]["content"];
			if (fullname.value == "") {
					swal({
						title: "Dữ liệu sai định dạng!",
						text: "...kiểm tra lại nhé!",
						icon: "warning",
						dangerMode: true,
					});
					document.getElementById("errFullname").innerHTML = "Không để trống họ và tên";
					return false;
			}
			else if (!regExFullname.test(fullname.value)) {
		    	swal({
				  title: "Lỗi: Họ tên không hợp lệ",
				  text: "...kiểm tra lại nhé!",
				  icon: "warning",
				  dangerMode: true,
				});
		    	document.getElementById("errFullname").innerHTML = "Định dạng Họ và tên không đúng. Họ tên chỉ chứa chữ cái và khoảng trống";
		        return false;
		    }
			else {
				document.getElementById("errFullname").innerHTML = "";
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
			if (email.value == "") {
					swal({
						title: "Dữ liệu sai định dạng!",
						text: "...kiểm tra lại nhé!",
						icon: "warning",
						dangerMode: true,
					});
					document.getElementById("errEmail").innerHTML = "Không để trống email";
					return false;
			}
			else if (!regExMail.test(email.value)) {
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
		    	document.getElementById("errEmail").innerHTML = "";
		    }
			if (content.value == "") {
					swal({
						title: "Dữ liệu sai định dạng!",
						text: "...kiểm tra lại nhé!",
						icon: "warning",
						dangerMode: true,
					});
					document.getElementById("errContent").innerHTML = "Không để trống nội dung";
					return false;
			}
			else if(content.value.length < 25 || content.value.length > 200) {
					swal({
						title: "Cảnh báo: Độ dài nội dung!",
						text: "...kiểm tra lại nhé!",
						icon: "warning",
						dangerMode: true,
					});
					document.getElementById("errContent").innerHTML = "Nội dung có độ dài tối thiểu 25 ký tự và tối đa 200 ký tự";
					return false;
			}
			else {
				document.getElementById("errContent").innerHTML = "";
			}

		}
	</script>
</body>
</html>
<?php
?>