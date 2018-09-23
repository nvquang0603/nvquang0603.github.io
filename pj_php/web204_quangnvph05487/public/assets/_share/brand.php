<?php 
	require_once './public/assets/commons/utils.php';	
	$sqlBrand = 'select * from brands';
	$stmt = $conn->prepare($sqlBrand);
	$stmt->execute();
	$brands = $stmt->fetchAll();
?>
	<div class="center brand">
		<?php 
			foreach ($brands as $brands) {
		?>
			<div><a href="#"><img src="<?php echo $brands['image']?>" alt="<?php echo $brands['name']?>" title="<?php echo $brands['name']?>"></a></div>
		<?php
			}
		?>
	</div>