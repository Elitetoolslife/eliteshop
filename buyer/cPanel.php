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
    <title>WaXa - cPanels
</title>
    <!-- Icons -->
    <link rel="shortcut icon" href="../assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/media/favicons/apple-touch-icon-180x180.png">
    <!-- Include Choices CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
		<!-- Stylesheets -->
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
    <div id="page-container" class="page-header-dark main-content-boxed remember-theme">
      <header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
        <!-- Left Section -->
        <div class="d-flex align-items-center">
<!-- Logo -->
<a class="luxury-logo-container" href="../main/index.html" title="Premium Trading Platform">
    <div class="luxury-frame">
        <!-- Golden Particles -->
        <div class="luxury-particle lp1"></div>
        <div class="luxury-particle lp2"></div>
        <div class="luxury-particle lp3"></div>
        <div class="luxury-particle lp4"></div>
        
        <!-- Main Logo -->
        <img src="https://png.pngtree.com/png-vector/20240612/ourmid/pngtree-monkey-smoke-sigarate-png-image_12720609.png" 
             alt="Premium Logo" 
             class="luxury-logo-image">
    </div>
</a>
<!-- END Logo -->

<style>.luxury-logo-container {
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

.lp1 { width: 3px; height: 3px; top: 10%; left: 20%; }
.lp2 { width: 4px; height: 4px; top: 70%; left: 75%; }
.lp3 { width: 2px; height: 2px; top: 40%; left: 65%; }
.lp4 { width: 3px; height: 3px; top: 80%; left: 30%; }

/* Animations */
@keyframes frame-pulse {
    0%, 100% { 
        transform: scale(1);
        box-shadow: 0 0 20px rgba(218, 165, 32, 0.3); 
    }
    50% { 
        transform: scale(1.02);
        box-shadow: 0 0 30px rgba(218, 165, 32, 0.5); 
    }
}

@keyframes luxury-orbits {
    0% { transform: rotate(0deg) translateX(12px) rotate(0deg); }
    100% { transform: rotate(360deg) translateX(12px) rotate(-360deg); }
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
    0% { transform: rotate(0deg); opacity: 0; }
    25% { opacity: 0.6; }
    50% { opacity: 0; }
    100% { transform: rotate(360deg); opacity: 0; }
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
               &nbsp;
               <!--just a space character to sperate the icons -->
            <!-- Notifications Dropdown -->
            <div class="dropdown d-inline-block me-2">
                <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-notifications-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-bell"></i>
                    <span class="text-primary">•</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg p-0 border-0 fs-sm"
                    aria-labelledby="page-header-notifications-dropdown">
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
                <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center"
                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle" src="https://png.pngtree.com/png-vector/20240612/ourmid/pngtree-monkey-smoke-sigarate-png-image_12720609.png"
                        alt="Header Avatar" style="width: 21px;" />
                    <span class="d-none d-sm-inline-block ms-2">HustlersFathers</span>
                    <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block opacity-50 ms-1"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0"
                    aria-labelledby="page-header-user-dropdown">
                    <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                        <img class="img-avatar img-avatar48 img-avatar-thumb"
                            src="https://png.pngtree.com/png-vector/20240612/ourmid/pngtree-monkey-smoke-sigarate-png-image_12720609.png" alt="WaXa Trusted Group">
                        <p class="mt-2 mb-0 fw-medium">Username : HustlersFathers</p>
                        <p class="mb-0 text-muted fs-sm fw-medium">Account Type : user</p>
                    </div>
       					<div class="p-2">
						<a class="dropdown-item d-flex align-items-center justify-content-between"
                        href="../add-balance/index.html">
                        <span class="fs-sm fw-medium">Balance</span>
                        <span class="nav-main-link-badge badge rounded-pill bg-success">0 USD</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                        href="../become-premium/index.html">
                        <span class="fs-sm fw-medium">Premium</span>
                        <span class="badge rounded-pill bg-info ms-2">normal</span>
                        </a>
						<a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="../orders/index.html">
                            <span class="fs-sm fw-medium">Orders</span>
                            <span class="badge rounded-pill bg-primary ms-2">0</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="../tickets/index.html">
                            <span class="fs-sm fw-medium">Tickets</span>
                            <span class="badge rounded-pill bg-danger ms-2">0</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="../main/index.html">
                            <span class="fs-sm fw-medium">Reports</span>
                            <span class="badge rounded-pill bg-danger ms-2">1</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="../main/index.html">
                            <span class="fs-sm fw-medium">Settings</span>
                        </a>
                    </div>
                    <div role="separator" class="dropdown-divider m-0"></div>
                    <div class="p-2">
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="../faq/index.html">
                            <span class="fs-sm fw-medium">FAQ</span>
                        </a>

                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="../login/index.html" method="POST">
                            <input type="hidden" name="_token" value="JEVPhjed5WLGXT0Ej1rtrgZXiqR7Q61yCZa08Dc0" autocomplete="off">                            <span class="fs-sm fw-medium">Log Out</span>
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
            <form class="w-100" action="https://waxa.pw/bd_search.html" method="POST">
                <div class="input-group">
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-alt-danger" data-toggle="layout"
                        data-action="header_search_off">
                        <i class="fa fa-fw fa-times-circle"></i>
                    </button>
                    <input type="text" class="form-control" placeholder="Search or hit ESC.."
                        id="page-header-search-input" name="page-header-search-input" />
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
</script>      <main id="main-container">
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
              <a class="nav-main-link active" href="../main/index.html">
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
                      <a class="nav-main-link" href="../rdp/index.html">
                        <i class="nav-main-link-icon fa fa-desktop"></i>
                        <span class="nav-main-link-name">Remote Desktop</span>
                        <span class="nav-main-link-badge badge rounded-pill bg-primary">1</span>

                      </a>
                    </li>
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="../shells/index.html">
                        <i class="nav-main-link-icon fab fa-php"></i>
                        <span class="nav-main-link-name">Shells</span>
                        <span class="nav-main-link-badge badge rounded-pill bg-primary">26</span>

                      </a>
                    </li>
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="index.html">
                        <i class="nav-main-link-icon fab fa-cpanel"></i>
                        <span class="nav-main-link-name">cPanels</span>
                        <span class="nav-main-link-badge badge rounded-pill bg-primary">184</span>
                      </a>
                    </li>
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="../ssh/index.html">
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
                      <a class="nav-main-link" href="../mailer/index.html">
                        <i class="nav-main-link-icon fa fa-leaf"></i>
                        <span class="nav-main-link-name">Mailers</span>
                        <span class="nav-main-link-badge badge rounded-pill bg-primary">3</span>
                      </a>
                    </li>
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="../smtp/index.html">
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
                      <a class="nav-main-link" href="../webmail/index.html">
                        <i class="nav-main-link-icon fab fa-cpanel fa-2x"></i>
                        <span class="nav-main-link-name">cPanel</span>
                        <span class="nav-main-link-badge badge rounded-pill bg-primary">0</span>
                      </a>
                    </li>
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="../webmail/index.html">
                        <i class="nav-main-link-icon fab fa-microsoft"></i>
                        <span class="nav-main-link-name">Office365</span>
                                                <span class="nav-main-link-badge badge rounded-pill bg-primary">0</span>
                      </a>
                    </li>
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="../webmail/index.html">
                        <i class="nav-main-link-icon fab fa-golang"></i>
                        <span class="nav-main-link-name">GoDaddy</span>
                                                <span class="nav-main-link-badge badge rounded-pill bg-primary">0</span>
                      </a>
                    </li>
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="../webmail/index.html">
                        <i class="nav-main-link-icon fa fa-1x fa-info"></i>
                        <span class="nav-main-link-name">IONOS</span>
                                                <span class="nav-main-link-badge badge rounded-pill bg-primary">0</span>
                      </a>
                    </li>
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="../webmail/index.html">
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
              <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="../account/index.html">
                <i class="nav-main-link-icon fa fa-universal-access"></i>
                <span class="nav-main-link-name">Accounts</span>
              </a>
              <ul class="nav-main-submenu">
                <li class="nav-main-item">
                  <a class="nav-main-link" href="../account/index.html">
                    <i class="nav-main-link-icon fa fa-people-group"></i>
                    <span class="nav-main-link-name">Main Sections</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="../login/index.html">
                    <i class="nav-main-link-icon fab fa-facebook"></i>
                    <span class="nav-main-link-name">Social Media</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="../account/index%EF%B9%96parent_id=9.html">
                    <i class="nav-main-link-icon fab fa-magento"></i>
                    <span class="nav-main-link-name">Marketing</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="../account/index%EF%B9%96parent_id=1.html">
                    <i class="nav-main-link-icon fa fa-gamepad"></i>
                    <span class="nav-main-link-name">Games</span>
                  </a>
                </li>
				<li class="nav-main-item">
                  <a class="nav-main-link" href="../account/index%EF%B9%96parent_id=15.html">
                    <i class="nav-main-link-icon fa fa-mobile-button"></i>
                    <span class="nav-main-link-name">Mobile Games</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="../account/index%EF%B9%96parent_id=11.html">
                    <i class="nav-main-link-icon fab fa-twitch"></i>
                    <span class="nav-main-link-name">Streaming</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="../account/index%EF%B9%96parent_id=12.html">
                    <i class="nav-main-link-icon fa fa-restroom"></i>
                    <span class="nav-main-link-name">Dating</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="../account/index%EF%B9%96parent_id=10.html">
                    <i class="nav-main-link-icon fab fa-btc"></i>
                    <span class="nav-main-link-name">Cryptocurrency</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="../account/index%EF%B9%96parent_id=13.html">
                    <i class="nav-main-link-icon fab fa-youtube"></i>
                    <span class="nav-main-link-name">Entertainment</span>
                  </a>
                  <li class="nav-main-item">
                  <a class="nav-main-link" href="../account/index%EF%B9%96parent_id=14.html">
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
                  <a class="nav-main-link" href="https://waxa.pw/bd_simple_1.html">
                    <i class="nav-main-link-icon fa fa-server"></i>
                    <span class="nav-main-link-name"> Rock-Paper-Scissors </span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="https://waxa.pw/bd_simple_2.html">
                    <i class="nav-main-link-icon fa fa-server"></i>
                    <span class="nav-main-link-name">Dice</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="https://waxa.pw/bd_image_1.html">
                    <i class="nav-main-link-icon fa fa-server"></i>
                    <span class="nav-main-link-name">Heads / Tails</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="https://waxa.pw/bd_image_2.html">
                    <i class="nav-main-link-icon fa fa-server"></i>
                    <span class="nav-main-link-name">Soon 2</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="https://waxa.pw/bd_video_1.html">
                    <i class="nav-main-link-icon fa fa-server"></i>
                    <span class="nav-main-link-name">Soon 1</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="https://waxa.pw/bd_video_2.html">
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
            <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                Total cPanels 
                <span class="nav-main-link-badge badge rounded-pill bg-primary">
                    184
                </span>
            </h3>
		</div>
                <div class="container mt-4">
            <div class="row">
                <!-- Repeat this block for each select element -->
                <div class="col-4 mb-4">
                    <select class="form-select" id="country-select" name="country" oninput="redrawDataTable(this)">
                        <option selected value="">Select Country</option>
                                                    <option value="France">France</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="Singapore">Singapore</option>
                                                    <option value="United States">United States</option>
                                                    <option value="Malaysia">Malaysia</option>
                                                    <option value="Unknown">Unknown</option>
                                                    <option value="The Netherlands">The Netherlands</option>
                                                    <option value="Turkey">Turkey</option>
                                                    <option value="Iran">Iran</option>
                                                    <option value="India">India</option>
                                                    <option value="Indonesia">Indonesia</option>
                                                    <option value="Japan">Japan</option>
                                                    <option value="Türkiye">Türkiye</option>
                                                    <option value="Brazil">Brazil</option>
                                            </select>
                </div>
                <div class="col-4 mb-4">
					<select class="form-select" id="ssl-select" name="ssl" oninput="redrawDataTable(this)">
						<option selected value="">SSL</option>
													<option value="1">
								HTTPS
							</option>
													<option value="0">
								HTTP
							</option>
											</select>
                </div>
                <div class="col-4 mb-4">
                    <select class="form-select" id="ltd-select" name="ltd" oninput="redrawDataTable(this)">
                        <option selected value="">Extension</option>
                         
                            <option value="com">.com</option>
                         
                            <option value="ltd">.ltd</option>
                         
                            <option value="xyz">.xyz</option>
                         
                            <option value="mx">.mx</option>
                         
                            <option value="org">.org</option>
                         
                            <option value="net">.net</option>
                         
                            <option value="app">.app</option>
                         
                            <option value="salon">.salon</option>
                         
                            <option value="br">.br</option>
                         
                            <option value="ai">.ai</option>
                         
                            <option value="io">.io</option>
                         
                            <option value="es">.es</option>
                         
                            <option value="sa">.sa</option>
                         
                            <option value="tr">.tr</option>
                         
                            <option value="ir">.ir</option>
                         
                            <option value="id">.id</option>
                         
                            <option value="cl">.cl</option>
                         
                            <option value="tech">.tech</option>
                                            </select>
                </div>
                <!-- Repeat the above block to add more select elements -->
                <div class="col-4 mb-4">
                    <select class="form-select" id="server-select" name="server" oninput="redrawDataTable(this)">
                        <option selected value="">Server</option>
                        <option value="1">Option #1</option>
                        <option value="2">Option #2</option>
                        <option value="3">Option #3</option>
                    </select>
                </div>
                <div class="col-4 mb-4">
                    <select class="form-select" id="sellerlist-select" name="sellers" oninput="redrawDataTable(this)">
                        <option selected value="">Sellers List</option>
                                                    <option value="1">1</option>
                                            </select>
                </div>
                <div class="col-4 mb-4">
                    <select class="form-select" id="pa-select" name="pa" oninput="redrawDataTable(this)">
                        <option selected value="">Page Authority</option>
                                                    <option value="12">12</option>
                                                    <option value="29">29</option>
                                                    <option value="5">5</option>
                                                    <option value="18">18</option>
                                                    <option value="13">13</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="15">15</option>
                                                    <option value="1">1</option>
                                                    <option value="16">16</option>
                                                    <option value="22">22</option>
                                                    <option value="8">8</option>
                                                    <option value="14">14</option>
                                                    <option value="9">9</option>
                                                    <option value="28">28</option>
                                                    <option value="3">3</option>
                                                    <option value="19">19</option>
                                                    <option value="17">17</option>
                                                    <option value="20">20</option>
                                                    <option value="27">27</option>
                                                    <option value="31">31</option>
                                                    <option value="4">4</option>
                                                    <option value="26">26</option>
                                                    <option value="23">23</option>
                                                    <option value="6">6</option>
                                                    <option value="21">21</option>
                                                    <option value="25">25</option>
                                            </select>
                </div>
                <div class="col-4 mb-4">
                    <select class="form-select" id="da-select" name="da" oninput="redrawDataTable(this)">
                        <option selected value="">Domain Authority</option>
                                                    <option value="1">1</option>
                                                    <option value="9">9</option>
                                                    <option value="4">4</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="5">5</option>
                                                    <option value="7">7</option>
                                                    <option value="11">11</option>
                                                    <option value="22">22</option>
                                                    <option value="12">12</option>
                                                    <option value="8">8</option>
                                                    <option value="6">6</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="14">14</option>
                                                    <option value="18">18</option>
                                                    <option value="10">10</option>
                                            </select>
                </div>
                <div class="col-4 mb-4">
                    <select class="form-select" id="cms-select" name="cms" oninput="redrawDataTable(this)">
                        <option selected value="">Platform</option>
                                                    <option value="PHP">PHP</option>
                                                    <option value="N/A">N/A</option>
                                                    <option value="Xara">Xara</option>
                                                    <option value="WordPress">WordPress</option>
                                                    <option value="Webflow">Webflow</option>
                                                    <option value="OpenCart">OpenCart</option>
                                                    <option value="Elementor">Elementor</option>
                                            </select>
                </div>
                <div class="col-4 mb-4">
                    <select class="form-select" id="hosting-select" name="detect_hosting" oninput="redrawDataTable(this)">
                        <option selected value="">Hosting Provider</option>
                                                    <option value="Host Europe GmbH">Host Europe GmbH</option>
                                                    <option value="Cloudflare, Inc.">Cloudflare, Inc.</option>
                                                    <option value="GoDaddy.com, LLC">GoDaddy.com, LLC</option>
                                                    <option value="INNOVATION GROUP HOSTING">INNOVATION GROUP HOSTING</option>
                                                    <option value="NetSource Communications, Inc.">NetSource Communications, Inc.</option>
                                                    <option value="GB Network Solutions Sdn. Bhd.">GB Network Solutions Sdn. Bhd.</option>
                                                    <option value="Unified Layer">Unified Layer</option>
                                                    <option value="HostGator.com LLC">HostGator.com LLC</option>
                                                    <option value="Godaddy.com">Godaddy.com</option>
                                                    <option value="HOSTINGER US">HOSTINGER US</option>
                                                    <option value="DEFT.COM">DEFT.COM</option>
                                                    <option value="BanaHosting.com">BanaHosting.com</option>
                                                    <option value="Hostwinds LLC">Hostwinds LLC</option>
                                                    <option value="Contabo GmbH">Contabo GmbH</option>
                                                    <option value="Hetzner Online GmbH">Hetzner Online GmbH</option>
                                                    <option value="Cenuta Telekomunikasyon Anonim Sirketi">Cenuta Telekomunikasyon Anonim Sirketi</option>
                                                    <option value="Webhosting Bilisim Teknolojileri A.S">Webhosting Bilisim Teknolojileri A.S</option>
                                                    <option value="Sefroyek Pardaz Engineering Company">Sefroyek Pardaz Engineering Company</option>
                                                    <option value="ENDURANCE WEB SOLUTIONS PRIVATE LIMITED">ENDURANCE WEB SOLUTIONS PRIVATE LIMITED</option>
                                                    <option value="P.D.R Solutions FZC">P.D.R Solutions FZC</option>
                                                    <option value="InMotion Hosting, Inc.">InMotion Hosting, Inc.</option>
                                                    <option value="idcloudhost.com">idcloudhost.com</option>
                                                    <option value="HostLAB Bilisim Teknolojileri A.S.">HostLAB Bilisim Teknolojileri A.S.</option>
                                                    <option value="TRAY TECNOLOGIA EM E-COMMERCE LTDA">TRAY TECNOLOGIA EM E-COMMERCE LTDA</option>
                                                    <option value="Newfold Digital, Inc.">Newfold Digital, Inc.</option>
                                                    <option value="SERVERS">SERVERS</option>
                                                    <option value="Google LLC">Google LLC</option>
                                            </select>
                </div>
                
                <div class="mb-4">
                    <label class="form-label">Price Range</label>
                    <input type="text" class="js-rangeslider" id="price-range" name="price"
                           data-type="double" data-grid="true"
                           data-min="1.00" data-max="8.00"
                           data-from="1.00" data-to="8.00"
                           data-prefix="$">
                </div>             
            </div>
        </div>
        <div class="block-content block-content-full">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full" id="cpanel-table"><thead><tr><th title="ID">ID</th><th title="Country" width="7%">Country</th><th title="Domain">Domain</th><th title="SSL" width="5%">SSL</th><th title="PA">PA</th><th title="DA">DA</th><th title="Hosting">Hosting</th><th title="CMS">CMS</th><th title="Price">Price</th><th title="Buy" width="7%">Buy</th><th title="Check">Check</th><th title="BlackList">BlackList</th><th title="SEO">SEO</th><th title="Tech">Tech</th><th title="Seller">Seller</th><th title="Added on" width="10%">Added on</th></tr></thead></table>

            </div>
        </div>
    </div>
    <div class="modal fade" id="seo_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">SEO Informations</h5>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">##</th>
                      </tr>
                    </thead>
                    <tbody id="seo-infos">
                    </tbody>
                  </table>
            </div>
            <div class="modal-footer">
              <button onclick="$('#seo_modal').modal('hide')" type="button" class="btn btn-secondary">Close</button>
            </div>
          </div>
        </div>
    </div>
    <div class="modal fade" id="tech_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Tech Informations</h5>
            </div>
            <div class="modal-body">
                <h2>Results:</h2>
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Categories</th>
                        <th scope="col">Tech Name</th>
                        <th scope="col">Version</th>
                      </tr>
                    </thead>
                    <tbody id="result-tech-infos">
                    </tbody>
                </table>
                <h2>Meta:</h2>
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Network</th>
                        <th scope="col">URL</th>
                      </tr>
                    </thead>
                    <tbody id="meta-tech-infos">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
              <button onclick="$('#tech_modal').modal('hide')" type="button" class="btn btn-secondary">Close</button>
            </div>
          </div>
        </div>
    </div>
    <div class="modal fade" id="seller_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Seller Informations</h5>
            </div>
            <div class="modal-body">
                <h2 id="seller-info"></h2>
            </div>
            <div class="modal-footer">
              <button onclick="$('#seller_modal').modal('hide')" type="button" class="btn btn-secondary">Close</button>
            </div>
          </div>
        </div>
    </div>
      </main>
      <!-- Footer -->
          <footer id="page-footer" class="bg-body-extra-light">
            <div class="content py-3">
              <div class="row fs-sm">
                <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
                  Page Loaded in 2.668 Seconds
                </div>
                <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
                  <a class="fw-semibold" href="../main/index.html" target="_blank">WaXa V1.0</a> &copy; <span data-toggle="year-copy"></span>
                </div>
              </div>
            </div>
          </footer>
          <!-- END Footer -->    </div>

    <!-- Include jQuery first -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Then include Bootstrap Notify -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.js"></script>

    <!-- OneUI JS -->
    <script src="../assets/js/oneui.app.min.js"></script>
    <!-- Page JS Plugins -->
    <script src="../assets/js/plugins/chart.js/chart.umd.js"></script>
    <script src="../assets/js/lib/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="../assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="../assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="../assets/js/plugins/datatables-buttons/dataTables.buttons.min.js"></script>
    <script src="../assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="../assets/js/plugins/datatables-buttons-jszip/jszip.min.js"></script>
    <script src="../assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js"></script>
    <script src="../assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js"></script>
    <script src="../assets/js/plugins/datatables-buttons/buttons.print.min.js"></script>
    <script src="../assets/js/plugins/datatables-buttons/buttons.html5.min.js"></script>
    <script src="../assets/js/plugins/flatpickr/flatpickr.min.js"></script>
    <script src="../assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="../assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    <script src="../assets/js/plugins/select2/js/select2.full.min.js"></script>
    <script src="../assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js"></script>
    <script src="../assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
    <script src="../assets/js/plugins/dropzone/min/dropzone.min.js"></script>
    <script src="../assets/js/pages/be_pages_dashboard_v1.min.js"></script>
	<script src="../assets/js/plugins/slick-carousel/slick.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>One.helpersOnLoad(['js-flatpickr', 'jq-datepicker', 'jq-maxlength', 'jq-select2', 'jq-masked-inputs', 'jq-rangeslider','jq-slick']);</script>
    <script src="https://benalman.com/code/projects/jquery-throttle-debounce/jquery.ba-throttle-debounce.js"></script>
<script>
    $('input#price-range').on('input', $.debounce( 250, redrawDataTable ) );

    function redrawDataTable(event) {
        if (event.cancelable) {
            event.preventDefault();
        }
        window.LaravelDataTables["cpanel-table"].draw()
    }
</script>
<script>
    $(function() {

     window.LaravelDataTables = window.LaravelDataTables || {};
     window.LaravelDataTables["cpanel-table"] = $("#cpanel-table").DataTable({
         "serverSide": true,
         "processing": true,
         "pageLength": 50,
         "ajax": {
             "url": "https://waxa.pw/cpanels",
             "type": "GET",
             "data": function(data) {
                 for (var i = 0, len = data.columns.length; i < len; i++) {
                     if (!data.columns[i].search.value) delete data.columns[i].search;
                     if (data.columns[i].searchable === true) delete data.columns[i].searchable;
                     if (data.columns[i].orderable === true) delete data.columns[i].orderable;
                     if (data.columns[i].data === data.columns[i].name) delete data.columns[i].name;
                 }

                 data.country = $('select#country-select').val();
                 data.ssl = $('select#ssl-select').val();
                 data.ltd = $('select#ltd-select').val();
                 data.server = $('select#server-select').val();
                 data.seller = $('select#sellerlist-select').val();
                 data.pa = $('select#pa-select').val();
                 data.da = $('select#da-select').val();
                 data.cms = $('select#cms-select').val();
                 data.hosting = $('select#hosting-select').val();
                 data.price = $('input#price-range').val();

                 delete data.search.regex;
             }
         },
         "columns": [{
             "data": "id",
             "name": "id",
             "title": "ID",
             "orderable": true,
             "searchable": true,
             "className": "text-center"
         }, {
             "data": "country",
             "name": "country",
             "title": "Country",
             "orderable": false,
             "searchable": false,
             "width": "7%",
             "className": "text-center"
         }, {
             "data": "domain",
             "name": "domain",
             "title": "Domain",
             "orderable": true,
             "searchable": true,
             "className": "text-center"
         }, {
             "data": "ssl",
             "name": "ssl",
             "title": "SSL",
             "orderable": false,
             "searchable": false,
             "width": "5%",
             "className": "text-center"
         }, {
             "data": "pa",
             "name": "pa",
             "title": "PA",
             "orderable": true,
             "searchable": true,
			 "className": "text-center"

         }, {
             "data": "da",
             "name": "da",
             "title": "DA",
             "orderable": true,
             "searchable": true,
			 "className": "text-center"

         }, {
             "data": "detect_hosting",
             "name": "detect_hosting",
             "title": "Hosting",
             "orderable": true,
             "searchable": true,
             "className": "text-center"
         }, {
             "data": "cms",
             "name": "cms",
             "title": "CMS",
             "orderable": true,
             "searchable": true,
             "className": "text-center"
         }, {
             "data": "price",
             "name": "price",
             "title": "Price",
             "orderable": true,
             "searchable": true
         }, {
             "data": "buy",
             "name": "buy",
             "title": "Buy",
             "orderable": false,
             "searchable": false,
             "width": "7%",
             "className": "text-center"
         }, {
             "data": "check",
             "name": "check",
             "title": "Check",
             "orderable": false,
             "searchable": false,
             "className": "text-center"
         }, {
             "data": "phishing",
             "name": "phishing",
             "title": "BlackList",
             "orderable": false,
             "searchable": false,
             "className": "text-center"
         }, {
             "data": "seo_info",
             "name": "seo",
             "title": "SEO",
             "orderable": false,
             "searchable": false,
             "className": "text-center",
             "render": function(data, type, full, meta) {
                 return function() {
                     return "<button onclick='showSeoInformations(this)' data-seo='"+ ((data != null && data != undefined) ? data.replace(/&quot;/g, '"') : "") +"' class='btn btn-sm btn-warning filter-btn' data-value='" + this.id + "'>SEO</button>";
                 };
             }
         }, {
             "data": "technologie",
             "name": "technology",
             "title": "Tech",
             "orderable": false,
             "searchable": false,
             "className": "text-center",
             "render": function(data, type, full, meta) {
                 return function() {
                     return "<button onclick='showTechInformations(this)' data-tech='"+ ((data != null && data != undefined) ? data.replace(/&quot;/g, '"') : "") +"' class='btn btn-sm btn-primary filter-btn' data-value='" + this.id + "'>Tech</button>";
                 };
             }
         }, {
             "data": "seller_id",
             "name": "seller",
             "title": "Seller",
             "orderable": false,
             "searchable": false,
             "className": "text-center",
             "render": function(data, type, full, meta) {
                 return function() {
                     return "<button class='btn btn-sm btn-dark text-light filter-btn' data-value='" + this.id + "'>Seller"+ data +"</button>";
                 };
             }
         }, {
             "data": "created_at",
             "name": "created_at",
             "title": "Added on",
             "orderable": true,
             "searchable": true,
             "width": "10%"
         }],
         "order": [
             [1, "desc"]
         ],
         "select": {
             "style": "single"
         },
         "responsive": true,
         "autoWidth": false,
         "searching": true,
         "buttons": []
     });

     $('#cpanel-table tbody').on('click', 'td.dtr-control', function () {
        var row = window.LaravelDataTables["cpanel-table"].row($(this).closest('tr'));

        if (row.child.isShown()) {
            // Row is visible, add custom styles to the child row
            //console.log(row.innerHtml);
            $('.dtr-details').css('width', '100%');
        }
    });

 });
</script>
<script>
    function checkUrl(button) {
        const form = $(button).closest('form');
        const url = form.attr('action');
        const data = form.serialize();
    
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(response) {
                // Update the button text based on the response status
                if (response.status === 'Reported!') {
                    $(button).text('Reported!');
                    $(button).removeClass('bg-danger').addClass('bg-warning');
                } else if (response.status === 'Clean') {
                    $(button).text('Clean');
                    $(button).removeClass('bg-danger').addClass('bg-success');
                }
            },
            error: function(xhr) {
                $(button).text('Error');
                $(button).removeClass('bg-danger').addClass('bg-secondary');
            }
        });
    }
    </script>
