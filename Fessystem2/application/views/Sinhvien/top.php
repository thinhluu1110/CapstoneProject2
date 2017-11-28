<div class="navbar-container" id="navbar-container">
    <button class="pull-right navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#sidebar">
        <span class="sr-only">#</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <div class="navbar-header pull-left">
        <a href="Index.html" class="navbar-brand">
            <small>
                <i class="fa fa-university""></i>
                <strong>Học Bạ Điện Tử</strong>
            </small>
        </a>
    </div>
    <div class="navbar-buttons navbar-header pull-right" role="navigation">
        <ul class="nav ace-nav">
            <li class="light-blue dropdown-modal">
                <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                    <span class="user-info">
                        Xin chào <small><?php echo $this->session->userdata('ho').' '.$this->session->userdata('ten')?></small>
                    </span>
                    <i class="ace-icon fa fa-caret-down"></i>
                </a>
                <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                    <li>
                        <a href="">
                            <i class="ace-icon fa fa-cog"></i>Thay Đổi Mật Khẩu
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo base_url()."Login/Logout" ?>" onclick="return confirm('Bạn muốn thoát khỏi ứng dụng?');">
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
