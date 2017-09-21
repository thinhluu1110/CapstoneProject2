<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <link href="http://aspnet.demo.hueuni.edu.vn/StudentManager/Themes/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <title><?php echo $title ?></title>
    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="http://aspnet.demo.hueuni.edu.vn/StudentManager/Themes/ace-master/css/bootstrap.min.css" />
    <link href="<?php echo base_url("assets/font-awesome/css/font-awesome.min.css") ?>" rel="stylesheet" />
    <link rel="stylesheet" href="http://aspnet.demo.hueuni.edu.vn/StudentManager/Themes/ace-master/css/fonts.googleapis.com.css" />
    <link rel="stylesheet" href="http://aspnet.demo.hueuni.edu.vn/StudentManager/Themes/ace-master/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
    <link rel="stylesheet" href="http://aspnet.demo.hueuni.edu.vn/StudentManager/Themes/ace-master/css/ace-skins.min.css" />
    <link rel="stylesheet" href="http://aspnet.demo.hueuni.edu.vn/StudentManager/Themes/ace-master/css/ace-rtl.min.css" />
    <link rel="stylesheet" href="http://aspnet.demo.hueuni.edu.vn/StudentManager/Themes/ace-master/css/bootstrap-datepicker3.min.css" />
    <link rel="stylesheet" href="http://aspnet.demo.hueuni.edu.vn/StudentManager/Themes/ace-master/css/chosen.min.css" />
    <link rel="stylesheet" href="http://aspnet.demo.hueuni.edu.vn/StudentManager/Themes/ace-master/css/select2.min.css" />
    <script src="http://aspnet.demo.hueuni.edu.vn/StudentManager/Themes/ace-master/js/ace-extra.min.js"></script>
    <link rel="stylesheet" href="http://aspnet.demo.hueuni.edu.vn/StudentManager/Content/site.css" />
    <link href="<?php echo base_url("assets/css/custom.css") ?>" rel="stylesheet" />
    <link href="<?php echo base_url("assets/css/admin-custom.css") ?>" rel="stylesheet" />
    <script src="http://aspnet.demo.hueuni.edu.vn/StudentManager/Themes/ace-master/js/jquery-2.1.4.min.js"></script>
