<?php 
    session_start();
    $path = '../';
    require_once $path.$path.'assets/commons/utils.php';
    if($_SESSION['login']['role']!=1) {
      header('location: '.$adminUrl . '?errAdmin=Chỉ Admin mới truy cập được trang này');
      die;
    }
    $slideId = $_GET['id'];
    $sql = "select * from slideshows where id = $slideId";
    $slide = getSimpleQuery($sql);
?>
<!DOCTYPE html>
<html>
<head>
  <?php 
  include $path.'_share/style_assets.php';
  ?>
  <title>Sửa Slide</title>
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
        <form action="<?= $adminUrl ?>slideshow/save-edit.php" method="post" enctype="multipart/form-data" name="add-slide-form" onsubmit="return validateFormSubmit()">
          <input type="hidden" name="id" value="<?php echo $slide['id']?>">
          <div class="col-md-6">
            <div class="form-group">
              <label>Thứ tự</label>
              <input type="number" name="ordernumber" class="form-control" value="<?php echo $slide['order_number']?>">
              <span class="text-danger" id="errOrderNumber"></span>
              <?php if (isset($_GET['errOrderNumber'])) {
                ?>
                <span class="text-danger" id="errOrderNumberBack"><?php echo $_GET['errOrderNumber'] ?></span>
                <?php
              } 
              ?>
            </div>
            <div class="form-group">
              <label>URL</label>
              <input type="text" class="form-control" name="url" value="<?php echo $slide['url']?>">
            </div>
            <div class="form-group">
              <label>Trạng thái</label>
              <br>
              <div class="checkbox icheck">
                <label><input type="radio" name="status" id="stt-1" value="1"> Hiển thị &nbsp;</label>
                <label><input type="radio" name="status" id="stt-0" value="0"> Ẩn</label>
              </div>
              <?php if (isset($_GET['errStatus'])) {
                ?>
                <span class="text-danger" id="errStatusBack"><?php echo $_GET['errStatus'] ?></span>
                <?php
              } 
              ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <div class="col-md-12 col-md-offset-2">
                <img id="showImage" src="<?php echo $siteUrl . $slide['image']?>" width="500px" class="img-responsive">
                <input type="hidden" name="origin-image" value="<?php echo $slide['image']?>">
              </div>
              <label>Ảnh Slide</label>
              <input type="file" name="image" class="form-control">
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
              <label>Mô tả</label>
              <textarea rows="5" class="form-control" name="desc"><?php echo $slide['description'] ?></textarea>
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
  function validateFormSubmit() {
    var orderNumber = document.forms["add-slide-form"]["ordernumber"];
    var errOrderNumber = document.getElementById("errOrderNumber");
    var errOrderNumberBack = document.getElementById("errOrderNumberBack");
    if (orderNumber.value != parseInt(orderNumber.value)) {
      if (errOrderNumberBack==null) {
        document.getElementById("errOrderNumber").innerHTML = "Thứ tự phải là số nguyên";
        return false;
      }
      else {
        document.getElementById("errOrderNumber").innerHTML = "Thứ tự phải là số nguyên";
        errOrderNumberBack.style.display = "none";
        return false;
      }
    }
  }
</script>
  <script type="text/javascript">
    $(document).ready(function(){
      if (<?= $slide['status']?>==1) {
        $("#stt-1").attr("checked", true);
      }
      else {
        $("#stt-0").attr("checked", true);
      }
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_flat-red',
          radioClass: 'iradio_flat-red',
          increaseArea: '20%' /* optional */
        });
      });
      var img = document.querySelector('[name="image"]');
      img.onchange = function(){
        var anh = this.files[0];
        if(anh == undefined){
          document.querySelector('#showImage').src = "<?= $siteUrl . $slide['image']?>";
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
  hideSelectedChoice('selected_status','chose_status');
</script>
</body>
</html>
