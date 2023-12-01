@if ($list->count() > 0)
    @php
        $paginate = $list->appends(request()->all())->links();
    @endphp
    @foreach ($list as $item)
        <tr>
            <td>
                {{ $item->code }}
            </td>
            <td class="text-center">
                {{ $item->type == 'add' ? '+' : '-' }} {{ $item->point }}
            </td>
            <td class="text-center">
                {{ date('H:i:s d/m/Y', strtotime($item->created_at)) }}
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
