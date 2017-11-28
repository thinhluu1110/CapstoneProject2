<div class="main-content">
            <div class="main-content-inner">
                <div class="page-content">
                    <img id="ajax-loader" src="http://aspnet.demo.hueuni.edu.vn/StudentManager/images/ajax-loader.gif" alt="">
                    <div class="page-header">


<div class="page-header">
    <a href="/StudentManager/">Điểm Rèn Luyện</a>
</div>
<div class="container-fluid">
    <div class="container-fluid">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th style="width:40px" class="text-center">
                        STT
                    </th>
                    <th style="width:200px" class="text-center">
                        Học Kì
                    </th>
                    <th style="width:auto" class="text-center">
                        Điểm
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php

            for($i=0; $i < count($listdrl); $i++) { ?>
                <tr>
                    <td class="text-center">
                        <?php echo $i+1 ?>
                    </td>
                    <td class="text-center">
                        <?php echo $listdrl[$i]['tenHocki'] ?>
                    </td>
                    <td class="text-center">
                        <?php echo $listdrl[$i]['diem'] ?>
                    </td>
                </tr>
            <?php } ?>
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