<script>
    function buycpanel(button) {
        const event = window.event;
        event?.preventDefault();
    
        // Secure HTML escaping and URL processing
        const escapeHtml = (unsafe) => {
            if (!unsafe) return '';
            return unsafe.toString()
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#39;');
        };
    
        const processCpanelUrl = (url) => {
            try {
                const urlObj = new URL(url);
                if (urlObj.protocol === 'https:') {
                    urlObj.port = '2083';
                } else if (urlObj.protocol === 'http:') {
                    urlObj.port = '2082';
                }
                return urlObj.toString();
            } catch (e) {
                console.error('Invalid URL:', url);
                return url;
            }
        };
    
        // Data collection with XSS protection
        const getButtonData = (btn) => ({
            id: escapeHtml(btn.dataset.id),
            type: escapeHtml(btn.dataset.type),
            domain: escapeHtml(btn.dataset.domain),
            country: escapeHtml(btn.dataset.country),
            pa: escapeHtml(btn.dataset.pa),
            da: escapeHtml(btn.dataset.da),
            detect_hosting: escapeHtml(btn.dataset.detectHosting),
            price: escapeHtml(btn.dataset.price),
            created_at: escapeHtml(btn.dataset.createdAt),
            status: btn.dataset.status
        });
    
        // Reusable templates
        const createTableRow = (label, value, isCopyable = false) => {
            const escapedValue = escapeHtml(value);
            return `
                <tr>
                    <td style="text-align: left;"><strong>${escapeHtml(label)}:</strong></td>
                    <td>
                        ${escapedValue}
                        ${isCopyable ? 
                            `<button class="btn btn-sm btn-info copy-btn" 
                                     data-content="${escapedValue}"
                                     aria-label="Copy ${escapeHtml(label)}">
                                <i class="fa fa-copy"></i>
                            </button>` : ''}
                    </td>
                </tr>`;
        };
    
        const modalTemplates = {
            purchaseConfirm: (data) => `
                <div style="overflow-x:auto;">
                    <table class="table table-striped table-vcenter table-hover" style="width: 100%;">
                        <tbody>
                            <tr><td colspan="2">You are about to buy the following cPanel</td></tr>
                            ${createTableRow('ID', data.id)}
                            ${createTableRow('Domain', data.domain)}
                            ${createTableRow('Country', data.country)}
                            ${createTableRow('Page Authority', data.pa)}
                            ${createTableRow('Domain Authority', data.da)}
                            ${createTableRow('Hosting Provider', data.detect_hosting)}
                            ${createTableRow('Price', data.price)}
                            ${createTableRow('Added on', data.created_at)}
                            <tr>
                                <td colspan="2" class="text-center text-danger py-3">
                                    You won't be able to revert this, but you can report the item if it's not working.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>`,
    
            purchaseSuccess: (data, credentials) => `
                <div style="overflow-x:auto;">
                    <table class="table table-striped table-vcenter table-hover" style="width: 100%;">
                        <tbody>
                            ${createTableRow('ID', data.id)}
                            ${createTableRow('Domain', data.domain)}
                            ${createTableRow('Country', data.country)}
                            ${createTableRow('Page Authority', data.pa)}
                            ${createTableRow('Domain Authority', data.da)}
                            ${createTableRow('Hosting Provider', data.detect_hosting)}
                            ${createTableRow('Price', data.price)}
                            ${createTableRow('Added on', data.created_at)}
                            ${createTableRow('URL', processCpanelUrl(credentials.url), true)}
                            ${createTableRow('Username', credentials.username, true)}
                            ${createTableRow('Password', credentials.password, true)}
                            <tr id="copy-status">
                                <td colspan="2" style="height: 30px; padding: 0 10px; text-align: center;"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>`
        };
    
        // Copy handling with inline feedback
        const setupCopyButtons = (modal) => {
            const copyHandler = async (event) => {
                const content = event.currentTarget.dataset.content;
                const statusCell = modal.querySelector('#copy-status td');
                
                try {
                    await navigator.clipboard.writeText(content);
                    statusCell.innerHTML = '<span style="color: #28a745;">✓ Copied to clipboard</span>';
                    setTimeout(() => {
                        statusCell.innerHTML = '';
                    }, 2000);
                } catch (err) {
                    statusCell.innerHTML = '<span style="color: #dc3545;">✗ Copy failed</span>';
                    setTimeout(() => {
                        statusCell.innerHTML = '';
                    }, 2000);
                }
            };
    
            const buttons = modal.querySelectorAll('.copy-btn');
            buttons.forEach(btn => btn.addEventListener('click', copyHandler));
            
            return () => buttons.forEach(btn => btn.removeEventListener('click', copyHandler));
        };
    
        // Main logic
        const cpanelData = getButtonData(button);
    
        if (cpanelData.status === 'sold') {
            Swal.fire({
                title: 'Already Sold!',
                text: 'This cPanel has already been sold and cannot be purchased again.',
                icon: 'info'
            });
            return;
        }
    
        Swal.fire({
            title: 'Confirm Purchase',
            html: modalTemplates.purchaseConfirm(cpanelData),
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#84d62f',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Buy it!',
            allowOutsideClick: false,
            focusConfirm: false
        }).then(async (result) => {
            if (!result.isConfirmed) return;
    
            const originalHTML = button.innerHTML;
            button.classList.add('disabled');
            button.innerHTML = '<i class="fa fa-sun fa-spin"></i> Buying...';
    
            try {
                const response = await $.ajax({
                    url: `/cpanel/${encodeURIComponent(cpanelData.id)}/buy`,
                    type: 'POST',
                    data: { _token: 'JEVPhjed5WLGXT0Ej1rtrgZXiqR7Q61yCZa08Dc0' }
                });
    
                button.classList.remove('disabled');
                
                if (response.status) {
                    // Process URL for display and copying
                    response.url = processCpanelUrl(response.url);
    
                    const successModal = await Swal.fire({
                        title: 'Purchase Successful!',
                        width: '650',
                        html: modalTemplates.purchaseSuccess(cpanelData, response),
                        icon: 'success',
                        didOpen: setupCopyButtons
                    });
    
                    if (successModal.isConfirmed || successModal.isDismissed) {
                        button.innerHTML = 'Done';
                        button.disabled = true;
                        button.dataset.status = 'sold';
                    }
                } else {
                    handleErrorResponse(response, button, originalHTML);
                }
            } catch (error) {
                console.error('AJAX Error:', error);
                button.classList.remove('disabled');
                button.innerHTML = originalHTML;
                Swal.fire({
                    title: error.status === 404 ? 'cPanel Not Found!' : 'Technical Error!',
                    icon: 'error'
                });
                if (error.status === 404) {
                    $(`tr#${cpanelData.id}`).delay(500).hide('slow');
                }
            }
        });
    
        function handleErrorResponse(response, button, originalHTML) {
            button.innerHTML = originalHTML;
            
            const errorConfig = {
                funds: {
                    title: 'Insufficient Balance!',
                    html: `${response.message}<br><br>${response.button}`,
                    icon: 'error'
                },
                technical: {
                    title: 'Transaction Failed!',
                    icon: 'error'
                },
                404: {
                    title: 'cPanel Not Found!',
                    icon: 'error'
                }
            };
    
            Swal.fire(errorConfig[response.reason] || {
                title: 'Purchase Failed!',
                icon: 'error'
            });
        }
    }
    </script>

