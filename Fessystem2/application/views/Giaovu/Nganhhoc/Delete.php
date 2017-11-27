<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('Giaovu/head'); ?>
  <title>Main</title>
</head>
<body class="no-skin" style="margin:0 !important;padding:0 !important">
<div style="width:100%">
  <div class="col-xs-12">
              <div class="modal-content">
                <form id="frmEditEmployee" name="frmCreateEmployee" method="post" action="<?php echo base_url('Giaovu/Nganhhoc/Del/'.$nganhhoc_info['nganhhoc_id']) ?>" class="form-horizontal" role="form" ng-submit="UpdateEmployee()">
                <div class="modal-body text-center">
                <strong>Bạn có muốn xóa bản ghi ?</strong>
              </div>
              <div class="modal-footer" style="padding:0px">
                <button class="btn btn-sm btn-default" data-dismiss="modal">Hủy</button>
                <input type="submit" class="btn btn-sm btn-default" value="Xóa" id="submit" name="submit">
            </div>
        </form>
              </div>
  </div>
    <div class="clear"></div>
</div>
<script>
    $(document).ready(function () {
        setTimeout(function () {
            if($('#frmEditEmployee .modal-header.add_success').length > 0){
                $('#frmEditEmployee .modal-header.add_success').removeClass('add_success');
            }
        }, 3000);
    });
</script>
</body>
</html>
