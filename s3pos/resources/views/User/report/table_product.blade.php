
    @foreach ($product as $item)
        <tr>
            <td class="">
                {{ $item->name }}
            </td>
            <td class="text-center">
                {{ $item->quantity }}
            </td>
            <td class="text-center">
                {{ number_format($item->revenue).' đ' }}
            </td>
            <td class="text-center">
                {{ number_format($item->cost).' đ' }}
            </td>
            <td class="text-center">
                {{ number_format($item->revenue - $item->cost).' đ' }}
            </td>
        </tr>
    @endforeach
