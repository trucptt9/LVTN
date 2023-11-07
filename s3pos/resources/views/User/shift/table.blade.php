@if ($list->count() > 0)
    @php
        $paginate = $list->appends(request()->all())->links();
    @endphp

    @foreach ($list as $item)
        <tr>

            <td>
                {{ $item->code }}
            </td>
            <td>
                {{ $item->name }}
            </td>
            <td class="text-center">
                {{ $item->start }}
            </td>
            <td class="text-center">
                {{ $item->end }}
            </td>
            <td class="text-center">
                {{  number_format($item->salary,0,',',',') }} đ
            </td>
            <td class="">
                {{ $item->description }}
            </td>
            <td class="text-center">
                <div class="form-check form-check-sm form-check-custom form-check-solid justify-content-center">
                    <input name="status" class="form-check-input " type="checkbox" id={{ $item->id }}
                        {{ $item->status == 'active' ? 'checked' : '' }} onclick="changeStatus('{{ $item->id }}')" />
                </div>
            </td>
            <td class="text-center d-flex">
                <a class="btn btn-light btn-edit" style="padding: 0px" href="{{ route('shift.detail',$item->id) }}">
                    <i class="ki-duotone ki-message-edit fs-2qx text-success">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </a>

                <button class="btn btn-light btn-delete" style="padding: 0px"
                    onclick="confirmDelete('{{ $item->id }}')">
                    <i class="ki-duotone ki-trash fs-2qx text-danger">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                        <span class="path5"></span>
                    </i>
                </button>

            </td>
        </tr>
    @endforeach
    @if ($paginate != '')
        <tr>
            <td colspan="8">
                <div class="mt-2">
                    {{ $paginate }}
                </div>
            </td>
        </tr>
    @endif
@else
    <tr>
        <td colspan="8" class="text-center no-data">
            Không tìm thấy dữ liệu!
        </td>
    </tr>
@endif
