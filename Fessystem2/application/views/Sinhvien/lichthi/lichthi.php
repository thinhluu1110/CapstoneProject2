<div class="main-content-inner">
    <div class="page-content">
        <div class="page-header">
                        
            <div class="hitec-content">
                <h2>LỊCH THI KẾT THÚC HỌC PHẦN</h2>
                <div class="container-fluid">
                    <form method="get" action="<?php echo base_url('Sinhvien/lichthi/index')?>" id="formSearch" role="form" onsubmit="return true;">
                        <div class="row">                           
                            <div class="col-xs-6">
                                <div class="input-group hitec-w-100percent">
                                    <select class="form-control" id="Hocki" name="Hocki" onchange='if(this.value != 0) { this.form.submit(); }'>
                                        <option value="">--- Chọn Học Kỳ ---</option>
                                        <?php foreach ($listhocki as $row):?>
                                            <option value="<?php echo $row->hocki_id ?>" <?php echo ($this->input->get('Hocki') == $row->hocki_id) ? 'selected' : ''?> ><?php echo $row->tenHocki ?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="input-group hitec-w-100percent">
                                    <select class="form-control" id="Lanthi" name="Lanthi" onchange='if(this.value != 0) { this.form.submit(); }'>
                                        <option value="">--- Lần Thi ---</option>
                                            <option value="1"<?php echo ($this->input->get('Lanthi') == 1) ? 'selected' : ''?>>Lần 1</option>
                                            <option value="2"<?php echo ($this->input->get('Lanthi') == 2) ? 'selected' : ''?>>Lần 2</option>
                                    </select>
                                </div>
                            </div>              
                        </div>
                    </form>
                </div>
                <!-- //ngay cap nhat// -->
                <!-- <div class="container-fluid" style="margin-top:10px; margin-bottom:10px">
                    <form method="get" action="<?php echo base_url('Sinhvien/lichthi/get_date')?>" id="up_date" role="form" onsubmit="return true;">
                    <div class="row">
                        <div class="col-xs-12">
                            Ngày cập nhật: <strong><?php if(@$ngaycapnhat == null){echo "";} else {echo @$ngaycapnhat[0]['sch_upload_date'];} ?></strong>
                        </div>
                    </div>
                    </form>
                </div> -->
                <!-- /////////////////// -->
                
                        <div class="container-fluid text-center">
                            <img src="<?php echo base_url('upload/Lichthi/'.$listLichthi['ten_anh'])?>">
                            <br><br><br>        
                        </div>

                
                
            </div>
            

        </div>
        <div class="row">
            <div class="col-xs-12">

            </div>
        </div>
    </div>
</div>