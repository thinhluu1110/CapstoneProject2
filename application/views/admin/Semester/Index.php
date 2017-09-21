<div class="col-xs-12 col-offset-200">
    <div class="hitec-content">
        <img id="ajax-loader" src="/Teacher/images/icons/ajax-loader.gif" alt="" style="display: none;">
        <h2>Khóa Học</h2>
        <div id="searchResult" style="margin-top:5px;">
            <div class="container-fluid">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th style="width:150px" class="text-center">
                                Mã Khóa Học
                            </th>
                            <th style="width:400px" class="text-center">
                                Tên Khóa Học
                            </th>
                            <th style="width:auto" class="text-center">
                                Ghi Chú
                            </th>
                            <th style="width:70px;border-right:1px" class="text-center">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                            foreach ($lstHocKi as $item)
                            {
                                ?>
                                    <tr style="cursor:pointer">
                                        <td class="text-center">
                                            <?php echo $item['MaHocKi'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $item['TenHocKi'] ?>
                                        </td>
                                        <td>
                                            <?php echo $item['GhiChu'] ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="/Admin/StudentStatus" class="btn-sm btn-success">
                                                <i class="fa fa-edit"></i>
                                            </a> 
                                            &nbsp;
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