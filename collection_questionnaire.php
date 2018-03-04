
<!DOCTYPE html>

<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php include_once ('controller/c_complete_project_information.php'); ?>  
    <head>
        <?php
        include_once ('dependencies/top_resources.php');
        if (count($_FILES) > 0) {
            if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
                $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
                $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);

                submit_project_data($imageProperties, $imgData);
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
                                        <h1>Questionnaire</h1>
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
                                            <span>Questionnaire</span>
                                        </li>
                                    </ul>
                                    <!-- END PAGE BREADCRUMBS -->
                                    <div class="page-content-inner">
                                        <!-- BEGIN PAGE CONTENT INNER -->
                                        <div class="page-content-inner">
                                            <div class="row">
                                                <div class="col-md-14">
                                                    <div class="portlet light ">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                <span class="caption-subject font-green bold uppercase">GENERATE QUESTIONNAIRE</span>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <div class="form-group">
                                                                <label for="default" class="control-label">Title</label>
                                                                <input id="default" type="text" class="form-control" placeholder="Title"> </div>
                                                            <div class="form-group">
                                                                <label for="single" class="control-label">Objective</label>
                                                                <textarea class="form-control" rows="4" placeholder="Objective"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="single" class="control-label">Date Created</label>
                                                                <input class="form-control" id="mask_date2" type="text">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="single" class="control-label">Date Approved</label>
                                                                <input class="form-control" id="mask_date2" type="text">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="single" class="control-label">Questions</label>
                                                                <textarea class="form-control" rows="4" placeholder="Questions"></textarea>
                                                            </div>    
                                                        </div>
                                                        <button class="btn btn-info" type="submit">Submit Questionnaire</button>
                                                    </div
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