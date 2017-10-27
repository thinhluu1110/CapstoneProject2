<div class="main-content-inner">
    <div class="page-content">
        <!-- <img id="ajax-loader" src="http://aspnet.demo.hueuni.edu.vn/StudentManager/images/ajax-loader.gif" alt="" /> -->
        <div class="page-header">
            
            <div class="hitec-content">
                <h2>Thời Khóa Biểu</h2>
                <div class="container-fluid">
                    <form id="formSearch" role="form" onsubmit="return false;">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="input-group hitec-w-100percent">
                                    <!-- <select name="catalog">
                                        <option value=""></option> -->
                                            <!-- kiem tra danh muc co danh muc con hay khong -->
                                            <!-- <?php foreach ($catalogs as $row):?>
                                            <?php if(count($row->subs) > 1):?>
                                            <optgroup label="<?php echo $row->name?>">
                                                <?php foreach ($row->subs as $sub):?>
                                                <option value="<?php echo $sub->id?>"> <?php echo $sub->name?> </option>
                                                <?php endforeach;?>
                                            </optgroup>
                                            <?php else:?>
                                              <option value="<?php echo $row->id?>"> <?php echo $row->name?></option>
                                            <?php endif;?>
                                            <?php endforeach;?>
                                    </select> -->
                                    <select class="form-control" id="khoahoc" name="KhoaHoc">
                                        <option selected="selected" value="">--- Chọn Khóa Học ---</option>
                                        <option value="">K16</option>
                                        <option value="">K17</option>
                                        <option value="">K18</option>
                                        <option value="">K19</option>
                                        <option value="">K20</option>
                                        <option value="">K21</option>
                                        <option value="">K22</option>
                                        <option value="">K23</option>
                                        <option value="">K24</option>
                                        <option value="">K25</option>
                                        <option value="">K26</option>
                                        <option value="">K27</option>
                                        <option value="">K28</option>
                                        <option value="">K29</option>
                                        <option value="">K30</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-xs-6">
                                <div class="input-group hitec-w-100percent">
                                    <select class="form-control" id="khoahoc" name="KhoaHoc">
                                        <option selected="selected" value="">--- Chọn Học Kỳ ---</option>
                                        <option value="">1</option>
                                        <option value="">2</option>
                                        <option value="">3</option>
                                        <option value="">4</option>
                                        <option value="">5</option>
                                        <option value="">6</option>
                                        <option value="">7</option>
                                        <option value="">8</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="searchResult" style="margin-top:5px;">
                    <div class="container-fluid text-right">
                        <a href="javascript:void(0)"  title="Import excel" data-toggle="modal" data-target="#dialogEdit">[Import Data]</a>			
                    </div>
                    <div class="container-fluid text-center">
                        <img src="<?php echo public_url(); ?>Img/TKB.png"/>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div id="dialogEdit" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
                        <div class="modal-dialog" style="width:400px !important;height:600px !important">
                            <div class="modal-content">
                                <!-- <form id="frmEditEmployee" name="frmCreateEmployee" class="form-horizontal" role="form" ng-submit="UpdateEmployee()"> -->
                                <form id="frmEditEmployee" name="frmCreateEmployee" class="form-horizontal" role="form" ng-submit="UpdateEmployee()" method="post" action="" enctype="multipart/form-data">
                                    <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                        <h5><strong class="modal-title">Thêm Thời Khóa Biểu</strong></h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row" style="margin:10px">
                                            <div class="col-xs-12 col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <label class="coltrol-lable">Khóa:</label>
                                                    <select class="form-control" name="khoahoc">
            											<option>K19</option>
                                                        <option>K20</option>
                                                        <option>K21</option>
                                                        <option>K22</option>
            										</select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="coltrol-lable">Học Kì:</label>
                                                    <select class="form-control" name="hocky">
                                                        <option>HK I</option>
                                                        <option>HK II</option>
                                                        <option>HK III</option>
                                                        <option>HK IV</option>
                                                        <option>HK V</option>
                                                        <option>HK VI</option>
                                                        <option>HK VII</option>
                                                        <option>HK VIII</option>
                                                    </select>
                                                </div>
            									<div class="form-group">
                                                    <div class="form-group">
                                                        <label class="coltrol-lable">File Input:</label>
                                                        <!-- <input type="file" id="exampleInputFile"> -->
                                                        <input type="file"  id="image" name="image"><br />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer" style="padding:0px">
                                        <!-- <button class="btn btn-sm btn-success">Thêm</button> -->
                                        <input type="submit" class="button" value="Upload" name='submit' />
                                        <button class="btn btn-sm btn-danger" data-dismiss="modal">Thôi</button>
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