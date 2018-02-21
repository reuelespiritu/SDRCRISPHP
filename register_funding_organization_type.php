
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php include_once ('controller/c_register_funding_organization_type.php'); ?>  
    <head>
        <?php include_once ('dependencies/top_resources.php'); ?>         
        <?php
        if (isset($_POST['name']) && isset($_POST['description'])) {

            if (isset($_POST['submittype']) && $_POST['submittype'] == "REGISTER") {
                $view_result = submit_fundingorganizationtype($_POST['name'], $_POST['description']);
            } else {
                $view_result = submitupdate_fundingorganizationtype($_POST['name'], $_POST['description'], $_POST['id']);
            }
        } else if (isset($_POST['deactivate'])) {
            $view_result = delete_fundingorganizationtype(($_POST['deactivate']));
        }
        ?>
    </head>
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
                                    <h1>Register Funding Organization Type</h1>
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
                                        <span>Budget Tracker</span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span>Register Funding Organization Type</span>
                                    </li>
                                </ul>
                                <!-- END PAGE BREADCRUMBS -->
                                <!----BODY--->

                                <div class="page-content-inner">
                                    <!----BODY--->

                                    <!-- BEGIN PAGE CONTENT INNER -->
                                    <div class="page-content-inner">
                                        <!----BODY--->
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="portlet light ">
                                                    <div class="portlet-title">
                                                        <div class="caption caption-md">
                                                            <i class="icon-bar-chart font-dark hide"></i>
                                                            <span class="caption-subject font-green-steel uppercase bold">REGISTER FUNDING ORGANIZATION TYPE</span>
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="row list-separated">
                                                            <?php
                                                            if (isset($_POST['update'])) {

                                                                $query_result = getupdate_fundingorganizationtype($_POST['update']);
                                                                if ($query_result != FALSE) {
                                                                    foreach ($query_result as $arr_result) {
                                                                        $id = $arr_result['fundingorganization_typeID'];
                                                                        $name = $arr_result['name'];
                                                                        $description = $arr_result['description'];
                                                                    }
                                                                }
                                                            } else {

                                                                $name = "";
                                                                $description = "";
                                                                $id = "";
                                                            }
                                                            ?>

                                                            <form class="col-md-10" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Name</label>
                                                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name" name="name" value="<?php echo $name; ?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Description</label>
                                                                    <textarea class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Description" name="description"  required><?php echo $description; ?></textarea>
                                                                </div>
                                                                <input type="hidden" name="id" value="<?php echo $id; ?>">

                                                                <input type="hidden" name="submittype" value="<?php
                                                                if ($name == NULL) {
                                                                    echo "REGISTER";
                                                                }
                                                                ?>">
                                                                <div class="pull-left">
                                                                    <input type="submit" class="btn btn-info" value="Submit Funding Organization Type">
                                                                </div>                                              
                                                            </form>
                                                        </div>							
                                                        <ul class="list-separated list-inline-xs hide">

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="portlet light ">
                                                    <div class="portlet-title">
                                                        <div class="caption caption-md">
                                                            <i class="icon-bar-chart font-dark hide"></i>
                                                            <span class="caption-subject font-green-steel uppercase bold">REGISTERED FUNDING ORGANIZATION TYPES</span>
                                                        </div>

                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="row list-separated">
                                                            <div class="table-responsive">
                                                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                                        <thead>
                                                                            <tr>
                                                                                <th width="40%">Name</th>
                                                                                <th width="60%">Description</th>
                                                                                <th>Deactivate</th>
                                                                                <th>Update</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tfoot>
                                                                            <tr>
                                                                            </tr>
                                                                        </tfoot>
                                                                        <tbody>

                                                                            <?php
                                                                            $query_result = generate_all_fundingorganizationtype();
                                                                            if ($query_result != FALSE) {
                                                                                foreach ($query_result as $arr_result) {
                                                                                    echo'   <tr>
                                                                                    <td>' . $arr_result['name'] . '</td>
                                                                                    <td>' . $arr_result['description'] . '</td>
                                                                                    <td><button name="deactivate" value="' . $arr_result['fundingorganization_typeID'] . '" class="btn btn-danger btn-lg"/><span class="glyphicon glyphicon-trash"></span></td>
                                                                                     <td><button name="update" value="' . $arr_result['fundingorganization_typeID'] . '" class="btn btn-warning btn-lg"/><span class="glyphicon glyphicon-wrench"></span></td>'
                                                                                    . '      </tr>';
                                                                                }
                                                                            }
                                                                            ?>

                                                                        </tbody>
                                                                    </table>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <ul class="list-separated list-inline-xs hide">

                                                    </ul>

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
    <!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<script src="assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
    <?php include_once ('dependencies/bottom_resources.php'); ?>   
</body>

</html>