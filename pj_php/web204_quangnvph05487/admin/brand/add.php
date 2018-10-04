<?php 
$path = '../';
require_once $path.$path.'assets/commons/utils.php';
?>
<!DOCTYPE html>
<html>
<head>
  <?php 
  include $path.'_share/style_assets.php';
  ?>
  <title>AdminLTE 2 | Thêm danh mục</title>
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
        <form action="<?= $adminUrl ?>brand/save-add.php" method="post" enctype="multipart/form-data">
          <div class="col-md-6">
            <div class="form-group">
              <label>Tên thương hiệu</label>
              <input type="text" name="name" class="form-control">
              <?php if (isset($_GET['errName'])) {
                ?>
                <span class="text-danger"><?php echo $_GET['errName'] ?></span>
                <?php
              } 
              ?>
            </div>
            <div class="form-group">
              <label>Logo thương hiệu</label>
              <input type="file" name="image" class="form-control">
              <?php if (isset($_GET['errImage'])) {
                ?>
                <span class="text-danger"><?php echo $_GET['errImage'] ?></span>
                <?php
              } 
              ?>
            </div>
            <div class="form-group">
              <label>URL</label>
              <input type="text" name="url" class="form-control">
            </div>            
            <div class="text-right">
              <a href="<?= $adminUrl?>brand" class="btn btn-danger btn-md">Hủy</a>
              <button type="submit" class="btn btn-md btn-primary">Tạo mới</button>
            </div>
          </div>
        </form>
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
</body>
</html>
