<?php include_once ('dependencies/top_resources.php');?>   

<!-- BEGIN ROW -->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN CHART PORTLET-->
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase font-green-haze">SUM OF ALL EVENT DATA</span>
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
var chart = AmCharts.makeChart( "chartdiv", {
  "type": "pie",
  "theme": "light",
  "dataProvider": 
  <?php require_once 'data.php';
$year=null;
$month=null;
$region=null;
$city=null;
$incident=null;
$barangay=null;
$uploadedBy=null;
$uploadDate=null;
sumed($year, $month, $region, $city, $incident, $barangay, $uploadedBy, $uploadDate);?>,

  "valueField": "num_of_deaths",
  "titleField": "incident",
  "outlineAlpha": 0.4,
  "depth3D": 15,
  "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
  "angle": 30,
  "export": {
    "enabled": true
  }
} );</script>
