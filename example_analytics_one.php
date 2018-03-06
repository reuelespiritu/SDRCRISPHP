<?php include_once ('dependencies/top_resources.php');?>   

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
 sumhd($year, $month, $region, $city, $disease, $uploadedBy, $uploadDate);
?>;


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