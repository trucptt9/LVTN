@if ($list->count() > 0)
    @php
        $paginate = $list->appends(request()->all())->links();
    @endphp
    @foreach ($list as $item)
        <tr id="tr-{{ $item->id }}">
            <td class="text-center">
                <a href="{{ route('admin.package.detail', ['id' => $item->id]) }}"
                    class="btn bg-gradient bg-gray-200 btn-sm data-item" data-bs-toggle="tooltip" title="Xem chi tiết">
                    <i class="fas fa-eye"></i>
                </a>
                @if ($item->licenses_count == 0)
                    <button class="btn bg-gradient-orange-red btn-sm btn-delete" data-bs-toggle="tooltip" title="Xóa"
                        onclick="confirmDelete('{{ $item->id }}')">
                        <i class="fas fa-trash text-white"></i>
                    </button>
                @endif
            </td>
            <td class="text-center">
                {{ $item->code }}
            </td>
            <td>
                {{ $item->name }}
            </td>
            <td class="text-center">
                {{ $item->licenses_count }}
            </td>
            <td class="text-center">
                {{ count(json_decode($item->modules)) }}
            </td>
            <td class="text-center">
                <div class="form-switch">
                    <input class="form-check-input" {{ $item->status == 'active' ? 'checked' : '' }} type="checkbox"
                        name="status" role="switch" onclick="changeStatus('{{ $item->id }}')">
                </div>
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
