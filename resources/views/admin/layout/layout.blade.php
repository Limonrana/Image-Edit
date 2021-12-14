<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>@yield('title', 'Car Image Editing - Web Apps')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&amp;display=swap" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/icon-set/style.css') }}">
    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.minc619.css?v=1.0') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @yield('styles')
    <style>
        main#content {
            padding-top: 3.75rem;
        }
        .navbar-brand-text {
            margin-bottom: 0;
            color: #FFFFFF;
            font-family: cursive;
            font-size: 20px;
        }
        img.navbar-brand-logo.short {
            min-width: 2.5rem;
            max-width: 2.5rem;
            margin-right: 10px;
        }
        .swal2-cancel {
            margin-right: 25px;
        }
        .custom-file-boxed {
            border: .1rem dashed #818181;
        }
        .custom-file-boxed-error {
            border: 1.5px dashed #ff0000 !important;
        }
        .invalid-feedback {
            display: block;
        }
    </style>
</head>

<body class="@auth('admin') footer-offset has-navbar-vertical-aside navbar-vertical-aside-show-xl @elseauth() footer-offset @endauth" @if(Request::is('admin/pages/common*')) data-offset="80" data-hs-scrollspy-options='{"target": "#navbarSettings"}' @endif>

<script src="{{ asset('assets/vendor/hs-navbar-vertical-aside/hs-navbar-vertical-aside-mini-cache.js') }}"></script>

@auth('admin')
    @include('admin.partials.sidebar')

    @include('admin.partials.searchbar')
@endauth

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main" class="main">
    <!-- Content -->
    @yield('content')
    <!-- End Content -->

    @include('admin.partials.footer')

</main>
<!-- ========== END MAIN CONTENT ========== -->

<!-- JS Implementing Plugins -->
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js.extensions/chartjs-extensions.js') }}"></script>
<script src="{{ asset('assets/vendor/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js') }}"></script>

