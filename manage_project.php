
<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php include_once ('controller/c_manage_project.php'); ?>   

    <head>
        <?php include_once ('dependencies/top_resources.php'); ?>   

        <?php
        if (isset($_POST['deactivate'])) {

            $view_result = delete_project($_POST['deactivate']);
        } else if (isset($_POST['update'])) {

            $_SESSION['updateid'] = $_POST['update'];
            header("Location: update_project.php");
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
                                        <h1>Manage Project</h1>
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
                                            <span>Manage Project</span>
                                        </li>
                                    </ul>
                                    <!-- END PAGE BREADCRUMBS -->
                                    <div class="page-content-inner">
                                        <!----BODY--->
                                        <div class="row">
                                            <div class="col-md-14">
                                                <div class="portlet light">
                                                    <div class="portlet-title">
                                                        <div class="caption caption-md">
                                                            <i class="icon-bar-chart font-dark hide"></i>
                                                            <span class="caption-subject font-green-steel uppercase bold">REGISTERED PROJECTS</span>
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="row list-separated">
                                                            <div class="table-responsive">
                                                                <form method="post" action="<?php ($_SERVER["PHP_SELF"]) ?>">
                                                                    <table class="table table-bordered table-striped table-hover" id="sample_2">
                                                                        <thead>
                                                                            <tr>
                                                                                <th width="20%">Name</th>
                                                                                <th width="50%">Description</th>
                                                                                <th width="10%">Start Date</th>
                                                                                <th width="10%">End Date</th>
                                                                                <th width="5%">Deactivate</th>    
                                                                                <th width="5%">Update</th> 
                                                                            </tr>
                                                                        </thead>
                                                                        <tfoot>
                                                                            <tr>
                                                                            </tr>
                                                                        </tfoot>
                                                                        <tbody>
                                                                            <?php
                                                                            $query_result = generate_all_projects();

                                                                            if ($query_result != FALSE) {
                                                                                foreach ($query_result as $project) {
                                                                                    echo' 
                                                                                    <tr>
                                                                                    <td>' . $project['name'] . '</td>
                                                                                    <td>' . $project['description'] . '</td>
                                                                                    <td>' . $project['startdate'] . '</td>
                                                                                    <td>' . $project['enddate'] . '</td>
                                                                                    <td align="center">  
                                                                                        <button name="deactivate" type="submit" class="btn btn-danger btn-md" value="' . $project['projectID'] . ' " onClick="alert(\'The project ' . $project['name'] . ' has been deleted from the system\')"  />
                                                                                        <span class="fa fa-remove"></span>
                                                                                    </td>  
                                                                                    <td align="center">  
                                                                                    <button name="update" type="submit" class="btn btn-warning btn-md" value="' . $project['projectID'] . '" />
                                                                                    <span class="fa fa-pencil"></span>
                                                                                </td>';
                                                                                }
                                                                            } else {
                                                                                echo "<div align=\"center\" style=\"color:red\"><b>NO PROJECTS TO DISPLAY</b></div>";
                                                                            }
                                                                            ?>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <a href="register_new_project.php" class="btn btn-info" role="button">CREATE NEW PROJECT</a>
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
    </body>

</html>