<?php 
session_start();
  $path = './';
  require_once $path.'../assets/commons/utils.php';
  $countCateQuery = "select count(*) as total from categories";
  $countCate = getSimpleQuery($countCateQuery);
  $countProductQuery = "select count(*) as total from products";
  $countProduct = getSimpleQuery($countProductQuery);
  $countCommentQuery = "select count(*) as total from comments";
  $countComment = getSimpleQuery($countCommentQuery);
  $countUserQuery = "select count(*) as total from users";
  $countUser = getSimpleQuery($countUserQuery);
?>
<!DOCTYPE html>
<html>
<head>
  <?php 
  include $path.'_share/style_assets.php';
  ?>
  <title>Admin LTE | Quản trị</title>
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
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3><?php echo $countCate['total'] ?></h3>

                <p>Danh mục</p>
              </div>
              <div class="icon">
                <i class="fa fa-list"></i>
              </div>
              <a href="<?php echo $adminUrl?>danh-muc" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3><?php echo $countProduct['total'] ?></h3>

                <p>Sản phẩm</p>
              </div>
              <div class="icon">
                <i class="fa fa-cubes"></i>
              </div>
              <a href="<?php echo $adminUrl?>san-pham" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3><?php echo $countComment['total'] ?></h3>
                <p>Comments</p>
              </div>
              <div class="icon">
                <i class="fa fa-comments"></i>
              </div>
              <a href="<?php echo $adminUrl?>comment" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?php echo $countUser['total'] ?></h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="<?php echo $adminUrl?>users" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
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
    $(document).ready(function() {
      <?php 
          if (isset($_GET['errAdmin'])) {
            ?>
              swal({
                title: "Không thể truy cập",
                text: "<?php echo $_GET['errAdmin']?>",
                icon: "warning",
                button: false,
              });
            <?php
          }
      ?>
    });
  </script>
</body>
</html>
