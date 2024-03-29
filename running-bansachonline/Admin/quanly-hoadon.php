<?php
include "head.php";
?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php
    include "Header.php";
    include "aside.php";
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Quản lý
          <small>hóa đơn</small>
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Quản lý hóa đơn</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Số đơn hàng</th>
                      <th>Tên Sách</th>
                      <th>Số lượng</th>
                      <th>Đơn giá</th>
                      <th>Thành tiền</th>
                      <th>Ngày giao hàng</th>
                      <th>Dịch vụ</th>
                      <th>Trạng thái</th>
                      <th>Tiến trình</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    require '../model/base_model.php';
                    require '../model/quanlyhoadon_model.php';
                    $quanlyhoadon = new Quanlyhoadon();
                    $result = $quanlyhoadon->selectAllHoaDon();
                    if ($result) {
                      foreach($result as $row) {
                    ?>
                        <tr>
                          <td><?php echo $row["sodh"] ?></td>
                          <td><a href="chitiet-hoadon.php?sodh=<?php echo $row["sodh"] ?>" style="color:black"><?php echo $row["tensanpham"] ?></a></td>
                          <td><?php echo $row["soluong"] ?></td>
                          <td><?php echo number_format($row["dongia"], 0, ',', '.') ?> VNĐ</td>
                          <td><?php echo number_format($row["thanhtien"], 0, ',', '.') ?> VNĐ</td>
                          <td><?php echo date("d/m/Y", strtotime($row["ngaygiao"])) ?></td>
                          <td>
                            <?php
                            if (!empty($row["madv"])) {
                              $madv = explode(",", $row["madv"]);
                              foreach ($madv as $ma) {
                                $model = new Base_Model();
                                $result_dv = $model->selectWhereOne("dichvu", "madv", $ma);
                                echo "<p>" . $result_dv["tendv"] . "</p>";
                                if ($result_dv) {
                                  foreach($result_dv as $row_dv) {
                                  }
                                }
                              }
                            }
                            ?>
                          </td>
                          <td><?php echo empty($row['trangthai']) ? "Chưa thanh toán" : $row['trangthai']; ?></td>
                          <td><?php echo empty($row['tientrinh']) ? "Đang xử lý" : $row['tientrinh']; ?></td>
                        </tr>
                    <?php
                      }
                    }
                    ?>
                  </tbody>
                </table>
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

    <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
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
  <script src="dist/js/app.min.js