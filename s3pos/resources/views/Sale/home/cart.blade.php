<?php
    $cart = Cart::Content();
?>

@if ($cart)
    @foreach ($cart as $item)
        <div class="pos-order">
            <div class="pos-order-product">
                @if ($item->options->image == null)
                    <div class="img" style="background-image: url({{ asset('images/meo.jpg') }})">
                    </div>
                @else
                    <div class="img" style="background-image: url({{ asset('storage/' . $item->options->image) }})">
                    </div>
                @endif
                <div class="flex-1">
                    <div class="h6 mb-1">{{ $item->name }} </div>
                    <div class="small title">{{ number_format($item->price, 0, ',', '.') . ' đ' }}</div>
                    @if ($item->options->topping)
                        @foreach ($item->options->topping as $topping)
                            <div class="small">{{ json_decode($topping, true)['name'] }}
                                <span>
                                    ({{ number_format(json_decode($topping, true)['price'], 0, ',', '.') . ' đ' }}
                                    x{{ $item->qty }})
                                </span>
                            </div>
                        @endforeach
                    @endif
                    <div class="d-flex mt-2">
                        <a href="#" class="btn btn-secondary btn-sm sub-product" data-id="{{ $item->rowId }}"><i
                                class="fa fa-minus"></i></a>
                        <input type="text" disabled
                            class="form-control w-50px form-control-sm mx-2 bg-white bg-opacity-25 bg-white bg-opacity-25 text-center"
                            value="{{ $item->qty }}">
                        <a href="#" class="btn btn-secondary btn-sm add-product" data-id="{{ $item->rowId }}"><i
                                class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <?php
            $total_topping = 0;
            if ($item->options->topping) {
                foreach ($item->options->topping as $topping) {
                    $total_topping += json_decode($topping, true)['price'] * $item->qty;
                }
            }
            ?>
            <div class="pos-order-price d-flex flex-column">
                <div class="flex-1 title">
                    {{ number_format($item->qty * $item->price + $total_topping, 0, ',', '.') . ' đ' }}</div>
                <div class="text-end">
                    <a href="{{ url('/sale/delete/' . $item->rowId) }}" class="btn btn-default btn-sm btn-delete"><i
                            class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>
    @endforeach
@endif
