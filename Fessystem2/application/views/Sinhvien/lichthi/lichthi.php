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
                                        <?php foreach ($listlanthi as $row):?>
                                            <option value="<?php echo $row->lanthi ?>" <?php echo ($this->input->get('Lanthi') == $row->lanthi) ? 'selected' : ''?> ><?php echo $row->lanthi ?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>              
                        </div>
                    </form>
                </div>

                <div id="searchResult" style="margin-top:5px;">
                    
                    <?php if (count($listLichthi) > 0) {?>
                        <div class="container-fluid text-center">
                            <img src="<?php echo base_url('upload/Lichthi/'.$listLichthi['ten_anh'])?>">
                        </div>
                    <?php }?>
                </div>            
                
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">

            </div>
        </div>
    </div>
</div>