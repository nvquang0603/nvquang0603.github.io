<?php 
  session_start();
  $path = '../';
  require_once $path.$path.'assets/commons/utils.php';
  $cateId = $_GET['id'];
  $sql = "select * from categories where id = $cateId";
  $cate = getSimpleQuery($sql);
  if (!$cate) {
    header('location: '. $adminUrl .'danh-muc');
    die;
  }
?>
<!DOCTYPE html>
<html>
<head>
  <?php 
  include $path.'_share/style_assets.php';
  ?>
  <title>Sửa danh mục | <?php echo $cate['name'] ?></title>
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
        <form action="<?= $adminUrl ?>danh-muc/save-edit.php" method="post" name="edit-cate-form" onsubmit="return validateFormSubmit()">
          <input type="hidden" name="id" value="<?php echo $cate['id']?>">
          <div class="col-md-6">
            <div class="form-group">
              <label>Tên danh mục</label>
              <input type="text" name="name" class="form-control" value="<?php echo $cate['name']?>">
              <span class="text-danger" id="errName"></span>
              <?php if (isset($_GET['errName'])) {
                ?>
                <span class="text-danger" id="errNameBack"><?php echo $_GET['errName'] ?></span>
                <?php
              } 
              ?>
            </div>
            <div class="form-group">
              <label>Mô tả</label>
              <textarea rows="5" class="form-control" name="desc"><?php echo $cate['description'] ?></textarea>
            </div>            
            <div class="text-right">
              <a href="<?= $adminUrl?>danh-muc" class="btn btn-danger btn-md">Hủy</a>
              <button type="submit" class="btn btn-md btn-primary">Cập nhật</button>
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
  <script type="text/javascript">
    function validateFormSubmit() {
      var name = document.forms["edit-cate-form"]["name"];
      var errName = document.getElementById("errName");
      var errNameBack = document.getElementById("errNameBack");
      if (name.value == "") {
        if (errNameBack==null) {
          document.getElementById("errName").innerHTML = "Bạn chưa điền tên danh mục. Tên danh mục phải không được trùng với sản phẩm đã có";
          return false;
        }
        else {
          document.getElementById("errName").innerHTML = "Bạn chưa điền tên danh mục. Tên danh mục phải không được trùng với sản phẩm đã có";
          errNameBack.style.display = "none";
          return false;
        }
      }
    }
  </script>
</body>
</html>
