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
                <form id="frmEditEmployee" name="frmCreateEmployee" class="form-horizontal" role="form" method="post"ng-submit="UpdateEmployee()" action="<?php echo base_url('Giaovu/Kehoachdaotao/khdt_info/'.$khdt_info['khdt_id']) ?>" enctype="multipart/form-data">
                    <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h5><strong class="modal-title">Sửa Môn Học Vào Kế Hoạch Đào Tạo</strong></h5>
                    </div>
                    <div class="modal-body">
                        <div class="row" style="margin:10px">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                               <div class="row">
                                 <div class="form-group col-xs-4"style="margin-left:5px">
                                     <label class="coltrol-lable">Ngành:</label>
                                     <select class="form-control" id="nganhhoc" name="nganhhoc" disabled>
                                         <option value="">--- Chọn Ngành Học ---</option>
                                         <?php $select = ''; foreach ($listnganhhoc as $row):
                                                if($row->nganhhoc_id == $khdt_info['nganhhoc_id']){
                                                  $select = 'selected = "selected"';
                                                }
                                           ?>
                                         <option value="<?php echo $row->nganhhoc_id ?>" <?php echo $select; ?> ><?php echo $row->tennganh ?></option>
                                         <?php endforeach;?>
                                     </select>
                                 </div>
                                <div class="form-group col-xs-4"style="margin-left:10px">
                                    <label class="coltrol-lable">Khóa:</label>
                                    <select class="form-control" id="khoahoc" name="khoahoc" disabled>
                                        <option value="">--- Chọn Khóa Học ---</option>
                                        <?php $select1 = '';foreach ($listkhoahoc as $row):
                                               if($row->khoahoc_id == $khdt_info['khoahoc_id']){
                                                 $select1 = 'selected = "selected"';
                                               }
                                          ?>
                                        <option value="<?php echo $row->khoahoc_id ?>" <?php echo $select1; ?> ><?php echo $row->tenkhoa ?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <div class="form-group col-xs-4"style="margin-left:10px">
                                    <label class="coltrol-lable">Học Kỳ:</label>
                                    <select class="form-control" id="hocki" name="hocki">
                                        <option value="">--- Chọn Học Kì ---</option>
                                        <?php $select2 = '';foreach ($listhocki as $row):
                                          if($row->hocki_id == $khdt_info['hocki_id']){
                                            $select2 = 'selected = "selected"';
                                          }
                                          ?>
                                        <option value="<?php echo $row->hocki_id ?>" <?php echo $select2; ?> ><?php echo $row->tenHocki ?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-xs-4"style="margin-left:5px">
                                    <label class="coltrol-lable">Nhập Mã Môn Học:</label>
                                    <input class="form-control" id="mamon" name="mamon" disabled value="<?php echo $khdt_info['MaMH']?>" />
                                </div>
                                <div class="form-group col-xs-4"style="margin-left:10px">
                                    <label class="coltrol-lable">Nhập Tên Môn Học:</label>
                                    <input class="form-control" id="tenmon" name="tenmon" disabled  value="<?php echo $khdt_info['TenMH']?>" />
                                </div>
                                <div class="form-group col-xs-4"style="margin-left:10px">
                                    <label class="coltrol-lable">Nhập Số DVHT/Tín Chỉ:</label>
                                    <input class="form-control" id="dvht_tc" name="dvht_tc" value="<?php echo $khdt_info['dvht_tc']?>" />
                                </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-xs-4"style="margin-left:5px">
                                  <label class="coltrol-lable">Tổng số:</label>
                                  <input class="form-control" id="tongso" name="tongso" value="<?php echo $khdt_info['tongso']?>"  />
                              </div>
                              <div class="form-group col-xs-4"style="margin-left:10px">
                                  <label class="coltrol-lable">Lý thuyết::</label>
                                  <input class="form-control" id="lythuyet" name="lythuyet" value="<?php echo $khdt_info['lythuyet']?>" />
                              </div>
                              <div class="form-group col-xs-4"style="margin-left:10px">
                                  <label class="coltrol-lable">Thực hành:</label>
                                  <input class="form-control" id="thuchanh" name="thuchanh" value="<?php echo $khdt_info['thuchanh']?>" />
                              </div>
                            </div>
                              <div class="row">
                              <div class="form-group col-xs-3"style="margin-left:5px">
                                  <label class="coltrol-lable">Bài tập:</label>
                                  <input class="form-control" id="baitap" name="baitap" value="<?php echo $khdt_info['baitap']?>" />
                              </div>
                              <div class="form-group col-xs-3"style="margin-left:10px">
                                  <label class="coltrol-lable">Bài tập lớn:</label>
                                  <input class="form-control" id="baitaplon" name="baitaplon" value="<?php echo $khdt_info['baitaplon']?>" />
                              </div>
                              <div class="form-group col-xs-3"style="margin-left:10px">
                                  <label class="coltrol-lable">Đồ án:</label>
                                  <input class="form-control" id="doan" name="doan" value="<?php echo $khdt_info['doAn']?>" />
                              </div>
                              <div class="form-group col-xs-3"style="margin-left:10px">
                                  <label class="coltrol-lable">Khóa luận:</label>
                                  <input class="form-control" id="khoaluan" name="khoaluan" value="<?php echo $khdt_info['khoaluan']?>" />
                              </div>
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
