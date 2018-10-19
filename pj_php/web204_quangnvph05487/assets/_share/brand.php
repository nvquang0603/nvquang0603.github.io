<?php 
	require_once './assets/commons/utils.php';	
	$sqlBrand = 'select * from ' . TABLE_BRAND;
	$stmt = $conn->prepare($sqlBrand);
	$stmt->execute();
	$brands = $stmt->fetchAll();
?>	
	<div class="container">
	<div class="center brand">
		<?php 
			foreach ($brands as $brands) {
		?>
			<div><a href="<?php echo $brands['url']?>" target="_blank"><img src="<?php echo $brands['image']?>" alt="<?php echo $brands['name']?>" title="<?php echo $brands['name']?>"></a></div>
		<?php
			}
		?>
	</div>
	</div>