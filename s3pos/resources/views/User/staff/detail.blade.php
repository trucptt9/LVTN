@extends('User.layout.main')
@section('style')
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('user/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Vendor Stylesheets-->
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
                            <div class="d-flex flex-center flex-column py-5">

                                <div class="symbol symbol-100px symbol-circle mb-7">
                                    @if ($staff->avatar == null)
                                        <img src="{{ asset('images/avatar.jpg') }} " alt="" height="100"
                                            width="100" />
                                    @else
                                        <img src="{{ asset('storage/' . $staff->avatar) }} " alt="{{ $staff->name }}"
                                            height="100" width="100" />
                                    @endif
                                </div>
                                <p class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3">{{ $staff->name }}</p>
                                <div class="mb-9">
                                    <!--begin::Badge-->
                                    <div class="badge badge-lg badge-light-primary d-inline">{{ $staff->code }}</div>
                                    <!--begin::Badge-->
                                </div>
                                <!--end::Position-->

                            </div>
                           
                            <div id="kt_user_view_details" class="collapse show">
                                <div class="pb-5 fs-6">
                                    
                                    <div class="fw-bold mt-5">Số điện thoại</div>
                                    <div class="text-gray-600"> {{ $staff->phone }}</div>
                                    <div class="fw-bold mt-5">Địa chỉ</div>
                                    <div class="text-gray-600"> {{ $staff->address }}</div>
                                    <div class="fw-bold mt-5">Chức vụ</div>
                                    <div class="text-gray-600">
                                        {{ $staff->position_id != null ? $staff->position->name : 'Không có' }}</div>
                                    <div class="fw-bold mt-5">Phòng ban</div>
                                    <div class="text-gray-600">
                                        {{ $staff->department_id != null ? $staff - department->name : 'Không có' }}</div>
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
                                href="#info_account">Thông tin tài khoản</a>
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
                            <a class="nav-link text-active-primary pb-4 fs-6" data-bs-toggle="tab" href="#log">Log</a>
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
                                        <h2>Thông tin đăng nhập</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0 pb-5">
                                    <form action="{{ route('staff.update') }}" method="POST" class="form-update-account">
                                        <input type="hidden" name="id" value="{{ $staff->id }}" id="" hidden>
                                        <input type="hidden" name="type" value="account">
                                        <div class="d-flex">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2 w-200px">
                                                <span class="">Email</span>
    
                                            </label>
                                            <input type="text" class="form-control form-control-lg form-control-solid w-50"
                                                name="email" placeholder="a@gmail.com" value="{{ $staff->email }}" />
                                            <!--end::Input-->
                                        </div>
                                        <div class="d-flex mt-3">
                                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2 mt-2 w-200px">
                                                <span class="">Mật khẩu</span>
    
                                            </label>
                                            <input type="text" class="form-control form-control-lg form-control-solid w-50"
                                                name="password" placeholder="password" value="{{ $staff->password }}" />
                                            <!--end::Input-->
                                        </div>
    
                                        <button class="btn btn-success mt-3 btn-update" type="submit">Cập nhật</button>
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
                                <!--begin::Card header-->
                                <div class="card-header border-0">

                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Filter-->
                                        <button type="button" class="btn btn-sm btn-flex btn-primary">
                                            Cập nhật</button>
                                        <!--end::Filter-->
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0 pb-5">
                                    <!--begin::Table wrapper-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-bordered gy-5 "
                                           >
                                            <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                                                <tr class="text-start text-muted text-uppercase gs-0">
                                            
                                                    <th>Quyền</th>
                                                    <th class="text-center">Thêm</th>
                                                    <th class="text-center">Sửa</th>
                                                    <th class="text-center">Xóa</th>
                                                    <th class="text-center">Phân quyền</th>
                                            
                                            
                                                </tr>
                                            </thead>
                                            <tbody class="fs-6 fw-semibold text-gray-600 permition_table ">
                                                    <tr>
                                                        <td colspan="5">
                                                            Không tìm thấy dữ liệu
                                                        </td>
                                                    </tr>
                                               
                                            </tbody>
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table wrapper-->
                                </div>
                                <!--end::Card body-->
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
                                                                    class="form-control form-control-solid w-250px ps-13"
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
                                                                    class="form-control form-control-solid w-250px ps-13"
                                                                    placeholder="Tìm kiếm " />
                                                            </div>
                                                            <!--end::Search-->
                                                        </div>
                                                        <!--begin::Card title-->
                                                        <!--begin::Card toolbar-->
                                                        <div class="card-toolbar">
                                                            <!--begin::Toolbar-->
                                                            <div class="d-flex justify-content-end"
                                                                data-kt-user-table-toolbar="base">
                                                                <!--begin::Filter-->
                                                                <button type="button" class="btn btn-light-primary me-3"
                                                                    data-kt-menu-trigger="click"
                                                                    data-kt-menu-placement="bottom-end">
                                                                    <i class="ki-duotone ki-filter fs-2">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>Lọc</button>
                                                                <!--begin::Menu 1-->
                                                                <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px"
                                                                    data-kt-menu="true">

                                                                    <!--begin::Separator-->
                                                                    <div class="separator border-gray-200"></div>
                                                                    <!--end::Separator-->
                                                                    <!--begin::Content-->
                                                                    <div class="px-7 py-5"
                                                                        data-kt-user-table-filter="form">
                                                                        <!--begin::Input group-->
                                                                        <div class="mb-10">
                                                                            <label class="form-label fs-6 fw-semibold">Theo
                                                                                ngày:</label>
                                                                            <input class="form-control"
                                                                                placeholder="Chọn ngày"
                                                                                id="kt_datepicker_1" />
                                                                        </div>
                                                                        <!--end::Input group-->

                                                                        <!--begin::Actions-->
                                                                        <div class="d-flex justify-content-end">
                                                                            <button type="reset"
                                                                                class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6"
                                                                                data-kt-menu-dismiss="true"
                                                                                data-kt-user-table-filter="reset">Hủy</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary fw-semibold px-6"
                                                                                data-kt-menu-dismiss="true"
                                                                                data-kt-user-table-filter="filter">Áp
                                                                                dụng</button>
                                                                        </div>
                                                                        <!--end::Actions-->
                                                                    </div>
                                                                    <!--end::Content-->
                                                                </div>
                                                                <!--end::Menu 1-->
                                                                <!--end::Filter-->


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

                                                                    <th class="min-w-125px">Hành động</th>
                                                                    <th class="min-w-125px">Thời gian</th>
                                                                    <th class="min-w-125px">Nội dung</th>


                                                                </tr>
                                                            </thead>
                                                            <tbody class="text-gray-600 fw-semibold">
                                                                <tr>

                                                                    <td class="d-flex align-items-center">
                                                                        Thêm nhân viên
                                                                    </td>
                                                                    <td>2/10/2023 7:25:45</td>
                                                                    <td>
                                                                        Thêm nhân viên adbc
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
                $.get("{{ route('staff.permission') }}", function(res) {
                    $('.permition_table').html(res)
                })
                $('#kt_table_permison').DataTable();
            })

            $('.btn-update').click(function(e){
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

    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('user/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/user-management/users/view/view.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/user-management/users/view/update-details.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/user-management/users/view/add-schedule.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/user-management/users/view/add-task.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/user-management/users/view/update-email.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/user-management/users/view/update-password.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/user-management/users/view/update-role.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/user-management/users/view/add-auth-app.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/user-management/users/view/add-one-time-password.js') }}"></script>
    <script src="{{ asset('user/assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/utilities/modals/users-search.js') }}"></script>


    <!--end::Custom Javascript-->
@endsection
