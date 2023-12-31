@php
    use App\Models\Order;
@endphp
@if ($list->count() > 0)
    @php
        $paginate = $list->appends(request()->all())->links();
    @endphp
    @foreach ($list as $item)
        @php
            $status = Order::get_status($item->status);
        @endphp
        <tr>
            <td class="text-center">
                {{ $item->code }}
            </td>
            <td>
                {{ $item->staff->name }}
            </td>
            <td class="text-center">
                {{ number_format($item->discount_total) }} đ
            </td>
            <td class="text-center">
                {{ number_format($item->total) }} đ
            </td>
            <td class="text-center">
                {{ date('d/m/Y', strtotime($item->order_start)) }}
            </td>
            <td class="text-center">
                <span class="badge bg-{{ $status[1] }}">
                    {{ $status[0] }}
                </span>
            </td>
            <td class="text-center">
                @can('order-view')
                    <a class="btn btn-light btn-edit" style="padding: 0px" href="{{ route('order.detail', $item->id) }}">
                        <i class="ki-duotone ki-eye text-success fs-2qx">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>
                    </a>
                @endcan
                @if ($item->status == 'tmp')
                    @can('order-delete')
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
                    @endcan
                @endif
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