<script>
    function showSeoInformations(e) {
        const data = e.getAttribute('data-seo');
        $('#seo-infos').html('');
        if (data != null && data != undefined) {
            const seoInformations = JSON.parse(data);
            Object.entries(seoInformations).forEach(([key, value]) => {
                $('#seo-infos').append(`
                    <tr>
                    <td scope="row">${key}</td>
                    <td>${value}</td>
                    </tr>
                `);
            });
        } else {
            $('#seo-infos').append(`
                <tr>
                <td scope="row">No Data</td>
                <td>No Data</td>
                </tr>
            `);
        }
        $('#seo_modal').modal('show');
    }
</script>
<script>
    function showTechInformations(e) {
        let data = e.getAttribute('data-tech');
        //const techInformations = JSON.parse(e.getAttribute('data-tech'));
        $('#result-tech-infos').html('');
        $('#meta-tech-infos').html('');
       
        if (data != null && data != undefined) { 
            const techInformations = JSON.parse(data);

            let resultTech = techInformations['results'];

            if (resultTech.length) {
                resultTech.forEach(tech => {
                    $('#result-tech-infos').append(`
                        <tr>
                            <td>${tech['categories'].length ? tech["categories"].join(', ') : "---"}</td>    
                            <td>${tech['name'] != "" ? tech["name"] : "---"}</td>    
                            <td>${tech["version"] != "" ? tech["version"] : "---"}</td>    
                        </tr>    
                    `);
                });
            } else {
                $('#result-tech-infos').append(`
                    <tr>
                        <td>No Data!</td>    
                        <td>No Data!</td>    
                        <td>No Data!</td>    
                    </tr>    
                `);
            }


            let metaTech = Object.values(Object.assign({}, ...Object.values(techInformations['meta'])));

            if (metaTech.length) {
                metaTech.forEach(meta => {
                    $('#meta-tech-infos').append(`
                        <tr>
                            <td>${meta["network"] != "" ? meta["network"] : "---"}</td>    
                            <td>${meta["url"] != "" ? "<a href='" + meta["url"] + "'>Link</a>" : "---"}</td>    
                        </tr>    
                    `);
                })
            } else {
                $('#meta-tech-infos').append(`
                    <tr>
                        <td>No Data!</td>    
                        <td>No Data!</td>    
                    </tr>    
                `);
            }

            $('#tech_modal').modal('show');
        }
       
    }
