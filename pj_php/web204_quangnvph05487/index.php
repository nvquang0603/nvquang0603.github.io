<?php 
	require_once './public/assets/commons/utils.php';	
	$newProductsQuery = "select * 
						from products 
						order by id desc
						limit 8";
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
		include './public/assets/_share/header_assets.php'
	?>
	<title>Trang chủ</title>
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
		<?php 
			include './public/assets/_share/slide.php';
		?>
		<div class="product">
			<div class="row product-row">
				<?php 
				foreach ($newProducts as $key => $product) {
				?>
				<div class="col-md-3 single-card">
				<div class="card">
				  <img class="card-img-top" src="<?php echo $product['image']?>" alt="Card image cap">
				  <div class="card-body">
				    <a href="<?= $siteUrl?>product_detail.php?id=<?= $product['id']?>"><h5 class="card-title"><?php echo $product['product_name'] ?></h5></a>
				    <p class="card-text list-price"><?php echo $product['list_price'] ?></p>
				    <p class="cart-text sale-price"><?php echo $product['sell_price']; ?></p>
				    <a href="<?= $siteUrl?>product_detail.php?id=<?= $product['id']?>" class="btn btn-primary">Xem chi tiết</a>
				  </div>
				</div>
				</div>
				<?php
				}
				?>
			</div>
		<h3>Sản phẩm nổi bật</h3>
		<div class="row product-row">
				<?php 
				$i = 0;
				foreach ($mostViewProducts as $key => $feature) {
				?>
				<div class="col-md-3 single-card">
				<div class="card">
				  <img class="card-img-top" src="public/assets/images/dog.jpg" alt="Card image cap">
				  <div class="card-body">
				    <a href="#"><h5 class="card-title"><?php echo $feature['product_name'] ?></h5></a>
				    <p class="card-text list-price"><?php echo $feature['list_price'] ?></p>
				    <p class="cart-text sale-price"><?php echo $feature['sell_price']; ?></p>
				    <a href="#" class="btn btn-primary">Xem chi tiết</a>
				  </div>
				</div>
				</div>
				<?php
				if (++$i==4) break;
				}
				?>
		</div>
		</div>
			<hr>
				<?php include './public/assets/_share/brand.php' ?>				
			<hr>
			<?php 
				include './public/assets/_share/footer.php';
			?>
	</div> <!-- Container -->
	<script type="text/javascript" src="public/plugins/slick/slick.min.js"></script>
	<script type="text/javascript">
		$('.center').slick({
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
		<?php
?>