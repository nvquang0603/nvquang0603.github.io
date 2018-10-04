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
				<form>
				  <div class="form-group">
				    <label for="exampleFormControlInput1">Họ và tên</label>
				    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nguyễn Văn A" required>
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlInput1">SĐT</label>
				    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="01653690011">
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlInput1">Email</label>
				    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
				  </div>
				  <div class="form-group">
				    <label for="exampleFormControlTextarea1">Nội dung</label></label>
				    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
</body>
</html>
<?php
?>