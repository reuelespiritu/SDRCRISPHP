
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
                                        <h1>Sum Of All Health Data</h1>
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
                                            <a href="">Analytics</a>
                                            <i class="fa fa-circle"></i>
                                        </li>
                                        <li>
                                            <span>Sum Of All Health Data</span>
                                        </li>
                                    </ul>
                                    <!-- END PAGE BREADCRUMBS -->
                                    <!-- BEGIN PAGE CONTENT INNER -->
                                    <div class="page-content-inner">
                                        				
                                    </div>
                                    <!-- BEGIN ROW -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- BEGIN CHART PORTLET-->
                                            <div class="portlet light ">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <span class="caption-subject bold uppercase font-green-haze">SUM OF ALL HEALTH DATA</span>
                                                    </div>
                                                    <div class="tools">
                                                        <a href="javascript:;" class="collapse"> </a>
                                                        <a href="javascript:;" class="fullscreen"> </a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <div id="chartdiv" style="width:100%;height:500px"></div>
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
        <!--[if lt IE 9]>
        <script src="assets/global/plugins/respond.min.js"></script>
        <script src="assets/global/plugins/excanvas.min.js"></script> 
        <script src="assets/global/plugins/ie8.fix.min.js"></script> 
        <![endif]-->  
        <?php include_once ('dependencies/bottom_resources.php');?> 
        
<script>
var chartData = <?php require_once 'data.php';
$year=null;
$month=null;
$region=null;
$city=null;
$disease=null;
$uploadedBy=null;
$uploadDate=null;
sumhd($year, $month, $region, $city, $disease, $uploadedBy, $uploadDate);?>;


var chart = AmCharts.makeChart( "chartdiv", {
  "theme": "light",
  "type": "serial",
  "dataProvider": chartData,
  "categoryField": "disease",
  "depth3D": 20,
  "angle": 30,

  "categoryAxis": {
    "labelRotation": 90,
    "gridPosition": "start"
  },

  "valueAxes": [ {
    "title": "Diseases"
  } ],

  "graphs": [ {
    "valueField": "infected",
    "colorField": "color",
    "type": "column",
    "lineAlpha": 0.1,
    "fillAlphas": 1
  } ],

  "chartCursor": {
    "cursorAlpha": 0,
    "zoomable": false,
    "categoryBalloonEnabled": false
  },

  "export": {
    "enabled": true
  }
} );</script>
    </body>

</html>