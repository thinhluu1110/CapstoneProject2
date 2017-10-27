<div class="main-content-inner">
                <div class="page-content">
                    <img id="ajax-loader" src="http://aspnet.demo.hueuni.edu.vn/StudentManager/images/ajax-loader.gif" alt="" />
                    <div class="page-header">
<div class="hitec-content">
    <h2>TRA CỨU KẾ HOẠCH ĐÀO TẠO</h2>
    <div class="container-fluid">
            <form id="formSearch" role="form" onsubmit="return false;">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="input-group hitec-w-100percent">
                          <select class="form-control" id="khoahoc" name="KhoaHoc" onchange='if(this.value != 0) { this.form.submit(); }'>
                            <option value="">--- Chọn Khóa Học ---</option>
                            <?php foreach ($listkhoahoc as $row):?>
                            <option value="<?php echo $row->khoahoc_id ?>" ><?php echo $row->tenkhoa ?></option>
                            <?php endforeach;?>
                        </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <div id="searchResult" style="margin-top:5px;">
        <!-- Layout dùng cho các view dạng một phần nội dung trong trang web -->
        <div class="container-fluid text-right">
            <a href="javascript:void(0)"  title="Import excel" data-toggle="modal" data-target="#dialogImport">[Import Data]</a>
        </div>
        <div class="container-fluid" style="margin-top:10px; margin-bottom:10px">
            <div class="row">
                <div class="col-xs-12">
                    Kế Hoạch Đào Tạo Ngành: <strong><?php echo $listCTDT[0]['tennganh'];?></strong>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    Kế Hoạch Đào Tạo Khóa: <strong><?php echo $listCTDT[0]['tenkhoa'];?></strong>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <span>Tổng số MÔN của chương trình: <strong><?php echo count($listCTDT);?> môn</strong></span>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <span>Tổng số DVHT của chương trình:
                      <strong>
                          <?php $tong = 0; foreach ($listCTDT as $keyval => $value)
                        {
                          $tong = $tong + $listCTDT[$keyval]['dvht_tc'];
                        }
                        echo $tong;?>
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
                        <th class="text-center" style="width:80px">
                            <a href="javascript:void(0)" class="btn-sm btn-success" title="Thêm" data-toggle="modal" data-target="#dialogAdd">
                                <i class="fa fa-plus"></i>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="hitec-td-2" colspan="12">
                            <strong>Học Kì 1</strong>
                        </td>
                    </tr>
                    <?php
                        $list = $listCTDT;
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
                        <td class="hitec-td-1 text-center text-center">
                            <a href="javascript:void(0)" class="btn-sm btn-danger" title="" data-toggle="modal" data-target="#dialogDelete" style="margin-right: 4px;">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a href="javascript:void(0)" class="btn-sm btn-info" title="" data-toggle="modal" data-target="#dialogEdit" style="margin-right: 4px;">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } }?>
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
                        <td class="hitec-td-1 text-center text-center">
                            <a href="javascript:void(0)" class="btn-sm btn-danger" title="" data-toggle="modal" data-target="#dialogDelete" style="margin-right: 4px;">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a href="javascript:void(0)" class="btn-sm btn-info" title="" data-toggle="modal" data-target="#dialogEdit" style="margin-right: 4px;">
                                <i class="fa fa-eye"></i>
                            </a>
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
                        <td class="hitec-td-1 text-center text-center">
                            <a href="javascript:void(0)" class="btn-sm btn-danger" title="" data-toggle="modal" data-target="#dialogDelete" style="margin-right: 4px;">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a href="javascript:void(0)" class="btn-sm btn-info" title="" data-toggle="modal" data-target="#dialogEdit" style="margin-right: 4px;">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
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
                        <td class="hitec-td-1 text-center text-center">
                            <a href="javascript:void(0)" class="btn-sm btn-danger" title="" data-toggle="modal" data-target="#dialogDelete" style="margin-right: 4px;">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a href="javascript:void(0)" class="btn-sm btn-info" title="" data-toggle="modal" data-target="#dialogEdit" style="margin-right: 4px;">
                                <i class="fa fa-eye"></i>
                            </a>
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
                        <td class="hitec-td-1 text-center text-center">
                            <a href="javascript:void(0)" class="btn-sm btn-danger" title="" data-toggle="modal" data-target="#dialogDelete" style="margin-right: 4px;">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a href="javascript:void(0)" class="btn-sm btn-info" title="" data-toggle="modal" data-target="#dialogEdit" style="margin-right: 4px;">
                                <i class="fa fa-eye"></i>
                            </a>
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
                        <td class="hitec-td-1 text-center text-center">
                            <a href="javascript:void(0)" class="btn-sm btn-danger" title="" data-toggle="modal" data-target="#dialogDelete" style="margin-right: 4px;">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a href="javascript:void(0)" class="btn-sm btn-info" title="" data-toggle="modal" data-target="#dialogEdit" style="margin-right: 4px;">
                                <i class="fa fa-eye"></i>
                            </a>
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
                        <td class="hitec-td-1 text-center text-center">
                            <a href="javascript:void(0)" class="btn-sm btn-danger" title="" data-toggle="modal" data-target="#dialogDelete" style="margin-right: 4px;">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a href="javascript:void(0)" class="btn-sm btn-info" title="" data-toggle="modal" data-target="#dialogEdit" style="margin-right: 4px;">
                                <i class="fa fa-eye"></i>
                            </a>
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
                        <td class="hitec-td-1 text-center text-center">
                            <a href="javascript:void(0)" class="btn-sm btn-danger" title="" data-toggle="modal" data-target="#dialogDelete" style="margin-right: 4px;">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a href="javascript:void(0)" class="btn-sm btn-info" title="" data-toggle="modal" data-target="#dialogEdit" style="margin-right: 4px;">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div id="dialogEdit" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
            <div class="modal-dialog" style="width:400px !important;height:600px !important">
                <div class="modal-content">
                    <form id="frmEditEmployee" name="frmCreateEmployee" class="form-horizontal" role="form" ng-submit="UpdateEmployee()">
                        <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h5><strong class="modal-title">Sửa Môn Học Vào Kế Hoạch Đào Tạo</strong></h5>
                        </div>
                        <div class="modal-body">
                            <div class="row" style="margin:10px">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label class="coltrol-lable">Ngành:</label>
                                        <select class="form-control">
                                            <option>Kỹ Thuật Phần Mềm</option>
                                            <option>Mạng Máy Tính</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">Khóa:</label>
                                        <select class="form-control">
                                            <option>K19</option>
                                            <option>K20</option>
                                            <option>K21</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">Học Kỳ:</label>
                                        <select class="form-control">
                                            <option>HK I</option>
                                            <option>HK II</option>
                                            <option>HK III</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">Nhập Mã Môn Học:</label>
                                        <input class="form-control" value="DTA0002" />
                                    </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">Nhập Tên Môn Học:</label>
                                        <input class="form-control" value="Nhập Môn Máy Tính" />
                                    </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">Nhập Số DVHT/Tín Chỉ:</label>
                                        <input class="form-control" value="10" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding:0px">
                            <button class="btn btn-sm btn-success">Sửa</button>
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
        <div id="dialogAdd" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
            <div class="modal-dialog" style="width:400px !important;height:600px !important">
                <div class="modal-content">
                    <form id="frmEditEmployee" name="frmCreateEmployee" class="form-horizontal" role="form" method="post"ng-submit="UpdateEmployee()" action="<?php echo base_url('Giaovu/Kehoachdaotao/addCTDT') ?>" enctype="multipart/form-data">
                        <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h5><strong class="modal-title">Thêm Môn Học Vào Kế Hoạch Đào Tạo</strong></h5>
                        </div>
                        <div class="modal-body">
                            <div class="row" style="margin:10px">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label class="coltrol-lable">Ngành:</label>
                                        <select class="form-control">
                                            <option>Kỹ Thuật Phần Mềm</option>
                                            <option>Mạng Máy Tính</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">Khóa:</label>
                                        <select class="form-control">
                                            <option>K19</option>
                                            <option>K20</option>
                                            <option>K21</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">Học Kỳ:</label>
                                        <select class="form-control">
                                            <option>HK I</option>
                                            <option>HK II</option>
                                            <option>HK III</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">Nhập Mã Môn Học:</label>
                                        <input class="form-control" value="" />
                                    </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">Nhập Tên Môn Học:</label>
                                        <input class="form-control" value="" />
                                    </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">Nhập Số DVHT/Tín Chỉ:</label>
                                        <input class="form-control" value="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding:0px">
                            <button class="btn btn-sm btn-success">Thêm</button>
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
        <div id="dialogImport" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
            <div class="modal-dialog" style="width:400px !important;height:600px !important">
                <div class="modal-content">
                    <form id="frmEditEmployee" name="frmCreateEmployee" class="form-horizontal" role="form" method="post"ng-submit="UpdateEmployee()" action="<?php echo base_url('Giaovu/Kehoachdaotao/importCTDT') ?>" enctype="multipart/form-data">
                        <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h5><strong class="modal-title">Thêm Kế Hoạch Đào Tạo</strong></h5>
                        </div>
                        <div class="modal-body">
                            <div class="row" style="margin:10px">
                                <div class="col-xs-12 col-md-12 col-lg-12">
									                  <div class="form-group">
                                        <label class="coltrol-lable">Ngành:</label>
                                        <select class="form-control" id="nganhhoc" name="nganhhoc">
                                          <option value="">--- Chọn Ngành Học ---</option>
                                            <option value="1">Kỹ Thuật Phần Mềm</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">Khóa:</label>
                                        <select class="form-control" id="khoahoc" name="khoahoc">
                                          <option value="">--- Chọn Khóa Học ---</option>
                                            <option value="1">K20</option>
                                            <option value="2">K21</option>
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
        <div id="dialogDelete" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
            <div class="modal-dialog" style="width:400px !important;height:600px !important">
                <div class="modal-content">
                    <form id="frmEditEmployee" name="frmCreateEmployee" class="form-horizontal" role="form" ng-submit="UpdateEmployee()">
                        <div class="modal-body text-center">
                            <strong>Bạn có muốn xóa bản ghi ?</strong>
                        </div>
                        <div class="modal-footer" style="padding:0px">
                            <button class="btn btn-sm btn-default" data-dismiss="modal">Hủy</button>
                            <button class="btn btn-sm btn-danger" data-dismiss="modal">Xóa</button>
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