<!-- JS Front -->
<script src="{{ asset('assets/js/theme.min.js') }}"></script>
<!-- JS Plugins Init. -->
<script>
    $(document).on('ready', function () {

        // INITIALIZATION OF MEGA MENU
        // =======================================================
        var megaMenu = new HSMegaMenu($('.js-mega-menu'), {
            desktop: {
                position: 'left'
            }
        }).init();



        // INITIALIZATION OF NAVBAR VERTICAL NAVIGATION
        // =======================================================
        var sidebar = $('.js-navbar-vertical-aside').hsSideNav();


        // INITIALIZATION OF TOOLTIP IN NAVBAR VERTICAL MENU
        // =======================================================
        $('.js-nav-tooltip-link').tooltip({ boundary: 'window' })

        $(".js-nav-tooltip-link").on("show.bs.tooltip", function(e) {
            if (!$("body").hasClass("navbar-vertical-aside-mini-mode")) {
                return false;
            }
        });


        // INITIALIZATION OF UNFOLD
        // =======================================================
        $('.js-hs-unfold-invoker').each(function () {
            var unfold = new HSUnfold($(this)).init();
        });


        // INITIALIZATION OF FORM SEARCH
        // =======================================================
        $('.js-form-search').each(function () {
            new HSFormSearch($(this)).init()
        });

        // INITIALIZATION OF SELECT2
        // =======================================================
        $('.js-select2-custom').each(function () {
            var select2 = $.HSCore.components.HSSelect2.init($(this));
        });


        // INITIALIZATION OF CHARTJS
        // =======================================================
        Chart.plugins.unregister(ChartDataLabels);

        $('.js-chart').each(function () {
            $.HSCore.components.HSChartJS.init($(this));
        });

        var updatingChart = $.HSCore.components.HSChartJS.init($('#updatingData'));

        // CALL WHEN TAB IS CLICKED
        // =======================================================
        $('[data-toggle="chart-bar"]').click(function(e) {
            let keyDataset = $(e.currentTarget).attr('data-datasets')

            if (keyDataset === 'lastWeek') {
                updatingChart.data.labels = ["Apr 22", "Apr 23", "Apr 24", "Apr 25", "Apr 26", "Apr 27", "Apr 28", "Apr 29", "Apr 30", "Apr 31"];
                updatingChart.data.datasets = [
                    {
                        "data": [120, 250, 300, 200, 300, 290, 350, 100, 125, 320],
                        "backgroundColor": "#377dff",
                        "hoverBackgroundColor": "#377dff",
                        "borderColor": "#377dff"
                    },
                    {
                        "data": [250, 130, 322, 144, 129, 300, 260, 120, 260, 245, 110],
                        "backgroundColor": "#e7eaf3",
                        "borderColor": "#e7eaf3"
                    }
                ];
                updatingChart.update();
            } else {
                updatingChart.data.labels = ["May 1", "May 2", "May 3", "May 4", "May 5", "May 6", "May 7", "May 8", "May 9", "May 10"];
                updatingChart.data.datasets = [
                    {
                        "data": [200, 300, 290, 350, 150, 350, 300, 100, 125, 220],
                        "backgroundColor": "#377dff",
                        "hoverBackgroundColor": "#377dff",
                        "borderColor": "#377dff"
                    },
                    {
                        "data": [150, 230, 382, 204, 169, 290, 300, 100, 300, 225, 120],
                        "backgroundColor": "#e7eaf3",
                        "borderColor": "#e7eaf3"
                    }
                ]
                updatingChart.update();
            }
        })


        // INITIALIZATION OF BUBBLE CHARTJS WITH DATALABELS PLUGIN
        // =======================================================
        $('.js-chart-datalabels').each(function () {
            $.HSCore.components.HSChartJS.init($(this), {
                plugins: [ChartDataLabels],
                options: {
                    plugins: {
                        datalabels: {
                            anchor: function(context) {
                                var value = context.dataset.data[context.dataIndex];
                                return value.r < 20 ? 'end' : 'center';
                            },
                            align: function(context) {
                                var value = context.dataset.data[context.dataIndex];
                                return value.r < 20 ? 'end' : 'center';
                            },
                            color: function(context) {
                                var value = context.dataset.data[context.dataIndex];
                                return value.r < 20 ? context.dataset.backgroundColor : context.dataset.color;
                            },
                            font: function(context) {
                                var value = context.dataset.data[context.dataIndex],
                                    fontSize = 25;

                                if (value.r > 50) {
                                    fontSize = 35;
                                }

                                if (value.r > 70) {
                                    fontSize = 55;
                                }

                                return {
                                    weight: 'lighter',
                                    size: fontSize
                                };
                            },
                            offset: 2,
                            padding: 0
                        }
                    }
                },
            });
        });


        // INITIALIZATION OF DATERANGEPICKER
        // =======================================================
        $('.js-daterangepicker').daterangepicker();

        $('.js-daterangepicker-times').daterangepicker({
            timePicker: true,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(32, 'hour'),
            locale: {
                format: 'M/DD hh:mm A'
            }
        });

        var start = moment();
        var end = moment();

        function cb(start, end) {
            $('#js-daterangepicker-predefined .js-daterangepicker-predefined-preview').html(start.format('MMM D') + ' - ' + end.format('MMM D, YYYY'));
        }

        $('#js-daterangepicker-predefined').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);


        // INITIALIZATION OF DATATABLES
        // =======================================================
        var datatable = $.HSCore.components.HSDatatables.init($('#datatable'), {
            select: {
                style: 'multi',
                selector: 'td:first-child input[type="checkbox"]',
                classMap: {
                    checkAll: '#datatableCheckAll',
                    counter: '#datatableCounter',
                    counterInfo: '#datatableCounterInfo'
                }
            },
            language: {
                zeroRecords: '<div class="text-center p-4">' +
                    '<img class="mb-3" src="{{ asset('assets/svg/illustrations/sorry.svg') }}" alt="Image Description" style="width: 7rem;">' +
                    '<p class="mb-0">No data to show</p>' +
                    '</div>'
            }
        });

        $('.js-datatable-filter').on('change', function() {
            var $this = $(this),
                elVal = $this.val(),
                targetColumnIndex = $this.data('target-column-index');

            datatable.column(targetColumnIndex).search(elVal).draw();
        });

        $('#datatableSearch').on('mouseup', function (e) {
            var $input = $(this),
                oldValue = $input.val();

            if (oldValue == "") return;

            setTimeout(function(){
                var newValue = $input.val();

                if (newValue == ""){
                    // Gotcha
                    datatable.search('').draw();
                }
            }, 1);
        });


        // INITIALIZATION OF CLIPBOARD
        // =======================================================
        $('.js-clipboard').each(function() {
            var clipboard = $.HSCore.components.HSClipboard.init(this);
        });

        // INITIALIZATION OF FILE ATTACH
        // =======================================================
        $('.js-file-attach').each(function () {
            var customFile = new HSFileAttach($(this)).init();
        });

        // INITIALIZATION OF TAGIFY
        // =======================================================
        $('.js-tagify').each(function () {
            var tagify = $.HSCore.components.HSTagify.init($(this));
        });

        // INITIALIZATION OF COUNT CHARACTERS
        // =======================================================
        $('.js-count-characters').each(function () {
            new HSCountCharacters($(this)).init()
        });

        // INITIALIZATION OF FANCYBOX
        // =======================================================
        $('.js-fancybox').each(function() {
            var fancybox = $.HSCore.components.HSFancyBox.init($(this));
        })

        // INITIALIZATION OF JVECTORMAP
        // =======================================================
        $('.js-jvectormap').each(function () {
            var jVectorMap = $.HSCore.components.HSJVectorMap.init($(this));
        });

        @if(Request::is('admin/pages/common*'))
            // INITIALIZATION OF STICKY BLOCKS
            // =======================================================
            $('.js-sticky-block').each(function () {
                var stickyBlock = new HSStickyBlock($(this), {
                    targetSelector: $('#header').hasClass('navbar-fixed') ? '#header' : null
                }).init();
            });


            // INITIALIZATION OF SCROLL NAV
            // =======================================================
            var scrollspy = new HSScrollspy($('body'), {
                // !SETTING "resolve" PARAMETER AND RETURNING "resolve('completed')" IS REQUIRED
                beforeScroll: function(resolve) {
                    if (window.innerWidth < 992) {
                        $('#navbarVerticalNavMenu').collapse('hide').on('hidden.bs.collapse', function () {
                            return resolve('completed');
                        });
                    } else {
                        return resolve('completed');
                    }
                }
            }).init();
        @endif
    });
