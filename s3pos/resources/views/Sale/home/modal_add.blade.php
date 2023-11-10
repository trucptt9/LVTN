

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
    <input type="hidden" value="{{ $product->id }}" name="id">
    <input type="hidden" value="{{ $product->image }}" name="image">
    <input type="hidden" value="{{ $product->name }}" name="name">
    <input type="hidden" value="{{ $product->price }}" name="price">
    <div class="text-body text-opacity-50 mb-2">
        {{ $product->description }}
    </div>
    <div class="fs-3 fw-bold mb-3">{{ number_format($product->price, 0, ',', '.') . 'đ' }}</div>
    <div class="d-flex mb-3">

        <button class="btn btn-secondary btn-minus"><i class="fa fa-minus"></i></button>
        <input type="text" class="form-control w-50px fw-bold mx-2 text-center quantity" name="quantity"
            value="1">
        <button class="btn btn-secondary btn-add"><i class="fa fa-plus"></i></button>


    </div>
    <hr class="opacity-1">

    <div class="mb-2">
        <div class="fw-bold">Topping:</div>
        <div class="option-list">
            @if ($toppings->count() > 0)
                @foreach ($toppings as $top)
                    <div class="option" style="max-width:33%; width:33%">
                        <input type="checkbox" name="addon[{{ $top->id }}]" value="{{ $top->name }}"
                            class="option-input toppings-add" id="{{ 'addon' . $top->id }}">
                        <label class="option-label" for="{{ 'addon' . $top->id }}">
                            <span class="option-text">{{ $top->name }}</span>
                            <span class="option-price">{{ number_format($top->price, 0, ',', '.') . 'đ' }}</span>
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

</div>
