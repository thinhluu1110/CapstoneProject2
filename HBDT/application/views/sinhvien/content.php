<div class="main-content">
            <div class="main-content-inner">
                <div class="page-content">
                    <img id="ajax-loader" src="http://aspnet.demo.hueuni.edu.vn/StudentManager/images/ajax-loader.gif" alt="">
                    <div class="page-header">
                        

<div class="page-header">
    <a href="/StudentManager/">Điểm Rèn Luyện</a>
</div>
<div class="container-fluid">
    <div class="linkBar">
        <a id="contentPlaceMain_buttonExport" href="javascript:__doPostBack('ctl00$contentPlaceMain$buttonExport','')">[Xuất sang file Excel]</a>
    </div>
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
            <?php foreach($list as $row) : ?>
                <tr>
                    <td class="text-center">
                        <?php echo $row->id ?>
                    </td>
                    <td class="text-center">
                        <?php echo $row->id_hk ?>
                    </td>
                    <td class="text-center">
                        <?php echo $row->diem ?>
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