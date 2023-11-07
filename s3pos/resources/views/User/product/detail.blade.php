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
        <div id="kt_toolbar_container" class="container-xxl flex-row-fluid">
            <div class="d-flex justify-content-between py-5">
                <div class="">
                    <h1 class="d-flex text-white fw-bold my-1 fs-3">Chi tiết sản phẩm</h1>
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
                            Sản phẩm
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-white opacity-75 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-white opacity-75">
                            <a href="{{ route('product.index') }}" class="text-white text-hover-primary">
                                Quản lý sản phẩm
                            </a>
                        </li>
                        <!--end::Item-->
                    </ul>
                </div>
                <a class="btn btn-primary h-40px btn-back" href="{{ route('product.index') }}">
                    Quay lại
                </a>
            </div>

        </div>

    </div>

    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Form-->
            <form id="form-update-pro" class="form d-flex flex-column flex-lg-row" action="{{ route('product.update') }}"
                method="POST" enctype="multipart/form-data">
                <!--begin::Aside column-->
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <!--begin::Thumbnail settings-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Hình ảnh</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body text-center pt-0">

                            <!--end::Image input placeholder-->
                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                data-kt-image-input="true">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-150px h-150px">
                                    @if ($product->image != null)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="" height="150"
                                            width="150">
                                    @else
                                        <img src="{{ asset('images/image_none.png') }}" alt="" height="150"
                                            width="150">
                                    @endif

                                </div>
                                <input type="file" name="image" id="" class="form-control mt-4">
                            </div>
                            <!--end::Image input-->

                        </div>
                        <!--end::Card body-->
                    </div>
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="type" value="all">
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Trạng thái</h2>
                            </div>

                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Select2-->
                            <select class="form-select mb-2" data-control="select2" data-hide-search="true" name="status">

                                @foreach ($data['status'] as $key => $item)
                                    <option value="{{ $key }}" {{ $product->status == $key ? 'selected' : '' }}>
                                        {{ $item[0] }}</option>
                                @endforeach



                            </select>
                            <!--end::Select2-->


                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Status-->
                    <!--begin::Category & tags-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Chi tiết món</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <!--begin::Label-->
                            <label class="form-label">Danh mục món</label>
                            <!--end::Label-->
                            <!--begin::Select2-->
                            <select class="form-select mb-2" data-control="select2" name="category_id">

                                @foreach ($data['category'] as $item)
                                    <option
                                        value="{{ $item->id }} {{ $product->category_id == $item->id ? 'selected' : '' }}">
                                        {{ $item->name }}</option>
                                @endforeach


                            </select>


                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Category & tags-->


                </div>
                <!--end::Aside column-->
                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <!--begin:::Tabs-->
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2">
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                href="#kt_ecommerce_add_product_general">Thông tin món</a>
                        </li>
                        <!--end:::Tab item-->
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                href="#kt_ecommerce_add_product_advanced">Công thức</a>
                        </li>
                        <!--end:::Tab item-->
                    </ul>
                    <!--end:::Tabs-->
                    <!--begin::Tab content-->
                    <div class="tab-content">
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <!--begin::General options-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Chung</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="d-flex flex-wrap gap-5">
                                            <!--begin::Input group-->
                                            <div class="fv-row w-100 flex-md-root">
                                                <!--begin::Label-->
                                                <label class="required form-label">Tên món</label>
                                                <!--end::Label-->
                                                <input type="text" class="form-control mb-2"
                                                    value="{{ $product->name }}" name="name" placeholder="Tên món" />

                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row w-100 flex-md-root">
                                                <!--begin::Label-->
                                                <label class="form-label">Mã món</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" class="form-control mb-2"
                                                    value="{{ $product->code }}" name="code"
                                                    placeholder="Để trống mã tự sinh" />
                                                <!--end::Input-->

                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--begin::Input group-->
                                        <div>
                                            <!--begin::Label-->
                                            <label class="form-label">Mô tả</label>
                                            <!--end::Label-->
                                            <!--begin::Editor-->
                                            <textarea name="description" class="form-control" id="" rows="3" placeholder="Nhập nội dung mô tả">{{ $product->description }}</textarea>
                                            <!--end::Editor-->

                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Card header-->
                                </div>
                                <!--end::General options-->

                                <!--begin::Pricing-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Giá</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <!--begin::Input group-->
                                        <div class="mb-10 fv-row row">
                                            <div class="col">
                                                <!--begin::Label-->
                                                <label class="required form-label">Giá vốn</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="price" class="form-control mb-2"
                                                    placeholder="Giá vốn" value="{{ $product->price }}" />
                                                <!--end::Input-->
                                            </div>
                                            <div class="col">
                                                <!--begin::Label-->
                                                <label class="required form-label">Giá bán</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="cost" class="form-control mb-2"
                                                    placeholder="Giá bán" value="{{ $product->cost }}" />
                                                <!--end::Input-->
                                            </div>

                                        </div>
                                        <!--end::Input group-->



                                    </div>
                                    <!--end::Card header-->
                                </div>
                                <!--end::Pricing-->

                            </div>
                        </div>
                        <!--end::Tab pane-->
                        <!--begin::Tab pane-->
                        <div class="tab-pane fade" id="kt_ecommerce_add_product_advanced" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <!--begin::Inventory-->
                                <div class="card card-flush py-4">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Inventory</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">

                                    </div>
                                    <!--end::Card header-->
                                </div>
                                <!--end::Inventory-->


                            </div>
                        </div>


                        <!--end::Tab pane-->
                    </div>
                    <!--begin::Actions-->
                    <div class="text-center pt-10">
                        <button type="reset" class="btn btn-light me-3 btn-cancle"
                            data-kt-users-modal-action="cancel">Hủy</button>
                        <button type="submit" class="btn btn-primary btn-create">
                            <span class="indicator-label">Cập nhật</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->

                </div>

                <!--end::Main column-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Post-->
    </div>
@endsection

@section('script')
    <script>
        const form_update = $('form#form-update-pro');
        if (form_update) {
            const action = form_update.attr('action');
            form_update.submit(function(e) {
                e.preventDefault();
                $('.btn-create').html(`<span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                <span role="status">Loading...</span>`);
                const data = new FormData($(this)[0]);
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
                            form_update[0].reset();
                            // loadTable();
                            if (rs?.uri) {
                                location.href = rs?.uri;
                            }

                            // $('.close-btn').click();

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
                            title: 'Tạo mới lỗi'
                        });
                    }
                });
            });
        }
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
