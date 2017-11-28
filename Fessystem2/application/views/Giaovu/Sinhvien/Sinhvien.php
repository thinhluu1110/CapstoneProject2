<div class="main-content">
            <div class="main-content-inner">
                <div class="page-content">
                    <img id="ajax-loader" src="http://aspnet.demo.hueuni.edu.vn/StudentManager/images/ajax-loader.gif" alt="" />
                    <div class="page-header">



<div class="col-xs-12 col-offset-200">
    <div class="hitec-content">
        <img id="ajax-loader" src="/Teacher/images/icons/ajax-loader.gif" alt="" style="display: none;">
        <h2>THIẾT LẬP TRẠNG THÁI SINH VIÊN</h2>
        <div class="container-fluid">
            <form method="post" action="<?php echo base_url('Giaovu/Sinhvien/index')?>" id="formSearch" role="form" onsubmit="return true;">
                <div class="row">
                    <div class="col-xs-3">
                        <div class="input-group hitec-w-100percent">
                          <select class="form-control" id="nganhhoc" name="nganhhoc" onchange='if(this.value != 0) { this.form.submit(); }' >
                              <option value="">--- Chọn ngành học ---</option>
                              <?php foreach ($listnganhhoc as $row):?>
                              <option value="<?php echo $row->nganhhoc_id ?>" <?php echo ($this->input->post('nganhhoc') == $row->nganhhoc_id) ? 'selected' : '' ?> ><?php echo $row->tennganh ?></option>
                              <?php endforeach;?>
                          </select>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="input-group hitec-w-100percent">
                          <select class="form-control" id="khoahoc" name="khoahoc" onchange='if(this.value != 0) { this.form.submit(); }' >
                              <option value="">--- Chọn khóa học ---</option>
                              <?php foreach ($listkhoahoc as $row):?>
                              <option value="<?php echo $row['khoahoc_id'] ?>" <?php echo ($this->input->post('khoahoc') == $row['khoahoc_id']) ? 'selected' : '' ?> ><?php echo $row['tenkhoa'] ?></option>
                              <?php endforeach;?>
                          </select>
                        </div>
                    </div>
                    <div class="col-xs-5">
                        <div class="input-group add-on hitec-w-100percent">
                            <input class="form-control" id="timkiem_thietlapttsv" name="timkiem_thietlapttsv" placeholder="Tìm kiếm theo mã sinh viên" type="text" >
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-default" type="submit" ><span class="fa fa-search"></span></button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>

        <div id="searchResult" style="margin-top:5px;">
          
            <div class="container-fluid">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th style="width:80px" class="text-center">
                                STT
                            </th>
                            <th style="width:120px" class="text-center">
                                Mã sinh viên
                            </th>
                            <th style="width:300px" class="text-center">
                                Họ và tên
                            </th>
                            <th style="width:80px" class="text-center">
                                Giới tính
                            </th>
                            <th style="width:100px" class="text-center">
                                Ngày sinh
                            </th>
                            <th style="width:100px" class="text-center">
                                Điện thoại
                            </th>
                            <th style="width:auto" class="text-center">
                                Email
                            </th>
                            <?php if ($this->session->userdata('phanquyen') == 1) { ?>
                            <th style="width:100px" class="text-center">
                                Thiết Lập </br>Tình Trạng
                            </th>
                          <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                      <?php for ($i=0; $i < @count($listSV) ; $i++) { ?>
                        <tr >
                            <td class="text-center">
                               <?php echo $i + 1 ?>
                            </td>
                            <td class="text-center">
                               <?php echo $listSV[$i]['MSSV']?>
                            </td>
                            <td>
                                <?php echo $listSV[$i]['Ho'].' '.$listSV[$i]['Ten']?>
                            </td>
                            <td class="text-center">
                                <?php echo $listSV[$i]['Phai']?>
                            </td>
                            <td class="text-center">
                                <?php echo $listSV[$i]['Ngaysinh']?>
                            </td>
                            <td class="text-center">
                                <?php echo $listSV[$i]['SDT']?>
                            </td>
                            <td>
                                <?php echo $listSV[$i]['Email']?>
                            </td>
                            <?php if ($this->session->userdata('phanquyen') == 1) { ?>
                            <td class="text-center">
                                <a href="<?php echo base_url('Giaovu/Sinhvien/capnhat/').$listSV[$i]['MSSV']?>" class="btn-sm btn-success" title="Cập Nhật Trạng Thái">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                          <?php } ?>
                        </tr>
                      <?php } ?>
                    </tbody>
                </table>
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
        </div>
