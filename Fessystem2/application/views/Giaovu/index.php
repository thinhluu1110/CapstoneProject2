<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $this->load->view('Giaovu/head'); ?>
		<title>Main</title>
	</head>

	<body class="no-skin" style="margin:0 !important;padding:0 !important">
	    <div id="navbar" class="navbar navbar-default navbar-collapse h-navbar ace-save-state navbar-fixed-top">
	        <?php $this->load->view('Giaovu/top'); ?>
	    </div>
	    <div class="main-container ace-save-state" id="main-container">
	    	<?php if ($this->session->userdata('username')) {?>
	        <div class="sidebar h-sidebar navbar-collapse collapse ace-save-state sidebar-fixed" id="sidebar" data-sidebar="true" data-sidebar-scroll="true" data-sidebar-hover="true">
	            <?php $this->load->view('Giaovu/menu'); ?>
	        </div>
			<?php } ?>
	        <!-- Content -->
	        <div class="main-content">
	            <?php $this->load->view($temp); ?>
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

					$(document).ready(function() {
							$('#nganhhocAdd').on('change', function() {
									var nganhhoc_id = $(this).val();
									if(nganhhoc_id == '') {
											$('#khoahocAdd').prop('disabled',true);
									}else{
											$('#khoahocAdd').prop('disabled',false);
											$.ajax({
												url:"<?php echo base_url()?>Giaovu/Kehoachdaotao/get_khoahocbyNganh",
												type: "POST",
												data:{'nganhhoc_id' : nganhhoc_id},
												dataType: 'json',
												success: function(data){
													$('#khoahocAdd').html(data);
												},
												error: function(){
													alert('Error');
												}
											});
									}
							});

					});

					function reload() {
						window.location.reload();
					}
					function back_sv() {
						window.location.href('<?php echo base_url()."Giaovu/Sinhvien/index" ?>');
					}

					$(document).ready(function(){
						//xử lý khi có sự kiện click
				        $('#submit_TKB').on('click', function(){
				        	//Lấy ra files
				        	var file_data = $('#imageTKB').prop('files')[0];
				        	//Lấy ra nganh hoc
							var nganhhoc = $('#nganhhocAdd').val();
							//Lấy ra khoa hoc
							var khoahoc = $('#khoahocAdd').val();
							//Lấy ra hoc ki
							var hocki = $('#hocki').val();
							$('#msg-validation').prop("style").display = "none";
							$('#msg-success').prop("style").display = "none";
							if(nganhhoc == '' || khoahoc == '' || hocki == '') {
								$('#msg-validation').prop("style").display = "block";
								$('#msg-validation h5').html('Vui Lòng Chọn Ngành Học Hoặc Khóa Học Hoặc Học Kì');
							}else{
								//khởi tạo đối tượng form data
								var form_data = new FormData();
								//thêm files vào trong form data
								form_data.append('image', file_data);
								form_data.append('nganhhoc', nganhhoc);
								form_data.append('khoahoc', khoahoc);
								form_data.append('hocki', hocki);
								$.ajax({
									url:"<?php echo base_url()?>Giaovu/Tkb/add",
									type: "POST",
									data:form_data,
									dataType: 'json',
									cache: false,
									processData: false,
									contentType: false,
									success: function(data){
										if (data.thongbao.DateUpdate != '') {
											var date1 = '<h1> Ngày cập nhật : ';
											var dateupdate = data.thongbao.DateUpdate;
											var date2 = '</h1>';
											var datesum = date1.concat(dateupdate,date2);
											$('#review_image a').html(datesum);
										}
										if (data.thongbao.ReviewImage != '') {
											var html1 = '<img src="';
											var htmlanh = data.thongbao.ReviewImage;
											var html2 = '">';
											var htmlsum = html1.concat(htmlanh,html2);
											$('#review_image p').html(htmlsum);
										}
										if (data.thongbao.UploadSucces != '' && data.thongbao.DateUpdate != '' && data.thongbao.ReviewImage != '') {
											$('#msg-validation').prop("style").display = "none";
											$('#msg-success').prop("style").display = "block";
											$('#msg-success h5').html(data.thongbao.UploadSucces);
										}
										else{
											$('#msg-success').prop("style").display = "none";
											$('#msg-validation').prop("style").display = "block";
											$('#msg-validation h5').html(data.thongbao.UploadError);
										}
										if (data.thongbao.UpdateSucess != '' && data.thongbao.DateUpdate != '' && data.thongbao.ReviewImage != '') {
											$('#msg-validation').prop("style").display = "none";
											$('#msg-success').prop("style").display = "block";
											$('#msg-success h5').html(data.thongbao.UpdateSucess);
										}
										else{
											$('#msg-success').prop("style").display = "none";
											$('#msg-validation').prop("style").display = "block";
											$('#msg-validation h5').html(data.thongbao.UploadError);
										}
									}
								});
							}
				        });
				    });
				    $(document).ready(function(){
						//xử lý khi có sự kiện click
				        $('#submit_Lichthi').on('click', function(){
				        	var file_data = $('#imageLichthi').prop('files')[0]; //Lấy ra files
							var nganhhoc = $('#nganhhocAdd').val(); 			//Lấy ra nganh hoc
							var khoahoc = $('#khoahocAdd').val(); 				//Lấy ra khoa hoc
							var hocki = $('#hocki').val(); 						//Lấy ra hoc ki
							var lanthi = $('#lanthi').val(); 					//Lấy ra hoc ki
							$('#msg-validation').prop("style").display = "none";
							$('#msg-success').prop("style").display = "none";
							if(nganhhoc == '' || khoahoc == '' || hocki == '' || lanthi == '') {
								$('#msg-validation').prop("style").display = "block";
								$('#msg-validation h5').html('Vui Lòng Chọn Ngành Học Hoặc Khóa Học Hoặc Học Kì Hoặc Lần Thi');
							}else{
								//khởi tạo đối tượng form data
								var form_data = new FormData();
								//thêm files vào trong form data
								form_data.append('image', file_data);
								form_data.append('nganhhoc', nganhhoc);
								form_data.append('khoahoc', khoahoc);
								form_data.append('hocki', hocki);
								form_data.append('lanthi', lanthi);
								$.ajax({
									url:"<?php echo base_url()?>Giaovu/Lichthi/add",
									type: "POST",
									data:form_data,
									dataType: 'json',
									cache: false,
									processData: false,
									contentType: false,
									success: function(data){
										if (data.message.DateUpdate != '') {
											var date1 = '<h1> Ngày cập nhật : ';
											var dateupdate = data.message.DateUpdate;
											var date2 = '</h1>';
											var datesum = date1.concat(dateupdate,date2);
											$('#review_image a').html(datesum);
										}
										if (data.message.ReviewImage != '') {
											var html1 = '<img src="';
											var htmlanh = data.message.ReviewImage;
											var html2 = '">';
											var htmlsum = html1.concat(htmlanh,html2);
											$('#review_image p').html(htmlsum);
										}
										if (data.message.UploadSucces != '' && data.message.DateUpdate != '' && data.message.ReviewImage != '') {
											$('#msg-validation').prop("style").display = "none";
											$('#msg-success').prop("style").display = "block";
											$('#msg-success h5').html(data.message.UploadSucces);
										}
										else{
											$('#msg-success').prop("style").display = "none";
											$('#msg-validation').prop("style").display = "block";
											$('#msg-validation h5').html(data.message.UploadError);
										}
										if (data.message.UpdateSucess != '' && data.message.DateUpdate != '' && data.message.ReviewImage != '') {
											$('#msg-validation').prop("style").display = "none";
											$('#msg-success').prop("style").display = "block";
											$('#msg-success h5').html(data.message.UpdateSucess);
										}
										else{
											$('#msg-success').prop("style").display = "none";
											$('#msg-validation').prop("style").display = "block";
											$('#msg-validation h5').html(data.message.UploadError);
										}
									}
								});
							}
				        });
				    });
					$(document).ready(function() {
						var array_status = {1:'TN', 2: 'ĐCH', 3: 'BLKQ'};
						var $select = $('#student_status'),
								$inputMaHS = $('#maHS'),
								$ngayBatDau = $('#ngaybatdau'),
								$ngayKetThuc = $('#ngayketthuc'),
								$maSV = $('#maSV'),
								$btn_update = $('#btn-updatestatus');
						$select.on('change', function() {
							var stt = $select.val();
							$inputMaHS.val('');
							$ngayBatDau.val('');
							$ngayKetThuc.val('').removeAttr('readonly');
							if(stt > 0 && stt < 4){
									if(array_status.hasOwnProperty(stt)){
											var str = array_status[stt] + ' - ' + $maSV.text();
											if(stt == 2){
													$ngayKetThuc.attr('readonly', 'readonly');
											}
											$inputMaHS.val(str);
									}
							}
							});
							// $btn_update.on('click',function(){
							// 	$.ajax({
									// url:"<?php echo base_url()?>Giaovu/Sinhvien/capnhattinhTrang",
							// 		type: "POST",
							// 		data:$('#formStudentStatus').serialize(),
							// 		dataType: 'json',
							// 		success: function(data){
							// 			$('#khoahocAdd').html(data);
							// 		},
							// 		error: function(){
							// 			alert('Error');
							// 		}
							// 	});
							// });
					});
					$(document).ready(function(){
						//xử lý khi có sự kiện click
						$('#submit_HocPhi').on('click', function(){
							//Lấy ra files
							var file_data = $('#fileHocPhi').prop('files')[0];
							//khởi tạo đối tượng form data
							var form_data = new FormData();
							//thêm files vào trong form data
							form_data.append('file', file_data);
							//$('#msg-fail-HocPhi').prop("style").display = "none";
							$.ajax({
								url:"<?php echo base_url('Giaovu/Hocphi/importHP') ?>",
								type: "POST",
								data:form_data,
								dataType: 'json',
								cache: false,
								processData: false,
								contentType: false,
								success: function(data){
									if (data.message.kiemtrafile != '') {
										$('#msg-success-HocPhi').prop('hidden',true);
										$('#msg-fail-HocPhi h5').html(data.message.kiemtrafile);
										$('#msg-fail-HocPhi').prop('hidden',false);

										//$('#msg-fail-HocPhi').prop("style").display = "none";
									}
									// if (data.message.kiemtra_mssv == true) {
									// 	$('#msg-success-HocPhi').prop('hidden',true);
									// 	$('#msg-fail-HocPhi h5').html("Dữ liệu");
									// 	$('#msg-fail-HocPhi').prop('hidden',false);

									// 	//$('#msg-fail-HocPhi').prop("style").display = "none";
									// }

									if (data.message.ImportSucces != '') {
										$('#dialogImport').modal('hide');
										$('#dialogValidation_Import_HocPhi').modal('show');
									}

									else if (data.message.ImportFail != '') {
										$('#msg-fail-HocPhi').prop('hidden',false);
										$('#msg-success-HocPhi').prop('hidden',true);
										$('#msg-fail-HocPhi h5').html(data.message.ImportFail);
										//$('#msg-success-HocPhi').prop("style").display = "none";
									}
								}
							});
						});
					});
					$(document).ready(function() {
							$('#btn-updatestatus').on('click', function() {
									var mssv = $('#mssv').val();
									var tinhtrang = $('#student_status').val();
									var maHS = $('#maHS').val();
									var lido = $('#lydo').val();
									var ngaybatdau = $('#ngaybatdau').val();
									var ngayketthuc = $('#ngayketthuc').val();
									if(lido == '' || ngaybatdau == '' || maHS == '') {
											$('#msg-fail-capnhattt').prop('hidden',false);
											$('#msg-fail-capnhattt h5').html('Dữ Liệu Không Được Để Trống');
											$('#msg-success-capnhattt').prop('hidden',true);
									}else{
											$.ajax({
												url:"<?php echo base_url('Giaovu/Sinhvien/capnhattinhTrang') ?>",
												type: "POST",
												data:{'MSSV':mssv, 'MaHS':maHS, 'tinhtrang':tinhtrang, 'LiDo': lido, 'ngay_batdau':ngaybatdau, 'ngay_ketthuc':ngayketthuc},
												dataType: 'json',
												success: function(data){
													if (data.msg != '')
													{
														$('#msgbdlonkt').prop('hidden',false);
														$('#msg-success-capnhattt').prop('hidden',true);
														$('#msg-fail-capnhattt').prop('hidden',true);
													}

													else {if (data.check == false) {
														$('#msgbdlonkt').prop('hidden',true);
														$('#msg-fail-capnhattt').prop('hidden',false);
														$('#msg-fail-capnhattt h5').html("Thiết Lập Thất Bại");
														$('#msg-success-capnhattt').prop('hidden',true);
													}
													if (data.check == true) {
														$('#dialogValidation_Thietlaptrangthai_SV').modal('show');
														// $('#msgbdlonkt').prop('hidden',true);
														// $('#msg-success-capnhattt').prop('hidden',false);
														// $('#msg-success-capnhattt h5').html("Thiết Lập Thành Công");
														// $('#msg-fail-capnhattt').prop('hidden',true);
														// if(data.tinhtrang == 1){
														// 	window.location = "<?php echo base_url('Giaovu/Tamngung/index') ?>";
														// }
														// else{
														// 	if(data.tinhtrang == 2){
														// 		setTimeout(function(){window.location = "<?php echo base_url('Giaovu/Dinhchi/index') ?>"},10);
														// 	}
														// 	else{
														// 		if(data.tinhtrang == 3){
														// 			setTimeout(function(){window.location = "<?php echo base_url('Giaovu/Baoluu/index') ?>"},10);
														// 		}
														// 	}
														// }
														//setTimeout(function(){window.location = "<?php echo base_url('Giaovu/Sinhvien/index') ?>"},2500);
													}
												}
													// $('#form-Add').trigger("reset");
													// $('#msg-success').prop('hidden',false);

												}
												// error: function(){
												// 	$('#msg-fail h5').html('Thêm Thất Bại');
												// }
											});
									}
							});
					});
					$(document).ready(function() {
							$('#nganhhocImport').on('change', function() {
									var nganhhoc_id = $(this).val();
									if(nganhhoc_id == '') {
											$('#khoahocImport').prop('disabled',true);
									}else{
											$('#khoahocImport').prop('disabled',false);
											$.ajax({
												url:"<?php echo base_url()?>Giaovu/Kehoachdaotao/get_khoahocbyNganh",
												type: "POST",
												data:{'nganhhoc_id' : nganhhoc_id},
												dataType: 'json',
												success: function(data){
													$('#khoahocImport').html(data);
												},
												error: function(){
													alert('Error');
												}
											});
									}
							});
					});
					$(document).ready(function() {
							$('#nganhhoc_dieukien_doan').on('change', function() {
									$('#review_select').empty();
									var nganhhoc_id = $(this).val();
									if(nganhhoc_id == '') {
											$('#khoahoc_dieukien_doan').prop('disabled',true);
									}else{
											$('#khoahoc_dieukien_doan').prop('disabled',false);
											$.ajax({
												url:"<?php echo base_url()?>Giaovu/Kehoachdaotao/get_khoahocbyNganh",
												type: "POST",
												data:{'nganhhoc_id' : nganhhoc_id},
												dataType: 'json',
												success: function(data){
													$('#khoahoc_dieukien_doan').html(data);
												}
											});
									}
							});
							$('#khoahoc_dieukien_doan').on('change', function() {
									$('#review_select').empty();
									var nganhhoc_id = $('#nganhhoc_dieukien_doan').val();
									var khoahoc_id = $('#khoahoc_dieukien_doan').val();
									if(nganhhoc_id == '' || khoahoc_id == '') {
											$('#monkoduocno_dieukien_doan').prop('disabled',true);
									}else{
											$('#monkoduocno_dieukien_doan').prop('disabled',false);
											$.ajax({
												url:"<?php echo base_url()?>Giaovu/Dieukiendoan/getmonby_nganhkhoa",
												type: "POST",
												data:{'nganhhoc_id' : nganhhoc_id, 'khoahoc_id': khoahoc_id},
												dataType: 'json',
												success: function(data){
													$('#monkoduocno_dieukien_doan').html(data);
												}
											});
									}
							});

							$('#monkoduocno_dieukien_doan').on('change', function() {
									var idm = $('#monkoduocno_dieukien_doan').val();
									var tenmon = $('#monkoduocno_dieukien_doan').find('option:selected').text();
									if(idm < 1){
			                return false;
			            }


									// if($(document).find('#m'+idm.length > 0)){
									// 		return false;
									// }
									var html1 = '<li style="padding: 5px 10px; position: relative; background: #eaeaea; margin-bottom: 5px" id="m';
									var htmlid = idm;
									var html2 = '"><input type="hidden" name="listmon[]" value="';
									var html3 = '"/>';
									var htmltenmon = tenmon;
									var html4 = '<i onclick="delete_li(this)" style="position: absolute; top:0; right: 0; padding: 5px 15px; cursor: pointer;">x</i></li>';
									var htmlsum = html1.concat(htmlid, html2, htmlid, html3, htmltenmon, html4);
									$('#review_select').append(htmlsum);
							});
							$('#submit_add_DKDA').on('click', function() {
									var nganhhoc_id = $('#nganhhoc_dieukien_doan').val();
									var khoahoc_id = $('#khoahoc_dieukien_doan').val();
									var maxmonno = $('#maxmonno_dieukien_doan').val();

									if(nganhhoc_id == '' || khoahoc_id == '') {
										$('#msg-fail-dkda').prop('hidden',false);
										$('#msg-fail-dkda h5').html('Dữ Liệu Không Được Để Trống');
										$('#msg-success-dkda').prop('hidden',true);
									}else{
											$.ajax({
												url:"<?php echo base_url()?>Giaovu/Dieukiendoan/Add",
												type: "POST",
												data:$('#form_dieukien_doan').serialize(),
												dataType: 'json',
												success: function(data){
													if (data.tontaidk != '') {
														$('#msg-fail-dkda').prop('hidden',false);
														$('#msg-fail-dkda h5').html(data.tontaidk);
														$('#msg-success-dkda').prop('hidden',true);
													}

													else {

													if (data.thatbai != '') {
														$('#msg-fail-dkda').prop('hidden',false);
														$('#msg-fail-dkda h5').html(data.thatbai);
														$('#msg-success-dkda').prop('hidden',true);
													}
													if (data.thanhcong != '') {
														$('#dialogAdd').modal('hide');
														$('#dialogValidation_Add_DKDA').modal('show');
													}
												}
											}
											});
									}
							});
							this.delete_li = function (e) {
					        if($(e).length > 0){
					            $(e).parents('li').remove();
					        }
					    }
					});
					$(document).ready(function() {
							$('.edit_dkda').on('click', function() {
							var idkda = $(this).attr("id");
							$.ajax({
								url:"<?php echo base_url('Giaovu/Dieukiendoan/get_dkda') ?>",
								type: "POST",
								data:{'dkda_id' : idkda},
								dataType: 'json',
								success: function(data){

												$('#dieukien_doan_edit_id').val(data.dkda_info.dkda_id);
												$('#nganhhoc_dieukien_doan_edit').val(data.dkda_info.tennganh);
												$('#khoahoc_dieukien_doan_edit').val(data.dkda_info.tenkhoa);
												$('#maxmonno_dieukien_doan_edit').val(data.dkda_info.max_monno);
												$('#monkoduocno_dieukien_doan_edit').html(data.dkda_info.listmoncam);
												$('#review_select_edit').html(data.dkda_info.moncamreview);
												}

											 });
							});
							$('#monkoduocno_dieukien_doan_edit').on('change', function() {
									var idm = $('#monkoduocno_dieukien_doan_edit').val();
									var tenmon = $('#monkoduocno_dieukien_doan_edit').find('option:selected').text();
									if(idm < 1){
			                return false;
			            }
									var html1 = '<li style="padding: 5px 10px; position: relative; background: #eaeaea; margin-bottom: 5px" id="m';
									var htmlid = idm;
									var html2 = '"><input type="hidden" name="listmon[]" value="';
									var html3 = '"/>';
									var htmltenmon = tenmon;
									var html4 = '<i onclick="delete_li(this)" style="position: absolute; top:0; right: 0; padding: 5px 15px; cursor: pointer;">x</i></li>';
									var htmlsum = html1.concat(htmlid, html2, htmlid, html3, htmltenmon, html4);
									$('#review_select_edit').append(htmlsum);
							});
							$('#submit_edit_DKDA').on('click', function() {
											$.ajax({
												url:"<?php echo base_url()?>Giaovu/Dieukiendoan/Edit",
												type: "POST",
												data:$('#form_dieukien_doan_edit').serialize(),
												dataType: 'json',
												success: function(data){
													if (data.thatbai != '') {
														$('#msg-fail-dkda-edit').prop('hidden',false);
														$('#msg-fail-dkda-edit h5').html(data.thatbai);
														$('#msg-success-dkda-edit').prop('hidden',true);
													}
													if (data.thanhcong != '') {
														$('#dialogEditDKDA').modal('hide');
														$('#dialogValidation_Add_DKDA').modal('show');
													}

											}
											});
							});
					});
					$(document).ready(function() {
							$('#submit_add').on('click', function() {
									var manganh = $('#manganh').val().trim();
									var tennganh = $('#tennganh').val().trim();
									if(manganh == '' || tennganh == '' ) {
											$('#msg-fail').prop('hidden',false);
											$('#msg-fail h5').html('Dữ Liệu Không Được Để Trống');
											$('#msg-success').prop('hidden',true);
									}
									else if(/^[a-zA-Z0-9-ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ]*$/.test(manganh) == false || /^[a-zA-Z0-9-ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ]*$/.test(tennganh) == false) {
										$('#msg-fail').prop('hidden',false);
										$('#msg-fail h5').html('Không Được Nhập Ký Tự Đặc Biệt');
										$('#msg-success').prop('hidden',true);
									}
									else{
											$.ajax({
												url:"<?php echo base_url('Giaovu/Nganhhoc/Add') ?>",
												type: "POST",
												data:{'manganh' : manganh, 'tennganh':tennganh},
												dataType: 'json',
												success: function(data){
													if (data.msg != '') {
														$('#msg-fail').prop('hidden',false);
														$('#msg-fail h5').html(data.msg);
														$('#msg-success').prop('hidden',true);
													}
													else {
													if (data.check == false) {
														$('#msg-fail').prop('hidden',false);
														$('#msg-fail h5').html("Thêm Thất Bại");
														$('#msg-success').prop('hidden',true);
													}
													if (data.check == true) {
														$('#dialogAdd').modal('hide');
														$('#dialogValidation_Add_Nganh').modal('show');
													}
													// $('#form-Add').trigger("reset");
													// $('#msg-success').prop('hidden',false);
												}
												}
												// error: function(){
												// 	$('#msg-fail h5').html('Thêm Thất Bại');
												// }
											});
									}
							});
					});
					$(document).ready(function() {
							$('#submit_add_KHDT').on('click', function() {
									var manganh = $('#nganhhocAdd').val();
									var makhoa = $('#khoahocAdd').val();
									var mahocki = $('#hocki').val();
									var mamon = $('#tenmon').val();
									var dvht_tc = $('#dvht_tc').val();
									var tongso = $('#tongso').val();
									var lythuyet = $('#lythuyet').val();
									var thuchanh = $('#thuchanh').val();
									var baitap = $('#baitap').val();
									var baitaplon = $('#baitaplon').val();
									var doan = $('#doan').val();
									var khoaluan = $('#khoaluan').val();

									if(manganh == '' || makhoa == '' || mahocki == '' || mamon == '' || dvht_tc == '' || tongso == '' || lythuyet == '' || thuchanh == '' || baitap == '' || baitaplon == '' || doan == '' || khoaluan == '' ) {
											$('#msg-fail').prop('hidden',false);
											$('#msg-fail h5').html('Vui Lòng Chọn Và Nhập Thông Tin Đầy Đủ');
											$('#msg-success').prop('hidden',true);
									}
									else {
										$.ajax({
											url:"<?php echo base_url('Giaovu/Kehoachdaotao/Add') ?>",
											type: "POST",
											data:$('#form_add_Khdt').serialize(),
											dataType: 'json',
											success: function(data){
												if (data.thanhcong != '') {
													$('#dialogAdd').modal('hide');
													$('#dialogValidation_Addmon_KHDT').modal('show');
												}
												if (data.tontaimon != '') {
													$('#msg-fail').prop('hidden',false);
													$('#msg-fail h5').html(data.tontaimon);
													$('#msg-success').prop('hidden',true);
												}
												if (data.thatbai != '') {
													$('#msg-fail').prop('hidden',false);
													$('#msg-fail h5').html(data.thatbai);
													$('#msg-success').prop('hidden',true);
												}
												if (data.load == true) {
													window.location = "<?php echo base_url('Giaovu/Kehoachdaotao/review_khdt') ?>";
												}
											}
											// error: function(){
											// 	$('#msg-fail h5').html('Thêm Thất Bại');
											// }
										});
									}
							});
					});
					$(document).ready(function() {
							$('#submit_khdt_import').on('click', function(e) {
									e.preventDefault();
									var file_data = $('#fileKHDT').prop('files')[0];
									var manganh = $('#nganhhocImport').val();
									var makhoa = $('#khoahocImport').val();
									if(manganh == '' || makhoa == '' ) {
											$('#msg-fail').prop('hidden',false);
											$('#msg-fail h5').html('Vui Lòng Chọn Ngành Học Hoặc Khóa Học');
											$('#msg-success').prop('hidden',true);
									}else{
										 	var form_data = new FormData();
											form_data.append('file', file_data);
											form_data.append('manganh', manganh);
											form_data.append('makhoa', makhoa);
											$.ajax({
												url:"<?php echo base_url('Giaovu/Kehoachdaotao/importCTDT') ?>",
												type: "POST",
												data:form_data,
												dataType: 'json',
												cache: false,
												processData: false,
												contentType: false,
												success: function(data){

													if (data.khongchonfile != '') {
														$('#msg-fail').prop('hidden',false);
														$('#msg-fail h5').html(data.khongchonfile);
														$('#msg-success').prop('hidden',true);
													}
													if (data.tontaikhdt != '') {
														$('#msg-fail').prop('hidden',false);
														$('#msg-fail h5').html(data.tontaikhdt);
														$('#msg-success').prop('hidden',true);
													}
													if (data.load == true) {
														window.location = "<?php echo base_url('Giaovu/Kehoachdaotao/review_khdt') ?>";
													}
													if (data.tontaictdt != '') {
														$('#msg-fail').prop('hidden',false);
														$('#msg-fail h5').html(data.tontaictdt);
														$('#msg-success').prop('hidden',true);
													}
													if (data.kiemtrafile == true) {
														$('#msg-fail').prop('hidden',false);
														$('#msg-fail h5').html("Vui lòng chọn đúng định dạng file Excel");
														$('#msg-success').prop('hidden',true);
													}
													if (data.kiemtradulieu == true) {
														$('#msg-fail').prop('hidden',false);
														$('#msg-fail h5').html("Dữ liệu trong Excel rỗng");
														$('#msg-success').prop('hidden',true);
													}
												}
												// error: function(){
												// 	$('#msg-fail h5').html('Thêm Thất Bại');
												// }
											});
									}
							});
					});
					$(document).ready(function() {
						$('#submit_kqht_import').on('click', function(e) {
							e.preventDefault();
							var file_data = $('#file_KQHT').prop('files')[0];
						 	var form_data = new FormData();
							form_data.append('file', file_data);
							$('#msg-fail').prop("style").display = "none";
							$('#msg-success').prop("style").display = "none";
							$.ajax({
								url:"<?php echo base_url('Giaovu/Ketquahoctap/importKQHT') ?>",
								type: "POST",
								data:form_data,
								dataType: 'json',
								cache: false,
								processData: false,
								contentType: false,
								success: function(data){
									console.log(data);

									$('#msg-success').prop('hidden',true);
									$('#msg-fail').prop('hidden',true);
									if (data.khongchonfile != '') {
										// $('#msg-fail').prop('hidden',false);
										$('#msg-fail').prop("style").display = "block";
										$('#msg-fail h5').html(data.khongchonfile);
									}
									if (data.kiemtrafile != '') {
										// $('#msg-fail').prop('hidden',false);
										$('#msg-fail').prop("style").display = "block";
										$('#msg-fail h5').html(data.kiemtrafile);
									}
									if (data.load == true) {
										window.location = "<?php echo base_url('Giaovu/Ketquahoctap/review_kqht') ?>";
									}
								}
								// error: function(){
								// 	$('#msg-fail h5').html('Thêm Thất Bại');
								// }
							});

						});
					});
					$(document).ready(function() {
							$('#nganhhocImportCTDT').on('change', function() {
									var nganhhoc_id = $(this).val();
									if(nganhhoc_id == '') {
											$('#khoahocImportCTDT').prop('disabled',true);
									}else{
											$('#khoahocImportCTDT').prop('disabled',false);
											$.ajax({
												url:"<?php echo base_url()?>Giaovu/Kehoachdaotao/get_khoahocbyNganh",
												type: "POST",
												data:{'nganhhoc_id' : nganhhoc_id},
												dataType: 'json',
												success: function(data){
													$('#khoahocImportCTDT').html(data);
												},
												error: function(){
													alert('Error');
												}
											});
									}
							});
					});
					$(document).ready(function() {
							$('#Chapnhan_review').on('click', function() {
								alert("Work");
											// $.ajax({
											// 	url:"<?php echo base_url('Giaovu/Kehoachdaotao/run_sp')?>",
											// 	type: "POST",
											// 	dataType: 'json',
											// 	success: function(data){
											// 		if (data.check == true) {
											// 			window.location = "<?php echo base_url('Giaovu/Kehoachdaotao/index') ?>";
											// 			alert('Kế Hoạch Đào Tạo Đã Được Thêm');
											// 		}
											// 		if (data.check == false) {
											// 			window.location = "<?php echo base_url('Giaovu/Kehoachdaotao/review_khdt') ?>";
											// 			alert('Vài Dữ Liệu Bị Lỗi Vui Lòng Xem Lại');
											// 		}
											// 	}
											// });
							});
					});
					$(document).ready(function() {
							$('.edit_ctdt').on('click', function() {
							//alert('word');
							var idctdt = $(this).attr("id");
							$.ajax({
								url:"<?php echo base_url('Giaovu/Chuongtrinhdaotao/get_ctdt') ?>",
								type: "POST",
								data:{'ctdt_id' : idctdt},
								dataType: 'json',
								success: function(data){
												$('#idctdt_edit_ctdt').val(data.ctdt_info.ctdt_id);
												$('#idnganh_edit_ctdt').val(data.ctdt_info.nganhhoc_id);
												$('#idkhoa_edit_ctdt').val(data.ctdt_info.khoahoc_id);
												$('#tenkhoa_edit_ctdt').val(data.ctdt_info.tenkhoa);
												$('#tennganh_edit_ctdt').val(data.ctdt_info.tennganh);
												$('#ghichu_edit_ctdt').val(data.ctdt_info.ghichu);
												$('a').attr('title',data.ctdt_info.noidung);
												}
											 });
							});
					});
					$(document).ready(function() {
							$('#submit_edit_ctdt').on('click', function() {

									var idctdt = $('#idctdt_edit_ctdt').val();
									var ghichu = $('#ghichu_edit_ctdt').val();
									//var idkhoa = $('#idkhoa_edit_ctdt').val();
									var file_data = $('#fileCTDT_Edit').prop('files')[0];
									if(ghichu == '') {
											$('#msg-fail-edit-ctdt').prop('hidden',false);
											$('#msg-fail-edit-ctdt h5').html('Dữ Liệu Không Được Để Trống');
											$('#msg-success-edit-ctdt').prop('hidden',true);
									}else{
											var form_data = new FormData();
											form_data.append('file', file_data);
											form_data.append('mactdt', idctdt);
											form_data.append('ghichu', ghichu);
											$.ajax({
												url:"<?php echo base_url('Giaovu/Chuongtrinhdaotao/editFILE') ?>",
												type: "POST",
												data:form_data,
												dataType: 'json',
												cache: false,
												processData: false,
												contentType: false,
												success: function(data){
													if (data.thanhcong != '') {
														$('#dialogEditCTDT').modal('hide');
														$('#dialogValidation_Import_CTDT').modal('show');
													}
													if (data.khongchonfile != '') {
														$('#msg-fail-edit-ctdt').prop('hidden',false);
														$('#msg-fail-edit-ctdt h5').html(data.khongchonfile);
														$('#msg-success-edit-ctdt').prop('hidden',true);
													}
													if (data.UploadError != '') {
														$('#msg-validation').prop('hidden',false);
														$('#msg-validation h5').html(data.UploadError);
														//$('#msg-success-edit-ctdt').prop('hidden',true);
													}
													// $('#form-Add').trigger("reset");
													// $('#msg-success').prop('hidden',false);

												}
												// error: function(){
												// 	$('#msg-fail h5').html('Thêm Thất Bại');
												// }
											});
									}
							});
					});
					$(document).ready(function() {
							$('#submit_ctdt_import').on('click', function(e) {
									e.preventDefault();
									var file_data = $('#fileCTDT').prop('files')[0];
									var manganh = $('#nganhhocImportCTDT').val();
									var makhoa = $('#khoahocImportCTDT').val();
									//alert(makhoa);
									if(manganh == '' || makhoa == '' ) {
										$('#msg-success-import-ctdt').prop('hidden',true);
										$('#msg-fail-import-ctdt').prop('hidden',false);
										$('#msg-fail-import-ctdt h5').html("Vui Lòng Chọn Ngành Học Hoặc Khóa Học");



									}else{
										 	var form_data = new FormData();
											form_data.append('file', file_data);
											form_data.append('manganh', manganh);
											form_data.append('makhoa', makhoa);
											$.ajax({
												url:"<?php echo base_url('Giaovu/Chuongtrinhdaotao/importCTDT') ?>",
												type: "POST",
												data:form_data,
												dataType: 'json',
												cache: false,
												processData: false,
												contentType: false,
												success: function(data){
													if (data.check == true) {
														$('#dialogImportCTDT').modal('hide');
														$('#dialogValidation_Import_CTDT').modal('show');
													}
													if (data.khongchonfile != '') {
														$('#msg-success-import-ctdt').prop('hidden',true);

														$('#msg-fail-import-ctdt h5').html(data.khongchonfile);
														$('#msg-fail-import-ctdt').prop('hidden',false);

													}
													if (data.msg != '') {
														$('#msg-success-import-ctdt').prop('hidden',true);

														$('#msg-fail-import-ctdt h5').html(data.msg);
														$('#msg-fail-import-ctdt').prop('hidden',false);
													}
													// if (data.checkfile != '') {
													// 	$('#msg-success-import-ctdt').prop('hidden',true);

													// 	$('#msg-fail-import-ctdt h5').html(data.checkfile);
													// 	$('#msg-fail-import-ctdt').prop('hidden',false);

													// }
												}
												// error: function(){
												// 	$('#msg-fail h5').html('Thêm Thất Bại');
												// }
											});
									}
							});
					});
					$(document).ready(function() {
							$('#submit_DRL_import').on('click', function(e) {
									e.preventDefault();
									var file_data = $('#fileDRL').prop('files')[0];
									var manganh = $('#nganhhocImportDRL').val();
									var makhoa = $('#khoahocImportDRL').val();
									var mahocki = $('#hockiImportDRL').val();
									if(manganh == '' || makhoa == '' || mahocki == '') {
											$('#msg-fail').prop('hidden',false);
											$('#msg-fail h5').html('Vui Lòng Chọn Ngành Học, Khóa Học Hoặc Học Kì');
											$('#msg-success').prop('hidden',true);
									}else{
										 	var form_data = new FormData();
											form_data.append('file', file_data);
											form_data.append('manganh', manganh);
											form_data.append('makhoa', makhoa);
											form_data.append('mahocki', mahocki);
											$.ajax({
												url:"<?php echo base_url('Giaovu/Diemrenluyen/import') ?>",
												type: "POST",
												data:form_data,
												dataType: 'json',
												cache: false,
												processData: false,
												contentType: false,
												success: function(data){
													if (data.khongchonfile != '') {
														$('#msg-fail').prop('hidden',false);
														$('#msg-fail h5').html(data.khongchonfile);
														$('#msg-success').prop('hidden',true);
													}
													if (data.load == true) {

														$('#dialogImport').modal('hide');
														$('#dialogValidation_Import_DRL').modal('show');
													}
													// if (data.kiemtra_xeploai == true) {
													// 	$('#msg-fail').prop('hidden',false);
													// 	$('#msg-fail h5').html("Dữ Liệu Trong Excel Rỗng");
													// 	$('#msg-success').prop('hidden',true);
													// }
													// if (data.kiemtra_mssv == true) {
													// 	$('#msg-fail').prop('hidden',false);
													// 	$('#msg-fail h5').html("Không được bỏ trống cột mssv dữ liệu trong Excel");
													// 	$('#msg-success').prop('hidden',true);
													// }
													if (data.kiemtrafile == true) {
														$('#msg-fail').prop('hidden',false);
														$('#msg-fail h5').html("Vui Lòng Chọn Đúng ĐỊnh Dạng File Excel");
														$('#msg-success').prop('hidden',true);
													}
												}
												// $('#msg-success-delete-khoa').prop('hidden',false);
												// 		$('#msg-success-delete-khoa h5').html("Xóa Thành Công");
												// 		$('#msg-fail-delete-khoa').prop('hidden',true);
											});
									}
							});
					});
					// $(document).ready(function() {
					// 		$('#submit_import_hocphi').on('click', function(e) {
					// 				e.preventDefault();
					// 				var file_data = $('#fileHocPhi').prop('files')[0];
					// 					 	var form_data = new FormData();

					// 						$.ajax({
					// 							url:"<?php echo base_url('Giaovu/Hocphi/importHP') ?>",
					// 							type: "POST",
					// 							data:form_data,
					// 							dataType: 'json',
					// 							cache: false,
					// 							processData: false,
					// 							contentType: false,
					// 							success: function(data){
					// 								console.log(data);
					// 								if (data.khongchonfile != '') {
					// 									$('#msg-fail').prop('hidden',false);
					// 									$('#msg-fail h5').html(data.khongchonfile);
					// 									$('#msg-success').prop('hidden',true);
					// 								}
					// 								if (data.load == true) {
					// 									$('#msg-success').prop('hidden',false);
					// 									$('#msg-success h5').html("Thêm Thành Công");
					// 									$('#msg-fail').prop('hidden',true);
					// 								}
					// 								// if (data.load == false) {
					// 								// 	$('#msg-fail').prop('hidden',false);
					// 								// 	$('#msg-fail h5').html("Dữ Liệu Đã Tồn Tại");
					// 								// 	$('#msg-success').prop('hidden',true);
					// 								// }
					// 							}
					// 							// $('#msg-success-delete-khoa').prop('hidden',false);
					// 							// 		$('#msg-success-delete-khoa h5').html("Xóa Thành Công");
					// 							// 		$('#msg-fail-delete-khoa').prop('hidden',true);
					// 						});

					// 		});
					// });
					// $(document).ready(function() {
					// 	$('#submit_import_hocphi').on('click', function(e) {
					// 		e.preventDefault();
					// 		var file_data = $('#fileHocPhi').prop('files')[0];
					// 	 	var form_data = new FormData();

					// 		$.ajax({
					// 			url:"<?php echo base_url('Giaovu/Hocphi/importHP') ?>",
					// 			type: "POST",
					// 			data:form_data,
					// 			dataType: 'json',
					// 			cache: false,
					// 			processData: false,
					// 			contentType: false,
					// 			success: function(data){
					// 				if (data.khongchonfile != '') {
					// 					$('#msg-fail').prop('hidden',false);
					// 					$('#msg-fail h5').html(data.khongchonfile);
					// 					$('#msg-success').prop('hidden',true);
					// 				}
					// 				if (data.load == true) {
					// 					$('#msg-success').prop('hidden',false);
					// 					$('#msg-success h5').html("Thêm Thành Công");
					// 					$('#msg-fail').prop('hidden',true);
					// 				}
					// 				// if (data.load == false) {
					// 				// 	$('#msg-fail').prop('hidden',false);
					// 				// 	$('#msg-fail h5').html("Dữ Liệu Đã Tồn Tại");
					// 				// 	$('#msg-success').prop('hidden',true);
					// 				// }
					// 			}
					// 			// $('#msg-success-delete-khoa').prop('hidden',false);
					// 			// 		$('#msg-success-delete-khoa h5').html("Xóa Thành Công");
					// 			// 		$('#msg-fail-delete-khoa').prop('hidden',true);
					// 		});

					// 	});
					// });
					$(document).ready(function() {
							$('#nganhhocImportDRL').on('change', function() {
									var nganhhoc_id = $(this).val();
									if(nganhhoc_id == '') {
											$('#khoahocImportDRL').prop('disabled',true);
									}else{
											$('#khoahocImportDRL').prop('disabled',false);
											$.ajax({
												url:"<?php echo base_url()?>Giaovu/Kehoachdaotao/get_khoahocbyNganh",
												type: "POST",
												data:{'nganhhoc_id' : nganhhoc_id},
												dataType: 'json',
												success: function(data){
													$('#khoahocImportDRL').html(data);
												},
												error: function(){
													alert('Error');
												}
											});
									}
							});

					});
					$(document).ready(function() {
							$('.edit_khoa').on('click', function() {
							//alert('word');
							var idkhoa = $(this).attr("id");
							$.ajax({
								url:"<?php echo base_url('Giaovu/Khoahoc/get_khoa_nganh') ?>",
								type: "POST",
								data:{'khoahoc_id' : idkhoa},
								dataType: 'json',
								success: function(data){
												$('#idkhoa_edit').val(data.khoahoc_info.khoahoc_id);
												$('#idnganh_khoa_edit').val(data.khoahoc_info.nganhhoc_id);
												$('#tennganh_khoa_edit').val(data.khoahoc_info.tennganh);
												$('#tenkhoa_edit').val(data.khoahoc_info.tenkhoa);
												$('#nambd_edit').val(data.khoahoc_info.nam_batdau);
												$('#namkt_edit').val(data.khoahoc_info.nam_ketthuc);
												}
											 });
							});
					});
					$(document).ready(function() {
							$('#submit_editkhoa').on('click', function() {
									var idnganh = $('#idnganh_khoa_edit').val();
									var idkhoa = $('#idkhoa_edit').val();
									var tenkhoa = $('#tenkhoa_edit').val();
									var nambd = $('#nambd_edit').val();
									var nambdtrim = $.trim(nambd);
									var namkt = parseInt(nambdtrim) + 4;

									if(tenkhoa == '' || nambd == '') {
											$('#msg-fail-edit-khoa').prop('hidden',false);
											$('#msg-fail-edit-khoa h5').html('Dữ Liệu Không Được Để Trống');
											$('#msg-success-edit-khoa').prop('hidden',true);
									}
									else if (isNaN(namkt)) {
										$('#msg-fail-edit-khoa').prop('hidden',false);
										$('#msg-fail-edit-khoa h5').html('Năm Bắt Đầu Phải Nhập Số');
										$('#msg-success-edit-khoa').prop('hidden',true);
									}
									else if (nambdtrim.length > 4) {
										$('#msg-fail-edit-khoa').prop('hidden',false);
										$('#msg-fail-edit-khoa h5').html('Năm Học Không Được Lớn Hơn 4 Số');
										$('#msg-success-edit-khoa').prop('hidden',true);
									}
									else if (nambdtrim.length < 4) {
										$('#msg-fail-edit-khoa').prop('hidden',false);
										$('#msg-fail-edit-khoa h5').html('Năm Học Không Được Nhỏ Hơn 4 Số');
										$('#msg-success-edit-khoa').prop('hidden',true);
									}
									else{
											$.ajax({
												url:"<?php echo base_url('Giaovu/khoahoc/Edit') ?>",
												type: "POST",
												data:{'nganhhoc':idnganh, 'idkhoa' : idkhoa,'tenkhoa' : tenkhoa, 'nambd':nambdtrim, 'namkt':namkt},
												dataType: 'json',
												success: function(data){
													if (data.msg != '') {

														$('#msg-fail-edit-khoa').prop('hidden',false);
														$('#msg-fail-edit-khoa h5').html(data.msg);
														$('#msg-success-edit-khoa').prop('hidden',true);
													}
													else {

													if (data.check == false) {

														$('#msg-fail-edit-khoa').prop('hidden',false);
														$('#msg-fail-edit-khoa h5').html("Sửa Thất Bại");
														$('#msg-success-edit-khoa').prop('hidden',true);
													}
													if (data.check == true) {
														//alert('word');
														$('#dialogEdit').modal('hide');
														$('#dialogValidation_Add_Khoa').modal('show');
													}
													// $('#form-Add').trigger("reset");
													// $('#msg-success').prop('hidden',false);
												}
												}
												// error: function(){
												// 	$('#msg-fail h5').html('Thêm Thất Bại');
												// }
											});
									}
							});
					});
					$(document).ready(function() {
							$('.delete_khoa').on('click', function() {
							//alert('word');
							var idmon = $(this).attr("id");
							$('#submit_delkhoa').on('click', function() {
							$.ajax({
								url:"<?php echo base_url('Giaovu/Khoahoc/Del') ?>",
								type: "POST",
								data:{'khoahoc_id' : idmon},
								dataType: 'json',
								success: function(data){
												if (data.check == false) {
														$('#msg-fail-delete-khoa').prop('hidden',false);
														$('#msg-fail-delete-khoa h5').html("Xóa Thất Bại Do Có Liên Quan Đến Dữ Liệu Khác");
														$('#msg-success-delete-khoa').prop('hidden',true);
													}
													if (data.check == true) {
														$('#dialogDelete').modal('hide');
														$('#dialogValidation_Add_Khoa').modal('show');
													}
												}

											 });
							});
							});
					});
					$(document).ready(function() {
							$('.delete_dkda').on('click', function() {
							//alert('word');
							var dkda_id = $(this).attr("id");
							$('#submit_deldkda').on('click', function() {
							$.ajax({
								url:"<?php echo base_url('Giaovu/Dieukiendoan/Del') ?>",
								type: "POST",
								data:{'dkda_id' :dkda_id},
								dataType: 'json',
								success: function(data){
												if (data.check == false) {
														$('#msg-fail-delete-dkda').prop('hidden',false);
														$('#msg-fail-delete-dkda h5').html("Xóa Thất Bại Do Có Liên Quan Đến Dữ Liệu Khác");
														$('#msg-success-delete-dkda').prop('hidden',true);
													}
													if (data.check == true) {
														$('#dialogDelete_DKDA').modal('hide');
														$('#dialogValidation_Add_DKDA').modal('show');
													}
												}
											 });
							});
							});
					});
					$(document).ready(function() {
						$('.delete_DinhChi').on('click', function() {
							var mssv = $(this).attr("id");
							// alert(mssv);
							$('#msg-success-delete-DC').prop("style").display = "none";
							$('#submit_delete_dinhchi').on('click', function() {
								$.ajax({
									url:"<?php echo base_url('Giaovu/Sinhvien/delstatusDC/') ?>",
									type: "POST",
									// data:{'khoahoc_id' : mssv},
									data: {'mssv' : mssv},
									dataType: 'json',
									success: function(data){
										if (data.msg != '') {
											$('#dialogDelete').modal('hide');
											$('#dialogValidation_Delete_Dinhchi').modal('show');
										}
									}

								});
							});
						});
					});
					$(document).ready(function() {
						$('.delete_BaoLuu').on('click', function() {
							var mssv = $(this).attr("id");
							// alert(mssv);
							$('#msg-success-delete-BL').prop("style").display = "none";
							$('#submit_delete_baoluu').on('click', function() {
								$.ajax({
									url:"<?php echo base_url('Giaovu/Sinhvien/delstatusBL/') ?>",
									type: "POST",
									// data:{'khoahoc_id' : mssv},
									data: {'mssv' : mssv},
									dataType: 'json',
									success: function(data){
										if (data.msg != '') {
											$('#dialogDelete').modal('hide');
											$('#dialogValidation_Delete_Baoluu').modal('show');
										}
									}

								});
							});
						});
					});
					$(document).ready(function() {
						$('.delete_TamNgung').on('click', function() {
							var mssv = $(this).attr("id");
							// alert(mssv);
							$('#msg-success-delete-TN').prop("style").display = "none";
							$('#submit_delete_tamngung').on('click', function() {
								$.ajax({
									url:"<?php echo base_url('Giaovu/Sinhvien/delstatusTN/') ?>",
									type: "POST",
									// data:{'khoahoc_id' : mssv},
									data: {'mssv' : mssv},
									dataType: 'json',
									success: function(data){
										if (data.msg != '') {
											$('#dialogDelete').modal('hide');
											$('#dialogValidation_Delete_Tamngung').modal('show');
										}
									}

								});
							});
						});
					});
					$(document).ready(function() {
							$('#submit_addkhoa').on('click', function() {
									var nganhhoc = $('#nganhhoc_add_khoahoc').val();
									var khoahoc = $('#khoahoc_add_khoahoc').val();
									var nambd = $('#nambd_add_khoahoc').val();
									var nambdtrim = $.trim(nambd);
									var namkt = parseInt($('#nambd_add_khoahoc').val()) + 4;

									if(nganhhoc == '' || khoahoc == '' || nambdtrim == '') {
											$('#msg-fail').prop('hidden',false);
											$('#msg-fail h5').html('Dữ Liệu Không Được Để Trống');
											$('#msg-success').prop('hidden',true);

									}
									else if(isNaN(namkt))
									{
										$('#msg-fail').prop('hidden',false);
											$('#msg-fail h5').html('Năm Bắt Đầu Phải Nhập Số');
											$('#msg-success').prop('hidden',true);
									}
									else if(nambdtrim.length >4)
									{
										$('#msg-fail').prop('hidden',false);
											$('#msg-fail h5').html('Năm Học Không Được Lớn Hơn 4 Số');
											$('#msg-success').prop('hidden',true);
									}
									else if(nambdtrim.length <4)
									{
										$('#msg-fail').prop('hidden',false);
											$('#msg-fail h5').html('Năm Học Không Được Nhỏ Hơn 4 Số');
											$('#msg-success').prop('hidden',true);
									}
									else{
										//alert('word');
											$.ajax({
												url:"<?php echo base_url('Giaovu/Khoahoc/Add') ?>",
												type: "POST",
												data:{'nganhhoc_id':nganhhoc, 'tenkhoa':khoahoc, 'nambd':nambdtrim, 'namkt':namkt},
												dataType: 'json',

												success: function(data){
													if (data.msg != '') {
														$('#msg-fail').prop('hidden',false);
														$('#msg-fail h5').html(data.msg);
														$('#msg-success').prop('hidden',true);
													}
													else {
													if (data.check == false) {
														$('#msg-fail').prop('hidden',false);
														$('#msg-fail h5').html("Thêm Thất Bại");
														$('#msg-success').prop('hidden',true);
													}
													if (data.check == true) {
														$('#dialogAdd').modal('hide');
														$('#dialogValidation_Add_Khoa').modal('show');
													}
												}
												}

											 });
									}
							});
					});
					$(document).ready(function() {
							$('#submit_addlop').on('click', function() {
									var tenlop = $('#tenlop').val();

									if(tenlop == '' ) {
											$('#msg-fail').prop('hidden',false);
											$('#msg-fail h5').html('Dữ Liệu Không Được Để Trống');
											$('#msg-success').prop('hidden',true);
									}else{
											$.ajax({
												url:"<?php echo base_url('Giaovu/Lophoc/Add') ?>",
												type: "POST",
												data:{'tenlop':tenlop},
												dataType: 'json',
												success: function(data){
													if (data.msg != '') {
														$('#msg-fail').prop('hidden',false);
														$('#msg-fail h5').html(data.msg);
														$('#msg-success').prop('hidden',true);
													}
													else {
													if (data.check == false) {
														$('#msg-fail').prop('hidden',false);
														$('#msg-fail h5').html("Thêm Thất Bại");
														$('#msg-success').prop('hidden',true);
													}
													if (data.check == true) {
														$('#form-Add').trigger("reset");
														$('#msg-success').prop('hidden',false);
														$('#msg-fail').prop('hidden',true);
													}
													// $('#form-Add').trigger("reset");
													// $('#msg-success').prop('hidden',false);
												}
												}
												// error: function(){
												// 	$('#msg-fail h5').html('Thêm Thất Bại');
												// }
											});
									}
							});
					});
					$(document).ready(function() {
							$('.delete_lop').on('click', function() {
							//alert('word');
							var idlop = $(this).attr("id");
							$('#submit_dellop').on('click', function() {
							$.ajax({
								url:"<?php echo base_url('Giaovu/Lophoc/Del') ?>",
								type: "POST",
								data:{'lophoc_id' : idlop},
								dataType: 'json',
								success: function(data){
												if (data.check == false) {
														$('#msg-fail-delete-lop').prop('hidden',false);
														$('#msg-fail-delete-lop h5').html("Xóa Thất Bại Do Có Liên Quan Đến Dữ Liệu Khác");
														$('#msg-success-delete-lop').prop('hidden',true);
													}
													if (data.check == true) {

														$('#msg-success-delete-lop').prop('hidden',false);
														$('#msg-success-delete-lop h5').html("Xóa Thành Công");
														$('#msg-fail-delete-lop').prop('hidden',true);
													}
												}

											 });
							});
							});
					});
					$(document).ready(function() {
							$('.edit_lop').on('click', function() {
							//alert('word');
							var idlop = $(this).attr("id");
							$.ajax({
								url:"<?php echo base_url('Giaovu/Lophoc/get_lop') ?>",
								type: "POST",
								data:{'lophoc_id' : idlop},
								dataType: 'json',
								success: function(data){
												$('#idlop_edit').val(data.lophoc_info.lophoc_id);
												$('#tenlop_edit').val(data.lophoc_info.tenlop);
												}

											 });
							});
					});
					$(document).ready(function() {
							$('#submit_editlop').on('click', function() {
									var idlop = $('#idlop_edit').val();
									var tenlop = $('#tenlop_edit').val();

									if(tenlop == '') {
											$('#msg-fail-edit-lop').prop('hidden',false);
											$('#msg-fail-edit-lop h5').html('Dữ Liệu Không Được Để Trống');
											$('#msg-success-edit-lop').prop('hidden',true);
									}else{
											$.ajax({
												url:"<?php echo base_url('Giaovu/Lophoc/Edit') ?>",
												type: "POST",
												data:{'idlop' : idlop, 'tenlop':tenlop},
												dataType: 'json',
												success: function(data){
													if (data.msg != '') {
														$('#msg-fail-edit-lop').prop('hidden',false);
														$('#msg-fail-edit-lop h5').html(data.msg);
														$('#msg-success-edit-lop').prop('hidden',true);
													}
													else {
													if (data.check == false) {
														$('#msg-fail-edit-lop').prop('hidden',false);
														$('#msg-fail-edit-lop h5').html("Sửa Thất Bại");
														$('#msg-success-edit-lop').prop('hidden',true);
													}
													if (data.check == true) {
														$('#form-Edit-Lophoc').trigger("reset");
														$('#msg-success-edit-lop').prop('hidden',false);
														$('#msg-success-edit-lop h5').html("Sửa Thành Công");
														$('#msg-fail-edit-lop').prop('hidden',true);
													}
													// $('#form-Add').trigger("reset");
													// $('#msg-success').prop('hidden',false);
												}
												}
												// error: function(){
												// 	$('#msg-fail h5').html('Thêm Thất Bại');
												// }
											});
									}
							});
					});
					$(document).ready(function() {
							$('.edit_mon').on('click', function() {
							//alert('word');
							var idmon = $(this).attr("id");
							$.ajax({
								url:"<?php echo base_url('Giaovu/Monhoc/get_mon') ?>",
								type: "POST",
								data:{'monhoc_id' : idmon},
								dataType: 'json',
								success: function(data){
												$('#idmon_edit').val(data.monhoc_info.monhoc_id);
												$('#mamon_edit').val(data.monhoc_info.MaMH);
												$('#tenmon_edit').val(data.monhoc_info.TenMH);
												}

											 });
							});
					});
					$(document).ready(function() {
							$('#submit_editmon').on('click', function() {
									var idmon = $('#idmon_edit').val();
									var mamon = $('#mamon_edit').val();
									var tenmon = $('#tenmon_edit').val();

									if(mamon == '' || tenmon == '' ) {
											$('#msg-fail-edit-mon').prop('hidden',false);
											$('#msg-fail-edit-mon h5').html('Dữ Liệu Không Được Để Trống');
											$('#msg-success-edit-mon').prop('hidden',true);
									}else{
											$.ajax({
												url:"<?php echo base_url('Giaovu/Monhoc/Edit') ?>",
												type: "POST",
												data:{'idmon' : idmon,'mamon' : mamon, 'tenmon':tenmon},
												dataType: 'json',
												success: function(data){
													if (data.msg != '') {
														$('#msg-fail-edit-mon').prop('hidden',false);
														$('#msg-fail-edit-mon h5').html(data.msg);
														$('#msg-success-edit-mon').prop('hidden',true);
													}
													else {
													if (data.check == false) {
														$('#msg-fail-edit-mon').prop('hidden',false);
														$('#msg-fail-edit-mon h5').html("Sửa Thất Bại");
														$('#msg-success-edit-mon').prop('hidden',true);
													}
													if (data.check == true) {
														$('#dialogEdit').modal('hide');
														$('#dialogValidation_Add_Mon').modal('show');
													}
													// $('#form-Add').trigger("reset");
													// $('#msg-success').prop('hidden',false);
												}
												}
												// error: function(){
												// 	$('#msg-fail h5').html('Thêm Thất Bại');
												// }
											});
									}
							});
					});
					$(document).ready(function() {
							$('.delete_mon').on('click', function() {
							//alert('word');
							var idmon = $(this).attr("id");
							$('#submit_delmon').on('click', function() {
							$.ajax({
								url:"<?php echo base_url('Giaovu/Monhoc/Del') ?>",
								type: "POST",
								data:{'monhoc_id' : idmon},
								dataType: 'json',
								success: function(data){
												if (data.check == false) {
														$('#msg-fail-delete-mon').prop('hidden',false);
														$('#msg-fail-delete-mon h5').html("Xóa Thất Bại Do Có Liên Quan Đến Dữ Liệu Khác");
														$('#msg-success-delete-mon').prop('hidden',true);
													}
													if (data.check == true) {
														$('#dialogDelete').modal('hide');
														$('#dialogValidation_Add_Mon').modal('show');
													}
												}

											 });
							});
							});
					});
					$(document).ready(function() {
							$('#submit_addmonhoc').on('click', function() {
									var mamon = $('#mamon_add_monhoc').val();
									var tenmon = $('#tenmon_add_monhoc').val();
									if(mamon == '' || tenmon == '') {
											$('#msg-fail').prop('hidden',false);
											$('#msg-fail h5').html('Dữ Liệu Không Được Để Trống');
											$('#msg-success').prop('hidden',true);
									}else{
										//alert('word');
											$.ajax({
												url:"<?php echo base_url('Giaovu/Monhoc/Add') ?>",
												type: "POST",
												data:$('#form-add-monhoc').serialize(),
												dataType: 'json',
												success: function(data){

													if (data.msg != '') {
														$('#msg-fail').prop('hidden',false);
														$('#msg-fail h5').html(data.msg);
														$('#msg-success').prop('hidden',true);
													}
													else {
													if (data.check == false) {
														$('#msg-fail').prop('hidden',false);
														$('#msg-fail h5').html("Thêm Thất Bại");
														$('#msg-success').prop('hidden',true);
													}
													if (data.check == true) {
														$('#dialogAdd').modal('hide');
														$('#dialogValidation_Add_Mon').modal('show');
													}
												}
												}

											 });
									}
							});
					});
					$(document).ready(function() {
							$('.edit_nganh').on('click', function() {
							//alert('word');
							var idnganh = $(this).attr("id");
							$.ajax({
								url:"<?php echo base_url('Giaovu/Nganhhoc/get_nganh') ?>",
								type: "POST",
								data:{'nganhhoc_id' : idnganh},
								dataType: 'json',
								success: function(data){
												$('#idnganh_edit').val(data.nganhhoc_info.nganhhoc_id);
												$('#manganh_edit').val(data.nganhhoc_info.ma_nganhhoc);
												$('#tennganh_edit').val(data.nganhhoc_info.tennganh);
												}

											 });
							});
					});
					$(document).ready(function() {
							$('.delete_nganh').on('click', function() {
							//alert('word');
							var idnganh = $(this).attr("id");
							$('#submit_delnganh').on('click', function() {
							$.ajax({
								url:"<?php echo base_url('Giaovu/Nganhhoc/Del') ?>",
								type: "POST",
								data:{'nganhhoc_id' : idnganh},
								dataType: 'json',
								success: function(data){
												if (data.check == false) {
														$('#msg-fail-delete-nganh').prop('hidden',false);
														$('#msg-fail-delete-nganh h5').html("Xóa Thất Bại Do Có Liên Quan Đến Dữ Liệu Khác");
														$('#msg-success-delete-nganh').prop('hidden',true);
													}
													if (data.check == true) {
														$('#dialogDelete').modal('hide');
														$('#dialogValidation_Add_Nganh').modal('show');
													}
												}

											 });
							});
							});
					});
					$(document).ready(function() {
							$('#submit_editnganh').on('click', function() {
									var idnganh = $('#idnganh_edit').val();
									var manganh = $('#manganh_edit').val();
									var tennganh = $('#tennganh_edit').val();

									if(manganh == '' || tennganh == '' ) {
											$('#msg-fail-edit-nganh').prop('hidden',false);
											$('#msg-fail-edit-nganh h5').html('Dữ Liệu Không Được Để Trống');
											$('#msg-success-edit-nganh').prop('hidden',true);
									}else{
											$.ajax({
												url:"<?php echo base_url('Giaovu/Nganhhoc/Edit') ?>",
												type: "POST",
												data:{'idnganh' : idnganh,'manganh' : manganh, 'tennganh':tennganh},
												dataType: 'json',
												success: function(data){
													if (data.msg != '') {
														$('#msg-fail-edit-nganh').prop('hidden',false);
														$('#msg-fail-edit-nganh h5').html(data.msg);
														$('#msg-success-edit-nganh').prop('hidden',true);
													}

													if (data.check == true) {
														$('#dialogEdit').modal('hide');
														$('#dialogValidation_Add_Nganh').modal('show');
													}
													// $('#form-Add').trigger("reset");
													// $('#msg-success').prop('hidden',false);

												}
												// error: function(){
												// 	$('#msg-fail h5').html('Thêm Thất Bại');
												// }
											});
									}
							});
					});
					$(document).ready(function() {
							$('#submit_sv_import').on('click', function(e) {
									e.preventDefault();
									var file_data = $('#fileSV').prop('files')[0];
									var manganh = $('#nganhhocImportSV').val();
									var makhoa = $('#khoahocImportSV').val();
									if(manganh == '' || makhoa == '') {
											$('#msg-fail').prop('hidden',false);
											$('#msg-fail h5').html('Vui Lòng Chọn Ngành Học, Khóa Học');
											$('#msg-success').prop('hidden',true);
									}else{
										 	var form_data = new FormData();
											form_data.append('file', file_data);
											form_data.append('manganh', manganh);
											form_data.append('makhoa', makhoa);
											$.ajax({
												url:"<?php echo base_url('Giaovu/Thongtinsinhvien/importSV') ?>",
												type: "POST",
												data:form_data,
												dataType: 'json',
												cache: false,
												processData: false,
												contentType: false,
												success: function(data){
													if (data.khongchonfile != '') {
														$('#msg-fail').prop('hidden',false);
														$('#msg-fail h5').html(data.khongchonfile);
														$('#msg-success').prop('hidden',true);
													}
													if (data.load == true) {
														$('#dialogImport').modal('hide');
														$('#dialogValidation_Import_SV').modal('show');
													}
													if (data.kiemtrafile == true) {
														$('#msg-fail').prop('hidden',false);
														$('#msg-fail h5').html("Vui Lòng Chọn Đúng ĐỊnh Dạng File Excel");
														$('#msg-success').prop('hidden',true);
													}
													// if (data.kiemtra_mssv == true) {
													// 	$('#msg-fail').prop('hidden',false);
													// 	$('#msg-fail h5').html("Dữ Liệu Trong Excel Rỗng");
													// 	$('#msg-success').prop('hidden',true);
													// }
												}
												// $('#msg-success-delete-khoa').prop('hidden',false);
												// 		$('#msg-success-delete-khoa h5').html("Xóa Thành Công");
												// 		$('#msg-fail-delete-khoa').prop('hidden',true);
											});
									}
							});
					});
					$(document).ready(function() {
							$('#nganhhocImportSV').on('change', function() {
									var nganhhoc_id = $(this).val();
									if(nganhhoc_id == '') {
											$('#khoahocImportSV').prop('disabled',true);
									}else{
											$('#khoahocImportSV').prop('disabled',false);
											$.ajax({
												url:"<?php echo base_url()?>Giaovu/Kehoachdaotao/get_khoahocbyNganh",
												type: "POST",
												data:{'nganhhoc_id' : nganhhoc_id},
												dataType: 'json',
												success: function(data){
													$('#khoahocImportSV').html(data);
												},
												error: function(){
													alert('Error');
												}
											});
									}
							});

					});
					// $(document).ready(function() {
					// 		$('.edit_Mon_KHDT').on('click', function() {
					// 		//alert('word');
					// 		var idkhdt = $(this).attr("id");
					// 		$.ajax({
					// 			url:"<?php echo base_url('Giaovu/Kehoachdaotao/getmon_khdt') ?>",
					// 			type: "POST",
					// 			data:{'khdt_id' : idkhdt},
					// 			dataType: 'json',
					// 			success: function(data){
					// 							$('#nganhhoc_dieukien_doan_edit').val(data.dkda_info.tennganh);
					// 							$('#nganhhoc_dieukien_doan_edit').val(data.dkda_info.tenkhoa);
					// 							$('#maxmonno_dieukien_doan_edit').val(data.dkda_info.max_monno);
					// 							$('#monkoduocno_dieukien_doan_edit').val(data.dkda_info.tenmon);
					// 							}

					// 						 });
					// 		});
					// });
					$(document).ready(function() {
							$('.edit_Mon_KHDT').on('click', function() {
							//alert('word');
							var idkhdt = $(this).attr("id");
							$.ajax({
								url:"<?php echo base_url('Giaovu/Kehoachdaotao/getmon_khdt') ?>",
								type: "POST",
								data:{'khdt_id' : idkhdt},
								dataType: 'json',
								success: function(data){
												console.log(data);
												if (data.khdt_info.monphu_id == 1) {
													$('#monphu_edit').attr('checked','checked');
												}
												$('#idkhdt_edit_monkhdt').val(data.khdt_info.khdt_id);
												$('#nganhhoc_edit_monkhdt').val(data.khdt_info.tennganh);
												$('#khoahoc_edit_monkhdt').val(data.khdt_info.tenkhoa);
												$('#idnganhhoc_edit_monkhdt').val(data.khdt_info.nganhhoc_id);
												$('#idkhoahoc_edit_monkhdt').val(data.khdt_info.khoahoc_id);
												$('#idmon_edit_monkhdt').val(data.khdt_info.monhoc_id);
												$('#mamon_edit_monkhdt').val(data.khdt_info.MaMH);
												$('#tenmon_edit_monkhdt').val(data.khdt_info.TenMH);
												$('#dvht_tc_edit_monkhdt').val(data.khdt_info.dvht_tc);
												$('#tongso_edit_monkhdt').val(data.khdt_info.tongso);
												$('#lythuyet_edit_monkhdt').val(data.khdt_info.lythuyet);
												$('#thuchanh_edit_monkhdt').val(data.khdt_info.thuchanh);
												$('#baitap_edit_monkhdt').val(data.khdt_info.baitap);
												$('#baitaplon_edit_monkhdt').val(data.khdt_info.baitaplon);
												$('#doan_edit_monkhdt').val(data.khdt_info.doAn);
												$('#khoaluan_edit_monkhdt').val(data.khdt_info.khoaluan);
												}

											 });
							});
					});
					$(document).ready(function() {
							$('#submit_edit_monkhdt').on('click', function() {
								//alert('word');
									var idkhdt = $('#idkhdt_edit_monkhdt').val();
									var idnganh = $('#idnganhhoc_edit_monkhdt').val();
									var idkhoa = $('#idkhoahoc_edit_monkhdt').val();
									var idhocki = $('#hocki_edit_monkhdt').val();
									var idmon = $('#idmon_edit_monkhdt').val();
									var dvht = $('#dvht_tc_edit_monkhdt').val();
									var tongso = $('#tongso_edit_monkhdt').val();
									var lithuyet = $('#lythuyet_edit_monkhdt').val();
									var thuchanh = $('#thuchanh_edit_monkhdt').val();
									var baitap = $('#baitap_edit_monkhdt').val();
									var baitaplon = $('#baitaplon_edit_monkhdt').val();
									var doan = $('#doan_edit_monkhdt').val();
									var khoaluan = $('#khoaluan_edit_monkhdt').val();
									var monphu = 0;
									if ($('#monphu_edit').is(":checked")) {
										monphu = 1;
									}
									if(dvht == '' || tongso == '' || lithuyet == '' || thuchanh == '' || baitap == '' || baitaplon == '' || doan == '' || khoaluan == '' || idhocki == '') {
											$('#msg-fail-editmon-khdt').prop('hidden',false);
											$('#msg-fail-editmon-khdt h5').html('Dữ Liệu Không Được Để Trống');
											$('#msg-success-editmon-khdt').prop('hidden',true);
									}else{
											$.ajax({
												url:"<?php echo base_url('Giaovu/Kehoachdaotao/editmon_khdt') ?>",
												type: "POST",
												data:{'nganhhoc':idnganh,'khoahoc':idkhoa,'monhoc':idmon,'khdt_id':idkhdt,'hocki_id' : idhocki, 'dvht':dvht, 'tongso':tongso, 'lythuyet':lithuyet, 'thuchanh':thuchanh, 'baitap':baitap,'baitaplon':baitaplon, 'doAn':doan, 'khoaluan':khoaluan, 'monphu' : monphu},
												dataType: 'json',
												success: function(data){

													if (data.check == true) {
														//alert('word');
														$('#dialogEdit_KHDT').modal('hide');
														$('#dialogValidation_Addmon_KHDT').modal('show');
													}

													if (data.check == false) {

														$('#msg-fail-editmon-khdt').prop('hidden',false);
														$('#msg-fail-editmon-khdt h5').html("Sửa Thất Bại");
														$('#msg-success-editmon-khdt').prop('hidden',true);
													}

													if(data.msg != '')
													{
														$('#msg-fail-editmon-khdt').prop('hidden',false);
														$('#msg-fail-editmon-khdt h5').html(data.msg);
														$('#msg-success-editmon-khdt').prop('hidden',true);
													}
													// $('#form-Add').trigger("reset");
													// $('#msg-success').prop('hidden',false);

												}
												// error: function(){
												// 	$('#msg-fail h5').html('Thêm Thất Bại');
												// }
											});
									}
							});
					});
					$(document).ready(function() {
							$('.delete_Mon_KHDT').on('click', function() {
							//alert('word');
							var idkhdt = $(this).attr("id");
							//alert(i)
							$('#submit_delmon_khdt').on('click', function() {
								//alert('word');
							$.ajax({
								url:"<?php echo base_url('Giaovu/Kehoachdaotao/Delmon_KHDT') ?>",
								type: "POST",
								data:{'khdt_id' : idkhdt},
								dataType: 'json',
								success: function(data){
												if (data.check == true) {

														$('#dialogDelete_KHDT').modal('hide');
														$('#dialogValidation_Addmon_KHDT').modal('show');
													}
												if (data.msg != '') {
														$('#msg-fail-deletemon-khdt').prop('hidden',false);
														$('#msg-fail-deletemon-khdt h5').html(data.msg);
														$('#msg-success-deletemon-khdt').prop('hidden',true);
													}

												}

											 });
							});
							});
					});

	    </script>

	</body>
</html>
