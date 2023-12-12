@extends('User.layout.main')
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <div class="d-flex justify-content-between py-5">
                <div class="">
                    <h1 class="d-flex text-white fw-bold my-1 fs-3">Báo cáo theo sản phẩm</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-white opacity-75">
                            <a href="{{ route('index') }}" class="text-white text-hover-primary">
                                Trang chủ
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-white opacity-75">
                            Báo cáo
                        </li>
                        <!--end::Item-->
                    </ul>
                </div>
            </div>
            <!--begin::Row-->
            <div class="row">
                <div class="col-md-6 mb-5">
                    <!--begin::Card widget 2-->
                    <div class="card">
                        <!--begin::Body-->
                        <div class="card-body fw-semibold d-flex justify-content-between justify-content-center text-info">
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2 header-order">
                                0
                            </span>
                            Tổng sản phẩm đã bán
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card widget 2-->
                </div>
                <div class="col-md-6 mb-5">
                    <!--begin::Card widget 2-->
                    <div class="card">
                        <!--begin::Body-->
                        <div
                            class="card-body d-flex fw-semibold justify-content-between justify-content-center text-danger">
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2 header-revenue">
                                0
                            </span>
                            Tổng doanh thu
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card widget 2-->
                </div>
            </div>
            <div class="row gx-5 gx-xl-10">
                <!--begin::Col-->
                <div class="col-md-12 mb-5">
                    <!--begin::Chart widget 28-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7">
                            <!--begin::Statistics-->
                            <div class="card-title align-items-start flex-column">
                                <!--begin::Description-->
                                <span class="fs-6 fw-semibold text-uppercase">
                                    <i class="ki-outline ki-verify"></i> Sơ đồ doanh thu theo sản phẩm
                                </span>
                                <!--end::Description-->
                            </div>


                            <div class="text-center loading"></div>
                            <div class="card-toolbar">
                                {{-- <div class="w-200px me-3">
                                    <!--begin::Select2-->
                                    <select class="form-select" data-control="select2" data-hide-search="true"
                                        name="category_id">
                                        <option value="" selected>-- Loại --</option>
                                        <option value="product">Sản phẩm</option>
                                        <option value="product">Topping</option>
                                    </select>
                                    <!--end::Select2-->
                                </div> --}}
                                <div class="w-250px me-3">
                                    <!--begin::Select2-->
                                    {{-- <select class="form-select" data-control="select2" data-hide-search="true"
                                        name="category_id">
                                        <option value="" selected>-- Chọn danh mục sản phẩm --</option>
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                        @endforeach
                                    </select> --}}
                                    <!--end::Select2-->
                                </div>
                                <div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left"
                                    data-kt-indicator=""
                                    class="btn btn-sm btn-light filter-date d-flex align-items-center px-4">
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

                        <div class="card-body d-flex align-items-end ps-4 pe-0 pb-4">
                            <!--begin::Chart-->

                            <div id="kt_charts_revenue" class="h-400px w-100 min-h-auto "></div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Chart widget 28-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="gx-5 gx-xl-10">
                <div class="card-body py-3">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="bg-primary">
                                <tr>
                                    <td class="text-uppercase text-bold ">Sản phẩm</td>
                                    <td class="text-uppercase text-bold text-center">Số lượng</td>
                                    <td class="text-uppercase text-bold text-center">Doanh thu</td>
                                    <td class="text-uppercase text-bold text-center">Chi phí</td>
                                    <td class="text-uppercase text-bold text-center">Lợi nhuận</td>
                                </tr>
                            </thead>
                            <tbody class="revenue_by_product">
                                <tr>
                                    <td colspan="5" class="text-center">
                                        Không tìm thấy dữ liệu!
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--end::Table container-->
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Content container-->
    </div>
@endsection
@section('script')
    <script>
        let chartData = [];
        let chartCategory = [];
        let chartDataPercent = [];
        let chartCategoryPercent = [];
        let _date = '';
        loadTotal();

        function loadTotal(date) {
            const __date = date ? date : _date;
            const url = "{{ route('report.report_product') }}?date=" + __date + "&withcontent=1";
            $.get(url, function(rs) {
                if (rs.status == 200) {
                    $('.header-order').text(rs?.data?.total ?? 0);
                    $('.header-revenue').text(rs?.data?.revenue ?? 0);
                    $(".sniper-content").remove();
                }
            });
        }
        var KTChartLogAccess = (function() {
            var e = {
                    self: null,
                    rendered: !1
                },
                t = function(e) {
                    var t = document.getElementById("kt_charts_revenue");
                    if (t) {
                        var a = parseInt(KTUtil.css(t, "height")),
                            l = KTUtil.getCssVariableValue("--bs-gray-500"),
                            r = KTUtil.getCssVariableValue("--bs-border-dashed-color"),
                            o = KTUtil.getCssVariableValue("--bs-warning"),
                            i = {
                                series: [{
                                    name: "Doanh thu",
                                    data: chartData,
                                }, ],
                                chart: {
                                    fontFamily: "inherit",
                                    type: "bar",
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
        load_chart();

        $('.filter-date').on('apply.daterangepicker', function(ev, picker) {
            day_from = picker.startDate.format('YYYY-MM-DD');
            day_to = picker.endDate.format('YYYY-MM-DD');
            _date = day_from + ' to ' + day_to;
            showSpinner(".loading")
            load_chart(_date);
            loadTotal(_date);
        });

        function load_chart(date) {
            $('.btn-reload').attr('data-kt-indicator', 'on');
            const __date = date ? date : _date;
            const url = "{{ route('report.report_chart_product') }}?date=" + __date + "&withcontent=1";
            $.get(url, function(rs) {
                $('.btn-reload').removeAttr('data-kt-indicator');
                if (rs.status == 200) {
                    $(".sniper-content").remove();
                    chartData = rs?.chart?.data || [];
                    chartCategory = rs?.chart?.category || [];
                    $('#kt_charts_revenue').empty();
                    // $('#rate_by_status').empty();
                    KTChartLogAccess.init();
                    if (chartData.length > 0) {
                        // KTChartsWidget22.init(chartDataPercent, chartCategoryPercent);
                    }
                    
                    $('.revenue_by_product').html(rs?.data || '');
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
