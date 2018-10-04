<?php 
  $path = '../';
  require_once $path.$path.'assets/commons/utils.php';
  $sqlSlide = 'select * from slideshows order by order_number';
  $slide = getSimpleQuery($sqlSlide,true);
?>
<!DOCTYPE html>
<html>
<head>
  <?php 
  include $path.'_share/style_assets.php';
  ?>
  <title>AdminLTE 2 | Sản phẩm</title>
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
            <table class="table table-bordered">
              <tbody><tr>
                <th style="width: 10px">#</th>
                <th width="300px">Ảnh</th>
                <th width="300px">Mô tả</th>
                <th>Đường dẫn</th>
                <th>Trạng thái</th>
                <th>Thứ tự</th>
                <th style="width: 120px">
                  <a href="<?= $adminUrl?>slideshow/add.php"
                    class="btn btn-xs btn-success">
                    Thêm
                  </a>
                </th>
              </tr>
              <?php foreach ($slide as $slide): ?>
                <tr>
                  <td><?php echo $slide['id'] ?></td>
                  <td><img src="<?php echo $siteUrl . $slide['image']?>" class='img-thumbnail' width=300px></td>
                  <td><?php echo $slide['desc'] ?></td>
                  <td><?php echo $slide['url'] ?></td>
                  <td>
                    <span><?php 
                      if ($slide['status']==1) {
                          ?>
                          <span class="text-danger text-lg"><?php echo "Hiển thị" ?></span>
                          <a href="<?= $adminUrl?>slideshow/update-status.php?id=<?= $slide['id']?>&stt=<?= $slide['status']?>"
                            class="btn btn-xs">
                            Click để Ẩn
                          </a>
                          <?php
                      }
                      else if ($slide['status']==0) {
                          ?>
                          <span class="text-secondary text-lg"><?php echo "Bị ẩn" ?></span>
                          <a href="<?= $adminUrl?>slideshow/update-status.php?id=<?= $slide['id']?>&stt=<?= $slide['status']?>"
                            class="btn btn-xs btn-warning">
                            Click để Hiện
                          </a> 
                          <?php
                      }
                      else {
                          echo "Không xác định";
                      }
                    ?>
                    </span>
                    
                                         
                   </td>
                  <td><?php echo $slide['order_number'] ?></td>
                  <td>
                    <a href="<?= $adminUrl?>slideshow/edit.php?id=<?= $slide['id']?>"
                      class="btn btn-xs btn-info">
                      Chỉnh sửa
                    </a>
                    <a href="javascript:void(0)" linkurl="<?= $adminUrl?>slideshow/remove.php?id=<?= $slide['id']?>"
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
      if (isset($_GET['success']) && $_GET['success'] == true) {
        ?>
          alert('Tạo mới slide thành công');
        <?php
      }
    ?>
    $('.btn-remove').on('click',function() {
      var conf = confirm("Bạn có xác nhận muốn xóa slide này hay không?");
      if (conf) {
        window.location.href = $(this).attr('linkurl');
      }
    })
  </script>
</body>
</html>
