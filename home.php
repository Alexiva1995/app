<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: ./index.php");
}
echo $_SESSION["user_id"];

require_once("controller/autoload.php");
$objPost = new Post();
$posts = $objPost->getPosts($_SESSION["user_id"]);
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>List View - Vuexy - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="Template/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="Template/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="Template/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="Template/app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="Template/app-assets/vendors/css/file-uploaders/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="Template/app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="Template/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="Template/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="Template/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="Template/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="Template/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="Template/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="Template/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="Template/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="Template/app-assets/css/plugins/file-uploaders/dropzone.css">
    <link rel="stylesheet" type="text/css" href="Template/app-assets/css/pages/data-list-view.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="Template/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
            </div>
        </div>
    </nav>
    <ul class="main-search-list-defaultlist d-none">
        <li class="d-flex align-items-center"><a class="pb-25" href="#">
                <h6 class="text-primary mb-0">Files</h6>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="../../../app-assets/images/icons/xls.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing Manager</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;17kb</small>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="../../../app-assets/images/icons/jpg.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd Developer</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;11kb</small>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="../../../app-assets/images/icons/pdf.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital Marketing Manager</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;150kb</small>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="../../../app-assets/images/icons/doc.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web Designer</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;256kb</small>
            </a></li>
        <li class="d-flex align-items-center"><a class="pb-25" href="#">
                <h6 class="text-primary mb-0">Members</h6>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="../../../app-assets/images/portrait/small/avatar-s-8.jpg" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="../../../app-assets/images/portrait/small/avatar-s-1.jpg" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd Developer</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="../../../app-assets/images/portrait/small/avatar-s-14.jpg" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing Manager</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="../../../app-assets/images/portrait/small/avatar-s-6.jpg" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
                    </div>
                </div>
            </a></li>
    </ul>



    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="../../../html/ltr/vertical-menu-template/index.html">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0">Valdusoft</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a href="#"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
                <li class=" nav-item"><a href="index.php"><i class="feather icon-lock"></i><span class="menu-title" data-i18n="Dashboard">Logout</span></a>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Dashboard</h2>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Data list view starts -->
                <section id="data-list-view" class="data-list-view-header">
                    <div class="table-responsive">
                        <table class="table data-list-view">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($posts as $post) { ?>
                                    <tr>
                                        <td><?php print_r($post['id']); ?></td>
                                        <td class="product-name" id="title2"><?php print_r($post['title']); ?></td>
                                        <td class="product-category"><?php print_r($post['description']); ?></td>
                                        <td class="product-price"><?php print_r($post['created_at']); ?></td>
                                        <td class="product-action">
                                            <span class="action-edit" data-id="<?php echo $post['id']; ?>" data-title="<?php echo $post['title']; ?>" data-description="<?php echo $post['description']; ?>"><i class="feather icon-edit"></i></span>
                                            <span class="action-delete" data-id="<?php echo $post['id']; ?>"><i class="feather icon-trash"></i></span>
                                        </td>
                                    </tr>
                                <?php  }
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <form action="./controller/system.php" method="post" id="delete-post">
                        <input type="hidden" name="action" value="delete-post">
                        <input type="hidden" name="id" id="post_id">
                    </form>
                    <!-- DataTable ends -->

                    <!-- add new sidebar starts -->
                    <div class="add-new-data-sidebar">
                        <div class="overlay-bg"></div>
                        <div class="add-new-data">

                            <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                <div>
                                    <h4 class="text-uppercase">List View Data</h4>
                                </div>
                                <div class="hide-data-sidebar">
                                    <i class="feather icon-x"></i>
                                </div>
                            </div>

                            <div id="create">
                                <form action="./controller/system.php" method="post">
                                    <input type="hidden" name="action" value="new-post">
                                    <div class="data-items pb-3">
                                        <div class="data-fields px-2 mt-3">
                                            <div class="row">
                                                <div class="col-sm-12 data-field-col">
                                                    <label for="data-name">Title</label>
                                                    <input type="text" class="form-control" id="data-name" name="title" required>
                                                </div>
                                                <div class="col-sm-12 data-field-col">
                                                    <label for="data-description">Description</label>
                                                    <textarea rows="5" class="form-control" id="data-description" name="description"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                        <div class="add-data-btn">
                                            <button class="btn btn-primary" type="submit">Add Data</button>
                                        </div>
                                        <div class="cancel-data-btn">
                                            <button class="btn btn-outline-danger">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="update" style="display: none; height:90%">
                                <form action="./controller/system.php" method="post">
                                    <input type="hidden" name="action" value="update-post">
                                    <input type="hidden" name="id" id="id">
                                    <div class="data-items pb-3">
                                        <div class="data-fields px-2 mt-3">
                                            <div class="row">
                                                <div class="col-sm-12 data-field-col">
                                                    <label for="data-name">Title</label>
                                                    <input type="text" class="form-control" id="title" name="title" required>
                                                </div>
                                                <div class="col-sm-12 data-field-col">
                                                    <label for="data-description">Description</label>
                                                    <textarea rows="5" class="form-control" id="description" name="description"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                        <div class="add-data-btn">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        </div>
                                        <div class="cancel-data-btn">
                                            <button class="btn btn-outline-danger">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <!-- add new sidebar ends -->
                </section>
                <!-- Data list view end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020<a class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent,</a>All rights Reserved</span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i class="feather icon-heart pink"></i></span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="Template/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="Template/app-assets/vendors/js/extensions/dropzone.min.js"></script>
    <script src="Template/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="Template/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="Template/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <script src="Template/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
    <script src="Template/app-assets/vendors/js/tables/datatable/dataTables.select.min.js"></script>
    <script src="Template/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="Template/app-assets/js/core/app-menu.js"></script>
    <script src="Template/app-assets/js/core/app.js"></script>
    <script src="Template/app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="Template/app-assets/js/scripts/ui/data-list-view.js"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>