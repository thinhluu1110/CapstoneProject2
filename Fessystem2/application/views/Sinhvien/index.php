<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view('Sinhvien/head'); ?>
        <title>Main</title>
    </head>

    <body class="no-skin" style="margin:0 !important;padding:0 !important">
        <div id="navbar" class="navbar navbar-default navbar-collapse h-navbar ace-save-state navbar-fixed-top">
            <?php $this->load->view('Sinhvien/top'); ?>
        </div>
        <div class="main-container ace-save-state" id="main-container">
            <?php if ($this->session->userdata('username')) {?>
            <div class="sidebar h-sidebar navbar-collapse collapse ace-save-state sidebar-fixed" id="sidebar" data-sidebar="true" data-sidebar-scroll="true" data-sidebar-hover="true">
                <?php $this->load->view('Sinhvien/menu'); ?>
            </div>
            <?php } ?>
            <!-- Content -->
            <div class="main-content">
                <?php $this->load->view($temp); ?>
            </div>
            <!-- End Content -->

            <div class="footer">
                <?php $this->load->view('Sinhvien/footer'); ?>
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
        
        <script src="<?php echo base_url(''); ?>public/js/jquery-3.2.1.min.js" charset="utf-8"></script>
  			<script src="<?php echo base_url(''); ?>public/js/bootstrap.min.js" charset="utf-8"></script>

    </body>
</html>
