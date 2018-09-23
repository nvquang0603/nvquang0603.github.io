<?php 
	require_once './public/assets/commons/utils.php';
	$cateId = $_GET['id'];
	$pageNumber = isset($_GET['page']) == true ? $_GET['page'] : 1;
	$pageSize = 2;

	$sql = "select 
			c.*,
			count(p.id) as total_product
			from categories c
			join products p
			on c.id = p.cate_id 
			where c.id = $cateId";

	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$cate = $stmt->fetch();

	if(!$cate){
		header("location: $siteUrl");
		die;
	}

	$offset = ($pageNumber-1)*$pageSize;

	$sql = "	select * 
				from products 
				where cate_id = $cateId
				limit $offset, $pageSize";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$products = $stmt->fetchAll();

	 ?>
		 <!DOCTYPE html>
	<html lang="en">
	<head>
		<div class="container">
	    <?php 
			include './public/assets/_share/header_assets.php'
		?>
		<link rel="stylesheet" type="text/css" href="public/plugins/simplePagination/simplePagination.css">
		<script type="text/javascript" src="public/plugins/simplePagination/jquery.simplePagination.js"></script>
		<title><?= $cate['name']?></title>
	</head>

	<body>
	    <?php 
			include './public/assets/_share/header.php';
		?>
		<div class="product">
			<div class="tittle-product">
				<h2><?= $cate['name']?></h2>
			</div>
			<div class="row product-row">
				<?php 
				$i = 0;
				foreach ($products as $key => $product) {
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
				if (++$i==8) break;
				}
				?>
			</div>
			<div class="row">
					<div class="paginate"></div>
			</div>

			</div>
		
		<hr>
		<?php 
			include './public/assets/_share/brand.php' 
		?>				
		<hr>
		<?php 
			include './public/assets/_share/footer.php';
		?>
		</div>		
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
	<script type="text/javascript">
		$(function() {
			$('.paginate').pagination({
			    items: <?= $cate['total_product']?>,
			    itemsOnPage: <?= $pageSize?>,
			    currentPage: <?= $pageNumber?>,
			    cssStyle: 'light-theme',
			    onPageClick: function(page){
			    var url = '<?= $siteUrl . 'single-category.php?id=' . $cateId?>';
				url+= `&page=${page}`;
				window.location.href = url;      
			}
			});
		});
	</script>
	</body>

	</html>


