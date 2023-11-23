@extends('User.layout.main')
@section('style')
@endsection
@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar py-5 " id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-xxl flex-row-fluid ">
            <div class="d-flex justify-content-between py-5">
                <div class="">
                    <h1 class="d-flex text-white fw-bold my-1 fs-3">Chi tiết nhân viên</h1>
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
                            Cửa hàng
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-white opacity-75">
                            <a href="{{ route('staff.index') }}" class="text-white text-hover-primary">
                                Nhân viên
                            </a>
                        </li>
                        <!--end::Item-->
                    </ul>
                </div>
                <a class="btn  btn-primary h-40px" href="{{ route('staff.index') }}">
                    Quay lại
                </a>
            </div>
        </div>
    </div>
    <!--begin::Container-->
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-lg-row">
                <!--begin::Sidebar-->
                <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
                    <!--begin::Card-->
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Card body-->
                        <div class="card-body">
                            <div class="d-flex flex-center flex-column">
                                <div class="symbol symbol-100px symbol-circle mb-3">
                                    @if ($staff->avatar == null)
                                        <img src="{{ asset('images/avatar.jpg') }} " alt="" height="100"
                                            width="100" />
                                    @else
                                        <img src="{{ asset('storage/' . $staff->avatar) }} " alt="{{ $staff->name }}"
                                            height="100" width="100" />
                                    @endif
                                </div>
                                <p class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3 name_staff">{{ $staff->name }}
                                </p>
                                <div class="mb-4">
                                    <!--begin::Badge-->
                                    <div class="badge badge-lg badge-light-primary d-inline code_staff">{{ $staff->code }}
                                    </div>
                                    <!--begin::Badge-->
                                </div>
                                <!--end::Position-->
                            </div>
                            <div id="kt_user_view_details" class="collapse show">
                                <div class="pb-5 fs-6">
                                    <div class="fw-bold mt-5">Số điện thoại</div>
                                    <div class="text-gray-600 phone"> {{ $staff->phone }}</div>
                                    <div class="fw-bold mt-5">Địa chỉ</div>
                                    <div class="text-gray-600 address"> {{ $staff->address }}</div>
                                    <div class="fw-bold mt-5">Chức vụ</div>
                                    <div class="text-gray-600 position">
                                        {{ $staff->position_id != null ? $staff->position->name : 'Không có' }}</div>
                                    <div class="fw-bold mt-5">Phòng ban</div>
                                    <div class="text-gray-600 department">
                                        {{ $staff->department_id != null ? $staff->department->name : 'Không có' }}</div>
                                    <div class="fw-bold mt-5">Last Login</div>
                                    <div class="text-gray-600">{{ $staff->last_login }}</div>
                                    <!--begin::Details item-->
                                </div>
                            </div>
                            <!--end::Details content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>
                <!--end::Sidebar-->
                <!--begin::Content-->
                <div class="flex-lg-row-fluid ms-lg-15">
                    <!--begin:::Tabs-->
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active fs-6" data-bs-toggle="tab"
                                href="#info_account">Thông tin nhân viên</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 fs-6 permision" data-kt-countup-tabs="true"
                                data-bs-toggle="tab" href="#permission">Phân quyền</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 fs-6" data-bs-toggle="tab" href="#shift">Ca làm
                                việc</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 fs-6 staff-log" data-bs-toggle="tab"
                                href="#log">Lịch sử thao tác</a>
                        </li>
                        <!--end:::Tab item-->
                    </ul>
                    <!--end:::Tabs-->
                    <!--begin:::Tab content-->
                    <div class="tab-content" id="myTabContent">
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade show active" id="info_account" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Thông tin chi tiết</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0 pb-5">
                                    <form action="{{ route('staff.update') }}" method="POST" class="form-update-account">
                                        <input type="hidden" name="id" value="{{ $staff->id }}" id=""
                                            hidden>
                                        <input type="hidden" name="type" value="all">
                                        <div class="row">
                                            <div class="col-6">
                                                <!--begin::Nav-->
                                                <div class="stepper-nav ps-lg-1">
                                                    <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                        <h4 class="">Thông tin tài
                                                            khoản</h4>
                                                    </label>
                                                    <div class="fv-row mb-2 account_staff">
                                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2">
                                                            <span class="">Email</span>
                                                        </label>
                                                        <input type="text" class="form-control form-control-lg"
                                                            name="email" placeholder="Email đăng nhập"
                                                            value="{{ $staff->email }}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="fv-row mb-2">
                                                        <label
                                                            class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-3">
                                                            <span class="">Chức vụ</span>
                                                        </label>
                                                        <select class="form-select" data-control="select2"
                                                            aria-label="Select example" name="position_id">
                                                            @foreach ($data['positions'] as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ $item->id == $staff->position_id ? 'selected' : '' }}>
                                                                    {{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="fv-row mb-2">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                                            <span class="">Phòng ban</span>
                                                        </label>
                                                        <select class="form-select" data-control="select2"
                                                            aria-label="Select example" name="department_id">

                                                            @foreach ($data['departments'] as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ $item->id == $staff->department_id ? 'selected' : '' }}>
                                                                    {{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="fv-row mb-2">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                                            <span class="">Trạng thái</span>
                                                        </label>
                                                        <select class="form-select" data-hide-search="true"
                                                            data-control="select2" aria-label="Select example"
                                                            name="status">
                                                            @foreach ($data['status'] as $key => $item)
                                                                <option value="{{ $key }}"
                                                                    {{ $staff->status == $key ? 'selected' : '' }}>
                                                                    {{ $item[0] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <!--begin::Nav-->
                                                <div class="stepper-nav ps-lg-10">
                                                    <div class="fv-row mb-2">
                                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                                                            <h4 class="">Thông tin liên hệ </h4>
                                                        </label>
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                                            <span class="required">Họ tên</span>
                                                        </label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <input type="text" class="form-control form-control-lg"
                                                            name="name" placeholder="Họ tên nhân viên"
                                                            value="{{ $staff->name }}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="fv-row mb-2">
                                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                                            <span class="">Mã</span>
                                                        </label>
                                                        <input type="text" class="form-control form-control-lg"
                                                            name="code" placeholder="Để trống tự sinh"
                                                            value="{{ $staff->code }}" />
                                                    </div>
                                                    <div class="fv-row mb-2">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                                            <span class="required">Số điện
                                                                thoại</span>
                                                        </label>
                                                        <input type="text" class="form-control form-control-lg"
                                                            name="phone" placeholder="0934 956 345"
                                                            value="{{ $staff->phone }}" />
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="fv-row mb-2">
                                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                                            <span class="">Ảnh</span>
                                                        </label>
                                                        <div
                                                            class="symbol symbol-circle symbol-100px overflow-hidden me-3">
                                                            <div class="symbol-label">
                                                                @if ($staff->avatar == null)
                                                                    <img src="{{ asset('images/avatar.jpg') }} "
                                                                        alt="" class="w-100" />
                                                                @else
                                                                    <img src="{{ asset('storage/' . $staff->avatar) }} "
                                                                        alt="{{ $staff->name }}" class="w-100" />
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <input type="file" class="form-control form-control-lg"
                                                            name="avatar" value="" />
                                                    </div>
                                                    <div class="fv-row mb-2">
                                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                                            <span class="">Địa
                                                                chỉ</span>
                                                        </label>
                                                        <textarea name="description" id="" cols="" rows="2" class="form-control">{{ $staff->description }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-success mt-3 btn-create" style="float:inline-end"
                                            type="submit">Cập nhật</button>
                                    </form>
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end:::Tab pane-->
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="permission" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <div class="card-header border-0">
                                    <div class="card-toolbar">
                                        <button type="button" class="btn btn-sm btn-flex btn-primary">
                                            Cập nhật</button>
                                    </div>
                                </div>
                                <div class="card-body pt-0 pb-5">
                                  @include('user.staff.permission')
                                </div>
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end:::Tab pane-->
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="shift" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card card-flush mb-6 mb-xl-9">
                                <div class="page d-flex flex-row flex-column-fluid">
                                    <!--begin::Wrapper-->
                                    <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                                        <!--begin::Container-->
                                        <div id="kt_content_container"
                                            class="d-flex flex-column-fluid align-items-start container-xxl">
                                            <!--begin::Post-->
                                            <div class="content flex-row-fluid" id="kt_content">
                                                <!--begin::Card-->
                                                <div class="card">
                                                    <!--begin::Card header-->
                                                    <div class="card-header border-0 pt-6">
                                                        <!--begin::Card title-->
                                                        <div class="card-title">
                                                            <!--begin::Search-->
                                                            <div class="d-flex align-items-center position-relative my-1">
                                                                <i
                                                                    class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                </i>
                                                                <input type="text" data-kt-user-table-filter="search"
                                                                    class="form-control w-250px ps-13"
                                                                    placeholder="Tìm kiếm " />
                                                            </div>
                                                            <!--end::Search-->
                                                        </div>
                                                        <!--begin::Card title-->
                                                        <!--begin::Card toolbar-->
                                                        <div class="card-toolbar">
                                                            <div class="d-flex justify-content-end py-5">
                                                                <a class="btn btn-add btn-primary h-40px">
                                                                    Thêm ca
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <!--end::Card toolbar-->
                                                    </div>
                                                    <!--end::Card header-->
                                                    <!--begin::Card body-->
                                                    <div class="card-body py-4">
                                                        <!--begin::Table-->
                                                        <table class="table align-middle table-row-dashed fs-6 gy-5"
                                                            id="kt_table_users">
                                                            <thead>
                                                                <tr
                                                                    class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">

                                                                    <th class="min-w-105px">Tên ca</th>
                                                                    <th class="min-w-105px text-center">Thời gian làm việc
                                                                    </th>
                                                                    <th class="min-w-105px">Ngày</th>

                                                                    <th class="min-w-150px text-center">Ghi chú</th>
                                                                    <th class="min-w-50px text-center">Trạng thái</th>
                                                                    <th class="text-end min-w-70px text-center">#</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="text-gray-600 fw-semibold">
                                                                <tr>

                                                                    <td class="d-flex align-items-center">
                                                                        Ca 1
                                                                    </td>
                                                                    <td class="text-center">7:00 - 12:00</td>
                                                                    <td>
                                                                        2/10/2023
                                                                    </td>
                                                                    <td></td>
                                                                    <td class="text-center">


                                                                    </td>
                                                                    <td class="text-center">
                                                                        <i class="ki-duotone ki-trash fs-2qx text-danger">
                                                                            <span class="path1"></span>
                                                                            <span class="path2"></span>
                                                                            <span class="path3"></span>
                                                                            <span class="path4"></span>
                                                                            <span class="path5"></span>
                                                                        </i>
                                                                        <i
                                                                            class="ki-duotone ki-message-edit fs-2qx text-success">
                                                                            <span class="path1"></span>
                                                                            <span class="path2"></span>
                                                                        </i>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--end::Table-->
                                                    </div>
                                                    <!--end::Card body-->
                                                </div>
                                                <!--end::Card-->
                                            </div>
                                            <!--end::Post-->
                                        </div>
                                        <!--end::Container-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end:::Tab pane-->
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="log" role="tabpanel">
                            <!--begin::Card-->
                            <div class="card card-flush mb-6 mb-xl-9">
                                <div class="page d-flex flex-row flex-column-fluid">
                                    <!--begin::Wrapper-->
                                    <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                                        <!--begin::Container-->
                                        <div id="kt_content_container"
                                            class="d-flex flex-column-fluid align-items-start container-xxl">
                                            <!--begin::Post-->
                                            <div class="content flex-row-fluid" id="kt_content">
                                                <!--begin::Card-->
                                                <div class="card">
                                                    <form action="" id="form-filter">
                                                        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                                                            <div class="card-title">
                                                                <!--begin::Search-->
                                                                <div
                                                                    class="d-flex align-items-center position-relative my-1">
                                                                    <i
                                                                        class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                    <input type="text"
                                                                        data-kt-ecommerce-order-filter="search"
                                                                        class="form-control w-250px ps-12"
                                                                        placeholder="Nhập nội dung ..." />
                                                                </div>
                                                                <!--end::Search-->
                                                            </div>
                                                            <div
                                                                class="card-toolbar flex-row-fluid justify-content-end gap-5">
                                                                <div class="w-200px ">
                                                                    <!--begin::Select2-->
                                                                    <select class="form-select" data-control="select2"
                                                                        data-hide-search="true" name="status">
                                                                        <option value="" selected> Chọn trạng thái
                                                                        </option>
                                                                        @foreach ($data['status'] as $key => $item)
                                                                            <option value="{{ $key }}">
                                                                                {{ $item[0] }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <!--end::Select2-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="card-body py-4 table-loading">
                                                        <!--begin::Table-->
                                                        <table class="table align-middle table-row-dashed fs-6 gy-5"
                                                            id="kt_table_users">
                                                            <thead>
                                                                <tr
                                                                    class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                                    <th class="min-w-125px">Thời gian</th>
                                                                    <th class="min-w-125px">Nội dung</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="text-gray-600 fw-semibold" id="load-table">
                                                                <tr>
                                                                    <td class="text-center" colspan="2">
                                                                        Không có dữ liệu !
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <!--end::Table-->
                                                    </div>
                                                    <!--end::Card body-->
                                                </div>
                                                <!--end::Card-->
                                            </div>
                                            <!--end::Post-->
                                        </div>
                                        <!--end::Container-->

                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end:::Tab pane-->
                    </div>
                    <!--end:::Tab content-->
                </div>
                <!--end::Content-->
            </div>
        </div>
        <!--end::Post-->
    </div>
    <!--end::Container-->
@endsection

@section('script')
    <script>
        const routeList = "{{ route('staff.log', $staff->id) }}";
        filterTable();

        function filterTable() {
            loadTable(routeList);
        };
        $(document).ready(function() {
            $("#start_modal_add_schedule_datepicker").flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
            });
            $("#end_modal_add_schedule_datepicker").flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
            });

            $("#kt_datepicker_1").flatpickr();
            $('.permision').click(function(e) {
                e.preventDefault();
                // $.get("{{ route('staff.permission') }}", function(res) {
                //     $('.permition_table').html(res)
                // })
            })
            $('.staff-log').click(function(e) {
                e.preventDefault();
                filterTable();
            })
            $('.btn-create').click(function(e) {
                e.preventDefault();
                $('.btn-create').html(`<span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                <span role="status">Loading...</span>`);
                const form = $('form.form-update-account');
                const data = new FormData(form[0]);
                const action = form.attr('action');
                $.ajax({
                    url: action,
                    data: data,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function(rs) {
                        $('.btn-create').html(`<span class="indicator-label">Cập nhật </span>`);
                        $('button[type=submit]').removeAttr('disabled');
                        if (rs.status == 200) {
                            $('.name_staff').html(rs.staff_update.name);
                            $('.code_staff').html(rs.staff_update.code);
                            $('.phone').html(rs.staff_update.phone);
                            $('.address').html(rs.staff_update.address);
                            // $('.position').html(rs.staff_update->position_id);
                            // $('.department').html(rs.staff_update->department_id);
                        }
                        Toast.fire({
                            icon: rs?.type,
                            title: rs.message
                        });
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {

                        $('button[type=submit]').removeAttr('disabled');
                        Toast.fire({
                            icon: 'error',
                            title: 'Cập nhật lỗi'
                        });
                    }
                });
            })

        })
    </script>
@endsection
