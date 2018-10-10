<?php 
  session_start();
  $path = '../';
  require_once $path.$path.'assets/commons/utils.php';
  $brandId = $_GET['id'];
  $sql = "select * from brands where id = $brandId";
  $brand = getSimpleQuery($sql);
?>
<!DOCTYPE html>
<html>
<head>
  <?php 
  include $path.'_share/style_assets.php';
  ?>
  <title>AdminLTE 2 | Thêm thương hiệu</title>
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
        <form action="<?= $adminUrl ?>brand/save-edit.php" method="post" enctype="multipart/form-data" name="edit-brand-form" onsubmit="return validateFormSubmit()">
          <input type="hidden" name="id" value="<?php echo $brand['id']?>">
          <div class="col-md-6">
            <div class="form-group">
              <div class="col-md-12 col-md-offset-4">
                <img id="showImage" src="<?php echo $siteUrl . $brand['image']?>" width="200px" class="img-responsive">
                <input type="hidden" name="origin-image" value="<?php echo $brand['image']?>">
              </div>
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
              <label>Tên thương hiệu</label>
              <input type="text" name="name" class="form-control" value="<?php echo $brand['name']?>">
              <span class="text-danger" id="errName"></span>
              <?php if (isset($_GET['errName'])) {
                ?>
                <span class="text-danger" id="errNameBack"><?php echo $_GET['errName'] ?></span>
                <?php
              } 
              ?>
            </div>            
            <div class="form-group">
              <label>URL</label>
              <input type="text" name="url" class="form-control" value="<?php echo $brand['url']?>">
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
  <script type="text/javascript">
    $(document).ready(function(){
      var img = document.querySelector('[name="image"]');
      img.onchange = function(){
        var anh = this.files[0];
        if(anh == undefined){
          document.querySelector('#showImage').src = "<?= $siteUrl?>assets/images/sample_image/default-picture.png";
        }else{
          getBase64(anh, '#showImage');
        }
      }
      function getBase64(file, selector) {
       var reader = new FileReader();
       reader.readAsDataURL(file);
       reader.onload = function () {
         document.querySelector(selector).src = reader.result;
       };
       reader.onerror = function (error) {
         console.log('Error: ', error);
       };
     }
   });
  </script>
  <script type="text/javascript">
    function validateFormSubmit() {
      var name = document.forms["edit-brand-form"]["name"];
      var errName = document.getElementById("errName");
      var errNameBack = document.getElementById("errNameBack");
      if (name.value == "") {
        if (errNameBack==null) {
          swal({
            title: "Bạn chưa điền tên thương hiệu!",
            text: "...kiểm tra lại nhé!",
            icon: "warning",
            dangerMode: true,
          });
          document.getElementById("errName").innerHTML = "Bạn chưa điền tên danh mục. Tên danh mục phải không được trùng với thương hiệu đã có";
          return false;
        }
        else {
          swal({
            title: "Bạn chưa điền tên thương hiệu!",
            text: "...kiểm tra lại nhé!",
            icon: "warning",
            dangerMode: true,
          });
          document.getElementById("errName").innerHTML = "Bạn chưa điền tên danh mục. Tên danh mục phải không được trùng với thương hiệu đã có";
          errNameBack.style.display = "none";
          return false;
        }
      }
    }
  </script>
</body>
</html>
