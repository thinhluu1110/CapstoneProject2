<div class="main-content">
            <div class="main-content-inner">
                <div class="page-content">
                    <img id="ajax-loader" src="http://aspnet.demo.hueuni.edu.vn/StudentManager/images/ajax-loader.gif" alt="" />
                    <div class="page-header">



<div class="col-xs-12 col-offset-200">
    <div class="hitec-content">
        <img id="ajax-loader" src="/Teacher/images/icons/ajax-loader.gif" alt="" style="display: none;">
        <h2>Học Phí</h2>
        <h2><?php echo @$listHP[1]['noidung'] ?></h2>
        <div class="container-fluid">
            <form method="post" action="<?php echo base_url('Giaovu/Hocphi/index')?>" id="formSearch" role="form" onsubmit="return true;">
                <div class="row">
                  <div class="col-xs-4">
                      <div class="input-group hitec-w-100percent">
                        <select class="form-control" id="nganhhoc" name="nganhhoc" onchange='if(this.value != 0) { this.form.submit(); }'>
                            <option value="">--- Chọn Ngành Học ---</option>
                            <?php foreach ($listnganhhoc as $row):?>
                                <option value="<?php echo $row->nganhhoc_id ?>" <?php echo ($this->input->post('nganhhoc') == $row->nganhhoc_id) ? 'selected' : ''?> ><?php echo $row->tennganh ?></option>
                            <?php endforeach;?>
                        </select>
                      </div>
                  </div>
                    <div class="col-xs-4">
                        <div class="input-group hitec-w-100percent">
                          <select class="form-control" id="khoahoc" name="khoahoc" onchange='if(this.value != 0) { this.form.submit(); }'>
                              <option value="">--- Chọn Khóa Học ---</option>
                              <?php foreach ($listkhoahoc as $row):?>
                                  <option value="<?php echo $row['khoahoc_id'] ?>" <?php echo ($this->input->post('khoahoc') == $row['khoahoc_id']) ? 'selected' : ''?> ><?php echo $row['tenkhoa'] ?></option>
                              <?php endforeach;?>
                          </select>
                        </div>
                    </div>
                    <!-- <div class="col-xs-4">
                        <div class="input-group add-on hitec-w-100percent">
                            <input class="form-control" id="searchvalue" name="SearchValue" placeholder="Tìm kiếm theo tên/max sinh viên" type="text" value="">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-default" type="button"><span class="fa fa-search"></span></button>
                            </div>
                        </div>
                    </div> -->
                </div>
            </form>
        </div>
        <div id="searchResult" style="margin-top:5px;">
          <?php if ($this->session->userdata('phanquyen') == 2) { ?>
            <div class="container-fluid text-right">
                <a href="javascript:void(0)"  title="Import excel" data-toggle="modal" data-target="#dialogImport">[Nhập Học Phí]</a>
            </div>
          <?php } ?>
            <div class="container-fluid">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th rowspan="2" style="width:80px" class="text-center">
                                STT
                            </th>
                            <th rowspan="2" style="width:120px" class="text-center">
                                Mã sinh viên
                            </th>
                            <th rowspan="2"style="width:auto" class="text-center">
                                Họ và tên
                            </th>
                            <th colspan="2"style="width:300px" class="text-center">
                                Học Phí Còn Nợ
                            </th>
                            <th rowspan="2"style="width:250px" class="text-center">
                                Tổng Học Phí Còn Nợ
                            </th>
                        </tr>
                            <th style="width:250px" class="text-center">
                                Học Phí Chính
                            </th>
                            <th style="width:250px" class="text-center">
                                Học Phí Học Lại
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php for ($i=0; $i < @count($listHP) ; $i++) {?>
                        <tr style="cursor:pointer" onclick="window.location.replace('Tuition.htmlLog')">
                            <td class="text-center">
                                <?php echo $i + 1 ?>
                            </td>
                            <td class="text-center">
                                <?php echo $listHP[$i]['MSSV'] ?>
                            </td>
                            <td class="text-center">
                                <?php echo $listHP[$i]['Ho'].' '.$listHP[$i]['Ten'] ?>
                            </td>
                            <td class="text-center">
                                <?php echo $listHP[$i]['hocphi_chinh'] ?>
                            </td>
                            <td class="text-center">
                                <?php echo $listHP[$i]['hocphi_hoclai'] ?>
                            </td>
                            <td class="text-center">
                                <?php echo $listHP[$i]['hocphi_tong'] ?>
                            </td>
                        </tr>
                      <?php }?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div id="dialogImport" data-backdrop = "static" data-keyboard = "false" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
            <div class="modal-dialog" style="width:400px !important;height:600px !important">
                <div class="modal-content">
                    <form id="frmEditEmployee" name="frmCreateEmployee" class="form-horizontal" role="form" ng-submit="UpdateEmployee()" method="post" action="" enctype="multipart/form-data">
                        <div  class="modal-header bg-primary" style="padding:0px;text-align:center">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h5><strong class="modal-title">Nhập Học Phí</strong></h5>
                        </div>
                        <div class="modal-header btn-success" style="padding:0px;text-align:center" id="msg-success-HocPhi" hidden>
                            <h5></h5>
                        </div>
                        <div class="modal-header btn-danger" style="padding:0px;text-align:center" id="msg-fail-HocPhi" hidden>
                            <h5></h5>
                        </div>
                        <div  id="loader_import_hp"  style="margin-top:20px;text-align:center;display:none;">
                            <img src="<?php echo base_url('public/Img/loader.gif') ?>" alt="">
                        </div>
                        <div class="modal-body">


                            <div class="row" style="margin:10px">
                                <div class="col-xs-12 col-md-12 col-lg-12">

                                    <div class="form-group">
                                        <label class="coltrol-lable">Chọn Tập Tin:</label>
                                        <input type="file" id="fileHocPhi" name="file">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding:0px">
                            <!-- <button class="btn btn-sm btn-success">Thêm</button> -->
                            <input type="button" id="submit_HocPhi" class="btn btn-sm btn-success" value="Thêm" name='submit' />
                            <button onclick="reload()" class="btn btn-sm btn-danger" data-dismiss="modal">Hủy</button>
                            <!-- <button class="btn btn-sm btn-danger" data-dismiss="modal">Thôi</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div id="dialogValidation_Import_HocPhi" data-backdrop = "static" data-keyboard = "false" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
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
        </div>
