<div class="main-content-inner">
    <div class="page-content">
        <img id="ajax-loader" src="http://aspnet.demo.hueuni.edu.vn/StudentManager/images/ajax-loader.gif" alt="" />
        <div class="page-header">

        <div class="hitec-content">
            <h2>TRA CỨU CHƯƠNG TRÌNH ĐÀO TẠO</h2>

                <div class="container-fluid">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center" style="width:40px">STT</th>
                                <th class="text-center" style="width:300px;">Ngành Học</th>
                                <th class="text-center" style="width:auto">Khóa Học</th>
                                <th class="text-center" style="width:150px">Nội dung</th>
                                <th class="text-center" style="width:100px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i=0; $i < count($listctdt) ; $i++) { ?>
                            <tr>
                                <td class="hitec-td-1 text-center">
                                    <?php echo $i + 1 ?>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="javascript:;">
                                        <?php echo $listctdt[$i]['tennganh'] ?>
                                    </a>
                                </td>
                                <td class="hitec-td-1">
                                    <a href="javascript:;">
                                       <?php echo $listctdt[$i]['tenkhoa'] ?>
                                    </a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="<?php echo base_url().'Sinhvien/Chuongtrinhdaotao/Download/'.$listctdt[$i]['ctdt_id']?>">DownLoad File</a>
                                </td>
                                <td class="hitec-td-1 text-center">
                                    <a href="<?php echo base_url().'Sinhvien/Kehoachdaotao/khdt_Chitiet/'.$listctdt[$i]['nganhhoc_id'].'/'.$listctdt[$i]['khoahoc_id']?>">Chi tiết</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        


    </div>
</div>
