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
                            <div class="small">{{ $topping }}</div>
                        @endforeach
                    @endif
                    <div class="d-flex mt-2">
                        <a href="#" class="btn btn-secondary btn-sm"><i class="fa fa-minus"></i></a>
                        <input type="text"
                            class="form-control w-50px form-control-sm mx-2 bg-white bg-opacity-25 bg-white bg-opacity-25 text-center"
                            value="{{ $item->qty }}">
                        <a href="#" class="btn btn-secondary btn-sm"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="pos-order-price d-flex flex-column">
                <div class="flex-1">{{ number_format($item->qty * $item->price, 0, ',', '.') . ' đ' }}</div>
                <div class="text-end">
                    <a href="{{ url('/sale/delete/'. $item->rowId) }}" class="btn btn-default btn-sm btn-delete"><i
                            class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>
    @endforeach

@endif
