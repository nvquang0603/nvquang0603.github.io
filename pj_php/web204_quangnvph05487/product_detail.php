<?php 
	require_once './assets/commons/utils.php';
	$id = $_GET['id'];
	$sqlProduct = "select * from " . TABLE_PRODUCT .
						" where id = $id";
	$stmt = $conn->prepare($sqlProduct);
	$stmt->execute();
	$product = $stmt->fetch();
	$sqlComment = "select * from " . TABLE_COMMENT .
						" where product_id = $id order by id desc";
	$stmt = $conn->prepare($sqlComment);
	$stmt->execute();
	$comments = $stmt->fetchAll();
	$sqlViews = "update products set views = (views + 1) where id = $id";
	$stmt = $conn->prepare($sqlViews);
	$stmt->execute();
	function status($status) {
		if ($status==1) {
			echo "Còn hàng";
		}
		else if ($status==0) {
			echo "Tạm hết hàng";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php 
		include './assets/_share/header_assets.php'
	?>
	<title>Sản phẩm <?php echo $product['product_name'] ?></title>
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
	<!-- Mã nhúng fanpage -->

		<?php 
			include './assets/_share/header.php';
		?>
		<div class="container">
			<hr>
		<div class="row">
			<div class="col-md-6">
				<img src="<?php echo $product['image']?>" class="mx-auto d-block rounded single-product-image">
			</div>
			<div class="col-md-6">
				<h3><?php echo $product['product_name'] ?></h3>
				<p><?php echo $product['detail'] ?></p>
				<p>Trạng thái: <?php status($product['status']) ?></p>
				<p>Lượt xem: <?php echo $product['views'] ?></p>
				<p>Giá gốc: <span class="list-price"><?php echo $product['list_price'] ?>₫</span></p>
				<p>Giá bán: <span class="sale-price"><?php echo $product['sell_price'] ?>₫</span></p>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col">
			<p><?php echo $product['detail'] ?></p>
			</div>
		</div>
		<h3>Sản phẩm cùng danh mục</h3>
		<div class="row product-row">
			<?php
				$product_cate = $product['cate_id'];
				$sqlGetRelateProduct = "select * from products where cate_id = $product_cate";
				$stmt = $conn->prepare($sqlGetRelateProduct);
				$stmt->execute();
				$relateProduct = $stmt->fetchAll();
			?>
				<?php 
					foreach ($relateProduct as $relateProduct) {
				?>
				<div class="col">
				<div class="card">
				  <a href="<?= $siteUrl?>product_detail.php?id=<?= $product['id']?>"><img class="card-img-top" src="<?php echo $relateProduct['image']?>" alt="Card image cap"></a>
				  <div class="card-body">
				    <a href="<?= $siteUrl?>product_detail.php?id=<?= $relateProduct['id']?>"><h5 class="card-title"><?php echo $relateProduct['product_name'] ?><?php inOutStock($relateProduct['status']) ?></h5></a>
				    <p class="card-text list-price"><?php echo $relateProduct['list_price'] ?></p>
				    <p class="cart-text sale-price"><?php echo $relateProduct['sell_price']; ?></p>
				    <a href="<?= $siteUrl?>product_detail.php?id=<?= $relateProduct['id']?>" class="btn btn-primary">Xem chi tiết</a>
				  </div>
				</div>
				</div>
				<?php
				}
				?>
		</div>
		<div id="comments">
			<div class="comments-title">
				<h2>Bình luận</h2>
			</div>
			<div class="row form-row">
					<form action="submit_comment.php" method="POST" name="comment-form" onsubmit="return validateFormSubmit()">
						<input type="hidden" name="id" value="<?= $id?>">
							<div class="form-group">
								<input type="email" name="email" class="form-control" placeholder="Email" onchange="validateFormAuto()">
								<span class="text-danger" id="errEmail" name="errEmail">								
								</span>
								<?php if (isset($_GET['errEmail'])) {
					                ?>
					                	<span class="text-danger" id="errEmailBack"><?php echo $_GET['errEmail'] ?></span>
					             	<?php
						        } 
						        ?>
							</div>
							<div class="form-group">
								<textarea class="form-control" rows="5" name="content" placeholder="Nội dung bình luận" onchange="validateFormAuto()"></textarea>
								<span class="text-danger" id="errContent" name="errContent"></span>
								<?php if (isset($_GET['errContent'])) {
					                ?>
					                	<span class="text-danger" id="errContentBack"><?php echo $_GET['errContent'] ?></span>
					             	<?php
						        } 
						        ?>
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-sm btn-primary float-right">Gửi phản hồi</button>
							</div>
					</form>
			</div>
			<div class="comments-title">
				<h3>Danh sách bình luận</h3>
				<hr>
			</div>
			<?php foreach ($comments as $item): ?>
				
					<div>
						<b><?= $item['email']?></b>
						<hr>
						<p><?= $item['content']?></p>
						<br>
					</div>
			<?php endforeach ?>
		</div>
	</div>
		<?php 
			include './assets/_share/footer.php';
		?>
	<script type="text/javascript">
		function validateFormSubmit() {
			var str = "window.location";
			var str2 = "<script>";
			var regExMail = /^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/;
		    var email = document.forms["comment-form"]["email"];
		    var content = document.forms["comment-form"]["content"];
		    if (email.value == "") {
		    	alert("Bạn chưa điền email");
		    	document.getElementById("errEmail").innerHTML = "Định dạng email không đúng. Email thường có dạng example@company.com";
		        return false;
		    }
		    else if (!regExMail.test(email.value)) {
		    	document.getElementById("errEmail").innerHTML = "Định dạng email không đúng. Email thường có dạng example@company.com";
		    	alert("Địa chỉ email không hợp lệ. Vui lòng nhập lại");
		        return false;
		    }
		    if (content.value == "") {
		    	document.getElementById("errContent").innerHTML = "Vui lòng điền nội dung. Tối thiểu 25 ký tự và tối đa 200 ký tự";
		    	return false;
		    }
		    else if (content.value.length < 25 || content.value.length > 200) {
		    	document.getElementById("errContent").innerHTML = "Nội dung tối thiểu 25 ký tự và tối đa 200 ký tự";
		    	alert("Thiếu nội dung");
		        return false;
		    }
		    else if(content.value.includes(str)||content.includes(str2)) {
		    	document.getElementById("errContent").innerHTML = "Bình luận của bạn chứa nội dung gây hại cho website. Kiểm tra kỹ lại nhé!";
		    	alert("Gì vậy man?");
		        return false;
		    }
		}
		function validateFormAuto() {
			var str = "window.location";
			var str2 = "<script>";
			var regExMail = /^[a-z][a-z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/;
		    var email = document.forms["comment-form"]["email"];
		    var content = document.forms["comment-form"]["content"];
		    var errEmail = document.getElementById("errEmail");
		    var errEmailBack = document.getElementById("errEmailBack");
		    var errContent = document.getElementById("errContent");
		    var errContentBack = document.getElementById("errContentBack");
		    if (email.value == "") {
		    	document.getElementById("errEmail").innerHTML = "";
		    }
		    else if (!regExMail.test(email.value)) {
		        document.getElementById("errEmail").innerHTML = "Định dạng email không đúng. Email thường có dạng example@company.com";
		    }
		    else {
		    	document.getElementById("errEmail").innerHTML = "";
		    }
		    if (content.value == "") {
		    	document.getElementById("errContent").innerHTML = "";
		    }
		    else if(content.value.includes(str)||content.value.includes(str2)) {
		        document.getElementById("errContent").innerHTML = "Bình luận của bạn chứa nội dung gây hại cho website. Kiểm tra kỹ lại nhé!";
		    }
		    else if (content.value.length < 25 || content.value.length > 200) {
		        document.getElementById("errContent").innerHTML = "Bình luận dài tối thiểu 25 chữ và tối đa 200 chữ";
		    }   
		    else {
		    	document.getElementById("errContent").innerHTML = "";
		    }
		    if (errEmail.value == "") {
		    	errEmailBack.style.display = "block";
		    }
		    else {
		    	errEmailBack.style.display = "none";
		    }
		    if (errContent.value == "") {
		    	errContentBack.style.display = "block";
		    }
		    else {
		    	errContentBack.style.display = "none";
		    }
		}
	</script>
	<script type="text/javascript" src="plugins/slick/slick.min.js"></script>
	<script type="text/javascript">
		$('.product-row').slick({
		  infinite: true,
		  centerPadding: '60px',
		  slidesToShow: 4,
		  slidesToScroll: 3,
		  responsive: [
		    {
		      breakpoint: 768,
		      settings: {
		        arrows: false,
		        centerMode: true,
		        centerPadding: '40px',
		        slidesToShow: 1
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        arrows: false,
		        centerMode: true,
		        centerPadding: '40px',
		        slidesToShow: 1
		      }
		    }
		  ]
		});
		$('.autoplay').slick({
		  slidesToShow: 3,
		  slidesToScroll: 1,
		  autoplay: true,
		  autoplaySpeed: 2000,
		});
	</script>
</body>
</html>