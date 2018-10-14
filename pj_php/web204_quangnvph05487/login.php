<?php
  require_once './assets/commons/utils.php';
  session_start();
  if (isset($_SESSION['login'])) {
    header('location: '. $adminUrl);
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo $adminAssetUrl?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $adminAssetUrl?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo $adminAssetUrl?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $adminAssetUrl?>dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="<?php echo $adminAssetUrl?>plugins/iCheck/all.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
   <title>Đăng nhập</title>
 </head>
 <body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>Đăng nhập</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Đăng nhập để vào trang quản trị</p>

      <form action="post-login.php" method="post" name="login-form" onsubmit="return validateFormSubmit()">
        <div class="form-group has-feedback">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          <span class="text-danger" id="errEmail"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          <span class="text-danger" id="errPw"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <a href="register.php" class="btn text-center">Đăng ký</a>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      

    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery 3 -->
  <script src="<?php echo $adminAssetUrl?>bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo $adminAssetUrl?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="<?php echo $adminAssetUrl?>plugins/iCheck/icheck.min.js"></script>

  <script src="<?php echo $adminAssetUrl?>plugins/sweetalert/dist/sweetalert.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      <?php 
          if (isset($_GET['msg'])) {
            ?>
              swal({
                title: "Cảnh báo",
                text: "<?php echo $_GET['msg']?>",
                icon: "warning",
                dangerMode: true,
              });
            <?php
          }
          if (isset($_GET['success'])) {
            ?>
              swal({
                title: "Đăng ký thành công",
                text: "Đăng nhập để truy cập",
                icon: "success",
                button: false,
              });
            <?php
          }
      ?>
    });
  </script>
  <script>  
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
  </script>
  <script type="text/javascript">
    function validateFormSubmit() {
      var email = document.forms["login-form"]["email"];
      var password = document.forms["login-form"]["password"];
      var errEmailBack = document.getElementById("errEmailBack");
      var errPwBack = document.getElementById("errPwBack");
      if (email.value == "") {
        if (errEmailBack==null) {
          swal({
            title: "Bạn chưa nhập Email",
            text: "...kiểm tra lại nhé!",
            icon: "warning",
            dangerMode: true,
          });
          document.getElementById("errEmail").innerHTML = "Vui lòng nhập đủ email và mật khẩu";
          return false;
        }
        else {
          swal({
            title: "Bạn chưa nhập Email",
            text: "...kiểm tra lại nhé!",
            icon: "warning",
            dangerMode: true,
          });
          document.getElementById("errEmail").innerHTML = "Vui lòng nhập đủ email và mật khẩu";
          errNameBack.style.display = "none";
          return false;
        }
      }
      if (password.value == "") {
        if (errPwBack==null) {
          swal({
            title: "Bạn chưa nhập mật khẩu",
            text: "...kiểm tra lại nhé!",
            icon: "warning",
            dangerMode: true,
          });
          document.getElementById("errPw").innerHTML = "Vui lòng nhập đủ email và mật khẩu";
          return false;
        }
        else {
          swal({
            title: "Bạn chưa nhập mật khẩu",
            text: "...kiểm tra lại nhé!",
            icon: "warning",
            dangerMode: true,
          });
          document.getElementById("errPw").innerHTML = "Vui lòng nhập đủ email và mật khẩu";
          errPwBack.style.display = "none";
          return false;
        }
      }
    }
  </script>
</body>
</html>
