<?php
$path = '../';
require_once $path.$path.'assets/commons/utils.php';
$id;
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = 'products';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
	array( 'db' => '`c`.`id`', 'dt' => 0, 'field' => 'id', 'formatter' => function( $d, $row ) {
		global $id;
		$id = $d;
		return $d;
	} ),
	array( 'db' => '`p`.`product_name`', 'dt' => 1, 'field' => 'product_name', 'formatter' => function( $d, $row ) {
		global $siteUrl;
		$sql = "select * from products where product_name = '$d'";
		$product = getSimpleQuery($sql);
		return '<a href="'.$siteUrl.'product_detail.php?id='.$product['id'].'" target="_blank">'.$d.'</a>';
	}),
	array( 'db' => '`c`.`email`',  'dt' => 2, 'field' => 'email' ),
	array( 'db' => '`c`.`content`',  'dt' => 3, 'field' => 'content', 'formatter' => function( $d, $row ) {
		return htmlentities($d);
	}),
	array( 'db' => '`c`.`id`', 'dt' => 4, 'formatter' => function( $d, $row ) {
		global $adminUrl;
		return '<a href="javascript:void(0)" linkurl="'.$adminUrl.'comment/remove.php?id='.$d.'"
		class="btn btn-xs btn-danger btn-remove">
		Xoá
		</a>';},
		'field' => 'id' )
);
$sql_details = array(
	'user' => 'root',
	'pass' => '',
	'db'   => 'web204_quangnvph05487',
	'host' => '127.0.0.1'
);

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

// require( 'ssp.class.php' );
require('../_share/ssp.class.php' );

$joinQuery = "FROM `comments` AS `c` JOIN `products` AS `p` ON (`c`.`product_id` = `p`.`id`)";
$extraWhere = "";
$groupBy = "";
$having = "";
echo json_encode(
	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
);
?>
