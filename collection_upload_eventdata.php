
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php include_once ('controller/c_collection_upload_eventdata.php'); ?>  
    <head>
        <?php
        include_once ('dependencies/top_resources.php');
      if (isset($_FILES['fileupload']) ) {
            $imgData = $_FILES['fileupload'];
       
            if ($_FILES['fileupload']['name'] == "EVENT_DATA.csv"){$view_result = submit_eventdata_area($_SESSION['project'], $imgData, $_SESSION['userid']);
            }
else{                    echo "<script type='text/javascript'>alert('Please upload the standard file!');</script>";}

            
            }
        ?>
    </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            <div class="page-wrapper-row">
                <div class="page-wrapper-top">
                    <!-- BEGIN HEADER -->
                    <?php include_once ('functions/header.php'); ?> 
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
                                        <h1>Event Data Per Area</h1>
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
                                            <span>Data Collection</span>
                                            <i class="fa fa-circle"></i>
                                        </li>
                                        <li>
                                            <span>Event Data Per Area</span>
                                        </li>
                                    </ul>
                                    <!-- END PAGE BREADCRUMBS -->
                                    <div class="page-content-inner">
                                        <!-- BEGIN PAGE CONTENT INNER -->
                                        <div class="page-content-inner">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-15">
                                                    <div class="portlet light ">
                                                        <div class="portlet-title">
                                                            <div class="caption caption-md">
                                                                <i class="icon-bar-chart font-dark hide"></i>
                                                                <span class="caption-subject font-green-steel uppercase bold">UPLOAD EVENT DATA PER AREA</span>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <div class="row list-separated">
                                                                <form class="col-md-10" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail">Year</label>
                                                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Year" name="year" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="single" class="control-label">Region</label>
                                                                        <select id="single" class="form-control select2" name="region">
                                                                            <option value="NCR">National Capital Region (NCR)</option>
                                                                            <option value="RegionI">Ilocos Region (Region I)</option>
                                                                            <option value="CAR">Cordillera Administrative Region (CAR)</option>
                                                                            <option value="RegionII">Cagayan Valley (Region II)</option>
                                                                            <option value="RegionIII">Central Luzon (Region III)</option>
                                                                            <option value="RegionIVA">CALABARZON (Region IV-A)</option>
                                                                            <option value="MIMAROPA">Southwestern Taglog Region (MIMAROPA)</option>
                                                                            <option value="RegionV">Bicol Region (Region V)</option>
                                                                            <option value="RegionVI">Western Visayas (Region VI)</option>
                                                                            <option value="RegionVII">Central Visayas (Region VII)</option>
                                                                            <option value="RegionVIII">Eastern Visayas (Region VIII)</option>
                                                                            <option value="RegionIX">Zamboanga Peninsula (Region IX)</option>
                                                                            <option value="RegionX">Nothern Mindanao (Region X)</option>
                                                                            <option value="RegionXI">Davao Region (Region XI)</option>
                                                                            <option value="RegionXII">SOCCSKSARGEN (Region XII)</option>
                                                                            <option value="RegionXIII">Caraga Region (Region XIII)</option>
                                                                            <option value="ARMM">Autonomous Region in Muslim Mindanao (ARMM)</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail">City</label>
                                                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="City" name="city" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail">Barangay</label>
                                                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Barangay" name="barangay" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail">Municipality</label>
                                                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Municipality" name="municipality" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail">Region</label>
                                                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Region" name="region" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="single" class="control-label">Incident</label>
                                                                        <select id="single" class="form-control select2" name="incident" >
                                                                            <optgroup label="Environment">
                                                                                <option value="Flashflooding">Flashflooding/Flooding Incident</option>
                                                                                <option value="Landslide">Landslide</option>
                                                                            </optgroup>
                                                                            <optgroup label="Climate">
                                                                                <option value="Continuous Rain">Continuous Rain</option>
                                                                                <option value="Drought">Drought</option>
                                                                            </optgroup>
                                                                            <optgroup label="Seismic">
                                                                                <option value="Earthquake">Earthquake</option>
                                                                                <option value="Volcanic">Volcanic Activity</option>
                                                                                <option value="Collapsed Structure">Collapsed Structure</option>
                                                                            </optgroup>
                                                                            <optgroup label="Human Activities">
                                                                                <option value="Armed Conflict">Armed Conflict</option>
                                                                            </optgroup>
                                                                        </select>
                                                                    </div>
                                                                  
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail">No. of Deaths</label>
                                                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="numofdeaths" placeholder="No. of Deaths" required>
                                                                    </div>

                                                                    <div class="pull-left">
                                                                        <input type="submit" class="btn btn-info" value="Upload Event Data per Region">
                                                                    </div>
                                                                    <ul class="list-separated list-inline-xs hide">

                                                                    </ul>
                                                                </form>
                                                            </div>							
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-15">
                                                    <div class="portlet light ">
                                                        <div class="portlet-title">
                                                            <div class="caption caption-md">
                                                                <i class="icon-bar-chart font-dark hide"></i>
                                                                <span class="caption-subject font-green-steel uppercase bold">UPLOAD EVENT DATA PER REGION CSV FILE</span>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <div class="row list-separated">
                                                                <form class="col-md-10" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="frmImage" enctype="multipart/form-data" >
                                                                    <div class="form-group" style="padding-bottom:40px;">
                                                                        <div class="col-md-3">
                                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                                <div class="input-group input-large">
                                                                                    <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                                                        <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                                                        <span class="fileinput-filename"> </span>
                                                                                    </div>
                                                                                    <span class="input-group-addon btn default btn-file">
                                                                                        <span class="fileinput-new"> Select file </span>
                                                                                        <span class="fileinput-exists"> Change </span>
                                                                                        <input type="file" name="fileupload"> </span>
                                                                                    <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="pull-left" style="padding-left: 15px;">
                                                                        <input type="submit" class="btn btn-info" value="Submit">
                                                                    </div>
                                                                    <ul class="list-separated list-inline-xs hide">

                                                                    </ul>
                                                                </form>
                                                            </div>              
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                <?php include_once ('functions/footer.php'); ?>   
                <!-- END FOOTER -->
            </div>
        </div>
    </div>
    <!--[if lt IE 9]>
    <script src="assets/global/plugins/respond.min.js"></script>
    <script src="assets/global/plugins/excanvas.min.js"></script> 
    <script src="assets/global/plugins/ie8.fix.min.js"></script> 
    <![endif]-->
    <?php include_once ('dependencies/bottom_resources.php'); ?>   
    <script>$(document).ready(function () {
            $('.js-example-basic-single').select2();
        });</script>
</body>

</html>