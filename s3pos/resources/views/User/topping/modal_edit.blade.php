<input type="hidden" name="id" value="{{ $topping->id }}">
<input type="hidden" name="type" value="all">

<div class="row">
    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
            <span class="required">Tên topping</span>

        </label>
        <!--end::Label-->
        <input type="text" class="form-control form-control-solid" placeholder="Nhập tên topping" name="name"
            value="{{ $topping->name }}" />
    </div>

    <div class=" col-md-6 d-flex flex-column mb-7 fv-row">
        <!--begin::Label-->
        <label class="fs-6 fw-semibold form-label mb-2">Mã
        </label>
        <!--end::Label-->
        <!--begin::Input wrapper-->
        <div class="position-relative">
            <!--begin::Input-->
            <input type="text" class="form-control form-control-solid" placeholder="Đê trống tự sinh" name="code"
                value="{{ $topping->code }}" />
            <!--end::Input-->
            <!--begin::Card logos-->

        </div>
        <!--end::Input wrapper-->
    </div>
</div>
<div class="row">
    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
            <span class="required">Giá bán</span>

        </label>
        <!--end::Label-->
        <input type="text" class="form-control form-control-solid" placeholder="Giá bán topping" name="price"
            value="{{ $topping->price }}" />
    </div>

    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
            <span class="required">Giá vốn</span>

        </label>
        <!--end::Label-->
        <input type="text" class="form-control form-control-solid" placeholder="Giá vốn topping" name="cost"
            value="{{ $topping->cost }}" />
    </div>
</div>

<div class="row">
    <div class=" col-md-6 d-flex flex-column mb-7 fv-row">
        <!--begin::Label-->
        <label class="fs-6 required fw-semibold form-label mb-2">Danh mục</label>
        <!--end::Label-->
        <select class="form-select" aria-label="Select example" name="group_id">

            @foreach ($data['topping_group'] as $item)
                <option value="{{ $item->id }}" {{ $topping->group_id == $item->id ? 'selected' : '' }}>
                    {{ $item->name }}</option>
            @endforeach


        </select>
    </div>

    <div class=" col-md-6 d-flex flex-column mb-7 fv-row">
        <!--begin::Label-->
        <label class="fs-6 fw-semibold form-label mb-2">Trạng thái</label>
        <select class="form-select w-50" aria-label="Select example" name="status">

            @foreach ($data['status'] as $key => $item)
                <option value="{{ $key }}" {{ $topping->status == $key ? 'selected' : '' }}>
                    {{ $item[0] }}</option>
            @endforeach


        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
            <span class="">Hình ảnh</span>

        </label>
        @if ($topping->image != null)
            <img src="{{ asset('storage/' . $topping->image) }}" alt="" width="100" height="100">
        @else
            <img src="{{ asset('images/image_none.png') }}" alt="" width="100" height="100">
        @endif
        <input type="file" name="image" accept=".png, .jpg, .jpeg"  class="form-control mt-4"/>
    </div>


</div>
