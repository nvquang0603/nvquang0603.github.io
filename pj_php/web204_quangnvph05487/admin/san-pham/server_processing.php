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
	array( 'db' => '`p`.`id`', 'dt' => 0, 'field' => 'id', 'formatter' => function( $d, $row ) {
			global $id;
			$id = $d;
			return $d;
	} ),
	array( 'db' => '`p`.`image`', 'dt' => 1, 'formatter' => function( $d, $row ) {
				global $siteUrl;
				global $id;
                return '<a href="'.$siteUrl.'product_detail.php?id='.$id.'" target="_blank"><img src="'.$siteUrl.$d.'" class="img-thumbnail" width=500px></a>';},
            'field' => 'image' ),
	array( 'db' => '`p`.`product_name`', 'dt' => 2, 'field' => 'product_name'),
	array( 'db' => '`c`.`name`',  'dt' => 3, 'field' => 'name', 'formatter' => function( $d, $row ) {
		global $siteUrl;
		$sql = "select * from categories where name = '$d'";
		$cate = getSimpleQuery($sql);
		return '<a href="'.$siteUrl.'single-category.php?id='.$cate['id'].'" target="_blank">'.$d.'</a>';
	}),
	array( 'db' => '`p`.`list_price`',  'dt' => 4, 'field' => 'list_price' ),
	array( 'db' => '`p`.`sell_price`',  'dt' => 5, 'field' => 'sell_price' ),
	array( 'db' => '`p`.`detail`',  'dt' => 6, 'field' => 'detail' ),
	array( 'db' => '`p`.`views`',  'dt' => 7, 'field' => 'views' ),
	array( 'db' => '`p`.`status`',  'dt' => 8, 'formatter' => function( $d, $row ) {
					if ($d==1) {
						return 'Còn hàng';
					}
					else {
						return 'Hết hàng';
					}
                },
            'field' => 'status' ),
	array( 'db' => '`p`.`id`', 'dt' => 9, 'formatter' => function( $d, $row ) {
				global $adminUrl;
                return '<a href="'.$adminUrl.'/san-pham/edit.php?id='.$d.'"
                        class="btn btn-xs btn-info">
                        Chỉnh sửa
                      </a>
                      <a href="javascript:void(0)" linkurl="'.$adminUrl.'san-pham/remove.php?id='.$d.'"
                        class="btn btn-xs btn-danger btn-remove">
                        Xoá
                        </a>';
                    },
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

$joinQuery = "FROM `products` AS `p` JOIN `categories` AS `c` ON (`c`.`id` = `p`.`cate_id`)";
$extraWhere = "";
$groupBy = "";
$having = "";
echo json_encode(
	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
);
?>
