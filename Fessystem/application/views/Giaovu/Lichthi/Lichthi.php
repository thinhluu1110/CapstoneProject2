<div class="main-content-inner">
    <div class="page-content">
        <div class="page-header">
                        
            <div class="hitec-content">
                <h2>LỊCH THI KẾT THÚC HỌC PHẦN</h2>
                <div class="container-fluid">
                    <form method="get" action="<?php echo base_url('Giaovu/Lichthi/index')?>" id="formSearch" role="form" onsubmit="return true;">
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="input-group hitec-w-100percent">
                                    <select class="form-control" id="Khoahoc" name="Khoahoc" onchange='if(this.value != 0) { this.form.submit(); }'>
                                        <option value="">--- Chọn Khóa Học ---</option>
                                        <?php foreach ($listkhoahoc as $row):?>
                                            <option value="<?php echo $row->khoahoc_id ?>" <?php echo ($this->input->get('Khoahoc') == $row->khoahoc_id) ? 'selected' : ''?> ><?php echo $row->tenkhoa ?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="input-group hitec-w-100percent">
                                    <select class="form-control" id="Hocki" name="Hocki" onchange='if(this.value != 0) { this.form.submit(); }'>
                                        <option value="">--- Chọn Học Kỳ ---</option>
                                        <?php foreach ($listhocki as $row):?>
                                            <option value="<?php echo $row->hocki_id ?>" <?php echo ($this->input->get('Hocki') == $row->hocki_id) ? 'selected' : ''?> ><?php echo $row->tenHocki ?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="input-group hitec-w-100percent">
                                    <select class="form-control" id="Lanthi" name="Lanthi" onchange='if(this.value != 0) { this.form.submit(); }'>
                                        <option value="">--- Lần Thi ---</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                    </select>
                                </div>
                            </div>              
                        </div>
                    </form>
                </div>
                <div id="searchResult" style="margin-top:5px;">
                    <div class="container-fluid text-right">
                        <a href="javascript:void(0)"  title="Import excel" data-toggle="modal" data-target="#dialogEdit">[Import Data]</a>
                    </div>

                    <?php foreach ($listLichthi as $row):?>
                        <div class="container-fluid text-center">
                            <img src="<?php echo base_url('upload/Lichthi/'.$row->ech_image)?>">
                            <br><br><br>        
                        </div>
                    <?php endforeach;?>

                </div>
                
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div id="dialogEdit" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
                        <div class="modal-dialog" style="width:400px !important;height:600px !important">
                            <div class="modal-content">
                                <form id="frmEditEmployee" name="frmCreateEmployee" class="form-horizontal" role="form" ng-submit="UpdateEmployee()" method="post" action="<?php echo base_url('Giaovu/Lichthi/add') ?>" enctype="multipart/form-data">
                                    <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                        <h5><strong class="modal-title">Thêm Lịch Thi</strong></h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row" style="margin:10px">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <label class="coltrol-lable">Khóa:</label>
                                                    <select class="form-control" id="Khoahoc" name="Khoahoc" onchange='if(this.value != 0) { this.form.submit(); }'>
                                                        <option value="">--- Chọn Khóa Học ---</option>
                                                        <?php foreach ($listkhoahoc as $row):?>
                                                            <option value="<?php echo $row->khoahoc_id ?>" <?php echo ($this->input->get('KhoaHoc') == $row->khoahoc_id) ? 'selected' : ''?> ><?php echo $row->tenkhoa ?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="coltrol-lable">Học Kì:</label>
                                                    <select class="form-control" id="Hocki" name="Hocki" onchange='if(this.value != 0) { this.form.submit(); }'>
                                                        <option value="">--- Chọn Học Kỳ ---</option>
                                                        <?php foreach ($listhocki as $row):?>
                                                            <option value="<?php echo $row->hocki_id ?>" <?php echo ($this->input->get('Hocki') == $row->hocki_id) ? 'selected' : ''?> ><?php echo $row->tenHocki ?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
            									<div class="form-group">
                                                    <label class="coltrol-lable">Thi Lần:</label>
                                                    <select class="form-control" id="Lanthi" name="Lanthi" onchange='if(this.value != 0) { this.form.submit(); }'>
                                                        <option value="">--- Lần Thi ---</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                    </select>
                                                </div>
            									<div class="form-group">
                                                    <label class="coltrol-lable">File Input:</label>
                                                    <!-- <input type="file" id="exampleInputFile"> -->
                                                    <input type="file"  id="image" name="image"><br />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer" style="padding:0px">
                                        <!-- <button class="btn btn-sm btn-success">Thêm</button> -->
                                        <input type="submit" class="button" value="Upload" name='submit' />
                                        <button class="btn btn-sm btn-danger" data-dismiss="modal">Thôi</button>
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