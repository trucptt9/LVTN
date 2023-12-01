@if (count($coupon) > 0)
    @foreach ($coupon as $item)
        <div class="card-body px-3 mt-2 coupon-choose" data-value="{{ $item->id }}" style="cursor: pointer">
            <div class="d-flex align-items-center">
                <span class="fw-semibold ">Mã : </span>
                <span class="coupon-code" data-value="{{ $item->code }}">{{ $item->code }}</span>
            </div>
            <div class="d-flex align-items-center">
                <span class="fw-semibold">Giá trị KM : </span>
                <input type="hidden" class="coupon-value" value="{{ $item->value }}">
                <input type="hidden" class="coupon-type" value="{{ $item->type_value }}">
                <span>{{ $item->type_value == 'vnd' ? number_format($item->value) : $item->value }}
                    {{ $item->type_value == 'percent' ? '%' : 'đ' }}</span>
            </div>
        </div>
        <hr>
    @endforeach

@else
    <span class="small fw-semibold text-center px-3">Không có mã khuyến mãi nào</span>
@endif
