
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <?php include_once ('controller/c_register_expenses.php'); ?>  
    <head>
        <?php include_once ('dependencies/top_resources.php'); ?>   

        <?php
        if (isset($_POST['amount']) && isset($_POST['expensemethod']) && isset($_POST['expensecategory'])) {

            $project = $_SESSION['project'];
            $view_result = submit_expense($_POST['amount'], $_POST['remarks'], $project, $_POST['expensecategory'], $_POST['expensemethod']);
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
                                        <h1>Register Expenses</h1>
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
                                            <span>Register Expenses</span>
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
                                                                <span class="caption-subject font-green-steel uppercase bold">REGISTER PROJECT EXPENSES</span>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <div class="row list-separated">
                                                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="col-md-10">

                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Amount</label>
                                                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="amount" placeholder="Amount" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Remarks on Expense</label>
                                                                        <textarea row="3" col="10" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="remarks" placeholder="Remarks" required></textarea>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="single" class="control-label">Expense Method</label>
                                                                        <select id="single" class="form-control select2" name="expensemethod" >
                                                                            <?php
                                                                            $query_result = generate_all_expensemethod();
                                                                            if ($query_result != FALSE) {
                                                                                foreach ($query_result as $arr_result) {
                                                                                    echo'<option value="' . $arr_result['expensemethodID'] . '">' . $arr_result['name'] . '</option>';
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="single" class="control-label">Expense Category</label>
                                                                        <select id="single" class="form-control select2" name="expensecategory" >
                                                                            <?php
                                                                            $query_result = generate_all_expensecategory();
                                                                            if ($query_result != FALSE) {
                                                                                foreach ($query_result as $arr_result) {
                                                                                    echo'   <tr>
                                                                                                <option value="' . $arr_result['expensecategoryID'] . '">' . $arr_result['name'] . '</option>


                                                                                            . </tr>';
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="pull-left">
                                                                        <button type="submit" class="btn btn-info">Submit Expense</button>
                                                                    </div>                                              
                                                                </form>
                                                            </div>							
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="portlet light ">
                                                        <div class="portlet-title">
                                                            <div class="caption caption-md">
                                                                <i class="icon-bar-chart font-dark hide"></i>
                                                                <span class="caption-subject font-green-steel uppercase bold">REGISTERED PROJECT EXPENSES</span>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <div class="row list-separated">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-striped table-hover" id="sample_2">
                                                                        <thead>
                                                                            <tr>
                                                                                <th width="10%">Date Uploaded</th>
                                                                                <th width="10%">Category</th>
                                                                                <th width="10%">Method</th>
                                                                                <th width="50%">Remarks</th>
                                                                                <th width="20%">Amount</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tfoot>
                                                                            <tr></tr>
                                                                        </tfoot>
                                                                        <tbody>
                                                                            <?php
                                                                            $query_result = generate_all_expenses();
                                                                            if ($query_result != FALSE) {
                                                                                foreach ($query_result as $arr_result) {
                                                                                    echo'   <tr>
                                                                                    <td>' . $arr_result['date'] . '</td>
                                                                                    <td>' . $arr_result['expensecategoryname'] . '</td>
                                                                                    <td>' . $arr_result['expensemethod'] . '</td>
                                                                                    <td>' . $arr_result['remarks'] . '</td>
                                                                                    <td align="right">' . $arr_result['amount'] . '</td>
                                                                                    </tr>';
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                                <B>Total Budget Amount: <?php $amt= generatetotalexpense(); echo $amt; ?></B>
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
                        
                        <div style="display: none;" class="btn btn-default mt-sweetalert" data-title="Expense Registered" data-message="The information you have entered has been successfully saved" data-allow-outside-click="true" data-confirm-button-class="btn-default" id ="confirm">Default Alert</div>
            
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
    if(isset($view_result)&&$view_result==TRUE)
    echo'$(document).ready(function(){ 
                    document.getElementById("confirm").click();
                });';


    ?>
    </script>
</body>

</html>