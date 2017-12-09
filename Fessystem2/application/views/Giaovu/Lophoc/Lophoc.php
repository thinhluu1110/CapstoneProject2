<div class="main-content-inner">
            <div class="page-content">
                <!--                    <img id="ajax-loader" src="/image/ajax-loader.gif" alt="" />-->
                <div class="page-header">
                    <div class="hitec-content">
                        <h2>Danh sách lớp học</h2>
                        <div class="container-fluid">
                        <form method="get" action="<?php echo base_url('Giaovu/Lophoc/index')?>" id="formSearch" role="form" onsubmit="return true;">
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="input-group hitec-w-100percent">
                                    <select class="form-control" id="monhoc" name="monhoc" onchange='if(this.value != 0) { this.form.submit(); }'>
                                        <option value="">--- Chọn Môn Học ---</option>
                                        <?php foreach ($listmonhoc as $row):?>
                                        <option value="<?php echo $row['monhoc_id'] ?>" <?php echo ($this->input->get('monhoc') == $row['monhoc_id']) ? 'selected' : '' ?> ><?php echo $row['TenMH'] ?></option>
                                        <?php endforeach;?>
                                    </select>
                                    </div>
                                </div>
                                
<!--  -->
            </div>
        </form>
    </div>
                        <div id="searchResult" style="margin-top:5px;">
                            <div class="container-fluid">
                                </div>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center" style="width:40px">STT</th>
                                        <th class="text-center" style="width:auto" >Tên lớp</th>
                                        <?php if ($this->session->userdata('phanquyen') == 1) { ?>
                                        <th class="text-center" style="width:80px">
                                            <a href="javascript:void(0)" class="btn-sm btn-success" title="Thêm" data-toggle="modal" data-target="#dialogAdd">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </th>
                                      <?php } ?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    for ($i=0; $i < @count($listlophoc) ; $i++) {
                                    ?>
                                     <tr>
                                      <td class="hitec-td-1 text-center"> <?php echo $i+1 ?> </td>
                                      <td class="hitec-td-1 text-center" ><?php echo $listlophoc[$i]['tenlop'] ?></td>
                                      <?php if ($this->session->userdata('phanquyen') == 1) {?>
                                        <td class="hitec-td-1 text-center">
                                        <a  class="btn-sm btn-info edit_lop" id="<?php echo $listlophoc[$i]['lophoc_id'] ?>"  data-toggle="modal" data-target="#dialogEdit" style="margin-right: 4px;">
                                             <i class="fa fa-eye"></i>
                                         </a>
                                         <a  class="btn-sm btn-danger delete_lop" id="<?php echo $listlophoc[$i]['lophoc_id'] ?>" data-toggle="modal" data-target="#dialogDelete" style="margin-right: 4px;">
                                            <i class="fa fa-trash"></i>
                                         </a>
                                        </td>
                                      <?php } ?>
                                    </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <div class="row">
    <div class="col-xs-12">
        <div id="dialogAdd" data-backdrop = "static" data-keyboard = "false" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
            <div class="modal-dialog" style="width:400px !important;height:600px !important">
                <div class="modal-content">
                    <form id="form-Add" name="frmCreateEmployee" class="form-horizontal" role="form" method="post"  enctype="multipart/form-data">
                        <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                            <button onclick="reload()" type="button" class="close" data-dismiss="modal">×</button>
                            <h5><strong class="modal-title">Thêm Lớp</strong></h5>
                        </div>
                        <div hidden="hidden" id="msg-success" class="modal-header add_success" style="padding:0px;text-align:center">
                            <h5><strong class="modal-title">Thêm Thành Công</strong></h5>
                        </div>
                        <div hidden="hidden" id="msg-fail" class="modal-header add_fail" style="padding:0px;text-align:center">
                            <h5><strong class="modal-title"></strong></h5>
                        </div>
                        <div class="modal-body">
                            <div class="row" style="margin:10px">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label class="coltrol-lable">Môn Học:</label>
                                        <select class="form-control" id="monhoc_addlophoc" name="monhoc_addlophoc">
                                          <option value="">--- Chọn Môn Học ---</option>
                                          <?php foreach ($listmonhoc as $row):?>
                                          <option value="<?php echo $row['monhoc_id'] ?>"><?php echo $row['TenMH'] ?></option>
                                          <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">Nhập Tên Lớp:</label>
                                        <input class="form-control" id="tenlop" name="tenlop" />
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding:0px">
                            <input type="button" class="btn btn-sm btn-success" value="Thêm" id="submit_addlop" name="Thêm">
                            <button onclick="reload()" class="btn btn-sm btn-danger" data-dismiss="modal">Hủy</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div id="dialogEdit" data-backdrop = "static" data-keyboard = "false" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
            <div class="modal-dialog" style="width:400px !important;height:600px !important">
                <div class="modal-content">
                    <form id="form-Edit-Lophoc" name="frmCreateEmployee" class="form-horizontal" role="form" method="post"  enctype="multipart/form-data">
                        <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                            <button onclick="reload()" type="button" class="close" data-dismiss="modal">×</button>
                            <h5><strong class="modal-title">Sửa Thông Tin Lớp Học</strong></h5>
                        </div>
                        <div hidden="hidden" id="msg-success-edit-lop" class="modal-header add_success" style="padding:0px;text-align:center">
                            <h5><strong class="modal-title"></strong></h5>
                        </div>
                        <div hidden="hidden" id="msg-fail-edit-lop" class="modal-header add_fail" style="padding:0px;text-align:center">
                            <h5><strong class="modal-title"></strong></h5>
                        </div>
                        <div class="modal-body">
                            <div class="row" style="margin:10px">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                  <div hidden class="form-group">
                                    <input  class="form-control" id="idlop_edit" value="" name="idlop_edit" />
                                </div>
                                <div hidden class="form-group">
                                    <label class="coltrol-lable">ID Mon:</label>
                                    <input class="form-control" id="idmon_editlophoc" name="idmon_editlophoc" disabled>
                                </div>
                                <div  class="form-group">
                                    <label class="coltrol-lable">Môn Học:</label>
                                    <input class="form-control" id="tenmon_editlophoc" name="tenmon_editlophoc" disabled>
                                </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">Nhập Tên Lớp:</label>
                                        <input class="form-control" id="tenlop_edit" name="tenlop_edit" />
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding:0px">
                            <input type="button" class="btn btn-sm btn-success" value="Sửa" id="submit_editlop" name="Sửa">
                            <button onclick="reload()" class="btn btn-sm btn-danger" data-dismiss="modal">Hủy</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div id="dialogDelete" data-backdrop = "static" data-keyboard = "false" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
            <div class="modal-dialog" style="width:400px !important;height:600px !important">
                <div class="modal-content">
                <form id="form-delete-lophoc" name="frmCreateEmployee" method="post"  class="form-horizontal" role="form" ng-submit="UpdateEmployee()">
                    <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                        <button onclick="reload()" type="button" class="close" data-dismiss="modal">×</button>
                        <h5><strong class="modal-title">Xóa Lớp Học</strong></h5>
                        </div>
                        <div hidden="hidden" id="msg-success-delete-lop" class="modal-header add_success" style="padding:0px;text-align:center">
                            <h5><strong class="modal-title"></strong></h5>
                        </div>
                        <div hidden="hidden" id="msg-fail-delete-lop" class="modal-header add_fail" style="padding:0px;text-align:center">
                            <h5><strong class="modal-title"></strong></h5>
                        </div>
                    <div hidden class="form-group">
                        <input  class="form-control" id="idlop_delete" value="" name="idlop_delete" />
                    </div>
                <div class="modal-body text-center">
                <strong>Bạn có muốn xóa bản ghi ?</strong>
              </div>
              <div class="modal-footer" style="padding:0px">
                <input type="button" class="btn btn-sm btn-danger" id="submit_dellop" name="Xóa" value="Xóa">
                <button onclick="reload()" class="btn btn-sm btn-danger" data-dismiss="modal">Hủy</button>
            </div>
        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div id="dialogValidation_addlop" data-backdrop = "static" data-keyboard = "false" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
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
                <input type="button" style="width: 100%;" class="btn btn-sm btn-success" id="submit_addlop" name="Xóa" onclick="reload()" value="OK">
            </div>
        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div id="dialogEdit" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
            <div class="modal-dialog" style="width:400px !important;height:600px !important">
                <div class="modal-content">

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

                </div>
            </div>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>
