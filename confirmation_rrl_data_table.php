
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <?php include_once ('controller/c_visualization_listings_literature.php'); ?>  
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
                                            <h1>Literature Listings</h1>
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
                                                <span>Literature Listings</span>
                                            </li>
                                        </ul>
                                        <!-- END PAGE BREADCRUMBS -->
                                        <div class="page-content-inner">
                                            <!-- BEGIN PAGE CONTENT INNER -->
                                            <div class="page-content-inner">
                                                
                                                <div class="portlet light">
                                                    <div class="portlet-title">
                                                        <div class="caption caption-md">
                                                            <i class="icon-bar-chart font-dark hide"></i>
                                                            <span class="caption-subject font-green-steel uppercase bold">UPLOADED REVIEW OF RELATED LITERATURE</span>
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="search-page search-content-4">
                                                            <div class="search-bar bordered">
                                                                <div class="row">
                                                                    <div class="col-lg-8">
                                                                        <div class="input-group">
                                                                            <input type="text" class="form-control" placeholder="Search for...">
                                                                            <span class="input-group-btn">
                                                                                <button class="btn btn-info uppercase bold" type="button">Search</button>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 extra-buttons">
                                                                        <button class="btn grey-steel uppercase bold" type="button">Reset Search</button>
                                                                        <button class="btn grey-cararra font-blue" type="button">Advanced Search</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="search-table table-responsive">
                                                                <table class="table table-bordered table-striped table-condensed">
                                                                    <thead class="bg-blue">
                                                                        <tr>
                                                                            <th>
                                                                                <a href="javascript:;">Status</a>
                                                                            </th>
                                                                            <th>
                                                                                <a href="javascript:;">Year of Publication</a>
                                                                            </th>
                                                                            <th>
                                                                                <a href="javascript:;">Title & Author</a>
                                                                            </th>
                                                                            <th>
                                                                                <a href="javascript:;">Type of Literature</a>
                                                                            </th>
                                                                            <th>
                                                                                <a href="javascript:;">Abstract</a>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                            $query_result = generate_all_literature_listings();
                                                                            if ($query_result != FALSE) {
                                                                                foreach ($query_result as $arr_result) {
                                                                         
                                                                    
                                                                        echo'
                                                                        <tr>
                                                                            <td class="table-status">
                                                                                <a href="javascript:;">
                                                                                    <i class="icon-check font-grey"></i>
                                                                                </a>
                                                                            </td>
                                                                            <td class="table-date font-blue">
                                                                                <a href="javascript:;">'.$arr_result['year'].'</a>
                                                                            </td>
                                                                            <td class="table-title">
                                                                                <h3>
                                                                                    <a href="javascript:;">'.$arr_result['title'].'</a>
                                                                                </h3>
                                                                                <p>Author:
                                                                                    <a href="javascript:;">'.$arr_result['author'].'</a> 
                                                                                </p>
                                                                            </td>
                                                                            <td class="table-literature">'.$arr_result['type'].'</td>
                                                                            <td class="table-desc"> '.$arr_result['abstract'].'</td>
                                                                        </tr>
                                                                   ';
                                                                                }
                                                                            }?>
                                                                        
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="search-pagination pagination-rounded">
                                                                <ul class="pagination">
                                                                    <li class="page-active">
                                                                        <a href="javascript:;"> 1 </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:;"> 2 </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:;"> 3 </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="javascript:;"> 4 </a>
                                                                    </li>
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