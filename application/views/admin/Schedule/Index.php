<div class="hitec-content">
    <h2>Thời Khóa Biểu</h2>
    <div class="container-fluid">
        <form id="formSearch" role="form" onsubmit="return false;">
            <div class="row">
                <div class="col-xs-3">
                    <div class="input-group hitec-w-100percent">
                        <select class="form-control" id="khoahoc" name="KhoaHoc">
                            <option selected="selected" value="">--- Chọn Khóa Học ---</option>
                            <?php 
                                foreach ($lstKhoaHoc as $item)
                                {
                                    ?>
                                        <option value="<?php echo $item['MaKhoaHoc'] ?>"><?php echo $item['TenKhoaHoc'] ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="input-group hitec-w-100percent">
                        <select class="form-control" id="lstLopHoc" name="KhoaHoc">
                            <option selected="selected" value="">--- Chọn Lớp ---</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="input-group add-on hitec-w-100percent">
                        <input class="form-control" id="searchvalue" name="SearchValue" placeholder="Tìm kiếm theo mã/tên lớp" type="text" value="">
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="button"><span class="fa fa-search"></span> Tìm Kiếm</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div id="searchResult" style="margin-top:5px;">
        <div class="container-fluid text-right">
            <a href="javascript:void(0)" id="btnImport"><b>[Import Data]</b></a>
        </div>
        <div class="container-fluid text-center">
            <img src="<?php echo base_url("assets/uploads/tkb/tkb_example.png") ?>"/>
        </div>
    </div>
</div>
<form action="<?php echo base_url("admin/schedule/import") ?>">
    <input type="file" name="scheduleImg" id="scheduleImg">
</form>
<script>
    var baseUrl =  '<?php echo base_url() ?>';
    $(document).ready(() => {
        $("#btnImport").click(function (){
            $("#scheduleImg").trigger('click');
        });

        $("#xlsFile").change(function (){
           var formData = new FormData();
           formData.append('file', $('#scheduleImg')[0].files[0]);
           $.ajax({
                url:  baseUrl + 'admin/schedule/import',
                method:'POST',
                data:formData,
                processData : false,
                contentType:false,
                success : function(data) {
                    alert('OK');
                }
           });
        });
    });
</script>



