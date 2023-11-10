@extends('User.layout.main')
@section('style')
@endsection
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Content-->
        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container">
                <div class="row">
                    <div class="col-md-3 mb-3 hover-elevate-up">
                        <a href="{{ route('staff.index') }}">
                            <div class="card card-xl-stretchcol-md-2">
                                <div class="card-body p-0">
                                    <div class="d-flex flex-stack card-p flex-grow-1">
                                        <span class="symbol symbol-50px me-2">
                                            <span class="symbol-label bg-light-info">
                                                <i class="fas fa-user-friends fs-2x text-info"></i>
                                            </span>
                                        </span>
                                        <div class="d-flex flex-column text-end">
                                            <span class="text-dark fw-bold fs-2">{{ number_format($data['staffs']) }}</span>
                                            <span class="text-muted fw-semibold mt-1">
                                                Nhân viên
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 mb-3 hover-elevate-up">
                        <a href="{{ route('promotion.index') }}">
                            <div class="card card-xl-stretchcol-md-2">
                                <div class="card-body p-0">
                                    <div class="d-flex flex-stack card-p flex-grow-1">
                                        <span class="symbol symbol-50px me-2">
                                            <span class="symbol-label bg-light-warning">
                                                <i class="fas fa-gift fs-2x text-warning"></i>
                                            </span>
                                        </span>
                                        <div class="d-flex flex-column text-end">
                                            <span
                                                class="text-dark fw-bold fs-2">{{ number_format($data['promotions']) }}</span>
                                            <span class="text-muted fw-semibold mt-1">
                                                Khuyến mãi
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 mb-3 hover-elevate-up">
                        <a href="{{ route('customer.index') }}">
                            <div class="card card-xl-stretchcol-md-2">
                                <div class="card-body p-0">
                                    <div class="d-flex flex-stack card-p flex-grow-1">
                                        <span class="symbol symbol-50px me-2">
                                            <span class="symbol-label bg-light-success">
                                                <i class="fas fa-user-circle fs-2x text-success"></i>
                                            </span>
                                        </span>
                                        <div class="d-flex flex-column text-end">
                                            <span
                                                class="text-dark fw-bold fs-2">{{ number_format($data['customers']) }}</span>
                                            <span class="text-muted fw-semibold mt-1">
                                                Khách hàng
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 mb-3 hover-elevate-up">
                        <a href="{{ route('order.index') }}">
                            <div class="card card-xl-stretchcol-md-2">
                                <div class="card-body p-0">
                                    <div class="d-flex flex-stack card-p flex-grow-1">
                                        <span class="symbol symbol-50px me-2">
                                            <span class="symbol-label bg-light-danger">
                                                <i class="far fa-file-alt fs-2x text-danger"></i>
                                            </span>
                                        </span>
                                        <div class="d-flex flex-column text-end">
                                            <span class="text-dark fw-bold fs-2">{{ number_format($data['orders']) }}</span>
                                            <span class="text-muted fw-semibold mt-1">
                                                Đơn hàng
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="card card-flush h-xl-100 mb-4">
                    <!--begin::Header-->
                    <div class="card-header py-7">
                        <!--begin::Statistics-->
                        <div class="card-title align-items-start flex-column">
                            <span class="fs-6 fw-semibold text-uppercase">
                                <i class="ki-outline ki-dollar fs-2"></i> Thống kê doanh thu
                            </span>
                        </div>
                        <!--end::Statistics-->
                        <!--begin::Toolbar-->
                        <div class="card-toolbar">
                            <div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left"
                                class="btn btn-sm btn-light d-flex align-items-center px-4 filter-date">
                                <!--begin::Display range-->
                                <div class="text-gray-600 fw-bold">Loading date range...</div>
                                <!--end::Display range-->
                                <i class="ki-outline ki-calendar-8 fs-1 ms-2 me-0"></i>
                            </div>
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body d-flex align-items-end p-0">
                        <!--begin::Chart-->
                        <div id="kt_charts_access" class="h-300px w-100 min-h-auto ps-7 pe-0 mb-5"></div>
                        <!--end::Chart-->
                    </div>
                    <!--end::Body-->
                </div>
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
@endsection
@section('script')
    <script>
        let chartData = [];
        let chartCategory = [];

        load_chart_revenue('');

        $('.filter-date').on('apply.daterangepicker', function(ev, picker) {
            day_from = picker.startDate.format('YYYY-MM-DD');
            day_to = picker.endDate.format('YYYY-MM-DD');
            const _date = day_from + ' to ' + day_to;
            load_chart_revenue(_date);
        });

        var KTChartRevenue = (function() {
            var e = {
                    self: null,
                    rendered: !1
                },
                t = function(e) {
                    var t = document.getElementById("kt_charts_access");
                    if (t) {
                        var a = parseInt(KTUtil.css(t, "height")),
                            l = KTUtil.getCssVariableValue("--bs-gray-500"),
                            r = KTUtil.getCssVariableValue("--bs-border-dashed-color"),
                            o = KTUtil.getCssVariableValue("--bs-warning"),
                            i = {
                                series: [{
                                    name: "Số lần",
                                    data: chartData,
                                }, ],
                                chart: {
                                    fontFamily: "inherit",
                                    type: "area",
                                    height: a,
                                    toolbar: {
                                        show: !1
                                    },
                                },
                                legend: {
                                    show: !1
                                },
                                dataLabels: {
                                    enabled: !1
                                },
                                fill: {
                                    type: "gradient",
                                    gradient: {
                                        shadeIntensity: 1,
                                        opacityFrom: 0.4,
                                        opacityTo: 0,
                                        stops: [0, 80, 100],
                                    },
                                },
                                stroke: {
                                    curve: "smooth",
                                    show: !0,
                                    width: 3,
                                    colors: [o],
                                },
                                xaxis: {
                                    categories: chartCategory,
                                    axisBorder: {
                                        show: !1
                                    },
                                    axisTicks: {
                                        show: !1
                                    },
                                    offsetX: 20,
                                    tickAmount: 4,
                                    labels: {
                                        rotate: 0,
                                        rotateAlways: !1,
                                        style: {
                                            colors: l,
                                            fontSize: "12px"
                                        },
                                    },
                                    crosshairs: {
                                        position: "front",
                                        stroke: {
                                            color: o,
                                            width: 1,
                                            dashArray: 3
                                        },
                                    },
                                    tooltip: {
                                        enabled: !0,
                                        formatter: void 0,
                                        offsetY: 0,
                                        style: {
                                            fontSize: "12px"
                                        },
                                    },
                                },
                                yaxis: {
                                    tickAmount: 4,
                                    // max: 10,
                                    min: 0,
                                    labels: {
                                        style: {
                                            colors: l,
                                            fontSize: "12px"
                                        },
                                        formatter: function(e) {
                                            return e;
                                        },
                                    },
                                },
                                states: {
                                    normal: {
                                        filter: {
                                            type: "none",
                                            value: 0
                                        }
                                    },
                                    hover: {
                                        filter: {
                                            type: "none",
                                            value: 0
                                        }
                                    },
                                    active: {
                                        allowMultipleDataPointsSelection: !1,
                                        filter: {
                                            type: "none",
                                            value: 0
                                        },
                                    },
                                },
                                tooltip: {
                                    style: {
                                        fontSize: "12px"
                                    },
                                    y: {
                                        formatter: function(e) {
                                            return e;
                                        },
                                    },
                                },
                                colors: [o],
                                grid: {
                                    borderColor: r,
                                    strokeDashArray: 4,
                                    yaxis: {
                                        lines: {
                                            show: !0
                                        }
                                    },
                                },
                                markers: {
                                    strokeColor: o,
                                    strokeWidth: 3
                                },
                            };
                        (e.self = new ApexCharts(t, i)),
                        setTimeout(function() {
                            e.self.render(), (e.rendered = !0);
                        }, 200);
                    }
                };
            return {
                init: function() {
                    t(e);
                },
            };
        })();

        function load_chart_revenue(_date) {
            const url = "{{ route('home.revenue') }}?date=" + _date;
            $.get(url, function(rs) {
                if (rs.status == 200) {
                    chartData = rs?.chart?.data || [];
                    chartCategory = rs?.chart?.category || [];
                    $('#kt_charts_access').empty();
                    KTChartRevenue.init();
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: rs.message
                    });
                }
            });
        }
    </script>
@endsection
