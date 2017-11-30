<div class="main-content">
            <div class="main-content-inner">
                <div class="page-content">
                    <img id="ajax-loader" src="http://aspnet.demo.hueuni.edu.vn/StudentManager/images/ajax-loader.gif" alt="" />
                    <div class="page-header">



<div class="hitec-content">
    <h2>TRA CỨU CHƯƠNG TRÌNH ĐÀO TẠO</h2>
    <div class="container-fluid">
        <form method="post" action="<?php echo base_url('Giaovu/Chuongtrinhdaotao/index')?>" id="formSearch" role="form" onsubmit="return true;">
            <div class="row">
                <div class="col-xs-2">
                    <div class="input-group hitec-w-100percent">
                        <select class="form-control" id="nganhhoc" name="nganhhoc" onchange='if(this.value != 0) { this.form.submit(); }' >
                            <option value="">--- Chọn ngành học ---</option>
                            <?php foreach ($listnganhhoc as $row):?>
                            <option value="<?php echo $row->nganhhoc_id ?>" <?php echo ($this->input->post('nganhhoc') == $row->nganhhoc_id) ? 'selected' : '' ?> ><?php echo $row->tennganh ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                     </div>
                    <div class="col-xs-2">
                        <div class="input-group hitec-w-100percent">
                        <select class="form-control" id="khoahoc" name="khoahoc" onchange='if(this.value != 0) { this.form.submit(); }' >
                            <option value="">--- Chọn khóa học ---</option>
                            <?php foreach ($listkhoahoc as $row):?>
                            <option value="<?php echo $row['khoahoc_id'] ?>" <?php echo ($this->input->post('khoahoc') == $row['khoahoc_id']) ? 'selected' : '' ?> ><?php echo $row['tenkhoa'] ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    </div>
                </div>

        </form>
    </div>


    <div id="searchResult" style="margin-top:5px;">
        <!-- Layout dùng cho các view dạng một phần nội dung trong trang web -->
        <?php if ($this->session->userdata('phanquyen') == 1) {?>
        <div class="row col-xs-offset-7">
            <a href="javascript:void(0)" class="col-xs-6" title="Import excel" data-toggle="modal" data-target="#dialogImportCTDT">[Nhập chương trình đào tạo từ file Word]</a>
            <a href="javascript:void(0)"  class="col-xs-6" title="Import excel" data-toggle="modal" data-target="#dialogImportKHDT">[Nhập kế hoạch đào tạo từ file Excel]</a>
        </div>
      <?php } ?>
    </div>

        <div class="container-fluid">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center" style="width:40px">STT</th>
                        <th class="text-center" style="width:300px;">Ngành Học</th>
                        <th class="text-center" style="width:auto">Khóa Học</th>
                        <th class="text-center" style="width:150px">Nội dung</th>
                        <?php if ($this->session->userdata('phanquyen') == 1) {?>
                        <th class="text-center" style="width:100px"></th>
                        <?php } ?>
                        <th class="text-center" style="width:100px"></th>

                    </tr>
                </thead>
                <tbody>
                    <?php for ($i=0; $i < @count($listCTDT) ; $i++) { ?>
                    <tr>
                        <td class="hitec-td-1 text-center">
                            <?php echo $i + 1 ?>
                        </td>
                        <td class="hitec-td-1 text-center">
                            <a href="javascript:;">
                                <?php echo $listCTDT[$i]['tennganh'] ?>
                            </a>
                        </td>
                        <td class="hitec-td-1">
                            <a href="javascript:;">
                               <?php echo $listCTDT[$i]['tenkhoa'] ?>
                            </a>
                        </td>

                        <td class="hitec-td-1 text-center">
                            <a href="<?php echo base_url().'Giaovu/Chuongtrinhdaotao/Download/'.$listCTDT[$i]['ctdt_id']?>">Tải Tập Tin</a>
                        </td>
                        <?php if ($this->session->userdata('phanquyen') == 1) {?>
                        <td class="hitec-td-1 text-center">
                        <a  class="btn-sm btn-info edit_ctdt" id="<?php echo $listCTDT[$i]['ctdt_id'] ?>" title="" data-toggle="modal" data-target="#dialogEditCTDT" style="margin-right: 4px;">
                                <i class="fa fa-eye"></i>
                        </a>
                        </td>
                        <?php } ?>
                        <td class="hitec-td-1 text-center">
                            <a href="<?php echo base_url().'Giaovu/Kehoachdaotao/index?nganhhoc='.$listCTDT[$i]['nganhhoc_id'].'&khoahoc='.$listCTDT[$i]['khoahoc_id']?>">Chi tiết</a>
                        </td>

                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div id="dialogEdit" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
            <div class="modal-dialog" style="width:600px !important;height:600px !important">
                <div class="modal-content">

                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div id="dialogImportCTDT" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
            <div class="modal-dialog" style="width:400px !important;height:600px !important">
                <div class="modal-content">
                    <form id="form_CTDT" name="frmCreateEmployee" class="form-horizontal" role="form" ng-submit="UpdateEmployee()" method="post"  enctype="multipart/form-data">
                        <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h5><strong class="modal-title">Thêm Chương Trình Đào Tạo</strong></h5>
                        </div>
                        <div class="modal-header btn-danger" style="padding:0px;text-align:center" id="msg-fail-import-ctdt" hidden>
                            <h5><strong class="modal-title"></strong></h5>
                        </div>

                        <div class="modal-header btn-success" style="padding:0px;text-align:center" id="msg-success-import-ctdt" hidden>
                            <h5><strong class="modal-title"></strong></h5>
                        </div>
                        
                        <div class="modal-body">
                            <div class="row" style="margin:10px">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label class="coltrol-lable">Ngành:</label>
                                        <select class="form-control" id="nganhhocImportCTDT" name="nganhhoc">
                                          <option value="">--- Chọn Ngành Học ---</option>
                                          <?php foreach ($listnganhhoc as $row):?>
                                          <option value="<?php echo $row->nganhhoc_id ?>"><?php echo $row->tennganh ?></option>
                                          <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">Khóa:</label>
                                        <select class="form-control" id="khoahocImportCTDT" name="khoahoc" disabled>
                                            <option value="">--- Chọn Khóa Học ---</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">File Input:</label>
                                        <input type="file" id="fileCTDT" name="file">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding:0px">
                            <input type="button" class="btn btn-sm btn-success" id="submit_ctdt_import" name="Thêm" value="Thêm">
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
        <div id="dialogImportKHDT" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
            <div class="modal-dialog" style="width:400px !important;height:600px !important">
                <div class="modal-content">
                    <form id="form_KHDT" name="frmCreateEmployee" class="form-horizontal" role="form" method="post"ng-submit="UpdateEmployee()"  enctype="multipart/form-data">
                        <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h5><strong class="modal-title">Thêm Kế Hoạch Đào Tạo</strong></h5>
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
									                  <div class="form-group">
                                        <label class="coltrol-lable">Ngành:</label>
                                        <select class="form-control" id="nganhhocImport" name="nganhhoc">
                                          <option value= "">--- Chọn Ngành Học ---</option>
                                          <?php foreach ($listnganhhoc as $row):?>
                                          <option value="<?php echo $row->nganhhoc_id ?>"><?php echo $row->tennganh ?></option>
                                          <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">Khóa:</label>
                                        <select class="form-control" id="khoahocImport" name="khoahoc" disabled>
                                          <option value="">--- Chọn Khóa Học ---</option>

                                        </select>
                                    </div>
									                  <div class="form-group">
                                        <label class="coltrol-lable">File Input:</label>
                                        <input type="file" id="fileKHDT" name="file">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding:0px">
                            <input type="button" class="btn btn-sm btn-success" id="submit_khdt_import" name="Thêm" value="Thêm">
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
        <div id="dialogEditCTDT" data-backdrop = "static" data-keyboard = "false" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
            <div class="modal-dialog" style="width:400px !important;height:600px !important">
                <div class="modal-content">
                    <form id="form-Edit-CTDT" name="frmCreateEmployee" class="form-horizontal" role="form" method="post" ng-submit="UpdateEmployee()" enctype="multipart/form-data">
                        <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                            <button onclick="reload()" type="button" class="close" data-dismiss="modal">×</button>
                            <h5><strong class="modal-title">Sửa Thông Tin Chương Trình Đào Tạo</strong></h5>
                        </div>
                        <div class="modal-header btn-danger" style="padding:0px;text-align:center" id="msg-validation-edit-ctdt" hidden="hidden">
                            <h5><strong class="modal-title"></strong></h5>
                        </div>
                        <div hidden="hidden" id="msg-success-edit-ctdt" class="modal-header add_success" style="padding:0px;text-align:center">
                            <h5><strong class="modal-title"></strong></h5>
                        </div>
                        <div hidden="hidden" id="msg-fail-edit-ctdt" class="modal-header add_fail" style="padding:0px;text-align:center">
                            <h5><strong class="modal-title"></strong></h5>
                        </div>

                        <div class="modal-body">
                            <div class="row" style="margin:10px">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <div  class="form-group">
                                        <label class="coltrol-lable">Ngành:</label>
                                        <input class="form-control" id="tennganh_edit_ctdt" name="tennganh_edit_ctdt" disabled>
                                    </div>
                                    <div  class="form-group">
                                        <label class="coltrol-lable">Khóa:</label>
                                        <input class="form-control" id="tenkhoa_edit_ctdt" name="tenkhoa_edit_ctdt" disabled>
                                    </div>
                                    <div hidden class="form-group">
                                        <label class="coltrol-lable">CTDT:</label>
                                        <input class="form-control" id="idctdt_edit_ctdt" name="idctdt_edit_ctdt" >
                                    </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">File Input:</label>
                                        <input type="file" id="fileCTDT_Edit" name="file" >
                                    </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">Ghi chú:</label>
                                        <textarea class="form-control" id="ghichu_edit_ctdt" name="ghichu"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="thumbnail">
                                          <div class="row">
                                          <div class="col-xs-3 center">
                                          <a id="tenfile_edit_ctdt" href="" alt="" title="" ><img src="<?php echo base_url('public/Img/Word.jpg') ?>" style = "width: 70px;height: 70px;"></a>
                                          </div>
                                          </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding:0px">
                            <input type="button" class="btn btn-sm btn-success" value="Sửa" id="submit_edit_ctdt" name="submit">
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
<div class="row">
    <div class="col-xs-12">
        <div id="dialogValidation_Import_CTDT" data-backdrop = "static" data-keyboard = "false" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
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
                    <div class="row">
                        <div class="col-xs-12">

                        </div>
                    </div>
                </div>
            </div>
