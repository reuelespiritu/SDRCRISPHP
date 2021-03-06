<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
<?php include_once ('controller/c_update_user.php');?>  
    <head>
             <?php include_once ('dependencies/top_resources.php');?>    
        <?php 
        
        
           if (isset($_POST['fn'])&&isset($_POST['mn'])&&isset($_POST['ln'])&&isset($_POST['em'])&&isset($_POST['spe'])&&isset($_POST['id'])){
           
               $view_result=submit_userform($_POST['fn'],$_POST['mn'],$_POST['ln'],$_POST['em'],$_POST['p1'],$_POST['p2'],$_POST['spe'],$_POST['mas'],$_POST['doc'],$_POST['id']);
           
                header("Location: manage_user.php");
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
                                        <h1>Update User</h1>
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
                                            <a href="manage_user.jsp">Manage User</a>
                                            <i class="fa fa-circle"></i>

                                        </li><li>
                                            <span>Update User</span>
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
                                                                <span class="caption-subject font-green-steel uppercase bold">Update User</span>
                                                            </div>

                                                        </div>
                                                        <div class="portlet-body">
                                                            <div class="row list-separated">
                                                                        <?php 
                                                                           $query_result= getuserinfo($_SESSION['updateid']);
                                                                            $id=$_SESSION['updateid'];
                                                                            unset($_SESSION['updateid']);
                                                                            
                                        
                                                                                if($query_result!=FALSE){
                                                                              foreach ($query_result as $user){
                                                                                  $firstname=$user['firstname'];
                                                                                  $middlename=$user['middlename'];
                                                                                  $lastname=$user['lastname'];
                                                                                  $email=$user['email'];
                                                                                  $password=$user['password'];
                                                                                  $specializations=$user['specializations'];
                                                                                  $masters=$user['masters'];
                                                                                  $doctorate=$user['doctorate'];
                                                                                   }
                                                                              }
                                                                            ?>
                                                                <form class="col-md-10" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">First Name</label>
                                                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="First Name" name="fn" value="<?php echo $firstname;?>" required>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Middle Name</label>
                                                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Middle Name" name="mn" value="<?php echo $middlename;?>" required>
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Last Name</label>
                                                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Last Name" name="ln" value="<?php echo $lastname;?>" required>
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Email</label>
                                                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="em" value="<?php echo $email;?>" required>
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Password</label>
                                                                        <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password" name="p1" value="<?php echo $password;?>">
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Re-enter Password</label>
                                                                        <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Re-Enter Password" name="p2" value="<?php echo $password;?>">
                                                                    </div>


                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Specializations</label>
                                                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Specializations" name="spe" value="<?php echo $specializations;?>" required>
                                                                        <small>Please input all specializations separated by a comma.</small></div>


                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Masters</label>
                                                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masters" name="mas" value="<?php echo $masters;?>" >
                                                                        <small>Leave blank if not applicable.</small> </div>

                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Doctorate</label>
                                                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Doctorate" name="doc" value="<?php echo $doctorate;?>">
                                                                        <small>Leave blank if not applicable.</small></div>
                                                                    <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Doctorate" name="id" value="<?php echo $id;?>">
                                                                       
                                                                    <input type="submit" class="btn btn-info pull left" value="Update User Information" onClick="alert('The user has been registered to the system')">
                                                                </form>
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