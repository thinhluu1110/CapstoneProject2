<div class="sidebar h-sidebar navbar-collapse collapse ace-save-state sidebar-fixed" id="sidebar" data-sidebar="true" data-sidebar-scroll="true" data-sidebar-hover="true" style="margin-top: 17px;">

            <div class="nav-wrap-up pos-rel"><div class="nav-wrap"><div style="position: relative; top: 0px; transition-property: top; transition-duration: 0.15s;"><div id="sidebar-shortcuts" class="sidebar-shortcuts">
                <div id="sidebar-shortcuts-mini" class="sidebar-shortcuts-mini">
                    <span class="btn btn-success"></span>
                    <span class="btn btn-info"></span>
                    <span class="btn btn-warning"></span>
                    <span class="btn btn-danger"></span>
                </div>
            </div><ul class="nav nav-list" style="top: 0px;">

                <li class="hover">
                    <a class="dropdown-toggle" href="#">
                        <i class="menu-icon fa fa-book"></i>
                        <span class="menu-text">
                            Hoạt Động Học Tập
                        </span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    <ul class="submenu can-scroll ace-scroll scroll-disabled" style="">
                        <li class="hover">
                            <a href="<?php echo base_url('sinhvien/tkb') ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Thời Khóa Biểu
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="hover">
                            <a href="<?php echo base_url('Sinhvien/lichthi') ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Lịch Thi Học Kì
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul><div class="scroll-track scroll-detached no-track scroll-thin scroll-margin scroll-visible" style="display: none; top: 68px; left: 183px;"><div class="scroll-bar" style="top: 0px;"></div></div>
                </li>
                <li class="">
                    <a class="" href="<?php echo base_url('Sinhvien/Hocphi/index/'.$this->session->userdata('id')); ?>">
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
                    <ul class="submenu can-scroll ace-scroll scroll-disabled" style="">
                        <li class="hover">
                            <a href="<?php echo base_url('Sinhvien/Diemrenluyen/index/'.$this->session->userdata('id')); ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Điểm Rèn Luyện
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="hover">
                            <a href="<?php echo base_url('Sinhvien/Ketquahoctap/index/'.$this->session->userdata('nganhhoc_id').'/'.$this->session->userdata('khoahoc_id').'/'.$this->session->userdata('id')); ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Kết Qủa Học Tập
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="hover">
                            <a href="<?php echo base_url('Sinhvien/Chuongtrinhdaotao/index/'.$this->session->userdata('nganhhoc_id').'/'.$this->session->userdata('khoahoc_id')); ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Chương Trình Đào Tạo
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="hover">
                            <a href="<?php echo base_url('Sinhvien/Kehoachdaotao/index/'); ?>">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Kế Hoạch Đào Tạo
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul><div class="scroll-track scroll-detached no-track scroll-thin scroll-margin scroll-visible" style="display: none; top: 68px; left: 183px;"><div class="scroll-bar" style="top: 0px;"></div></div>
                </li>
            </ul></div></div><div class="ace-scroll nav-scroll scroll-disabled"><div class="scroll-track" style="display: none;"><div class="scroll-bar" style="top: 0px; transition-property: top; transition-duration: 0.1s;"></div></div><div class="scroll-content" style=""><div></div></div></div></div>
        </div>
