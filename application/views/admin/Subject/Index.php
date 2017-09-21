<div class="hitec-content">
    <h2>QUẢN LÝ HỌC PHẦN</h2>
    <div id="searchResult" style="margin-top:5px;">
        <div class="container-fluid text-right">
            <form>
                <div class="col-xs-12">
                    <div class="input-group add-on hitec-w-100percent">
                        <input class="form-control" id="searchvalue" name="SearchValue" placeholder="Tìm kiếm theo mã hoặc tên học phần" type="text"
                            value="">
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="button"><span class="fa fa-search"></span> Tìm Kiếm</button>
                        </div>
                    </div>
                </div>
            </form>
            <form action="<?php echo base_url("admin/subject/import") ?>" method="post" enctype="multipart/form-data">
                <input type="file" hidden="hidden" style="display:none" name="xlsFile">
                <a>[Import Data]</a>
            </form>
        </div>
        <div class="container-fluid">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th style="width:100px" rowspan="2" class="text-center">
                            Mã học phần
                        </th>
                        <th style="width:auto" rowspan="2" class="text-center">
                            Tên học phần
                        </th>
                        <th style="width:100px" rowspan="2" class="text-center">
                            Số DVHT
                        </th>
                        <th style="width:80px" class="text-center">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($lstMonHoc as $item)
                        {
                            ?>
                    <tr style="cursor:pointer">
                        <td class="text-center">
                            <?php echo $item['MaMonHoc'] ?>
                        </td>
                        <td class="">
                            <?php echo $item['TenMonHoc'] ?>
                        </td>
                        <td class="text-center">
                            <?php echo $item['SoDVHT'] ?>
                        </td>
                        <td class="text-center">
                            <a href="/Admin/StudentStatus" class="btn-sm btn-info">
                                            <i class="fa fa-pencil"></i>
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