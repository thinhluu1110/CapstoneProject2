<!DOCTYPE html>
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
                                    <p>Vui Lòng Nhập Địa Chỉ Email Của Bạn Để Đặt Lại Mật Khẩu Tại Đây.</p>
                                    <div class="panel-body">

                                      <form id="Resetpass_form" role="form" autocomplete="off" class="form" method="post">

                                        <div class="form-group">
                                          <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                            <input id="email_reset" name="email" placeholder="ABC@gmail.com" class="form-control"  type="email" >
                                          </div>
                                          <p id="alert_resetpass" hidden style="font-size:13px; margin-top:10px;">Địa Chỉ Email Không Đúng</p>
                                        </div>
                                        <div class="form-group">
                                          <button id="btn_submit_resetpass" type="button"name="recover-submit" class="btn btn-lg btn-primary btn-block" >Gửi Email</button>
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
                        <div class="col-xs-12"></div>
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
      $('#btn_submit_resetpass').on('click', function() {
          var email = $('#email_reset').val();
          var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
          if (email == '') {
            $('#alert_resetpass').prop('hidden',false);
            $('#alert_resetpass').css('color','red');
            $('#alert_resetpass').html('Vui Lòng Nhập Địa Chỉ Email');
          }
          else if (testEmail.test(email) == false) {
            $('#alert_resetpass').prop('hidden',false);
            $('#alert_resetpass').css('color','red');
            $('#alert_resetpass').html('Vui Lòng Nhập Đúng Định Dạng Địa Chỉ Email. Ví Dụ: ABC@gmail.com');
          }
          else {
            $.ajax({
              url:"<?php echo base_url()?>Quenmatkhau/checkEmail",
              type: "POST",
              data:{'email' : email},
              dataType: 'json',
              success: function(data){
                if (data.khongtontaiemail != '') {
                  $('#alert_resetpass').prop('hidden',false);
                  $('#alert_resetpass').css('color','red');
                  $('#alert_resetpass').html(data.khongtontaiemail);
                }
                else if (data.sendmail != '') {
                  $('#alert_resetpass').prop('hidden',false);
                  $('#alert_resetpass').css('color','green');
                  $('#alert_resetpass').html(data.sendmail);
                }
            }
            });
          }
      });
      </script>

	</body>
</html>
