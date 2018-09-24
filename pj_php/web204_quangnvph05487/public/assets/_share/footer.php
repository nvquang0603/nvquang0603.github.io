<?php 
	require_once './public/assets/commons/utils.php';	
	$sqlsetting = 'select * from ' . TABLE_WEBSETTING;
	$stmt = $conn->prepare($sqlsetting);
	$stmt->execute();
	$settings = $stmt->fetch();
?>
<div class="footer">
 			<div class="container">
 				<div class="row">
 				<div class="col-md-4 about">
					<h3>Thông tin</h3>
					<br>
					<h5>Shop Totoro 1988</h5>
					<p>SĐT: <?php echo $settings['hotline'] ?></p>
					<p>Địa chỉ:</p>
					<p>- 90 Xã Đàn, P. Phương Liên, Q. Đống Đa</p>
					<p>- 121 Xuân Thủy, P. Dịch Vọng Hậu, Q. Cầu Giấy</p>
					<p>Website: https://shop.totoro.vn/</p>
				</div>
				<div class="col-md-4">
					<h3>Vị trí shop</h3>
					<?php echo $settings['map'] ?>
				</div>
				<div class="col-md-4">
					<h3>Fanpage</h3>
					<?php echo $settings['fb'] ?>
				</div>
				</div>
 			</div>				
</div>