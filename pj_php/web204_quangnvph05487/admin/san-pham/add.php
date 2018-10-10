<?php 
session_start();
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
        <form action="<?= $adminUrl ?>san-pham/save-add.php" method="post" enctype="multipart/form-data" name="add-product-form" onsubmit="return validateFormSubmit()">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Tên sản phẩm</label>
                <input type="text" name="name" class="form-control">
                <span class="text-danger" id="errName"></span>
                <?php if (isset($_GET['errName'])) {
                  ?>
                  <span class="text-danger" id="errNameBack"><?php echo $_GET['errName'] ?></span>
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
                <?php if (isset($_GET['errCate'])) {
                  ?>
                  <span class="text-danger" id="errCateBack"><?php echo $_GET['errCate'] ?></span>
                  <?php
                } 
                ?>
              </div>
              <div class="form-group">
                <label>Giá gốc</label>
                <input type="text" name="listprice" class="form-control">
                <span class="text-danger" id="errListPrice"></span>
                <?php if (isset($_GET['errListPrice'])) {
                  ?>
                  <span class="text-danger" id="errListPriceBack"><?php echo $_GET['errListPrice'] ?></span>
                  <?php
                } 
                ?>
              </div>    
              <div class="form-group">
                <label>Giá bán</label>
                <input type="text" name="saleprice" class="form-control">
                <span class="text-danger" id="errSalePrice"></span>
                <?php if (isset($_GET['errSalePrice'])) {
                  ?>
                  <span class="text-danger" id="errSalePriceBack"><?php echo $_GET['errSalePrice'] ?></span>
                  <?php
                } 
                ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="col-md-6 col-md-offset-4">
                <img id="showImage" src="<?php echo $siteUrl?>assets/images/sample_image/default-picture.png" width="200px" class="img-responsive">
              </div>
              <div class="col-md-12">                
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
                  <br>
                  <div class="checkbox icheck">
                    <label><input type="radio" name="status" value="1"> Còn hàng &nbsp;</label>
                    <label><input type="radio" name="status" value="0"> Hết hàng</label>
                  </div>
                  
                  <?php if (isset($_GET['errStatus'])) {
                    ?>
                    <span class="text-danger" id="errStatusBack" "><?php echo $_GET['errStatus'] ?></span>
                    <?php
                  } 
                  ?>
                </div>    
              </div> 
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Chi tiết</label>
                <textarea rows="5" class="form-control" name="detail"></textarea>
              </div>
            </div>
          </div>
          <div class="text-right">
            <a href="<?= $adminUrl?>san-pham" class="btn btn-danger btn-md">Hủy</a>
            <button type="submit" class="btn btn-md btn-primary">Tạo mới</button>
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
      $('[name="detail"]').wysihtml5();
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
    var name = document.forms["add-product-form"]["name"];
    var category = document.forms["add-product-form"]["category"];
    var detail = document.forms["add-product-form"]["detail"];
    var listprice = document.forms["add-product-form"]["listprice"];
    var saleprice = document.forms["add-product-form"]["saleprice"];
    var status = document.forms["add-product-form"]["status"];
    var errName = document.getElementById("errName");
    var errNameBack = document.getElementById("errNameBack");
    var errListPrice = document.getElementById("errListPrice");
    var errListPriceBack = document.getElementById("errListPriceBack");
    var errSalePrice = document.getElementById("errSalePrice");
    var errSalePriceBack = document.getElementById("errSalePriceBack");
    if (name.value == "") {
      if (errNameBack==null) {
        swal({
          title: "Bạn chưa điền tên sản phẩm!",
          text: "...kiểm tra lại nhé!",
          icon: "warning",
          dangerMode: true,
        });
        document.getElementById("errName").innerHTML = "Bạn chưa điền tên sản phẩm. Tên sản phẩm phải không được trùng với sản phẩm đã có";
        return false;
      }
      else {
        swal({
          title: "Bạn chưa điền tên sản phẩm!",
          text: "...kiểm tra lại nhé!",
          icon: "warning",
          dangerMode: true,
        });
        document.getElementById("errName").innerHTML = "Bạn chưa điền tên sản phẩm. Tên sản phẩm phải không được trùng với sản phẩm đã có";
        errNameBack.style.display = "none";
        return false;
      }
    }
    if (listprice.value != parseInt(listprice.value)) {
      if (errListPriceBack==null) {
        swal({
          title: "Có lỗi khi nhập giá gốc!",
          text: "...kiểm tra lại nhé!",
          icon: "warning",
          dangerMode: true,
        });
        document.getElementById("errListPrice").innerHTML = "Giá gốc phải là số tự nhiên";
        return false;
      }
      else {
        swal({
          title: "Có lỗi khi nhập giá gốc!",
          text: "...kiểm tra lại nhé!",
          icon: "warning",
          dangerMode: true,
        });
        document.getElementById("errListPrice").innerHTML = "Giá gốc phải là số tự nhiên";
        errListPriceBack.style.display = "none";
        return false;
      }
    }
    else if (parseInt(listprice.value) < 0) {
      if (errListPriceBack==null) {
        swal({
          title: "Có lỗi khi nhập giá gốc!",
          text: "...kiểm tra lại nhé!",
          icon: "warning",
          dangerMode: true,
        });
        document.getElementById("errListPrice").innerHTML = "Giá gốc phải là số tự nhiên";
        return false;
      }
      else {
        swal({
          title: "Có lỗi khi nhập giá gốc!",
          text: "...kiểm tra lại nhé!",
          icon: "warning",
          dangerMode: true,
        });
        document.getElementById("errListPrice").innerHTML = "Giá gốc phải là số tự nhiên";
        errListPriceBack.style.display = "none";
        return false;
      }
    }
    else {
      document.getElementById("errListPrice").innerHTML = "";
    }
    if (saleprice.value != parseInt(saleprice.value)) {
      if (errSalePriceBack==null) {
        swal({
          title: "Có lỗi khi nhập giá bán!",
          text: "...kiểm tra lại nhé!",
          icon: "warning",
          dangerMode: true,
        });
        document.getElementById("errSalePrice").innerHTML = "Giá bán phải là số tự nhiên. Dữ liệu bạn vừa nhập không phải là số";
        return false;
      }
      else {
        swal({
          title: "Có lỗi khi nhập giá bán!",
          text: "...kiểm tra lại nhé!",
          icon: "warning",
          dangerMode: true,
        });
        document.getElementById("errSalePrice").innerHTML = "Giá bán phải là số tự nhiên. Dữ liệu bạn vừa nhập không phải là số";
        errSalePriceBack.style.display = "none";
        return false;
      }
    }
    else if (parseInt(saleprice.value) < 0) {
      if (errSalePriceBack==null) {
        swal({
          title: "Có lỗi khi nhập giá bán!",
          text: "...kiểm tra lại nhé!",
          icon: "warning",
          dangerMode: true,
        });
        document.getElementById("errSalePrice").innerHTML = "Giá bán phải là số tự nhiên. Dữ liệu bạn vừa nhập là số âm";
        return false;
      }
      else {
        swal({
          title: "Có lỗi khi nhập giá bán!",
          text: "...kiểm tra lại nhé!",
          icon: "warning",
          dangerMode: true,
        });
        document.getElementById("errSalePrice").innerHTML = "Giá bán phải là số tự nhiên. Dữ liệu bạn vừa nhập là số âm";
        errSalePriceBack.style.display = "none";
        return false;
      }
    }
    else if (parseInt(saleprice.value) > parseInt(listprice.value)) {
      if (errSalePriceBack==null) {
        swal({
          title: "Có lỗi khi nhập giá!",
          text: "...kiểm tra lại nhé!",
          icon: "warning",
          dangerMode: true,
        });
        document.getElementById("errSalePrice").innerHTML = "Giá bán bắt buộc nhỏ hơn hoặc bằng giá gốc";
        return false;
      }
      else {
        swal({
          title: "Có lỗi khi nhập giá!",
          text: "...kiểm tra lại nhé!",
          icon: "warning",
          dangerMode: true,
        });
        document.getElementById("errSalePrice").innerHTML = "Giá bán bắt buộc nhỏ hơn hoặc bằng giá gốc";
        errSalePriceBack.style.display = "none";
        return false;
      }
    }
    else {
      document.getElementById("errSalePrice").innerHTML = "";
    }
  }
</script>
</body>
</html>
