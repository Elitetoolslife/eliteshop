<?php
ob_start();
session_start();
date_default_timezone_set('UTC');
include "../includes/config.php";

if (!isset($_SESSION['sname']) and !isset($_SESSION['spass'])) {
    header("location: ../");
    exit();
}
$usrid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>WaXa - Main</title>
    <link rel="shortcut icon" href="../assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/media/favicons/apple-touch-icon-180x180.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
    <link rel="stylesheet" href="../assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="../assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="../assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="../assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="../assets/js/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.css">
    <link rel="stylesheet" href="../assets/js/plugins/dropzone/min/dropzone.min.css">
    <link rel="stylesheet" href="../assets/js/plugins/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" id="css-main" href="../assets/css/oneui.min.css">
    <script src="https://code.jivosite.com/widget/ldI22iBcwW" async></script>
</head>
<body>
    <!-- Styles and Animations -->
    <style>
        .luxury-logo-container { ... }
        .luxury-frame { ... }
        .luxury-logo-image { ... }
        .luxury-particle { ... }
        .lp1 { ... }
        .lp2 { ... }
        .lp3 { ... }
        .lp4 { ... }
        @keyframes frame-pulse { ... }
        @keyframes luxury-orbits { ... }
        .luxury-logo-container:hover .luxury-frame { ... }
        .luxury-logo-container:hover .luxury-logo-image { ... }
        .luxury-logo-container:hover .luxury-particle { ... }
        .luxury-frame::after { ... }
        @keyframes golden-shine { ... }
        @media (max-width: 768px) { ... }
    </style>

    <header>
        <?php require_once("header.php"); ?>
        <?php require_once("ajax.php"); ?>
        <style>
            .navbar { background-color: #001f3f; }
        </style>
    </header>

    <div id="mainDiv">
        <div class="content">
            <!-- Stats Section -->
            <div class="py-4">
                <div class="row g-3 mb-4">
                    <!-- Balance Card -->
                    <div class="col-6 col-md-6 col-lg-3 col-xl-3">
                        <a class="block block-rounded block-link-pop bg-body-extra-light h-100" href="../add-balance/index.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Manage Your Account Balance">
                            <div class="block-content block-content-full p-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <div class="fs-sm fw-semibold text-uppercase text-muted mb-2">
                                            <i class="fas fa-coins me-1"></i> Account Balance
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="fs-2 fw-bold text-danger">$0.00</div>
                                            <div class="ms-3">
                                                <i class="fas fa-face-sad-tear fa-lg text-danger animate-bounce"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress mt-2" style="height: 4px;">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="5"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Orders Card -->
                    <div class="col-6 col-md-6 col-lg-3 col-xl-3">
                        <a class="block block-rounded block-link-pop bg-body-extra-light h-100" href="../orders/index.html" data-bs-toggle="tooltip" data-bs-placement="top" title="View Your Order History">
                            <div class="block-content block-content-full p-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <div class="fs-sm fw-semibold text-uppercase text-muted mb-2">
                                            <i class="fas fa-shopping-bag me-1 animate-slide"></i> Total Orders
                                        </div>
                                        <div class="fs-2 fw-bold text-primary">0</div>
                                    </div>
                                    <i class="fas fa-receipt fa-2x text-primary opacity-25 animate-float"></i>
                                </div>
                                <div class="fs-sm text-muted mt-2">
                                    <span class="text-success">
                                        <i class="fas fa-cart-plus me-1"></i> Ready for your first order!
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Tickets Card -->
                    <div class="col-6 col-md-6 col-lg-3 col-xl-3">
                        <a class="block block-rounded block-link-pop bg-body-extra-light h-100" href="../tickets/index.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Manage Support Tickets">
                            <div class="block-content block-content-full p-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <div class="fs-sm fw-semibold text-uppercase text-muted mb-2">
                                            <i class="fas fa-headset me-1  text-warning"></i> Open Tickets
                                        </div>
                                        <div class="fs-2 fw-bold text-warning">0</div>
                                    </div>
                                    <div class="position-relative">
                                        <i class="fas fa-headphones-alt fa-2x text-warning opacity-25 "></i>
                                    </div>
                                </div>
                                <div class="fs-sm text-muted mt-2">
                                    <span class="text-success">
                                        <i class="fas fa-check-circle me-1 animate-pop"></i> All resolved
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Reports Card -->
                    <div class="col-6 col-md-6 col-lg-3 col-xl-3">
                        <a class="block block-rounded block-link-pop bg-body-extra-light h-100" href="index.html" data-bs-toggle="tooltip" data-bs-placement="top" title="View System Reports">
                            <div class="block-content block-content-full p-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <div class="fs-sm fw-semibold text-uppercase text-muted mb-2">
                                            <i class="fas fa-flag-checkered me-1 animate-pulse"></i> Active Reports
                                        </div>
                                        <div class="fs-2 fw-bold text-info">0</div>
                                    </div>
                                    <i class="fas fa-chart-area fa-2x text-info opacity-25 animate-float"></i>
                                </div>
                                <div class="fs-sm text-muted mt-2">
                                    <span class="text-success">
                                        <i class="fas fa-check-circle me-1 animate-pop"></i> No Active Reports
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <style>
                /* Animation Keyframes */
                @keyframes dot-pulse { ... }
                @keyframes bounce { ... }
                @keyframes headphone { ... }
                @keyframes sound-wave { ... }
                @keyframes tilt { ... }
                @keyframes float { ... }
                @keyframes slide { ... }
                @keyframes pop { ... }
                /* Animation Classes */
                .animate-bounce { ... }
                .animate-headphone { ... }
                .animate-headphone::before { ... }
                .animate-headphone::after { ... }
                .animate-tilt { ... }
                .animate-float { ... }
                .animate-slide { ... }
                .animate-pop { ... }
                .animate-pulse { ... }
                /* Shared Styles */
                .dot-pulse { ... }
                .block-link-pop { ... }
                .block-link-pop:hover { ... }
                .progress { ... }
                .progress-bar { ... }
                .progress-bar::after { ... }
            </style>
            <!-- End Stats Section -->

            <!-- Items ShowRoom -->
            <div class="block block-rounded">
                <div class="slider-items card text-center border-0 shadow-sm rounded" style="height: 200;">
                    <div class="card-body" style="padding: 10px; text-align: center; position: relative;">
                        <!-- 70x70 Picture Based on Type -->
                        <div class="d-flex align-items-center justify-content-center mb-2">
                            <img src="https://www.metalheat.co.uk/wp-content/uploads/2018/11/kisspng-logo-royal-dutch-shell-petroleum-industry-oil-decal-5ac19d18b8eec7.121518751522638.png" alt="Shell" style="width: 70px; height: 70px; object-fit: cover; border-radius: 8px;">
                        </div>
                        <div class="block-content tab-content">
                            <div class="tab-pane pull-x active" id="ecom-product-info" role="tabpanel" aria-labelledby="ecom-product-info-tab" tabindex="0">
                                <table class="table table-striped table-borderless">
                                    <tbody>
                                        <tr>
                                            <td style="width: 30%; text-align: left; padding-right: 20px;">Type</td>
                                            <td style="width: 70%; text-align: right;">Shell</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%; text-align: left; padding-right: 20px;">ID</td>
                                            <td style="width: 70%; text-align: right;">76</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%; text-align: left; padding-right: 20px;">DA</td>
                                            <td style="width: 70%; text-align: right;">7</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%; text-align: left; padding-right: 20px;">PA</td>
                                            <td style="width: 70%; text-align: right;">11</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%; text-align: left; padding-right: 20px;">
                                                <i class="fa fa-fw fa-dollar-sign text-muted me-1"></i> Price
                                            </td>
                                            <td style="text-align: right;">$3.00</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%; text-align: left; padding-right: 20px;">
                                                <i class="fa fa-fw fa-calendar text-muted me-1"></i> Date
                                            </td>
                                            <td style="text-align: right;">Jan 12 2025</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%; text-align: left; padding-right: 20px;">
                                                <i class="fab fa-fw fa-mailchimp text-muted me-1"></i> Seller
                                            </td>
                                            <td style="text-align: right;">Seller1</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href="../shells/index.html" class="btn btn-primary" target="_blank">View Shells</a>
                    </div>
                </div>
            </div>
            <style>
                /* Items ShowRoom Slider */
                .slider-items .slick-slide { padding: 0 5px; }
                .slider-items .card-body { padding: 10px !important; }
                .slider-items img { width: 70px; height: 70px; object-fit: cover; border-radius: 8px; }
                .slider-items .table { font-size: 0.8em; margin-top: 5px; }
                .slider-items .table th, .slider-items .table td { padding: 0.2rem; }
            </style>
            <!-- End Items ShowRoom -->

            <!-- Accounts ShowRoom -->
            <div class="block block-rounded">
                <div class="slider card text-center border-0 shadow-sm rounded" style="height: 300;">
                    <div class="card-body" style="padding: 20px; text-align: center; position: relative;">
                        <div class="position-relative product-container">
                            <img class="img-fluid options-item w-100" style="height: 200px; object-fit: cover;" src="../storage/images/section_image/1723994004_66c20f9497893.jpg" alt="Facebook" loading="lazy">
                            <div class="item-info-overlay">
                                <div class="rounded-info-block">Facebook accounts with 11$ price</div>
                            </div>
                        </div>
                        <div class="block-content tab-content">
                            <div class="tab-pane pull-x active" id="ecom-product-info" role="tabpanel" aria-labelledby="ecom-product-info-tab" tabindex="0">
                                <table class="table table-striped table-borderless">
                                    <thead>
                                        <tr>
                                            <th colspan="2" class="product-name">Facebook</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="width: 30%; text-align: left; padding-right: 20px;">Email</td>
                                            <td style="width: 70%; text-align: right;">
                                                <i class="fa fa-check text-success"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 30%; text-align: left; padding-right: 20px;">Password</td>
                                            <td style="width: 70%; text-align: right;">
                                                <i class="fa fa-check text-success"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%; text-align: left; padding-right: 20px;">
                                                <i class="fa fa-fw fa-dollar-sign text-muted me-1"></i> Price
                                            </td>
                                            <td style="text-align: right;">$11.00</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%; text-align: left; padding-right: 20px;">
                                                <i class="fa fa-fw fa-calendar text-muted me-1"></i> Date
                                            </td>
                                            <td style="text-align: right;">Sep 27 2024</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 20%; text-align: left; padding-right: 20px;">
                                                <i class="fab fa-fw fa-mailchimp text-muted me-1"></i> Seller
                                            </td>
                                            <td style="text-align: right;">Seller2</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <p class="card-text" style="font-size: 1.1em; color: #007bff;">
                            <a href="../product/20/index.html" class="btn btn-primary">View</a>
                        </p>
                    </div>
                </div>
            </div>
            <style>
                /* Accounts ShowRoom Slider */
                .product-name { ... }
                @media (prefers-color-scheme: dark) { ... }
                .product-container { ... }
                .options-item { ... }
                .item-info-overlay { ... }
                .rounded-info-block { ... }
                .product-container:hover .options-item { ... }
                .product-container:hover .item-info-overlay { ... }
                .product-container:hover .rounded-info-block { ... }
                .table { ... }
                .table th { ... }
                .btn-primary { ... }
                .btn-primary:hover { ... }
                @media (max-width: 768px) { ... }
                @media (max-width: 576px) { ... }
                .slick-prev, .slick-next { ... }
                .slick-prev { ... }
                .slick-next { ... }
                .slick-dots { ... }
                .slick-dots li button:before { ... }
            </style>
            <!-- End Accounts ShowRoom -->

            <!-- Hero -->
            <div class="bg-body-light">
                <div class="content content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                        <div class="flex-grow-1">
                            <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                                <i class="fas fa-newspaper text-primary"></i> System News and Events
                            </h2>
                        </div>
                        <div class="flex