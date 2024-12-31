<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=10; IE=9; IE=8; IE=7; IE=EDGE">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="referrer" content="no-referrer">
    <link rel="shortcut icon" href="resources/files/img/favicon.ico">
    <title>JeruxShop</title>

    <!-- External CSS -->
    <link rel="stylesheet" type="text/css" href="{{ resources/files/bootstrap/3/css/bootstrap.css?1">
    <link rel="stylesheet" type="text/css" href="resources/files/css/flags.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">

    <!-- External JS -->
    <script type="text/javascript" src="resources/files/js/jquery.js?1"></script>
    <script type="text/javascript" src="resources/files/bootstrap/3/js/bootstrap.js?1"></script>
    <script type="text/javascript" src="resources/files/js/sorttable.js"></script>
    <script type="text/javascript" src="resources/files/js/table-head.js?3334"></script>
    <script type="text/javascript" src="resources/files/js/bootbox.min.js"></script>
    <script type="text/javascript" src="resources/files/js/clipboard.min.js"></script>

    <style>
        body {
            padding-top: 70px;
            padding-bottom: 70px;
        }

        #table .sortable {}

        table th:not(.sorttable_sorted):not(.sorttable_sorted_reverse):not(.sorttable_nosort):after {
            content: " \25BE";
        }

        .label-as-badge {
            border-radius: 0.5em;
        }

        table.floatThead-table {
            border-top: none;
            border-bottom: none;
            background-color: #fff;
        }

        @media (min-width: 768px) {
            .dropdown:hover .dropdown-menu {
                display: block;
            }
        }

        #mydiv {
            height: 400px;
            position: relative;
        }

        .ajax-loader {
            position: absolute;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            margin: auto;
        }

        .navbar {
            background-color: #001f3f;
        }
    </style>

    <script type="text/javascript">
        function ajaxinfo() {
            $.ajax({
                type: 'GET',
                url: 'ajaxinfo.html',
                timeout: 10000,
                success: function(data) {
                    if (data !== '01') {
                        var data = JSON.parse(data);
                        for (var prop in data) {
                            $("#" + prop).html(data[prop]).show();
                        }
                    } else {
                        window.location = "logout.html";
                    }
                }
            });
        }

        setInterval(function() {
            ajaxinfo();
        }, 3000);

        ajaxinfo();

        $(document).keydown(function(event) {
            if (event.which == "17") cntrlIsPressed = true;
        });

        $(document).keyup(function() {
            cntrlIsPressed = false;
        });

        var cntrlIsPressed = false;

        function pageDiv(n, t, u, x) {
            if (cntrlIsPressed) {
                window.open(u, '_blank');
                return false;
            }
            var obj = { Title: t, Url: u };
            if (("/" + obj.Url) !== location.pathname) {
                if (x !== 1) { 
                    history.pushState(obj, obj.Title, obj.Url);
                } else {
                    history.replaceState(obj, obj.Title, obj.Url);
                }
            }
            document.title = obj.Title;
            $("#mainDiv").html('<div id="mydiv"><img src="resources/files/img/load2.gif" class="ajax-loader"></div>').show();
            $.ajax({
                type: 'GET',
                url: 'divPage' + n + '.html',
                success: function(data) {
                    $("#mainDiv").html(data).show();
                    var newTableObject = document.getElementById('table');
                    sorttable.makeSortable(newTableObject);
                    $(".sticky-header").floatThead({top: 60});
                    if (x == 0) { 
                        ajaxinfo(); 
                    }
                }
            });

            if (typeof stopCheckBTC === 'function') { 
                var a = stopCheckBTC();
            }
        }

        $(window).on("popstate", function(e) {
            location.replace(document.location);
        });

        function setTooltip(btn, message) {
            $(btn).tooltip('hide')
                .attr('data-original-title', message)
                .tooltip('show');
        }

        function hideTooltip(btn) {
            setTimeout(function() {
                $(btn).tooltip('hide');
            }, 1000);
        }
    </script>
