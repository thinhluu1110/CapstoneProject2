<div class="main-content-inner">
    <div class="page-content">
        <div class="page-header">

            <div class="hitec-content">
                <h2>Thời Khóa Biểu</h2>
                <div class="container-fluid">
                    <form method="get" action="<?php echo base_url('Giaovu/tkb/index')?>" id="formSearch" role="form" onsubmit="return true;">
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="input-group hitec-w-100percent">
                                    <select class="form-control" id="Nganhhoc" name="Nganhhoc" onchange='if(this.value != 0) { this.form.submit(); }'>
                                        <option value="">--- Chọn Ngành Học ---</option>
                                        <?php foreach ($listnganhhoc as $row):?>
                                            <option value="<?php echo $row->nganhhoc_id ?>" <?php echo ($this->input->get('Nganhhoc') == $row->nganhhoc_id) ? 'selected' : ''?> ><?php echo $row->tennganh ?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-4">
                                <div class="input-group hitec-w-100percent">
                                    <select class="form-control" id="Khoahoc" name="Khoahoc" onchange='if(this.value != 0) { this.form.submit(); }'>
                                        <option value="">--- Chọn Khóa Học ---</option>

                                        <?php foreach ($listkhoahocbynganh as $row):?>
                                            <option value="<?php echo $row->khoahoc_id ?>" <?php echo ($this->input->get('Khoahoc') == $row->khoahoc_id) ? 'selected' : ''?> ><?php echo $row->tenkhoa ?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-4">
                                <div class="input-group hitec-w-100percent">
                                    <select class="form-control" id="Hocki" name="Hocki" onchange='if(this.value != 0) { this.form.submit(); }'>
                                        <option value="">--- Chọn Học Kỳ ---</option>
                                        <?php foreach ($listhockibykhoa as $row):?>
                                            <option value="<?php echo $row->hocki_id ?>" <?php echo ($this->input->get('Hocki') == $row->hocki_id) ? 'selected' : ''?> ><?php echo $row->tenHocki ?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="searchResult" style="margin-top:5px;">
                  <?php if ($this->session->userdata('phanquyen') == 1) {?>
                    <div class="container-fluid text-right">
                        <a href="javascript:void(0)"  title="Import excel" data-toggle="modal" data-target="#dialogEdit">[Thêm Thời Khóa Biểu]</a>
                    </div>
                  <?php } ?>
                    <div id="review_image" >
                        <div class="container-fluid text-right">
                            <a href=""></a>
                        </div>
                        <div class="container-fluid text-center">
                            <p></p>
                        </div>
                    </div>

                    <?php foreach ($listTkb as $row):?>
                        <div class="container-fluid text-left">
                            <a><h1> Ngày cập nhật : <?php echo $row->ngay_cap_nhat ?></h1></a>
                        </div>
                        <div class="container-fluid text-center">
                            <img src="<?php echo base_url('upload/tkb/'.$row->ten_anh)?>">
                        </div>
                    <?php endforeach;?>

                </div>

            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div id="dialogEdit" data-backdrop = "static" data-keyboard = "false" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
                        <div class="modal-dialog" style="width:400px !important;height:600px !important">
                            <div class="modal-content">
                                <!-- <form id="frmEditEmployee" name="frmCreateEmployee" class="form-horizontal" role="form" ng-submit="UpdateEmployee()" method="post" action="<?php echo base_url('Giaovu/Tkb/add') ?>" enctype="multipart/form-data"> -->
                                <form id="form_importImage" name="frmCreateEmployee" class="form-horizontal" role="form" ng-submit="UpdateEmployee()" method="post" enctype="multipart/form-data">
                                    <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                        <h5><strong class="modal-title">Thêm Thời Khóa Biểu</strong></h5>
                                    </div>

                                    <div class="modal-header btn-success" style="padding:0px;text-align:center" id="msg-success" hidden>
                                        <h5><strong class="modal-title"></strong></h5>
                                    </div>

                                    <div class="modal-header btn-danger" style="padding:0px;text-align:center" id="msg-validation" hidden>
                                        <h5><strong class="modal-title"></strong></h5>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row" style="margin:10px">
                                            <div class="col-xs-12 col-md-12 col-lg-12">



                                                <div class="form-group">
                                                    <label class="coltrol-lable">Ngành học :</label>
                                                    <select class="form-control" id="nganhhocAdd" name="nganhhoc">
                                                        <option selected="selected">--- Chọn Ngành Học ---</option>
                                                        <?php foreach ($listnganhhoc as $row):?>
                                                            <option value="<?php echo $row->nganhhoc_id ?>"><?php echo $row->tennganh ?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label class="coltrol-lable">Khóa học :</label>
                                                    <select class="form-control" id="khoahocAdd" name="khoahoc">
                                                        <option selected="selected" value="">--- Chọn Khóa Học ---</option>

                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label class="coltrol-lable">Học Kì :</label>
                                                    <select class="form-control" id="hocki" name="hocki">
                                                      <option selected="selected" value="">--- Chọn Học Kỳ ---</option>
                                                      <?php foreach ($listhocki as $row):?>
                                                          <option value="<?php echo $row->hocki_id ?>"><?php echo $row->tenHocki ?></option>
                                                      <?php endforeach;?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="coltrol-lable">Chọn Tập Tin:</label>
                                                        <input type="file"  id="imageTKB" name="image" accept="image/jpeg, image/png, image/gif"><br />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer" style="padding:0px">
                                        <!-- <button class="btn btn-sm btn-success">Thêm</button> -->
                                        <input id="submit_TKB"  class="btn btn-sm btn-success   " value="Thêm" name='submit' />

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div id="dialogValidation_Add_TKB" data-backdrop = "static" data-keyboard = "false" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
                        <div class="modal-dialog" style="width:400px !important;height:600px !important">
                            <div class="modal-content">
                            <!-- <form id="form-validation-add-nganhhoc" name="frmCreateEmployee" method="post"  class="form-horizontal" role="form" ng-submit="UpdateEmployee()"> -->
                            <form id="form-validation-add-nganhhoc" name="frmCreateEmployee" method="post"  class="thongbao" role="form" ng-submit="UpdateEmployee()">
                                <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                                    <h5><strong class="modal-title">Thông Báo</strong></h5>
                                    </div>
                            <div style="color:green;" class="modal-body text-center">
                            <font size="5">Thành Công</font>
                          </div>
                          <div class="modal-footer" style="padding:0px;">
                            <input type="button" style="width: 100%;" class="btn btn-sm btn-success" id="submit_delnganh" name="Xóa" onclick="reload()" value="OK">
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
