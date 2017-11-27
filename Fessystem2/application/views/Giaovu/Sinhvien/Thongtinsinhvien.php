<div class="main-content">
            <div class="main-content-inner">
                <div class="page-content">
                    <img id="ajax-loader" src="http://aspnet.demo.hueuni.edu.vn/StudentManager/images/ajax-loader.gif" alt="" />
                    <div class="page-header">



<div class="col-xs-12 col-offset-200">
    <div class="hitec-content">
        <img id="ajax-loader" src="/Teacher/images/icons/ajax-loader.gif" alt="" style="display: none;">
        <h2>TRA CỨU THÔNG TIN SINH VIÊN</h2>
        <div class="container-fluid">
            <form method="post" action="<?php echo base_url('Giaovu/Thongtinsinhvien/index')?>" id="formSearch" role="form" onsubmit="return true;">
                <div class="row">
                    <div class="col-xs-3">
                        <div class="input-group hitec-w-100percent">
                          <select class="form-control" id="nganhhoc_ttsv" name="nganhhoc_ttsv" onchange='if(this.value != 0) { this.form.submit(); }' >
                              <option value="">--- Chọn ngành học ---</option>
                              <?php foreach ($listnganhhoc as $row):?>
                              <option value="<?php echo $row->nganhhoc_id ?>" <?php echo ($this->input->post('nganhhoc_ttsv') == $row->nganhhoc_id) ? 'selected' : '' ?> ><?php echo $row->tennganh ?></option>
                              <?php endforeach;?>
                          </select>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="input-group hitec-w-100percent">
                          <select class="form-control" id="khoahoc_ttsv" name="khoahoc_ttsv" onchange='if(this.value != 0) { this.form.submit(); }' >
                              <option value="">--- Chọn khóa học ---</option>
                              <?php foreach ($listkhoahoc as $row):?>
                              <option value="<?php echo $row['khoahoc_id'] ?>" <?php echo ($this->input->post('khoahoc_ttsv') == $row['khoahoc_id']) ? 'selected' : '' ?> ><?php echo $row['tenkhoa'] ?></option>
                              <?php endforeach;?>
                          </select>
                        </div>
                    </div>
                    <div class="col-xs-5">
                        <div class="input-group add-on hitec-w-100percent">
                            <input class="form-control" id="search" name="search" placeholder="Tìm kiếm theo mã sinh viên" type="text" >
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-default" type="submit" ><span class="fa fa-search"></span></button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>

        <div id="searchResult" style="margin-top:5px;">
          <?php if ($this->session->userdata('phanquyen') == 2) { ?>
            <div class="container-fluid text-right">
                          <a href="javascript:void(0)"  title="Import excel" data-toggle="modal" data-target="#dialogImport">[Nhập Danh Sách Sinh Viên]</a>
            </div>
          <?php } ?>
            <div class="container-fluid">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th style="width:80px" class="text-center">
                                STT
                            </th>
                            <th style="width:120px" class="text-center">
                                Mã sinh viên
                            </th>
                            <th style="width:300px" class="text-center">
                                Họ và tên
                            </th>
                            <th style="width:80px" class="text-center">
                                Giới tính
                            </th>
                            <th style="width:100px" class="text-center">
                                Ngày sinh
                            </th>
                            <th style="width:100px" class="text-center">
                                Điện thoại
                            </th>
                            <th style="width:auto" class="text-center">
                                Email
                            </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                      <?php for ($i=0; $i < @count($listSV) ; $i++) { ?>
                        <tr >
                            <td class="text-center">
                               <?php echo $i + 1 ?>
                            </td>
                            <td class="text-center">
                               <?php echo $listSV[$i]['MSSV']?>
                            </td>
                            <td>
                                <?php echo $listSV[$i]['Ho'].' '.$listSV[$i]['Ten']?>
                            </td>
                            <td class="text-center">
                                <?php echo $listSV[$i]['Phai']?>
                            </td>
                            <td class="text-center">
                                <?php echo $listSV[$i]['Ngaysinh']?>
                            </td>
                            <td class="text-center">
                                <?php echo $listSV[$i]['SDT']?>
                            </td>
                            <td>
                                <?php echo $listSV[$i]['Email']?>
                            </td>
                            
                        </tr>
                      <?php } ?>
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
                    <form id="form_Sinhvien" name="frmCreateEmployee" class="form-horizontal" role="form" method="post" ng-submit="UpdateEmployee()"  enctype="multipart/form-data">
                        <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                            <button onclick="reload()" type="button" class="close" data-dismiss="modal">×</button>
                            <h5><strong class="modal-title">Thêm Sinh Viên</strong></h5>
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
                                      <select class="form-control" id="nganhhocImportSV" name="nganhhoc">
                                        <option value="">--- Chọn Ngành Học ---</option>
                                        <?php foreach ($listnganhhoc as $row):?>
                                        <option value="<?php echo $row->nganhhoc_id ?>"><?php echo $row->tennganh ?></option>
                                        <?php endforeach;?>
                                      </select>
                                  </div>
                                                      <div class="form-group">
                                        <label class="coltrol-lable">Khóa:</label>
                                        <select class="form-control" id="khoahocImportSV" name="khoahoc" disabled>
                                          <option value="">--- Chọn Khóa Học ---</option>

                                        </select>
                                    </div>
                                                      <div class="form-group">
                                        <label class="coltrol-lable">File Input:</label>
                                        <input type="file" id="fileSV" name="file">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding:0px">
                            <input type="button" class="btn btn-sm btn-success" id="submit_sv_import" name="Thêm" value="Thêm">
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
