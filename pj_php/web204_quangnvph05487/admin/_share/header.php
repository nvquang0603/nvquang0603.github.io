<?php 
require_once $path.'../assets/commons/utils.php';
if(!isset($_SESSION['login']) || $_SESSION['login'] == null){
  header('location: '.$siteUrl.'login.php?msg=Bạn chưa đăng nhập!');
  die;
}
else if ($_SESSION['login']['role'] > 2) {
  header('location: '.$siteUrl);
  die;
}
?>
<header class="main-header">
  <!-- Logo -->
  <a href="<?php echo $adminUrl ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>A</b>LT</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Admin</b>LTE</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        
<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <img src="<?= $siteUrl . $_SESSION['login']['avatar']?>" class="user-image" alt="User Image">
    <span class="hidden-xs"><?php echo $_SESSION['login']['fullname'] ?></span>
  </a>
  <ul class="dropdown-menu">
    <!-- User image -->
    <li class="user-header">
      <img src="<?= $siteUrl     . $_SESSION['login']['avatar']?>" class="img-circle" alt="User Image">

      <p>
        <?php echo $_SESSION['login']['email'] ?>
        <small>
          <?php 
          if ($_SESSION['login']['role']==1) {
            echo "Admin";
          }
          else {
            echo "Member";
          }
          ?>
        </small>
      </p>
    </li>
    <!-- Menu Body -->
    <!-- Menu Footer-->
    <li class="user-footer">
      <div class="pull-left">
        <a href="#" class="btn btn-info btn-flat">Profile</a>
      </div>
      <div class="pull-right">
        <a href="<?php echo $siteUrl ?>logout.php" class="btn btn-danger btn-flat">Đăng xuất</a>
      </div>
    </li>
  </ul>
</li>
</ul>
</div>
</nav>
</header>