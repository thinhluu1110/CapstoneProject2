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
                <form id="frmEditEmployee" name="frmCreateEmployee" class="form-horizontal" role="form" ng-submit="UpdateEmployee()" method="post" action="<?php echo base_url('Giaovu/Chuongtrinhdaotao/editFILE/'.$fileWord['ctdt_id'].'/'.$fileWord['noidung']) ?>" enctype="multipart/form-data">
                        <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h5><strong class="modal-title">Thêm Kế Hoạch Đào Tạo</strong></h5>
                        </div>
                        <div class="modal-body">
                            <div class="row" style="margin:10px">
                                <div class="col-xs-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <label class="coltrol-lable">Ngành:</label>
                                        <select class="form-control" id="nganhhoc" name="nganhhoc" disabled>
                                          <option value="">--- Chọn Ngành Học ---</option>
                                          <?php $select = '';foreach ($listnganh as $row):  ?>
                                          <option value="<?php echo $row['nganhhoc_id'] ?>" <?php echo ($row['nganhhoc_id'] == $fileWord['nganhhoc_id']) ? 'selected' : '' ?> ><?php echo $row['tennganh'] ?></option>
                                          <?php endforeach;?>
                                        </select>
                                        <input type="hidden" name="nganhhoc" value="<?php echo $row['nganhhoc_id'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">Khóa:</label>
                                        <select class="form-control" id="khoahoc" name="khoahoc" disabled>
                                          <option value="">--- Chọn Khóa Học ---</option>
                                          <?php $select = '';foreach ($listkhoa as $row):  ?>
                                          <option value="<?php echo $row['khoahoc_id'] ?>" <?php echo ($row['khoahoc_id'] == $fileWord['khoahoc_id']) ? 'selected' : '' ?> ><?php echo $row['tenkhoa'] ?></option>
                                          <?php endforeach;?>
                                        </select>
                                        <input type="hidden" name="khoahoc" value="<?php echo $row['khoahoc_id'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">File Input:</label>
                                        <input type="file" id="file" name="file">
                                    </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">Ghi chú:</label>
                                        <textarea class="form-control" id="ghichu" name="ghichu"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="thumbnail">
                                          <div class="row">
                                          <div class="col-xs-3 center">
                                          <a href="upload/CTDT/<?php echo $fileWord['noidung']?>" alt="<?php echo $fileWord['noidung']?>" title="<?php echo $fileWord['noidung']?>" ><img src="<?php echo base_url('public/Img/Word.jpg')?>" style = "width: 70px;height: 70px;"></a>
                                          </div>
                                          </div>
                                            <!-- <img style="width: 40px; height: 40px;" src="upload/CTDT/<?php echo $fileWord['noidung']?>" class = "fa fa-eye" alt="<?php echo $fileWord['noidung']?>" title="<?php echo $fileWord['noidung']?>"> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="padding:0px">
                            <input type="submit" class="button" value="Upload" name='submit' />
                            <button class="btn btn-sm btn-danger" data-dismiss="modal">Hủy</button>
                        </div>
                    </form>
              </div>
  </div>
    <div class="clear"></div>
</div>
</body>
</html>
