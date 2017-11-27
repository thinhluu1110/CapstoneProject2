<div class="main-content-inner">
    <div class="page-content">
        <img id="ajax-loader" src="/image/ajax-loader.gif" alt="" />
        <div class="page-header">
            <div class="hitec-content">
                <h2>ĐIỀU KIỆN ĐƯỢC PHÉP LÀM ĐỒ ÁN</h2>
                <div class="container-fluid">
                    <form method="get" action="<?php echo base_url('Giaovu/Dieukiendoan/index')?>" id="formSearch" role="form" onsubmit="return true;">
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
                    <div class="container-fluid">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width:60px" class="text-center">
                                        Mã
                                    </th>
                                    <th style="width:auto" class="text-center">
                                        Nội Dung
                                    </th>
                                    <th style="width:170px" class="text-center">
                                        Khóa Áp Dụng
                                    </th>
                                    <?php if ($this->session->userdata('phanquyen') == 1) { ?>
                                    <th style="width:70px" class="text-center">
                                      <a href="javascript:void(0)" class="btn-sm btn-success" title="Thêm" data-toggle="modal" data-target="#dialogAdd">
                                          <i class="fa fa-plus"></i>
                                      </a>
                                    </th>
                                  <?php } ?>
                                </tr>
                            </thead>
                            <tbody>

                              <?php if (isset($listDKDA)) {
                               for ($i=0; $i < count($listDKDA); $i++) { ?>
                                <tr>
                                    <td class="text-center">
                                      <?php echo "DK".$listDKDA[$i]['dkda_id'] ?>
                                    </td>
                                    <?php
                                        $str = '';
                                        if(count($listDKDA[$i]['mamoncam']) > 0){
                                            $str = 'Không nợ 1 trong các môn sau: ';
                                            for ($j = 0; $j < count($listDKDA[$i]['mamoncam']); $j++){
                                                if($j > 0){
                                                    $str .= ', ';
                                                }
                                                $str .= '<b style="color: red">'.$listDKDA[$i]['mamoncam'][$j]['TenMH'].'</b>';
                                            }
                                        }
                                    ?>
                                    <td>
                                      <?php echo 'Sinh Viên Không Nợ Quá <b style="color: red">'.$listDKDA[$i]['max_monno'].'</b> Môn. '. $str?>
                                    </td>
                                    <td class="text-center">
                                      <?php echo 'Áp Dụng Cho: '.$listDKDA[$i]['tenkhoa'] ?>

                                    </td>

                                    <?php if ($this->session->userdata('phanquyen') == 1) { ?>
                                    <td class="text-center" style="padding: 8px 0">
                                      <a class="btn-sm btn-info edit_dkda" id="<?php echo $listDKDA[$i]['dkda_id'] ?>" title="Sửa" data-toggle="modal" data-target="#dialogEditDKDA" style="margin-right: 4px;">
                                          <i class="fa fa-edit"></i>
                                      </a>
                                      <a href="javascript:void(0)" class="btn-sm btn-danger" title="Thêm" data-toggle="modal" data-target="#dialogAdd"style="margin-right: 4px;">
                                          <i class="fa fa-trash"></i>
                                      </a>
                                    </td>
                                  <?php } ?>
                                </tr>
                              <?php } }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