</head>


 
<body>
    <nav id="navbar_id" class="navbar navbar-expand-lg navbar-dark bg-white fixed-top">
 
 
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2 home_nav">
 
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="main_site_name nav-item nav-link active" href="https://xleet.is/homepage">
 
                        <i class="middle fab fa-2x fa-redhat pink-color"></i>
 
                        <span class='middle site_name_span'>xLeet</span>
 
                    </a>
                </li>
 
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownHosts" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-server orange-color"></i> Hosts
                    </a>
 
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownHosts">
 
                        <a class="dropdown-item " data-title="Cpanels" href="https://xleet.is/cpanels">
                            Cpanels <span class="badge badge-info d-blue-background">32355</span>
                        </a>
 
                        <a class="dropdown-item " data-title="Shells" href="https://xleet.is/shells">
                            Shells <span class="badge badge-info d-blue-background">5088</span>
                        </a>
 
                        <a class="dropdown-item " data-title="SSH\WHM" href="https://xleet.is/ssh">
                            SSH\WHM <span class="badge badge-info d-blue-background">2041</span>
                        </a>
 
                        <a class="dropdown-item " data-title="RDP" href="https://xleet.is/rdp">
                            RDP <span class="badge badge-info d-blue-background">4586</span>
                        </a>
 
 
                    </div>
                </li>
 
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownSend" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-paper-plane text-primary"></i> Send
                    </a>
 
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownSend">
 
                        <a class="dropdown-item " data-title="SMTP" href="https://xleet.is/smtp">
                            SMTP <span class="badge badge-info d-blue-background">7454</span>
                        </a>
 
                        <a class="dropdown-item" data-title="Mailers" href="https://xleet.is/mailers">
                            Mailers <span class="badge badge-info d-blue-background">70</span>
                        </a>
 
                    </div>
                </li>
 
 
 
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownLeads" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-address-book pink-color"></i> Leads
                    </a>
 
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownLeads">
 
 
 
                        <a class="dropdown-item" data-title="Leads 100% Checked Email list" href="https://xleet.is/leads?type=100%25%20Checked%20Email%20list">
                            <span class="fa fa-fire orange-color"></span>
 
                            100% Checked Email list <span class="badge badge-info d-blue-background">98</span>
                        </a>
 
                        <a class="dropdown-item" data-title="Leads Email Only" href="https://xleet.is/leads?type=Email%20Only">
                            Email Only <span class="badge badge-info d-blue-background">2884</span>
                        </a>
 
                        <a class="dropdown-item" data-title="Leads Combo Email:Password" href="https://xleet.is/leads?type=Combo%20Email%3APassword">
                            Combo Email:Password <span class="badge badge-info d-blue-background">1064</span>
                        </a>
 
                        <a class="dropdown-item" data-title="Leads Combo Username:Password" href="https://xleet.is/leads?type=Combo%20Username%3APassword">
                            Combo Username:Password <span class="badge badge-info d-blue-background">46</span>
                        </a>
 
                        <a class="dropdown-item" data-title="Leads Email Access" href="https://xleet.is/leads?type=Email%20Access">
                            Email Access <span class="badge badge-info d-blue-background">39</span>
                        </a>
 
                        <a class="dropdown-item" data-title="Leads Combo Email:Hash" href="https://xleet.is/leads?type=Combo%20Email%3AHash">
                            Combo Email:Hash <span class="badge badge-info d-blue-background">116</span>
                        </a>
 
                        <a class="dropdown-item" data-title="Leads Phone Number Only" href="https://xleet.is/leads?type=Phone%20Number%20Only">
                            Phone Number Only <span class="badge badge-info d-blue-background">458</span>
                        </a>
 
                        <a class="dropdown-item" data-title="Leads Combo Phone:Password" href="https://xleet.is/leads?type=Combo%20Phone%3APassword">
                            Combo Phone:Password <span class="badge badge-info d-blue-background">46</span>
                        </a>
 
                        <a class="dropdown-item" data-title="Leads Full Data" href="https://xleet.is/leads?type=Full%20Data">
                            Full Data <span class="badge badge-info d-blue-background">42</span>
                        </a>
 
                        <a class="dropdown-item" data-title="Leads Social Media Data" href="https://xleet.is/leads?type=Social%20Media%20Data">
                            Social Media Data <span class="badge badge-info d-blue-background">1</span>
                        </a>
 
                    </div>
                </li>
 
 
 
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBusiness" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-briefcase green-color"></i> Business
                    </a>
 
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownBusiness">
 
                        <a class="dropdown-item" data-title="Cpanel Webmail " href="https://xleet.is/webmail?type=Cpanel%20Webmail">
                            Cpanel Webmail <span class="badge badge-info d-blue-background">22037</span>
                        </a>
                        <a class="dropdown-item" data-title="Godaddy Webmail " href="https://xleet.is/webmail?type=Godaddy%20Webmail">
                            Godaddy Webmail <span class="badge badge-info d-blue-background">1513</span>
                        </a>
                        <a class="dropdown-item" data-title="Office Godaddy Webmail " href="https://xleet.is/webmail?type=Office%20Godaddy%20Webmail">
                            Office Godaddy Webmail <span class="badge badge-info d-blue-background">3359</span>
                        </a>
                        <a class="dropdown-item" data-title="Office365 Webmail " href="https://xleet.is/webmail?type=Office365%20Webmail">
                            Office365 Webmail <span class="badge badge-info d-blue-background">105579</span>
                        </a>
                        <a class="dropdown-item" data-title="Ionos Webmail " href="https://xleet.is/webmail?type=Ionos%20Webmail">
                            Ionos Webmail <span class="badge badge-info d-blue-background">755</span>
                        </a>
 
                    </div>
                </li>
 
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAccounts" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-users salmon-color"></i> Accounts
 
                    </a>
 
                    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownAccounts">
 
 
 
                        <a class="dropdown-item" data-title=" Accounts - Email Marketing  {SendGrid, Amazon Aws.... etc }" href="https://xleet.is/accounts/1">
                            Email Marketing {SendGrid, Amazon Aws.... etc }
 
                            <span class="badge badge-info d-blue-background">
                                5211
 
                            </span>
                        </a>
 
 
                        <a class="dropdown-item" data-title=" Accounts - Webmail Business" href="https://xleet.is/accounts/18">
                            Webmail Business
 
                            <span class="badge badge-info d-blue-background">
                                51094
 
                            </span>
                        </a>
 
 
                        <a class="dropdown-item" data-title=" Accounts - Marketing Tools" href="https://xleet.is/accounts/16">
                            Marketing Tools
 
                            <span class="badge badge-info d-blue-background">
                                28
 
                            </span>
                        </a>
 
 
                        <a class="dropdown-item" data-title=" Accounts - Hosting/Domain" href="https://xleet.is/accounts/14">
                            Hosting/Domain
 
                            <span class="badge badge-info d-blue-background">
                                753
 
                            </span>
                        </a>
 
 
                        <a class="dropdown-item" data-title=" Accounts - Games" href="https://xleet.is/accounts/2">
                            Games
 
                            <span class="badge badge-info d-blue-background">
                                242
 
                            </span>
                        </a>
 
 
                        <a class="dropdown-item" data-title=" Accounts - Graphic / Developer" href="https://xleet.is/accounts/17">
                            Graphic / Developer
 
                            <span class="badge badge-info d-blue-background">
                                96
 
                            </span>
                        </a>
 
 
                        <a class="dropdown-item" data-title=" Accounts - VPN/Socks Proxy" href="https://xleet.is/accounts/3">
                            VPN/Socks Proxy
 
                            <span class="badge badge-info d-blue-background">
                                3417
 
                            </span>
                        </a>
 
 
                        <a class="dropdown-item" data-title=" Accounts - Shopping {Amazon, eBay .... etc }" href="https://xleet.is/accounts/4">
                            Shopping {Amazon, eBay .... etc }
 
                            <span class="badge badge-info d-blue-background">
                                77
 
                            </span>
                        </a>
 
 
                        <a class="dropdown-item" data-title=" Accounts - Program { antivirus, Adobe .... etc }" href="https://xleet.is/accounts/7">
                            Program { antivirus, Adobe .... etc }
 
                            <span class="badge badge-info d-blue-background">
                                160
 
                            </span>
                        </a>
 
 
                        <a class="dropdown-item" data-title=" Accounts - Stream { Music, Netflix, iptv, HBO, bein sport, WWE ...etc }" href="https://xleet.is/accounts/8">
                            Stream { Music, Netflix, iptv, HBO, bein sport, WWE ...etc }
 
                            <span class="badge badge-info d-blue-background">
                                2411
 
                            </span>
                        </a>
 
 
                        <a class="dropdown-item" data-title=" Accounts - Dating" href="https://xleet.is/accounts/9">
                            Dating
 
                            <span class="badge badge-info d-blue-background">
                                1522
 
                            </span>
                        </a>
 
 
                        <a class="dropdown-item" data-title=" Accounts - Learning { udemy, lynda, .... etc. }" href="https://xleet.is/accounts/10">
                            Learning { udemy, lynda, .... etc. }
 
                            <span class="badge badge-info d-blue-background">
                                900
 
                            </span>
                        </a>
 
 
                        <a class="dropdown-item" data-title=" Accounts - Torrent / File Host" href="https://xleet.is/accounts/11">
                            Torrent / File Host
 
                            <span class="badge badge-info d-blue-background">
                                101
 
                            </span>
                        </a>
 
 
                        <a class="dropdown-item" data-title=" Accounts - Voip / Sip" href="https://xleet.is/accounts/12">
                            Voip / Sip
 
                            <span class="badge badge-info d-blue-background">
                                6
 
                            </span>
                        </a>
 
 
                        <a class="dropdown-item" data-title=" Accounts - Social Media" href="https://xleet.is/accounts/15">
                            Social Media
 
                            <span class="badge badge-info d-blue-background">
                                57
 
                            </span>
                        </a>
 
 
                        <a class="dropdown-item" data-title=" Accounts - Other" href="https://xleet.is/accounts/13">
                            Other
 
                            <span class="badge badge-info d-blue-background">
                                1487
 
                            </span>
                        </a>
 
 
                    </div>
                </li>
 
 
 
 
 
            </ul>
 
 
        </div>
        <div class="mx-auto order-0">
            <a class="navbar-brand mx-auto" href="#"> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
 
                <span class="fa fa-bars"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2 user_nav">
            <ul class="navbar-nav ml-auto">
 
                <div id="notifications_container" data-href="https://xleet.is/notifications/get">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownNotifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell red-color"></i>
 
                            <div class='badge badge-info d-blue-background'>
                                0
                            </div>
 
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownNotifications">
 
 
                            <a class="dropdown-item" href="javascript:;">
                                No Notifications
                            </a>
 
 
 
                        </div>
                    </li>
 
                </div>
 
 
 
 
 
                <li class="nav-item">
                    <a class="nav-item nav-link " data-title="Add Balance" href="https://xleet.is/add-balance">
                        <div class='badge badge-danger'><span id="buyer_balance">0.07</span> <i class="fa fa-plus"></i> </div>
 
                    </a>
                </li>
 
 
 
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tickets
 
                        <span class="badge badge-success">0</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                        <a class="dropdown-item" data-title="My Tickets " href="https://xleet.is/tickets">My Tickets
 
 
 
 
 
                            <a class="dropdown-item" data-title="My Reports" href="https://xleet.is/reports">My Reports
 
 
 
 
 
 
 
 
                            </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Account <i class="fa fa-user-secret"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
 
 
 
                        <a class="dropdown-item" data-title="Settings" href="https://xleet.is/user/settings">Settings <i class="fa fa-cog"></i></a>
 
 
                        <a class="dropdown-item" data-title="Orders" href="https://xleet.is/orders">Orders
 
                            <span class="badge badge-success">
                                27
                            </span>
 
                            <i class="fa fa-shopping-cart"></i></a>
 
 
 
                        <a class="dropdown-item" data-title="Add Balance" href="https://xleet.is/add-balance">Add Balance
 
 
                            <i class="fa fa-money-bill-alt"></i></a>
 
 
 
 
 
 
                        <a class="dropdown-item noAjax" href="https://xleet.is/logout">Logout <i class="fa fa-door-open"></i></a>
 
 
                    </div>
                </li>
 
 
            </ul>
        </div>
 
 
    </nav>
 
    <script>
        $('ul.navbar-nav li.dropdown').hover(function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(500);
        }, function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(500);
        });
    </script>
              
        
    <div id="mainDiv"></div>
</body>
</html>