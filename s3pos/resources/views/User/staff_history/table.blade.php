<!--begin::Table-->
@if ($list->count() > 0)
    @foreach ($list as $item)
        <tr id="tr-{{ $item->id }}">
            <td class="text-center">
                <a href="{{ route('staff_history.detail', ['id' => $item->id]) }}"
                    class="btn btn-outline btn-outline-dashed btn-outline-dark btn-active-light-dark btn-sm">
                    <i class="ki-outline ki-eye fs-4 ms-1"></i>
                </a>
            </td>
            <td>
                @if (!is_null($item->staff))
                    <a href="{{ route('staff.detail', ['id' => $item->staff_id]) }}" target="_blank"
                        rel="noopener noreferrer">
                        {{ $item->staff->name }}
                    </a>
                @else
                    Hệ thống
                @endif
            </td>
            <td class="text-center">
                {{ $item->created_at ? date('H:i:s d/m/Y', strtotime($item->created_at)) : '' }}
            </td>
            <td>
                {!! $item->description !!}
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="54" class="text-center">
            Không tìm thấy dữ liệu!
        </td>
    </tr>
@endif
<tr>
    <td colspan="4">
        <div class="mt-2">
            {{ $list->appends(request()->all())->links() }}
        </div>
    </td>
</tr>
