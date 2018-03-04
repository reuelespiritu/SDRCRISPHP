
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php include_once ('controller/c_collection_upload_healthinfrastructure.php'); ?>  
    <head>
        <?php
        include_once ('dependencies/top_resources.php');

        if (isset($_FILES['fileupload'])) {
            $imgData = $_FILES['fileupload'];

            if ($_FILES['fileupload']['name'] == "HEALTH_INFRASTRUCTURE_DAMAGE.csv") {
                $view_result = submit_health_infrastructure_damages($_SESSION['project'], $imgData, $_SESSION['userid']);
              echo $view_result;
                if (isset($view_result) || is_array($view_result)) {
                    $errorarray = $view_result;
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
                                            <h1>Health Infrastructure Damages</h1>
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
                                                <span>Health Infrastructure Damages</span>
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
                                                                    <span class="caption-subject font-green-steel uppercase bold">UPLOAD HEALTH INFRASTRUCTURE DAMAGES</span>
                                                                </div>
                                                            </div>
                                                            <div class="portlet-body">
                                                                <div class="row list-separated">
                                                                    <form class="col-md-10">
                                                                        <div class="form-group">
                                                                            <label for="single" class="control-label">Infrastructure Damages</label>
                                                                            <select id="single" class="form-control select2">
                                                                                <option value="Regional">Regional</option>
                                                                                <option value="Provincial">Provincial</option>
                                                                                <option value="Municipal">Municipal</option>
                                                                                <option value="Barangay">Barangay</option>
                                                                                <option value="Line/Birthing">Line/Birthing</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="single" class="control-label">Level of Hospital</label>
                                                                            <select id="single" class="form-control select2">
                                                                                <option value="Primary">Primary</option>
                                                                                <option value="Secondary">Secondary</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="single" class="control-label">Water System Damages</label>
                                                                            <select id="single" class="form-control select2">
                                                                                <option value="Sewage">Sewage System</option>
                                                                                <option value="Waste">Waste Management System</option>
                                                                                <option value="Water">Water System</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="pull-left">
                                                                            <button type="submit" class="btn btn-info">Upload Health Infrastructure Damages</button>
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
                                                                    <span class="caption-subject font-green-steel uppercase bold">UPLOAD HEALTH INFRASTRUCTURE DAMAGES CSV FILE</span>
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
                                                                        <div class="pull-left">
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