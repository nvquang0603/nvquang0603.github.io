<?php 
    session_start();
    $path = '../';
    require_once $path.$path.'assets/commons/utils.php';
    $sqlUser = 'select * from users order by id';
    $user = getSimpleQuery($sqlUser,true);
    if($_SESSION['login']['role']!=1) {
      header('location: '.$adminUrl . '?errAdmin=Chỉ Admin mới truy cập được trang này');
      die;
    }
?>
<!DOCTYPE html>
<html>
<head>
  <?php 
  include $path.'_share/style_assets.php';
  ?>
  <title>AdminLTE 2 | Tài khoản</title>
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
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Quản lý tài khoản</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="userTable" class="display table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th width="200px">Avatar</th>
                  <th>Email</th>
                  <th>Họ và tên</th>
                  <th>Phân quyền</th>
                  <th style="width: 120px">
                    <a href="<?= $adminUrl?>tai-khoan/add.php"
                      class="btn btn-xs btn-success">
                      Thêm
                    </a>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($user as $user): ?>
                  <tr>
                    <td><?php echo $user['id'] ?></td>
                    <td><img src="<?php echo $siteUrl . $user['avatar']?>" class='img-thumbnail' width=300px></td>
                    <td><?php echo $user['email'] ?></td>
                    <td><?php echo $user['fullname'] ?></td>
                    <td>
                      <?php
                        if ($user['role']==1) {
                          echo "Admin";
                        }
                        else if($user['role']==2){
                          echo "Quản trị viên";
                        }
                        else {
                          echo "Người dùng";
                        }
                      ?>
                    </td>
                    <td>
                      <a href="<?= $adminUrl?>tai-khoan/edit.php?id=<?= $user['id']?>"
                        class="btn btn-xs btn-info">
                        Chỉnh sửa
                      </a>
                      <?php 
                      if ($user['role']==1) {
                        ?>
                        <a href="javascript:void(0)" linkurl="<?= $adminUrl?>tai-khoan/remove.php?id=<?= $user['id']?>"
                          class="btn btn-xs btn-danger btn-remove disabled">
                          Xoá
                        </a>
                        <?php
                      }
                      else {
                        ?>
                        <a href="javascript:void(0)" linkurl="<?= $adminUrl?>tai-khoan/remove.php?id=<?= $user['id']?>"
                          class="btn btn-xs btn-danger btn-remove">
                          Xoá
                        </a>
                        <?php
                      }
                      ?>                      
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
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
      if (isset($_GET['success']) && $_GET['success'] == true) {
        ?>
        swal({
          title: "Xác nhận",
          text: "Tài khoản đã được thêm",
          icon: "success",
          button: false,
        });
        <?php
      }
      if (isset($_GET['edit-success']) && $_GET['edit-success'] == true) {
        ?>
        swal({
          title: "Xác nhận",
          text: "Tài khoản đã được sửa",
          icon: "success",
          button: false,
        });
        <?php
      }
      if (isset($_GET['remove-success']) && $_GET['remove-success'] == true) {
        ?>
        swal({
          title: "Xác nhận",
          text: "Đã xóa tài khoản",
          icon: "success",
          button: false,
        });
        <?php
      }
      if (isset($_GET['errAdmin'])) {
        ?>
        swal({
          title: "Cảnh báo",
          text: "<?php echo $_GET['errAdmin']?>",
          icon: "warning",
          button: false,
        });
        <?php
      }
      ?>
      $('.btn-remove').on('click',function() {
        swal({
          title: "Bạn có muốn xóa tài khoản này không?",
          text: "Một khi đã xóa. Tài khoản sẽ không thể quay lại",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location.href = $(this).attr('linkurl');
            swal("Bạn có muốn xóa tài khoản này không?", {
              icon: "success",
            });
          } 
          else {
            swal("Bạn đã hủy việc xóa tài khoản");
          }
        });
      })
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
      $('#userTable').DataTable( {
        "pagingType": "full_numbers"
      });
    });
  </script>
  </body>
  </html>
