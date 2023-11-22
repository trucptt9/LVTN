@if ($customer->count() > 0)
    @if ($type == 'show')
        @foreach ($customer as $item)
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
            <hr>
        @endforeach
    @else
        @foreach ($customer as $item)
            <div class="card-body px-3 ">
                <div class="row">
                    <div class="col-7">
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
                    <div class="col d-flex align-items-center justify-content-end">
                        <button class="btn btn-sm btn-danger btn-cancle-customer"><i
                                class="fa-solid fa-xmark"></i></button>
                    </div>
                </div>
            </div>
            <hr>
        @endforeach
    @endif
@else
    <span class="small fw-semibold text-center px-3">Không tìm thấy !!</span>
@endif
