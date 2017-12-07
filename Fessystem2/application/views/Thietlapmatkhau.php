<!DOCTYPE>
<html lang="en">
	<head>
		<?php $this->load->view('Giaovu/head'); ?>
		<title>Main</title>
	</head>

	<body class="no-skin" style="margin:0 !important;padding:0 !important">
	    <div class="main-container ace-save-state" id="main-container">
	        <!-- Content -->
	        <div class="main-content">
            <div class="main-content-inner">
                <div class="page-content">
                    <div class="container" style="padding-top: 100px">
                      <div class="row">
                      <div class="col-md-4 col-md-offset-4">
                              <div class="panel panel-default">
                                <div class="panel-body">
                                  <div class="text-center">
                                    <h3><i class="fa fa-lock fa-4x"></i></h3>
                                    <h2 class="text-center">Quên Mật Khẩu?</h2>
                                    <p>Bạn Có Thể Đặt Lại Mật Khẩu Tại Đây.</p>
                                    <div class="panel-body">

                                      <form id="Updatepass_form" role="form" autocomplete="off" class="form" method="post">
                                        <div hidden class="form-group">
                                            <?php if (isset($email_hash,$email_code)) {?>
                                          <div hidden="hidden" class="input-group">
                                            <input hidden="hidden" id="email_hash" name="email_hash" value="<?php echo $email_hash ?>"  class="form-control">
                                            <input hidden="hidden" id="email_code" name="email_code" value="<?php echo $email_code ?>" class="form-control">
                                          </div>
                                        <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                            <input id="email_reset" name="email" value="<?php echo (isset($email)) ? $email : ''; ?>" class="form-control"  type="email" >
                                          </div>
                                        </div>
                                        <div class="form-group text-left">
                                         <label class="coltrol-lable ">Mật Khẩu Mới:</label>
                                             <div class="input-group">
                                            
                                            <span class="input-group-addon"><i class="fa fa-key color-blue"></i></span>
                                            <input id="pass_reset" name="pass"  class="form-control"  type="password" >
                                          </div>
                                        </div>
                                        <div class="form-group text-left">
                                             <label class="coltrol-lable">Xác Nhận Mật Khẩu Mới:</label>
                                          <div class="input-group">
                                          
                                            <span class="input-group-addon"><i class="fa fa-key color-blue"></i></span>
                                            <input id="repass_reset" name="repass"  class="form-control"  type="password" >
                                          </div>
                                          <p id="alert_updatepass" hidden style="font-size:13px; margin-top:10px;"></p>
                                        </div>
                                        <div class="form-group">
                                          <button id="btn_submit_updatepass" type="button"name="recover-submit" class="btn btn-lg btn-primary btn-block" >Thiết Lập Lại Mật Khẩu</button>
                                        </div>
                                    </form>

                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                    </div>
                    </div>
           <div class="row">
    <div class="col-xs-12">
        <div id="dialogValidation_Updatepass" data-backdrop = "static" data-keyboard = "false" class="modal fade" tabindex="-1" style="padding-top: 0px; padding-bottom: 0px; padding-left: 17px;" aria-hidden="false">
            <div class="modal-dialog" style="width:400px !important;height:600px !important">
                <div class="modal-content">
                <!-- <form id="form-validation-add-nganhhoc" name="frmCreateEmployee" method="post"  class="form-horizontal" role="form" ng-submit="UpdateEmployee()"> -->
                <form id="form-validation-add-nganhhoc" name="frmCreateEmployee" method="post"  class="thongbao" role="form" ng-submit="UpdateEmployee()" style="height: 127px;" >
                    <div class="modal-header bg-primary" style="padding:0px;text-align:center">
                        <h5><strong class="modal-title">Thông Báo</strong></h5>
                        </div>
                <div style="color:green;" class="modal-body text-center">
                <font size="5">Thành Công</font>
              </div>
              <div class="modal-footer" style="padding:0px;">
                <input type="button" style="width: 100%;" class="btn btn-sm btn-success" id="submit_delnganh" name="Xóa" onclick="window.location = '<?php echo base_url()?>'" value="OK">
            </div>
        </form>
                </div>
            </div>
        </div>
    </div>
</div>
                </div>
            </div>
	        </div>
	        <!-- End Content -->

	        <div class="footer">
	            <?php $this->load->view('Giaovu/footer'); ?>
	        </div>
	        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
	            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
	        </a>
	    </div>
	    <!-- for main popup dialog -->
	    <div id="dialogMain" class="modal fade" role="dialog" style="display:none;padding:0"></div>
			<script src="<?php echo base_url(''); ?>public/js/jquery-3.2.1.min.js" charset="utf-8"></script>
			<script src="<?php echo base_url(''); ?>public/js/bootstrap.min.js" charset="utf-8"></script>
	    <!-- <![endif]-->
	    <!--[if IE]>
	    <script src="~/Themes/ace-master/js/jquery-1.11.3.min.js"></script>
	    <![endif]-->

	    <!-- page specific plugin scripts -->
	    <!-- ace scripts -->

	    <!-- inline scripts related to this page -->
      <script type="text/javascript">
      $(document).ready(function () {
            
        $('#btn_submit_updatepass').on('click', function() {
          var email = $('#email_reset').val();
          var pass = $('#pass_reset').val();
          var repass = $('#repass_reset').val();
          if (pass == '' || repass == '') {
            $('#alert_updatepass').prop('hidden',false);
            $('#alert_updatepass').css('color','red');
            $('#alert_updatepass').html('Mật Khẩu Không Được Để Trống');
          }
          else if (pass !== repass) {
            $('#alert_updatepass').prop('hidden',false);
            $('#alert_updatepass').css('color','red');
            $('#alert_updatepass').html('Mật Khẩu Xác Nhận Không Trùng Khớp Với Mật Khẩu Mới');
          }
          else {
            $.ajax({
              url:"<?php echo base_url()?>Quenmatkhau/updatepass",
              type: "POST",
              data:{'email' : email, 'pass' : pass, 'repass' : repass},
              dataType: 'json',
              success: function(data){
                if (data.thanhcong == true) {
                  $('#dialogValidation_Updatepass').modal('show');
                }
            }
            });
          }
      });
        });
      
      </script>

	</body>
</html>
