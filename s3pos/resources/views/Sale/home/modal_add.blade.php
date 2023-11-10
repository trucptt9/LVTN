<form action="{{ route('sale.add') }}" type="POST" id="form-add">

    <a href="#" data-bs-dismiss="modal" class="btn-close position-absolute top-0 end-0 m-4"></a>
    <div class="modal-pos-product">
        <div class="modal-pos-product-img">
            @if ($product->image == null)
                <div class="img" style="background-image: url({{ asset('images/meo.jpg') }})">
                </div>
            @else
                <div class="img" style="background-image: url({{ asset('storage/' . $product->image) }})">
                </div>
            @endif
        </div>
        <div class="modal-pos-product-info">
            <div class="fs-4 fw-semibold">{{ $product->name }}</div>
            <div class="text-body text-opacity-50 mb-2">
                {{ $product->description }}
            </div>
            <div class="fs-3 fw-bold mb-3">{{ number_format($product->price, 0, ',', '.') . 'đ' }}</div>
            <div class="d-flex mb-3">

                <button class="btn btn-secondary btn-minus"><i class="fa fa-minus"></i></button>
                <input type="text" class="form-control w-50px fw-bold mx-2 text-center quantity" name="quantity"
                    value="0">
                <button class="btn btn-secondary btn-add"><i class="fa fa-plus"></i></button>


            </div>
            <hr class="opacity-1">

            <div class="mb-2">
                <div class="fw-bold">Topping:</div>
                <div class="option-list">
                    @if ($toppings->count() > 0)
                        @foreach ($toppings as $top)
                            <div class="option">
                                <input type="checkbox" name="addon[sos]" value="true" class="option-input"
                                    id="{{ 'addon' . $top->id }}">
                                <label class="option-label" for="{{ 'addon' . $top->id }}">
                                    <span class="option-text">{{ $top->name }}</span>
                                    <span
                                        class="option-price">{{ number_format($top->price, 0, ',', '.') . 'đ' }}</span>
                                </label>
                            </div>
                        @endforeach
                    @else
                        <div class="text-body text-opacity-50 mb-2">
                            Không có topping nào được hiển thị
                        </div>
                    @endif

                </div>
            </div>
            <hr class="opacity-1">
            <div class="row">
                <div class="col-4">
                    <a href="#" class="btn btn-default fw-semibold mb-0 d-block py-3"
                        data-bs-dismiss="modal">Hủy</a>
                </div>
                <div class="col-8">
                    <button type="submit"
                        class="btn btn-theme fw-semibold d-flex justify-content-center align-items-center py-3 m-0">Thêm
                        vào
                        giỏ hàng <i class="fa fa-plus ms-2 my-n3"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>
