<?php
session_start();
require_once './assets/commons/utils.php';
if (isset($_SESSION['login'])) {
  header('location: ' . $adminUrl);
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Đăng ký</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="#"><b>Đăng ký</b></a>
    </div>

    <div class="register-box-body">
      <p class="login-box-msg">Điền vào form đăng ký</p>
      <form action="submit-register.php" method="post">
        <div class="form-group has-feedback row">
          <div class="col-xs-7">
            <input type="text" class="form-control" name="firstname" placeholder="Họ">
          </div>
          <div class="col-xs-5">
            <input type="text" class="form-control" name="lastname" placeholder="Tên">
          </div>
          <?php if (isset($_GET['errName'])) {
            ?>
            <span class="col-xs-12 text-danger" id="errNameBack"><?php echo $_GET['errName'] ?></span>
            <?php
          } 
          ?>
        </div>
        <div class="form-group has-feedback">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group">
          <?php if (isset($_GET['errEmail'])) {
            ?>
            <span class="text-danger" id="errEmailBack"><?php echo $_GET['errEmail'] ?></span>
            <?php
          } 
          ?>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group">
          <?php if (isset($_GET['errPassword'])) {
            ?>
            <span class="text-danger" id="errPasswordBack"><?php echo $_GET['errPassword'] ?></span>
            <?php
          } 
          ?>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="re-password" placeholder="Nhập lại mật khẩu">
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>
        <div class="form-group">
          <?php if (isset($_GET['errRePassword'])) {
            ?>
            <span class="text-danger" id="errRePasswordBack"><?php echo $_GET['errRePassword'] ?></span>
            <?php
          } 
          ?>
        </div>
        <div class="form-group has-feedback">
          <div class="radio icheck">
            <label>
              <input type="radio" value="1" name="gender" checked>&nbsp;Nam&nbsp;
            </label>
            <label>
              <input type="radio" value="0" name="gender">&nbsp;Nữ
            </label>
          </div>
        </div>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="address" placeholder="Địa chỉ (không bắt buộc)">
          <span class="glyphicon glyphicon-home form-control-feedback"></span>
        </div>
        <div class="form-group">
          <?php if (isset($_GET['errAddress'])) {
            ?>
            <span class="text-danger" id="errAddressBack"><?php echo $_GET['errAddress'] ?></span>
            <?php
          } 
          ?>
        </div>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="phone" placeholder="SĐT (không bắt buộc)">
          <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
        </div>
        <div class="form-group">
          <?php if (isset($_GET['errPhone'])) {
            ?>
            <span class="text-danger" id="errEmailBack"><?php echo $_GET['errPhone'] ?></span>
            <?php
          } 
          ?>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <a href="login.php" class="btn text-center">Tôi có tài khoản</a>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng ký</button>
          </div>
          <!-- /.col -->
        </div>

      </form>
      
    </div>
    <!-- /.form-box -->
  </div>
  <!-- /.register-box -->

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
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_flat-blue',
        increaseArea: '20%' /* optional */
      });
    });
  </script>
</body>
</html>
