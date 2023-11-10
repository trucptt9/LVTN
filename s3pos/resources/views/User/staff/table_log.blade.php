@if ($list->count() > 0)
    @php
        $paginate = $list->appends(request()->all())->links();
    @endphp

    @foreach ($list as $item)
        <tr>
            <td class="">
                {{date('d/m/Y H:i:s', strtotime($item->created_at)) }}
            </td>
          
          <td class="">
            {{ $item->description }}
          </td>
        
        </tr>
    @endforeach
    @if ($paginate != '')
        <tr>
            <td colspan="2">
                <div class="mt-2">
                    {{ $paginate }}
                </div>
            </td>
        </tr>
    @endif
@else
    <tr>
        <td colspan="2" class="text-center no-data">
            Không tìm thấy dữ liệu!
        </td>
    </tr>
@endif
