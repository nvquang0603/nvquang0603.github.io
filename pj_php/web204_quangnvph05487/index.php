<?php 
	require_once './assets/commons/utils.php';	
	$newProductsQuery = "select * 
						from " . TABLE_PRODUCT .
						" order by id desc
						limit 8";
	$stmt = $conn->prepare($newProductsQuery);
	$stmt->execute();
	$newProducts = $stmt->fetchAll();
	$mostViewProductsQuery = "	select * 
								from " . TABLE_PRODUCT .
								" order by views desc
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
		<?php 
			include './assets/_share/header.php';
		?>
		<?php 
			include './assets/_share/slide.php';
		?>
		<div class="container">
			<div class="product">
			<div class="row product-row">
				<?php 
				foreach ($newProducts as $product) {
				?>
				<div class="col-md-3 single-card">				
				<div class="card">
				 	<a href="<?= $siteUrl?>product_detail.php?id=<?= $product['id']?>"><img class="card-img-top" src="<?php echo $product['image']?>" alt="Card image cap"></a>
				  	<div class="card-body">
				    <a href="<?= $siteUrl?>product_detail.php?id=<?= $product['id']?>"><h5 class="card-title"><?php echo $product['product_name'] ?><?php inOutStock($product['status']) ?></h5></a>
				    <p class="card-text list-price"><?php echo $product['list_price'] ?>₫</p>
				    <p class="cart-text sale-price"><?php echo $product['sell_price']; ?>₫</p>
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
				  <a href="<?= $siteUrl?>product_detail.php?id=<?= $product['id']?>"><img class="card-img-top" src="<?php echo $feature['image']?>" alt="Card image cap"></a>
				  <div class="card-body">
				    <a href="<?= $siteUrl?>product_detail.php?id=<?= $product['id']?>"><h5 class="card-title"><?php echo $feature['product_name'] ?><?php inOutStock($product['status']) ?></h5></a>
				    <p class="card-text list-price"><?php echo $feature['list_price'] ?></p>
				    <p class="cart-text sale-price"><?php echo $feature['sell_price']; ?></p>
				    <a href="<?= $siteUrl?>product_detail.php?id=<?= $product['id']?>" class="btn btn-primary">Xem chi tiết</a>
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
				<?php include './assets/_share/brand.php' ?>				
		<hr>
		</div>
			<?php 
				include './assets/_share/footer.php';
			?>
	<script type="text/javascript" src="plugins/slick/slick.min.js"></script>
	<script type="text/javascript">
		$('.center').slick({
		  dots: true,
		  infinite: true,
		  speed: 300,
		  slidesToShow: 4,
		  slidesToScroll: 3,
		  responsive: [
		    {
		      breakpoint: 1024,
		      settings: {
		        slidesToShow: 3,
		        slidesToScroll: 3,
		        infinite: true,
		        dots: true
		      }
		    },
		    {
		      breakpoint: 600,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 2
		      }
		    },
		    {
		      breakpoint: 480,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    }
		  ]
		});
	</script>
</body>
</html>
		<?php
?>