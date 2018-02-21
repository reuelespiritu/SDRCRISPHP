<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php include_once ('controller/c_assign_project_users.php'); ?>  
    <head>

        <?php
        include_once ('dependencies/top_resources.php');
        if (isset($_POST['uid'])) {
            $view_result = submit_project_user($_POST['uid'], $_SESSION['project']);
        } else if (isset($_POST['deactivate'])) {
            $view_result = delete_project_user(($_POST['deactivate']));
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
                                        <h1>Assign Project Users</h1>
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
                                            <span>Assign Project Users</span>
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

                                                            <span class="caption-subject font-green-steel uppercase bold">


                                                            </span> <!---Get Project Name--->
                                                        </div>
                                                    </div>
                                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                                        <div class="portlet-body">
                                                            <div class="row list-separated">
                                                                <div class="table-responsive">

                                                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                                        <thead>
                                                                            <tr>
                                                                                <th width="10%">First Name</th>
                                                                                <th width="10%">Last Name</th>
                                                                                <th width="10%">Middle Name</th>
                                                                                <th width="10%">Email</th>
                                                                                <th width="20%">Specializations</th>                                           
                                                                                <th width="10%">Masters</th>
                                                                                <th width="10%">Doctorate</th>
                                                                                <th width="10%">Add User</th>    
                                                                            </tr>
                                                                        </thead>
                                                                        <tfoot>
                                                                            <tr>
                                                                            </tr>
                                                                        </tfoot>
                                                                        <tbody>

                                                                            <?php
                                                                            $query_result = generate_all_projectusers();
                                                                            if ($query_result != FALSE) {
                                                                                foreach ($query_result as $arr_result) {
                                                                                    echo'   <tr>
                                                                                    <td>' . $arr_result['firstname'] . '</td>
                                                                                    <td>' . $arr_result['lastname'] . '</td>
                                                                                    <td>' . $arr_result['middlename'] . '</td>
                                                                                    <td>' . $arr_result['email'] . '</td>
                                                                                    <td>' . $arr_result['specializations'] . '</td>
                                                                                    <td>' . $arr_result['masters'] . '</td>
                                                                                    <td>' . $arr_result['doctorate'] . '</td>
                                                                                    <td align="center"><input type="checkbox" name="uid[]" value="value="' . $arr_result['userID'] . '""><br></td>
                                                                                    </tr>';
                                                                                }
                                                                            }
                                                                            ?>

                                                                        </tbody>
                                                                    </table>

                                                                </div>
                                                                <br>
                                                            </div>

                                                            <input type="submit" class="btn btn-info" value="Submit">            </div>
                                                    </form>
                                                    <ul class="list-separated list-inline-xs hide">

                                                    </ul>

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