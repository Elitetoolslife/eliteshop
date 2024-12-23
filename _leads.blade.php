Maintain JavaScript structure and use it for implementation  @extends('layouts.app')

@section('content')
    <div id="mainDiv"></div>
@endsection

@push('scripts')
    <script type="text/javascript">
        /* Refreshes dynamic data on the page */
        function updatePageData() {
            $.ajax({
                type: 'GET',
                url: '{{ url("ajaxinfo") }}',
                timeout: 10000,
                success: function(response) {
                    if (response !== '01') {
                        const data = JSON.parse(response);
                        Object.keys(data).forEach(key => {
                            $("#" + key).html(data[key]).show();
                        });
                    } else {
                        window.location.href = "{{ route('logout') }}";
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
            $("#mainDiv").html('<div id="loading"><img src="{{ asset("resources/files/img/load2.gif") }}" class="ajax-loader"></div>').show();

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
    </script>