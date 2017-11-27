<div class="main-content-inner">
            <div class="page-content">
                <!--                    <img id="ajax-loader" src="/image/ajax-loader.gif" alt="" />-->
                <div class="page-header">
                    <div class="hitec-content">
                        <h2>Danh sách môn học</h2>
                        <div id="searchResult" style="margin-top:5px;">
                            <div class="container-fluid">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="text-center" style="width:40px">STT</th>
                                        <th class="text-center" style="width:100px" >Mã Môn Học</th>
                                        <th class="text-center" style="width:auto" >Tên Môn Học</th>
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
                                    $list = $listmonhoc;
                                    for ($i=0; $i < count($list) ; $i++) {
                                    ?>
                                     <tr>
                                      <td class="hitec-td-1 text-center"> <?php echo $i+1 ?> </td>
                                      <td class="hitec-td-1 text-center" ><?php echo $list[$i]['MaMH'] ?></td>
                                      <td class="hitec-td-1 text-center" ><?php echo $list[$i]['TenMH'] ?></td>
                                      <?php if ($this->session->userdata('phanquyen') == 1) {?>
                                        <td class="hitec-td-1 text-center">
                                        <a  class="btn-sm btn-info edit_mon" id="<?php echo $list[$i]['monhoc_id'] ?>"  data-toggle="modal" data-target="#dialogEdit" style="margin-right: 4px;">
                                             <i class="fa fa-eye"></i>
                                         </a>
                                         <a  class="btn-sm btn-danger delete_mon" id="<?php echo $list[$i]['monhoc_id'] ?>" data-toggle="modal" data-target="#dialogDelete" style="margin-right: 4px;">
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
                    <form id="form-add-monhoc" name="frmCreateEmployee" class="form-horizontal" role="form" method="post"  enctype="multipart/form-data">
                        <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                            <button onclick="reload()" type="button" class="close" data-dismiss="modal">×</button>
                            <h5><strong class="modal-title">Thêm Môn Học <?php echo $this->session->flashdata('message')?></strong></h5>
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
                                        <label class="coltrol-lable">Nhập Mã Môn Học:<?php echo form_error('mamonhoc') ?></label>
                                        <input class="form-control" id="mamon_add_monhoc" name="mamonhoc" />
                                    </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">Nhập Tên Môn Học:<?php echo form_error('tenmonhoc') ?></label>
                                        <input class="form-control" id="tenmon_add_monhoc" name="tenmonhoc" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding:0px">
                            <input type="button" class="btn btn-sm btn-success" value="Thêm" id="submit_addmonhoc" name="submit">
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
                    <form id="form-Edit-Monhoc" name="frmCreateEmployee" class="form-horizontal" role="form" method="post"  enctype="multipart/form-data">
                        <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                            <button onclick="reload()" type="button" class="close" data-dismiss="modal">×</button>
                            <h5><strong class="modal-title">Sửa Thông Tin Môn Học</strong></h5>
                        </div>
                        <div hidden="hidden" id="msg-success-edit-mon" class="modal-header add_success" style="padding:0px;text-align:center">
                            <h5><strong class="modal-title"></strong></h5>
                        </div>
                        <div hidden="hidden" id="msg-fail-edit-mon" class="modal-header add_fail" style="padding:0px;text-align:center">
                            <h5><strong class="modal-title"></strong></h5>
                        </div>
                        <div class="modal-body">
                            <div class="row" style="margin:10px">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                <div hidden class="form-group">
                                    <input  class="form-control" id="idmon_edit" value="" name="idnmon_edit" />
                                </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">Nhập Mã Môn Học:</label>
                                        <input class="form-control" value="" id="mamon_edit" name="mamon_edit"  />
                                    </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">Nhập Tên Môn Học:</label>
                                        <input class="form-control" value="" id="tenmon_edit" name="tenmon_edit" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding:0px">
                          <input type="button" class="btn btn-sm btn-success" id="submit_editmon" name="Sửa" value="Sửa">
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
                <form id="form-delete-monhoc" name="frmCreateEmployee" method="post"  class="form-horizontal" role="form" ng-submit="UpdateEmployee()">
                    <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                        <button onclick="reload()" type="button" class="close" data-dismiss="modal">×</button>
                        <h5><strong class="modal-title">Xóa Môn Học</strong></h5>
                        </div>
                        <div hidden="hidden" id="msg-success-delete-mon" class="modal-header add_success" style="padding:0px;text-align:center">
                            <h5><strong class="modal-title"></strong></h5>
                        </div>
                        <div hidden="hidden" id="msg-fail-delete-mon" class="modal-header add_fail" style="padding:0px;text-align:center">
                            <h5><strong class="modal-title"></strong></h5>
                        </div>
                    <div hidden class="form-group">
                        <input  class="form-control" id="idmon_delete" value="" name="idmon_delete" />
                    </div>
                <div class="modal-body text-center">
                <strong>Bạn có muốn xóa bản ghi ?</strong>
              </div>
              <div class="modal-footer" style="padding:0px">
                <input type="button" class="btn btn-sm btn-danger" id="submit_delmon" name="Xóa" value="Xóa">
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
