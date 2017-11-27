<div class="main-content-inner">
                <div class="page-content">
                    <img id="ajax-loader" src="http://aspnet.demo.hueuni.edu.vn/StudentManager/images/ajax-loader.gif" alt="" />
                    <div class="page-header">
<div class="hitec-content">
    <h2>TRA CỨU KẾ HOẠCH ĐÀO TẠO</h2>
    <div class="container-fluid">
            <form method="get" action="<?php echo base_url('Giaovu/Kehoachdaotao/index')?>" id="formSearch" role="form" onsubmit="return true;">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="input-group hitec-w-100percent">
                          <select class="form-control" id="nganhhoc" name="nganhhoc" onchange='if(this.value != 0) { this.form.submit(); }'>
                            <option value="">--- Chọn Ngành Học ---</option>
                            <?php foreach ($listnganhhoc as $row):?>
                            <option value="<?php echo $row->nganhhoc_id ?>" <?php echo ($this->input->get('nganhhoc') == $row->nganhhoc_id) ? 'selected' : '' ?> ><?php echo $row->tennganh ?></option>
                            <?php endforeach;?>
                        </select>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="input-group hitec-w-100percent">
                          <select class="form-control" id="khoahoc" name="khoahoc" onchange='if(this.value != 0) { this.form.submit(); }'>
                            <option value="">--- Chọn Khóa Học ---</option>
                            <?php foreach ($listkhoahoc as $row):?>
                            <option value="<?php echo $row['khoahoc_id'] ?>" <?php echo ($this->input->get('khoahoc') == $row['khoahoc_id']) ? 'selected' : '' ?> ><?php echo $row['tenkhoa'] ?></option>
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
                    Kế Hoạch Đào Tạo Ngành: <strong><?php if(@$listCTDT == null){ echo "";}else{echo @$listCTDT[0]['tennganh'];}?></strong>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    Kế Hoạch Đào Tạo Khóa: <strong><?php if(@$listCTDT == null){ echo "";} else{echo @$listCTDT[0]['tenkhoa'];}?></strong>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <span>Tổng số MÔN của chương trình: <strong><?php echo @count($listCTDT);?> môn</strong></span>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <span>Tổng số DVHT của chương trình:
                      <strong>
                          <?php
                          if(@$listCTDT){
                          $tong = 0; foreach ($listCTDT as $keyval => $value)
                        {
                          $tong = $tong+ $listCTDT[$keyval]['dvht_tc'];
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
                        <?php if ($this->session->userdata('phanquyen') == 1) {?>
                        <th class="text-center" style="width:80px">
                            <a href="javascript:void(0)" class="btn-sm btn-success" title="Thêm" data-toggle="modal" data-target="#dialogAdd">
                                <i class="fa fa-plus"></i>
                            </a>
                        </th>
                      <?php } ?>
                    </tr>
                </thead>
        <div id="reloadKHDT">
                <tbody>
                    <tr>
                        <td class="hitec-td-2" colspan="12">
                            <strong>Học Kì 1</strong>
                        </td>
                    </tr>
                    <?php

                        @$list = $listCTDT;
                        // pre($list);
                        for ($i = 0; $i < count($list); $i++){
                            if($list[$i]['hocki_id'] == 1){
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
                        <td class="hitec-td-1 text-center">
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
                        <?php if ($this->session->userdata('phanquyen') == 1) { ?>
                        <td class="hitec-td-1 text-center text-center">
                            <a class="btn-sm btn-danger delete_Mon_KHDT" id="<?php echo $list[$i]['khdt_id'] ?>"  data-toggle="modal" data-target="#dialogDelete_KHDT" style="margin-right: 4px;">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a class="btn-sm btn-info edit_Mon_KHDT"  id="<?php echo $list[$i]['khdt_id'] ?>" data-toggle="modal" data-target="#dialogEdit_KHDT" style="margin-right: 4px;">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                      <?php } ?>
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
                    <tr>
                        <td class="hitec-td-1 text-center">
                            <?php echo $i + 1?>
                        </td>
                        <td class="hitec-td-1 text-center">
                            <a href="javascript:;">
                            <?php echo $list[$i]['MaMH']?>
                            </a>
                        </td>
                        <td class="hitec-td-1 text-center">
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
                        <?php if ($this->session->userdata('phanquyen') == 1) { ?>
                        <td class="hitec-td-1 text-center text-center">
                          <a class="btn-sm btn-danger delete_Mon_KHDT" id="<?php echo $list[$i]['khdt_id'] ?>"  data-toggle="modal" data-target="#dialogDelete_KHDT" style="margin-right: 4px;">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a class="btn-sm btn-info edit_Mon_KHDT"  id="<?php echo $list[$i]['khdt_id'] ?>" data-toggle="modal" data-target="#dialogEdit_KHDT" style="margin-right: 4px;">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                      <?php } ?>
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
                    <tr>
                        <td class="hitec-td-1 text-center">
                            <?php echo $i + 1?>
                        </td>
                        <td class="hitec-td-1 text-center">
                            <a href="javascript:;">
                            <?php echo $list[$i]['MaMH']?>
                            </a>
                        </td>
                        <td class="hitec-td-1 text-center">
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
                        <?php if ($this->session->userdata('phanquyen') == 1) { ?>
                        <td class="hitec-td-1 text-center text-center">
                          <a class="btn-sm btn-danger delete_Mon_KHDT" id="<?php echo $list[$i]['khdt_id'] ?>"  data-toggle="modal" data-target="#dialogDelete_KHDT" style="margin-right: 4px;">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a class="btn-sm btn-info edit_Mon_KHDT"  id="<?php echo $list[$i]['khdt_id'] ?>" data-toggle="modal" data-target="#dialogEdit_KHDT" style="margin-right: 4px;">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                      <?php } ?>
                    </tr>
                    <?php } }?>
                    <tr>
                        <td class="hitec-td-2" colspan="12">
                            <strong>Học Kì 4</strong>
                        </td>
                    </tr>
                    <?php
                        for ($i = 0; $i < count($list); $i++){
                            if($list[$i]['hocki_id'] == 4){
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
                        <td class="hitec-td-1 text-center">
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
                        <?php if ($this->session->userdata('phanquyen') == 1) { ?>
                        <td class="hitec-td-1 text-center text-center">
                          <a class="btn-sm btn-danger delete_Mon_KHDT" id="<?php echo $list[$i]['khdt_id'] ?>"  data-toggle="modal" data-target="#dialogDelete_KHDT" style="margin-right: 4px;">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a class="btn-sm btn-info edit_Mon_KHDT"  id="<?php echo $list[$i]['khdt_id'] ?>" data-toggle="modal" data-target="#dialogEdit_KHDT" style="margin-right: 4px;">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                      <?php } ?>
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
                    <tr>
                        <td class="hitec-td-1 text-center">
                            <?php echo $i + 1?>
                        </td>
                        <td class="hitec-td-1 text-center">
                            <a href="javascript:;">
                            <?php echo $list[$i]['MaMH']?>
                            </a>
                        </td>
                        <td class="hitec-td-1 text-center">
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
                        <?php if ($this->session->userdata('phanquyen') == 1) { ?>
                        <td class="hitec-td-1 text-center text-center">
                          <a class="btn-sm btn-danger delete_Mon_KHDT" id="<?php echo $list[$i]['khdt_id'] ?>"  data-toggle="modal" data-target="#dialogDelete_KHDT" style="margin-right: 4px;">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a class="btn-sm btn-info edit_Mon_KHDT"  id="<?php echo $list[$i]['khdt_id'] ?>" data-toggle="modal" data-target="#dialogEdit_KHDT" style="margin-right: 4px;">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                      <?php } ?>
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
                    <tr>
                        <td class="hitec-td-1 text-center">
                            <?php echo $i + 1?>
                        </td>
                        <td class="hitec-td-1 text-center">
                            <a href="javascript:;">
                            <?php echo $list[$i]['MaMH']?>
                            </a>
                        </td>
                        <td class="hitec-td-1 text-center">
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
                        <?php if ($this->session->userdata('phanquyen') == 1) { ?>
                        <td class="hitec-td-1 text-center text-center">
                          <a class="btn-sm btn-danger delete_Mon_KHDT" id="<?php echo $list[$i]['khdt_id'] ?>"  data-toggle="modal" data-target="#dialogDelete_KHDT" style="margin-right: 4px;">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a class="btn-sm btn-info edit_Mon_KHDT"  id="<?php echo $list[$i]['khdt_id'] ?>" data-toggle="modal" data-target="#dialogEdit_KHDT" style="margin-right: 4px;">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                      <?php } ?>
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
                    <tr>
                        <td class="hitec-td-1 text-center">
                            <?php echo $i + 1?>
                        </td>
                        <td class="hitec-td-1 text-center">
                            <a href="javascript:;">
                            <?php echo $list[$i]['MaMH']?>
                            </a>
                        </td>
                        <td class="hitec-td-1 text-center">
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
                        <?php if ($this->session->userdata('phanquyen') == 1) { ?>
                        <td class="hitec-td-1 text-center text-center">
                          <a class="btn-sm btn-danger delete_Mon_KHDT" id="<?php echo $list[$i]['khdt_id'] ?>"  data-toggle="modal" data-target="#dialogDelete_KHDT" style="margin-right: 4px;">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a class="btn-sm btn-info edit_Mon_KHDT"  id="<?php echo $list[$i]['khdt_id'] ?>" data-toggle="modal" data-target="#dialogEdit_KHDT" style="margin-right: 4px;">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                      <?php } ?>
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
                    <tr>
                        <td class="hitec-td-1 text-center">
                            <?php echo $i + 1?>
                        </td>
                        <td class="hitec-td-1 text-center">
                            <a href="javascript:;">
                            <?php echo $list[$i]['MaMH']?>
                            </a>
                        </td>
                        <td class="hitec-td-1 text-center">
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
                        <?php if ($this->session->userdata('phanquyen') == 1) { ?>
                        <td class="hitec-td-1 text-center text-center">
                          <a class="btn-sm btn-danger delete_Mon_KHDT" id="<?php echo $list[$i]['khdt_id'] ?>"  data-toggle="modal" data-target="#dialogDelete_KHDT" style="margin-right: 4px;">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a class="btn-sm btn-info edit_Mon_KHDT"  id="<?php echo $list[$i]['khdt_id'] ?>" data-toggle="modal" data-target="#dialogEdit_KHDT" style="margin-right: 4px;">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                      <?php } ?>
                    </tr>
                    <?php } }?>
                </tbody>
              </div>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div id="dialogEdit" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
            <div class="modal-dialog" style="width:800px !important;height:600px !important">
                <div class="modal-content">

                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12">
        <div id="dialogAdd" data-backdrop = "static" data-keyboard = "false" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
            <div class="modal-dialog" style="width:800px !important;height:600px !important">
                <div class="modal-content">
                    <form id="form_add_Khdt" name="frmCreateEmployee" class="form-horizontal" role="form" method="post"ng-submit="UpdateEmployee()"  enctype="multipart/form-data">
                        <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                              <a  onclick="reload()" style="position: absolute;top: 10px;right: 10px;padding: 5px 10px;display: inline-block;">X</a>
                            <h5><strong class="modal-title">Thêm Môn Học Vào Kế Hoạch Đào Tạo</strong></h5>
                        </div>
                        <div hidden="hidden" id="msg-success" class="modal-header add_success" style="padding:0px;text-align:center">
                            <h5><strong class="modal-title"></strong></h5>
                        </div>
                        <div hidden="hidden" id="msg-fail" class="modal-header add_fail" style="padding:0px;text-align:center">
                            <h5><strong class="modal-title"></strong></h5>
                        </div>
                        <div class="modal-body">
                            <div class="row" style="margin:10px">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                   <div class="row">
                                    <div class="form-group col-xs-4 "style="margin-left:5px">
                                        <label class="coltrol-lable">Ngành:</label>
                                        <select class="form-control" id="nganhhocAdd" name="nganhhoc">
                                          <option value="">--- Chọn Ngành Học ---</option>
                                          <?php foreach ($listnganhhoc as $row):?>
                                          <option value="<?php echo $row->nganhhoc_id ?>"><?php echo $row->tennganh ?></option>
                                          <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-4"style="margin-left:10px">
                                        <label class="coltrol-lable">Khóa:</label>
                                        <select class="form-control" id="khoahocAdd" name="khoahoc" disabled = "">
                                            <option value="">--- Chọn Khóa Học ---</option>

                                        </select>
                                    </div>
                                    <div class="form-group col-xs-4"style="margin-left:10px">
                                        <label class="coltrol-lable">Học Kỳ:</label>
                                        <select class="form-control" id="hocki" name="hocki">
                                            <option value="">--- Chọn Học Kì ---</option>
                                            <option value="1">HK 1</option>
                                            <option value="2">HK 2</option>
                                            <option value="3">HK 3</option>
                                            <option value="4">HK 4</option>
                                            <option value="5">HK 5</option>
                                            <option value="6">HK 6</option>
                                            <option value="7">HK 7</option>
                                            <option value="8">HK 8</option>
                                        </select>
                                    </div>
                                  </div>
                                  <div class="row">

                                    <div class="form-group col-xs-4 "style="margin-left:5px">
                                        <label class="coltrol-lable">Môn Học:</label>
                                        <select class="form-control" id="tenmon" name="tenmon">
                                          <option value="">--- Chọn Môn Học ---</option>
                                          <?php foreach ($listmonhoc as $row):?>
                                          <option value="<?php echo $row['monhoc_id'] ?>"><?php echo $row['TenMH'] ?></option>
                                          <?php endforeach;?>
                                        </select>
                                    </div>

                                    <div class="form-group col-xs-4"style="margin-left:10px">
                                        <label class="coltrol-lable">Nhập Số DVHT/Tín Chỉ:</label>
                                        <input class="form-control" id="dvht_tc" name="dvht_tc"  />
                                    </div>
                                    <div class="form-group col-xs-4"style="margin-left:10px">
                                      <label class="coltrol-lable">Tổng số:</label>
                                      <input class="form-control" id="tongso" name="tongso"  />
                                  </div>
                                </div>
                                <div class="row">

                                  <div class="form-group col-xs-4"style="margin-left:5px">
                                      <label class="coltrol-lable">Lý thuyết::</label>
                                      <input class="form-control" id="lythuyet" name="lythuyet"  />
                                  </div>
                                  <div class="form-group col-xs-4"style="margin-left:10px">
                                      <label class="coltrol-lable">Thực hành:</label>
                                      <input class="form-control" id="thuchanh" name="thuchanh"  />
                                  </div>
                                  <div class="form-group col-xs-4"style="margin-left:10px">
                                      <label class="coltrol-lable">Bài tập:</label>
                                      <input class="form-control" id="baitap" name="baitap"  />
                                  </div>
                                </div>
                                  <div class="row">

                                  <div class="form-group col-xs-4"style="margin-left:5px">
                                      <label class="coltrol-lable">Bài tập lớn:</label>
                                      <input class="form-control" id="baitaplon" name="baitaplon"  />
                                  </div>
                                  <div class="form-group col-xs-4"style="margin-left:10px">
                                      <label class="coltrol-lable">Đồ án:</label>
                                      <input class="form-control" id="doan" name="doan"  />
                                  </div>
                                  <div class="form-group col-xs-4"style="margin-left:10px">
                                      <label class="coltrol-lable">Khóa luận:</label>
                                      <input class="form-control" id="khoaluan" name="khoaluan"  />
                                  </div>
                              </div>
                              </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding:0px">
                            <a class="btn btn-sm btn-success col-xs-4" target="_blank" href="<?php echo base_url('Giaovu/Monhoc/index') ?>" > Thêm Môn Học Mới</a>
                            <!-- <input  class="btn btn-sm btn-success" value="Thêm" id="submit_add_KHDT" name="submit"> -->
                            <button type="button" class="btn btn-sm btn-success" id="submit_add_KHDT" name="submit">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div id="dialogEdit_KHDT" data-backdrop = "static" data-keyboard = "false" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
            <div class="modal-dialog" style="width:800px !important;height:600px !important">
                <div class="modal-content">
                    <form id="form_edit_MonKhdt" name="frmCreateEmployee" class="form-horizontal" role="form" method="post" ng-submit="UpdateEmployee()"  enctype="multipart/form-data">
                    <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                        <button onclick="reload()" type="button" class="close" data-dismiss="modal">×</button>
                        <h5><strong class="modal-title">Sửa Môn Học Vào Kế Hoạch Đào Tạo</strong></h5>
                    </div>
                    <div hidden="hidden" id="msg-success-editmon-khdt" class="modal-header add_success" style="padding:0px;text-align:center">
                            <h5><strong class="modal-title"></strong></h5>
                        </div>
                        <div hidden="hidden" id="msg-fail-editmon-khdt" class="modal-header add_fail" style="padding:0px;text-align:center">
                            <h5><strong class="modal-title"></strong></h5>
                        </div>
                    <div class="modal-body">
                        <div class="row" style="margin:10px">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                               <div class="row">
                                 <div class="form-group col-xs-4" style="margin-left:5px">
                                     <label class="coltrol-lable">Ngành:</label>
                                     
                                          <input class="form-control" id="nganhhoc_edit_monkhdt" name="nganhhoc_edit_monkhdt" disabled  />
                                     
                                 </div>
                                  <div hidden class="form-group col-xs-4" style="margin-left:5px">
                                     <label class="coltrol-lable">ID KHDT:</label>
                                     
                                          <input class="form-control" id="idkhdt_edit_monkhdt" name="idkhdt_edit_monkhdt" disabled  />
                                     
                                 </div>
                                 <div hidden class="form-group col-xs-4" style="margin-left:5px">
                                     <label class="coltrol-lable">ID Ngành:</label>
                                     
                                          <input class="form-control" id="idnganhhoc_edit_monkhdt" name="idnganhhoc_edit_monkhdt" disabled  />
                                     
                                 </div>
                                 <div hidden class="form-group col-xs-4" style="margin-left:10px">
                                    <label class="coltrol-lable">ID Khóa:</label>
                                    <input class="form-control" id="idkhoahoc_edit_monkhdt" name="idkhoahoc_edit_monkhdt" disabled  />
                                </div>
                                <div hidden class="form-group col-xs-4" style="margin-left:10px">
                                    <label class="coltrol-lable">ID Môn:</label>
                                    <input class="form-control" id="idmon_edit_monkhdt" name="idmon_edit_monkhdt" disabled  />
                                </div>
                                <div class="form-group col-xs-4" style="margin-left:10px">
                                    <label class="coltrol-lable">Khóa:</label>
                                    <input class="form-control" id="khoahoc_edit_monkhdt" name="khoahoc_edit_monkhdt" disabled  />
                                </div>
                                <div class="form-group col-xs-4" style="margin-left:10px">
                                    <label class="coltrol-lable">Học Kỳ:</label>
                                    <select class="form-control" id="hocki_edit_monkhdt" name="hocki">
                                        <option value="">--- Chọn Học Kì ---</option>
                                        <!-- <option value="1">HK 1</option> -->
                                        <?php foreach ($listhocki as $row):?>
                                        <option value="<?php echo $row->hocki_id ?>"  ><?php echo $row->tenHocki ?></option>
                            <?php endforeach;?>
                                    </select>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-xs-4"s tyle="margin-left:5px">
                                    <label class="coltrol-lable">Nhập Mã Môn Học:</label>
                                    <input class="form-control" id="mamon_edit_monkhdt" name="mamon" disabled  />
                                </div>
                                <div class="form-group col-xs-4" style="margin-left:10px">
                                    <label class="coltrol-lable">Nhập Tên Môn Học:</label>
                                    <input class="form-control" id="tenmon_edit_monkhdt" name="tenmon" disabled  />
                                </div>
                                <div class="form-group col-xs-4" style="margin-left:10px">
                                    <label class="coltrol-lable">Nhập Số DVHT/Tín Chỉ:</label>
                                    <input class="form-control" id="dvht_tc_edit_monkhdt" name="dvht_tc"  />
                                </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-xs-4" style="margin-left:5px">
                                  <label class="coltrol-lable">Tổng số:</label>
                                  <input class="form-control" id="tongso_edit_monkhdt" name="tongso"   />
                              </div>
                              <div class="form-group col-xs-4" style="margin-left:10px">
                                  <label class="coltrol-lable">Lý thuyết::</label>
                                  <input class="form-control" id="lythuyet_edit_monkhdt" name="lythuyet"  />
                              </div>
                              <div class="form-group col-xs-4" style="margin-left:10px">
                                  <label class="coltrol-lable">Thực hành:</label>
                                  <input class="form-control" id="thuchanh_edit_monkhdt" name="thuchanh"  />
                              </div>
                            </div>
                              <div class="row">
                              <div class="form-group col-xs-3" style="margin-left:5px">
                                  <label class="coltrol-lable">Bài tập:</label>
                                  <input class="form-control" id="baitap_edit_monkhdt" name="baitap"  />
                              </div>
                              <div class="form-group col-xs-3" style="margin-left:10px">
                                  <label class="coltrol-lable">Bài tập lớn:</label>
                                  <input class="form-control" id="baitaplon_edit_monkhdt" name="baitaplon"  />
                              </div>
                              <div class="form-group col-xs-3" style="margin-left:10px">
                                  <label class="coltrol-lable">Đồ án:</label>
                                  <input class="form-control" id="doan_edit_monkhdt" name="doan"  />
                              </div>
                              <div class="form-group col-xs-3" style="margin-left:10px">
                                  <label class="coltrol-lable">Khóa luận:</label>
                                  <input class="form-control" id="khoaluan_edit_monkhdt" name="khoaluan"  />
                              </div>
                          </div>
                          </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="padding:0px">
                        <input type="button" class="btn btn-sm btn-success" value="Sửa" id="submit_edit_monkhdt" name="submit">
                        
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div id="dialogImport" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
            <div class="modal-dialog" style="width:400px !important;height:600px !important">
                <div class="modal-content">
                    <form id="frmEditEmployee" name="frmCreateEmployee" class="form-horizontal" role="form" method="post"ng-submit="UpdateEmployee()" action="<?php echo base_url('Giaovu/Kehoachdaotao/importCTDT') ?>" enctype="multipart/form-data">
                        <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                          <a href="<?php echo $_SERVER['REQUEST_URI']?>" style="position: absolute;top: 10px;right: 10px;padding: 5px 10px;display: inline-block;">X</a>
                            <h5><strong class="modal-title">Thêm Kế Hoạch Đào Tạo</strong></h5>
                        </div>
                        <div class="modal-body">
                            <div class="row" style="margin:10px">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                                      <div class="form-group">
                                        <label class="coltrol-lable">Ngành:</label>
                                        <select class="form-control" id="nganhhocImport" name="nganhhoc">
                                          <option value="">--- Chọn Ngành Học ---</option>
                                          <?php foreach ($listnganhhoc as $row):?>
                                          <option value="<?php echo $row->nganhhoc_id ?>"><?php echo $row->tennganh ?></option>
                                          <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">Khóa:</label>
                                        <select class="form-control" id="khoahocImport" name="khoahoc">
                                          <option value="">--- Chọn Khóa Học ---</option>
                                          <option value="1">Khóa 20</option>
                                        </select>
                                    </div>
                                                      <div class="form-group">
                                        <label class="coltrol-lable">File Input:</label>
                                        <input type="file" id="file" name="file">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding:0px">
                            <input type="submit" class="button" value="Upload" name='submit' />
                            <button class="btn btn-sm btn-danger" data-dismiss="modal">Hủy</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div id="dialogDelete_KHDT" data-backdrop = "static" data-keyboard = "false" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
            <div class="modal-dialog" style="width:400px !important;height:600px !important">
                <div class="modal-content">
                <form id="form_edit_MonKhdt" name="frmCreateEmployee" method="post"  class="form-horizontal" role="form" ng-submit="UpdateEmployee()">
                    <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                        <button onclick="reload()" type="button" class="close" data-dismiss="modal">×</button>
                        <h5><strong class="modal-title">Xóa Môn Trong Kế Hoạch Đào Tạo</strong></h5>
                        </div>
                        <div hidden="hidden" id="msg-success-deletemon-khdt" class="modal-header add_success" style="padding:0px;text-align:center">
                            <h5><strong class="modal-title"></strong></h5>
                        </div>
                        <div hidden="hidden" id="msg-fail-deletemon-khdt" class="modal-header add_fail" style="padding:0px;text-align:center">
                            <h5><strong class="modal-title"></strong></h5>
                        </div>
                    <div hidden class="form-group">
                        <input  class="form-control" id="idkhdt_deletemon" value="" name="idkhdt_deletemon" />
                    </div>
                <div class="modal-body text-center">
                <strong>Bạn có muốn xóa bản ghi ?</strong>
              </div>
              <div class="modal-footer" style="padding:0px">
                <input type="button" class="btn btn-sm btn-danger" id="submit_delmon_khdt" name="Xóa" value="Xóa">
            </div>
        </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
                </div>
            </div>
