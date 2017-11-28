<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php $this->load->view('Giaovu/head'); ?>
    <title></title>
  </head>
  <body>
    <div hidden="hidden"id="alert_success" class="center">
      <h4 style="color:Green;">Thêm Thành Công</h4>
    </div>
    <div hidden="hidden"id="alert_fail" class="center">
      <h4 style="color:Red;">Những dữ liệu bên dưới chưa được khai báo, vui lòng xác định lại dữ liệu</h4>
    </div>
    <div class="container-fluid" style="margin-top:10px; margin-bottom:10px">

        <div class="row">
            <div class="col-xs-1">
              <a id="Chapnhan_review_KQHT">Chấp nhận</a>
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
                <tr>
                    <td class="hitec-td-1 text-center">
                        <?php echo $i + 1?>
                    </td>
                    <td class="hitec-td-1 text-center">
                        <a href="javascript:;">
                        <?php echo $list[$i]['sinhvien_id']?>
                        </a>
                    </td>
                    <td class="hitec-td-1 text-center">
                        <a href="javascript:;">
                        <?php echo $list[$i]['ho'].' '.$list[$i]['ten']?>
                        </a>
                    </td>

                    <td class="hitec-td-1 text-center">
                        <a href="javascript:;">
                        <?php echo $list[$i]['ngaysinh']?>
                        </a>
                    </td>
                    <td class="hitec-td-1 text-center">
                        <a href="javascript:;">
                        <?php echo $list[$i]['lophoc_id']?>
                        </a>
                    </td>
                    <td class="hitec-td-1 text-center">
                        <a href="javascript:;">
                        <?php echo $list[$i]['nganhhoc_id']?>
                        </a>
                    </td>
                    <td class="hitec-td-1 text-center">
                        <a href="javascript:;">
                        <?php echo $list[$i]['monhoc_id']?>
                        </a>
                    </td>
                    <td class="hitec-td-1 text-center">
                        <a href="javascript:;">
                        <?php echo $list[$i]['TenMH']?>
                        </a>
                    </td>
                    <td class="hitec-td-1 text-center">
                        <a href="javascript:;">
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
    <?php
        if($this->input->get('modal') == 1){ ?>
          $(document).ready(function() {
                     $(function(){
                         $('#alert_fail').prop('hidden',false);
                     });
                     });
    <?php
        }
    ?>

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
                			window.location = "<?php echo base_url('Giaovu/Ketquahoctap/review_kqht?modal=1') ?>";
                		}
                	}
                });
        });
    });
    </script>
  </body>
</html>
