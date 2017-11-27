<div class="main-content-inner">
    <div class="page-content">
        <img id="ajax-loader" src="http://aspnet.demo.hueuni.edu.vn/StudentManager/images/ajax-loader.gif" alt="" />
        <div class="page-header">

        <div class="hitec-content">
            <h2>KẾT QUẢ HỌC TẬP</h2>

            <div id="searchResult" style="margin-top:5px;">
                <!-- Layout dùng cho các view dạng một phần nội dung trong trang web -->
                <!-- <div class="container-fluid text-right">
                    <a href="javascript:void(0)"  title="Import excel" data-toggle="modal" data-target="#dialogImport">[Import Data]</a>
                </div> -->
                
                <div class="container-fluid">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width:40px" class="text-center">
                                    STT
                                </th>
                                <th style="width:100px" class="text-center">
                                    Mã SV
                                </th>
                                <th style="width:70px" class="text-center">
                                    Họ
                                </th>
                                <th style="width:150px" class="text-center">
                                    Tên
                                </th>
                                <th style="width:100px" class="text-center">
                                    Ngày Sinh
                                </th>
                                <th style="width:100px" class="text-center">
                                    Lớp
                                </th>
                                <th style="width:100px" class="text-center">
                                    Mã Ngành
                                </th>
                                <th style="width:100px" class="text-center">
                                    Mã Môn Học
                                </th>
                                <th style="width:auto;" class="text-center">
                                    Tên Môn Học
                                </th>
                                <th style="width:100px" class="text-center">
                                    ĐTB
                                </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php for ($i=0; $i < @count($listDiemSV); $i++) { ?>
                            <tr onclick="window.location.replace('Chitietketquahoctap.php')">
                                <td class="text-center">
                                    <?php echo $i + 1 ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $listDiemSV[$i]['sinhvien_id'] ?>
                                </td>
                                <td>
                                    <?php echo $listDiemSV[$i]['Ho'] ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $listDiemSV[$i]['Ten'] ?>
                                </td>
                                <td class="text-center">
                                   <?php echo $listDiemSV[$i]['Ngaysinh'] ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $listDiemSV[$i]['tenlop'] ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $listDiemSV[$i]['ma_nganhhoc'] ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $listDiemSV[$i]['MaMH'] ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $listDiemSV[$i]['TenMH'] ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $listDiemSV[$i]['diemTB'] ?>
                                </td>
                            </tr>
                            <?php }  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        </div>
    </div>
</div>
