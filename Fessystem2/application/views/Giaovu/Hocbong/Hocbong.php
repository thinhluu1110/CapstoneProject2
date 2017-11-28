<div class="main-content-inner">
               <div class="page-content">
                   <img id="ajax-loader" src="http://aspnet.demo.hueuni.edu.vn/StudentManager/images/ajax-loader.gif" alt="" />
                   <div class="page-header">
                     <div class="col-xs-12 col-offset-200">
         <div class="hitec-content">
             <img id="ajax-loader" src="/Teacher/images/icons/ajax-loader.gif" alt="" style="display: none;">
             <h2>Danh Sách Sinh Viên Đủ Điều Kiện Nhận Học Bổng</h2>
             <div class="container-fluid text-right">
                 <a href="javascript:void(0)"  title="Thêm" data-toggle="modal" data-target="#dialogEdit">[Nhập Điều Kiện Duyệt Đồ Án]</a>
             </div>
             <div id="searchResult" style="margin-top:5px;">
           <div class="container-fluid text-right">
               <a>[Export Data]</a>
             </div>
           <div class="container-fluid">
               <table class="table table-bordered table-striped table-hover">
                   <thead>
                       <tr>
                           <th style="width:120px" class="text-center">
                               Mã sinh viên
                           </th>
                           <th style="width:auto" class="text-center">
                               Họ và tên
                           </th>
                           <th style="width:auto" class="text-center">
                               Ngành Học
                           </th>
                           <th style="width:auto" class="text-center">
                               Khóa Học
                           </th>
                           <th style="width:120px" class="text-center">
                               Điểm Trung Bình<br /> Học Tập
                           </th>
                           <th style="width:120px" class="text-center">
                               Điểm Trung Bình<br /> Rèn Luyện
                           </th>
                       </tr>
                   </thead>
                   <tbody>
                     <?php if (isset($listsvpasshb)) {
                      $i = 1; foreach ($listsvpasshb as  $value) {?>
                        <tr>
                           <td class="text-center">
                               <?php echo $value['MSSV']; ?>
                           </td>
                           <td class="text-center">
                               <?php echo $value['Ho'].' '.$value['Ten'] ?>
                           </td>
                           <td class="text-center">
                               <?php echo $value['Nganh']; ?>
                           </td>
                           <td class="text-center">
                               <?php echo $value['Khoa']; ?>
                           </td>
                           <td class="text-center">
                              <?php echo $value['TBHT']; ?>
                           </td>
                           <td class="text-center">
                              <?php echo $value['TBRL']; ?>
                           </td>
                       </tr>
                       <?php }} ?>
                   </tbody>
               </table>
           </div>
         </div>
 </div>
</div>


                 </div>
                 <div class="row">
         <div class="col-xs-12">
         <div id="dialogEdit" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
             <div class="modal-dialog" style="width:800px !important;height:600px !important">
                 <div class="modal-content">
                     <form id="form_dieukien_doan" name="frmCreateEmployee" class="form-horizontal" role="form" method="get" action="<?php echo base_url('Giaovu/Hocbong/index') ?>" enctype="multipart/form-data">
                         <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                             <button onclick="reload()" type="button" class="close" data-dismiss="modal">×</button>
                             <h5><strong class="modal-title">Thêm Điều Kiện Đồ Án</strong></h5>
                         </div>
                         <div hidden="hidden" id="msg-success-dkda" class="modal-header add_success" style="padding:0px;text-align:center">
                             <h5><strong class="modal-title"></strong></h5>
                         </div>
                         <div hidden="hidden" id="msg-fail-dkda" class="modal-header add_fail" style="padding:0px;text-align:center">
                             <h5><strong class="modal-title"></strong></h5>
                         </div>
                         <div class="modal-body">
                             <div class="row" style="margin:10px">
                                 <div class="col-xs-12 col-md-12 col-lg-12">
                                    <div class="row">
                                     <div class="form-group col-xs-4 "style="margin-left:5px">
                                         <label class="coltrol-lable">Ngành:</label>
                                         <select class="form-control" id="nganhhocAdd" name="nganhhoc">
                                           <option value="">--- Chọn Ngành Học ---</option>
                                           <?php foreach ($listnganhhoc as $row):?>
                                           <option value="<?php echo $row->nganhhoc_id ?>"><?php echo $row->tennganh ?></option>
                                           <?php endforeach;?>
                                         </select>
                                     </div>
                                     <div class="form-group col-xs-4"style="margin-left:10px">
                                         <label class="coltrol-lable">Khóa:</label>
                                         <select class="form-control" id="khoahocAdd" name="khoahoc" disabled = "">
                                             <option value="">--- Chọn Khóa Học ---</option>

                                         </select>
                                     </div>
                                     <div class="form-group col-xs-4"style="margin-left:10px">
                                         <label class="coltrol-lable">Học Kỳ:</label>
                                         <select class="form-control" id="hocki" name="hocki">
                                             <option value="">--- Chọn Học Kì ---</option>
                                             <option value="1">HK 1</option>
                                             <option value="2">HK 2</option>
                                             <option value="3">HK 3</option>
                                             <option value="4">HK 4</option>
                                             <option value="5">HK 5</option>
                                             <option value="6">HK 6</option>
                                             <option value="7">HK 7</option>
                                             <option value="8">HK 8</option>
                                         </select>
                                     </div>
                                   </div>
                                   <div class="row">
                                     <div class="form-group col-xs-4"style="margin-left:5px">
                                         <label class="coltrol-lable">Điểm Trung Bình Học Tập:</label>
                                         <input class="form-control" id="tbht" name="tbht"  />
                                     </div>
                                     <div class="form-group col-xs-4"style="margin-left:10px">
                                       <label class="coltrol-lable">Điểm Trung Bình Rèn Luyện:</label>
                                       <input class="form-control" id="tbrl" name="tbrl"  />
                                   </div>
                                   <div class="form-group col-xs-4 " style="margin-left:10px;margin-top:12px" >
                                      <label class="coltrol-lable"></label>
                                     <div  class="form-group" style="margin-left:30px;" >
                                         <input type="checkbox"  id="thilai" value="yes" name="thilai">Không Thi Lại Lần 2
                                     </div>
                                 </div>
                                 </div>
                               </div>
                             </div>
                         </div>
                         <div class="modal-footer" style="padding:0px">
                             <input type="submit" class="btn btn-sm btn-success" name="submit" value="Lọc Danh Sách">
                         </div>
                     </form>
                 </div>
             </div>
         </div>
         </div>
         </div>
             </div>
         </div>
