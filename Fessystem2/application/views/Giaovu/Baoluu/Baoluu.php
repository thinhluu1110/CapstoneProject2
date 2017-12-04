<div class="main-content-inner">
                <div class="page-content">
                    <img id="ajax-loader" src="http://aspnet.demo.hueuni.edu.vn/StudentManager/images/ajax-loader.gif" alt="" />
                    <div class="page-header">




<div class="col-xs-12 col-offset-200">
    <div class="hitec-content">
        <img id="ajax-loader" src="/Teacher/images/icons/ajax-loader.gif" alt="" style="display: none;">
        <h2>DANH SÁCH SINH VIÊN BẢO LƯU</h2>
		<div class="container-fluid">
        <form method="get" action="<?php echo base_url('Giaovu/Baoluu/index')?>" id="formSearch" role="form" onsubmit="return true;">
            <div class="row">
                <div class="col-xs-3">
                    <div class="input-group hitec-w-100percent">
                      <select class="form-control" id="TimeBL" name="TimeBL" onchange='if(this.value != 0) { this.form.submit(); }'>
                        <option value="">--- Chọn Thời Gian Bảo Lưu Còn Lại  ---</option>
                        <option value="all" <?php if ($this->input->get('TimeBL') == 'all') {echo "selected";} ?>>--- Tất Cả  ---</option>
                        <option value="12" <?php if ($this->input->get('TimeBL') == '12') {echo "selected";} ?>>--- Hơn 12 Tháng  ---</option>
                        <option value="12to9" <?php if ($this->input->get('TimeBL') == '12to9') {echo "selected";} ?> >--- 12 Tháng Đến 9 Tháng  ---</option>
                        <option value="9to6" <?php if ($this->input->get('TimeBL') == '9to6') {echo "selected";} ?> >--- 9 Tháng Đến 6 Tháng ---</option>
                        <option value="6to3" <?php if ($this->input->get('TimeBL') == '6to3') {echo "selected";} ?> >--- 6 Tháng Đến 3 Tháng ---</option>
                        <option value="3to1" <?php if ($this->input->get('TimeBL') == '3to1') {echo "selected";} ?> >--- 3 Tháng Đến 1 Tháng ---</option>
                        <option value="1" <?php if ($this->input->get('TimeBL') == '1') {echo "selected";} ?> >--- 1 Tháng ---</option>
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
            </div>
        </form>
		</div>
        <div id="searchResult" style="margin-top:5px;">
            <?php if ($this->session->userdata('phanquyen') == 1) { ?>
            <div class="container-fluid text-right">
                <a href="<?php if($svStatus != null){echo base_url('Giaovu/Baoluu/index?exp=exp&TimeBL=').$this->input->get('TimeBL');}?> "><u>[Xuất Danh Sách Ra Excel]</u>
                </a>
            </div>
            <?php } ?>
            <div class="container-fluid">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th style="width:100px" class="text-center">
                                Mã sinh viên
                            </th>
                            <th style="width:120px" class="text-center">
                                Mã hồ sơ
                            </th>
                            <th style="width:200px" class="text-center">
                                Họ và tên
                            </th>
                            <th style="width:200px" class="text-center">
                                Ngành
                            </th>
                            <th style="width:100px" class="text-center">
                                Khóa
                            </th>
                            <th style="width:150px" class="text-center">
                                Ngày Bắt Đầu
                            </th>
                            <th style="width:150px" class="text-center">
                                Ngày Kết Thúc
                            </th>
                            <th style="width:auto" class="text-center">
                                Lý Do
                            </th>
                            <?php if ($this->session->userdata('phanquyen') == 1) { ?>
                            <th style="width:80px" class="text-center">

                            </th>
                          <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                      <?php for ($i=0; $i <count($svStatus) ; $i++) { ?>
                        <tr style=" <?php if($svStatus[$i]['Alert'] <= 30){echo "color:red;";} ?> cursor:pointer">
                            <td class="text-center">
                                <?php echo $svStatus[$i]['MSSV']?>
                            </td>
                            <td class="text-center">
                                <?php echo $svStatus[$i]['MaHS']?>
                            </td>
                            <td class="text-center">
                                <?php echo $svStatus[$i]['Ho'].' '.$svStatus[$i]['Ten']?>
                            </td>
                            <td class="text-center">
                                <?php echo $svStatus[$i]['Nganh']?>
                            </td>
                            <td class="text-center">
                                <?php echo $svStatus[$i]['Khoa']?>
                            </td>
                            <td class="text-center">
                                <?php echo $svStatus[$i]['Ngaybd']?>
                            </td>
                            <td class="text-center">
                                <?php echo $svStatus[$i]['Ngaykt']?>
                            </td>
                            <td>
                                <?php echo $svStatus[$i]['Lido']?>
                            </td>
                            <?php if ($this->session->userdata('phanquyen') == 1) { ?>
                            <td class="text-center">
                                <a class="btn-sm btn-danger delete_BaoLuu" id ="<?php echo $svStatus[$i]['MSSV'] ?>" title="Xóa" data-toggle="modal" data-target="#dialogDelete">
                                    <i class="fa fa-remove"></i>
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
</div>

<div class="row">
    <div class="col-xs-12">
        <div id="dialogDelete" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
            <div class="modal-dialog" style="width:400px !important;height:600px !important">
                <div class="modal-content">

                    <form id="frmEditEmployee" name="frmCreateEmployee" method="post" class="form-horizontal" role="form" ng-submit="UpdateEmployee()">
                        <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                            <button onclick="reload()" type="button" class="close" data-dismiss="modal">×</button>
                            <h5><strong class="modal-title">Xóa Môn Học</strong></h5>
                        </div>
                        <div hidden="hidden" id="msg-success-delete-BL" class="modal-header add_success" style="padding:0px;text-align:center">
                            <h5><strong class="modal-title"></strong></h5>
                        </div>
                        <div class="modal-body text-center">
                            <strong>Bạn có muốn xóa bản ghi ?</strong>
                        </div>
                        <div class="modal-footer" style="padding:0px">
                            <input type="button" class="btn btn-sm btn-danger" id="submit_delete_baoluu" name="Xóa" value="Xóa">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div id="dialogValidation_Delete_Baoluu" data-backdrop = "static" data-keyboard = "false" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
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
