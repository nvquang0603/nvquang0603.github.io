<?php 
	require_once './assets/commons/utils.php';	
	$newProductsQuery = "select * 
						from " . TABLE_PRODUCT .
						" order by id desc
						limit 3";
	$stmt = $conn->prepare($newProductsQuery);
	$stmt->execute();

	$newProducts = $stmt->fetchAll();
?>	
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include './assets/_share/header_assets.php' ?>
	<title>Thông tin</title>
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
			<div class="row about-body">
			<div class="about-content col-md-9">
				<h3>Giới thiệu</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis cumque incidunt laudantium aspernatur vero quisquam, assumenda, fugiat deserunt dignissimos veritatis. Sequi, vel explicabo quis, aliquid fuga esse maiores saepe repellat necessitatibus aspernatur nobis vitae optio! Libero, quisquam quasi dolore unde illo repudiandae ratione id, cumque fugit quidem temporibus in quod minima excepturi reprehenderit, officia similique amet, laboriosam! Nisi facere in placeat eligendi ex recusandae quibusdam amet similique ratione sit atque consequatur iure quia totam aspernatur voluptate, mollitia molestias et omnis, esse voluptatibus id blanditiis? Rem suscipit ab adipisci perferendis molestiae reprehenderit temporibus voluptates consequuntur minima quisquam dolor voluptatum labore sit, tempore tempora quibusdam magni, amet dignissimos, distinctio saepe voluptatibus! Officiis maxime eaque sapiente, aspernatur optio fugit earum expedita beatae fugiat itaque. Ducimus, voluptatibus, nulla. Sapiente quae ratione, enim ipsa. Ipsa dolorem necessitatibus voluptatibus quas. Totam labore, veniam tenetur fuga iure, expedita sapiente. Temporibus eius natus voluptatum velit iusto minima expedita praesentium corrupti, omnis magnam officiis beatae possimus facere quis optio nesciunt ipsum. Recusandae sequi, dolorum debitis optio, natus voluptatem non neque! Quae inventore, reprehenderit officia nihil dolorem eligendi alias temporibus fuga, nobis magnam, iusto sapiente porro vero accusamus, odio quia repellendus esse a! Explicabo doloremque excepturi, qui quasi! Eveniet distinctio explicabo, nulla ab eius commodi laboriosam voluptates laudantium consectetur ipsam ipsa ullam, dolore aspernatur dolorum perferendis, et, magni inventore nostrum nam. Quo error quam aliquam suscipit consequatur, veritatis fugiat veniam quos. Rem aliquam ipsa sunt a deleniti, eius numquam amet voluptates maxime soluta eaque in totam quis sit! Rerum voluptatibus odio vel, quam, placeat saepe nam ut eaque velit eligendi eveniet aperiam nisi hic dolore error, tenetur, similique harum ex nostrum ipsa aut repellendus eum. Doloremque magni aut sequi. Omnis mollitia et recusandae, veniam qui tenetur excepturi tempora, dolor nam dolorem natus culpa. Quae voluptatum vitae et repellendus, tempora iste. Placeat, reprehenderit? Fugiat sequi ipsam ratione reiciendis. Sunt corporis nulla quis voluptate natus deleniti, nostrum distinctio. Unde deleniti reprehenderit eaque libero, assumenda nulla officia, commodi vitae delectus excepturi. Numquam temporibus enim repellendus possimus provident, blanditiis libero ratione facere quis nihil ullam vitae, a aut architecto, expedita. Eligendi nihil, adipisci illo cupiditate quisquam, fugit nisi, id dolores doloribus mollitia itaque modi quas quo aut officia, natus voluptatem dolor ut laudantium blanditiis! Tempore sed deleniti suscipit accusantium! Est facere soluta numquam ea totam quaerat! Cumque sequi adipisci placeat maiores. Assumenda distinctio deleniti, aperiam expedita explicabo quas voluptatem eius voluptatum nostrum voluptates adipisci fuga illo optio totam quia, est amet dolor id molestiae cupiditate? Reprehenderit officiis itaque, ipsa necessitatibus laboriosam quo. Alias eaque aspernatur deleniti, autem mollitia molestiae voluptate officia, ex consequatur ullam culpa atque, fuga ipsa eius commodi. Fugiat, quaerat obcaecati! Adipisci officiis itaque pariatur vel voluptatem ipsa ex impedit, maxime alias veritatis quam, magnam quo minus aliquam corrupti rerum quas facere veniam doloribus, ut dolor. Error laboriosam ipsam, provident, architecto in ad ipsum incidunt sunt velit voluptas? Magni unde omnis enim aperiam molestiae nulla eum repudiandae officiis maxime dolorem distinctio cumque veniam eius eaque suscipit, cupiditate debitis, animi ipsam, amet nostrum?</p>
				<center><img src="./assets/images/totoro-tot-nghiep.jpg"></center>
			</div>
			<div class="aside col-md-3">
				<h3>Sản phẩm mới</h3>
				<?php 
				foreach ($newProducts as $key => $product) {
				?>
				<div class="single-card">
				<div class="card">
					<a href="<?= $siteUrl?>product_detail.php?id=<?= $product['id']?>"><?php inOutStock($product['status']) ?></a>
				  <a href="<?= $siteUrl?>product_detail.php?id=<?= $product['id']?>"><img class="card-img-top" src="<?php echo $product['image']?>" alt="Card image cap"></a>
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
		</div>
		</div>
		
			<?php 
				include './assets/_share/footer.php'
			?>
</body>
</html>
<?php 
?>