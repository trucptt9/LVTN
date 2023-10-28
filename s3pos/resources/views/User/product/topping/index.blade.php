@extends('user.layout')
@section('style')
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('user/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
@endsection
@section('content')
    <!--begin::Container-->
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Products-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <input type="text" data-kt-ecommerce-product-filter="search"
                                class="form-control form-control-solid w-250px ps-12" placeholder="Tìm kiếm" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                        <div class="w-200 mw-250px">
                            <!--begin::Select2-->
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                data-placeholder="Danh mục topping " data-kt-ecommerce-product-filter="status">
                                <option></option>
                                <option value="all">Trân châu</option>
                                <option value="published">Đường</option>
                                <option value="scheduled"> </option>
                                <option value="inactive"></option>
                            </select>
                            <!--end::Select2--> 
                        </div>
                        <button class="btn btn-light-success import_file">
                            <i class="ki-duotone ki-exit-down fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>Nhập file excel</button>
                        <!--end::Button-->
                        <!--begin::Add product-->
                        <!--begin::Button-->
                        <a href="{{ route('topping.add') }}" class="btn btn-primary">
                            <i class="ki-duotone ki-plus fs-2"></i>Thêm</a>
                        <!--end::Add product-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
              
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5"
                        id="kt_ecommerce_products_table">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                               
                                <th class="min-w-200px">Tên topping</th>
                                <th class="text-center min-w-70px">Mã topping</th>
                                <th class="text-center min-w-100px">Danh mục topping</th>
                                <th class="text-center min-w-100px">Giá bán</th>
                                <th class="text-center min-w-100px">Giá vốn</th>
                                <th class="text-center min-w-70px">Trạng thái
                                </th>
                                <th class="text-center min-w-70px">Công thức</th>
                                <th class="text-center min-w-70px">#</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600 table_topping">
            
                        </tbody>
                        
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Products-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Container-->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            loadData();


            function loadData() {
                $.get("{{ route('topping.table') }}", function(res) {
                    $('.table_topping').html(res);
                })
            }


           
        })
    </script>

    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{ asset('user/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('user/assets/js/custom/apps/ecommerce/catalog/products.js') }}"></script>
    <script src="{{ asset('user/assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('user/assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <!--end::Custom Javascript-->
@endsection
