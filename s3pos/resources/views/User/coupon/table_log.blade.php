@if ($list->count() > 0)
    @php
        $paginate = $list->appends(request()->all())->links();
    @endphp

    @foreach ($list as $item)
        <tr>
            <td>
                Mã hóa đơn gắn với việc tích điểm, sd điểm của kh
            </td>
            <td class="d-flex align-items-center">
                {{ item->type == 'add' ? 'Tích điểm' : 'Sử dụng điểm' }}
            </td>
            <td class="text-center">
                {{ $item->point }}
            </td>
            <td class="text-center">
                {{ $item->created_at }}
            </td>
            <td>
                {{ $item->note }}
            </td>

        </tr>
    @endforeach
    @if ($paginate != '')
        <tr>
            <td colspan="7">
                <div class="mt-2">
                    {{ $paginate }}
                </div>
            </td>
        </tr>
    @endif
@else
    <tr>
        <td colspan="7" class="text-center no-data">
            Không tìm thấy dữ liệu!
        </td>
    </tr>
@endif
