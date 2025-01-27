<?php
ob_start();
session_start();
date_default_timezone_set('UTC');
include "includes/config.php";

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
    <title>My Orders
    </title>
    <!-- Icons -->
    <link rel="shortcut icon" href="https://waxa.pw/assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="https://waxa.pw/assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="https://waxa.pw/assets/media/favicons/apple-touch-icon-180x180.png">
    <!-- Include Choices CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <!-- Stylesheets -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <link rel="stylesheet" href="https://waxa.pw/assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://waxa.pw/assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="https://waxa.pw/assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="https://waxa.pw/assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
    <link rel="stylesheet" href="https://waxa.pw/assets/js/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="https://waxa.pw/assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.css">
    <link rel="stylesheet" href="https://waxa.pw/assets/js/plugins/dropzone/min/dropzone.min.css">
    <link rel="stylesheet" href="https://waxa.pw/assets/js/plugins/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" id="css-main" href="https://waxa.pw/assets/css/oneui.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css" />
 
    <script src="//code.jivosite.com/widget/ldI22iBcwW" async></script>
 
</head>
 
<body>
    <div id="page-container" class="page-header-dark main-content-boxed remember-theme">
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div class="d-flex align-items-center">
                    <!-- Logo -->
                    <a class="luxury-logo-container" href="https://waxa.pw/main" title="Premium Trading Platform">
                        <div class="luxury-frame">
                            <!-- Golden Particles -->
                            <div class="luxury-particle lp1"></div>
                            <div class="luxury-particle lp2"></div>
                            <div class="luxury-particle lp3"></div>
                            <div class="luxury-particle lp4"></div>
 
                            <!-- Main Logo -->
                            <img src="https://png.pngtree.com/png-vector/20240612/ourmid/pngtree-monkey-smoke-sigarate-png-image_12720609.png" alt="Premium Logo" class="luxury-logo-image">
                        </div>
                    </a>
                    <!-- END Logo -->
 
                    <style>
                        .luxury-logo-container {
                            display: inline-block;
                            position: relative;
                            padding: 6px;
                            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
                        }
 
                        .luxury-frame {
                            position: relative;
                            width: 45px;
                            height: 45px;
                            border-radius: 50%;
                            background: linear-gradient(45deg,
                                    #daa520 0%,
                                    #ffd700 25%,
                                    #fff3a0 50%,
                                    #ffd700 75%,
                                    #daa520 100%);
                            padding: 2px;
                            box-shadow: 0 0 20px rgba(218, 165, 32, 0.3);
                            animation: frame-pulse 3s ease-in-out infinite;
                        }
 
                        .luxury-logo-image {
                            width: 36px;
                            height: 36px;
                            border-radius: 50%;
                            object-fit: cover;
                            transition: all 0.4s ease;
                            position: relative;
                            z-index: 2;
                            border: 1px solid rgba(255, 255, 255, 0.1);
                        }
 
                        /* Luxury Particles */
                        .luxury-particle {
                            position: absolute;
                            background: radial-gradient(circle, #ffd700 30%, transparent 70%);
                            border-radius: 50%;
                            animation: luxury-orbits 6s linear infinite;
                            filter: blur(1px);
                            opacity: 0.8;
                        }
 
                        .lp1 {
                            width: 3px;
                            height: 3px;
                            top: 10%;
                            left: 20%;
                        }
 
                        .lp2 {
                            width: 4px;
                            height: 4px;
                            top: 70%;
                            left: 75%;
                        }
 
                        .lp3 {
                            width: 2px;
                            height: 2px;
                            top: 40%;
                            left: 65%;
                        }
 
                        .lp4 {
                            width: 3px;
                            height: 3px;
                            top: 80%;
                            left: 30%;
                        }
 
                        /* Animations */
                        @keyframes frame-pulse {
 
                            0%,
                            100% {
                                transform: scale(1);
                                box-shadow: 0 0 20px rgba(218, 165, 32, 0.3);
                            }
 
                            50% {
                                transform: scale(1.02);
                                box-shadow: 0 0 30px rgba(218, 165, 32, 0.5);
                            }
                        }
 
                        @keyframes luxury-orbits {
                            0% {
                                transform: rotate(0deg) translateX(12px) rotate(0deg);
                            }
 
                            100% {
                                transform: rotate(360deg) translateX(12px) rotate(-360deg);
                            }
                        }
 
                        /* Hover Effects */
                        .luxury-logo-container:hover .luxury-frame {
                            animation: frame-pulse 1s ease-in-out infinite;
                            transform: scale(1.06);
                        }
 
                        .luxury-logo-container:hover .luxury-logo-image {
                            transform: rotate(5deg) scale(1.05);
                        }
 
                        .luxury-logo-container:hover .luxury-particle {
                            animation-duration: 3s;
                            opacity: 1;
                        }
 
                        /* Golden Shine Effect */
                        .luxury-frame::after {
                            content: '';
                            position: absolute;
                            top: -2px;
                            left: -2px;
                            right: -2px;
                            bottom: -2px;
                            border-radius: 50%;
                            background: linear-gradient(45deg,
                                    transparent 0%,
                                    rgba(255, 215, 0, 0.2) 50%,
                                    transparent 100%);
                            animation: golden-shine 3s linear infinite;
                            z-index: 1;
                        }
 
                        @keyframes golden-shine {
                            0% {
                                transform: rotate(0deg);
                                opacity: 0;
                            }
 
                            25% {
                                opacity: 0.6;
                            }
 
                            50% {
                                opacity: 0;
                            }
 
                            100% {
                                transform: rotate(360deg);
                                opacity: 0;
                            }
                        }
 
                        /* Mobile Optimization */
                        @media (max-width: 768px) {
                            .luxury-frame {
                                width: 40px;
                                height: 40px;
                            }
 
                            .luxury-logo-image {
                                width: 32px;
                                height: 32px;
                            }
                        }
                    </style>
                    <!-- Dark Mode -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="dark_mode_toggle">
                        <i class="far fa-moon"></i>
                    </button>
                    <!-- END Dark Mode -->
                    <!--just a space character to sperate the icons -->
                     
                    <!--just a space character to sperate the icons -->
                    <!-- Notifications Dropdown -->
                    <div class="dropdown d-inline-block me-2">
                        <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-bell"></i>
                            <span class="text-primary">•</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg p-0 border-0 fs-sm" aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-2 bg-body-light border-bottom text-center rounded-top">
                                <h5 class="dropdown-header text-uppercase">Notifications Center</h5>
                            </div>
                            <ul class="nav-items mb-0">
                            </ul>
                            <!--
                    <div class="p-2 border-top text-center">
                        <a class="d-inline-block fw-medium" href="javascript:void(0)">
                            <i class="fa fa-fw fa-arrow-down me-1 opacity-50"></i> Load More..
                        </a>
                    </div>-->
                        </div>
                    </div>
                    <!-- END Notifications Dropdown -->
                </div>
                <!-- END Left Section -->
 
                <!-- Right Section -->
                <div class="d-flex align-items-center">
                    <!-- Open Search Section (visible on smaller screens) -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
 
 
 
 
                    <!-- User Dropdown -->
                    <div class="dropdown d-inline-block ms-2">
                        <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle" src="https://png.pngtree.com/png-vector/20240612/ourmid/pngtree-monkey-smoke-sigarate-png-image12720609.png" alt="Header Avatar" style="width: 21px;" />
                            <span class="d-none d-sm-inline-block ms-2">HustlersFathers</span>
                            <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block opacity-50 ms-1"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0" aria-labelledby="page-header-user-dropdown">
                            <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                                <img class="img-avatar img-avatar48 img-avatar-thumb" src="https://png.pngtree.com/png-vector/20240612/ourmid/pngtree-monkey-smoke-sigarate-png-image12720609.png" alt="WaXa Trusted Group">
                                <p class="mt-2 mb-0 fw-medium">Username : HustlersFathers</p>
                                <p class="mb-0 text-muted fs-sm fw-medium">Account Type : user</p>
                            </div>
                            <div class="p-2">
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="https://waxa.pw/add-balance">
                                    <span class="fs-sm fw-medium">Balance</span>
                                    <span class="nav-main-link-badge badge rounded-pill bg-success">0 USD</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="https://waxa.pw/become-premium">
                                    <span class="fs-sm fw-medium">Premium</span>
                                    <span class="badge rounded-pill bg-info ms-2">normal</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="https://waxa.pw/orders">
                                    <span class="fs-sm fw-medium">Orders</span>
                                    <span class="badge rounded-pill bg-primary ms-2">1</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="https://waxa.pw/tickets">
                                    <span class="fs-sm fw-medium">Tickets</span>
                                    <span class="badge rounded-pill bg-danger ms-2">1</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="https://waxa.pw/reports">
                                    <span class="fs-sm fw-medium">Reports</span>
                                    <span class="badge rounded-pill bg-danger ms-2">1</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="https://waxa.pw/profile">
                                    <span class="fs-sm fw-medium">Settings</span>
                                </a>
                            </div>
                            <div role="separator" class="dropdown-divider m-0"></div>
                            <div class="p-2">
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="https://waxa.pw/faq">
                                    <span class="fs-sm fw-medium">FAQ</span>
                                </a>
 
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="https://waxa.pw/logout" method="POST">
                                    <input type="hidden" name="_token" value="b2QSaj6fc8ld60aMUUwFN0Wz2JzZPkDb7ozaz28o" autocomplete="off"> <span class="fs-sm fw-medium">Log Out</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- END User Dropdown -->
                </div>
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->
 
            <!-- Header Search -->
            <div id="page-header-search" class="overlay-header bg-body-extra-light">
                <div class="content-header">
                    <form class="w-100" action="bd_search.html" method="POST">
                        <div class="input-group">
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <button type="button" class="btn btn-alt-danger" data-toggle="layout" data-action="header_search_off">
                                <i class="fa fa-fw fa-times-circle"></i>
                            </button>
                            <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input" />
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Header Search -->
 
            <!-- Header Loader -->
            <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
            <div id="page-header-loader" class="overlay-header bg-primary-lighter">
                <div class="content-header">
                    <div class="w-100 text-center">
                        <i class="fa fa-fw fa-circle-notch fa-spin text-primary"></i>
                    </div>
                </div>
            </div>
            <!-- END Header Loader -->
        </header>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.css">
        <div class='notifications top-right'></div>
        <script>
        </script>
        <main id="main-container">
            <div class="bg-primary-darker">
                <div class="bg-black-10">
                    <div class="content py-3">
                        <!-- Toggle Main Navigation -->
                        <div class="d-lg-none">
                            <!-- Class Toggle, functionality initialized in Helpers.oneToggleClass() -->
                            <button type="button" class="btn w-100 btn-alt-secondary d-flex justify-content-between align-items-center" data-toggle="class-toggle" data-target="#main-navigation" data-class="d-none">
                                Menu
                                <i class="fa fa-bars"></i>
                            </button>
                        </div>
                        <!-- END Toggle Main Navigation -->
 
                        <!-- Main Navigation -->
                        <div id="main-navigation" class="d-none d-lg-block mt-2 mt-lg-0">
                            <ul class="nav-main nav-main-dark nav-main-horizontal nav-main-hover">
                                <ul class="nav-main nav-main-horizontal nav-main-hover nav-main-dark">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link active" href="https://waxa.pw/main">
                                            <i class="nav-main-link-icon si si-wallet"></i>
                                            <span class="nav-main-link-name">Balance</span>
                                            <span class="nav-main-link-badge badge rounded-pill bg-primary">0 $</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-heading">Manage</li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                            <i class="nav-main-link-icon fa fa-briefcase"></i>
                                            <span class="nav-main-link-name">Products</span>
                                        </a>
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                                    <i class="nav-main-link-icon fa fa-server"></i>
                                                    <span class="nav-main-link-name">Hosts</span>
                                                </a>
                                                <ul class="nav-main-submenu">
                                                    <li class="nav-main-item">
                                                        <a class="nav-main-link" href="https://waxa.pw/rdp">
                                                            <i class="nav-main-link-icon fa fa-desktop"></i>
                                                            <span class="nav-main-link-name">Remote Desktop</span>
                                                            <span class="nav-main-link-badge badge rounded-pill bg-primary">1</span>
 
                                                        </a>
                                                    </li>
                                                    <li class="nav-main-item">
                                                        <a class="nav-main-link" href="https://waxa.pw/shells">
                                                            <i class="nav-main-link-icon fab fa-php"></i>
                                                            <span class="nav-main-link-name">Shells</span>
                                                            <span class="nav-main-link-badge badge rounded-pill bg-primary">25</span>
 
                                                        </a>
                                                    </li>
                                                    <li class="nav-main-item">
                                                        <a class="nav-main-link" href="https://waxa.pw/cpanels">
                                                            <i class="nav-main-link-icon fab fa-cpanel"></i>
                                                            <span class="nav-main-link-name">cPanels</span>
                                                            <span class="nav-main-link-badge badge rounded-pill bg-primary">179</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-main-item">
                                                        <a class="nav-main-link" href="https://waxa.pw/ssh">
                                                            <i class="nav-main-link-icon fab fa-linux"></i>
                                                            <span class="nav-main-link-name">SSHs</span>
                                                            <span class="nav-main-link-badge badge rounded-pill bg-primary">1</span>
                                                        </a>
                                                    </li>
 
 
                                                </ul>
                                            </li>
                                            <li class="nav-main-item">
                                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                                    <i class="nav-main-link-icon fa fa-paper-plane"></i>
                                                    <span class="nav-main-link-name">Senders</span>
                                                </a>
                                                <ul class="nav-main-submenu">
                                                    <li class="nav-main-item">
                                                        <a class="nav-main-link" href="https://waxa.pw/mailer">
                                                            <i class="nav-main-link-icon fa fa-leaf"></i>
                                                            <span class="nav-main-link-name">Mailers</span>
                                                            <span class="nav-main-link-badge badge rounded-pill bg-primary">3</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-main-item">
                                                        <a class="nav-main-link" href="https://waxa.pw/smtp">
                                                            <i class="nav-main-link-icon fab fa-mailchimp"></i>
                                                            <span class="nav-main-link-name">SMTPs</span>
                                                            <span class="nav-main-link-badge badge rounded-pill bg-primary">1</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nav-main-item">
                                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                                    <i class="nav-main-link-icon si si-envelope-letter"></i>
                                                    <span class="nav-main-link-name">WebMails</span>
                                                </a>
                                                <ul class="nav-main-submenu">
                                                    <li class="nav-main-item">
                                                        <a class="nav-main-link" href="https://waxa.pw/webmail">
                                                            <i class="nav-main-link-icon fab fa-cpanel fa-2x"></i>
                                                            <span class="nav-main-link-name">cPanel</span>
                                                            <span class="nav-main-link-badge badge rounded-pill bg-primary">0</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-main-item">
                                                        <a class="nav-main-link" href="https://waxa.pw/webmail">
                                                            <i class="nav-main-link-icon fab fa-microsoft"></i>
                                                            <span class="nav-main-link-name">Office365</span>
                                                            <span class="nav-main-link-badge badge rounded-pill bg-primary">0</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-main-item">
                                                        <a class="nav-main-link" href="https://waxa.pw/webmail">
                                                            <i class="nav-main-link-icon fab fa-golang"></i>
                                                            <span class="nav-main-link-name">GoDaddy</span>
                                                            <span class="nav-main-link-badge badge rounded-pill bg-primary">0</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-main-item">
                                                        <a class="nav-main-link" href="https://waxa.pw/webmail">
                                                            <i class="nav-main-link-icon fa fa-1x fa-info"></i>
                                                            <span class="nav-main-link-name">IONOS</span>
                                                            <span class="nav-main-link-badge badge rounded-pill bg-primary">0</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-main-item">
                                                        <a class="nav-main-link" href="https://waxa.pw/webmail">
                                                            <i class="nav-main-link-icon fa fa-1x fa-shuttle-space"></i>
                                                            <span class="nav-main-link-name">Rackspace</span>
                                                            <span class="nav-main-link-badge badge rounded-pill bg-primary">0</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
 
                                        </ul>
                                    </li>
                                    <li class="nav-main-heading">Accounts</li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="https://waxa.pw/account">
                                            <i class="nav-main-link-icon fa fa-universal-access"></i>
                                            <span class="nav-main-link-name">Accounts</span>
                                        </a>
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                <a class="nav-main-link" href="https://waxa.pw/account">
                                                    <i class="nav-main-link-icon fa fa-people-group"></i>
                                                    <span class="nav-main-link-name">Main Sections</span>
                                                </a>
                                            </li>
                                            <li class="nav-main-item">
                                                <a class="nav-main-link" href="https://waxa.pw/account?parent_id=3">
                                                    <i class="nav-main-link-icon fab fa-facebook"></i>
                                                    <span class="nav-main-link-name">Social Media</span>
                                                </a>
                                            </li>
                                            <li class="nav-main-item">
                                                <a class="nav-main-link" href="https://waxa.pw/account?parent_id=9">
                                                    <i class="nav-main-link-icon fab fa-magento"></i>
                                                    <span class="nav-main-link-name">Marketing</span>
                                                </a>
                                            </li>
                                            <li class="nav-main-item">
                                                <a class="nav-main-link" href="https://waxa.pw/account?parent_id=1">
                                                    <i class="nav-main-link-icon fa fa-gamepad"></i>
                                                    <span class="nav-main-link-name">Games</span>
                                                </a>
                                            </li>
                                            <li class="nav-main-item">
                                                <a class="nav-main-link" href="https://waxa.pw/account?parent_id=15">
                                                    <i class="nav-main-link-icon fa fa-mobile-button"></i>
                                                    <span class="nav-main-link-name">Mobile Games</span>
                                                </a>
                                            </li>
                                            <li class="nav-main-item">
                                                <a class="nav-main-link" href="https://waxa.pw/account?parent_id=11">
                                                    <i class="nav-main-link-icon fab fa-twitch"></i>
                                                    <span class="nav-main-link-name">Streaming</span>
                                                </a>
                                            </li>
                                            <li class="nav-main-item">
                                                <a class="nav-main-link" href="https://waxa.pw/account?parent_id=12">
                                                    <i class="nav-main-link-icon fa fa-restroom"></i>
                                                    <span class="nav-main-link-name">Dating</span>
                                                </a>
                                            </li>
                                            <li class="nav-main-item">
                                                <a class="nav-main-link" href="https://waxa.pw/account?parent_id=10">
                                                    <i class="nav-main-link-icon fab fa-btc"></i>
                                                    <span class="nav-main-link-name">Cryptocurrency</span>
                                                </a>
                                            </li>
                                            <li class="nav-main-item">
                                                <a class="nav-main-link" href="https://waxa.pw/account?parent_id=13">
                                                    <i class="nav-main-link-icon fab fa-youtube"></i>
                                                    <span class="nav-main-link-name">Entertainment</span>
                                                </a>
                                            <li class="nav-main-item">
                                                <a class="nav-main-link" href="https://waxa.pw/account?parent_id=14">
                                                    <i class="nav-main-link-icon fa fa-robot"></i>
                                                    <span class="nav-main-link-name">Artificial intelligence</span>
                                                </a>
                                            </li>
                                    </li>
                                </ul>
                                </li>
                                <li class="nav-main-heading">Services</li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                        <i class="nav-main-link-icon fab fa-searchengin"></i>
                                        <span class="nav-main-link-name">Services</span>
                                    </a>
                                    <ul class="nav-main-submenu">
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="javascript:void(0)">
                                                <i class="nav-main-link-icon fa fa-pencil-alt"></i>
                                                <span class="nav-main-link-name">Telegram Services</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="javascript:void(0)">
                                                <i class="nav-main-link-icon fa fa-chart-line"></i>
                                                <span class="nav-main-link-name">Social Media Services</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="javascript:void(0)">
                                                <i class="nav-main-link-icon fa fa-chart-area"></i>
                                                <span class="nav-main-link-name">Backlinks Services</span>
                                                <span class="nav-main-link-badge badge rounded-pill bg-primary">920</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="javascript:void(0)">
                                                <i class="nav-main-link-icon far fa-images"></i>
                                                <span class="nav-main-link-name">Traffic Services</span>
                                                <span class="nav-main-link-badge badge rounded-pill bg-primary">7</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            </li>
                            <li class="nav-main-heading">Games</li>
                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon si si-diamond"></i>
                                    <span class="nav-main-link-name">Games</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="bd_simple1.html">
                                            <i class="nav-main-link-icon fa fa-server"></i>
                                            <span class="nav-main-link-name"> Rock-Paper-Scissors </span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="bd_simple2.html">
                                            <i class="nav-main-link-icon fa fa-server"></i>
                                            <span class="nav-main-link-name">Dice</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="bd_image1.html">
                                            <i class="nav-main-link-icon fa fa-server"></i>
                                            <span class="nav-main-link-name">Heads / Tails</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="bd_image2.html">
                                            <i class="nav-main-link-icon fa fa-server"></i>
                                            <span class="nav-main-link-name">Soon 2</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="bd_video1.html">
                                            <i class="nav-main-link-icon fa fa-server"></i>
                                            <span class="nav-main-link-name">Soon 1</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="bd_video2.html">
                                            <i class="nav-main-link-icon fa fa-server"></i>
                                            <span class="nav-main-link-name">Soon 2</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                            <span class="nav-main-link-name">More Options</span>
                                        </a>
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                <a class="nav-main-link" href="javascript:void(0)">
                                                    <i class="nav-main-link-icon fa fa-server"></i>
                                                    <span class="nav-main-link-name">Soon</span>
                                                </a>
                                            </li>
                                            <li class="nav-main-item">
                                                <a class="nav-main-link" href="javascript:void(0)">
                                                    <i class="nav-main-link-icon fa fa-server"></i>
                                                    <span class="nav-main-link-name">Soon</span>
                                                </a>
                                            </li>
                                            <li class="nav-main-item">
                                                <a class="nav-main-link" href="javascript:void(0)">
                                                    <i class="nav-main-link-icon fa fa-server"></i>
                                                    <span class="nav-main-link-name">Soon</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-main-heading">Themes</li>
                            <li class="nav-main-item ms-lg-auto">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fa fa-brush"></i>
                                    <span class="nav-main-link-name d-lg-none">Themes</span>
                                </a>
                                <ul class="nav-main-submenu nav-main-submenu-right">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" data-toggle="theme" data-theme="default" href="#">
                                            <i class="nav-main-link-icon fa fa-square text-default"></i>
                                            <span class="nav-main-link-name">Default</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" data-toggle="theme" data-theme="assets/css/themes/amethyst.min.css" href="#">
                                            <i class="nav-main-link-icon fa fa-square text-amethyst"></i>
                                            <span class="nav-main-link-name">Amethyst</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" data-toggle="theme" data-theme="assets/css/themes/city.min.css" href="#">
                                            <i class="nav-main-link-icon fa fa-square text-city"></i>
                                            <span class="nav-main-link-name">City</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" data-toggle="theme" data-theme="assets/css/themes/flat.min.css" href="#">
                                            <i class="nav-main-link-icon fa fa-square text-flat"></i>
                                            <span class="nav-main-link-name">Flat</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" data-toggle="theme" data-theme="assets/css/themes/modern.min.css" href="#">
                                            <i class="nav-main-link-icon fa fa-square text-modern"></i>
                                            <span class="nav-main-link-name">Modern</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" data-toggle="theme" data-theme="assets/css/themes/smooth.min.css" href="#">
                                            <i class="nav-main-link-icon fa fa-square text-smooth"></i>
                                            <span class="nav-main-link-name">Smooth</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            </ul>
                        </div>
                        <!-- END Main Navigation -->
                    </div>
                </div>
            </div>
            <main id="main-container">
                <!-- Page Content -->
                <!-- Hero -->
                <div class="bg-body-light">
                    <div class="content content-full">
                        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                            <div class="flex-grow-1">
                                <h1 class="h3 fw-bold mb-1">
                                    Orders Manager
                                </h1>
                                <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                                    That feeling of money when you start using your orders.
                                </h2>
                            </div>
                            <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-alt">
                                    <li class="breadcrumb-item">
                                        <a class="link-fx" href="https://waxa.pw/main">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        MyOrders
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->
 
                <div class="content">
                    <!-- Quick Overview -->
                    <div class="row g-3 mb-4 mt-3">
                        <div class="col-6 col-lg-3">
                            <div class="block block-rounded block-link-pop bg-body-extra-light h-100 mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Total Orders">
                                <div class="block-content block-content-full p-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="fs-sm fw-semibold text-uppercase text-muted mb-2">
                                                <i class="fas fa-shopping-cart me-1 animate-slide"></i> All Orders
                                            </div>
                                            <div class="fs-2 fw-bold text-primary">
                                                <span class="count-up">0</span>
                                            </div>
                                        </div>
                                        <i class="fas fa-chart-line fa-2x text-primary opacity-25 animate-float"></i>
                                    </div>
                                </div>
                                <div class="block-content py-2 bg-body-light">
                                    <p class="fw-medium fs-sm text-primary mb-0">
                                        <i class="fas fa-arrow-up me-1"></i> Total Orders
                                    </p>
                                </div>
                            </div>
                        </div>
 
                        <div class="col-6 col-lg-3">
                            <div class="block block-rounded block-link-pop bg-body-extra-light h-100 mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Total Completed Orders">
                                <div class="block-content block-content-full p-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="fs-sm fw-semibold text-uppercase text-muted mb-2">
                                                <i class="fas fa-check-circle me-1 animate-bounce"></i> Completed
                                            </div>
                                            <div class="fs-2 fw-bold text-success">
                                                <span class="count-up">3</span>
                                            </div>
                                        </div>
                                        <i class="fas fa-clipboard-check fa-2x text-success opacity-25 animate-float"></i>
                                    </div>
                                </div>
                                <div class="block-content py-2 bg-body-light">
                                    <p class="fw-medium fs-sm text-success mb-0">
                                        <i class="fas fa-arrow-up me-1"></i> Successful Orders
                                    </p>
                                </div>
                            </div>
                        </div>
 
                        <div class="col-6 col-lg-3">
                            <div class="block block-rounded block-link-pop bg-body-extra-light h-100 mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Total Reported Orders">
                                <div class="block-content block-content-full p-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="fs-sm fw-semibold text-uppercase text-muted mb-2">
                                                <i class="fas fa-exclamation-triangle me-1 animate-pulse"></i> Reported
                                            </div>
                                            <div class="fs-2 fw-bold text-danger">
                                                <span class="count-up">3</span>
                                            </div>
                                        </div>
                                        <i class="fas fa-bug fa-2x text-danger opacity-25 animate-float"></i>
                                    </div>
                                </div>
                                <div class="block-content py-2 bg-body-light">
                                    <p class="fw-medium fs-sm text-danger mb-0">
                                        <i class="fas fa-arrow-up me-1"></i> Issues Reported
                                    </p>
                                </div>
                            </div>
                        </div>
 
                        <div class="col-6 col-lg-3">
                            <div class="block block-rounded block-link-pop bg-body-extra-light h-100 mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Total Rejected Reports">
                                <div class="block-content block-content-full p-3">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <div class="fs-sm fw-semibold text-uppercase text-muted mb-2">
                                                <i class="fas fa-times-circle me-1 animate-spin"></i> Rejected
                                            </div>
                                            <div class="fs-2 fw-bold text-warning">
                                                <span class="count-up">3</span>
                                            </div>
                                        </div>
                                        <i class="fas fa-ban fa-2x text-warning opacity-25 animate-float"></i>
                                    </div>
                                </div>
                                <div class="block-content py-2 bg-body-light">
                                    <p class="fw-medium fs-sm text-warning mb-0">
                                        <i class="fas fa-arrow-up me-1"></i> Rejected Reports
                                    </p>
                                </div>
                            </div>
                        </div>
                    </<?php
ob_start();
session_start();
error_reporting();
date_default_timezone_set('UTC');
include "includes/config.php";

if (!isset($_SESSION['sname']) and !isset($_SESSION['spass'])) {
    header("location: ../");
    exit();
}
?>
<script>
function sendt(id){

    var sub = $("#subject"+id).val();
    var msg = $("#msg"+id).val();
    var pr = $("#proi"+id).val();
     $.ajax({
     method:"GET",
     url:"CreateReport.html?id="+id+"&m="+btoa(msg),
     dataType:"text",
     success:function(data){
     $("#resulta"+id).html(data).show();
     },
   });
}

    </script>
<div class="well well">
<h2><center><small><font color="#080C39"><span class="glyphicon glyphicon-shopping-cart"></span></small></font> My Orders	</h2>
<p align="center">You can only report a bad tool within <b>10 hours</b> by clicking on <a class="btn btn-primary btn-xs"><font color=white>Report #[Order Id]</a></font> , Otherwise we can't give you refund or replacement!</p>
                    </div>

<table width="100%" class="table table-striped table-bordered table-condensed" id="table">
						
					<thead>
            <tr>
  <th scope="col">ID</th>
  <th scope="col">Type</th>
  <th scope="col">Item</th>
  <th scope="col">Open</th>
  <th scope="col">Price</th>
  <th scope="col">Seller</th>
  <th scope="col">Report</th>
   <th scope="col">Date</th>
            </tr>
        </thead>
 <tbody id='tbody2'>
 <?php
$real_data = date("Y-m-d H:i:s");
$usrid     = mysqli_real_escape_string($dbcon, $_SESSION['sname']);
$q = mysqli_query($dbcon, "SELECT * FROM purchases WHERE buyer='$usrid' ORDER BY id DESC") or die(mysql_error());

while ($row = mysqli_fetch_assoc($q)) {
    $idorder   = $row['id'];
    $toollink1 = $row['url'];
    $sidd      = $row['s_id'];
    $type      = $row['type'];
    $info      = $row['url'];
    $desc      = $row['infos'];
    echo "<tr>
	    <td> " . $row['id'] . " </td>
    <td> " . strtoupper($row['type']) . " </td>
    <td> " . $row['url'] . " </td>";
?>
    <td> 
<button onclick="openitem(<?php echo $idorder; ?>)" class="btn btn-primary btn-xs"> Open #<?php echo $idorder; ?></button>

    <?php
	 	 	    $qer = mysqli_query($dbcon, "SELECT * FROM resseller WHERE username='".$row['resseller']."'")or die(mysql_error());
		   while($rpw = mysqli_fetch_assoc($qer))
			 $SellerNick = "seller".$rpw["id"]."";
    echo "
    <td> " . $row['price'] . "</td>
	    <td> " . $SellerNick . "</td>
    <td> ";
	$pending= 0;
    $date_purchased = $row['date'];
    $endTime        = strtotime("+600 minutes", strtotime($date_purchased));
    $data_plus      = date('Y-m-d H:i:s', $endTime);
    if (($real_data > $data_plus) && ($row['reported'] == "")) {
        echo 'Time expired';
    } else {
        if ($row['reported'] == "1") {
            $qrrr = mysqli_query($dbcon, "SELECT * FROM reports WHERE s_id='$sidd' and uid='$usrid'") or die(mysqli_error());
            while ($rowe = mysqli_fetch_assoc($qrrr)) {
                $idreport = $rowe['id'];
                echo "<font color='green'><a href='vr-$idreport.html'><u>#$idreport</u></font></a>";
            }
        } else {
            echo '<a data-toggle="modal" class="btn btn-primary btn-xs" data-target="#myModald' . $row["id"] . '" >
<font color=white>Report #[' . $idorder . '] </a></center>';
        }
    }
    echo "</td>
		    <td> " . $row['date'] . "</td>
    </tr>";
    
    echo '
 
<div class="modal fade" id="myModald' . $row['id'] . '" >
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">
                                              Report Form
                                            </h4>
                                        </div>
                                        <div class="modal-body">
<div class="well well-sm">
  <h4><b>Report Of Order #' . $row['id'] . ' </b></h4>
  <p>Please write clearly what is wrong with this <b>'.$row['type'].'</b> and why you want to refund it</p>
</div>
<div id="resulta' . $row['id'] . '">
<div class="input-group">
    <textarea id="msg' . $row['id'] . '"  class="form-control custom-control" rows="3" name="memo" style="resize:none" required=""></textarea>     
    <span id="xreport" class="input-group-addon btn btn-primary" onclick="this.disabled=true;javascript:sendt(' . $row['id'] . ');">Submit</span>
</div>
</div>
</div>
<div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
';
    
    
}
?>

 </tbody>
 </table>
</div>


<script type="text/javascript">
function openitem(order){
  $("#myModalHeader").text('Order #'+order);
  $('#myModal').modal('show');
  $.ajax({
    type:       'GET',
    url:        'showOrder'+order+'.html',
    success:    function(data)
    {
        $("#modelbody").html(data).show();
    }});

}
</script>

                    <style>
                        @keyframes float {
 
                            0%,
                            100% {
                                transform: translateY(0);
                            }
 
                            50% {
                                transform: translateY(-8px);
                            }
                        }
 
                        @keyframes slide {
 
                            0%,
                            100% {
                                transform: translateX(0);
                            }
 
                            50% {
                                transform: translateX(5px);
                            }
                        }
 
                        @keyframes bounce {
 
                            0%,
                            100% {
                                transform: translateY(0);
                            }
 
                            50% {
                                transform: translateY(-5px);
                            }
                        }
 
                        @keyframes pulse {
 
                            0%,
                            100% {
                                transform: scale(1);
                            }
 
                            50% {
                                transform: scale(1.2);
                            }
                        }
 
                        @keyframes spin {
                            0% {
                                transform: rotate(0deg);
                            }
 
                            100% {
                                transform: rotate(360deg);
                            }
                        }
 
                        @keyframes tilt {
                            0% {
                                transform: perspective(1000px) rotateX(0deg) rotateY(0deg);
                            }
 
                            100% {
                                transform: perspective(1000px) rotateX(2deg) rotateY(2deg);
                            }
                        }
 
                        /* Animation Classes */
                        .animate-float {
                            animation: float 3s ease-in-out infinite;
                        }
 
                        .animate-slide {
                            animation: slide 2s ease-in-out infinite;
                        }
 
                        .animate-bounce {
                            animation: bounce 1.5s ease-in-out infinite;
                        }
 
                        .animate-pulse {
                            animation: pulse 1.5s infinite linear;
                        }
 
                        .animate-spin {
                            animation: spin 2s linear infinite;
                        }
 
                        /* Block Styles */
                        .block-link-pop {
                            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                            transform-style: preserve-3d;
                            position: relative;
                            overflow: hidden;
                            border: 1px solid rgba(0, 0, 0, 0.075);
                            cursor: pointer;
                        }
 
                        .block-link-pop:hover {
                            transform: perspective(1000px) rotateX(2deg) rotateY(2deg) scale(1.02);
                            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
                        }
 
                        .block-link-pop::before {
                            content: '';
                            position: absolute;
                            top: 0;
                            left: 0;
                            right: 0;
                            bottom: 0;
                            background: linear-gradient(45deg,
                                    rgba(255, 255, 255, 0.1) 0%,
                                    rgba(255, 255, 255, 0.2) 50%,
                                    rgba(255, 255, 255, 0.1) 100%);
                            opacity: 0;
                            transition: opacity 0.3s ease;
                            pointer-events: none;
                        }
 
                        .block-link-pop:hover::before {
                            opacity: 1;
                        }
 
                        /* General Styles */
                        .bg-body-extra-light {
                            background-color: rgba(248, 249, 250, 0.8);
                            backdrop-filter: blur(10px);
                        }
 
                        .count-up {
                            display: inline-block;
                            font-variant-numeric: tabular-nums;
                            min-width: 60px;
                        }
 
                        .row.mb-4 {
                            margin-bottom: 1.5rem !important;
                        }
 
                        .row.mt-3 {
                            margin-top: 1rem !important;
                        }
 
                        .mb-2 {
                            margin-bottom: 0.5rem !important;
                        }
                    </style>
                    <!-- END Quick Overview -->
 
 
 
                    <!-- All Products -->
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">All Orders</h3>
                            <div class="block-options">
                                <div class="dropdown">
                                    <button type="button" class="btn-block-option" id="dropdown-ecom-filters" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Filters <i class="fa fa-angle-down ms-1"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-ecom-filters">
                                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                            Active Tickets
                                            <span class="badge bg-success rounded-pill">260</span>
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                            Pending Tickets
                                            <span class="badge bg-danger rounded-pill">24</span>
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                            Closed Tickets
                                            <span class="badge bg-primary rounded-pill">14503</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-content">
 
                            <!-- All Products Table -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-vcenter js-dataTable-full" id="userorders-table">
                                    <thead>
                                        <tr>
                                            <th title="Id">Id</th>
                                            <th title="Type">Type</th>
                                            <th title="Price">Price</th>
                                            <th title="Website">Website</th>
                                            <th title="Login">Login</th>
                                            <th title="Pass">Pass</th>
                                            <th title="Country">Country</th>
                                            <th title="Status" width="10">Status</th>
                                            <th title="Purshased">Purshased</th>
                                            <th title="Creation Date">Creation Date</th>
                                            <th title="Updated At">Updated At</th>
                                            <th title="View" width="10%">View</th>
                                            <th title="Report" width="15%">Report</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <!-- END All Products Table -->
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
        </main>
        <!-- Footer -->
        <footer id="page-footer" class="bg-body-extra-light">
            <div class="content py-3">
                <div class="row fs-sm">
                    <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
                        Page Loaded in 0.533 Seconds
                    </div>
                    <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
                        <a class="fw-semibold" href="https://waxa.pw/main" target="_blank">WaXa V1.0</a> © <span data-toggle="year-copy"></span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END Footer -->
    </div>
 
    <!-- Include jQuery first -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Then include Bootstrap Notify -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.js"></script>
 
    <!-- OneUI JS -->
    <script src="https://waxa.pw/assets/js/oneui.app.min.js"></script>
    <!-- Page JS Plugins -->
    <script src="https://waxa.pw/assets/js/plugins/chart.js/chart.umd.js"></script>
    <script src="https://waxa.pw/assets/js/lib/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="https://waxa.pw/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="https://waxa.pw/assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://waxa.pw/assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="https://waxa.pw/assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="https://waxa.pw/assets/js/plugins/datatables-buttons/dataTables.buttons.min.js"></script>
    <script src="https://waxa.pw/assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="https://waxa.pw/assets/js/plugins/datatables-buttons-jszip/jszip.min.js"></script>
    <script src="https://waxa.pw/assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js"></script>
    <script src="https://waxa.pw/assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js"></script>
    <script src="https://waxa.pw/assets/js/plugins/datatables-buttons/buttons.print.min.js"></script>
    <script src="https://waxa.pw/assets/js/plugins/datatables-buttons/buttons.html5.min.js"></script>
    <script src="https://waxa.pw/assets/js/plugins/flatpickr/flatpickr.min.js"></script>
    <script src="https://waxa.pw/assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="https://waxa.pw/assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    <script src="https://waxa.pw/assets/js/plugins/select2/js/select2.full.min.js"></script>
    <script src="https://waxa.pw/assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js"></script>
    <script src="https://waxa.pw/assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
    <script src="https://waxa.pw/assets/js/plugins/dropzone/min/dropzone.min.js"></script>
    <script src="https://waxa.pw/assets/js/pages/be_pages_dashboard_v1.min.js"></script>
    <script src="https://waxa.pw/assets/js/plugins/slick-carousel/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        One.helpersOnLoad(['js-flatpickr', 'jq-datepicker', 'jq-maxlength', 'jq-select2', 'jq-masked-inputs', 'jq-rangeslider', 'jq-slick']);
    </script>
    <script type="module">
        $(function() {
            window.LaravelDataTables = window.LaravelDataTables || {};
            window.LaravelDataTables["userorders-table"] = $("#userorders-table").DataTable({
                "serverSide": true,
                "processing": true,
                "ajax": {
                    "url": "https:\/\/waxa.pw\/orders",
                    "type": "GET",
                    "data": function(data) {
                        for (var i = 0, len = data.columns.length; i < len; i++) {
                            if (!data.columns[i].search.value) delete data.columns[i].search;
                            if (data.columns[i].searchable === true) delete data.columns[i].searchable;
                            if (data.columns[i].orderable === true) delete data.columns[i].orderable;
                            if (data.columns[i].data === data.columns[i].name) delete data.columns[i].name;
                        }
                        delete data.search.regex;
                    }
                },
                "columns": [{
                    "data": "id",
                    "name": "id",
                    "title": "Id",
                    "orderable": true,
                    "searchable": true,
                    "className": "text-center"
                }, {
                    "data": "type",
                    "name": "type",
                    "title": "Type",
                    "orderable": true,
                    "searchable": true,
                    "className": "text-center"
                }, {
                    "data": "price",
                    "name": "price",
                    "title": "Price",
                    "orderable": true,
                    "searchable": true,
                    "className": "text-center"
                }, {
                    "data": "url",
                    "name": "url",
                    "title": "Website",
                    "orderable": true,
                    "searchable": true,
                    "className": "text-center"
                }, {
                    "data": "login",
                    "name": "login",
                    "title": "Login",
                    "orderable": true,
                    "searchable": true,
                    "visible": false
                }, {
                    "data": "pass",
                    "name": "pass",
                    "title": "Pass",
                    "orderable": true,
                    "searchable": true,
                    "visible": false
                }, {
                    "data": "country",
                    "name": "country",
                    "title": "Country",
                    "orderable": true,
                    "searchable": true,
                    "visible": false
                }, {
                    "data": "report_status",
                    "name": "report_status",
                    "title": "Status",
                    "orderable": true,
                    "searchable": true,
                    "width": 10,
                    "className": "text-center"
                }, {
                    "data": "created_at",
                    "name": "created_at",
                    "title": "Purshased",
                    "orderable": true,
                    "searchable": true,
                    "className": "text-center"
                }, {
                    "data": "creation_date",
                    "name": "creation_date",
                    "title": "Creation Date",
                    "orderable": true,
                    "searchable": true,
                    "visible": false
                }, {
                    "data": "updated_at",
                    "name": "updated_at",
                    "title": "Updated At",
                    "orderable": true,
                    "searchable": true,
                    "visible": false
                }, {
                    "data": "view",
                    "name": "view",
                    "title": "View",
                    "orderable": false,
                    "searchable": false,
                    "width": "10%",
                    "className": "text-center"
                }, {
                    "data": "report",
                    "name": "report",
                    "title": "Report",
                    "orderable": false,
                    "searchable": false,
                    "width": "15%",
                    "className": "text-center"
                }],
                "dom": "Bfrtip",
                "order": [0, "desc"],
                "select": {
                    "style": "single"
                },
                "responsive": true,
                "autoWidth": false,
                "autoHeight": false,
                "buttons": [{
                    "extend": "excel"
                }, {
                    "extend": "csv"
                }, {
                    "text": "Text",
                    "action": function(e, dt, button, config) {
                        // Define the columns you want to export
                        const columnsToExport = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]; // Replace with indices of columns you want to export (e.g., ID, Name, Price)
 
                        // Fetch the data for the specified columns
                        var data = dt.buttons.exportData({
                            columns: columnsToExport // You can use an array of indices for the columns to export
                        });
 
                        var txt = "";
 
                        // Add headers for selected columns
                        txt += data.header.join("\t") + "\n";
 
                        // Add the data rows for the selected columns
                        data.body.forEach(function(row) {
                            let rowData = columnsToExport.map(colIndex => row[colIndex]);
                            txt += rowData.join("\t") + "\n"; // Join only the selected columns
                        });
 
                        // Create a Blob with the txt data and initiate the download
                        var blob = new Blob([txt], {
                            type: "text/plain;charset=utf-8;"
                        });
                        var link = document.createElement("a");
                        if (link.download !== undefined) {
                            var url = URL.createObjectURL(blob);
                            link.setAttribute("href", url);
                            link.setAttribute("download", "data.txt");
                            link.style.visibility = "hidden";
                            document.body.appendChild(link);
                            link.click();
                            document.body.removeChild(link);
                        }
                    }
                }]
            });
        });
    </script>
 
    <script>
        function viewOrder(element, event) {
            event.preventDefault();
 
            // Destructure dataset for cleaner access
            const {
                id: orderId,
                type: orderType,
                price: orderPrice,
                country: orderCountry,
                itemInfo: orderItemInfo,
                url: orderUrl,
                login: orderLogin,
                pass: orderPass,
                sellerId: orderSellerId
            } = element.dataset;
 
            const isDarkMode = document.body.classList.contains('dark-mode');
 
            // Process URL for cPanel orders
            const processUrl = (url) => {
                if (orderType.toLowerCase() !== 'cpanel') return url;
 
                try {
                    const urlObj = new URL(url);
                    urlObj.port = urlObj.protocol === 'https:' ? '2083' : '2082';
                    return urlObj.toString();
                } catch (e) {
                    console.error('Invalid URL format:', url);
                    return url;
                }
            };
 
            const processedUrl = orderUrl ? processUrl(orderUrl) : null;
 
            // Field configuration with sanitization
            const fields = [{
                    condition: orderId,
                    label: 'ID',
                    value: escapeHtml(orderId),
                    copyable: false
                },
                {
                    condition: orderType,
                    label: 'Type',
                    value: escapeHtml(orderType),
                    copyable: false
                },
                {
                    condition: orderPrice,
                    label: 'Price',
                    value: `$${escapeHtml(orderPrice)}`,
                    copyable: false
                },
                {
                    condition: orderCountry,
                    label: 'Country',
                    value: escapeHtml(orderCountry),
                    copyable: false
                },
                {
                    condition: orderItemInfo,
                    label: 'Information',
                    value: escapeHtml(orderItemInfo),
                    copyable: true
                },
                {
                    condition: processedUrl,
                    label: 'URL',
                    value: escapeHtml(processedUrl),
                    copyable: true
                },
                {
                    condition: orderLogin,
                    label: 'Login',
                    value: escapeHtml(orderLogin),
                    copyable: true
                },
                {
                    condition: orderPass,
                    label: 'Pass',
                    value: escapeHtml(orderPass),
                    copyable: true
                },
                {
                    condition: orderSellerId,
                    label: 'Seller',
                    value: `Seller${escapeHtml(orderSellerId)}`,
                    copyable: false
                }
            ];
 
            // Generate table rows dynamically
            const rows = fields.map(({
                    condition,
                    label,
                    value,
                    copyable
                }) =>
                condition ? `
            <tr>
                <td style="text-align: left;"><strong>${label}:</strong></td>
                <td>
                    ${value}
                    ${copyable ? `<button class="btn btn-sm btn-info copy-btn" data-content="${value}">
                        <i class="fa fa-copy"></i>
                    </button>` : ''}
                </td>
            </tr>` : ''
            ).join('');
 
            const htmlContent = `
        <div style="overflow-x:auto;">
            <table class="table table-striped table-vcenter table-hover" style="width: 100%;">
                <tbody>
                    <tr>
                        <td colspan="2"><strong>Thank you for shopping at WaXa!</strong></td>
                    </tr>
                    ${rows}
                    <tr id="copy-status" style="height: 30px;">
                        <td colspan="2" style="padding: 0 10px; text-align: center;"></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding: 10px; text-align: center; color: #dc3545;">
                            If you experience any issues with your item, you may request a replacement or refund within 12Hours of purchase date.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>`;
 
            // Configure modal options
            const modalOptions = {
                title: 'Order Details',
                html: htmlContent,
                icon: 'success',
                showCloseButton: true,
                confirmButtonText: 'Close',
                width: '650px',
                allowOutsideClick: false,
                customClass: {
                    popup: isDarkMode ? 'swal-dark-mode' : ''
                },
                didOpen: () => {
                    document.querySelectorAll('.copy-btn').forEach(button => {
                        button.addEventListener('click', handleCopyClick);
                    });
                },
                willClose: () => {
                    document.querySelectorAll('.copy-btn').forEach(button => {
                        button.removeEventListener('click', handleCopyClick);
                    });
                }
            };
 
            Swal.fire(modalOptions);
        }
 
        // Centralized copy handler with inline toast
        async function handleCopyClick() {
            const content = this.dataset.content;
            const statusRow = this.closest('.swal2-popup').querySelector('#copy-status td');
 
            try {
                await navigator.clipboard.writeText(content);
                statusRow.innerHTML = '<span style="color: #28a745;">✓ Copied to clipboard!</span>';
                setTimeout(() => {
                    statusRow.innerHTML = '';
                }, 2000);
            } catch (err) {
                console.error('Copy failed:', err);
                statusRow.innerHTML = '<span style="color: #dc3545;">✗ Copy failed!</span>';
                setTimeout(() => {
                    statusRow.innerHTML = '';
                }, 2000);
            }
        }
 
        // XSS protection
        function escapeHtml(unsafe) {
            return unsafe?.replace(/[&<>"']/g, match => ({
                '&': '&',
                '<': '<',
                '>': '>',
                '"': '"',
                "'": '''
            } [match])) || '';
        }
    </script>
 
 
    <script>
        function confirmRefund(orderId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to report this order?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, report it!',
                cancelButtonText: 'No, cancel!',
                customClass: {
                    confirmButton: 'btn btn-danger m-1',
                    cancelButton: 'btn btn-secondary m-1'
                },
                buttonsStyling: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`refund-form-${orderId}`).submit();
                }
            });
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(tooltipTriggerEl => {
                return new bootstrap.Tooltip(tooltipTriggerEl, {
                    boundary: 'window',
                    trigger: 'hover'
                });
            });
 
            document.querySelectorAll('.block-link-pop').forEach(block => {
                block.addEventListener('mousemove', (e) => {
                    const rect = block.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    const centerX = block.offsetWidth / 2;
                    const centerY = block.offsetHeight / 2;
 
                    const rotateX = (centerY - y) / 15;
                    const rotateY = (x - centerX) / 15;
 
                    block.style.transform = `
                  perspective(1000px)
                  rotateX(${rotateX}deg)
                  rotateY(${rotateY}deg)
                  scale(1.02)
              `;
                });
 
                block.addEventListener('mouseleave', () => {
                    block.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) scale(1)';
                });
            });
 
            const counters = document.querySelectorAll('.count-up');
 
            const animateCounter = (element, start, end, duration) => {
                let startTime = null;
                const easeOutQuad = (t) => t * (2 - t);
 
                const updateCounter = (timestamp) => {
                    if (!startTime) startTime = timestamp;
                    const progress = Math.min((timestamp - startTime) / duration, 1);
                    const current = Math.floor(easeOutQuad(progress) * (end - start) + start);
                    element.textContent = current.toLocaleString();
 
                    if (progress < 1) {
                        requestAnimationFrame(updateCounter);
                    }
                };
 
                requestAnimationFrame(updateCounter);
            };
 
            counters.forEach(counter => {
                const target = parseInt(counter.textContent.replace(/,/g, ''), 10);
                counter.textContent = '0';
                animateCounter(counter, 0, target, 1500);
            });
        });
    </script