<div class="main-content-inner">
    <div class="page-content">
        <img id="ajax-loader" src="/image/ajax-loader.gif" alt="" />
        <div class="page-header">
            <div class="hitec-content">
                <h2>DANH SÁCH SV ĐƯỢC LÀM ĐỒ ÁN</h2>
                <div class="container-fluid">
                    <form method="get" action="<?php echo base_url('Giaovu/Doan/index')?>" id="formSearch" role="form" onsubmit="return true;">
                      <div class="row">
                          <div class="col-xs-6">
                              <div class="input-group hitec-w-100percent">
                                <select class="form-control" id="nganhhoc" name="nganhhoc" onchange='if(this.value != 0) { this.form.submit(); }'>
                                  <option value="">--- Chọn Ngành Học ---</option>
                                  <?php foreach ($listnganhhoc as $row):?>
                                  <option value="<?php echo $row->nganhhoc_id ?>" <?php echo ($this->input->get('nganhhoc') == $row->nganhhoc_id) ? 'selected' : '' ?> ><?php echo $row->tennganh ?></option>
                                  <?php endforeach;?>
                              </select>
                              </div>
                          </div>
                          <div class="col-xs-6">
                              <div class="input-group hitec-w-100percent">
                                <select class="form-control" id="khoahoc" name="khoahoc" onchange='if(this.value != 0) { this.form.submit(); }'>
                                  <option value="">--- Chọn Khóa Học ---</option>
                                  <?php foreach ($listkhoahoc as $row):?>
                                  <option value="<?php echo $row['khoahoc_id'] ?>" <?php echo ($this->input->get('khoahoc') == $row['khoahoc_id']) ? 'selected' : '' ?> ><?php echo $row['tenkhoa'] ?></option>
                                  <?php endforeach;?>
                              </select>
                              </div>
                          </div>
                      </div>
                    </form>
                </div>
                  <div class="container-fluid text-right">
                    <a href="<?php echo base_url('Giaovu/Doan/index?exp=exp&khoahoc=').$this->input->get('khoahoc').'&nganhhoc='.$this->input->get('nganhhoc')?>"><u>Xuất Danh Sách Ra Excel</u></a>
                    </div>
                <div id="searchResult" style="margin-top:5px;">
                    <div class="container-fluid">
                      <ul class="nav nav-tabs">
                        <li class="active col-xs-6"  ><a style="color:black;font-size:14px;text-align: center;border-style: solid;border-color: #92a8d1;" data-toggle="tab" href="#dspassdk">Danh Sách Sinh Viên Được Làm Đồ Án</a></li>
                        <li class="col-xs-6"><a style="color:black;font-size:14px;text-align: center;border-style: solid;border-color: #92a8d1;" data-toggle="tab" href="#dsfaildk">Danh Sách Sinh Viên Không Được Làm Đồ Án</a></li>
                      </ul>

                <div class="tab-content">
                  <div id="dspassdk" class="tab-pane fade in active">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width:40px" class="text-center">
                                    STT
                                </th>
                                <th style="width:100px" class="text-center">
                                    Mã SV
                                </th>
                                <th style="width:auto" class="text-center">
                                    Họ Tên
                                </th>
                                <th style="width:200px" class="text-center">
                                    Ngành Học
                                </th>
                                <th style="width:200px" class="text-center">
                                    Khóa Học
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php if (isset($listsvpassdk)) {
                           $i = 1; foreach ($listsvpassdk as  $value) {
                                    if ($value['status'] == 0) {?>
                                <tr class="">
                                    <td class="text-center">
                                      <?php echo $i++ ?>
                                    </td>
                                    <td class="text-center">
                                      <?php echo $value['MSSV'] ?>
                                    </td>
                                    <td class="text-center">
                                      <?php echo $value['Ho'].' '.$value['Ten'] ?>
                                    </td>
                                    <td class="text-center">
                                      <?php echo $value['nganh'] ?>
                                    </td>
                                    <td class="text-center">
                                      <?php echo $value['khoa'] ?>
                                    </td>
                                </tr>
                              <?php }}} ?>
                        </tbody>
                    </table>
                  </div>
                  <div id="dsfaildk" class="tab-pane fade">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width:40px" class="text-center">
                                    STT
                                </th>
                                <th style="width:100px" class="text-center">
                                    Mã SV
                                </th>
                                <th style="width:auto" class="text-center">
                                    Họ Tên
                                </th>
                                <th style="width:200px" class="text-center">
                                    Ngành Học
                                </th>
                                <th style="width:200px" class="text-center">
                                    Khóa Học
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php if (isset($listsvpassdk)) {
                           $i = 1; foreach ($listsvpassdk as  $value) {
                                    if ($value['status'] == 1) {?>
                                <tr class="">
                                    <td class="text-center">
                                      <?php echo $i++ ?>
                                    </td>
                                    <td class="text-center">
                                      <?php echo $value['MSSV'] ?>
                                    </td>
                                    <td class="text-center">
                                      <?php echo $value['Ho'].' '.$value['Ten'] ?>
                                    </td>
                                    <td class="text-center">
                                      <?php echo $value['nganh'] ?>
                                    </td>
                                    <td class="text-center">
                                      <?php echo $value['khoa'] ?>
                                    </td>
                                </tr>
                              <?php }}} ?>
                        </tbody>
                    </table>
                  </div>
                </div>
                    </div>
                    <div class="container-fluid text-right">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-xs-12"></div>
        </div>
    </div>
</div>
