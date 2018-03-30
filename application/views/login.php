<!doctype html>
<html>

<!-- Mirrored from www.lab.westilian.com/matmix-admin/list-view/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Mar 2018 11:47:28 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="A Components Mix Bootstarp 3 Admin Dashboard Template">
<meta name="author" content="Westilian">
<title>Login</title>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/waves.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/layout.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/components.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/plugins.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/common-styles.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/pages.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/responsive.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/matmix-iconfont.css" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Roboto:400,300,400italic,500,500italic" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" type="text/css">
</head>
<body class="login-page">
    <div class="page-container">
        <div class="login-branding">
            
        </div>
        <div class="login-container">
            <img class="login-img-card" src="images/avatar/jaman-01.jpg" alt="Silahka Login" /><br>
            <?php echo $this->session->flashdata('pesan');?>
            <form action="<?php echo base_url(); ?>/auth/login/" method="post" class="form-signin">
            
                <input type="text" name="username" class="form-control floatlabel " placeholder="Username" required autofocus>
                <input type="password" name="password" class="form-control floatlabel " placeholder="Password" required>
                <?php echo $image;?>
                <input type="text" name="capt" class="form-control floatlabel " placeholder="Enter Captcha" required >
                <button class="btn btn-primary btn-block btn-signin" type="submit" name="submit">Sign In</button>
            </form>

            
        </div>
        <br>
        <div class="login-container">
            <table class="table">
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Level</th>
                </tr>
                <tr>
                    <td>admin</td>
                    <td>admin</td>
                    <td>admin</td>
                </tr>
                <tr>
                    <td>user</td>
                    <td>user</td>
                    <td>user</td>
                </tr>
            </table>
        </div>
        <div class="login-footer">
            Arif Kurniawan

        </div>

    </div>
    <script src="<?php echo base_url();?>assets/js/jquery-1.11.2.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jRespond.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/nav-accordion.js"></script>
    <script src="<?php echo base_url();?>assets/js/hoverintent.js"></script>
    <script src="<?php echo base_url();?>assets/js/waves.js"></script>
    <script src="<?php echo base_url();?>assets/js/switchery.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.loadmask.js"></script>
    <script src="<?php echo base_url();?>assets/js/icheck.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootbox.js"></script>
    <script src="<?php echo base_url();?>assets/js/animation.js"></script>
    <script src="<?php echo base_url();?>assets/js/colorpicker.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url();?>assets/js/floatlabels.js"></script>

    <script src="<?php echo base_url();?>assets/js/smart-resize.js"></script>
    <script src="<?php echo base_url();?>assets/js/layout.init.js"></script>
    <script src="<?php echo base_url();?>assets/js/matmix.init.js"></script>
    <script src="<?php echo base_url();?>assets/js/retina.min.js"></script>
</body>


<!-- Mirrored from www.lab.westilian.com/matmix-admin/list-view/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Mar 2018 11:47:29 GMT -->
</html>