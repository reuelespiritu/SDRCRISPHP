
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->


    <?php
    session_start();
    require_once ('controller/c_login.php');
    if (isset($_POST['email']) && isset($_POST['password'])) {

        $view_result = login($_POST['email'], $_POST['password']);
    } else if (isset($_POST['fn']) && isset($_POST['mn']) && isset($_POST['ln']) && isset($_POST['em']) && isset($_POST['p1']) && isset($_POST['p2']) && isset($_POST['spe'])) {

        $view_result = submit_userform($_POST['fn'], $_POST['mn'], $_POST['ln'], $_POST['em'], $_POST['p1'], $_POST['p2'], $_POST['spe'], $_POST['mas'], $_POST['doc']);
    }
    ?>
    <head>
        <meta charset="utf-8" />
        <title>SDRC-RIS: Login</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #3 for " name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="assets/global/css/components-md.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="assets/pages/css/login-2.css" rel="stylesheet" type="text/css" />
           <link href="assets/global/plugins/bootstrap-sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />

        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->     
        <div class="logo">
            <a>
                <img src="assets/pages/img/sdrc-logo.png" style="height: 220px;" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">      
            
            
            
            <div style="display: none;" class="btn btn-default mt-sweetalert" data-title="Login Failed" data-message="Please check your username or password" data-allow-outside-click="true" data-confirm-button-class="btn-default" id ="fail">Default Alert</div>
            <div style="display: none;" class="btn btn-default mt-sweetalert" data-title="Successfully Registered" data-message="Thank you for registering your information" data-allow-outside-click="true" data-confirm-button-class="btn-default" id ="registered">Default Alert</div>

            
            
            
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" action="<?php ($_SERVER["PHP_SELF"]) ?>" method="post">
                <div class="form-title">
                    <span class="form-title">Social Development Research Center</span>
                    <span class="form-subtitle">Research Information System</span>
                </div>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Please check your username. </span>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Email</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="email" autocomplete="off" placeholder="Email" name="email" /> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
                <div class="form-actions">            
                    <button type="submit" class="btn btn-block uppercase">Login</button>
                </div>
                <div class="form-actions">
                    <div class="pull-left">
                        <label class="rememberme mt-checkbox mt-checkbox-outline">
                            <input type="checkbox" name="remember" value="1" /> Remember me
                            <span></span>
                        </label>
                    </div>
                    <div class="pull-right forget-password-block">
                        <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
                    </div>
                </div>
                <hr>
                <div class="create-account">
                    <p>
                        <a href="javascript:;" class="btn-default btn" id="register-btn"><font color="white">Create an account</font></a>
                    </p>
                </div>
            </form>
            <!-- END LOGIN FORM -->
            <!-- BEGIN FORGOT PASSWORD FORM -->
            <form class="forget-form" action="<?php ($_SERVER["PHP_SELF"]) ?>" method="post">
                <div class="form-title">
                    <span class="form-title">Forgot your password ?</span><br>
                    <span class="form-subtitle"> Please contact your system admin</span>
                    <div class="form-actions">
                        <button type="button" id="back-btn" class="btn btn-default">Back</button>
                    </div>
                </div>
            </form>
            <!-- END FORGOT PASSWORD FORM -->
            <!-- BEGIN REGISTRATION FORM -->
            <form class="register-form" action="<?php ($_SERVER["PHP_SELF"]) ?>" method="post">
                <div class="form-title">
                    <span class="form-title">Sign Up</span>
                </div>
                <p class="form-subtitle"> Enter your personal details below: </p>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">First Name</label>
                    <input class="form-control placeholder-no-fix" type="text" placeholder="First Name" name="fn" required/> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Middle Name</label>
                    <input class="form-control placeholder-no-fix" type="text" placeholder="Middle Name" name="mn" required/> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Last Name</label>
                    <input class="form-control placeholder-no-fix" type="text" placeholder="Last Name" name="ln" required/> </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Email</label>
                    <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="em" required/> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="p1" required/> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="p2" required/> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Expertise</label>
                    <input class="form-control placeholder-no-fix" type="text" placeholder="Specialization" name="spe" /> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Master's Degree</label>
                    <input class="form-control placeholder-no-fix" type="text" placeholder="Master's Degree" name="mas" /> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Doctorate Degree</label>
                    <input class="form-control placeholder-no-fix" type="text" placeholder="Doctorate Degree" name="doc" /> </div>
                <div class="form-group margin-top-20 margin-bottom-20">
                    <label class="mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="tnc" /> I agree that the information I have submitted is accurate and legitimate.
                        <span></span>
                    </label>
                    <div id="register_tnc_error"> </div>
                </div>
                <div class="form-actions">
                    <button type="button" id="register-back-btn" class="btn btn-default">Back</button>
                    <button type="submit" id="register-submit-btn" class="btn uppercase pull-right">Submit</button>
                </div>
            </form>
            <!-- END REGISTRATION FORM -->        
        </div>
        <div class="copyright hide"> 2014 © Metronic. Admin Dashboard Template. </div>
        <!-- END LOGIN -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<script src="../assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/pages/scripts/login.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS --><script src="assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js" type="text/javascript"></script>

<script src="assets/pages/scripts/ui-sweetalert.js" type="text/javascript"></script>


<script src="assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>

<script src="assets/pages/scripts/ui-bootbox.min.js" type="text/javascript"></script>        
<script src="assets/pages/scripts/ui-bootbox.js" type="text/javascript"></script>

        <!-- END THEME LAYOUT SCRIPTS -->
     
        <script>
        
<?php
if(isset($view_result)&&$view_result==FALSE)
echo'$(document).ready(function(){ 
                document.getElementById("fail").click();
            });';

else if(isset($view_result)&&$view_result=="REGISTERED")
echo'$(document).ready(function(){ 
                document.getElementById("registered").click();
            });';


?></script>
    </body>

</html>