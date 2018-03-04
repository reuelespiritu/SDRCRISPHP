
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php include_once ('controller/c_register_category_expense.php'); ?>  
    <head>
        <?php include_once ('dependencies/top_resources.php'); ?>    
        <?php
        if (isset($_POST['name']) && isset($_POST['description'])) {

            if (isset($_POST['submittype']) && $_POST['submittype'] == "REGISTER") {
                $view_result = submit_categoryofexpense($_POST['name'], $_POST['description']);
            } else {
                $view_result = submitupdate_expensecategory($_POST['name'], $_POST['description'], $_POST['id']);
            }
        } else if (isset($_POST['deactivate'])) {
            $view_result = delete_categoryexpense(($_POST['deactivate']));
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
                                        <h1>Register Expense Category</h1>
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
                                            <span>Register Expense Category</span>
                                        </li>
                                    </ul>
                                    <!-- END PAGE BREADCRUMBS -->
                                    <!----BODY--->
                                    <div class="page-content-inner">
                                        <!-- BEGIN PAGE CONTENT INNER -->
                                        <div class="page-content-inner">
                                            <!----BODY--->
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="portlet light ">
                                                        <div class="portlet-title">
                                                            <div class="caption caption-md">
                                                                <i class="icon-bar-chart font-dark hide"></i>
                                                                <span class="caption-subject font-green-steel uppercase bold">REGISTER EXPENSE CATEGORY</span>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <div class="row list-separated">    
                                                                <?php
                                                                if (isset($_POST['update'])) {

                                                                    $query_result = getupdate_expensecategory($_POST['update']);
                                                                    if ($query_result != FALSE) {
                                                                        foreach ($query_result as $arr_result) {
                                                                            $id = $arr_result['expensecategoryID'];
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
                                                                        <button type="submit" class="btn btn-info">Submit Expense Category</button>
                                                                    </div>                                              
                                                                </form>
                                                            </div>							
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="portlet light ">
                                                        <div class="portlet-title">
                                                            <div class="caption caption-md">
                                                                <i class="icon-bar-chart font-dark hide"></i>
                                                                <span class="caption-subject font-green-steel uppercase bold">REGISTERED EXPENSE CATEGORIES</span>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <div class="row list-separated">
                                                                <div class="table-responsive">
                                                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                                                        <table class="table table-bordered table-striped table-hover" id="sample_2">
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
                                                                            $query_result = generate_all_expensecategory();
                                                                            if ($query_result != FALSE) {
                                                                                foreach ($query_result as $arr_result) {
                                                                                    echo'   <tr>
                                                                                <td>' . $arr_result['name'] . '</td>
                                                                                <td>' . $arr_result['description'] . '</td>
                                                                                <td align="center"><button name="deactivate" value="' . $arr_result['expensecategoryID'] . '" class="btn btn-danger btn-md"/><span class="fa fa-remove"></span></td>
                                                                                <td align="center"><button name="update" value="' . $arr_result['expensecategoryID'] . '" class="btn btn-warning btn-md"/><span class="fa fa-pencil"></span></td>'
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
                                                
                        <div style="display: none;" class="btn btn-default mt-sweetalert" data-title="Expense Category Registered" data-message="The information you have entered has been successfully saved" data-allow-outside-click="true" data-confirm-button-class="btn-default" id ="confirm">Default Alert</div>
                        <div style="display: none;" class="btn btn-default mt-sweetalert" data-title="Expense Category Deleted" data-message="The information you have entered has been successfully saved" data-allow-outside-click="true" data-confirm-button-class="btn-default" id ="delete">Default Alert</div>
                        <div style="display: none;" class="btn btn-default mt-sweetalert" data-title="Expense Category Update" data-message="The information you have entered has been successfully saved" data-allow-outside-click="true" data-confirm-button-class="btn-default" id ="update">Default Alert</div>

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
        
         <script>

<?php
if (isset($view_result) && $view_result == 1) {
    echo'$(document).ready(function(){ 
                    document.getElementById("confirm").click();
    });';
} else if (isset($view_result) && $view_result == 2) {
    echo'$(document).ready(function(){ 
                    document.getElementById("delete").click();
    });';
} else if (isset($view_result) && $view_result == 3) {
    echo'$(document).ready(function(){ 
                    document.getElementById("update").click();
    });';
}
?></script>
    </body>

</html>