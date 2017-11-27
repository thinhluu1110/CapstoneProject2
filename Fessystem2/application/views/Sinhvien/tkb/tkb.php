<div class="main-content-inner">
    <div class="page-content">
        <div class="page-header">

            <div class="hitec-content">
                <h2>Thời Khóa Biểu</h2>
                <div class="container-fluid">
                    <form method="get" action="<?php echo base_url('Sinhvien/tkb/index')?>" id="formSearch" role="form" onsubmit="return true;">
                        <div class="row">

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
                        </div>
                    </form>
                </div>

                <!-- <div class="container-fluid" style="margin-top:10px; margin-bottom:10px">
                    <div class="row">
                        <div class="col-xs-12">
                            Ngày cập nhật: <strong><?php if(@$ngaycapnhat == null){echo "";} else {echo @$ngaycapnhat[0]['ech_upload_date'];} ?></strong>
                        </div>

                    </div>
                </div> -->

                <div id="searchResult" style="margin-top:5px;">
                    <?php if ($this->input->get('Hocki')) {
                      foreach ($listTkb as $row):?>
                        <div class="container-fluid text-center">
                            <img src="<?php echo base_url('upload/tkb/'.$row->ten_anh)?>">
                            <br><br><br>
                        </div>
                    <?php endforeach;}?>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-xs-12">

            </div>
        </div>
    </div>
</div>
