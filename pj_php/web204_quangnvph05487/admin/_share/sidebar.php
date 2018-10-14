<?php 
    require_once $path.'../assets/commons/utils.php';
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?= $siteUrl . $_SESSION['login']['avatar']?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $_SESSION['login']['fullname'] ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="treeview">
        <a href="<?php echo $adminUrl?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class=""><a href="<?php echo $adminUrl?>"><i class="fa fa-circle-o"></i> Thống kê</a></li>

        </ul>
      </li>
      <li class="treeview">
        <a href="<?php echo $adminUrl?>danh-muc">
          <i class="fa fa-list"></i> <span>Danh mục sản phẩm</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class=""><a href="<?php echo $adminUrl?>danh-muc"><i class="fa fa-circle-o"></i> Danh sách</a></li>
          <li class=""><a href="<?php echo $adminUrl?>danh-muc/add.php"><i class="fa fa-circle-o"></i> Tạo mới</a></li>

        </ul>
      </li>
      <li class="treeview">
        <a href="<?php echo $adminUrl?>san-pham">
          <i class="fa fa-cubes"></i> <span>Sản phẩm</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class=""><a href="<?php echo $adminUrl?>san-pham"><i class="fa fa-circle-o"></i> Danh sách</a></li>
          <li class=""><a href="<?php echo $adminUrl?>san-pham/add.php"><i class="fa fa-circle-o"></i> Tạo mới</a></li>

        </ul>
      </li>
      <li class="treeview">
        <a href="<?php echo $adminUrl?>comment">
          <i class="fa fa-mail-forward "></i> <span>Phản hồi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class=""><a href="<?php echo $adminUrl?>comment"><i class="fa fa-circle-o"></i> Danh sách</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-envelope"></i> <span>Liên hệ</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class=""><a href="<?php echo $adminUrl?>lien-he"><i class="fa fa-circle-o"></i> Danh sách</a></li>
          <li class=""><a href="<?php echo $adminUrl?>lien-he/add.php"><i class="fa fa-circle-o"></i> Tạo mới</a></li>
        </ul>
      </li>
      <?php 
      if($_SESSION['login']['role']==1) {
        ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-truck"></i> <span>Đối tác</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="<?php echo $adminUrl?>brand"><i class="fa fa-circle-o"></i> Danh sách</a></li>
            <li class=""><a href="<?php echo $adminUrl?>brand/add.php"><i class="fa fa-circle-o"></i> Tạo mới</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Tài khoản</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="<?php echo $adminUrl?>tai-khoan"><i class="fa fa-circle-o"></i> Danh sách</a></li>
            <li class=""><a href="<?php echo $adminUrl?>tai-khoan/add.php"><i class="fa fa-circle-o"></i> Tạo mới</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gears"></i> <span>Cấu hình website</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="<?php echo $adminUrl?>web-setting"><i class="fa fa-circle-o"></i> Thông tin</a></li>
            <li class=""><a href="<?php echo $adminUrl?>slideshow"><i class="fa fa-circle-o"></i> Slideshows</a></li>
          </ul>
        </li>
        <?php
      }
      ?> 
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>