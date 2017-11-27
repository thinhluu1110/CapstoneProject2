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
                                                <form id="formUser" action="" method="post" action="<?php echo base_url().'Sinhvien/Login/index' ?>" role="form" style="display: block;">
                                                    <div class="form-group">
                                                        <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" style="border: 1px solid #ddd !important; border-radius: 3px !important; margin-bottom: 10px">
                                                        <p style="color: red" class="username"></p>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" style="border: 1px solid #ddd !important; border-radius: 3px !important;">
                                                        <p style="color: red" class="password"></p>
                                                    </div>
                                                    <div class="form-group" style="margin-top: 20px;">
                                                        <div class="row">
                                                            <div class="col-sm-6 col-sm-offset-3">
                                                                <input type="submit" name="login" id="login" tabindex="4" class="form-control btn btn-login" value="Log In">
                                                            </div>
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
