<?php 
session_start();
$path = '../';
require_once $path.$path.'assets/commons/utils.php';
$sqlWebSetting = 'select * from web_settings';
$web_setting = getSimpleQuery($sqlWebSetting);
?>
<!DOCTYPE html>
<html>
<head>
  <?php 
  include $path.'_share/style_assets.php';
  ?>
  <title>AdminLTE 2 | Cấu hình web</title>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->

</head>
<body class="hold-transition skin-blue sidebar-mini">
  <script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s);
      js.id = id;
      js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1&appId=195253094360623&autoLogAppEvents=1';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>
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
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Bordered Table</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-bordered">
              <tbody><tr>
                <th width="300px">Logo</th>
                <th>Hotline</th>
                <th>Map</th>
                <th>Email</th>
                <th>Facebook</th>
              </tr>
              <tr>
                <td><img src="<?php echo $siteUrl . $web_setting['logo']?>" class='img-thumbnail' width=300px></td>
                <td><?php echo $web_setting['hotline'] ?></td>
                <td><?php echo $web_setting['map'] ?></td>
                <td><?php echo $web_setting['email'] ?></td>
                <td><?php echo $web_setting['fb'] ?></td>
                <td>
                  <a href="<?= $adminUrl?>web-setting/edit.php"
                    class="btn btn-xs btn-info">
                    Chỉnh sửa
                  </a>
                </td>
              </tr>
            </tbody></table>
          </div>
          <!-- /.box-body -->
          <div class="box-footer clearfix">
            <ul class="pagination pagination-sm no-margin pull-right">
              <li><a href="#">«</a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">»</a></li>
            </ul>
          </div>
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
    <?php 
    if (isset($_GET['edit-success']) && $_GET['edit-success'] == true) {
      ?>
      swal({
        title: "Xác nhận",
        text: "Thông tin website đã được sửa",
        icon: "success",
        button: false,
      });
      <?php
    }
    ?>
  </script>
</body>
</html>
