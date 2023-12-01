@if ($customer->count() > 0)
    @if ($type == 'show')
        @foreach ($customer as $item)
            <div class="card mb-2">
                <div class="card-body px-3 customer-choose" data-value="{{ $item->phone }}" style="cursor: pointer">
                    <div class="d-flex align-items-center">
                        <span class="fw-semibold">Mã KH : </span>
                        <span>{{ $item->code }}</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="fw-semibold">Tên KH : </span>
                        <span>{{ $item->name }}</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="fw-semibold">Số điện thoại : </span>
                        <span>{{ $item->phone }}</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="fw-semibold">Điểm hiện tại : </span>
                        <span>{{ $item->point_current }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        @foreach ($customer as $item)
            <div class="card bg-success-400 position-relative mb-2">
                <div class="card-body">
                    <button class="btn position-absolute top-0 end-0 btn-sm btn-danger btn-cancle-customer"><i
                            class="fa-solid fa-xmark"></i></button>
                    <div class="d-flex align-items-center">
                        <input type="hidden" class="customer-id" value="{{ $item->id }}">
                        <input type="hidden" class="customer-name" value="{{ $item->name }}">
                        <span class="fw-semibold">Mã KH : </span>
                        <span>{{ $item->code }}</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="fw-semibold">Tên KH : </span>
                        <span>{{ $item->name }}</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="fw-semibold">Số điện thoại : </span>
                        <span>{{ $item->phone }}</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="fw-semibold">Điểm hiện tại : </span>
                        <span>{{ $item->point_current }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@else
    <span class="small fw-semibold text-center px-3">Không tìm thấy thông tin !!</span>
@endif
