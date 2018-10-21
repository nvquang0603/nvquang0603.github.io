<?php 
session_start();
$path = '../';
require_once $path.$path.'assets/commons/utils.php';
$sqlContact = 'select * from contacts order by id';
$contact = getSimpleQuery($sqlContact,true);
?>
<!DOCTYPE html>
<html>
<head>
  <?php 
  include $path.'_share/style_assets.php';
  ?>
  <title>AdminLTE 2 | Liên hệ</title>
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
            <h3 class="box-title">Quản lý liên hệ</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="contactTable" class="display table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th width="200px">Họ và tên</th>
                  <th>Email</th>
                  <th>SĐT</th>
                  <th>Nội dung</th>
                  <th style="width: 120px">
                    <a href="<?= $adminUrl?>lien-he/add.php"
                      class="btn btn-xs btn-success">
                      Thêm
                    </a>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($contact as $contact): ?>
                  <tr>
                    <td><?php echo $contact['id'] ?></td>
                    <td><?php echo $contact['fullname'] ?></td>
                    <td><?php echo $contact['email'] ?></td>
                    <td><?php echo $contact['phone_number'] ?></td>
                    <td><?php echo htmlentities($contact['content']) ?></td>
                    <td>
                      <a href="<?= $adminUrl?>lien-he/edit.php?id=<?= $contact['id']?>"
                        class="btn btn-xs btn-info">
                        Chỉnh sửa
                      </a>
                      <a href="javascript:void(0)" linkurl="<?= $adminUrl?>lien-he/remove.php?id=<?= $contact['id']?>"
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
          text: "Liên hệ đã được thêm",
          icon: "success",
          button: false,
        });
        <?php
      }
      if (isset($_GET['edit-success']) && $_GET['edit-success'] == true) {
        ?>
        swal({
          title: "Xác nhận",
          text: "Liên hệ đã được sửa",
          icon: "success",
          button: false,
        });
        <?php
      }
      if (isset($_GET['remove-success']) && $_GET['remove-success'] == true) {
        ?>
        swal({
          title: "Xác nhận",
          text: "Đã xóa liên hệ",
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
          title: "Bạn có muốn xóa liên hệ này không?",
          text: "Một khi đã xóa. Liên hệ sẽ không thể quay lại",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location.href = $(this).attr('linkurl');
            swal("Bạn có muốn xóa liên hệ này không?", {
              icon: "success",
            });
          } 
          else {
            swal("Bạn đã hủy việc xóa liên hệ");
          }
        });
      })
    </script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#contactTable').DataTable( {
          "pagingType": "full_numbers",
          "bStateSave": true
        });
      });
    </script>
  </body>
  </html>
