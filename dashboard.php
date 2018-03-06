
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
                                        <div class="row widget-row">
                                            <div class="col-md-4">
                                                <!-- BEGIN WIDGET THUMB -->
                                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                                    <h4 class="widget-thumb-heading font-green-steel">Remaining Budget</h4>
                                                    <div class="widget-thumb-wrap">
                                                        <i class="widget-thumb-icon bg-green fa fa-balance-scale"></i>
                                                        <div class="widget-thumb-body">
                                                            <span class="widget-thumb-subtitle">PHP</span>
                                                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php $rem= generateremainingbudget(); echo $rem;?>">0</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END WIDGET THUMB -->
                                            </div>
                                            <div class="col-md-4">
                                                <!-- BEGIN WIDGET THUMB -->
                                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                                    <h4 class="widget-thumb-heading font-green-steel">Budget Used</h4>
                                                    <div class="widget-thumb-wrap">
                                                        <i class="widget-thumb-icon bg-red fa fa-shopping-cart"></i>
                                                        <div class="widget-thumb-body">
                                                            <span class="widget-thumb-subtitle">PHP</span>
                                                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php $exp= generatetotalexpense(); echo $exp;?>">0</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END WIDGET THUMB -->
                                            </div>
                                            <div class="col-md-4">
                                                <!-- BEGIN WIDGET THUMB -->
                                                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                                    <h4 class="widget-thumb-heading font-green-steel">Total Budget Allocated</h4>
                                                    <div class="widget-thumb-wrap">
                                                        <i class="widget-thumb-icon bg-purple fa fa-money"></i>
                                                        <div class="widget-thumb-body">
                                                            <span class="widget-thumb-subtitle">PHP</span>
                                                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php $budg=generatetotalbudget(); echo $budg;?>">0</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END WIDGET THUMB -->
                                            </div>
                                        </div>
                                        <div><?php include_once ('example_analytics_one.php');?> </div>
                                        <!-- BEGIN ROW -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- BEGIN CHART PORTLET-->
                                                <div class="portlet light ">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <span class="caption-subject bold uppercase font-green-haze">AFFECTED AREAS BASED FROM EXTREME EVENTS</span>
                                                            <span class="caption-helper">world population</span>
                                                        </div>
                                                        <div class="tools">
                                                            <a href="javascript:;" class="collapse"> </a>
                                                            <a href="javascript:;" class="fullscreen"> </a>
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div id="chart_10" class="chart" style="height: 600px;"> </div>
                                                    </div>
                                                </div>
                                                <!-- END CHART PORTLET-->
                                            </div>
                                        </div>
                                        <!-- END ROW -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- BEGIN CHART PORTLET-->
                                                <div class="portlet light bordered">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <span class="caption-subject bold uppercase font-green-haze">HEALTH RELATED INCIDENTS BASED FROM INFRASTRUCTURE DAMAGES DUE TO EXTREME EVENTS</span>
                                                        </div>
                                                        <div class="tools">
                                                            <a href="javascript:;" class="collapse"> </a>
                                                            <a href="javascript:;" class="fullscreen"> </a>
                                                        </div>  
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div id="chart_1" class="chart" style="height: 500px;"> </div>
                                                    </div>
                                                </div>
                                                <!-- END CHART PORTLET-->
                                            </div>
                                        </div>
                                        <!-- BEGIN ROW -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- BEGIN CHART PORTLET-->
                                                <div class="portlet light ">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <span class="caption-subject bold uppercase font-green-haze">ANNUAL REPORTED CALAMITIES PER AREA</span>
                                                        </div>
                                                        <div class="tools">
                                                            <a href="javascript:;" class="collapse"> </a>
                                                            <a href="javascript:;" class="fullscreen"> </a>
                                                        </div>  
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div id="chart_3" class="chart" style="height: 400px;"> </div>
                                                    </div>
                                                </div>
                                                <!-- END CHART PORTLET-->
                                            </div>
                                        </div>
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
    </body>

</html>