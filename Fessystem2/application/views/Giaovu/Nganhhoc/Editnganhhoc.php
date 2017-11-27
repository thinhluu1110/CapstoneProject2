<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('Giaovu/head'); ?>
  <title>Main</title>
</head>
<body class="no-skin" style="margin:0 !important;padding:0 !important">
<div style="width:100%">
  <div class="col-xs-12">
              <div class="modal-content">
                <form id="frmEditEmployee" name="frmCreateEmployee" class="form-horizontal" role="form" method="post"ng-submit="UpdateEmployee()" action="<?php echo base_url('Giaovu/Nganhhoc/Edit/'.$nganhhoc_info['nganhhoc_id']) ?>" enctype="multipart/form-data">
                    <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h5><strong class="modal-title">Sửa Môn Học Vào Kế Hoạch Đào Tạo</strong></h5>
                    </div>
                    <div class="modal-body">
                            <div class="row" style="margin:10px">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                  <div class="form-group">
                                        <label class="coltrol-lable">Nhập Mã Ngành:</label>
                                        <input class="form-control" id="nganhhoc" name="manganh" value="<?php echo $nganhhoc_info['ma_nganhhoc']?>" />
                                    </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">Nhập Tên Ngành:</label>
                                        <input class="form-control" id="nganhhoc" name="tennganh" value="<?php echo $nganhhoc_info['tennganh']?>" />
                                    </div>

                                </div>
                            </div>
                        </div>
                    <div class="modal-footer" style="padding:0px">
                        <input type="submit" class="btn btn-sm btn-success" value="Sửa" id="submit" name="submit">
                        <button class="btn btn-sm btn-danger" data-dismiss="modal">Hủy</button>
                    </div>
                </form>
              </div>
  </div>
    <div class="clear"></div>
</div>
</body>
</html>
