@extends('User.layout.main')
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <div class="d-flex justify-content-between py-5">
                <div class="">
                    <h1 class="d-flex text-white fw-bold my-1 fs-3">Báo cáo tổng hợp</h1>
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
                            Thống kê
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
                        <div class="card-body d-flex justify-content-between justify-content-center text-info">
                            <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2 header-order">
                                0
                            </span>
                            Tổng đơn hàng
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card widget 2-->
                </div>
                <div class="col-md-6 mb-5">
                    <!--begin::Card widget 2-->
                    <div class="card">
                        <!--begin::Body-->
                        <div class="card-body d-flex justify-content-between justify-content-center text-danger">
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
                        <form action="" id="form-search">
                            <div class="card-header pt-7">
                                <div class="card-title row d-flex justify-content-between align-items-center">
                                    <div class="col mb-0">
                                        <label class="form-label">Bắt đầu</label>
                                        <input class="form-control form-control-solid datepicker" name="start"
                                            value="{{ now()->format('d-m-Y') }}" />
                                    </div>
                                    <div class="col mb-0">
                                        <label class="form-label">Kết thúc</label>
                                        <input class="form-control form-control-solid datepicker" name="end"
                                            value="{{ now()->format('d-m-Y') }}" />
                                    </div>
                                    <div class="col mb-0">
                                        <label class="form-label">Loại báo cáo</label>
                                        <select class="form-select" data-control="select2">
                                            <option value="hour" selected>Báo cáo theo giờ</option>
                                            <option value="date">Báo cáo theo ngày</option>
                                            <option value="month">Báo cáo theo tháng</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="card-toolbar">
                                    <button class="btn btn-sm btn-primary mt-9 bnt-report"> Báo cáo</button>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                        </form>

                        <div class="card-title align-items-start flex-column px-7 mt-3">
                            <!--begin::Description-->
                            <span class="fs-6 fw-bold text-uppercase type-report">
                                <i class="ki-outline ki-verify"></i> Sơ đồ doanh thu cửa hàng theo thời gian
                            </span>
                            <!--end::Description-->
                        </div>
                        <div class="card-body revenue-content d-flex align-items-end ps-4 pe-0 pb-4">

                            <canvas id="chartTime" class="mh-400px"></canvas>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Chart widget 28-->
                </div>
                <!--end::Col-->
            </div>

            <div class="row gx-5 gx-xl-10">
                <!--begin::Col-->
                <div class="col-xl-6 mb-5 mb-xl-8">
                    <!--begin::Table widget 9-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="pt-1 fw-semibold fs-6 text-uppercase">
                                    <i class="ki-outline ki-verify"></i> Doanh thu theo trạng thái
                                </span>
                            </h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body py-3">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <td class="text-uppercase text-bold">Trạng thái</td>
                                            <td class="text-uppercase text-bold text-center">Số lượng</td>
                                            <td class="text-uppercase text-bold text-center">Doanh thu</td>
                                        </tr>
                                    </thead>
                                    <tbody id="revenue_by_status">
                                        <tr>
                                            <td colspan="3" class="text-center">
                                                Không tìm thấy dữ liệu!
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Table container-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Table Widget 9-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-6 mb-5 mb-xl-4">
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header pt-7">
                            <!--begin::Statistics-->
                            <div class="card-title align-items-start flex-column">
                                <!--begin::Description-->
                                <span class="fs-6 fw-semibold text-uppercase">
                                    <i class="ki-outline ki-verify"></i> Tỷ lệ doanh thu theo trạng thái
                                </span>
                                <!--end::Description-->
                            </div>
                            <!--end::Statistics-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body d-flex align-items-end p-0">
                            <div id="rate_by_status" class="mx-auto mb-4"></div>
                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-loading">
                    <thead>
                        <tr>
                            <td class="text-uppercase text-bold  type-title">Giờ</td>
                            <td class="text-uppercase text-bold text-center">Tổng đơn</td>
                            <td class="text-uppercase text-bold text-center">Giảm giá</td>
                            <td class="text-uppercase text-bold">Doanh thu</td>
                            <td class="text-uppercase text-bold text-center">Chi phí</td>
                            <td class="text-uppercase text-bold text-center">Lợi nhuận</td>
                        </tr>
                    </thead>
                    <tbody id="load-table" class="detail-table-time">
                        <tr>
                            <td colspan="6" class="text-center">
                                Không tìm thấy dữ liệu!
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!--end::Content container-->
    </div>
