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
                    <img id="ajax-loader" src="/image/ajax-loader.gif" alt="" />
                    <div class="container" style="padding-top: 100px">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="panel panel-login">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <a href="#" class="active" id="login-form-link">Đăng nhập hệ thống</a>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-lg-12">
																							<?php if (isset($user)) { ?>
																							<div  id="msg-fail-login" class="modal-header add_fail" style="padding:0px;text-align:center">
											                            <h5><strong class="modal-title"><?php echo $user ; ?></strong></h5>
											                        </div>
																						<?php } ?>
                                                <form id="formUser" action="" method="post" action="<?php echo base_url().'Login/index' ?>" role="form" style="display: block;">
                                                    <div class="form-group">
                                                        <input type="text" name="username" id="username_login" tabindex="1" class="form-control" placeholder="Tên Đăng Nhập ..." value="" style="border: 1px solid #ddd !important; border-radius: 3px !important; margin-bottom: 10px">
                                                        <p style="color: red" class="username"></p>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" name="password" id="password_login" tabindex="2" class="form-control" placeholder="Mật Khẩu ..." style="border: 1px solid #ddd !important; border-radius: 3px !important;">
                                                        <p style="color: red" class="password"></p>
                                                    </div>
                                                    <div class="form-group" style="margin-top: 20px;">
                                                        <div class="row">
                                                            <div class="col-sm-6 col-sm-offset-3">
																																<input type="submit" name="login" id="login_submit" tabindex="4" class="form-control btn btn-login" value="Đăng Nhập">
                                                            </div>
                                                        </div>
																												<div class="row text-center">
																													<a href="<?php echo base_url('Quenmatkhau/index')?>"  style="font-size:15px; margin-top:20px;" type="button" class="btn btn-link ">Quên Mật Khẩu</a>
																												</div>
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


	</body>
</html>
