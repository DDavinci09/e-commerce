<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Form Login</h1>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Login Box Area =================-->
<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="<?= base_url('assets/'); ?>/home/img/login.jpg" alt="">
                    <div class="hover">
                        <h4>New to our website?</h4>
                        <a class="primary-btn" href="registration.html">Create an Account</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                    <div class="col-md-12 form-group">
                        <button type="submit" value="submit" class="primary-btn" data-toggle="modal"
                            data-target="#Login">Log In Alumni</button>
                    </div>
                    <div class="col-md-12 form-group">
                        <button type="submit" value="submit" class="primary-btn" data-toggle="modal"
                            data-target="#Login">Log In User</button>
                    </div>
                    <div class="col-md-12 form-group">
                        <button type="submit" value="submit" class="primary-btn" data-toggle="modal"
                            data-target="#Login">Log In Admin</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->



<!-- Modal -->
<div class="modal fade" id="Login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm-9">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Form Login</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form class="row login_form" action="" method="POST" id="contactForm" novalidate="novalidate">
                    <div class="col-md-12 form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Username"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
                    </div>
                    <div class="col-md-12 form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Password"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                    </div>
                    <div class="col-md-12 form-group">
                        <button type="submit" value="submit" class="primary-btn">Log In</button>
                        <a href="#">Forgot Password?</a>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End Modal -->