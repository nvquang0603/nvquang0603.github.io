<?php 
session_start();
$path = '../';
require_once $path.$path.'assets/commons/utils.php';

$sqlComment = 'select *, 
                  comments.id as cid 
              from comments 
              inner join products on comments.product_id = products.id 
              order by cid';

$comment = getSimpleQuery($sqlComment,true);

?>
<!DOCTYPE html>
<html>
<head>
  <?php 
  include $path.'_share/style_assets.php';
  ?>
  <title>AdminLTE 2 | Bình luận</title>
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
            <h3 class="box-title">Quản lý bình luận</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="commentTable" class="display table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Cho sản phẩm</th>
                  <th>Email</th>
                  <th style="width: 240px">Nội dung</th>
                  <th></th>
                </tr>
              </thead>
            </table>
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
      $(document).ready(function() {
        var dataTable = $('#commentTable').DataTable({
          "processing": true,
          "serverSide": true,
          "pagingType": "full_numbers",
          "ajax": {
            "url":"server_processing.php"
          },
          "bStateSave": true,
          "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Tất cả"]]
        })
      });
  </script>
  <script type="text/javascript">
    $( document ).ajaxComplete(function() {
      $('.btn-remove').click(function() {
        swal({
          title: "Bạn có muốn xóa sản phẩm này không?",
          text: "Một khi đã xóa. Sản phẩm sẽ không thể quay lại",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location.href = $(this).attr('linkurl');
            swal("Đang xóa", {
              icon: "success",
            });
          } 
          else {
            swal("Bạn đã hủy việc xóa sản phẩm");
          }
        });
      })
    });
  </script>
</body>
</html>