</script>
<script>
function checkcp(cpanelId, button) {
    // Disable the current button to prevent multiple submissions
    button.classList.add('disabled');
    button.setAttribute('disabled', 'disabled');

    Swal.fire({
        title: 'Are you sure you want to check this item?',
        text: "You can verify the details before proceeding.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#84d62f',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Check it!'
    }).then((result) => {
        if (result.isConfirmed) {
            button.innerHTML = '<i class="fa fa-sun fa-spin"></i> Checking...';
            button.classList.remove('btn-danger');
            button.classList.add('btn-warning');

            $.ajax({
                url: document.getElementById('checkcp-' + cpanelId).action,
                type: 'POST',
                data: {
                    _token: 'JEVPhjed5WLGXT0Ej1rtrgZXiqR7Q61yCZa08Dc0',
                    id: cpanelId
                },
                success: function(response) {
                    if (!response.message.toLowerCase().includes('bad')) {
                        button.innerHTML = '<i class="fa fa-sun fa-spin"></i> Working';
                        button.classList.remove('btn-warning');
                        button.classList.add('btn-success');

                        // Keep the current button disabled to prevent re-checking
                        button.classList.add('disabled');
                        button.setAttribute('disabled', 'disabled');
                    } else {
                        button.innerHTML = '<i class="fa fa-calendar-check"></i> Bad';
                        button.classList.remove('btn-warning');
                        button.classList.add('btn-danger');

                        // Re-enable the current button if the check failed
                        button.classList.remove('disabled');
                        button.removeAttribute('disabled');
                    }
                },
                error: function(xhr) {
                    button.innerHTML = '<i class="fa fa-calendar-check"></i> Bad';
                    button.classList.remove('btn-warning');
                    button.classList.add('btn-danger');

                    // Re-enable the current button if there was an error
                    button.classList.remove('disabled');
                    button.removeAttribute('disabled');
                }
            });
        } else {
            // If the user cancels, re-enable the current button
            button.classList.remove('disabled');
            button.removeAttribute('disabled');
            button.innerHTML = '<i class="fa fa-calendar-check"></i> Check';
            button.classList.remove('btn-warning');
            button.classList.add('btn-danger');
        }
    });
}
</script>
  </body>
