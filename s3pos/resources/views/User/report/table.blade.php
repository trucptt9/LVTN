@php
    use App\Models\Order;
@endphp
@if ($list->count() > 0)
    @foreach ($list as $item)
        @php
            $status = Order::get_status($item->status);
        @endphp
        <tr>
            <td class="text-center">
                @if ($status)
                    <div class="badge badge-{{ $status[1] }} fw-bold">
                        {{ $status[0] }}
                    </div>
                @else
                    -
                @endif
            </td>
            <td class="text-center">
                {{ number_format($item->total) }}
            </td>
            <td class="text-center">
                {{ number_format($item->revenue) }}
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="3" class="text-center">
            Không tìm thấy dữ liệu!
        </td>
    </tr>
@endif
