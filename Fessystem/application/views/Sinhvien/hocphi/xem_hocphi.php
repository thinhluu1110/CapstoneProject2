<div class="main-content">
            <div class="main-content-inner">
                <div class="page-content">
                    <img id="ajax-loader" src="http://aspnet.demo.hueuni.edu.vn/StudentManager/images/ajax-loader.gif" alt="">
                    <div class="page-header">
                        



<div class="page-header">
    <a href="">Học Phí</a>
</div>
<div class="container-fluid">
    <div id="contentPlaceMain_panelKetQuaHocTap" class="data0">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>                 
                    <th style="width:22.5%" class="text-center">
                        Học Phí Chính Còn Nợ
                    </th>
                    <th style="width:22.5%" class="text-center">
                        Học Phí Học Lại Còn Nợ
                    </th>
                    <th style="width:22.5%" class="text-center">
                        Tổng Nợ
                    </th>
                    <th style="width:10%" class="text-center">
                        Miễn Giảm
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($list as $row) : ?>
                <tr style="cursor:pointer">                  
                    <td class="text-center">
                        <?php echo $row->hpchinh ?>
                    </td>
                    <td class="text-center">
                        <?php echo $row->hphl ?>
                    </td>
                    <td class="text-center">
                        <?php  ?>
                    </td>
                    <td class="text-center">
                       <?php echo $row->miengiam ?>
                    </td>
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