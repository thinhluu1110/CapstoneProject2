<div class="main-content-inner">
            <div class="page-content">
                <!--                    <img id="ajax-loader" src="/image/ajax-loader.gif" alt="" />-->
                <div class="page-header">
                    <div class="hitec-content">
                        <h2>Danh sách khóa học</h2>
                        <div class="container-fluid">
                          <form method="post"  id="formSearch" role="form" onsubmit="return true;">
                            <div class="row">
                                <div class="col-xs-2">
                                    <div class="input-group hitec-w-100percent">
                                        <select class="form-control" id="nganhhoc" name="nganhhoc" onchange='if(this.value != 0) { this.form.submit(); }' >
                                            <option value="">--- Chọn ngành học ---</option>
                                            <?php foreach ($listnganhhoc as $row):?>
                                            <option value="<?php echo $row['nganhhoc_id'] ?>" <?php echo ($this->input->post('nganhhoc') == $row['nganhhoc_id']) ? 'selected' : '' ?> ><?php echo $row['tennganh'] ?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
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
                                        <th class="text-center" style="width:auto" >Tên Khóa</th>
                                        <th class="text-center" style="width:120px" >Năm Bắt Đầu</th>
                                        <th class="text-center" style="width:120px" >Năm Kết Thúc</th>
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
                                    $list = $listkhoahoc;
                                    for ($i=0; $i < count($list) ; $i++) {
                                    ?>
                                     <tr>
                                      <td class="hitec-td-1 text-center"> <?php echo $i+1 ?> </td>
                                      <td class="hitec-td-1 text-center" ><?php echo $list[$i]['tenkhoa'] ?></td>
                                      <td class="hitec-td-1 text-center" ><?php echo $list[$i]['nam_batdau'] ?></td>
                                      <td class="hitec-td-1 text-center" ><?php echo $list[$i]['nam_ketthuc'] ?></td>
                                      <?php if ($this->session->userdata('phanquyen') == 1) {?>
                                        <td class="hitec-td-1 text-center">
                                        <a  class="btn-sm btn-info edit_khoa" id="<?php echo $list[$i]['khoahoc_id'] ?>"  data-toggle="modal" data-target="#dialogEdit" style="margin-right: 4px;">
                                             <i class="fa fa-eye"></i>
                                         </a>
                                         <a class="btn-sm btn-danger delete_khoa" id="<?php echo $list[$i]['khoahoc_id'] ?>" data-toggle="modal" data-target="#dialogDelete" style="margin-right: 4px;">
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
                    <form id="form-add-khoahoc" name="frmCreateEmployee" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                        <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                            <button onclick="reload()" type="button" class="close" data-dismiss="modal">×</button>
                            <h5><strong class="modal-title">Thêm Khóa Học</strong></h5>
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
                                      <label class="coltrol-lable">Ngành:</label>
                                      <select class="form-control" id="nganhhoc_add_khoahoc" name="nganhhoc">
                                      <option value="">--- Chọn Ngành Học ---</option>
                                      <?php foreach($listnganhhoc as $row):?>
                                      <option value="<?php echo $row['nganhhoc_id'] ?>" > <?php echo $row['tennganh'] ?></option>
                                      <?php endforeach; ?>
                                      </select>
                                  </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">Nhập Khóa Học:</label>
                                        <input class="form-control" id="khoahoc_add_khoahoc" name="khoahoc" />
                                    </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">Nhập Năm Bắt Đầu:</label>
                                        <input class="form-control" id="nambd_add_khoahoc" name="nambd" />
                                    </div>
                                    <!-- <div hidden class="form-group">
                                        <label class="coltrol-lable">Nhập Năm Kết Thúc:</label>
                                        <input class="form-control" id="namkt_add_khoahoc" name="namkt" />
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding:0px">
                            <input type="button" class="btn btn-sm btn-success" value="Thêm" id="submit_addkhoa" name="submit">

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
                    <form id="form-Edit-Khoahoc" name="frmCreateEmployee" class="form-horizontal" role="form" method="post"  enctype="multipart/form-data">
                        <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                            <button onclick="reload()" type="button" class="close" data-dismiss="modal">×</button>
                            <h5><strong class="modal-title">Sửa Thông Tin Khóa Học</strong></h5>
                        </div>
                        <div hidden="hidden" id="msg-success-edit-khoa" class="modal-header add_success" style="padding:0px;text-align:center">
                            <h5><strong class="modal-title"></strong></h5>
                        </div>
                        <div hidden="hidden" id="msg-fail-edit-khoa" class="modal-header add_fail" style="padding:0px;text-align:center">
                            <h5><strong class="modal-title"></strong></h5>
                        </div>
                        <div class="modal-body">
                            <div class="row" style="margin:10px">
                                <div class="col-xs-12 col-md-12 col-lg-12">

                                    <div hidden class="form-group">
                                        <input  class="form-control" id="idkhoa_edit" value="" name="idkhoa_edit" />
                                    </div>
                                    <div hidden class="form-group">
                                        <input  class="form-control" id="idnganh_khoa_edit" value="" name="idnganh_khoa_edit" />
                                    </div>
                                    <div class="form-group" >
                                        <label class="coltrol-lable">Nhập Tên Ngành:</label>
                                        <input  class="form-control" id="tennganh_khoa_edit" value="" name="tennganh_khoa_edit" disabled />
                                    </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">Nhập Tên Khóa:</label>
                                        <input class="form-control" value="" id="tenkhoa_edit" name="tenkhoa_edit" disabled />
                                    </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">Nhập Năm Bắt Đầu:</label>
                                        <input class="form-control" value="" id="nambd_edit" name="nambd_edit" />
                                    </div>
                                   <!--  <div class="form-group">
                                        <label class="coltrol-lable">Nhập Năm Kết Thúc:</label>
                                        <input class="form-control" value="" id="namkt_edit" name="namkt_edit" />
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding:0px">
                          <input type="button" class="btn btn-sm btn-success" id="submit_editkhoa" name="Sửa" value="Sửa">
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
                <form id="form-delete-khoahoc" name="frmCreateEmployee" method="post"  class="form-horizontal" role="form" ng-submit="UpdateEmployee()">
                    <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                        <button onclick="reload()" type="button" class="close" data-dismiss="modal">×</button>
                        <h5><strong class="modal-title">Xóa Khóa Học</strong></h5>
                        </div>
                        <div hidden="hidden" id="msg-success-delete-khoa" class="modal-header add_success" style="padding:0px;text-align:center">
                            <h5><strong class="modal-title"></strong></h5>
                        </div>
                        <div hidden="hidden" id="msg-fail-delete-khoa" class="modal-header add_fail" style="padding:0px;text-align:center">
                            <h5><strong class="modal-title"></strong></h5>
                        </div>
                    <div hidden class="form-group">
                        <input  class="form-control" id="idkhoa_delete" value="" name="idkhoa_delete" />
                    </div>
                <div class="modal-body text-center">
                <strong>Bạn có muốn xóa bản ghi ?</strong>
              </div>
              <div class="modal-footer" style="padding:0px">
                <input type="button" class="btn btn-sm btn-danger" id="submit_delkhoa" name="Xóa" value="Xóa">
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
        <div id="dialogValidation_Add_Khoa" data-backdrop = "static" data-keyboard = "false" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
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
