
<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php include_once ('controller/c_dashboard.php'); ?>  
    <head>
         <?php include_once ('dependencies/top_resources.php');?>   
    </head>
    <!-- END HEAD -->
    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            <div class="page-wrapper-row">
                <div class="page-wrapper-top">
                    <!-- BEGIN HEADER -->
                     <?php include_once ('functions/header.php');?>   
                    <!-- END HEADER -->
                </div>
            </div>
            <div class="page-wrapper-row full-height">
                <div class="page-wrapper-middle">
                    <!-- BEGIN CONTAINER -->
                    <div class="page-container">
                        <!-- BEGIN CONTENT -->
                        <div class="page-content-wrapper">
                            <!-- BEGIN CONTENT BODY -->
                            <!-- BEGIN PAGE HEAD-->
                            <div class="page-head">
                                <div class="container">
                                    <!-- BEGIN PAGE TITLE -->
                                    <div class="page-title">
                                        <h1>Dashboard</h1>
                                    </div>
                                    <!-- END PAGE TITLE -->
                                    <!-- BEGIN PAGE TOOLBAR -->
                                    <div class="page-toolbar">

                                    </div>
                                    <!-- END PAGE TOOLBAR -->
                                </div>
                            </div>
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="page-content">
                                <div class="container">
                                    <!-- BEGIN PAGE BREADCRUMBS -->
                                    <ul class="page-breadcrumb breadcrumb">
                                        <li>
                                            <a href="">Home</a>
                                            <i class="fa fa-circle"></i>
                                        </li>
                                        <li>
                                            <span>Dashboard</span>
                                        </li>
                                    </ul>
                                    <!-- END PAGE BREADCRUMBS -->
                                    <!-- BEGIN PAGE CONTENT INNER -->
                                    <div class="page-content-inner">
                                        				
                                        </div>
                                        <!-- BEGIN ROW -->
                                     
                                        <!-- END ROW -->
                                        
                                        <!-- BEGIN ROW -->
                                        
<div id="chartdiv" style="width:100%;height:500px"></div>
                                        <!-- END ROW -->
                                    </div>
                                    <!-- END PAGE CONTENT INNER -->
                                </div>
                            </div>
                            <!-- END PAGE CONTENT BODY -->
                            <!-- END CONTENT BODY -->
                        </div>
                        <!-- END CONTENT -->
                        <!-- BEGIN QUICK SIDEBAR -->
                        <a href="javascript:;" class="page-quick-sidebar-toggler">
                            <i class="icon-login"></i>
                        </a>
                        <!-- END QUICK SIDEBAR -->
                    </div>
                    <!-- END CONTAINER -->
                </div>
            </div>
            <div class="page-wrapper-row">
                <div class="page-wrapper-bottom">
                    <!-- BEGIN FOOTER -->
                    <?php include_once ('functions/footer.php');?>   
                    <!-- END FOOTER -->
                </div>
            </div>
        </div>
        <!--[if lt IE 9]>
        <script src="assets/global/plugins/respond.min.js"></script>
        <script src="assets/global/plugins/excanvas.min.js"></script> 
        <script src="assets/global/plugins/ie8.fix.min.js"></script> 
        <![endif]-->  
        <?php include_once ('dependencies/bottom_resources.php');?> 
        
<script src="assets/apps/pen.js"></script>
    </body>

</html>