<?php 
    $path = '../';
    require_once $path.$path.'assets/commons/utils.php';
    $sql = "select * from categories";
    $cate = getSimpleQuery($sql,true);
    ?>

<!DOCTYPE html>
<html>
<head>
  <?php 
  include $path.'_share/style_assets.php';
  ?>
  <title>AdminLTE 2 | Thêm sản phẩm</title>
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
        <form action="<?= $adminUrl ?>san-pham/save-add.php" method="post" enctype="multipart/form-data">
          <div class="col-md-6">
            <div class="form-group">
              <label>Tên sản phẩm</label>
              <input type="text" name="name" class="form-control">
              <?php if (isset($_GET['errName'])) {
                ?>
                <span class="text-danger"><?php echo $_GET['errName'] ?></span>
                <?php
              } 
              ?>
            </div>
            <div class="form-group">
              <label>Danh mục</label>
              <select name="category" class="form-control">
                <?php foreach ($cate as $cate): ?>
                  <option value="<?php echo $cate['id']?>"><?php echo $cate['name'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="form-group">
              <label>Chi tiết</label>
              <textarea rows="5" class="form-control" name="detail"></textarea>
            </div>
            <div class="form-group">
              <label>Giá gốc</label>
              <input type="text" name="listprice" class="form-control">
              <?php if (isset($_GET['errListPrice'])) {
                ?>
                <span class="text-danger"><?php echo $_GET['errListPrice'] ?></span>
                <?php
              } 
              ?>
            </div>    
            <div class="form-group">
              <label>Giá bán</label>
              <input type="text" name="saleprice" class="form-control">
              <?php if (isset($_GET['errSalePrice'])) {
                ?>
                <span class="text-danger"><?php echo $_GET['errSalePrice'] ?></span>
                <?php
              } 
              ?>
            </div>
            <div class="form-group">
              <label>Ảnh sản phẩm</label>
              <input type="file" name="image" class="form-control">
              <?php if (isset($_GET['errImage'])) {
                ?>
                <span class="text-danger"><?php echo $_GET['errImage'] ?></span>
                <?php
              } 
              ?>
            </div>
            <div class="form-group">
              <label>Trạng thái</label>
              <select class="form-control" name="status">
                <option value="1">Còn hàng</option>
                <option value="0">Hết hàng</option>
              </select>
            </div>         
            <div class="text-right">
              <a href="<?= $adminUrl?>san-pham" class="btn btn-danger btn-md">Hủy</a>
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
