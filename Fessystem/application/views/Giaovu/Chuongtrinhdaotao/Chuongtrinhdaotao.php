<div class="main-content-inner">
                <div class="page-content">
                    <img id="ajax-loader" src="http://aspnet.demo.hueuni.edu.vn/StudentManager/images/ajax-loader.gif" alt="" />
                    <div class="page-header">



<div class="hitec-content">
    <h2>TRA CỨU CHƯƠNG TRÌNH ĐÀO TẠO</h2>
    <div class="container-fluid">
        <form id="formSearch" role="form" onsubmit="return false;">
            <div class="row">
                <div class="col-xs-2">
                    <div class="input-group hitec-w-100percent">
                        <select class="form-control" id="khoahoc" name="k">
                            <option value="">--- Chọn ngành học ---</option>
							<option value="">Ngành Kỹ Thuật Phần Mềm</option>
                        </select>
                    </div>
                     </div>
                    <div class="col-xs-2">
                        <div class="input-group hitec-w-100percent">
                        <select class="form-control" id="khoahoc" name="k">
                            <option value="">--- Chọn khóa học ---</option>
                            <option value="">Khóa 19</option>
                        </select>
                    </div>
                    </div>
                </div>

        </form>
    </div>


    <div id="searchResult" style="margin-top:5px;">
        <!-- Layout dùng cho các view dạng một phần nội dung trong trang web -->
        <div class="row col-xs-offset-8">
            <a href="javascript:void(0)" class="col-xs-6" title="Import excel" data-toggle="modal" data-target="#dialogImport">[Nhập chương trình đào tạo](Pdf)</a>
            <a href="javascript:void(0)"  class="col-xs-6" title="Import excel" data-toggle="modal" data-target="#dialogImport">[Nhập kế hoạch đào tạo](Excel)</a>
        </div>
    </div>

        <div class="container-fluid">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center" style="width:40px">STT</th>
                        <th class="text-center" style="width:300px;">Ngành Học</th>
                        <th class="text-center" style="width:auto">Khóa Học</th>
                        <th class="text-center" style="width:100px">Nội dung</th>
                        <th class="text-center" style="width:100px"></th>
                        <th class="text-center" style="width:100px"></th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td class="hitec-td-1 text-center">
                            1
                        </td>
                        <td class="hitec-td-1 text-center">
                            <a href="javascript:;">
                                Kỹ Thuật Phần Mềm
                            </a>
                        </td>
                        <td class="hitec-td-1">
                            <a href="javascript:;">
                               Khóa 19
                            </a>
                        </td>
                        <td class="hitec-td-1 text-center">
                            <a href="">Link file</a>
                        </td>
                        <td class="hitec-td-1 text-center">
                            <a href="Kehoachdaotao.html">Chi tiết</a>
                        </td>
                        <td class="hitec-td-1 text-center">
                        <a href="javascript:void(0)" class="btn-sm btn-danger" title="" data-toggle="modal" data-target="#dialogDelete" style="margin-right: 4px;">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="hitec-td-1 text-center">
                            2
                        </td>
                        <td class="hitec-td-1 text-center">
                            <a href="javascript:;">
                                Kỹ Thuật Phần Mềm
                            </a>
                        </td>
                        <td class="hitec-td-1">
                            <a href="javascript:;">
                               Khóa 20
                            </a>
                        </td>
                        <td class="hitec-td-1 text-center">
                            <a href="">Link file</a>
                        </td>
                        <td class="hitec-td-1 text-center">
                            <a href="">Chi tiết</a>
                        </td>
                        <td class="hitec-td-1 text-center">
                        <a href="javascript:void(0)" class="btn-sm btn-danger" title="" data-toggle="modal" data-target="#dialogDelete" style="margin-right: 4px;">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="hitec-td-1 text-center">
                            3
                        </td>
                        <td class="hitec-td-1 text-center">
                            <a href="javascript:;">
                                Kỹ Thuật Phần Mềm
                            </a>
                        </td>
                        <td class="hitec-td-1">
                            <a href="javascript:;">
                               Khóa 21
                            </a>
                        </td>
                        <td class="hitec-td-1 text-center">
                            <a href="">Link file</a>
                        </td>
                        <td class="hitec-td-1 text-center">
                            <a href="">Chi tiết</a>
                        </td>
                        <td class="hitec-td-1 text-center">
                        <a href="javascript:void(0)" class="btn-sm btn-danger" title="" data-toggle="modal" data-target="#dialogDelete" style="margin-right: 4px;">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div id="dialogImport" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
            <div class="modal-dialog" style="width:400px !important;height:600px !important">
                <div class="modal-content">
                    <form id="frmEditEmployee" name="frmCreateEmployee" class="form-horizontal" role="form" method="post"ng-submit="UpdateEmployee()" action="<?php echo base_url('Giaovu/Chuongtrinhdaotao/importCTDT') ?>" enctype="multipart/form-data">
                        <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h5><strong class="modal-title">Thêm Kế Hoạch Đào Tạo</strong></h5>
                        </div>
                        <div class="modal-body">
                            <div class="row" style="margin:10px">
                                <div class="col-xs-12 col-md-12 col-lg-12">
									                  <div class="form-group">
                                        <label class="coltrol-lable">Ngành:</label>
                                        <select class="form-control" id="nganhhoc" name="nganhhoc">
                                          <option value="">--- Chọn Ngành Học ---</option>
                                            <option value="1">Kỹ Thuật Phần Mềm</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="coltrol-lable">Khóa:</label>
                                        <select class="form-control" id="khoahoc" name="khoahoc">
                                          <option value="">--- Chọn Khóa Học ---</option>
                                            <option value="1">K20</option>
                                            <option value="2">K21</option>
                                        </select>
                                    </div>
									                  <div class="form-group">
                                        <label class="coltrol-lable">File Input:</label>
                                        <input type="file" id="file" name="file">
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
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div id="dialogDelete" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
            <div class="modal-dialog" style="width:400px !important;height:600px !important">
                <div class="modal-content">
                    <form id="frmEditEmployee" name="frmCreateEmployee" class="form-horizontal" role="form" ng-submit="UpdateEmployee()">
                        <div class="modal-body text-center">
                            <strong>Bạn có muốn xóa bản ghi ?</strong>
                        </div>
                        <div class="modal-footer" style="padding:0px">
                            <button class="btn btn-sm btn-default" data-dismiss="modal">Hủy</button>
                            <button class="btn btn-sm btn-danger" data-dismiss="modal">Xóa</button>
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
