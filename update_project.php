
<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

         <?php include_once ('controller/c_update_project.php');?>   
    <head>
         <?php include_once ('dependencies/top_resources.php');?>   
        
        <?php 
        
        
           if (isset($_POST['pName'])&&isset($_POST['pDescription'])&&isset($_POST['pStart'])&&isset($_POST['pEnd'])&&isset($_POST['id'])){
           
               $view_result= submit_projectform($_POST['pName'],$_POST['pDescription'],$_POST['pStart'],$_POST['pEnd'],$_POST['id']);
           
                header("Location: manage_project.php");
           }
        ?>
    </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-md">
        <div class="page-wrapper">
            <div class="page-wrapper-row">
                <div class="page-wrapper-top">
                    <!-- BEGIN HEADER -->
      <?php include_once ('functions/header.php');?>   
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
                                        <h1>Update Project</h1>
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
                                            <span>Update Project</span>
                                        </li>
                                    </ul>
                                    <!-- END PAGE BREADCRUMBS -->
                                    <?php $query_result=getprojectinfo($_SESSION['updateid']);
                                                                            $id=$_SESSION['updateid'];
                                                                            unset($_SESSION['updateid']);
                                                                            
                                        
                                                                                if($query_result!=FALSE){
                                                                              foreach ($query_result as $project){
                                                                                  $name=$project['name'];
                                                                                  $description=$project['description'];
                                                                                  $startdate=$project['startdate'];
                                                                                  $enddate=$project['enddate'];
                                                                              }
                                                                              }
                                                                            ?>
                                    <!-- BEGIN PAGE CONTENT INNER -->
                                    <form  action="<?php ($_SERVER["PHP_SELF"])?>" method="post">
                                        <div class="page-content-inner">
                                            <!----BODY--->
                                            <div class="page-content-inner">
                                                <!----BODY--->
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="portlet light ">
                                                            <div class="portlet-title">
                                                                <div class="caption caption-md">
                                                                    <i class="icon-bar-chart font-dark hide"></i>
                                                                    <span class="caption-subject font-green-steel uppercase bold">INPUT PROJECT DETAILS</span>
                                                                </div>

                                                            </div>
                                                            <div class="portlet-body">
                                                                <div class="row list-separated">
                                                                        
                                                                    <div class="col-md-10">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Name</label>
                                                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name" name="pName" value="<?php echo $name; ?>" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Description</label>
                                                                            <textarea class="form-control"  aria-describedby="emailHelp" placeholder="Description" name="pDescription"  required><?php echo $description; ?></textarea>
                                                                            
                                                                        </div>	
                                                                                <div class="form-group">
                                                                            <label for="exampleInputEmail1">Start Date</label>
                                                                            <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="pStart" value="<?php echo $startdate; ?>" required>
                                                                        </div>
                                                                                <div class="form-group">
                                                                            <label for="exampleInputEmail1">End Date</label>
                                                                            <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="pEnd" value="<?php echo $enddate; ?>" required>
                                                                            
                                                                        </div>
                                                                           <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id" value="<?php echo $id; ?>" >
                                                                        
                                                                        <input type="submit" class="btn btn-info" value="UPDATE PROJECT INFORMATION" onClick="alert('The project has been registered to he system')">
                                                                        <div class="pull-left">
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

      <?php include_once ('functions/footer.php');?>   
                    <!-- END FOOTER -->
                </div>
            </div>
        </div>
        <!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<script src="assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
      <?php include_once ('dependencies/bottom_resources.php');?>   
    </body>

</html>