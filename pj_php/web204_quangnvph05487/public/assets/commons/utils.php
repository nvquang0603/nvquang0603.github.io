<?php 
	$siteUrl = "http://localhost/web204_quangnvph05487/";
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
		if ($status==1) {
			echo "";
		}
		else if($status==0) {
			echo "<br>(Tạm hết hàng)";
		}
	}
?>