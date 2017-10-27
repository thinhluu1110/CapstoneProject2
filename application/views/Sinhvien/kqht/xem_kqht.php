<div class="main-content">
            <div class="main-content-inner">
                <div class="page-content">
                    <img id="ajax-loader" src="http://aspnet.demo.hueuni.edu.vn/StudentManager/images/ajax-loader.gif" alt="">
                    <div class="page-header">
                        



<div class="page-header">
    <a href="/StudentManager/">Kết Qủa Học Tập</a>
</div>
<div class="container-fluid">
    <div class="linkBar">
        <a id="contentPlaceMain_buttonExport" href="javascript:__doPostBack('ctl00$contentPlaceMain$buttonExport','')">[Xuất sang file Excel]</a>
    </div>
    <div id="contentPlaceMain_panelKetQuaHocTap" class="data0">

        <table class="tableData2">
            <tbody>
                <tr>
                    <td class="rowHeader" align="center" rowspan="2" style="width:10%;">Mã học phần</td>
                    <td class="rowHeader" align="center" rowspan="2" style="width:auto">Tên học phần</td>
                    <td class="rowHeader" align="center" rowspan="2" style="width:5%;">Số DVHT</td>
                    <td class="rowHeader" align="center" rowspan="2" style="width:10%;">Chuyên Cần</td>
                    <td class="rowHeader" align="center" rowspan="2" style="width:5%;">Giữa Kì</td>
                    <td class="rowHeader" align="center" rowspan="2" style="width:5%;">Thi Lần 1</td>
                    <td class="rowHeader" align="center" rowspan="2" style="width:5%;">Thi Lần 2</td>
                    <td class="rowHeader" align="center" rowspan="2" style="width:5%;">DTB</td>
                    <td class="rowHeader" align="center" rowspan="2" style="width:5%;">Ghi chu</td>
                </tr>
                <tr>
                </tr>
                <?php foreach ($list as $row) : ?>
                <tr>
                    <td class="rowTitle" align="left" colspan="9"><?php echo $row->id_hk ?></td>
                </tr>
                <tr>
                    <td class="cell1" align="left"><?php echo $row->MaMH ?></td>
                    <td class="cell1" align="left"><a href=""><?php echo $row->TenMH ?></a></td>
                    <td class="cell1" align="center"><?php echo $row->DVHT ?></td>
                    <td class="cell1" align="center"><?php echo $row->DiemChuyenCan ?></td>
                    <td class="cell1" align="center"><?php echo $row->DiemGiuaKi ?></td>
                    <td class="cell1" align="center"><?php echo $row->DiemL1 ?></td>
                    <td class="cell1" align="center"><?php echo $row->DiemL2 ?></td>
                    <td class="cell1" align="center"><?php echo $this->db->select_sum('$DiemGiuaKi');
                    $row->$query = $this->db->get('ketqua');
                     ?></td>
                    <td class="cell1" align="center"><?php echo $row->Ghichu ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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