@if ($list->count() > 0)
    @php
        $paginate = $list->appends(request()->all())->links();
    @endphp
    @foreach ($list as $item)
        <tr id="tr-{{ $item->id }}">
            <td class="text-center">
                <a data-bs-toggle="tooltip" title="Xem chi tiết"
                    href="{{ route('admin.module.detail', ['id' => $item->id]) }}"
                    class="btn bg-gradient bg-gray-200 btn-sm data-item">
                    <i class="fas fa-edit"></i>
                </a>
            </td>
            <td class="text-center">
                {{ $item->code }}
            </td>
            <td>
                {{ $item->name }}
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