</html>

         <?php
$uid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);
$q = mysqli_query($dbcon, "SELECT resseller FROM users WHERE username='$uid'") or die(mysqli_error());
$r         = mysqli_fetch_assoc($q);
$reselerif = $r['resseller'];
if ($reselerif == "1") {
    $uid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);
    $q = mysqli_query($dbcon, "SELECT soldb FROM resseller WHERE username='$uid'") or die(mysqli_error());
    $r = mysqli_fetch_assoc($q);

    echo '<li><a href="https://jerux.to/seller/index.html"><span class="badge" title="Seller Panel"><span class="glyphicon glyphicon-cloud"></span><span id="seller"></span></span></a></li>';
} else {
} ?>      
<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tickets <span id="alltickets">
<?php
$sze112  = mysqli_query($dbcon, "SELECT * FROM ticket WHERE uid='$uid' and seen='1'");
$r844941 = mysqli_num_rows($sze112);
if ($r844941 == "1") {
    echo '<span class="label label-danger">1</span>';
}
?>
</span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="tickets.html" onclick="pageDiv(11,'Tickets - JeruxShop','tickets.html',0); return false;">Tickets <span class="label label-info"><span id="tickets"></span></span>	<?php
$s1 = mysqli_query($dbcon, "SELECT * FROM ticket WHERE uid='$uid' and seen='1'");
$r1 = mysqli_num_rows($s1);
if ($r1 == "1") {
    echo '<span class="label label-success"> 1 New</span>';
}
?></span></a></li>
            <li><a href="reports.html" onclick="pageDiv(12,'Reports - JeruxShop','reports.html',0); return false;">Reports <span class="label label-info"><span id="reports"></span></span> <?php
$s1 = mysqli_query($dbcon, "SELECT * FROM reports WHERE uid='$uid' and seen='1'");
$r1 = mysqli_num_rows($s1);
if ($r1 == "1") {
    echo '<span class="label label-success"> 1 New</span>';
}
?></span> </a></li>

           </ul>
        </li>


   
    


<div id="mainDiv">


</div>
</body>
</html>

