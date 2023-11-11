<?php
$cart = Cart::Content();
$total_topping = 0;

if ($cart) {
    foreach ($cart as $item) {
        if ($item->options->topping) {
            foreach ($item->options->topping as $topping) {
                $total_topping += json_decode($topping, true)['price'];
            }
        }
    }
}
?>

<div class="d-flex align-items-center mb-2">
    <div>Tổng tiền</div>
    <div class="flex-1 text-end h6 mb-0">{{ number_format(Cart::subTotal() + $total_topping, 0, ',', '.') . ' đ' }} 
    </div>
</div>
<div class="d-flex align-items-center">
    <div>Thuế</div>
    <div class="flex-1 text-end h6 mb-0">0</div>
</div>
<hr class="opacity-1 my-10px">
<div class="d-flex align-items-center mb-2">
    <div>Thanh toán</div>
    <div class="flex-1 text-end h4 mb-0">{{ number_format(Cart::subTotal() + $total_topping, 0, ',', '.') . ' đ' }} </div>
</div>
<div class="mt-3">
    <div class="d-flex">
        <a href="#" class="btn btn-default w-70px me-10px d-flex align-items-center justify-content-center">
            <span>
                <i class="fa fa-bell fa-lg my-10px d-block"></i>
                <span class="small fw-semibold">Lưu tạm</span>
            </span>
        </a>
        <a href="#" class="btn btn-default w-70px me-10px d-flex align-items-center justify-content-center">
            <span>
                <i class="fa fa-receipt fa-fw fa-lg my-10px d-block"></i>
                <span class="small fw-semibold">In hóa đơn</span>
            </span>
        </a>
        <a href="#" class="btn btn-theme flex-fill d-flex align-items-center justify-content-center">
            <span>
                <i class="fa fa-cash-register fa-lg my-10px d-block"></i>
                <span class="small fw-semibold">Thanh toán</span>
            </span>
        </a>
    </div>
</div>
