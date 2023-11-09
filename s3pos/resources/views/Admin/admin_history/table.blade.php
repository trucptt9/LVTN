@if ($list->count() > 0)
    @php
        $paginate = $list->appends(request()->all())->links();
    @endphp
    @foreach ($list as $item)
        <tr id="tr-{{ $item->id }}">
            <td class="text-center">
                <a data-bs-toggle="tooltip" title="Xem chi tiết"
                    href="{{ route('admin.admin_history.detail', ['id' => $item->id]) }}"
                    class="btn bg-gradient bg-gray-200 btn-sm data-item">
                    <i class="fas fa-eye"></i>
                </a>
            </td>
            <td class="text-center">
                @if ($item->admin)
                    <a href="{{ route('admin.admin.detail', ['id' => $item->admin_id]) }}">
                        {{ $item->admin->name }}
                    </a>
                @else
                    -
                @endif
            </td>
            <td class="text-center">
                {{ $item->created_at ? date('H:i:s d/m/Y', strtotime($item->created_at)) : '-' }}
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
