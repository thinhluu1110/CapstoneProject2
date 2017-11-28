<div class="main-content-inner">
    <div class="page-content">
        <img id="ajax-loader" src="http://aspnet.demo.hueuni.edu.vn/StudentManager/images/ajax-loader.gif" alt="">
        <div class="page-header">

            <div class="hitec-content">
                <h2>ĐIỂM RÈN LUYỆN</h2>
                <div class="container-fluid">
                    <form method="post" action="<?php echo base_url('Giaovu/Diemrenluyen/index')?>" id="formSearch" role="form" onsubmit="return true;">
                        <div class="row">
                          <div class="col-xs-3">
                              <div class="input-group hitec-w-100percent">
                                  <select class="form-control" id="nganhhoc" name="nganhhoc" onchange='if(this.value != 0) { this.form.submit(); }'>
                                      <option value="">--- Chọn Ngành Học ---</option>
                                      <?php foreach ($listnganhhoc as $row):?>
                                          <option value="<?php echo $row->nganhhoc_id ?>" <?php echo ($this->input->post('nganhhoc') == $row->nganhhoc_id) ? 'selected' : ''?> ><?php echo $row->tennganh ?></option>
                                      <?php endforeach;?>
                                  </select>
                              </div>
                          </div>
                            <div class="col-xs-3">
                                <div class="input-group hitec-w-100percent">
                                    <select class="form-control" id="khoahoc" name="khoahoc" onchange='if(this.value != 0) { this.form.submit(); }'>
                                        <option value="">--- Chọn Khóa Học ---</option>
                                        <?php foreach ($listkhoahoc as $row):?>
                                            <option value="<?php echo $row['khoahoc_id'] ?>" <?php echo ($this->input->post('khoahoc') == $row['khoahoc_id']) ? 'selected' : ''?> ><?php echo $row['tenkhoa'] ?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="input-group hitec-w-100percent">
                                    <select class="form-control" id="hocki" name="hocki" onchange='if(this.value != 0) { this.form.submit(); }'>
                                        <option value="">--- Chọn Học Kỳ ---</option>
                                        <?php foreach ($listhk as $row):?>
                                            <option value="<?php echo $row['hocki_id'] ?>" <?php echo ($this->input->post('hocki') == $row['hocki_id']) ? 'selected' : ''?> ><?php echo $row['tenHocki'] ?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="input-group add-on hitec-w-100percent">
                                    <input class="form-control" placeholder="Tìm kiếm theo mã Sinh Viên" type="text" value="">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default" type="button"><span class="fa fa-search"></span>Tìm Kiếm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="searchResult" style="margin-top:5px;">
                  <?php if ($this->session->userdata('phanquyen') == 2) { ?>
                    <div class="container-fluid text-right">
                        <a href="javascript:void(0)"  title="Import excel" data-toggle="modal" data-target="#dialogImport">[Nhập Điểm Rèn Luyện]</a>
                    </div>
                  <?php } ?>
                    <div class="container-fluid">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width:40px" class="text-center">
                                        STT
                                    </th>
                                    <th style="width:100px" class="text-center">
                                        Mã SV
                                    </th>
                                    <th style="width:auto" class="text-center">
                                        Họ Tên
                                    </th>
                                    <th style="width:180px" class="text-center">
                                        Ngành
                                    </th>
                                    <th style="width:180px" class="text-center">
                                        Khóa
                                    </th>
                                    <th style="width:180px" class="text-center">
                                        Học Kì
                                    </th>
                                    <th style="width:80px" class="text-center">
                                        Điểm Rèn Luyện
                                    </th>
                                    <th style="width:180px" class="text-center">
                                        Xếp Loại
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php for($i =0 ;$i< @count($listDiem);$i++){?>
                                <tr>

                                    <td class="text-center">
                                        <?php
                                          echo $i + 1;
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $listDiem[$i]['MSSV'] ?>
                                    </td>
                                    <td>
                                        <?php echo $listDiem[$i]['Ho']." ".$listDiem[$i]['Ten'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $listDiem[$i]['tennganh'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $listDiem[$i]['tenkhoa'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $listDiem[$i]['tenHocki'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo$listDiem[$i]['diem'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo$listDiem[$i]['xeploai'] ?>
                                    </td>
                                </tr>
                                <?php }?>

                            </tbody>
                        </table>
                    </div>
                    <div class="container-fluid text-right">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div id="dialogImport" data-backdrop = "static" data-keyboard = "false" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
                        <div class="modal-dialog" style="width:400px !important;height:600px !important">
                            <div class="modal-content">
                                <form id="form_DRL" name="frmCreateEmployee" class="form-horizontal" role="form" ng-submit="UpdateEmployee()" method="post"  enctype="multipart/form-data">
                                    <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                                        <button onclick="reload()" type="button" class="close" data-dismiss="modal">×</button>
                                        <h5><strong class="modal-title">Thêm Điểm Rèn Luyện</strong></h5>
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
                                                  <label class="coltrol-lable">Khóa:</label>
                                                  <select class="form-control" id="nganhhocImportDRL" name="nganhhoc">
                                                      <option value="">--- Chọn Ngành Học ---</option>
                                                      <?php foreach ($listnganhhoc as $row):?>
                                                          <option value="<?php echo $row->nganhhoc_id ?>"><?php echo $row->tennganh ?></option>
                                                      <?php endforeach;?>
                                                  </select>
                                              </div>
                                                <div class="form-group">
                                                    <label class="coltrol-lable">Khóa:</label>
                                                    <select class="form-control" id="khoahocImportDRL" name="khoahoc" disabled>
                                                        <option selected="selected" value="">--- Chọn Khóa Học ---</option>

                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="coltrol-lable">Học Kì:</label>
                                                    <select class="form-control" id="hockiImportDRL" name="hocki">
                                                      <option selected="selected" value="">--- Chọn Học Kỳ ---</option>
                                                      <?php foreach ($listhk as $row):?>
                                                          <option value="<?php echo $row['hocki_id'] ?>"><?php echo $row['tenHocki'] ?></option>
                                                      <?php endforeach;?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="coltrol-lable">Chọn Tập Tin:</label>
                                                    <input type="file" id="fileDRL" name="file">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer" style="padding:0px">
                                       <input type="button" class="btn btn-sm btn-success" id="submit_DRL_import" name="Thêm" value="Thêm">
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
