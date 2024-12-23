<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="referrer" content="no-referrer">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EliteTools</title>

    <link rel="stylesheet" href="{{ asset('resources/build/assets/app-OW0t4n23.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/files/css/flags.css') }}">

    <!-- Scripts -->
    <script type="module" src="{{ asset('resources/build/assets/app-VV5T5m4z.js') }}"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('resources/files/img/favicon.ico') }}">

    <!-- Custom Styles -->

    <!-- FontAwesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <style>
        /* Basic DataTable Styling */
        table.dataTable {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
            background-color: #333; /* Dark background */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* DataTable headers */
        table.dataTable th {
            background-color: #444; /* Darker background */
            color: #fff;
            padding: 12px;
            text-align: left;
            font-weight: bold;
            border: none;
            font-size: 14px;
        }

        /* DataTable row hover effect */
        table.dataTable tbody tr:hover {
            background-color: #555; /* Slightly lighter background on hover */
            cursor: pointer;
        }

        /* Styling for active or selected rows */
        table.dataTable tbody tr.selected {
            background-color: #28a745; /* Green background for selected row */
            color: #fff;
        }

        /* Styling for DataTable cells */
        table.dataTable td {
            padding: 12px;
            font-size: 13px;
            border: 1px solid #555; /* Dark border */
            vertical-align: middle;
            color: #fff;
        }

        /* Zebra striping for DataTable rows */
        table.dataTable tbody tr:nth-child(odd) {
            background-color: #444; /* Darker background */
        }

        table.dataTable tbody tr:nth-child(even) {
            background-color: #333; /* Dark background */
        }

        /* DataTable pagination styling */
        .dataTables_paginate {
            text-align: center;
            padding: 10px 0;
        }

        .dataTables_paginate .paginate_button {
            background-color: #007bff;
            color: #fff;
            padding: 6px 12px;
            border-radius: 4px;
            margin: 0 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .dataTables_paginate .paginate_button:hover {
            background-color: #0056b3;
        }

        .dataTables_paginate .paginate_button.disabled {
            background-color: #555;
            cursor: not-allowed;
        }

        /* Styling for the DataTable search box */
        .dataTables_filter input {
            border-radius: 4px;
            padding: 5px;
            font-size: 14px;
            border: 1px solid #555;
            width: 250px;
            background-color: #333; /* Dark background */
            color: #fff;
        }

        /* Loading spinner for DataTable */
        .dataTables_processing {
            background: rgba(0, 0, 0, 0.2);
            color: #007bff;
            padding: 10px;
            font-size: 18px;
            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 10000;
            border-radius: 5px;
        }

        /* DataTable buttons */
        .dt-buttons {
            margin-top: 10px;
            text-align: right;
        }

        .dt-button {
            background-color: #007bff;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            margin-left: 5px;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .dt-button:hover {
            background-color: #0056b3;
        }

        /* Style for badges with rounded corners */
        .label-as-badge {
            border-radius: 12px;
            padding: 5px 12px;
            background-color: #007bff;
            color: white;
            font-size: 14px;
            font-weight: bold;
        }

        .label-as-badge.secondary {
            background-color: #6c757d;
        }

        /* General styling for body padding */
        body {
            padding-top: 60px;
            font-family: 'Arial', sans-serif;
            background-color: #121212; /* Dark background */
            color: #ddd; /* Light text */
        }

        /* Ensures tables with sticky headers work properly */
        table.floatThead-table {
            border-top: none;
            border-bottom: none;
            background-color: #333; /* Dark background */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Media query for dropdowns to display correctly on larger screens */
        @media (min-width: 768px) {
            .dropdown:hover .dropdown-menu {
                display: block;
                animation: fadeIn 0.3s ease-in-out;
            }
        }

        /* Animation for fade-in dropdown */
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        /* Styling for the loader */
        #mydiv {
            height: 400px;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .ajax-loader {
            position: absolute;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            width: 150px;
            height: 150px;
            border: 5px solid #444; /* Dark grey background */
            border-top: 5px solid #007bff; /* Blue loader */
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        /* Spinning animation for the loader */
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
<header class="container">
    <div class="row justify-content-center">
        <div class="col-xl-7">
            <div class="navbar navbar-expand-lg bg-white px-0">
                <div class="container px-0">
                    <!--<a href="https://elitetools.life/elitetools/" rel="home" class="navbar-brand">BitRef</a>-->
                    <h1 class="h1 mb-0"><a href="https://elitetools.life/elitetools/" rel="home" title="Go to Homepage"><span>EliteTools</span>Shop</a></h1>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-label="Menu">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <nav class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <!-- Hosts Dropdown Menu -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle sparkle" href="#" id="hostsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Hosts <span class="bi bi-chevron-down"></span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="hostsDropdown">
                                    <li class="nav-item mt-1 mb-1"><a class="nav-link" href="rdp" onclick="itemDiv(1,'RDP - EliteTools','rdp',0); return false;">RDPs</a></li>
                                </ul>
                            </li>
                        </ul>

                        <!-- User-specific options in the navbar -->
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="addBalance" onclick="itemDiv(13,'Add Balance - EliteTools','addBalance',0); return false;">
                                    <span class="badge"><b><span id="balance"></span></b> <span class="bi bi-plus-circle"></span></span>
                                </a>
                            </li>

                            <!-- User dropdown with settings, orders, and logout options -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Account  <span class="bi bi-person"></span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="accountDropdown">
                                    <li><a class="dropdown-item" href="profile" onclick="itemDiv(14,'profile-settings - EliteTools','profile',0); return false;">Profile</a></li>
                                    <li><a class="dropdown-item" href="orders" onclick="itemDiv(15,'Orders - EliteTools','orders',0); return false;">Orders History</a></li>
                                    <li><a class="dropdown-item" href="addBalance" onclick="itemDiv(13,'Add Balance - EliteTools','addBalance',0); return false;">Add Balance</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="logout">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main content area -->
<div id="mainDiv">
    <!-- Filter Tab Section -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" id="filter-tab" data-bs-toggle="tab" href="#filter">
                <i class="fas fa-filter"></i> Filter
            </a>
        </li>
    </ul>

    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade show active" id="filter">
            <table id="filterTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th class="sorttable_nosort">Country</th>
                        <th class="sorttable_nosort">Description</th>
                        <th class="sorttable_nosort">Domains</th>
                        <th class="sorttable_nosort">Seller</th>
                        <th class="sorttable_nosort"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <!-- Country Filter -->
                        <td>
                            <select class="filterselect form-select form-select-sm" name="leads_country">
                                <option value="">ALL</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Belgium">Belgium</option>
                                <!-- Add other options here -->
                            </select>
                        </td>

                        <!-- Description Filter -->
                        <td>
                            <input class="filterinput form-control form-control-sm" name="leads_about" size="3">
                        </td>

                        <!-- Domains Filter -->
                        <td>
                            <input class="filterinput form-control form-control-sm" name="leads_domains" size="3">
                        </td>

                        <!-- Seller Filter -->
                        <td>
                            <select class="filterselect form-select form-select-sm" name="leads_seller">
                                <option value="">ALL</option>
                                <option value="seller18">seller18</option>
                                <option value="seller26">seller26</option>
                                <option value="seller34">seller34</option>
                                <option value="seller37">seller37</option>
                            </select>
                        </td>

                        <!-- Filter Button -->
                        <td>
                            <button id="filterbutton" class="btn btn-primary btn-sm" disabled>
                                Filter <span class="glyphicon glyphicon-filter"></span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Leads Table -->
<table id="table" class="table table-striped table-bordered table-condensed" style="width: 100%">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col" style="width: 12%">Country</th>
            <th scope="col">Source</th>
            <th scope="col">Emails Domains</th>
            <th scope="col">Email N</th>
            <th scope="col">Sample</th>
            <th scope="col">Seller</th>
            <th scope="col">Price</th>
            <th scope="col">Added on</th>
            <th scope="col">Buy</th>
        </tr>
    </thead>
    <tbody>
        <!-- Dynamic Content: {items} -->
    </tbody>
</table>

<!-- jQuery, Bootstrap 5, and DataTable JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script>
    /* Refreshes dynamic data on the page */
    function updatePageData() {
        $.ajax({
            type: 'GET',
            url: 'ajaxinfo',
            timeout: 10000,
            success: function(response) {
                if (response !== '01') {
                    const data = JSON.parse(response);
                    Object.keys(data).forEach(key => {
                        $("#" + key).html(data[key]).show();
                    });
                } else {
                    window.location.href = "logout.html";
                }
            }
        });
    }

    /* Sets up periodic data updates every 3 seconds */
    setInterval(updatePageData, 3000);
    updatePageData();

    /* Tracks the state of the Ctrl key */
    let isCtrlPressed = false;
    $(document).on("keydown", function(event) {
        if (event.which === 17) isCtrlPressed = true;
    });

    $(document).on("keyup", function() {
        isCtrlPressed = false;
    });

    /* Dynamically loads page sections */
    function loadContent(sectionId, title, url, replaceState = false) {
        if (isCtrlPressed) {
            window.open(url, '_blank');
            return false;
        }

        const pageData = { Title: title, Url: url };

        if (location.pathname !== "/" + pageData.Url) {
            if (replaceState) {
                history.replaceState(pageData, pageData.Title, pageData.Url);
            } else {
                history.pushState(pageData, pageData.Title, pageData.Url);
            }
        }

        document.title = pageData.Title;
        $("#mainDiv").html('<div id="loading"><img src="https://elitetools.life/elitetools/resources/files/img/load2.gif" class="ajax-loader"></div>').show();

        $.ajax({
            type: 'GET',
            url: `lead_item${sectionId}.html`,
            success: function(response) {
                $("#mainDiv").html(response).show();

                // Initialize DataTable
                const dataTable = $('#table').DataTable({
                    responsive: true,
                    autoWidth: false,
                    order: [], // Disable initial ordering
                    language: {
                        search: "Filter:",
                        lengthMenu: "Show _MENU_ entries",
                        info: "Showing _START_ to _END_ of _TOTAL_ entries"
                    }
                });

                // Apply Bootstrap sticky header class
                $('thead').addClass('sticky-top bg-light');

                if (!replaceState) updatePageData();
            }
        });

        if (typeof stopCheckBTC === 'function') stopCheckBTC();
    }

    /* Ensures the page reloads correctly when navigating via browser history */
    $(window).on("popstate", function() {
        location.reload();
    });

    /* Initializes page features on load */
    $(window).on('load', function() {
        $('.dropdown').hover(function() {
            $('.dropdown-toggle', this).trigger('click');
        });

        loadContent(6, 'Leads - EliteTools', 'leads', true);

        const clipboard = new ClipboardJS('.copyit');
        clipboard.on('success', function(event) {
            displayTooltip(event.trigger, 'Copied!');
            hideTooltip(event.trigger);
            event.clearSelection();
        });
    });

    /* Manages tooltips for clipboard copy actions */
    function displayTooltip(button, message) {
        $(button).tooltip('dispose')
            .attr('data-bs-original-title', message)
            .tooltip('show');
    }

    function hideTooltip(button) {
        setTimeout(() => {
            $(button).tooltip('hide');
        }, 1000);
    }

    // Initialize DataTable for Leads Table
    $(document).ready(function() {
        $('#table').DataTable({
            responsive: true, // Makes the table responsive on small screens
            paging: true, // Enable pagination
            searching: true, // Enable search functionality
            ordering: true, // Enable column sorting
            info: true, // Show info about the table (number of records etc.)
            autoWidth: false, // Disable auto width adjustment to handle columns more precisely
        });

        // Initialize DataTable for Filter Table
        var filterTable = $('#filterTable').DataTable();

        // Enable filter button when changes are made in the filter inputs
        $('.filterinput, .filterselect').on('input change', function() {
            $('#filterbutton').prop('disabled', false);
        });

        // Apply filters when the button is clicked
        $('#filterbutton').click(function() {
            var countryFilter = $("select[name='leads_country']").val();
            var descriptionFilter = $("input[name='leads_about']").val();
            var domainsFilter = $("input[name='leads_domains']").val();
            var sellerFilter = $("select[name='leads_seller']").val();

            // Apply the filter to the DataTable
            filterTable.columns(0).search(countryFilter)
                .columns(1).search(descriptionFilter)
                .columns(2).search(domainsFilter)
                .columns(3).search(sellerFilter)
                .draw();
        });
    });

    // Function to handle buying a lead
    function buyit(id, code, price) {
        const myModal = new bootstrap.Modal(document.getElementById('myModal'), {
            keyboard: false
        });

        myModal.hide(); // Close the modal using Bootstrap 5 method

        // Bootstrap 5 confirm alert
        if (confirm("Are you sure?")) {
            var balance = $('#balance').text();
            if (price <= balance) {
                $("#buy_" + id).html('Purchasing...').show();
          $.ajax({
          type: 'GET',
          url: 'leadsbuy' + id + '-' + code + '.html',
          success: function(data) {
            $("#buy_" + id).html(data).show();
            ajaxinfo();
          }
        });
      } else {
        // Bootstrap 5 alert style for insufficient balance
        let alertHtml = `
          <div class="modal fade" id="balanceModal" tabindex="-1" aria-labelledby="balanceModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="balanceModalLabel">Insufficient Balance</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <center>
                    <img src="files/img/balance.png" alt="Balance">
                    <h2><b>No enough balance!</b></h2>
                    <h4>Please refill your balance <a class="btn btn-primary btn-xs" href="addBalance" onclick="window.open(this.href);return false;">Add Balance <span class="glyphicon glyphicon-plus"></span></a></h4>
                  </center>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        `;
        $('body').append(alertHtml);
        var balanceModal = new bootstrap.Modal(document.getElementById('balanceModal'));
        balanceModal.show();
      }
    }
  }

  // Function to show lead information
  function leadinfo(id, code) {
    $("#myModalLabel").text('Sample');
    $("#modelbody").html('');
    const myModal = new bootstrap.Modal(document.getElementById('myModal'), {
      keyboard: false
    });
    myModal.show(); // Show the modal using Bootstrap 5 method

    $.ajax({
      type: 'GET',
      url: 'leadsshow' + id + '-' + code + '.html',
      success: function(data) {
        $("#modelbody").html(data);
      }
    });
  }
</script>
