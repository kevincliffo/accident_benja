<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Accident Reporting System - Register</title>
        <!-- Custom fonts for this template-->
        <link href="<?php echo base_url(); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="<?php echo base_url(); ?>css/sb-admin-2.min.css" rel="stylesheet">
    </head>
    <body class="bg-gradient-primary">
        <div class="container">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                </div>
                                <?php
                                    echo form_open('main/registeruser','class="user"');
                                ?>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="firstname" name="firstname" placeholder="First Name" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="lastname" name="lastname" placeholder="Last Name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control form-control-user" id="mobile" name="mobile" placeholder="Mobile Number" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="repeatPassword" name="repeatPassword" placeholder="Repeat Password" required>
                                    </div>
                                </div>
                                <?php
                                    $btn = array('class' => 'btn btn-primary btn-user btn-block',
                                        'value' => 'Register Account',
                                        'name' => 'submit',
                                        'type' => 'submit');
                                    echo form_submit($btn);
                                    echo form_close();
                                ?>
                                <hr>
                                <div class="text-center">
                                    <?php echo anchor('main', 'Already have an account? Login!', 'class="small"'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="<?php echo base_url(); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="<?php echo base_url(); ?>js/sb-admin-2.min.js"></script>
    </body>
</html>
