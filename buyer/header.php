<!-- Dark Mode -->
<!-- Layout API, functionality initialized in Template._uiApiLayout() -->
<button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="dark_mode_toggle">
    <i class="far fa-moon"></i>
</button>
<!-- END Dark Mode -->

<!--just a space character to separate the icons -->
&nbsp;
<!--just a space character to separate the icons -->

<!-- Notifications Dropdown -->
<div class="dropdown d-inline-block me-2">
    <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-notifications-dropdown"
        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-fw fa-bell"></i>
        <span class="text-primary">•</span>
    </button>
    <div class="dropdown-menu dropdown-menu-lg p-0 border-0 fs-sm" aria-labelledby="page-header-notifications-dropdown">
        <div class="p-2 bg-body-light border-bottom text-center rounded-top">
            <h5 class="dropdown-header text-uppercase">Notifications Center</h5>
        </div>
        <ul class="nav-items mb-0">
            <?php
            $uid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);
            $q = mysqli_query($dbcon, "SELECT resseller FROM users WHERE username='$uid'") or die(mysqli_error());
            $r = mysqli_fetch_assoc($q);
            $reselerif = $r['resseller'];
            if ($reselerif == "1") {
                $uid = mysqli_real_escape_string($dbcon, $_SESSION['sname']);
                $q = mysqli_query($dbcon, "SELECT soldb FROM resseller WHERE username='$uid'") or die(mysqli_error());
                $r = mysqli_fetch_assoc($q);
                echo '<li><a href="seller/index.html"><span class="badge" title="Seller Panel"><span class="glyphicon glyphicon-cloud"></span><span id="seller"></span></span></a></li>';
            }
            ?>
        </ul>
    </div>
</div>
<!-- END Notifications Dropdown -->

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
        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0" aria-labelledby="page-header-user-dropdown">
            <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                <img class="img-avatar img-avatar48 img-avatar-thumb"
                    src="https://png.pngtree.com/png-vector/20240612/ourmid/pngtree-monkey-smoke-sigarate-png-image_12720609.png" alt="WaXa Trusted Group">
                <p class="mt-2 mb-0 fw-medium">Username : HustlersFathers</p>
                <p class="mb-0 text-muted fs-sm fw-medium">Account Type : user</p>
            </div>
            <div class="p-2">
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="../add-balance/index.html">
                    <span class="fs-sm fw-medium">Balance</span>
                    <span class="nav-main-link-badge badge rounded-pill bg-success">0 USD</span>
                </a>
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="../become-premium/index.html">
                    <span class="fs-sm fw-medium">Premium</span>
                    <span class="badge rounded-pill bg-info ms-2">normal</span>
                </a>
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="../orders/index.html">
                    <span class="fs-sm fw-medium">Orders</span>
                    <span class="badge rounded-pill bg-primary ms-2">0</span>
                </a>
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="../tickets/index.html">
                    <?php
                    $s1 = mysqli_query($dbcon, "SELECT * FROM ticket WHERE uid='$uid' and seen='1'");
                    $r1 = mysqli_num_rows($s1);
                    if ($r1 == "1") {
                        echo '<span class="label label-success"> 1 New</span>';
                    }
                    ?>
                </a>
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="index.html">
                    <span class="fs-sm fw-medium">Reports</span>
                    <span class="badge rounded-pill bg-danger ms-2">1</span>
                    <?php
                    $s1 = mysqli_query($dbcon, "SELECT * FROM reports WHERE uid='$uid' and seen='1'");
                    $r1 = mysqli_num_rows($s1);
                    if ($r1 == "1") {
                        echo '<span class="label label-success"> 1 New</span>';
                    }
                    ?>
                </a>
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="index.html">
                    <span class="fs-sm fw-medium">Settings</span>
                </a>
            </div>
            <div role="separator" class="dropdown-divider m-0"></div>
            <div class="p-2">
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="../faq/index.html">
                    <span class="fs-sm fw-medium">FAQ</span>
                </a>
                <a class="dropdown-item d-flex align-items-center justify-content-between" href="../login/index.html" method="POST">
                    <input type="hidden" name="_token" value="JEVPhjed5WLGXT0Ej1rtrgZXiqR7Q61yCZa08Dc0" autocomplete="off">
                    <span class="fs-sm fw-medium">Log Out</span>
                </a>
            </div>
        </div>
    </div>
    <!-- END User Dropdown -->
</div>
<!-- END Right Section -->

<!-- Header Search -->
<div id="page-header-search" class="overlay-header bg-body-extra-light">
    <div class="content-header">
        <form class="w-100" action="https://waxa.pw/bd_search.html" method="POST">
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