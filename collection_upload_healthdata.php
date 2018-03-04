
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php include_once ('controller/c_collection_upload_healthdata.php'); ?>  
    <head>
        <?php
        include_once ('dependencies/top_resources.php');
        if (isset($_FILES['fileupload'])) {
            $imgData = $_FILES['fileupload'];

            if ($_FILES['fileupload']['name'] == "HEALTH_DATA.csv") {
                $view_result = submit_healthdata($_SESSION['project'], $imgData, $_SESSION['userid']);

                if(isset($view_result)||is_array($view_result)){
                    $errorarray=$view_result;
                    
                }
            } else {
                echo "<script type='text/javascript'>alert('Please upload the standard file!');</script>";
            }
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
                                        <h1>Health Data</h1>
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
                                            <span>Health Data</span>
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
                                                                <span class="caption-subject font-green-steel uppercase bold">UPLOAD HEALTH DATA</span>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <div class="row list-separated">
                                                                <form class="col-md-10" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail">Year</label>
                                                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Year" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail">Month</label>
                                                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Month" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="single" class="control-label">Region</label>
                                                                        <select id="single" class="form-control select2">
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
                                                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="City" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Number of Incidents</label>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">AW Diarrhea</label>
                                                                            <div class="col-md-7">
                                                                                <input type="number" class="form-control" placeholder="AW Diarrhea" name="AWdiarrhea"> 
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">AB Diarrhea</label>
                                                                            <div class="col-md-7">
                                                                                <input type="number" class="form-control" placeholder="AB Diarrhea" name="ABdiarrhea"> 
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Hepatitis</label>
                                                                            <div class="col-md-7">
                                                                                <input type="number" class="form-control" placeholder="Hepatitis" name="hepatitis"> 
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Typhoid Fever</label>
                                                                            <div class="col-md-7">
                                                                                <input type="number" class="form-control" placeholder="Typhoid Paratyphoid Fever" name="typhoidparatyphoidFever"> 
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Cholera</label>
                                                                            <div class="col-md-7">
                                                                                <input type="number" class="form-control" placeholder="Cholera" name="cholera"> 
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Malaria</label>
                                                                            <div class="col-md-7">
                                                                                <input type="number" class="form-control" placeholder="Malaria" name="malaria"> 
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Leptospirosis</label>
                                                                            <div class="col-md-7">
                                                                                <input type="number" class="form-control" placeholder="Leptospirosis" name="leptospirosis"> 
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Tetanus</label>
                                                                            <div class="col-md-7">
                                                                                <input type="number" class="form-control" placeholder="Tetanus" name="tetanus"> 
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Pneumonia</label>
                                                                            <div class="col-md-7">
                                                                                <input type="number" class="form-control" placeholder="Pneumonia" name="pneumonia"> 
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Bronchitis</label>
                                                                            <div class="col-md-7">
                                                                                <input type="number" class="form-control" placeholder="Bronchitis" name="bronchitis"> 
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Influenza</label>
                                                                            <div class="col-md-7">
                                                                                <input type="number" class="form-control" placeholder="Influenza" name="influenza"> 
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">TB Respiratory</label>
                                                                            <div class="col-md-7">
                                                                                <input type="number" class="form-control" placeholder="TB Respiratory" name="TBrespiratory"> 
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Chickenpox</label>
                                                                            <div class="col-md-7">
                                                                                <input type="number" class="form-control" placeholder="Chickenpox" name="chickenpox"> 
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Dengue Fever</label>
                                                                            <div class="col-md-7">
                                                                                <input type="number" class="form-control" placeholder="Dengue Fever" name="dengueFever"> 
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Dengue Fever</label>
                                                                            <div class="col-md-7">
                                                                                <input type="number" class="form-control" placeholder="Dengue Fever" name="dengueFever"> 
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Measles</label>
                                                                            <div class="col-md-7">
                                                                                <input type="number" class="form-control" placeholder="Measles" name="measles"> 
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Hypertension</label>
                                                                            <div class="col-md-7">
                                                                                <input type="number" class="form-control" placeholder="Hypertension" name="hypertension"> 
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Diseases of the Heart</label>
                                                                            <div class="col-md-7">
                                                                                <input type="number" class="form-control" placeholder="Diseases of the Heart" name="diseasesOfTheHeart"> 
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Respiratory Infection</label>
                                                                            <div class="col-md-7">
                                                                                <input type="number" class="form-control" placeholder="Respiratory Infection" name="respiratoryInfection"> 
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-5 control-label">Diabetes</label>
                                                                            <div class="col-md-7">
                                                                                <input type="number" class="form-control" placeholder="Diabetes" name="diabetes"> 
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="pull-left" style="padding-top: 20px;">
                                                                        <button type="submit" class="btn btn-info">Upload Health Data per Region</button>
                                                                    </div>
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
                                                                <span class="caption-subject font-green-steel uppercase bold">UPLOAD HEALTH DATA CSV FILE</span>
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
                                                                        <button type="submit" class="btn btn-info">Submit</button>
                                                                    </div>
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
                             
                        <div style="display: none;" class="btn btn-default mt-sweetalert" data-title="Health Data Uploaded" data-message="The information you have entered has been successfully saved" data-allow-outside-click="true" data-confirm-button-class="btn-default" id ="confirm">Default Alert</div>
                        <div style="display: none;" class="btn btn-default mt-sweetalert" data-title="Error on Upload" data-message="
                            <?php 
                             
                             if (isset($errorarray)){
                                 
                                     $x=0;
                                     $rowreccurence=array_count_values($errorarray);
                                     $keysofrowrecurrence= array_keys($rowreccurence);
                              $message=array();
                                 foreach ($rowreccurence as $arr){
                                     $row=$keysofrowrecurrence[$x];
                                     $rowcomputed=$row+1;
                                       $msg="There is/are $rowreccurence[$row] errors on row $rowcomputed | ";
                              echo $msg;
                                     array_push($message, $msg);
                                          $x++;
                                 }
                             }?>" data-allow-outside-click="true" data-confirm-button-class="btn-default" id ="error">Default Alert</div>
                        <div style="display: none;" class="btn btn-default mt-sweetalert" data-title="Budget Catetgory Update" data-message="The information you have entered has been successfully saved" data-allow-outside-click="true" data-confirm-button-class="btn-default" id ="update">Default Alert</div>

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
       <script>
        <?php
        if (isset($view_result) && $view_result == 1) {
            echo'$(document).ready(function(){ 
                       document.getElementById("confirm").click();
        });';
        } else if (isset($errorarray)) {
            echo'$(document).ready(function(){ 
                       document.getElementById("error").click();
        });';
        } else if (isset($view_result) && $view_result == 3) {
            echo'$(document).ready(function(){ 
                       document.getElementById("update").click();
        });';
        }
        ?>
        </script>
</body>

</html>