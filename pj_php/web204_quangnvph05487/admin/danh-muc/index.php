<?php 
$path = '../';
require_once $path.$path.'assets/commons/utils.php';
$sqlCateProduct = 'select categories.*, (select count(*) from products where cate_id = categories.id) as total_product from categories';
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
            <h3 class="box-title">Bordered Table</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-bordered">
              <tbody><tr>
                <th style="width: 10px">#</th>
                <th>Tên</th>
                <th>Sản phẩm</th>
                <th style="width: 240px">Miêu tả</th>
                <th style="width: 120px">
                  <a href="<?= $adminUrl?>danh-muc/add.php"
                    class="btn btn-xs btn-success">
                    Thêm
                  </a>
                </th>
              </tr>
              <?php foreach ($cateProduct as $cate): ?>
                <tr>
                  <td><?php echo $cate['id'] ?></td>
                  <td><?php echo $cate['name'] ?></td>
                  <td>
                    <?php echo $cate['total_product'] ?>
                  </td>
                  <td>
                    <?php echo $cate['desc'] ?>
                  </td>
                  <td>
                    <a href="<?= $adminUrl?>danh-muc/edit.php?id=<?= $cate['id']?>"
                      class="btn btn-xs btn-info">
                      Chỉnh sửa
                    </a>
                    <a href="javascript:void(0)" linkurl="<?= $adminUrl?>danh-muc/remove.php?id=<?= $cate['id']?>"
                      class="btn btn-xs btn-danger btn-remove">
                      Xoá
                    </a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody></table>
          </div>
          <!-- /.box-body -->
          <div class="box-footer clearfix">
            <ul class="pagination pagination-sm no-margin pull-right">
              <li><a href="#">«</a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">»</a></li>
            </ul>
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
      if (isset($_GET['success']) && $_GET['success'] == true) {
        ?>
          alert('Tạo mới danh mục thành công');
        <?php
      }
    ?>
    $('.btn-remove').on('click',function() {
      var conf = confirm("Bạn có xác nhận muốn xóa danh mục này hay không?");
      if (conf) {
        window.location.href = $(this).attr('linkurl');
      }
    })
  </script>
</body>
</html>
