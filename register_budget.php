
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php include_once ('controller/c_register_budget.php'); ?>  
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
                                        <h1>Register Budget</h1>
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
                                            <span>Register Budget</span>
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
                                                                <span class="caption-subject font-green-steel uppercase bold">REGISTER PROJECT BUDGET</span>
                                                            </div>

                                                        </div>
                                                        <div class="portlet-body">
                                                            <div class="row list-separated">

                                                                <form class="col-md-10">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Amount</label>
                                                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Amount" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Remarks on Budget</label>
                                                                        <textarea row="3" col="10" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Remarks" required></textarea>

                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="single" class="control-label">Budget Releasing Method</label>
                                                                        <select id="single" class="form-control select2">
                                                                            <?php
                                                                            $query_result = generate_all_budgetmethod();
                                                                            if ($query_result != FALSE) {
                                                                                foreach ($query_result as $arr_result) {
                                                                                    echo'<option value="' . $arr_result['expensemethodID'] . '">' . $arr_result['name'] . '</option>';
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="single" class="control-label">Budget Category</label>
                                                                        <select id="single" class="form-control select2">
                                                                            <?php
                                                                            $query_result = generate_all_budgetcategory();
                                                                            if ($query_result != FALSE) {
                                                                                foreach ($query_result as $arr_result) {
                                                                                    echo'<option value="' . $arr_result['expensemethodID'] . '">' . $arr_result['name'] . '</option>';
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>

                                                                    <div class="pull-left">
                                                                        <input type="submit" class="btn btn-info" value="Submit Budget">
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
                                                                <span class="caption-subject font-green-steel uppercase bold">REGISTERED PROJECT BUDGETS</span>
                                                            </div>

                                                        </div>
                                                        <div class="portlet-body">
                                                            <div class="row list-separated">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                                        <thead>
                                                                            <tr>
                                                                                <th width="10%">Inputted On</th>
                                                                                <th width="10%">Category</th>
                                                                                <th width="10%">Type</th>
                                                                                <th width="50%">Remarks</th>
                                                                                <th width="20%">Amount</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tfoot>
                                                                            <tr></tr>
                                                                        </tfoot>
                                                                        <tbody>
                                                                            <tr>   
                                                                                <?php
                                                                                $query_result = generate_all_budget();
                                                                                if ($query_result != FALSE) {
                                                                                    foreach ($query_result as $arr_result) {
                                                                                        echo'   <tr>
                                                                                    <td>' . $arr_result['date'] . '</td>
                                                                                    <td>' . $arr_result['budgetcategoryname'] . '</td>
                                                                                    <td>' . $arr_result['budgetmethodname'] . '</td>
                                                                                    <td>' . $arr_result['remarks'] . '</td>
                                                                                    <td>' . $arr_result['amount'] . '</td> 
                                                                                                   . </tr>';
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
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