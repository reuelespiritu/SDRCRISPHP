
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php include_once ('controller/c_visualization_healthdataregion.php'); ?>  
    <head>
        <?php
        include_once ('dependencies/top_resources.php');
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
                                        <h1>Health Data Per Region</h1>
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
                                            <span>Visualization & Analysis</span>
                                            <i class="fa fa-circle"></i>
                                        </li>
                                        <li>
                                            <span>Health Data Per Region</span>
                                        </li>
                                    </ul>
                                    <!-- END PAGE BREADCRUMBS -->
                                    <div class="page-content-inner">
                                        <!-- BEGIN PAGE CONTENT INNER -->
                                        <div class="page-content-inner">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                    <div class="portlet light ">
                                                        <div class="portlet-title">
                                                            <div class="caption font-dark">
                                                                <span class="caption-subject font-green-steel uppercase bold">Health Data Per Region</span>
                                                            </div>
                                                            <div class="tools"> </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Year</th>
                                                                        <th>Region</th>
                                                                        <th>AW Diarrhea</th>
                                                                        <th>AB Diarrhea</th>
                                                                        <th>Hepatitis</th>
                                                                        <th>Typhoid Fever</th>
                                                                        <th>Cholera</th>
                                                                        <th>Dengue</th>
                                                                        <th>Malaria</th>
                                                                        <th>Leptospirosis</th>
                                                                        <th>Tetanus</th>
                                                                        <th>Uploaded By</th>
                                                                        <th>Uploaded Date</th>
                                                                    </tr>
                                                                </thead>
                                                                <tfoot>
                                                                    <tr>
                                                                    </tr>
                                                                </tfoot>
                                                                <tbody>
                                                                    <?php
                                                                    $query_result = generate_all_healthdataregion();
                                                                    if ($query_result != FALSE) {
                                                                        foreach ($query_result as $arr_result) {
                                                                            echo'   <tr>
                                                                                    <td>' . $arr_result['year'] . '</td>
                                                                                    <td>' . $arr_result['region'] . '</td>
                                                                                    <td>' . $arr_result['AWdiarrhea'] . '</td>
                                                                                    <td>' . $arr_result['ABdiarrhea'] . '</td>
                                                                                    <td>' . $arr_result['hepatitis'] . '</td>
                                                                                    <td>' . $arr_result['typhoidFever'] . '</td>
                                                                                    <td>' . $arr_result['cholera'] . '</td>
                                                                                    <td>' . $arr_result['dengue'] . '</td>
                                                                                    <td>' . $arr_result['malaria'] . '</td>
                                                                                    <td>' . $arr_result['leptospirosis'] . '</td>
                                                                                    <td>' . $arr_result['tetanus'] . '</td>
                                                                                    <td>' . $arr_result['uploadedBy'] . '</td>
                                                                                    <td>' . $arr_result['uploadDate'] . '</td>
                                                                                     </tr>';
                                                                        }
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!-- END EXAMPLE TABLE PORTLET-->
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