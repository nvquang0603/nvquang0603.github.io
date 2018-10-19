<?php 
session_start();
$path = '../';
require_once $path.$path.'assets/commons/utils.php';
$sqlCateProduct =   'select categories.*, 
(select count(*) 
from products
where cate_id = categories.id) as total_product 
from categories';
$cateProduct = getSimpleQuery($sqlCateProduct,true);
?>

<!DOCTYPE html>
<html>
<head>
  <?php 
  include $path.'_share/style_assets.php';
  ?>
  <title>AdminLTE 2 | Dashboard</title>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->

</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php 
    include $path.'_share/header.php';
    ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php 
    include $path.'_share/sidebar.php';
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Quản lý danh mục</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="categoryTable" class="display table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th style="width: 300px">Ảnh sản phẩm</th>
                  <th>Tên sản phẩm</th>
                  <th>Danh mục</th>
                  <th>Giá gốc</th>
                  <th>Giá bán</th>
                  <th>Chi tiết</th>
                  <th>Lượt xem</th>
                  <th>Trạng thái</th>
                  <th style="width: 120px">
                    <a href="<?= $adminUrl?>san-pham/add.php"
                      class="btn btn-xs btn-success">
                      Thêm
                    </a>
                  </th>
                </tr>
              </thead>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">

            </div>
          </div>
        </section>
        <!-- /.content -->
      </div>
      <?php 
      include $path.'_share/footer.php';
      ?>

      <!-- Control Sidebar -->

    </div>
    <!-- ./wrapper -->

    <?php 
    include $path.'_share/js_assets.php';
    ?>
    <script type="text/javascript">
    <?php 
    if (isset($_GET['edit-success']) && $_GET['edit-success'] == true) {
      ?>
      swal({
        title: "Xác nhận",
        text: "Sản phẩm đã được sửa",
        icon: "success",
        button: false,
      });
      <?php
    }
    if (isset($_GET['success']) && $_GET['success'] == true) {
      ?>
      swal({
        title: "Xác nhận",
        text: "Sản phẩm đã được thêm",
        icon: "success",
        button: false,
      });
      <?php
    }
    ?>
    $('.btn-remove').on('click',function() {
      swal({
        title: "Bạn có muốn xóa sản phẩm này không?",
        text: "Một khi đã xóa. Sản phẩm sẽ không thể quay lại",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location.href = $(this).attr('linkurl');
          swal("Đang xóa", {
            icon: "success",
          });
        } 
        else {
          swal("Bạn đã hủy việc xóa sản phẩm");
        }
      });
    })
    </script>
    <script type="text/javascript">
      $(document).ready(function() {
        var dataTable = $('#categoryTable').DataTable({
          "processing": true,
          "serverSide": true,
          "pagingType": "full_numbers",
          "ajax": {
            "url":"server_processing.php"
          },
          "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Tất cả"]]
        })
        setInterval( function () {
          dataTable.ajax.reload();
        }, 30000 );
      });
    </script>
  </body>
  </html>
