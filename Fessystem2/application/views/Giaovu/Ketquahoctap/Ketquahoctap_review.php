<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php $this->load->view('Giaovu/head'); ?>
    <title></title>
  </head>
  <body>
    <div hidden="hidden" id="alert_success" class="center">
      <h4 style="color:Green;">Thêm Thành Công</h4>
    </div>
    <div hidden="hidden" id="alert_fail" class="center">
      <h4 style="color:Red;">Những dữ liệu bên dưới chưa được khai báo, vui lòng xác định lại dữ liệu</h4>
    </div>
    <?php if ($this->input->get('loi') !== null) { ?>
    <div id="alert_fail" class="center">
      <h4 style="color:Red;">Có dữ liệu bên dưới chưa được khai báo, vui lòng xác định lại dữ liệu</h4>
    </div>
    <?php } ?>
    <?php if ($this->input->get('dulieurong') !== null) { ?>
    <div id="alert_fail" class="center">
      <h4 style="color:Red;">Có Dữ Liệu Bị Rỗng. Vui Lòng Xem Lại Dữ Liệu</h4>
    </div>
    <?php } ?>
    <?php if (isset($listreview)) {
      $check1 = false;
      $check2 = false;
      $check3 = false;
      for ($i = 0; $i < count($listreview); $i++){
        if ($listreview[$i]['monhoc_id'] == 'null' || $listreview[$i]['nganhhoc_id'] == 'null' || $listreview[$i]['sinhvien_id'] == 'null' || $listreview[$i]['lophoc_id'] == 'null' || $listreview[$i]['nganhmoi'] == 1 || $listreview[$i]['monmoi'] == 1 || $listreview[$i]['svmoi'] == 1) {
            $check1 = true;
          }
          if($listreview[$i]['lopmoi'] == 1 && $listreview[$i]['monhoc_id'] != 'null' && $listreview[$i]['nganhhoc_id'] != 'null' && $listreview[$i]['sinhvien_id'] != 'null' && $listreview[$i]['lophoc_id'] != 'null' && $listreview[$i]['nganhmoi'] == 0 && $listreview[$i]['monmoi'] == 0 && $listreview[$i]['svmoi'] == 0) {
            $check2 = true;
         }
         if($listreview[$i]['monhoc_id'] != 'null' && $listreview[$i]['nganhhoc_id'] != 'null' && $listreview[$i]['sinhvien_id'] != 'null' && $listreview[$i]['lophoc_id'] != 'null' && $listreview[$i]['nganhmoi'] == 0 && $listreview[$i]['monmoi'] == 0 && $listreview[$i]['lopmoi'] == 0 && $listreview[$i]['svmoi'] == 0) {
            $check3 = true;
          } 
             } } ?>
             <?php if ($check1 == true) {?>
                <div  class="left">
            <h5 style="color:Red;">Màu Đỏ: Dữ Liệu Mã Môn Học, Mã Ngành Học Hoặc MSSV Trong Excel Bị Trống Hoặc Chưa Được Định Nghĩa Trong Hệ Thống Vui Lòng Kiểm Tra Lại Dữ Liệu. Không Thể Thêm Bất Cứ Dòng Nào Vào Cơ Sở Dữ Liệu Khi Nhấn "Chấp Nhận"</h5>
            </div>
            <?php } if ($check2 == true) { ?>
            <div  class="left">
                <h5 style="color:Green;">Màu Xanh: Dữ Liệu Lớp Học Mới Chưa Được Định Nghĩa Trong Hệ Thống VUi Lòng Kiểm Tra Lại Dữ Liệu. Khi "Chấp Nhận" Vẫn Sẽ Thêm Vào Cơ Sỡ Dữ Liệu</h5>
            </div>
            <?php } if ($check3 == true) { ?>
                <div  class="left">
                <h5 style="color:Black;">Màu Đen: Dữ Liệu Đúng</h5>
            </div>
            <?php } ?>
    <div class="container-fluid" style="margin-top:10px; margin-bottom:10px">

        <div class="row">
            <div class="col-xs-1">
              <a onclick="loader()" id="Chapnhan_review_KQHT">Chấp nhận</a>
            </div>
            <div class="col-xs-1">
              <a href="<?php echo base_url('Giaovu/Ketquahoctap/cancel_sp')?>">Hủy bỏ</a>
            </div>
        </div>


    </div>
    <div class="container-fluid">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center" style="width:40px">STT</th>
                    <th class="text-center" style="width:120px;">Mã SV</th>
                    <th class="text-center" style="width:auto;">Họ Tên</th>

                    <th class="text-center" style="width:120px">Ngày Sinh</th>
                    <th class="text-center" style="width:120px">Lớp</th>
                    <th class="text-center" style="width:120px">Mã Ngành</th>
                    <th class="text-center" style="width:120px">Mã Môn Học</th>
                    <th class="text-center" style="width:120px">Tên Môn Học</th>
                    <th class="text-center" style="width:120px">ĐTB</th>

                </tr>
            </thead>
            <tbody>

                <?php

                    @$list = $listreview;
                    // pre($list);
                    for ($i = 0; $i < count($list); $i++){
                ?>
                <tr style="<?php if($list[$i]['monhoc_id'] == 'null' || $list[$i]['nganhhoc_id'] == 'null' || $list[$i]['sinhvien_id'] == 'null' || $list[$i]['TenMH'] == 'null' || $list[$i]['nganhmoi'] == 1 || $list[$i]['monmoi'] == 1 || $list[$i]['svmoi'] == 1){echo 'color:red';}elseif($list[$i]['lopmoi'] == 1){echo 'color:green';}?>">
                    <td class="hitec-td-1 text-center">
                        <?php echo $i + 1?>
                    </td>
                    <td class="hitec-td-1 text-center">
                        <?php echo $list[$i]['sinhvien_id']?>
                        </a>
                    </td>
                    <td class="hitec-td-1 text-center">
                        <?php echo $list[$i]['ho'].' '.$list[$i]['ten']?>
                        </a>
                    </td>

                    <td class="hitec-td-1 text-center">
                        <?php echo $list[$i]['ngaysinh']?>
                        </a>
                    </td>
                    <td class="hitec-td-1 text-center">
                        <?php echo $list[$i]['lophoc_id']?>
                        </a>
                    </td>
                    <td class="hitec-td-1 text-center">
                        <?php echo $list[$i]['nganhhoc_id']?>
                        </a>
                    </td>
                    <td class="hitec-td-1 text-center">
                        <?php echo $list[$i]['monhoc_id']?>
                        </a>
                    </td>
                    <td class="hitec-td-1 text-center">
                        <?php echo $list[$i]['TenMH']?>
                        </a>
                    </td>
                    <td class="hitec-td-1 text-center">
                          <?php echo $list[$i]['diemTB']?>
                        </a>
                    </td>
                </tr>
                <?php  }?>
            </tbody>
        </table>
    </div>
    <div class="clear"></div>
    <script src="<?php echo base_url('public/js/jquery-3.2.1.min.js')?>"></script>
    <script type="text/javascript">

    $(document).ready(function() {
        $('#Chapnhan_review_KQHT').on('click', function() {
                $.ajax({
                	url:"<?php echo base_url('Giaovu/Ketquahoctap/run_sp')?>",
                	type: "POST",
                	dataType: 'json',
                  async:false,
                	success: function(data){

                		if (data.check == true) {

                            setTimeout(function(){window.location = "<?php echo base_url('Giaovu/Ketquahoctap/index') ?>"},2500);
                            $('#alert_success').prop('hidden',false);
                		}
                		if (data.check == false) {
                            window.location = "<?php echo base_url('Giaovu/Ketquahoctap/review_kqht?loi=1') ?>";
                            $('#loader_review_kqht').hide();
                        }
                        if (data.dulieurong == true) {
                            window.location = "<?php echo base_url('Giaovu/Ketquahoctap/review_kqht?dulieurong=1') ?>";
                            $('#loader_review_kqht').hide();
                        }
                	}
                });
        });
    });
    </script>
  </body>
</html>
