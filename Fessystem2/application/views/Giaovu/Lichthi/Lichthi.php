<div class="main-content-inner">
    <div class="page-content">
        <div class="page-header">

            <div class="hitec-content">
                <h2>LỊCH THI KẾT THÚC HỌC PHẦN</h2>
                <div class="container-fluid">
                    <form method="get" action="<?php echo base_url('Giaovu/Lichthi/index')?>" id="formSearch" role="form" onsubmit="return true;">
                        <div class="row">
                            <div class="col-xs-3">
                                <div class="input-group hitec-w-100percent">
                                    <select class="form-control" id="Nganhhoc" name="Nganhhoc" onchange='if(this.value != 0) { this.form.submit(); }'>
                                        <option value="">--- Chọn Ngành Học ---</option>
                                        <?php foreach ($listnganhhoc as $row):?>
                                            <option value="<?php echo $row->nganhhoc_id ?>" <?php echo ($this->input->get('Nganhhoc') == $row->nganhhoc_id) ? 'selected' : ''?> ><?php echo $row->tennganh ?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="input-group hitec-w-100percent">
                                    <select class="form-control" id="Khoahoc" name="Khoahoc" onchange='if(this.value != 0) { this.form.submit(); }'>
                                        <option value="">--- Chọn Khóa Học ---</option>
                                        <?php foreach ($listkhoahocbynganh as $row):?>
                                            <option value="<?php echo $row->khoahoc_id ?>" <?php echo ($this->input->get('Khoahoc') == $row->khoahoc_id) ? 'selected' : ''?> ><?php echo $row->tenkhoa ?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="input-group hitec-w-100percent">
                                    <select class="form-control" id="Hocki" name="Hocki" onchange='if(this.value != 0) { this.form.submit(); }'>
                                        <option selected="selected" value="">--- Chọn Học Kỳ ---</option>
                                            <option value="8" <?php echo ($this->input->get('Hocki') == 8) ? 'selected' : ''?> >Học kì 8</option>
                                            <option value="7" <?php echo ($this->input->get('Hocki') == 7) ? 'selected' : ''?> >Học kì 7</option>
                                            <option value="6" <?php echo ($this->input->get('Hocki') == 6) ? 'selected' : ''?> >Học kì 6</option>
                                            <option value="5" <?php echo ($this->input->get('Hocki') == 5) ? 'selected' : ''?> >Học kì 5</option>
                                            <option value="4" <?php echo ($this->input->get('Hocki') == 4) ? 'selected' : ''?> >Học kì 4</option>
                                            <option value="3" <?php echo ($this->input->get('Hocki') == 3) ? 'selected' : ''?> >Học kì 3</option>
                                            <option value="2" <?php echo ($this->input->get('Hocki') == 2) ? 'selected' : ''?> >Học kì 2</option>
                                            <option value="1" <?php echo ($this->input->get('Hocki') == 1) ? 'selected' : ''?> >Học kì 1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="input-group hitec-w-100percent">
                                    <select class="form-control" id="Lanthi" name="Lanthi" onchange='if(this.value != 0) { this.form.submit(); }'>
                                        <option selected="selected" value="">--- Chọn Lần Thi ---</option>
                                            <option value="1" <?php echo ($this->input->get('Lanthi') == 1) ? 'selected' : ''?> >Lần 1</option>
                                            <option value="2" <?php echo ($this->input->get('Lanthi') == 2) ? 'selected' : ''?> >Lần 2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="searchResult" style="margin-top:5px;">
                    <?php if ($this->session->userdata('phanquyen') == 1) {?>
                    <div class="container-fluid text-right">
                        <a href="javascript:void(0)"  title="Import excel" data-toggle="modal" data-target="#dialogEdit">[Thêm Lịch Thi]</a>
                    </div>
                    <?php } ?>
                    <div id="review_image" >
                        <div class=container-fluid text-right">
                            <a href=""></a>
                        </div>
                        <div class="container-fluid text-center">
                            <p></p>
                        </div>
                    </div>

                    <?php if (isset($listLichthi)) {
                        foreach ($listLichthi as $row):?>
                            <div class="container-fluid text-left">
                                <a><h1> Ngày cập nhật : <?php echo $row->ngay_cap_nhat ?></h1></a>
                            </div>
                            <div class="container-fluid text-center">
                                <img src="<?php echo base_url('upload/Lichthi/'.$row->ten_anh)?>">
                            </div>
                    <?php endforeach;}?>

                </div>

            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div id="dialogEdit" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
                        <div class="modal-dialog" style="width:400px !important;height:600px !important">
                            <div class="modal-content">

                                <form id="form_importImage" name="frmCreateEmployee" class="form-horizontal" role="form" ng-submit="UpdateEmployee()" method="post" enctype="multipart/form-data">
                                    <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                        <h5><strong class="modal-title">Thêm Lịch Thi</strong></h5>
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
                                                    <label class="coltrol-lable">Lần Thi :</label>
                                                    <select class="form-control" id="lanthi" name="lanthi">
                                                        <option selected="selected" value="">--- Chọn Lần Thi ---</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label class="coltrol-lable">File Input:</label>
                                                        <input type="file"  id="imageLichthi" name="image" accept="image/jpeg, image/png, image/gif"><br />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer" style="padding:0px">
                                        <!-- <button class="btn btn-sm btn-success">Thêm</button> -->
                                        <input id="submit_Lichthi" type="button" class="btn btn-sm btn-success   " value="Thêm" name='submit' />
                                        <button onclick="reload()" class="btn btn-sm btn-danger" data-dismiss="modal">Hủy</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-xs-12">

            </div>
        </div>
    </div>
</div>
