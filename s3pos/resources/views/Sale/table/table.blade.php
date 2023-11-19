@foreach ($tables as $item)
    <div class="col-xl-3 col-lg-4 col-md-6 pb-3" data-type="{{ $item->area_id }}">
        <div class="pos-checkout-table in-use">
            <a href="{{ route('sale.choose_product', $item->id) }}"
                class="pos-checkout-table-container {{ 'pos-table ' . $item->id }}">
                <div class="pos-checkout-table-header">
                    @if ($item->status_order == 'active')
                        <div class="status"><i class="fa fa-circle"></i></div>
                    @else
                        <div class="status" style="color: green!important"><i class="fa fa-circle"></i></div>
                    @endif
                    <div class="fw-semibold">Bàn</div>
                    <div class="fw-bold fs-1">{{ $item->name }}</div>
                    {{-- <div class="fs-13px text-body text-opacity-50">9 order</div> --}}
                </div>
                <div class="pos-checkout-table-info small">
                    <div class="row">
                        <div class="col-6 d-flex justify-content-center">
                            <div class="w-20px"><i class="far fa-user text-body text-opacity-50"></i></div>
                            <div class="w-60px">{{ $item->order->customer_name ?? '' }}</div>
                        </div>
                        <div class="col-6 d-flex justify-content-center">
                            <div class="w-20px"><i class="far fa-clock text-body text-opacity-50"></i></div>
                            <div class="w-120px">
                                {{ $item->order && $item->status_order == 'active' ? date('d/m/Y H:i', strtotime($item->order->created_at)) : '' }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 d-flex justify-content-center">
                            <div class="w-20px"><i class="fa fa-receipt text-body text-opacity-50"></i></div>
                            <div class="w-60px">
                                {{ $item->order && $item->status_order == 'active'? number_format($item->order->total, 0, ',', '.') . ' đ' : '' }}</div>
                        </div>
                        <div class="col-6 d-flex justify-content-center">
                            <div class="w-20px"><i class="fa fa-dollar-sign text-body text-opacity-50"></i></div>
                            <div class="w-120px">{{ $item->status_order == 'active' && $item->status_order == 'active'? 'Chưa thanh toán' : '' }}</div>
                        </div>
                    </div>
                </div>
            </a>
           
        </div>
        
    </div>
@endforeach
