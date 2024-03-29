<?php
include "head.php";

?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php
    include "Header.php";
    ?>
    <?php
    include "aside.php";
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Quản lý
          <small>Sách</small>
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">


            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Quản lý Sách</h3>
              </div><!-- /.box-header -->

              <div class="box-body">

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Tên</th>
                      <th>Giá</th>
                      <th>Hình ảnh</th>
                      <th>Tác giả</th>
                      <th>Nhà xuất bản</th>
                      <th>Tác vụ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    require '../model/base_model.php';
                    $model = new Base_Model();
                    $result = $model->selectAll('sanpham');
                    if ($result) {
                      // output data of each row
                      foreach ($result as $row) {
                    ?>
                        <tr>
                          <td><a href="chitiet-sanpham.php?id=<?php echo $row["ID"] ?>" style="color:black"><?php echo $row["Ten"] ?></a></td>
                          <td><?php echo $row["Gia"] ?></td>
                          <td><img src="../images/<?php echo $row["HinhAnh"] ?>" style="width:100px;height:100px"></td>
                          <td><?php echo $row["tacgia"] ?></td>
                          <td><?= $model->selectWhereOne('nhaxuatban','ID',$row["Manhasx"])['Ten']  ?></td>
                          <td><a class="btn btn-primary" href="sua-sanpham.php?id=<?php echo $row["ID"] ?>">
                              <i class="fa fa-edit fa-lg" <acronym title="Chỉnh sửa"></acronym></i>
                            </a>
                            <a class="btn btn-danger" onclick="return confirm('Bạn có thật sự muốn xóa không ?');" href="xoa-sanpham.php?id=<?php echo $row["ID"]  ?>" onclick="myFunction()">
                              <i class="fa fa-trash-o fa-lg" <acronym title="Xóa">
                                </acronym></i></a>
                          </td>
                          </td>
                      <?php
                      }
                    }
                      ?>
                  </tbody>
                </table>
                <div style="text-align:left">
                  <a class="btn btn-primary " href="them-sanpham.php">
                    Thêm Sách</a>
                </div>
              </div><!-- /.box-body -->


            </div><!-- /.box -->

          </div><!-- /.col -->
        </div><!-- /.row -->
      </section>
      <!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php
    include "footer.php";
    ?>
    <?php
    include "ControlSidebar.php";
    ?>
    <!-- Control Sidebar -->

    <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div><!-- ./wrapper -->

  <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="plugins/fastclick/fastclick.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/app.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- page script -->
  <script>
    $(function() {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });
  </script>
  <script>
    function myFunction() {
      alert("Xóa thành công");
    }
  </script>
</body>

</html>