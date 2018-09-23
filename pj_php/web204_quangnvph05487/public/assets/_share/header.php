<?php 
	require_once './public/assets/commons/utils.php';
	$sqlsetting = "select * from web_settings";
	$stmt = $conn->prepare($sqlsetting);
	$stmt->execute();
	$settings = $stmt->fetch();
	$sqlcategory = "select * from categories";
	$stmt = $conn->prepare($sqlcategory);
	$stmt->execute();
	$cates = $stmt->fetchAll();
?>
<div class="row top-bar">
			<div class="col-md-2 offset-md-7 text-center">SĐT: <?php echo $settings['hotline'] ?></div>
			<div class="col-md-3 text-center">Thời gian làm việc: 7h - 11h</div>
		</div>
<div class="row header">
			<div class="col-xs col-md-3 logo">
				<a href="index.php"><img src="<?php echo $settings['logo']?>"></a>
			</div>
			<div class="col-xs col-md-9">
				<ul class="nav justify-content-end">
				  <li class="nav-item">
				    <a class="nav-link active" href="index.php">Trang chủ</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="introduce.php">Giới thiệu</a>
				  </li>
				  <li class="nav-item dropdown">
				    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Danh mục sản phẩm</a>
				    <div class="dropdown-menu">
				    	<?php 
				    		foreach ($cates as $cates) {
				    			?>
				    				<a class="dropdown-item" href="<?= $siteUrl ?>single-category.php?id=<?= $cates['id']?>""><?php echo $cates['name'] ?></a>
				    			<?php
				    		}
				    	?>
				     </div>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="contact.php">Liên hệ</a>
				  </li>
				</ul>
			</div>
		</div>