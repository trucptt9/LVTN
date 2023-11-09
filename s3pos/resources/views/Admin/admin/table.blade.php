@if ($list->count() > 0)
    @php
        $paginate = $list->appends(request()->all())->links();
    @endphp
    @foreach ($list as $item)
        <tr id="tr-{{ $item->id }}">
            <td class="text-center">
                <a href="{{ route('admin.admin.detail', ['id' => $item->id]) }}"
                    class="btn bg-gradient bg-gray-200 btn-sm data-item">
                    <i class="fas fa-edit"></i>
                </a>
                @if ($item->status == 'blocked')
                    <button class="btn bg-gradient-orange-red btn-sm btn-delete"
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
                {{ $item->email }}
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
            <td colspan="5">
                <div class="mt-2">
                    {{ $paginate }}
                </div>
            </td>
        </tr>
    @endif
@else
    <tr>
        <td colspan="5" class="text-center no-data">
            Không tìm thấy dữ liệu!
        </td>
    </tr>
@endif
