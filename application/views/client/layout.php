<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <link href="http://aspnet.demo.hueuni.edu.vn/StudentManager/Themes/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <title>Học Bạ Điện Tử - Đại Học Văn Lang</title>
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
                <a href="/" class="navbar-brand">
                    <small>
                        <strong>Văn Lang CMS</strong>
                    </small>
                </a>
            </div>
            <div class="navbar-buttons navbar-header pull-right" role="navigation">
                <ul class="nav ace-nav">
                    <li class="light-blue dropdown-modal">
                        <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                            <img class="nav-user-photo" src="http://ums-testing.hueuni.edu.vn/teacher/Auth/GetTeacherPhoto/DHT0220/" alt="">
                            <span class="user-info">
                                <small>Xin chào!</small>Trần Nguy&#234;n Phong
                            </span>

                            <i class="ace-icon fa fa-caret-down"></i>
                        </a>
                        <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                            <li>
                                <a href="http://aspnet.demo.hueuni.edu.vn/StudentManager/Account/UserProfile">
                                    <i class="ace-icon fa fa-user"></i>Thông Tin Cá Nhân
                                </a>
                            </li>
                            <li>
                                <a href="http://aspnet.demo.hueuni.edu.vn/StudentManager/Account/Setting">
                                    <i class="ace-icon fa fa-cog"></i>Thay Đổi Mật Khẩu
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="http://aspnet.demo.hueuni.edu.vn/StudentManager/Account/Logout" onclick="return confirm('Bạn muốn thoát khỏi ứng dụng?');">
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
                <ul class="nav navbar-nav">
                    <li id="menutop_semesterSetting" class="light-blue dropdown">
                        <a data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
                            Học kỳ: 2, năm học: 2016-2017 <i class="ace-icon fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-left">
                            <li>
                                <form action="http://aspnet.demo.hueuni.edu.vn/StudentManager/Account/SessionSetting" class="form-horizontal" id="formThietLapHocKy" method="post" role="form">
                                    <div style="width:350px">
                                        <div class="col-xs-12" style="padding:5px;color:#000">
                                            <strong>Thiết lập học kỳ tác nghiệp:</strong>
                                        </div>
                                    </div>
                                    <div style="width:350px;height:90px; padding-top:10px;">
                                        <div class="col-xs-5" style="padding:5px">
                                            <select name="namHoc" id="namHoc" class="input-sm form-control">
                                                <option value="2016-2017">2016-2017</option>
                                                <option value="2015-2016">2015-2016</option>
                                                <option value="2014-2015">2014-2015</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-4" style="padding:5px">
                                            <select name="hocKy" id="hocKy" class="input-sm form-control">
                                                <option value="1">Học kỳ 1</option>
                                                <option value="2">Học kỳ 2</option>
                                                <option value="3">Học kỳ Hè</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-3" style="padding:5px">
                                            <button type="submit" class="btn btn-xs btn-primary" value="ok">
                                                <i class="ace-icon fa fa-check bigger-120"></i>
                                            </button>
                                            <button type="button" class="btn btn-xs btn-default" value="cancel" onclick="$('#menutop_semesterSetting').removeClass('open');">
                                                <i class="ace-icon fa fa-ban bigger-120"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
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
                    <a href="/Student/Index">
                        <i class="menu-icon fa fa-home"></i>
                        <span class="menu-text">Trang chủ</span>
                    </a>
                    <b class="arrow"></b>
                </li>
                <li class="hover">
                    <a class="dropdown-toggle" href="#">
                        <i class="menu-icon fa fa-book"></i>
                        <span class="menu-text">
                            Hoạt Động Học Tập
                        </span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu can-scroll">
                        <li class="hover">
                            <a href="/Student/TimeTable">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Thời Khóa Biểu
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="hover">
                            <a href="/Student/TimeOfExam">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Lịch Thi Học Kì
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a class="" href="/Student/TuitionLog">
                        <i class="menu-icon fa fa-money"></i>
                        <span class="menu-text">
                            Học Phí - Lệ Phí
                        </span>
                    </a>
                </li>
                <li class="hover">
                    <a class="dropdown-toggle" href="#">
                        <i class="menu-icon fa fa-bar-chart-o"></i>
                        <span class="menu-text">
                            Tra Cứu - Thống Kê
                        </span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu can-scroll">
                        <li class="hover">
                            <a href="/Student/Semesters">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Điểm Rèn Luyện
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="hover">
                            <a href="/Student/StudyResult">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Kết Qủa Học Tập
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="hover">
                            <a href="/Student/TrainingProgram">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Chương Trình Đào Tạo
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="main-content">
            <div class="main-content-inner">
                <div class="page-content">
                   <?php $this->load->view($subview) ?>
                </div>
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
    <script src="http://aspnet.demo.hueuni.edu.vn/StudentManager/Themes/ace-master/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript">
        if ('ontouchstart' in document.documentElement) document.write("<script src='~/Themes/ace-master/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
    </script>
    <script src="http://aspnet.demo.hueuni.edu.vn/StudentManager/Themes/ace-master/js/bootstrap.min.js"></script>
    <script src="http://aspnet.demo.hueuni.edu.vn/StudentManager/Themes/ace-master/js/ace-elements.min.js"></script>
    <script src="http://aspnet.demo.hueuni.edu.vn/StudentManager/Themes/ace-master/js/ace.min.js"></script>
    <script src="http://aspnet.demo.hueuni.edu.vn/StudentManager/Themes/ace-master/js/bootstrap-datepicker.min.js"></script>
    <script src="http://aspnet.demo.hueuni.edu.vn/StudentManager/Themes/ace-master/js/bootstrap-timepicker.min.js"></script>
    <script src="http://aspnet.demo.hueuni.edu.vn/StudentManager/Themes/ace-master/js/chosen.jquery.min.js"></script>
    <script src="http://aspnet.demo.hueuni.edu.vn/StudentManager/Themes/ace-master/js/select2.min.js"></script>
    <script src="http://aspnet.demo.hueuni.edu.vn/StudentManager/Scripts/site.js"></script>
    <script type="text/javascript" src="http://aspnet.demo.hueuni.edu.vn/StudentManager/Scripts/site.js"></script>
</body>
</html>