</head>
<body class="no-skin" style="margin:0 !important;padding:0 !important">
    <div id="navbar" class="navbar navbar-default navbar-collapse h-navbar ace-save-state navbar-fixed-top">
        <div class="navbar-container" id="navbar-container">
            <button class="pull-right navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#sidebar">
                <span class="sr-only">#</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-header pull-left">
                <a href="<?php echo base_url("admin/home/index") ?>" class="navbar-brand">
                    <small>
                        <i class="fa fa-university""></i>
                        <strong>FES_System</strong>
                    </small>
                </a>
            </div>
            <div class="navbar-buttons navbar-header pull-right" role="navigation">
                <ul class="nav ace-nav">
                    <li class="light-blue dropdown-modal">
                        <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                            <img class="nav-user-photo" src="http://ums-testing.hueuni.edu.vn/teacher/Auth/GetTeacherPhoto/DHT0220/" alt="">
                            <span class="user-info">
                                <small>Xin chào!</small>Nguyễn Thị Mạnh
                            </span>

                            <i class="ace-icon fa fa-caret-down"></i>
                        </a>
                        <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                            <li>
                                <a href="#">
                                    <i class="ace-icon fa fa-user"></i>Thông Tin Cá Nhân
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="ace-icon fa fa-cog"></i>Thay Đổi Mật Khẩu
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="/Admin/Login" onclick="return confirm('Bạn muốn thoát khỏi ứng dụng?');">
                                    <i class="ace-icon fa fa-power-off"></i>
                                    Thoát khỏi ứng dụng
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <nav role="navigation" class="navbar-menu pull-left collapse navbar-collapse">
                <!-- Học kỳ tác nghiệp -->
                
            </nav>
        </div>
    </div>
    <div class="main-container ace-save-state" id="main-container">
        <div class="sidebar h-sidebar navbar-collapse collapse ace-save-state sidebar-fixed" id="sidebar" data-sidebar="true" data-sidebar-scroll="true" data-sidebar-hover="true">
            <div id="sidebar-shortcuts" class="sidebar-shortcuts">
                <div id="sidebar-shortcuts-mini" class="sidebar-shortcuts-mini">
                    <span class="btn btn-success"></span>
                    <span class="btn btn-info"></span>
                    <span class="btn btn-warning"></span>
                    <span class="btn btn-danger"></span>
                </div>
            </div>
            <ul class="nav nav-list" style="top: 0px;">
                <li class="hover">
                    <a href="<?php echo base_url("admin/home/index") ?>">
                        <i class="menu-icon fa fa-home"></i>
                        <span class="menu-text">Trang chủ</span>
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a class="dropdown-toggle" href="#">
                        <i class="menu-icon fa fa-calendar"></i>
                        <span class="menu-text">
                            Công Tác Giảng Dạy
                        </span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu can-scroll">
                        <li class="hover">
                            <a href="<?php echo base_url("admin/schedule/index") ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Thời Khóa Biểu
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="hover">
                            <a href="<?php echo base_url("admin/ExamSchedule/index") ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Lịch Thi Học Kì
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
                <li class="hover">
                    <a class="dropdown-toggle" href="#">
                        <i class="menu-icon fa fa-money"></i>
                        <span class="menu-text">
                            Học Phí - Học Bổng
                        </span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu can-scroll">
                        <li class="hover">
                            <a href="/Admin/Tuition">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Học Phí
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="hover">
                            <a href="/Admin/Scholarship">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Học Bổng
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
                <li class="hover">
                    <a class="dropdown-toggle" href="#">
                        <i class="menu-icon fa fa-database"></i>
                        <span class="menu-text">
                            Tra Cứu Dữ Liệu
                        </span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu can-scroll">
                        <li class="hover">
                            <a href="/Admin/Students">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Sinh Viên
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="hover">
                            <a href="<?php echo base_url("admin/teacher/index") ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Giảng Viên
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="hover">
                            <a href="<?php echo base_url("admin/subject/index") ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Học Phần
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="hover">
                            <a href="/Admin/Course">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Lớp Sinh Hoạt
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="hover">
                            <a href="/Admin/StudyProgram">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Chương Trình Đào Tạo
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="hover">
                            <a href="<?php echo base_url("admin/semester/index") ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Học Kì
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="hover">
                            <a href="<?php echo base_url("admin/course/index") ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Khóa Tuyển Sinh
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
                <li class="hover">
                    <a class="dropdown-toggle" href="#">
                        <i class="menu-icon fa fa-user"></i>
                        <span class="menu-text">
                            Công Tác Sinh Viên
                        </span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu can-scroll">
                        <li class="hover">
                            <a href="/Admin/StudyResult">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Quản Lý Kết Qủa Học Tập
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="hover">
                            <a href="/Admin/Semesters">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Quản Lý Điểm Rèn Luyện
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="hover">
                            <a href="/Admin/StudentProject">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Đồ Án SV
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="hover">
                            <a href="/Admin/ProjectValue">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Điều Kiện Làm Đồ Án
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="hover">
                            <a href="/Admin/DropOut">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Thôi Học
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="hover">
                            <a href="/Admin/Reserve">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Bảo Lưu Kết Qủa
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="hover">
                            <a href="/Admin/Suspended">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Tạm Dừng Học
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
                <li class="hover">
                    <a class="dropdown-toggle" href="#">
                        <i class="menu-icon fa fa-user"></i>
                        <span class="menu-text">
                            Tài Khoản - Người Dùng
                        </span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu can-scroll">
                        <li class="hover">
                            <a href="/Admin/CreateAccount">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Cấp Tài Khoản
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="hover">
                            <a href="/Admin/Account">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Danh Sách Tài Khoản
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="main-content">
            <div class="main-content-inner">
               <?php $this->load->view($subview) ?>
            </div>
        </div>
        <div class="footer">
            <div class="footer-inner">
                <div class="footer-content">
                    <span class="smaller-90">
                        &copy; Học Bạ Điện Tử 2017
                    </span>
                </div>
            </div>
        </div>
        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
    </div>
    <!-- for main popup dialog -->
    <div id="dialogMain" class="modal fade" role="dialog" style="display:none;padding:0"></div>
    <!-- basic scripts -->
    <!--[if !IE]> -->
    

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