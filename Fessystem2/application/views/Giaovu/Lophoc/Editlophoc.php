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
                <form id="frmEditEmployee" name="frmCreateEmployee" class="form-horizontal" role="form" method="post"ng-submit="UpdateEmployee()" action="<?php echo base_url('Giaovu/Lophoc/Edit/'.$lophoc_info['lophoc_id']) ?>" enctype="multipart/form-data">
                    <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h5><strong class="modal-title">Sửa Thông Tin Lớp Học</strong></h5>
                    </div>
                    <div class="modal-body">
                            <div class="row" style="margin:10px">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                  <!-- <div class="form-group">
                                    <label class="coltrol-lable">Ngành:</label>
                                      <select class="form-control" id="khoahoc" name="khoahoc">
                                      <option value="">--- Chọn Ngành Học ---</option>
                                      <?php foreach($listnganhhoc as $row):  ?>
                                      <option value="<?php echo $row->nganhhoc_id ?>" <?php echo ($row->khoahoc_id == $lophoc_info['khoahoc_id']) ? 'selected' : '' ?> ><?php echo $row->tennganh ?></option>
                                      <?php endforeach; ?>
                                      </select>
                                      <input type="hidden" name="nganhhoc" value="<?php echo $row->nganhhoc_id ?>">
                                  </div> -->
                                  <!-- <div class="form-group">
                                    <label class="coltrol-lable">Khóa:</label>
                                      <select class="form-control" id="khoahoc" name="khoahoc" disabled>
                                      <option value="">--- Chọn khóa Học ---</option>
                                      <?php foreach($listkhoahoc as $row):  ?>
                                      <option value="<?php echo $row->khoahoc_id ?>" <?php echo ($row->khoahoc_id == $lophoc_info['khoahoc_id']) ? 'selected' : '' ?> ><?php echo $row->tenkhoa ?></option>
                                      <?php endforeach; ?>
                                      </select>
                                      <input type="hidden" name="nganhhoc" value="<?php echo $row->khoahoc_id ?>">
                                  </div> -->
                                    <div class="form-group">
                                        <label class="coltrol-lable">Nhập Khóa Học:</label>
                                        <input class="form-control" id="tenlop" name="tenlop" value="<?php echo $lophoc_info['tenlop']?>" />
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
<script>
    $(document).ready(function () {
        setTimeout(function () {
            if($('#frmEditEmployee .modal-header.add_success').length > 0){
                $('#frmEditEmployee .modal-header.add_success').removeClass('add_success');
            }
        }, 3000);
    });
</script>
</body>
</html>
