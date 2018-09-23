<?php 
	require_once './public/assets/commons/utils.php';
	$id = $_GET['id'];
	$sqlProduct = "select * from products where id = $id";
	$stmt = $conn->prepare($sqlProduct);
	$stmt->execute();
	$product = $stmt->fetch();
	$sqlComment = "select * from comments where product_id = $id order by id desc";
	$stmt = $conn->prepare($sqlComment);
	$stmt->execute();
	$comments = $stmt->fetchAll();
	function status($status) {
		if ($status==1) {
			echo "Còn hàng";
		}
		else if ($status==0) {
			echo "Hết hàng";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php 
		include './public/assets/_share/header_assets.php'
	?>
	<title><?php echo $product['product_name'] ?></title>
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
	<div class="container">
		<?php 
			include './public/assets/_share/header.php';
		?>
		<div class="row">
			<div class="col-md-4">
				<img src="<?php echo $product['image']?>" class="mx-auto d-block rounded single-product-image">
			</div>
			<div class="col-md-8">
				<h3><?php echo $product['product_name'] ?></h3>
				<p><?php echo $product['detail'] ?></p>
				<p>Trạng thái: <?php status($product['status']) ?></p>
				<p>Lượt xem: <?php echo $product['views'] ?></p>
				<a href="#" class="btn btn-primary">hihi</a>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col">
			<p><?php echo $product['detail'] ?></p>
			</div>
		</div>
		<h3>Sản phẩm liên quan</h3>
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
				<div class="col-md-3 single-card">
				<div class="card">
				  <img class="card-img-top" src="<?php echo $relateProduct['image']?>" alt="Card image cap">
				  <div class="card-body">
				    <a href="<?= $siteUrl?>product_detail.php?id=<?= $relateProduct['id']?>"><h5 class="card-title"><?php echo $relateProduct['product_name'] ?></h5></a>
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
					<form action="submit_comment.php" method="POST">
						<input type="hidden" name="id" value="<?= $id?>">
							<div class="form-group">
								<input type="text" name="email" class="form-control" required placeholder="Email">
								
							</div>
							<div class="form-group">
								<textarea class="form-control" rows="5" name="content" required placeholder="Nội dung comment"></textarea>
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-sm btn-primary float-right">Gửi phản hồi</button>
							</div>
					</form>
			</div>

			<?php foreach ($comments as $item): ?>
				<div class="row">
					<div>
						<b><?= $item['email']?></b>
						<hr>
						<p><?= $item['content']?></p>
						<br>
					</div>
				</div>
			<?php endforeach ?>
		</div>
		<?php 
			include './public/assets/_share/footer.php';
		?>
	</div>
	<script type="text/javascript" src="public/plugins/slick/slick.min.js"></script>
	<script type="text/javascript">
		$('.product-row').slick({
		  centerMode: true,
		  centerPadding: '60px',
		  slidesToShow: 3,
		  responsive: [
		    {
		      breakpoint: 768,
		      settings: {
		        arrows: false,
		        centerMode: true,
		        centerPadding: '40px',
		        slidesToShow: 3
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