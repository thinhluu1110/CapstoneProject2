<div class="main-content-inner">
    <div class="page-content">
        <img id="ajax-loader" src="http://aspnet.demo.hueuni.edu.vn/StudentManager/images/ajax-loader.gif" alt="" />
        <div class="page-header">

        <div class="hitec-content">
            <h2>TRA CỨU KẾ HOẠCH ĐÀO TẠO</h2>
            <div class="container-fluid">
                <form method="get" action="<?php echo base_url('Sinhvien/Kehoachdaotao/index')?>" id="formSearch" role="form" onsubmit="return true;">
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="input-group hitec-w-100percent">
                                <select class="form-control" id="Hocki" name="Hocki" onchange='if(this.value != 0) { this.form.submit(); }'>
                                    <option value="">--- Chọn Học Kỳ ---</option>
                                    <option value="123">Tất Cả Học Kì</option>
                                    <?php foreach ($listhocki as $row):?>
                                        <option value="<?php echo $row['hocki_id'] ?>" <?php echo ($this->input->get('Hocki') == $row['hocki_id']) ? 'selected' : ''?> ><?php echo $row['tenHocki'] ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>

            <div id="searchResult" style="margin-top:5px;">
                <!-- Layout dùng cho các view dạng một phần nội dung trong trang web -->
                <!-- <div class="container-fluid text-right">
                    <a href="javascript:void(0)"  title="Import excel" data-toggle="modal" data-target="#dialogImport">[Import Data]</a>
                </div> -->
                <div class="container-fluid" style="margin-top:10px; margin-bottom:10px">
                    <div class="row">
                        <div class="col-xs-12">
                            Kế Hoạch Đào Tạo Ngành: <strong><?php if(@$listCTDThk == null){ echo "";}else{echo @$listCTDThk[0]['tennganh'];}?></strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            Kế Hoạch Đào Tạo Khóa: <strong><?php if(@$listCTDThk == null){ echo "";} else{echo @$listCTDThk[0]['tenkhoa'];}?></strong>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <span>Tổng số MÔN của chương trình: <strong><?php echo @count($listCTDThk);?> môn</strong></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <span>Tổng số DVHT của chương trình:
                              <strong>
                                  <?php
                                  if(@$listCTDThk){
                                  $tong = 0; foreach ($listCTDThk as $keyval => $value)
                                {
                                  $tong = $tong+ $listCTDThk[$keyval]['dvht_tc'];
                                }
                                echo $tong;
                                  }
                                ?>
                              </strong>
                            </span>
                        </div>
                    </div>
                    <div class="col-xs-12 text-right">
                            <a href="<?php echo base_url('Sinhvien/Chuongtrinhdaotao/index/'.$this->session->userdata('nganhhoc_id').'/'.$this->session->userdata('khoahoc_id')); ?>"><u>Tải Về Chương Trình Đào Tạo</u></a>
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
                                <!-- <th class="text-center" style="width:80px">
                                    <a href="javascript:void(0)" class="btn-sm btn-success" title="Thêm" data-toggle="modal" data-target="#dialogAdd">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php for($j=0; $j < count($listCTDT); $j++) { 
                                if ($listCTDT[$j]['hocki_id'] ==1) {
                            ?>
                            <tr>
                                <td class="hitec-td-2" colspan="12">
                                    <strong>Học Kì 1:</strong>
                                </td>
                            </tr>
                            <?php break;} } ?>
                            <?php

                                @$list = $listCTDT;
                                // pre($list);
                                for ($i = 0; $i < count($list); $i++){
                                    if ($list[$i]['hocki_id'] == 1) {
                            ?>
                            <tr>
                                <td class="hitec-td-1 text-center">
                                    <?php echo $i + 1?>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['MaMH']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-left">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['TenMH']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <?php echo $list[$i]['dvht_tc']?>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['tongso']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['lythuyet']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['thuchanh']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['baitap']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['baitaplon']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                      <?php echo $list[$i]['doAn']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                      <?php echo $list[$i]['khoaluan']?>
                                    </a>
                                </td>

                            </tr>
                          <?php } } ?>
                            <?php for($j=0; $j < count($listCTDT); $j++) { 
                                if ($listCTDT[$j]['hocki_id'] ==2) {
                            ?>
                            <tr>
                                <td class="hitec-td-2" colspan="12">
                                    <strong>Học Kì 2:</strong>
                                </td>
                            </tr>
                            <?php break;} } ?>
                            <?php

                                @$list = $listCTDT;
                                // pre($list);
                                for ($i = 0; $i < count($list); $i++){
                                    if ($list[$i]['hocki_id'] == 2) {
                            ?>
                            <tr>
                                <td class="hitec-td-1 text-center">
                                    <?php echo $i + 1?>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['MaMH']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-left">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['TenMH']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <?php echo $list[$i]['dvht_tc']?>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['tongso']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['lythuyet']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['thuchanh']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['baitap']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['baitaplon']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                      <?php echo $list[$i]['doAn']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                      <?php echo $list[$i]['khoaluan']?>
                                    </a>
                                </td>

                            </tr>
                          <?php } } ?>
                          <?php for($j=0; $j < count($listCTDT); $j++) { 
                                if ($listCTDT[$j]['hocki_id'] ==3) {
                            ?>
                            <tr>
                                <td class="hitec-td-2" colspan="12">
                                    <strong>Học Kì 3:</strong>
                                </td>
                            </tr>
                            <?php break;} } ?>
                            <?php

                                @$list = $listCTDT;
                                // pre($list);
                                for ($i = 0; $i < count($list); $i++){
                                    if ($list[$i]['hocki_id'] == 3) {
                            ?>
                            <tr>
                                <td class="hitec-td-1 text-center">
                                    <?php echo $i + 1?>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['MaMH']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-left">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['TenMH']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <?php echo $list[$i]['dvht_tc']?>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['tongso']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['lythuyet']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['thuchanh']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['baitap']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['baitaplon']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                      <?php echo $list[$i]['doAn']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                      <?php echo $list[$i]['khoaluan']?>
                                    </a>
                                </td>

                            </tr>
                          <?php } } ?>
                          <?php for($j=0; $j < count($listCTDT); $j++) { 
                                if ($listCTDT[$j]['hocki_id'] ==4) {
                            ?>
                            <tr>
                                <td class="hitec-td-2" colspan="12">
                                    <strong>Học Kì 4:</strong>
                                </td>
                            </tr>
                            <?php break;} } ?>
                            <?php

                                @$list = $listCTDT;
                                // pre($list);
                                for ($i = 0; $i < count($list); $i++){
                                    if ($list[$i]['hocki_id'] == 4) {
                            ?>
                            <tr>
                                <td class="hitec-td-1 text-center">
                                    <?php echo $i + 1?>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['MaMH']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-left">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['TenMH']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <?php echo $list[$i]['dvht_tc']?>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['tongso']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['lythuyet']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['thuchanh']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['baitap']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['baitaplon']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                      <?php echo $list[$i]['doAn']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                      <?php echo $list[$i]['khoaluan']?>
                                    </a>
                                </td>

                            </tr>
                          <?php } } ?>
                          <?php for($j=0; $j < count($listCTDT); $j++) { 
                                if ($listCTDT[$j]['hocki_id'] ==5) {
                            ?>
                            <tr>
                                <td class="hitec-td-2" colspan="12">
                                    <strong>Học Kì 5:</strong>
                                </td>
                            </tr>
                            <?php break;} } ?>
                            <?php

                                @$list = $listCTDT;
                                // pre($list);
                                for ($i = 0; $i < count($list); $i++){
                                    if ($list[$i]['hocki_id'] == 5) {
                            ?>
                            <tr>
                                <td class="hitec-td-1 text-center">
                                    <?php echo $i + 1?>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['MaMH']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-left">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['TenMH']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <?php echo $list[$i]['dvht_tc']?>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['tongso']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['lythuyet']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['thuchanh']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['baitap']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['baitaplon']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                      <?php echo $list[$i]['doAn']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                      <?php echo $list[$i]['khoaluan']?>
                                    </a>
                                </td>

                            </tr>
                          <?php } } ?>
                          <?php for($j=0; $j < count($listCTDT); $j++) { 
                                if ($listCTDT[$j]['hocki_id'] ==6) {
                            ?>
                            <tr>
                                <td class="hitec-td-2" colspan="12">
                                    <strong>Học Kì 6:</strong>
                                </td>
                            </tr>
                            <?php break;} } ?>
                            <?php

                                @$list = $listCTDT;
                                // pre($list);
                                for ($i = 0; $i < count($list); $i++){
                                    if ($list[$i]['hocki_id'] == 6) {
                            ?>
                            <tr>
                                <td class="hitec-td-1 text-center">
                                    <?php echo $i + 1?>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['MaMH']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-left">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['TenMH']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <?php echo $list[$i]['dvht_tc']?>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['tongso']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['lythuyet']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['thuchanh']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['baitap']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['baitaplon']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                      <?php echo $list[$i]['doAn']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                      <?php echo $list[$i]['khoaluan']?>
                                    </a>
                                </td>

                            </tr>
                          <?php } } ?>
                          <?php for($j=0; $j < count($listCTDT); $j++) { 
                                if ($listCTDT[$j]['hocki_id'] ==7) {
                            ?>
                            <tr>
                                <td class="hitec-td-2" colspan="12">
                                    <strong>Học Kì 7:</strong>
                                </td>
                            </tr>
                            <?php break;} } ?>
                            <?php

                                @$list = $listCTDT;
                                // pre($list);
                                for ($i = 0; $i < count($list); $i++){
                                    if ($list[$i]['hocki_id'] == 7) {
                            ?>
                            <tr>
                                <td class="hitec-td-1 text-center">
                                    <?php echo $i + 1?>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['MaMH']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-left">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['TenMH']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <?php echo $list[$i]['dvht_tc']?>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['tongso']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['lythuyet']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['thuchanh']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['baitap']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['baitaplon']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                      <?php echo $list[$i]['doAn']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                      <?php echo $list[$i]['khoaluan']?>
                                    </a>
                                </td>

                            </tr>
                          <?php } } ?>
                          <?php for($j=0; $j < count($listCTDT); $j++) { 
                                if ($listCTDT[$j]['hocki_id'] ==8) {
                            ?>
                            <tr>
                                <td class="hitec-td-2" colspan="12">
                                    <strong>Học Kì 8:</strong>
                                </td>
                            </tr>
                            <?php break;} } ?>
                            <?php

                                @$list = $listCTDT;
                                // pre($list);
                                for ($i = 0; $i < count($list); $i++){
                                    if ($list[$i]['hocki_id'] == 8) {
                            ?>
                            <tr>
                                <td class="hitec-td-1 text-center">
                                    <?php echo $i + 1?>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['MaMH']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-left">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['TenMH']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <?php echo $list[$i]['dvht_tc']?>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['tongso']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['lythuyet']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['thuchanh']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['baitap']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                    <?php echo $list[$i]['baitaplon']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                      <?php echo $list[$i]['doAn']?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                      <?php echo $list[$i]['khoaluan']?>
                                    </a>
                                </td>

                            </tr>
                          <?php } } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        </div>
    </div>
</div>
