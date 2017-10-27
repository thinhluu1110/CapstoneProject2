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
                        <strong>FES_System</strong>
                    </small>
                </a>
            </div>
            <div class="navbar-buttons navbar-header pull-right" role="navigation">
                <ul class="nav ace-nav">
                    <li class="light-blue dropdown-modal">
                        <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                            <img class="nav-user-photo" src="http://ums-testing.hueuni.edu.vsn/teacher/Auth/GetTeacherPhoto/DHT0220/" alt="">
                            <span class="user-info">
                            </span>

                            <i class="ace-icon fa fa-caret-down"></i>
                        </a>
                        <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                            <li class="divider"></li>
                            <li>
                                <a href="http://localhost/HBDT/sinhvien/login" onclick="return confirm('Bạn muốn thoát khỏi ứng dụng?');">
                                    <i class="ace-icon fa fa-power-off"></i>
                                    Đăng xuất
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