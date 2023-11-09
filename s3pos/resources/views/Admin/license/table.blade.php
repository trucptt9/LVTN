@php
    use App\Models\License;
@endphp
@if ($list->count() > 0)
    @php
        $paginate = $list->appends(request()->all())->links();
    @endphp
    @foreach ($list as $item)
        @php
            $status = License::get_status($item->status);
        @endphp
        <tr id="tr-{{ $item->id }}">
            <td class="text-center">
                <a data-bs-toggle="tooltip" title="Xem chi tiết"
                    href="{{ route('admin.license.detail', ['id' => $item->id]) }}"
                    class="btn bg-gradient bg-gray-200 btn-sm data-item">
                    <i class="fas fa-eye"></i>
                </a>
                <a data-bs-toggle="tooltip" title="Xuất hóa đơn"
                    href="{{ route('admin.license.invoice', ['id' => $item->id]) }}"
                    class="btn bg-gradient-yellow-red btn-sm">
                    <i class="fas fa-receipt"></i>
                </a>
            </td>
            <td class="text-center">
                <span>
                    <span class="key-show" style="">***************</span>
                    <span class="key-hide" style="display: none;">{{ $item->key }}</span>
                    <button class="btn" onclick="toogle_key(this);">
                        <i class="fas fa-eye"></i>
                    </button>
                </span>
            </td>
            <td>
                {{ $item->store ? $item->store->name : '-' }}
            </td>
            <td class="text-center">
                {{ $item->package ? $item->package->name : '-' }}
            </td>
            <td class="text-center">
                {{ $item->total_month }} tháng
            </td>
            <td class="text-center">
                <span class="badge bg-{{ $status[1] }}">
                    {{ $status[0] }}
                </span>
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
