<div class="main-content-inner">
                <div class="page-content">
                    <img id="ajax-loader" src="http://aspnet.demo.hueuni.edu.vn/StudentManager/images/ajax-loader.gif" alt="" />
                    <div class="page-header">



<div class="col-xs-12 col-offset-200">
    <div class="hitec-content">
        <img id="ajax-loader" src="/Teacher/images/icons/ajax-loader.gif" alt="" style="display: none;">
        <h2>CẬP NHẬT TRẠNG THÁI SINH VIÊN</h2>
        <div hidden="hidden" id="msg-success-capnhattt" class="modal-header add_success" style="padding:0px;text-align:center">
             <h5><strong class="modal-title">Thêm Thành Công</strong></h5>
        </div>
        <div hidden="hidden" id="msg-fail-capnhattt" class="modal-header add_fail" style="padding:0px;text-align:center">
            <h5><strong class="modal-title"></strong></h5>
        </div>
        <div class="container-fluid">
              <form id="frmEditEmployee" name="frmCreateEmployee" class="form-horizontal" role="form" method="post" ng-submit="UpdateEmployee()"  enctype="multipart/form-data">
                <fieldset class="hitec-fieldset" style="border:none">
                    <legend>Thông Tin Sinh Viên</legend>
                    <div class="row">
                        <div class="col-xs-3 form-control-static text-right">
                            Mã Sinh Viên:
                        </div>
                        <div class="col-xs-8 form-control-static hitec-border-bottom-dotted">
                            <strong id="maSV" ><?php echo $svInfo['MSSV']?></strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3 form-control-static text-right">
                            Họ Tên:
                        </div>
                        <div class="col-xs-8 form-control-static hitec-border-bottom-dotted">
                            <strong><?php echo $svInfo['Ho'].' '.$svInfo['Ten']?></strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3 form-control-static text-right">
                            Ngành:
                        </div>
                        <div class="col-xs-8 form-control-static hitec-border-bottom-dotted">
                            <strong><?php echo $svInfo['tennganh']?></strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3 form-control-static text-right">
                            Khóa:
                        </div>
                        <div class="col-xs-8 form-control-static hitec-border-bottom-dotted">
                            <strong><?php echo $svInfo['tenkhoa']?></strong>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="hitec-fieldset" style="border:none">
                    <legend>Cập Nhật</legend>
                    <div class="row">
                        <div class="col-xs-3 form-control-static text-right">
                            Trạng Thái:
                        </div>
                        <input type="hidden" id="mssv" name="id" value="<?php echo $svInfo['MSSV']?>">
                        <div class="col-xs-8 form-control-static">
                            <select class="form-control" id="student_status" name="student_status">
                                <option value="">-- Trạng Thái --</option>
                                <option value="3">Bảo Lưu Kết Qủa</option>
                                <option value="1">Tạm Ngưng</option>
                                <option value="2">Đình Chỉ Học</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3 form-control-static text-right" style="line-height:30px">
                            Mã Hồ Sơ:
                        </div>
                        <div class="col-xs-8 form-control-static">
                            <input id="maHS" name="maHS" class="form-control" value="" readonly="readonly"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3 form-control-static text-right" style="line-height:30px">
                            Lý Do:
                        </div>
                        <div class="col-xs-8 form-control-static hitec-border-bottom-dotted">
                            <textarea id="lydo" name="lydo" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3 form-control-static text-right" style="line-height:30px">
                            Ngày Bắt Đầu:
                        </div>
                        <div class="col-xs-8 form-control-static hitec-border-bottom-dotted">
                            <input id="ngaybatdau" name="ngaybatdau" type="date" class="form-control"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3 form-control-static text-right" style="line-height:30px">
                            Ngày Kết Thúc:
                        </div>
                        <div class="col-xs-8 form-control-static hitec-border-bottom-dotted">
                            <input id="ngayketthuc" name="ngayketthuc" type="date" class="form-control" />
                        </div>
                    </div>
                    <div class="row" >
                        <div id="msgbdlonkt" hidden class="col-xs-12 col-xs-offset-3" style="color:red;" form-control-static hitec-border-bottom-dotted">
                            Ngày Bắt Đầu Không Được Lớn Hơn Ngày Kết Thúc
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3 form-control-static text-right" style="line-height:30px">
                        </div>
                        <div class="col-xs-8 form-control-static">
                            <div class="col-xs-12 text-right">
                                <button type="button" onclick="back_sv()" class="btn btn-sm btn-danger" >Hủy</button>
                                <button type="button" class="btn btn-sm btn-success" id="btn-updatestatus">Thiết Lập</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
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
