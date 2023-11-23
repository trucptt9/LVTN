@if (count($order_detail) > 0)

    @foreach ($order_detail as $item)
        <tr>
            <td class="">
                {{ $item->product_name }}
                ({{ number_format($item->price) . 'đ x ' . $item->quantity }})
            </td>
            <td>
                @if ($item->topping_total > 0)
                    @foreach (json_decode($item->toppings, true) as $topping)
                        <div class="">{{ json_decode($topping, true)['name'] }}
                            <span>
                                ({{ number_format(json_decode($topping, true)['price'], 0, ',', '.') . ' đ' }}
                                x{{ $item->quantity }})
                            </span>
                        </div>
                    @endforeach
               
                @endif
            </td>
            <td class="text-end">
                {{ number_format($item->price* $item->quantity + $item->topping_total)  }} đ
            </td>
          

        </tr>
    @endforeach
@else
    <tr>
        <td colspan="3" class="text-center no-data">
            Không tìm thấy dữ liệu!
        </td>
    </tr>
@endif
