<?php 
session_start();
$path = '../';
require_once $path.$path.'assets/commons/utils.php';
?>
<!DOCTYPE html>
<html>
<head>
  <?php 
  include $path.'_share/style_assets.php';
  ?>

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
