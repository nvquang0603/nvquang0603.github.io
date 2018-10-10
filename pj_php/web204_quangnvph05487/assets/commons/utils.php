<?php 
	$siteUrl = "http://localhost/web204_quangnvph05487/";
	$adminUrl = "http://localhost/web204_quangnvph05487/admin/";
	$adminAssetUrl = "http://localhost/web204_quangnvph05487/admin/admin_lte/";
	$host = "127.0.0.1";
	$dbname = "web204_quangnvph05487";
	$dbusername = "root";
	$dbpw = "";
	$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpw);
	define('TABLE_WEBSETTING', 'web_settings');
	define('TABLE_SLIDERSHOW', 'slideshows');
	define('TABLE_CATEGORY', 'categories');
	define('TABLE_PRODUCT', 'products');
	define('TABLE_BRAND', 'brands');
	define('TABLE_COMMENT', 'comments');
	define('SITE_URL', "http://localhost/web204_quangnvph05487/");
	function inOutStock($status) {
		if($status==0) {
			?>
			<img src="assets/images/out-of-stock.png" class="out-of-stock-ribbon">
			<?php
		}
	}
	function dd($vari){
		echo "<pre>";
		var_dump($vari);
		die;
	}
	function getSimpleQuery($sql, $isAll = false) {
		global $conn;
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		if ($isAll) {
			return $stmt->fetchAll();
		}
		else {
			return $stmt->fetch();
		}
	}
	function unique_file_check($file_name) {
		$actual_name = pathinfo($file_name,PATHINFO_FILENAME);
		$original_name = $actual_name;
		$extension = pathinfo($file_name, PATHINFO_EXTENSION);
		$i = 1;
		if (!file_exists('../../assets/images/'.$actual_name.".".$extension)) {
			$name = $actual_name . "." . $extension;
			return $name;
		}
		else {
		while(file_exists('../../assets/images/'.$actual_name.".".$extension))
		{           
		    $actual_name = (string)$original_name.'('.$i.')';
		    $name = $actual_name.".".$extension;
		    $i++;
		}
			return $name;
		}
	}
	function test_input($data) {
	    $data = trim($data);
	    $data = stripslashes($data);
	    $data = htmlspecialchars($data);
	    return $data;
	}
?>