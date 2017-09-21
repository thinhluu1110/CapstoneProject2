<div class="col-xs-12 col-offset-200">
    <div class="hitec-content">
        <img id="ajax-loader" src="/Teacher/images/icons/ajax-loader.gif" alt="" style="display: none;">
        <h2>Quản Lý Giảng Viên</h2>
        <div id="searchResult" style="margin-top:5px;">
            <div class="container-fluid text-right">
                <div class="col-xs-12" style="margin-right:10px">
                    <div class="input-group add-on hitec-w-100percent">
                        <input class="form-control" placeholder="Tìm kiếm theo mã hoặc họ tên giảng viên" type="text" value="">
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="button">
                                <span class="fa fa-search"></span> Tìm Kiếm
                            </button>
                        </div>
                    </div>
                </div>
                <a href="javascript:void(0)"><b>[Import Data]</b></a>
            </div>
            <div class="container-fluid">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th style="width:120px" class="text-center">
                                Mã Giảng Viên
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
                            <th style="width:120px" class="text-center">
                                Điện thoại
                            </th>
                            <th style="width:120px" class="text-center">
                                Email
                            </th>
                            <th style="width:auto" class="text-center">
                                Địa Chỉ
                            </th>
                            <th style="width:70px;border-right:1px" class="text-center">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($lstGiangVien as $item)
                            {
                                ?>
                                    <tr style="cursor:pointer">
                                        <td class="text-center">
                                            <?php echo $item['MaGiangVien'] ?>
                                        </td>
                                        <td>
                                            <?php echo $item['HoTen'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?php 
                                                if($item['GioiTinh']) 
                                                    echo "Nam";
                                                else
                                                    echo "Nữ";
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $item['NgaySinh'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $item['SDT'] ?>
                                        </td>
                                        <td>
                                            <?php echo $item['Email'] ?>
                                        </td>
                                        <td>
                                        <?php echo $item['DiaChi'] ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="/Admin/StudentStatus" class="btn-sm btn-success">
                                                            <i class="fa fa-edit"></i>
                                                        </a> &nbsp;
                                            <a href="/Admin/StudentStatus" class="btn-sm btn-danger">
                                                            <i class="fa fa-remove"></i>
                                                        </a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>