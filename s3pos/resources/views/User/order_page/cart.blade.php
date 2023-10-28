<div class="flex-row-auto w-xl-450px">
    <!--begin::Pos order-->
    <div class="card card-flush bg-body" id="kt_pos_form">
        <!--begin::Header-->
        <div class="card-header pt-5">
            <h3 class="card-title fw-bold text-gray-800 fs-3">Giỏ hàng</h3>
            <!--begin::Toolbar-->
            <div class="card-toolbar">
                <a href="#" class="btn btn-sm btn-light-primary fs-6 fw-bold py-4">Xóa tất cả</a>
            </div>


            <!--end::Toolbar-->
        </div>
        <!--end::Header-->
        <div style="padding-left: 20px">
            <button class="btn btn-light-primary btn-sm mb-10 choose-table">
                <i class="ki-duotone ki-plus fs-2"></i>Bàn</button>

            <button class="btn btn-light-primary btn-sm mb-10 add_customer">
                <i class="ki-duotone ki-plus fs-2"></i>Khách hàng</button>
        </div>
        <!--begin::Body-->
        <div class="m-0">

            <!--begin::Radio group-->
            <div class="d-flex flex-equal gap-5 gap-xxl-9 px-5 mb-12" data-kt-buttons="true"
                data-kt-buttons-target="[data-kt-button]">
                <!--begin::Radio-->
                <label
                    class="btn bg-light btn-color-gray-600 btn-active-text-gray-800 border border-2 border-gray-100 border-active-primary btn-active-light-primary px-4 active"
                    data-kt-button="true">
                    <!--begin::Input-->
                    <input class="btn-check" type="radio" name="method" value="0" />
                    <!--end::Input-->

                    <!--begin::Title-->
                    <span class="fs-7 fw-bold d-block">Tại bàn</span>
                    <!--end::Title-->
                </label>
                <!--end::Radio-->
                <!--begin::Radio-->
                <label
                    class="btn bg-light btn-color-gray-600 btn-active-text-gray-800 border border-2 border-gray-100 border-active-primary btn-active-light-primary px-4 "
                    data-kt-button="true">
                    <!--begin::Input-->
                    <input class="btn-check" type="radio" name="method" value="1" />
                    <!--end::Input-->

                    <!--begin::Title-->
                    <span class="fs-7 fw-bold d-block">Mang đi</span>
                    <!--end::Title-->
                </label>
                <!--end::Radio-->
                <!--begin::Radio-->
                <label
                    class="btn bg-light btn-color-gray-600 btn-active-text-gray-800 border border-2  border-gray-100 border-active-primary btn-active-light-primary px-4"
                    data-kt-button="true">
                    <!--begin::Input-->
                    <input class="btn-check" type="radio" name="method" value="2" />
                    <!--end::Input-->

                    <!--begin::Title-->
                    <span class="fs-7 fw-bold d-block">Giao hàng</span>
                    <!--end::Title-->
                </label>
                <!--end::Radio-->
            </div>
            <!--end::Radio group-->

        </div>

        <div class="card-body pt-0">
            <!--begin::Table container-->
            <div class="mb-8" style="height:450px; overflow:scroll">
                <!--begin::Table-->
                <div class="row" style="width:400px ;padding: 5px 0px">
                    <div class="col-4">
                        <img src="https://i.pinimg.com/236x/7e/b0/1a/7eb01a52808f9ff10fd899e44c37900e.jpg"
                            alt="" height="100px" style="border-radius:10px">
                    </div>
                    <div class="col-8">
                        <div style="height: 50px">
                            <div class="" style="display:flex; align-items:center; justify-content:space-between">
                                <p class="text-gray-800 text-hover-primary fs-5 fw-bold" style="margin-bottom:0px">Trà
                                    sữa
                                    <span class="badge badge-light"> ( trân châu đen )</span>
                                </p>
                                <p class="badge badge-light" style="margin-bottom:0px">
                                    <a href="#">
                                        <i class="ki-duotone ki-message-edit fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </a>


                                </p>
                            </div>
                            <span class="badge badge-light" hidden>note</span>
                        </div>


                        <div class="">
                            <span class="text-success fw-bold fs-5">24.000 đ</span>
                        </div>
                        <div class="" style="display: flex; justify-content:space-between; align-items:center">
                            <div class="" style="display: flex; align-item:center">
                                <a href="#">
                                    <i class="ki-duotone ki-plus-circle fs-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                                <span style="padding-left: 5px; padding-right:5px"> 1 </span>
                                <a href="#">
                                    <i class="ki-duotone ki-minus-circle fs-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                            </div>
                            <div class="icon" style="padding-right:6px">
                                <i class="ki-duotone ki-trash-square fs-1 text-danger">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </div>
                        </div>




                    </div>
                </div>
                <hr>

            </div>
            <!--end::Table container-->
            <!--begin::Summary-->
            <div class="d-flex flex-stack bg-success rounded-3 p-6 mb-11">
                <!--begin::Content-->
                <div class="fs-6 fw-bold text-white">
                    <span class="d-block lh-1 mb-2">Tổng tiền</span>
                    <span class="d-block mb-2">Khuyến mãi</span>
                    <span class="d-block mb-2">Giảm giá</span>
                    <span class="d-block mb-5">Phụ thu</span>
                    <span class="d-block fs-2">Thành tiền</span>
                </div>
                <!--end::Content-->
                <!--begin::Content-->
                <div class="fs-6 fw-bold text-white text-end">
                    <span class="d-block lh-1 mb-2" data-kt-pos-element="total">$100.50</span>
                    <span class="d-block mb-2" data-kt-pos-element="discount">-$8.00</span>
                    <span class="d-block mb-2" data-kt-pos-element="tax">$11.20</span>
                    <span class="d-block mb-5" data-kt-pos-element="tax">$11.20</span>
                    <span class="d-block fs-2" data-kt-pos-element="grant-total">$93.46</span>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Summary-->
            <!--begin::Payment Method-->
            <div class="m-0">
                <!--begin::Title-->
                <h5 class="fw-bold text-gray-800 mb-5">Phương thức thanh toán</h5>
                <!--end::Title-->
                <!--begin::Radio group-->
                <div class="d-flex flex-equal gap-5 gap-xxl-9 px-0 mb-12" data-kt-buttons="true"
                    data-kt-buttons-target="[data-kt-button]">
                    <!--begin::Radio-->
                    <label
                        class="btn bg-light btn-color-gray-600 btn-active-text-gray-800 border border-3 border-gray-100 border-active-primary btn-active-light-primary w-100 px-4"
                        data-kt-button="true">
                        <!--begin::Input-->
                        <input class="btn-check" type="radio" name="method" value="0" />
                        <!--end::Input-->
                        <!--begin::Icon-->
                        <i class="ki-duotone ki-dollar fs-2hx mb-2 pe-0">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>
                        <!--end::Icon-->
                        <!--begin::Title-->
                        <span class="fs-7 fw-bold d-block">Tiền mặt</span>
                        <!--end::Title-->
                    </label>
                    <!--end::Radio-->
                    <!--begin::Radio-->
                    <label
                        class="btn bg-light btn-color-gray-600 btn-active-text-gray-800 border border-3 border-gray-100 border-active-primary btn-active-light-primary w-100 px-4 active"
                        data-kt-button="true">
                        <!--begin::Input-->
                        <input class="btn-check" type="radio" name="method" value="1" />
                        <!--end::Input-->
                        <!--begin::Icon-->
                        <i class="ki-duotone ki-credit-cart fs-2hx mb-2 pe-0">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <!--end::Icon-->
                        <!--begin::Title-->
                        <span class="fs-7 fw-bold d-block">Chuyển khoản</span>
                        <!--end::Title-->
                    </label>
                    <!--end::Radio-->
                    <!--begin::Radio-->
                    <label
                        class="btn bg-light btn-color-gray-600 btn-active-text-gray-800 border border-3 border-gray-100 border-active-primary btn-active-light-primary w-100 px-4"
                        data-kt-button="true">
                        <!--begin::Input-->
                        <input class="btn-check" type="radio" name="method" value="2" />
                        <!--end::Input-->
                        <!--begin::Icon-->
                        <i class="ki-duotone ki-paypal fs-2hx mb-2 pe-0">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <!--end::Icon-->
                        <!--begin::Title-->
                        <span class="fs-7 fw-bold d-block">Ví điện tử</span>
                        <!--end::Title-->
                    </label>
                    <!--end::Radio-->
                </div>
                <!--end::Radio group-->
                <!--begin::Actions-->
                <button class="btn btn-primary fs-1 w-100 py-4">Print Bills</button>
                <!--end::Actions-->
            </div>
            <!--end::Payment Method-->
        </div>
        <!--end: Card Body-->
    </div>
    <!--end::Pos order-->
</div>
