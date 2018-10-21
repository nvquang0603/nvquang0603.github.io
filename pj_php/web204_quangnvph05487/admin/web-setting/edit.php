<?php 
    session_start();
    $path = '../';
    require_once $path.$path.'assets/commons/utils.php';
    if($_SESSION['login']['role']!=1) {
      header('location: '.$adminUrl . '?errAdmin=Chỉ Admin mới truy cập được trang này');
      die;
    }
    $sql = "select * from web_settings";
    $setting = getSimpleQuery($sql);
?>
<!DOCTYPE html>
<html>
<head>
  <?php 
  include $path.'_share/style_assets.php';
  ?>
  <title>Cập nhật thông tin website</title>
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
        <form action="<?= $adminUrl ?>web-setting/save-edit.php" method="post" enctype="multipart/form-data" name="edit-setting-form" onsubmit="return validateFormSubmit()">
          <div class="col-md-6">
            <div class="form-group">
              <label>Hotline</label>
              <input type="text" name="hotline" class="form-control" value="<?php echo $setting['hotline']?>">
              <span class="text-danger" id="errHotline"></span>
              <?php if (isset($_GET['errHotline'])) {
                ?>
                <span class="text-danger" id="errHotlineBack"><?php echo $_GET['errHotline'] ?></span>
                <?php
              } 
              ?>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" name="email" value="<?php echo $setting['email']?>">
              <span class="text-danger" id="errEmail"></span>
              <?php if (isset($_GET['errEmail'])) {
                ?>
                <span class="text-danger" id="errEmailBack"><?php echo $_GET['errEmail'] ?></span>
                <?php
              } 
              ?>
            </div>
            <div class="form-group">
              <div class="form-group">
                <label>Map</label>
                <textarea rows="5" class="form-control" name="map"><?php echo $setting['map'] ?></textarea>
                <span class="text-danger" id="errMap"></span>
                <?php if (isset($_GET['errMap'])) {
                ?>
                <span class="text-danger" id="errMapBack"><?php echo $_GET['errMap'] ?></span>
                <?php
              } 
              ?>
              </div>  
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <div class="col-md-12 col-md-offset-3">
                <img id="showImage" src="<?php echo $siteUrl . $setting['logo']?>" width="400px" class="img-responsive">
                <input type="hidden" name="origin-image" value="<?php echo $setting['logo']?>">
              </div>
              <label>Logo</label>
              <input type="file" name="logo" class="form-control">
              <?php if (isset($_GET['errImage'])) {
                ?>
                <span class="text-danger"><?php echo $_GET['errImage'] ?></span>
                <?php
              } 
              ?>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Facebook</label>
              <textarea rows="5" class="form-control" name="fb"><?php echo $setting['fb'] ?></textarea>
              <span class="text-danger" id="errFB"></span>
              <?php if (isset($_GET['errFacebook'])) {
                ?>
                <span class="text-danger" id="errFbBack"><?php echo $_GET['errFacebook'] ?></span>
                <?php
              } 
              ?>
            </div>         
            <div class="text-right">
              <a href="<?= $adminUrl?>slideshow" class="btn btn-danger btn-md">Hủy</a>
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
    $(document).ready(function(){
      var img = document.querySelector('[name="logo"]');
      img.onchange = function(){
        var anh = this.files[0];
        if(anh == undefined){
          document.querySelector('#showImage').src = "<?= $siteUrl . $setting['logo']?>";
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
      var hotline = document.forms["edit-setting-form"]["hotline"];
      var email = document.forms["edit-setting-form"]["email"];
      var map = document.forms["edit-setting-form"]["map"];
      var fb = document.forms["edit-setting-form"]["fb"]; 
      if (hotline.value == "") {
        document.getElementById("errHotline").innerHTML = "Bạn chưa điền Hotline";
        return false;
      }
      if (email.value == "") {
        document.getElementById("errEmail").innerHTML = "Bạn chưa điền Email";
        return false;
      }
      if (map.value == "") {
        document.getElementById("errMap").innerHTML = "Bạn chưa điền mã nhúng Bản đồ";
        return false;
      }
      if (fb.value == "") {
        document.getElementById("errFB").innerHTML = "Bạn chưa điền mã nhúng Fanpage";
        return false;
      }
    }
  </script>
</body>
</html>
