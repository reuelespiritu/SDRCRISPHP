
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <?php include_once ('controller/c_register_principal_investigator.php'); ?>   

    <head>
        <?php
        include_once ('dependencies/top_resources.php');


        if (isset($_POST['project']) && isset($_POST['researcher'])) {

            $view_result = submit_principal_investigator($_POST['project'], $_POST['researcher']);
            header("refresh:2.5; Location: manage_project.php", true, 303);
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
                                        <h1>Register Principal Investigator</h1>
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
                                            <span>Register Principal Investigator</span>
                                        </li>
                                    </ul>
                                    <!-- END PAGE BREADCRUMBS -->
                                    <form method="post" action="<?php ($_SERVER["PHP_SELF"]) ?>">
                                        <div class="page-content-inner">
                                            <!----BODY--->
                                            <div class="row">
                                                <div class="col-md-14">
                                                    <div class="portlet light">
                                                        <div class="portlet-title">
                                                            <div class="caption caption-md">
                                                                <i class="icon-bar-chart font-dark hide"></i>
                                                                <span class="caption-subject font-green-steel uppercase bold">SELECT A PROJECT</span>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <div class="row list-separated">
                                                                <select class="js-example-basic-single form-control" name="project" style="width:100%">
                                                                    <?php
                                                                    $query_result = generate_all_project_withoutpi();

                                                                    if ($query_result != FALSE) {
                                                                        foreach ($query_result as $project) {

                                                                            echo '<option  required value="' . $project['projectID'] . '" >' . $project['name'] . '</option>';
                                                                        }
                                                                    } else {
                                                                        echo '<option value="null" selected>NO PROJECT TO DISPLAY</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <br>
                                                            </div>
                                                        </div>
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
                                                                <span class="caption-subject font-green-steel uppercase bold">SELECT AN AVAILABLE RESEARCHER</span>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <div class="row list-separated">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-striped table-hover" id="sample_2">
                                                                        <thead>
                                                                            <tr>
                                                                                <th width="10%">First Name</th>
                                                                                <th width="10%">Last Name</th>
                                                                                <th width="10%">Middle Name</th>
                                                                                <th width="10%">Email</th>
                                                                                <th width="20%">Specializations</th>                                           
                                                                                <th width="10%">Masters</th>
                                                                                <th width="10%">Doctorate</th>
                                                                                <th width="10%">Registration Date</th>
                                                                                <th width="10%">Select</th>    
                                                                            </tr>
                                                                        </thead>
                                                                        <tfoot>
                                                                            <tr>
                                                                            </tr>
                                                                        </tfoot>
                                                                        <tbody>
                                                                            <tr>
                                                                                <?php
                                                                                $query_result = generate_all_users();

                                                                                if ($query_result != FALSE) {
                                                                                    foreach ($query_result as $user) {
                                                                                        echo' 
                                                                                        <tr>
                                                                                        <td>' . $user['firstname'] . '</td>
                                                                                        <td>' . $user['middlename'] . '</td>
                                                                                        <td>' . $user['lastname'] . '</td>
                                                                                        <td>' . $user['email'] . '</td>
                                                                                        <td>' . $user['specializations'] . '</td>
                                                                                        <td>' . $user['masters'] . '</td>
                                                                                        <td>' . $user['doctorate'] . '</td>
                                                                                        <td>' . $user['registrationdate'] . '</td>
                                                                                        <td align="center">
                                                 `                                      <input type="radio" name="researcher" value="' . $user['userID'] . '"> <br>
                                                                                        </td>';
                                                                                    }
                                                                                } else {
                                                                                    echo "<div align=\"center\" style=\"color:red\"><b>NO PERSON AVAILABLE TO REGISTER AS PRINCIPAL INVESTIGATOR</b></div>";
                                                                                }
                                                                                ?>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-info pull-right">REGISTER PRINCIPAL INVESTIGATOR</button>
                                    </form>
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
            });
        </script>
    </body>

</html>