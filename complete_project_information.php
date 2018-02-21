
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php include_once ('controller/c_complete_project_information.php'); ?>  
    <head>
        <?php
        include_once ('dependencies/top_resources.php');

        if (count($_FILES) > 0) {
            if (isset($_FILES['userImage'])) {
                if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
                    $data = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
                    $filename = $_FILES['userImage']['name'];
                    $fileproperties = $_FILES['userImage']['type'];
                    $projectid = $_POST['projectid'];

                    $view_result = submit_project_data($projectid, $filename, $fileproperties, $data);
                }
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
                                        <h1>Complete Project Information</h1>
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
                                            <span>Administrative</span>
                                            <i class="fa fa-circle"></i>
                                        </li>
                                        <li>
                                            <span>Complete Project Information</span>
                                        </li>
                                    </ul>
                                    <!-- END PAGE BREADCRUMBS -->
                                    <!----BODY--->


                                    <div class="page-content-inner">
                                        <!----BODY--->
                                        <div class="row">
                                            <div class="col-md-14">
                                                <div class="portlet light">
                                                    <div class="portlet-title">
                                                        <div class="caption caption-md">
                                                            <i class="icon-bar-chart font-dark hide"></i>
                                                            <span class="caption-subject font-green-steel uppercase bold">Initial Project Information</span>
                                                        </div>
                                                    </div>

                                                    <?php
                                                    $user = $_SESSION['userid'];

                                                    $query_result = select_project_byuser($user);
                                                    if ($query_result != FALSE) {
                                                        foreach ($query_result as $arr_result) {

                                                            $projID = $arr_result['projectID'];
                                                        }
                                                    }

                                                    $query_result1 = select_a_project($projID);
                                                    if ($query_result1 != FALSE) {
                                                        foreach ($query_result1 as $project) {

                                                            $id = $project['projectID'];
                                                            $name = $project['name'];
                                                            $description = $project['description'];
                                                            $startdate = $project['startdate'];
                                                            $enddate = $project['enddate'];
                                                        }
                                                    }
                                                    ?>

                                                    <div class="portlet-body">
                                                        <div class="row list-separated">
                                                            <div class="col-md-6">
                                                                <h5>Project Name: </h5>
                                                                <h4><?php echo $name; ?> </h4><br>
                                                                <h5>Project Description: </h5>
                                                                <h4><?php echo $description; ?> </h4><br> 
                                                            </div>
                                                            <div class="col-md-6">

                                                                <h5>Start date: </h5>
                                                                <h4><?php echo $startdate; ?> </h4><br>
                                                                <h5>End date: </h5>
                                                                <h4><?php echo $enddate; ?> </h4><br>                                   
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <ul class="list-separated list-inline-xs hide">

                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="page-content-inner">
                                        <!----BODY--->
                                        <div class="row">
                                            <div class="col-md-14">
                                                <div class="portlet light">
                                                    <div class="portlet-title">
                                                        <div class="caption caption-md">
                                                            <i class="icon-bar-chart font-dark hide"></i>
                                                            <span class="caption-subject font-green-steel uppercase bold">ADDITIONAL PROJECT INFORMATION</span>
                                                        </div>
                                                    </div>

                                                    <div class="portlet-body">
                                                        <div class="row list-separated">

                                                            <div class="col-md-12">
                                                                <form class="col-md-10" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="frmImage" enctype="multipart/form-data" >
                                                                  
                                                                    <label><b>Upload a Document:</b></label><br/>
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
                                                                                        <input type="file" name="userImage"> </span>

                                                                                    <input type="hidden" name="projectid" value="<?php echo $id; ?>">
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
      
                                                                <br>
                                                                <br>
                                                                <br>

                                                            </div>

<br>
                                                            <div class="col-md-12">

     <label><b>Files Uploaded in the System:</b></label><br/>
                                                               
                                                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                                    <thead>
                                                                        <tr>
                                                                            <th width="10%">File Name</th>
                                                                            <th width="10%">Download</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tfoot>
                                                                        <tr>
                                                                        </tr>
                                                                    </tfoot>
                                                                    <tbody>

                                                                        <?php
                                                                        $query_result = generateprojectdata($id);

                                                                        if ($query_result != FALSE) {
                                                                            foreach ($query_result as $user) {

                                                                                $filetype = $user['fileType'];
                                                                                $filename = $user['fileName'];
                                                                                $fileData = $user['fileData'];

                                                                                echo' 
                                          <tr>
                                          <td align="left">' . $filename . '</td>
                                          <td align="center"><a href="data:' . $filetype . ';base64,' . base64_encode($fileData) . '" class="btn btn-info" role="button" src="" download>DOWNLOAD FILE</a></td>';
                                                                            }
                                                                        }
                                                                        ?>


                                                                        </tr>

                                                                    </tbody>
                                                                </table>




                                                            </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                    <ul class="list-separated list-inline-xs hide">

                                                    </ul>

                                                </div>

                                            </div>
                                        </div




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
</body>

</html>