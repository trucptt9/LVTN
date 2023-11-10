<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">Cửa hàng</th>
                <th class="text-center">Số đơn</th>
                <th class="text-center">Doanh thu</th>
            </tr>
        </thead>
        <tbody>
            @if (count($list) > 0)
                @foreach ($list as $item)
                    <tr>
                        <td class="text-center">{{ $item->name }}</td>
                        <td class="text-center">{{ number_format($item->order_count) }}</td>
                        <td class="text-center">{{ number_format($item->revenue) }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="3">
                        Không có dữ liệu
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
