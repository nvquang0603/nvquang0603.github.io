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
  <title>AdminLTE 2 | Thương hiệu</title>
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
            <h3 class="box-title">Bordered Table</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="brandTable" class="display table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th width="300px">Avatar</th>
                  <th width="300px">Email</th>
                  <th width="300px">Họ và tên</th>
                  <th>Mật khẩu</th>
                  <th>Phân quyền</th>
                  <th>Giới tính</th>
                  <th>Địa chỉ</th>
                  <th>SĐT</th>
                  <th style="width: 120px">
                    <a href="<?= $adminUrl?>brand/add.php"
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
                    <td><?php echo $user['password'] ?></td>
                    <td>
                      <?php
                        if ($user['role']==1) {
                          echo "Admin";
                        }
                        else if($user['role']==2){
                          echo "Quản lý";
                        }
                        else {
                          echo "Thành viên";
                        }
                      ?>
                    </td>
                    <td>
                      <?php
                        if ($user['gender']==1) {
                          echo "Nam";
                        }
                        if($user['gender']==0){
                          echo "Nữ";
                        }
                      ?>
                    </td>
                    <td><?php echo $user['address'] ?></td>
                    <td><?php echo $user['phone_number'] ?></td>
                    <td>
                      <a href="<?= $adminUrl?>brand/edit.php?id=<?= $user['id']?>"
                        class="btn btn-xs btn-info">
                        Chỉnh sửa
                      </a>
                      <a href="javascript:void(0)" linkurl="<?= $adminUrl?>brand/remove.php?id=<?= $user['id']?>"
                        class="btn btn-xs btn-danger btn-remove">
                        Xoá
                      </a>
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
          text: "Thương hiệu đã được thêm",
          icon: "success",
          button: false,
        });
        <?php
      }
      if (isset($_GET['edit-success']) && $_GET['edit-success'] == true) {
        ?>
        swal({
          title: "Xác nhận",
          text: "Thương hiệu đã được sửa",
          icon: "success",
          button: false,
        });
        <?php
      }
      ?>
      $('.btn-remove').on('click',function() {
        swal({
          title: "Bạn có muốn xóa thương hiệu này không?",
          text: "Một khi đã xóa. Thương hiệu sẽ không thể quay lại",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location.href = $(this).attr('linkurl');
            swal("Bạn có muốn xóa thương hiệu này không?", {
              icon: "success",
            });
          } 
          else {
            swal("Bạn đã hủy việc xóa thương hiệu");
          }
        });
      })
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
      $('#brandTable').DataTable( {
        "pagingType": "full_numbers"
      });
    });
  </script>
  </body>
  </html>
