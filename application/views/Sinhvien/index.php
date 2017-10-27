<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('sinhvien/head') ?>
</head>
<body class="no-skin" style="margin:0 !important;padding:0 !important">
	<div id="navbar" class="navbar navbar-default navbar-collapse h-navbar ace-save-state navbar-fixed-top">
			<?php $this->load->view('sinhvien/top') ?>
	</div>
	<div class="main-container ace-save-state" id="main-container">
	
		<div class="sidebar h-sidebar navbar-collapse collapse ace-save-state sidebar-fixed" id="sidebar" data-sidebar="true" data-sidebar-scroll="true" data-sidebar-hover="true" style="margin-top: 17px;">
			<?php $this->load->view('sinhvien/menu') ?>
		</div>
		<div class="main-content">
			<?php $this->load->view($temp) ?>
		</div>
		<div class="footer">
			<?php $this->load->view('sinhvien/footer') ?>
		</div>
		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse display">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
	</div>
	<div id="dialogMain" class="modal fade" role="dialog" style="display:none;padding:0"></div>
    <!-- basic scripts -->
    <!--[if !IE]> -->
    <script src="http://aspnet.demo.hueuni.edu.vn/StudentManager/Themes/ace-master/js/jquery-2.1.4.min.js"></script>

    <!-- <![endif]-->
    <!--[if IE]>
    <script src="~/Themes/ace-master/js/jquery-1.11.3.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        if ('ontouchstart' in document.documentElement) document.write("<script src='~/Themes/ace-master/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
    </script>
    <script src="http://aspnet.demo.hueuni.edu.vn/StudentManager/Themes/ace-master/js/bootstrap.min.js"></script>

    <!-- page specific plugin scripts -->
    <!-- ace scripts -->
    <script src="http://aspnet.demo.hueuni.edu.vn/StudentManager/Themes/ace-master/js/ace-elements.min.js"></script>
    <script src="http://aspnet.demo.hueuni.edu.vn/StudentManager/Themes/ace-master/js/ace.min.js"></script>
    <script src="http://aspnet.demo.hueuni.edu.vn/StudentManager/Themes/ace-master/js/bootstrap-datepicker.min.js"></script>
    <script src="http://aspnet.demo.hueuni.edu.vn/StudentManager/Themes/ace-master/js/bootstrap-timepicker.min.js"></script>
    <script src="http://aspnet.demo.hueuni.edu.vn/StudentManager/Themes/ace-master/js/chosen.jquery.min.js"></script>
    <script src="http://aspnet.demo.hueuni.edu.vn/StudentManager/Themes/ace-master/js/select2.min.js"></script>
    <script src="http://aspnet.demo.hueuni.edu.vn/StudentManager/Scripts/site.js"></script>

    <!-- inline scripts related to this page -->
    <script type="text/javascript" src="http://aspnet.demo.hueuni.edu.vn/StudentManager/Scripts/site.js"></script>

    <script type="text/javascript">
        applicationUrl = "http://aspnet.demo.hueuni.edu.vnhttp://aspnet.demo.hueuni.edu.vn/StudentManager/";

        $(document).ready(function () {
            var $sidebar = $('.sidebar').eq(0);
            if (!$sidebar.hasClass('h-sidebar')) return;

            $(document).on('settings.ace.top_menu', function (ev, event_name, fixed) {
                if (event_name !== 'sidebar_fixed') return;

                var sidebar = $sidebar.get(0);
                var $window = $(window);

                //return if sidebar is not fixed or in mobile view mode
                var sidebar_vars = $sidebar.ace_sidebar('vars');
                if (!fixed || (sidebar_vars['mobile_view'] || sidebar_vars['collapsible'])) {

                    $sidebar.removeClass('lower-highlight');
                    //restore original, default marginTop
                    sidebar.style.marginTop = '';

                    $window.off('scroll.ace.top_menu')
                    return;
                }

                var done = false;
                $window.on('scroll.ace.top_menu', function (e) {

                    var scroll = $window.scrollTop();
                    scroll = parseInt(scroll / 4);//move the menu up 1px for every 4px of document scrolling
                    if (scroll > 17) scroll = 17;


                    if (scroll > 16) {
                        if (!done) {
                            $sidebar.addClass('lower-highlight');
                            done = true;
                        }
                    }
                    else {
                        if (done) {
                            $sidebar.removeClass('lower-highlight');
                            done = false;
                        }
                    }

                    sidebar.style['marginTop'] = (17 - scroll) + 'px';
                }).triggerHandler('scroll.ace.top_menu');

            }).triggerHandler('settings.ace.top_menu', ['sidebar_fixed', $sidebar.hasClass('sidebar-fixed')]);

            $(window).on('resize.ace.top_menu', function () {
                $(document).triggerHandler('settings.ace.top_menu', ['sidebar_fixed', $sidebar.hasClass('sidebar-fixed')]);
            });

            //plugins
            $('.date-picker').datepicker({ autoclose: true, todayHighlight: true, format: 'dd-mm-yyyy' });
            $('.time-picker').timepicker({ minuteStep: 1, showSeconds: false, showMeridian: false });
            $(".select2").select2({});
            $(".chosen-select").chosen({});

            //$('.chosen-select').chosen();
            //orthers
            $(".checkbox-all").change(function () {
                var status = this.checked;
                $($(this).data("checkbox-all-range")).each(function () {
                    $(this).prop("checked", status);
                });
            });
        });
    </script>
</body>
</html>