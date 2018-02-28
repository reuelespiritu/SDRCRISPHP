
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php include_once ('controller/c_collection_upload_literature.php');
    ?>  
    <head>
        <?php
        include_once ('dependencies/top_resources.php');
        if (isset($_FILES['fileupload'])) {
            $imgData = $_FILES['fileupload'];

            if ($_FILES['fileupload']['name'] == "RRL.csv") {
                $view_result = submit_literatureupload($_SESSION['project'], $imgData, $_SESSION['userid']);
         
                print_r($view_result);
            } else {
                echo "<script type='text/javascript'>alert('Please upload the standard file!');</script>";
            }
        } else if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['abstract']) && isset($_POST['yearofpublication']) && isset($_POST['categoryoflit']) && isset($_POST['source']) && isset($_POST['keywords'])) {

            $arr = explode("/", $_POST['categoryoflit'], 2);
            $type = $arr[0];
            $type = rtrim($type);
            $category = $arr[1];
            $category = rtrim($category);
            $projectid = $_SESSION['project'];

            $view_result=submit_form_literatureupload($projectid, $_POST['yearofpublication'], $_POST['title'], $_POST['author'], $_POST['abstract'], $category, $type, $_POST['source'], $_POST['keywords'], $_POST['source'], $_SESSION['userid']);
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
                                        <h1>Literature Upload</h1>
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
                                            <span>Literature Upload</span>
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
                                                <div class="col-md-6 col-sm-15">
                                                    <div class="portlet light ">
                                                        <div class="portlet-title">
                                                            <div class="caption caption-md">
                                                                <i class="icon-bar-chart font-dark hide"></i>
                                                                <span class="caption-subject font-green-steel uppercase bold">UPLOAD REVIEW OF RELATED LITERATURE</span>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <div class="row list-separated">
                                                                <form class="col-md-10" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail">Title</label>
                                                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title" name="title" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail">Author</label>
                                                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Author" name="author" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Abstract</label>
                                                                        <textarea row="3" col="10" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Abstract" name="abstract" required></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail">Year of Publication</label>
                                                                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Year of Publication" name="yearofpublication" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="single" class="control-label">Type of Literature</label>
                                                                        <select id="single" class="form-control select2" name="categoryoflit">
                                                                            <option></option>
                                                                            <optgroup label="Gray">
                                                                                <option value="News Articles / Grey">News Articles</option>
                                                                                <option value="Conference Papers / Grey">Conference Papers</option>
                                                                            </optgroup>
                                                                            <optgroup label="Scientific">
                                                                                <option value="Scientific / Scientific">Scientific</option>
                                                                            </optgroup>
                                                                        </select>
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail">Source</label>
                                                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Source" name="source" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail">Key Words</label>
                                                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Key Words" name="keywords" required data-role="tagsinput">
                                                                    </div>
                                                                    <div class="pull-left">
                                                                        <input type="submit" class="btn btn-info" value="Submit Literature">
                                                                                                                                                                    
                                                           
                                                                    </div>
                                                                    <ul class="list-separated list-inline-xs hide">

                                                                    </ul>
                                                                </form>
                                                            </div>							
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-15">
                                                    <div class="portlet light ">
                                                        <div class="portlet-title">
                                                            <div class="caption caption-md">
                                                                <i class="icon-bar-chart font-dark hide"></i>
                                                                <span class="caption-subject font-green-steel uppercase bold">UPLOAD REVIEW OF RELATED LITERATURE CSV FILE</span>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <div class="row list-separated">
                                                                <form class="col-md-10" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="frmImage" enctype="multipart/form-data" >
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
                                                                                        <input type="file" name="fileupload"> </span>
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
                                     <div style="display: none;" class="btn btn-default mt-sweetalert" data-title="Saved" data-message="The items you have uploaded has been saved" data-allow-outside-click="true" data-confirm-button-class="btn-default" id ="Confirm">Default Alert</div>

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
    if(isset($view_result)&&$view_result!=FALSE)
    echo'$(document).ready(function(){ 
                document.getElementById("Confirm").click();
            });';
?>
    </script>
</body>

</html>