<div class="main-content">
    <div class="main-content-inner">
        <div class="page-content">
            <img id="ajax-loader" src="http://aspnet.demo.hueuni.edu.vn/StudentManager/images/ajax-loader.gif" alt="" />
            <div class="page-header">

                <div class="hitec-content">
                  <h2>KẾT QUẢ HỌC TẬP CỦA SINH VIÊN <?php if ($listDiemChitiet[0]['Ho'] != null && $listDiemChitiet[0]['Ten'] != null && $listDiemChitiet[0]['MSSV'] ) {
                    echo $listDiemChitiet[0]['Ho'].' '.$listDiemChitiet[0]['Ten'].' - '.$listDiemChitiet[0]['MSSV']; }?></h2>
                    <div class="container-fluid">
                </div>
                <div class="col-md-1">
                  <br>
                </div>
                    <div class="container-fluid">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="rowHeader center" align="center" rowspan="2" style="width:120px;">Mã học phần</th>
                                    <th class="rowHeader center" align="center" rowspan="2" style="width:auto">Tên học phần</th>
                                    <th class="rowHeader center" align="center" rowspan="2" style="width:100px;">Số DVHT</th>
                                    <th class="rowHeader center" align="center" rowspan="2" style="width:100px;">Chuyên Cần</th>
                                    <th class="rowHeader center" align="center" rowspan="2" style="width:100px;">Giữa Kì</th>
                                    <th class="rowHeader center" align="center" rowspan="2" style="width:100px;">Thi Lần 1</th>
                                    <th class="rowHeader center" align="center" rowspan="2" style="width:100px;">Thi Lần 2</th>
                                    <th class="rowHeader center" align="center" rowspan="2" style="width:100px;">DTB</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td class="hitec-td-2" colspan="12">
                                        <strong>Học Kì 1</strong>
                                    </td>
                                </tr>
                                <?php

                                    //@$list = $listDiemChitiet;
                                    // pre($list);
                                    for ($i = 0; $i < count($listDiemChitiet); $i++){
                                        if($listDiemChitiet[$i]['hocki_id'] == 1){
                                ?>
                                <tr>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['MaMH']?>
                                    </td>
                                    <td class="left">
                                        <?php echo $listDiemChitiet[$i]['TenMH']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['dvht_tc']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['chuyencan']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['giuaki']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['lan1']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['lan2']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['diemTB']?>
                                    </td>
                                </tr>
                                 <?php } }?>

                                <tr>
                                    <td  align="right" colspan="6">
                                        Điểm TB Tích Lũy Học Kì:  <?php echo @$dtb_hientai1;?>
                                    </td>
                                    <td  align="right" colspan="8">
                                        Tổng Điểm TB Tích Lũy : <?php echo @$dtb_tong_hk1;?>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="hitec-td-2" colspan="12">
                                        <strong>Học Kì 2</strong>
                                    </td>
                                </tr>
                                <?php

                                    //@$list = $listDiemChitiet;
                                    // pre($list);
                                    for ($i = 0; $i < count($listDiemChitiet); $i++){
                                        if($listDiemChitiet[$i]['hocki_id'] == 2){
                                ?>
                                <tr>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['MaMH']?>
                                    </td>
                                    <td class="left">
                                        <?php echo $listDiemChitiet[$i]['TenMH']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['dvht_tc']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['chuyencan']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['giuaki']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['lan1']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['lan2']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['diemTB']?>
                                    </td>
                                </tr>
                                 <?php } }?>
                                <tr>
                                    <td  align="right" colspan="6">
                                        Điểm TB Tích Lũy Học Kì:  <?php echo @$dtb_hientai2;?>
                                    </td>
                                    <td  align="right" colspan="8">
                                        Tổng Điểm TB Tích Lũy : <?php echo @$dtb_tong_hk2;?>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td  align="right" colspan="6"> Điểm TB Tích Lũy Học Kì: 10</td>
                                    <td  align="right" colspan="8"> Tổng Điểm TB Tích Lũy : 10</td>
                                </tr> -->
                                <tr>
                                    <td class="hitec-td-2" colspan="12">
                                        <strong>Học Kì 3</strong>
                                    </td>
                                </tr>
                                <?php

                                    //@$list = $listDiemChitiet;
                                    // pre($list);
                                    for ($i = 0; $i < count($listDiemChitiet); $i++){
                                        if($listDiemChitiet[$i]['hocki_id'] == 3){
                                ?>
                                <tr>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['MaMH']?>
                                    </td>
                                    <td class="left">
                                        <?php echo $listDiemChitiet[$i]['TenMH']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['dvht_tc']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['chuyencan']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['giuaki']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['lan1']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['lan2']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['diemTB']?>
                                    </td>
                                </tr>
                                <?php } }?>
                                <tr>
                                    <td  align="right" colspan="6">
                                        Điểm TB Tích Lũy Học Kì:  <?php echo @$dtb_hientai3;?>
                                    </td>
                                    <td  align="right" colspan="8">
                                        Tổng Điểm TB Tích Lũy : <?php echo @$dtb_tong_hk3;?>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td  align="right" colspan="6"> Điểm TB Tích Lũy Học Kì: 10</td>
                                    <td  align="right" colspan="8"> Tổng Điểm TB Tích Lũy : 10</td>
                                </tr> -->
                                <tr>
                                    <td class="hitec-td-2" colspan="12">
                                        <strong>Học Kì 4</strong>
                                    </td>
                                </tr>
                                <?php

                                    //@$list = $listDiemChitiet;
                                    // pre($list);
                                    for ($i = 0; $i < count($listDiemChitiet); $i++){
                                        if($listDiemChitiet[$i]['hocki_id'] == 4){
                                ?>
                                <tr>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['MaMH']?>
                                    </td>
                                    <td class="left">
                                        <?php echo $listDiemChitiet[$i]['TenMH']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['dvht_tc']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['chuyencan']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['giuaki']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['lan1']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['lan2']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['diemTB']?>
                                    </td>
                                </tr>
                                <?php } }?>
                                <tr>
                                    <td  align="right" colspan="6">
                                        Điểm TB Tích Lũy Học Kì:  <?php echo @$dtb_hientai4;?>
                                    </td>
                                    <td  align="right" colspan="8">
                                        Tổng Điểm TB Tích Lũy : <?php echo @$dtb_tong_hk4;?>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td  align="right" colspan="6"> Điểm TB Tích Lũy Học Kì: 10</td>
                                    <td  align="right" colspan="8"> Tổng Điểm TB Tích Lũy : 10</td>
                                </tr> -->
                                <tr>
                                    <td class="hitec-td-2" colspan="12">
                                        <strong>Học Kì 5</strong>
                                    </td>
                                </tr>
                                <?php

                                    //@$list = $listDiemChitiet;
                                    // pre($list);
                                    for ($i = 0; $i < count($listDiemChitiet); $i++){
                                        if($listDiemChitiet[$i]['hocki_id'] == 5){
                                ?>
                                <tr>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['MaMH']?>
                                    </td>
                                    <td class="left">
                                        <?php echo $listDiemChitiet[$i]['TenMH']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['dvht_tc']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['chuyencan']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['giuaki']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['lan1']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['lan2']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['diemTB']?>
                                    </td>
                                </tr>
                                <?php } }?>
                                <tr>
                                    <td  align="right" colspan="6">
                                        Điểm TB Tích Lũy Học Kì:  <?php echo @$dtb_hientai5;?>
                                    </td>
                                    <td  align="right" colspan="8">
                                        Tổng Điểm TB Tích Lũy : <?php echo @$dtb_tong_hk5;?>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td  align="right" colspan="6"> Điểm TB Tích Lũy Học Kì: 10</td>
                                    <td  align="right" colspan="8"> Tổng Điểm TB Tích Lũy : 10</td>
                                </tr> -->
                                <tr>
                                    <td class="hitec-td-2" colspan="12">
                                        <strong>Học Kì 6</strong>
                                    </td>
                                </tr>
                                <?php

                                    //@$list = $listDiemChitiet;
                                    // pre($list);
                                    for ($i = 0; $i < count($listDiemChitiet); $i++){
                                        if($listDiemChitiet[$i]['hocki_id'] == 6){
                                ?>
                                <tr>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['MaMH']?>
                                    </td>
                                    <td class="left">
                                        <?php echo $listDiemChitiet[$i]['TenMH']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['dvht_tc']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['chuyencan']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['giuaki']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['lan1']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['lan2']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['diemTB']?>
                                    </td>
                                </tr>
                                 <?php } }?>
                                <tr>
                                    <td  align="right" colspan="6">
                                        Điểm TB Tích Lũy Học Kì:  <?php echo @$dtb_hientai6;?>
                                    </td>
                                    <td  align="right" colspan="8">
                                        Tổng Điểm TB Tích Lũy : <?php echo @$dtb_tong_hk6;?>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td  align="right" colspan="6"> Điểm TB Tích Lũy Học Kì: 10</td>
                                    <td  align="right" colspan="8"> Tổng Điểm TB Tích Lũy : 10</td>
                                </tr> -->
                                <tr>
                                    <td class="hitec-td-2" colspan="12">
                                        <strong>Học Kì 7</strong>
                                    </td>
                                </tr>
                                <?php

                                    //@$list = $listDiemChitiet;
                                    // pre($list);
                                    for ($i = 0; $i < count($listDiemChitiet); $i++){
                                        if($listDiemChitiet[$i]['hocki_id'] == 7){
                                ?>
                                <tr>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['MaMH']?>
                                    </td>
                                    <td class="left">
                                        <?php echo $listDiemChitiet[$i]['TenMH']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['dvht_tc']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['chuyencan']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['giuaki']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['lan1']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['lan2']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['diemTB']?>
                                    </td>
                                </tr>
                                 <?php } }?>
                                <tr>
                                    <td  align="right" colspan="6">
                                        Điểm TB Tích Lũy Học Kì:  <?php echo @$dtb_hientai7;?>
                                    </td>
                                    <td  align="right" colspan="8">
                                        Tổng Điểm TB Tích Lũy : <?php echo @$dtb_tong_hk7;?>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td  align="right" colspan="6"> Điểm TB Tích Lũy Học Kì: 10</td>
                                    <td  align="right" colspan="8"> Tổng Điểm TB Tích Lũy : 10</td>
                                </tr> -->
                                <tr>
                                    <td class="hitec-td-2" colspan="12">
                                        <strong>Học Kì 8</strong>
                                    </td>
                                </tr>
                                <?php

                                    //@$list = $listDiemChitiet;
                                    // pre($list);
                                    for ($i = 0; $i < count($listDiemChitiet); $i++){
                                        if($listDiemChitiet[$i]['hocki_id'] == 8){
                                ?>
                                <tr>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['MaMH']?>
                                    </td>
                                    <td class="left">
                                        <?php echo $listDiemChitiet[$i]['TenMH']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['dvht_tc']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['chuyencan']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['giuaki']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['lan1']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['lan2']?>
                                    </td>
                                    <td class="center">
                                        <?php echo $listDiemChitiet[$i]['diemTB']?>
                                    </td>
                                </tr>
                                 <?php } }?>
                                <tr>
                                    <td  align="right" colspan="6">
                                        Điểm TB Tích Lũy Học Kì:  <?php echo @$dtb_hientai8;?>
                                    </td>
                                    <td  align="right" colspan="8">
                                        Tổng Điểm TB Tích Lũy : <?php echo @$dtb_tong_hk8;?>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td  align="right" colspan="6"> Điểm TB Tích Lũy Học Kì: 10</td>
                                    <td  align="right" colspan="8"> Tổng Điểm TB Tích Lũy : 10</td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
