<div class="main-content">
    <div class="main-content-inner">
        <div class="page-content">
            <img id="ajax-loader" src="http://aspnet.demo.hueuni.edu.vn/StudentManager/images/ajax-loader.gif" alt="" />
            <div class="page-header">

<div class="hitec-content">
    <h2>KẾT QUẢ HỌC TẬP</h2>
    <div class="container-fluid">
        <form method="get" action="<?php echo base_url('Giaovu/Ketquahoctap/index')?>" id="formSearch" role="form" onsubmit="return true;">
            <div class="row">
              <div class="col-xs-3">
                  <div class="input-group hitec-w-100percent">
                      <select class="form-control" id="monhoc" name="monhoc" onchange='if(this.value != 0) { this.form.submit(); }'>
                          <option value="">--- Chọn Môn Học ---</option>
                          <?php foreach ($listmon as $row):?>
                          <option value="<?php echo $row['monhoc_id'] ?>" <?php echo ($this->input->get('monhoc') == $row['monhoc_id']) ? 'selected' : '' ?> ><?php echo $row['TenMH'] ?></option>
                          <?php endforeach;?>
                      </select>
                  </div>
              </div>
                <div class="col-xs-3">
                    <div class="input-group hitec-w-100percent">
                        <select class="form-control" id="lophoc" name="lophoc" onchange='if(this.value != 0) { this.form.submit(); }'>
                            <option value="">--- Chọn Lớp Học ---</option>
                            <?php foreach ($listlophoc as $row):?>
                            <option value="<?php echo $row['lophoc_id'] ?>" <?php echo ($this->input->get('lophoc') == $row['lophoc_id']) ? 'selected' : '' ?> ><?php echo $row['tenlop'] ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="input-group add-on hitec-w-100percent">
                        <input class="form-control" placeholder="Tìm kiếm theo tên/mã SV" type="text" value="">
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="button"><span class="fa fa-search"></span>Tìm Kiếm</button>
                        </div>
                    </div>
                </div>
<!--  -->
            </div>
        </form>
    </div>

    <div id="searchResult" style="margin-top:5px;">
      <?php if ($this->session->userdata('phanquyen') == 1) { ?>
	<div class="container-fluid text-right">
                <a href="javascript:void(0)"  title="Import excel" data-toggle="modal" data-target="#dialogImport">[Nhập Kết Quả Học Tập]</a>
            </div>
            <div class="container-fluid text-right">
                    <a href="<?php echo base_url('Giaovu/Ketquahoctap/index?exp=exp&monhoc=').$this->input->get('monhoc').'&lophoc='.$this->input->get('lophoc')?> "><u>[Xuất Danh Sách Ra Excel]</u></a>
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
                        <th style="width:70px" class="text-center">
                            Họ
                        </th>
                        <th style="width:150px" class="text-center">
                            Tên
                        </th>
                        <th style="width:100px" class="text-center">
                            Ngày Sinh
                        </th>
                        <th style="width:100px" class="text-center">
                            Lớp
                        </th>
                        <th style="width:100px" class="text-center">
                            Mã Ngành
                        </th>
                        <th style="width:100px" class="text-center">
                            Mã Môn Học
                        </th>
                        <th style="width:auto;" class="text-center">
                            Tên Môn Học
                        </th>
                        <th style="width:100px" class="text-center">
                            ĐTB
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i=0; $i < @count($listDiem); $i++) { ?>
                    <tr onclick='window.open("<?php echo base_url().'Giaovu/Ketquahoctap/diemhoctapsv?idsv='.$listDiem[$i]['sinhvien_id'].'&nganh='.$listDiem[$i]['nganhhoc_id'].'&khoa='.$listDiem[$i]['khoahoc_id'] ?>")'>
                        <td class="text-center">
                            <?php echo $i + 1 ?>
                        </td>
                        <td class="text-center">
                            <?php echo $listDiem[$i]['sinhvien_id'] ?>
                        </td>
                        <td>
                            <?php echo $listDiem[$i]['Ho'] ?>
                        </td>
                        <td class="text-center">
                            <?php echo $listDiem[$i]['Ten'] ?>
                        </td>
                        <td class="text-center">
                           <?php echo $listDiem[$i]['Ngaysinh'] ?>
                        </td>
                        <td class="text-center">
                            <?php echo $listDiem[$i]['tenlop'] ?>
                        </td>
                        <td class="text-center">
                            <?php echo $listDiem[$i]['ma_nganhhoc'] ?>
                        </td>
                        <td class="text-center">
                            <?php echo $listDiem[$i]['MaMH'] ?>
                        </td>
                        <td class="text-center">
                            <?php echo $listDiem[$i]['TenMH'] ?>
                        </td>
                        <td class="text-center">
                            <?php echo $listDiem[$i]['diemTB'] ?>
                        </td>
                    </tr>
                  <?php }  ?>
                </tbody>
            </table>
        </div>
        <div class="container-fluid text-right">
        </div>
    </div>
</div>
</div>
  <div class="row">
    <div class="col-xs-12">
        <div id="dialogImport" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
            <div class="modal-dialog" style="width:400px !important;height:600px !important">
                <div class="modal-content">
                    <form id="form_KQHT" name="frmCreateEmployee" class="form-horizontal" role="form" method="post"
                    ng-submit="UpdateEmployee()"  enctype="multipart/form-data">
                        <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h5><strong class="modal-title">Thêm Kết Quả Học Tập</strong></h5>
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
                                        <label class="coltrol-lable">File Input:</label>
                                        <input type="file" id="file_KQHT" name="file">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding:0px">
                            <input type="button" class="btn btn-sm btn-success" id="submit_kqht_import" name="Thêm" value="Thêm">
                            <button onclick="reload()" class="btn btn-sm btn-danger" data-dismiss="modal">Hủy</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="alert_success" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
            <div class="modal-dialog" style="width:400px !important;height:600px !important">
                <div class="modal-content">
                        <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                            <button onclick="reload()" type="button" class="close" data-dismiss="modal">×</button>
                            <h5><strong class="modal-title">Thêm Thành Công</strong></h5>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
                </div>
            </div>
        </div>
