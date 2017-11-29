<div class="main-content-inner">
            <div class="page-content">
                <!--                    <img id="ajax-loader" src="/image/ajax-loader.gif" alt="" />-->
                <div class="page-header">
                    <div class="hitec-content">
                        <h2>Danh sách ngành học</h2>
                        <div id="searchResult" style="margin-top:5px;">
                            <div class="container-fluid">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center" style="width:40px">STT</th>
                                        <th class="text-center" style="width:200px">Mã Ngành</th>
                                        <th class="text-center" style="width:auto" >Tên Ngành</th>
                                        <?php if ($this->session->userdata('phanquyen') == 1) {?>
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
                                    $list = $listnganhhoc;
                                    for ($i=0; $i < count($list) ; $i++) {
                                    ?>
                                     <tr>
                                      <td class="hitec-td-1 text-center"> <?php echo $i+1 ?> </td>
                                      <td class="hitec-td-1 text-center" ><?php echo $list[$i]['ma_nganhhoc'] ?></td>
                                      <td class="hitec-td-1 text-center" ><?php echo $list[$i]['tennganh'] ?></td>
                                      <?php if ($this->session->userdata('phanquyen') == 1) {?>
                                        <td class="hitec-td-1 text-center">
                                        <a  class="btn-sm btn-info edit_nganh" id="<?php echo $list[$i]['nganhhoc_id'] ?>"   data-toggle="modal" data-target="#dialogEdit" style="margin-right: 4px;">
                                             <i class="fa fa-eye"></i>
                                         </a>
                                         <a class="btn-sm btn-danger delete_nganh" id="<?php echo $list[$i]['nganhhoc_id'] ?>" data-toggle="modal" data-target="#dialogDelete" style="margin-right: 4px;">
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
                            <h5><strong class="modal-title">Thêm Ngành Học</strong></h5>
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
                                        <label class="coltrol-lable">Nhập Mã Ngành:</label>
                                        <input class="form-control" id="manganh" name="manganh" />
                                    </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">Nhập Tên Ngành:</label>
                                        <input class="form-control" id="tennganh" name="tennganh" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding:0px">
                          <input type="button" class="btn btn-sm btn-success" id="submit_add" name="Thêm" value="Thêm">
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
                    <form id="form-Edit-Nganhhoc" name="frmCreateEmployee" class="form-horizontal" role="form" method="post"  enctype="multipart/form-data">
                        <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                            <button onclick="reload()" type="button" class="close" data-dismiss="modal">×</button>
                            <h5><strong class="modal-title">Sửa Thông Tin Ngành Học</strong></h5>
                        </div>
                        <div hidden="hidden" id="msg-success-edit-nganh" class="modal-header add_success" style="padding:0px;text-align:center">
                            <h5><strong class="modal-title"></strong></h5>
                        </div>
                        <div hidden="hidden" id="msg-fail-edit-nganh" class="modal-header add_fail" style="padding:0px;text-align:center">
                            <h5><strong class="modal-title"></strong></h5>
                        </div>
                        <div class="modal-body">
                            <div class="row" style="margin:10px">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                <div hidden class="form-group">
                                    <input  class="form-control" id="idnganh_edit" value="" name="idnganh_edit" />
                                </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">Nhập Mã Ngành:</label>
                                        <input class="form-control" value="" id="manganh_edit" name="manganh_edit" disabled />
                                    </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">Nhập Tên Ngành:</label>
                                        <input class="form-control" value="" id="tennganh_edit" name="tennganh_edit" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding:0px">
                          <input type="button" class="btn btn-sm btn-success" id="submit_editnganh" name="Sửa" value="Sửa">
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
                <form id="form-delete-nganhhoc" name="frmCreateEmployee" method="post"  class="form-horizontal" role="form" ng-submit="UpdateEmployee()">
                        <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                            <button onclick="reload()" type="button" class="close" data-dismiss="modal">×</button>
                            <h5><strong class="modal-title">Xóa Ngành Học</strong></h5>
                        </div>
                        <div hidden="hidden" id="msg-success-delete-nganh" class="modal-header add_success" style="padding:0px;text-align:center">
                            <h5><strong class="modal-title"></strong></h5>
                        </div>
                        <div hidden="hidden" id="msg-fail-delete-nganh" class="modal-header add_fail" style="padding:0px;text-align:center">
                            <h5><strong class="modal-title"></strong></h5>
                        </div>
                    <div hidden class="form-group">
                        <input  class="form-control" id="idnganh_delete" value="" name="idnganh_delete" />
                    </div>
                <div class="modal-body text-center">
                <strong>Bạn có muốn xóa bản ghi ?</strong>
              </div>
              <div class="modal-footer" style="padding:0px">
                <input type="button" class="btn btn-sm btn-danger" id="submit_delnganh" name="Xóa" value="Xóa">
            </div>
        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div id="dialogValidation_Add_Nganh" data-backdrop = "static" data-keyboard = "false" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
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