@endsection
@section('script')
    <script>
        $('.datepicker').flatpickr({
            dateFormat: 'd-m-Y'
        });
        let chartData = [];
        let chartCategory = [];
        let chartDataPercent = [];
        let chartCategoryPercent = [];
        let _date = '';

        $.get("{{ route('report.report_all') }}", function(rs) {
            if (rs.status == 200) {
                $('.header-order').text(rs?.data?.total);
                $('.header-revenue').text(rs?.data?.revenue + ' đ');
            }
        });
        loadRevenue();

        function loadRevenue() {
            showSniper('.revenue-content');
            showSniper('.table-loading');
            $('.title-report').html($('.type :selected').text());
            var data = new FormData($('#form-search')[0]);
            $.ajax({
                url: "{{ route('report.report_chart') }}",
                type: 'POST',
                async: true,
                data: data,
                processData: false,
                contentType: false,
                success: function(data) {
                    $(".sniper-content").remove();
                    $(".sniper-content").remove();
                    if (data[1] == 'hour') {
                        $title = "Doanh thu cửa hàng theo giờ";
                        $title_table = "Giờ"
                    } else if (data[1] == 'date') {
                        $title = "Doanh thu cửa hàng theo ngày";
                        $title_table = "Ngày"
                    } else {
                        $title = "Doanh thu cửa hàng theo tháng";
                        $title_table = "Tháng"
                    }
                    $('.type-report').html($title)
                    $('.type-title').html($title_table)
                    let order = 0;
                    let revenue = 0;
                    let expense = 0;
                    let profit = 0
                    let string = '';
                    if (data[0].length > 0) {
                        data[0].forEach(element => {
                            order += element?.order_count;
                            revenue += parseInt(element?.revenue);
                            expense += parseInt(element?.cost);
                            profit += parseInt(element?.profit);
                            let profit_ele = parseInt(element?.profit);
                            let text_class = profit_ele >= 0 ? 'text-success' : 'text-danger';
                            $('.text-profit').removeClass('text-success');
                            $('.text-profit').removeClass('text-danger');
                            if (element.day) {
                                let subDateStr = (element?.day).split("-");
                                element.day = subDateStr[2] + '-' + subDateStr[1] + '-' + subDateStr[0];
                                console.log(element.day)
                            }
                            string += `<tr>
                            <td class="text-center">
                                        <div class="text-center">${element.hour_range ? element.hour_range :(element.day? element.day : element?.month) }</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="text-center">${element?.order_count}</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="text-center"> ${element?.discount} </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="text-center">${element?.revenue}</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="text-center">${element?.cost}</div>
                                    </td>
                                    <td class="text-center">
                                        <div class="text-center fw-bold text-profit ${text_class}"> ${profit_ele >0 ? '+'+profit_ele: profit_ele}</div>
                                    </td>
                            </tr>`;
                        });
                    } else {
                        string = `<tr>
                            <td colspan="6" class="text-center empty-data">
                                <div class="text-center">
                                    <i class="fas fa-sad-cry fs-s2"></i> Không có dữ liệu
                                </div>
                            </td>
                        </tr>`;
                    }

                    $('.total-profit').removeClass('text-danger')
                    $('.total-profit').removeClass('text-success')
                    if (profit > 0) {
                        $('.total-profit').addClass('text-success')
                    } else if (profit < 0) {
                        $('.total-profit').addClass('text-danger')
                    }
                    revenue = revenue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.') + ' đ'
                    expense = expense.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.') + ' đ'
                    profit = profit.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.') + ' đ'
                    $('.total-order').html(order);
                    $('.total-revenue').html(revenue);
                    $('.total-expense').html(expense);
                    $('.total-profit').html(profit);
                    $('.detail-table-time').html(string);
                    // Kiểm tra nếu biểu đồ đã được tạo, thì hủy nó trước khi vẽ lại
                    if (chartMonth) {
                        chartMonth.destroy();
                    }
                    // Lấy thẻ canvas
                    var ctx = document.getElementById('chartTime').getContext('2d');
                    chartMonth = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: data[0].map(function(row) {
                                if (row.hour_range) {
                                    return row.hour_range + " h";
                                } else if (row.day) {
                                    return row.day;
                                } else {
                                    return 'Tháng ' + row.month
                                }
                            }),
                            datasets: [{
                                label: 'Tổng đơn',
                                data: data[0].map(function(row) {
                                    return row.order_count;
                                }),
                                backgroundColor: colorOrder,
                                borderColor: 'rgba(255, 206, 86, 1)',
                            }]
                        },
                    });
                    chartMonth.options.scales.y = {
                        ...chartMonth.options.scales.y,
                        right: {
                            type: 'linear',
                            position: 'right',
                            beginAtZero: true
                        }
                    };
                    chartMonth.data.datasets.push({
                        label: 'Doanh thu',
                        data: data[0].map(function(row) {
                            return row.revenue;
                        }),
                        type: 'line',
                        backgroundColor: colorRevenue,
                        borderColor: colorRevenue,
                        yAxisID: 'right-y-axis'
                    });
                    chartMonth.update();
                }
            });
        }

        var KTChartsWidget22 = (function() {
            var e = function(data, category) {
                var r = document.getElementById('rate_by_status');
                if (r) {
                    parseInt(KTUtil.css(r, "height"));
                    var o = {
                            series: data,
                            chart: {
                                fontFamily: "inherit",
                                type: "donut",
                                width: 250
                            },
                            plotOptions: {
                                pie: {
                                    donut: {
                                        size: "50%",
                                        labels: {
                                            value: {
                                                fontSize: "10px"
                                            }
                                        },
                                    },
                                },
                            },
                            colors: [
                                KTUtil.getCssVariableValue("--bs-info"),
                                KTUtil.getCssVariableValue("--bs-success"),
                                KTUtil.getCssVariableValue("--bs-primary"),
                                KTUtil.getCssVariableValue("--bs-danger"),
                            ],
                            stroke: {
                                width: 0
                            },
                            labels: category,
                            legend: {
                                show: !1
                            },
                            fill: {
                                type: "false"
                            },
                        },
                        i = new ApexCharts(r, o),
                        s = !1;
                    (i.render(), (s = !0));
                }
            };
            return {
                init: function(data, category) {
                    e(data, category);
                },
            };
        })();

        load_chart();

        $('.filter-date').on('apply.daterangepicker', function(ev, picker) {
            day_from = picker.startDate.format('YYYY-MM-DD');
            day_to = picker.endDate.format('YYYY-MM-DD');
            _date = day_from + ' to ' + day_to;
            load_chart(_date);
        });

        function load_chart(date) {
            $('.btn-reload').attr('data-kt-indicator', 'on');
            const __date = date ? date : _date;
            const url = "{{ route('report.report_chart') }}?date=" + __date + "&withcontent=1";
            $.get(url, function(rs) {
                $('.btn-reload').removeAttr('data-kt-indicator');
                if (rs.status == 200) {
                    chartData = rs?.chart?.data || [];
                    chartCategory = rs?.chart?.category || [];
                    chartDataPercent = rs?.content?.data || [];
                    chartCategoryPercent = rs?.content?.category || [];
                    $('#kt_charts_revenue').empty();
                    $('#rate_by_status').empty();
                    KTChartLogAccess.init();
                    if (chartData.length > 0) {
                        KTChartsWidget22.init(chartDataPercent, chartCategoryPercent);
                    }
                    $('#revenue_by_status').html(rs?.content?.table || '');
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
