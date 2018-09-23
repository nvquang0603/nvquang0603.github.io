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
	define('SITE_URL', "http://localhost/web204_quangnvph05487/");
?>