<div class="col-xs-12">
<div id="dialogAdd" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
    <div class="modal-dialog" style="width:400px !important;height:600px !important">
        <div class="modal-content">
            <form id="form_dieukien_doan" name="frmCreateEmployee" class="form-horizontal" role="form" method="post" action="<?php echo base_url('Giaovu/Khoahoc/Add') ?>" enctype="multipart/form-data">
                <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                    <button onclick="reload()" type="button" class="close" data-dismiss="modal">×</button>
                    <h5><strong class="modal-title">Thêm Điều Kiện Đồ Án</strong></h5>
                </div>
                <div hidden="hidden" id="msg-success-dkda" class="modal-header add_success" style="padding:0px;text-align:center">
                    <h5><strong class="modal-title"></strong></h5>
                </div>
                <div hidden="hidden" id="msg-fail-dkda" class="modal-header add_fail" style="padding:0px;text-align:center">
                    <h5><strong class="modal-title"></strong></h5>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin:10px">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                          <div class="form-group">
                              <label class="coltrol-lable">Áp Dụng Cho Ngành:</label>
                              <select class="form-control" id="nganhhoc_dieukien_doan" name="nganhhoc">
                              <option value="">--- Chọn Ngành Học ---</option>
                              <?php foreach ($listnganhhoc as $row):?>
                              <option value="<?php echo $row->nganhhoc_id ?>"  ><?php echo $row->tennganh ?></option>
                              <?php endforeach;?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label class="coltrol-lable">Áp Dụng Cho Khóa:</label>
                              <select class="form-control" id="khoahoc_dieukien_doan" name="khoahoc" disabled>
                              <option value="">--- Chọn Khóa Học ---</option>

                              </select>
                          </div>
                            <div class="form-group">
                                <label class="coltrol-lable">Số Môn Được Nợ Tối Đa:</label>
                                <input class="form-control" id="maxmonno_dieukien_doan" name="maxmonno" />
                            </div>
                            <div class="form-group">
                                <label class="coltrol-lable">Môn Không Được Phép Nợ:</label>
                                <select class="form-control" id="monkoduocno_dieukien_doan" name="monkoduocno" disabled>
                                <option value="">--- Chọn Môn ---</option>

                                </select>
                            </div>
                            <div class="form-group">
                            <ul id="review_select" style="margin: 5px 0 0 0; list-style: none">
                            </ul>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding:0px">
                    <button type="button" class="btn btn-sm btn-success" id="submit_add_DKDA" name="submit">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12">
<div id="dialogEditDKDA" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
    <div class="modal-dialog" style="width:400px !important;height:600px !important">
        <div class="modal-content">
            <form id="form_dieukien_doan" name="frmCreateEmployee" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                    <button onclick="reload()" type="button" class="close" data-dismiss="modal">×</button>
                    <h5><strong class="modal-title">Sửa Điều Kiện Đồ Án</strong></h5>
                </div>
                <div hidden="hidden" id="msg-success-dkda-edit" class="modal-header add_success" style="padding:0px;text-align:center">
                    <h5><strong class="modal-title"></strong></h5>
                </div>
                <div hidden="hidden" id="msg-fail-dkda-edit" class="modal-header add_fail" style="padding:0px;text-align:center">
                    <h5><strong class="modal-title"></strong></h5>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin:10px">
                        <div class="col-xs-12 col-md-12 col-lg-12">
                          <div class="form-group">
                              <label class="coltrol-lable">Áp Dụng Cho Ngành:</label>
                              <select class="form-control" id="nganhhoc_dieukien_doan_edit" name="nganhhoc">
                              <option value="">--- Chọn Ngành Học ---</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label class="coltrol-lable">Áp Dụng Cho Khóa:</label>
                              <select class="form-control" id="khoahoc_dieukien_doan_edit" name="khoahoc" disabled>
                              <option value="">--- Chọn Khóa Học ---</option>

                              </select>
                          </div>
                            <div class="form-group">
                                <label class="coltrol-lable">Số Môn Được Nợ Tối Đa:</label>
                                <input class="form-control" id="maxmonno_dieukien_doan_edit" name="maxmonno" />
                            </div>
                            <div class="form-group">
                                <label class="coltrol-lable">Môn Không Được Phép Nợ:</label>
                                <select class="form-control" id="monkoduocno_dieukien_doan_edit" name="monkoduocno" disabled>
                                <option value="">--- Chọn Môn ---</option>

                                </select>
                            </div>
                            <div class="form-group">
                            <ul id="review_select" style="margin: 5px 0 0 0; list-style: none">
                            </ul>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding:0px">
                    <!-- <button type="button" class="btn btn-sm btn-success" id="submit_edit_DKDA" name="submit">Sửa</button> -->
                    <input type="button" class="btn btn-sm btn-success" id="submit_edit_DKDA" name="submit" value="Thêm">
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
    </div>
</div>