</script>

{{--Extra JS Plugin--}}
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/axios/0.23.0/axios.min.js"></script>
<script>
    @if(Session::has('success'))
        toastr.options = {"closeButton" : true, "progressBar" : true};
        toastr.success("{{ session('success') }}");
    @elseif(Session::has('warning'))
        toastr.options = {"closeButton" : true, "progressBar" : true};
        toastr.warning("{{ session('warning') }}");
    @elseif(Session::has('error'))
        toastr.options = {"closeButton" : true, "progressBar" : true};
        toastr.error("{{ session('error') }}");
    @endif


    $(document).on("click", "#delete", function(e){
        e.preventDefault();
        var link = $(this).attr('href');
        var parent = $(this).parent();
        var child = $(this).children();

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                );
                if (link !== undefined && link !== 'javascript:;') {
                    window.location.href = link;
                } else if (parent !== undefined && parent[0].nodeName === 'FORM') {
                    parent.submit();
                } else {
                    child.submit();
                }
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your targeted file is safe :)',
                    'error'
                )
            }
        })
    });

    $(document).on("click", "#comfimation", function(e){
        e.preventDefault();
        let link = $(this).attr('href');
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, want it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                if (link !== undefined) {
                    window.location.href = link;
                }
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your data wasn\'t changed :)',
                    'error'
                )
            }
        })
    });
</script>
@yield('script')
</body>
</html>
