<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Login | Minible - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?= base_url() ?>/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?= base_url() ?>/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg" style="background-image: url(<?= base_url('assets/spbu-2.jpg') ?>); 
background-size: cover; max-height: 100vh !important;">
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <a href="index.html" class="mb-5 d-block auth-logo">
                                <img src="<?= base_url() ?>/assets/logo.png" alt="" width="300px"  class="logo">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                           
                            <div class="card-body p-4"> 
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p class="text-muted">Sign in to continue to QQMS PT. Pertamina</p>
				<?= $this->session->flashdata('msg') ?>
                                </div>
                                <div class="p-2 mt-4">
                                    <?= form_open('login') ?>
        
                                        <div class="mb-3">
                                            <label class="form-label" for="username">Email</label>
                                            <input type="email" class="form-control" id="username" placeholder="Enter username" name="email">
                                        </div>
                
                                        <div class="mb-3">
                                            <label class="form-label" for="userpassword">Password</label>
                                            <input type="password" class="form-control" id="userpassword" placeholder="Enter password" name="password">
                                        </div>
                
                                        <div class="mt-3 text-end">
                                            <input type="submit" name="login" value="Log In" class="btn btn-primary w-sm waves-effect waves-light">
                                        </div>

                                    <?= form_close() ?>
                                </div>
            
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>

        <!-- JAVASCRIPT -->
        <script src="<?= base_url() ?>/assets/libs/jquery/jquery.min.js"></script>
        <script src="<?= base_url() ?>/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url() ?>/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?= base_url() ?>/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?= base_url() ?>/assets/libs/node-waves/waves.min.js"></script>
        <script src="<?= base_url() ?>/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="<?= base_url() ?>/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

        <!-- App js -->
        <script src="<?= base_url() ?>/assets/js/app.js"></script>

    </body>
</html>
