<div id="kt_user_view_details" class="collapse show">
    <form action="{{ route('customer.update') }}" type="POST" id="form-update-info">
        <div class="pb-5 fs-6">
            <div class="row" style="
            display: flex;
            align-items: center; ">
                <h3 class="col-8">Thông tin khách hàng</h3>
                <div class="col">
                    <button class="btn btn-success btn-update btn-sm " type="submit" style="float:inline-float">Cập
                        nhật</button>
                </div>
            </div>
            <input type="hidden" name="id" value="{{ $customer->id }}" id="">
            <input type="hidden" name="type" value="all" id="">
            <div class="fw-bold mt-5">Tên khách hàng</div>
            <div class="text-gray-600">
                <input type="text" class="form-control form-control-lg form-control-solid" name="name"
                    placeholder="Tên khách hàng" value="{{ $customer->name }}">
            </div>
            <!--begin::Details item-->
            <!--begin::Details item-->
            <div class="fw-bold mt-5">Mã khách hàng</div>
            <input type="text" class="form-control form-control-lg form-control-solid" name="code"
                placeholder="Username" value="{{ $customer->code }}">
            <!--begin::Details item-->
            <!--begin::Details item-->
            <div class="fw-bold mt-5">Nhóm khách hàng</div>
            <select class="form-select" data-control="select2" data-hide-search="true" name="group_id">
                <option value="" selected> Chọn nhóm khách hàng</option>
                @foreach ($data['customer_group'] as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $customer->group_id ? 'selected' : '' }}>
                        {{ $item->name }}</option>
                @endforeach
            </select>
            <div class="fw-bold mt-5">Địa chỉ</div>
            <textarea name="description" id="" rows="3" class="form-control"> {{ $customer->address }}</textarea>
            <!--begin::Details item-->
            <!--begin::Details item-->
            <div class="fw-bold mt-5">Số điện thoại</div>
            <input type="text" class="form-control form-control-lg form-control-solid" name="phone"
                placeholder="Username" value="0766 877 776">
            <!--begin::Details item-->
            <!--begin::Details item-->
            <div class="fw-bold mt-5">Trạng thái</div>
            <div class="{{ 'badge badge-light-' . $status[1] }} status-change">{{ $status[0] }}</div>
            <!--begin::Details item-->
        </div>
    </form>
</div>
