@php
    use App\Models\Store;
@endphp
@if ($list->count() > 0)
    @php
        $paginate = $list->appends(request()->all())->links();
    @endphp
    @foreach ($list as $item)
        @php
            $status = Store::get_status($item->status);
        @endphp
        <tr id="tr-{{ $item->id }}">
            <td class="text-center">
                <a href="{{ route('admin.store.detail', ['id' => $item->id]) }}" data-bs-toggle="tooltip" title="Cập nhật"
                    class="btn bg-gradient bg-gray-200 data-item btn-sm">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="{{ route('admin.store.detail', ['id' => $item->id]) }}" data-bs-toggle="tooltip"
                    title="Xem chi tiết" class="btn bg-gradient-cyan-blue btn-sm">
                    <i class="fas fa-eye"></i>
                </a>
            </td>
            <td class="text-center">
                {{ $item->code }}
            </td>
            <td class="text-center">
                {{ $item->name }}
            </td>
            <td class="text-center">
                {{ $item->businessType ? $item->businessType->name : '-' }}
            </td>
            <td class="text-center">
                <span>
                    <i class="fa fa-circle fs-8px fa-fw text-{{ $status[1] }} me-1"></i>
                    {{ $status[0] }}
                </span>
            </td>
            <td class="text-center">
                {{ $item->created_at ? date('d/m/Y', strtotime($item->created_at)) : '-' }}
            </td>
        </tr>
    @endforeach
    @if ($paginate != '')
        <tr>
            <td colspan="6">
                <div class="mt-2">
                    {{ $paginate }}
                </div>
            </td>
        </tr>
    @endif
@else
    <tr>
        <td colspan="6" class="text-center no-data">
            Không tìm thấy dữ liệu!
        </td>
    </tr>
@endif
