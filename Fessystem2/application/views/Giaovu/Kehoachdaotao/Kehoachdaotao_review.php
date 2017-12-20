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
    <?php if ($this->input->get('loi') !== null) { ?>
    <div id="alert_fail" class="center">
      <h4 style="color:Red;">Có dữ liệu bên dưới chưa được khai báo, vui lòng xác định lại dữ liệu</h4>
    </div>
    <?php } ?>
    <?php if ($this->input->get('dulieurong') !== null) { ?>
    <div id="alert_fail" class="center">
      <h4 style="color:Red;">Có Dữ Liệu Trong Excel Bị Rỗng. Vui Lòng Xem Lại Dữ Liệu</h4>
    </div>
    <?php } ?>
    <?php if (isset($listreview)) {
      $check1 = false;
      $check2 = false;
      $check3 = false;
      for ($i = 0; $i < count($listreview); $i++){
        if ($listreview[$i]['nganhhoc_id'] == 'null' || $listreview[$i]['monhoc_id'] == 'null' || $listreview[$i]['hocki_id'] == 'null' || $listreview[$i]['TenMH'] == 'null') {
          $check1 = true;
        }
        if ($listreview[$i]['monmoi'] == 1 && $listreview[$i]['nganhhoc_id'] != 'null' && $listreview[$i]['monhoc_id'] != 'null' && $listreview[$i]['hocki_id'] != 'null' && $listreview[$i]['TenMH'] != 'null') {
           $check2 = true;
        }
        if ($listreview[$i]['nganhhoc_id'] != 'null' && $listreview[$i]['monhoc_id'] != 'null' && $listreview[$i]['hocki_id'] != 'null' && $listreview[$i]['monmoi'] == 0 && $listreview[$i]['TenMH'] != 'null') {
           $check3 = true;
         } 
    } } ?>
    <?php if ($check1 == true) { ?>
      <div  class="left">
            <h5 style="color:Red;">Màu Đỏ: Dữ Liệu Môn Học, Ngành Học Hoặc Học Kì Trong Excel Bị Trống Vui Lòng Kiểm Tra Lại Dữ Liệu. Không Thể Thêm Bất Cứ Dòng Nào Vào Cơ Sở Dữ Liệu Khi Nhấn "Chấp Nhận"</h5>
          </div>
    <?php } ?>
    <?php if ($check2 == true) { ?>
      <div  class="left">
            <h5 style="color:Green;">Màu Xanh: Dữ Liệu Môn Học Mới Chưa Được ĐỊnh Nghĩa Trong Cơ Sở Dữ Liệu. Khi "Chấp Nhận" Vẫn Sẽ Thêm Vào Cơ Sỡ Dữ Liệu </h5>
          </div>
    <?php } ?>
    <?php if ($check3 == true) { ?>
      <div  class="left">
            <h5 style="color:Black;">Màu Đen: Dữ Liệu Đúng</h5>
          </div>
    <?php } ?>

    <div class="container-fluid" style="margin-top:10px; margin-bottom:10px">
        <div class="row">
            <div class="col-xs-12">
                Kế Hoạch Đào Tạo Ngành: <strong><?php if(@$listreview == null){ echo "";}else{echo @$listreview[0]['tennganh'];}?></strong>
            </div>

        </div>
        <div class="row">
            <div class="col-xs-10">
                Kế Hoạch Đào Tạo Khóa: <strong><?php if(@$listreview == null){ echo "";} else{echo @$listreview[0]['tenkhoa'];}?></strong>
            </div>
            <div class="col-xs-1">
              <a id="Chapnhan_review" >Chấp nhận</a>
            </div>
            <div class="col-xs-1">
              <a href="<?php echo base_url('Giaovu/Kehoachdaotao/cancel_sp')?>">Hủy bỏ</a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <span>Tổng số MÔN của chương trình: <strong><?php echo @count($listreview);?> môn</strong></span>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <span>Tổng số DVHT của chương trình:
                  <strong>
                      <?php
                      if(@$listreview){
                      $tong = 0; foreach ($listreview as $keyval => $value)
                    {
                      $tong = $tong+ $listreview[$keyval]['dvht_tc'];
                    }
                    echo $tong;
                      }
                    ?>
                  </strong>
                </span>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center" style="width:40px">STT</th>
                    <th class="text-center" style="width:100px;">Mã học phần</th>
                    <th class="text-center" style="width:auto">Tên học phần</th>
                    <th class="text-center" style="width:80px">Số DVHT</th>
                    <th class="text-center" style="width:80px">Tổng Số</th>
                    <th class="text-center" style="width:80px">Lý Thuyết</th>
                    <th class="text-center" style="width:80px">Thực Hành</th>
                    <th class="text-center" style="width:80px">Bài Tập</th>
                    <th class="text-center" style="width:80px">Bài Tập Lớn</th>
                    <th class="text-center" style="width:80px">Đồ Án</th>
                    <th class="text-center" style="width:80px">Khóa Luận</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="hitec-td-2" colspan="12">
                        <strong>Học Kì 1</strong>
                    </td>
                </tr>
                <?php
                    @$list = $listreview;
                    for ($i = 0; $i < count($list); $i++){
                        if($list[$i]['hocki_id'] == 1){
                ?>
                <tr style="<?php if($list[$i]['monhoc_id'] == 'null' || $list[$i]['TenMH'] == 'null'){echo 'color:red';}elseif($list[$i]['monmoi'] == 1){echo 'color:green';}?>">
                    <td class="hitec-td-1 text-center">
                        <?php echo $i + 1?>
                    </td>
                    <td class="hitec-td-1 text-center">
                        <?php echo $list[$i]['monhoc_id']?>
                    </td>
                    <td class="hitec-td-1 text-center">
                        <?php echo $list[$i]['TenMH']?>
                    </td>
                    <td class="hitec-td-1 text-center">
                        <?php echo $list[$i]['dvht_tc']?>
                    </td>
                    <td class="hitec-td-1 text-center">
                        <?php echo $list[$i]['tongso']?>
                    </td>
                    <td class="hitec-td-1 text-center">
                        <?php echo $list[$i]['lythuyet']?>
                    </td>
                    <td class="hitec-td-1 text-center">
                        <?php echo $list[$i]['thuchanh']?>
                    </td>
                    <td class="hitec-td-1 text-center">
                        <?php echo $list[$i]['baitap']?>
                    </td>
                    <td class="hitec-td-1 text-center">
                        <?php echo $list[$i]['baitaplon']?>
                    </td>
                    <td class="hitec-td-1 text-center">
                          <?php echo $list[$i]['doAn']?>
                    </td>
                    <td class="hitec-td-1 text-center">
                          <?php echo $list[$i]['khoaluan']?>
                    </td>
                </tr>
              <?php } } ?>
                <tr>
                    <td class="hitec-td-2" colspan="12">
                        <strong>Học Kì 2</strong>
                    </td>
                </tr>
                <?php
                    for ($i = 0; $i < count($list); $i++){
                        if($list[$i]['hocki_id'] == 2){
                ?>
                <tr style="<?php if($list[$i]['monhoc_id'] == 'null' || $list[$i]['TenMH'] == 'null'){echo 'color:red';}elseif($list[$i]['monmoi'] == 1){echo 'color:green';}?>">
                  <td class="hitec-td-1 text-center">
                      <?php echo $i + 1?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['monhoc_id']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['TenMH']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['dvht_tc']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['tongso']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['lythuyet']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['thuchanh']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['baitap']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['baitaplon']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                        <?php echo $list[$i]['doAn']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                        <?php echo $list[$i]['khoaluan']?>
                  </td>
                </tr>
                <?php } }?>
                <tr>
                    <td class="hitec-td-2" colspan="12">
                        <strong>Học Kì 3</strong>
                    </td>
                </tr>
                <?php
                    for ($i = 0; $i < count($list); $i++){
                        if($list[$i]['hocki_id'] == 3){
                ?>
                <tr style="<?php if($list[$i]['monhoc_id'] == 'null' || $list[$i]['TenMH'] == 'null'){echo 'color:red';}elseif($list[$i]['monmoi'] == 1){echo 'color:green';}?>">
                  <td class="hitec-td-1 text-center">
                      <?php echo $i + 1?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['monhoc_id']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['TenMH']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['dvht_tc']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['tongso']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['lythuyet']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['thuchanh']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['baitap']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['baitaplon']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                        <?php echo $list[$i]['doAn']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                        <?php echo $list[$i]['khoaluan']?>
                  </td>
                </tr>
                <?php } }?>
                <tr >
                    <td class="hitec-td-2" colspan="12">
                        <strong>Học Kì 4</strong>
                    </td>
                </tr>
                <?php
                    for ($i = 0; $i < count($list); $i++){
                        if($list[$i]['hocki_id'] == 4){
                ?>
                <tr style="<?php if($list[$i]['monhoc_id'] == 'null' || $list[$i]['TenMH'] == 'null'){echo 'color:red';}elseif($list[$i]['monmoi'] == 1){echo 'color:green';}?>">
                  <td class="hitec-td-1 text-center">
                      <?php echo $i + 1?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['monhoc_id']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['TenMH']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['dvht_tc']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['tongso']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['lythuyet']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['thuchanh']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['baitap']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['baitaplon']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                        <?php echo $list[$i]['doAn']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                        <?php echo $list[$i]['khoaluan']?>
                  </td>
                </tr>
                <?php } }?>
                <tr>
                    <td class="hitec-td-2" colspan="12">
                        <strong>Học Kì 5</strong>
                    </td>
                </tr>
                <?php
                    for ($i = 0; $i < count($list); $i++){
                        if($list[$i]['hocki_id'] == 5){
                ?>
                <tr style="<?php if($list[$i]['monhoc_id'] == 'null' || $list[$i]['TenMH'] == 'null'){echo 'color:red';}elseif($list[$i]['monmoi'] == 1){echo 'color:green';}?>">
                  <td class="hitec-td-1 text-center">
                      <?php echo $i + 1?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['monhoc_id']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['TenMH']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['dvht_tc']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['tongso']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['lythuyet']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['thuchanh']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['baitap']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['baitaplon']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                        <?php echo $list[$i]['doAn']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                        <?php echo $list[$i]['khoaluan']?>
                  </td>
                </tr>
                <?php } }?>
                <tr>
                    <td class="hitec-td-2" colspan="12">
                        <strong>Học Kì 6</strong>
                    </td>
                </tr>
                <?php
                    for ($i = 0; $i < count($list); $i++){
                        if($list[$i]['hocki_id'] == 6){
                ?>
                <tr style="<?php if($list[$i]['monhoc_id'] == 'null' || $list[$i]['TenMH'] == 'null'){echo 'color:red';}elseif($list[$i]['monmoi'] == 1){echo 'color:green';}?>">
                  <td class="hitec-td-1 text-center">
                      <?php echo $i + 1?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['monhoc_id']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['TenMH']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['dvht_tc']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['tongso']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['lythuyet']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['thuchanh']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['baitap']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['baitaplon']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                        <?php echo $list[$i]['doAn']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                        <?php echo $list[$i]['khoaluan']?>
                  </td>
                </tr>
                <?php } }?>
                <tr>
                    <td class="hitec-td-2" colspan="12">
                        <strong>Học Kì 7</strong>
                    </td>
                </tr>
                <?php
                    for ($i = 0; $i < count($list); $i++){
                        if($list[$i]['hocki_id'] == 7){
                ?>
                <tr style="<?php if($list[$i]['monhoc_id'] == 'null' || $list[$i]['TenMH'] == 'null'){echo 'color:red';}elseif($list[$i]['monmoi'] == 1){echo 'color:green';}?>">
                  <td class="hitec-td-1 text-center">
                      <?php echo $i + 1?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['monhoc_id']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['TenMH']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['dvht_tc']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['tongso']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['lythuyet']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['thuchanh']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['baitap']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['baitaplon']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                        <?php echo $list[$i]['doAn']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                        <?php echo $list[$i]['khoaluan']?>
                  </td>
                </tr>
                <?php } }?>
                <tr>
                    <td class="hitec-td-2" colspan="12">
                        <strong>Học Kì 8</strong>
                    </td>
                </tr>
                <?php
                    for ($i = 0; $i < count($list); $i++){
                        if($list[$i]['hocki_id'] == 8){
                ?>
                <tr style="<?php if($list[$i]['monhoc_id'] == 'null' || $list[$i]['TenMH'] == 'null'){echo 'color:red';}elseif($list[$i]['monmoi'] == 1){echo 'color:green';}?>">
                  <td class="hitec-td-1 text-center">
                      <?php echo $i + 1?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['monhoc_id']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['TenMH']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['dvht_tc']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['tongso']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['lythuyet']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['thuchanh']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['baitap']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                      <?php echo $list[$i]['baitaplon']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                        <?php echo $list[$i]['doAn']?>
                  </td>
                  <td class="hitec-td-1 text-center">
                        <?php echo $list[$i]['khoaluan']?>
                  </td>
                </tr>
                <?php } }?>
            </tbody>
        </table>
    </div>
    <div class="clear"></div>
    <script src="<?php echo base_url('public/js/jquery-3.2.1.min.js')?>"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#Chapnhan_review').on('click', function() {
                $.ajax({
                	url:"<?php echo base_url('Giaovu/Kehoachdaotao/run_sp')?>",
                	type: "POST",
                	dataType: 'json',
                  async:false,
                	success: function(data){
                		if (data.check == true) {
                			setTimeout(function(){window.location = "<?php echo base_url('Giaovu/Kehoachdaotao/index') ?>"},2500);
                			$('#alert_success').prop('hidden',false);
                		}
                		else if (data.check == false) {
                			window.location = "<?php echo base_url('Giaovu/Kehoachdaotao/review_khdt?loi=1') ?>";
                		}
                    else if (data.dulieurong == false) {
                			window.location = "<?php echo base_url('Giaovu/Kehoachdaotao/review_khdt?dulieurong=1') ?>";
                		}
                	}
                });
        });
    });
    </script>
  </body>
</html>
