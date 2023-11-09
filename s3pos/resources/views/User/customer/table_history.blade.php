@if ($list->count() > 0)
    @php
        $paginate = $list->appends(request()->all())->links();
    @endphp
    @foreach ($list as $item)
        <tr>

            <td class="d-flex align-items-center">
                {{ $item->type == 'add' ? 'Tích điểm' : 'Đổi điểm' }}
            </td>
            <td class="text-center">
                {{ $item->point }}
            </td>
            <td class="text-center">
                {{ date('d/m/Y - H:i', strtotime($item->created_at)) }}

            </td>
            <td>
                {{ $item->note }}
            </td>

        </tr>
    @endforeach
    @if ($paginate != '')
        <tr>
            <td colspan="4">
                <div class="mt-2">
                    {{ $paginate }}
                </div>
            </td>
        </tr>
    @endif
@else
    <tr>
        <td colspan="4" class="text-center no-data">
            Không tìm thấy dữ liệu!
        </td>
    </tr>
@endif
