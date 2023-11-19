<?php

$cart = Cart::Content();
$total_topping = 0;
if ($cart) {
    foreach ($cart as $item) {
        if ($item->options->topping) {
            foreach ($item->options->topping as $topping) {
                $total_topping += json_decode($topping, true)['price'] * $item->qty;
            }
        }
    }
}
?>

<div class="d-flex align-items-center mb-2">
    <div>Tổng tiền</div>
    <div class="flex-1 text-end h6 mb-0 subtotal" data-value="{{ Cart::total() + $total_topping }}">
        {{ number_format(Cart::total() + $total_topping) }} đ
    </div>
</div>
<div class="d-flex align-items-center">
    <div>Thuế</div>
    <div class="flex-1 text-end h6 mb-0">{{ number_format(Cart::tax()) }} %</div>
</div>
<div class="d-flex align-items-center">
    <div>Giảm giá</div>
    <div class="flex-1 d-flex justify-content-end text-end h6 mb-0">
        <a class="d-flex justify-content-center align-items-center btn-promotion ms-2" style="text-decoration:none"
            href="{{ route('sale.promotion') }}" data-bs-toggle="modal">
            <i class="fas fa-tags fa-lg"></i>
        </a>
        <div class="flex-1 text-end h6 mb-0 ">
            <span class="discount-value" data-value="0">{{ $promotion[0]?->value ?? '0%' }}</span>
            <span class="discount-type" data-value=""></span>
            <input type="hidden" name="" id="" class="promotion-id" value="">
            <input type="hidden" name="" id="" class="discount-total" value="">
        </div>
    </div>
</div>

<hr class="opacity-1 my-10px">

<div class="d-flex align-items-center mb-2">
    <div class="text-uppercase">Thanh toán</div>
    <div class="flex-1 text-end h4 mb-0 payment-total">
        {{ number_format(Cart::subTotal() + $total_topping) }} đ

    </div>
    <input type="hidden" class="total-payment" name="total-payment" id=""
        value="{{ Cart::subTotal() + $total_topping }}">

</div>
<div class="mt-3">
    <div class="d-flex">
        <button onclick="saveOrderTmp()"
            class="btn btn-default w-70px me-10px d-flex align-items-center justify-content-cente btn-save-tmp">
            <span>
                <i class="fas fa-cloud-download-alt fa-lg my-10px d-block"></i>
                <span class="small fw-semibold">Lưu</span>
            </span>
        </button>
        <button class="btn btn-danger w-70px me-10px d-flex align-items-center justify-content-center"
            onclick="DestroyCart()">
            <span>
                <i class="fas fa-trash fa-fw fa-lg my-10px d-block"></i>
                <span class="small fw-semibold">Hủy</span>
            </span>
        </button>
        <button onclick="acceptPayment()"
            class="btn btn-theme flex-fill d-flex align-items-center justify-content-center">
            <span>
                <i class="fa fa-cash-register fa-lg my-10px d-block"></i>
                <span class="small fw-semibold">Thanh toán</span>
            </span>
        </button>
    </div>
</div>
