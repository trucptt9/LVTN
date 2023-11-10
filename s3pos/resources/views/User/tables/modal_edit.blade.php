<input type="hidden" name="id" value="{{ $table->id }}">
<input type="hidden" name="type" value="all">
<div class="row">
    <div class="col-md-6">
        <div class=" mb-7 fv-row">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                <span class="required">Tên bàn</span>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control" placeholder="Nhập tên khu vực" name="name"
                value="{{ $table->name }}" />
        </div>
    </div>
    <div class="col-md-6">
        <div class=" mb-7 fv-row">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                <span class="required">Số ghế</span>
            </label>
            <!--end::Label-->
            <input type="number" class="form-control" placeholder="Sức chứa khu vực" name="seat"
                value="{{ $table->seat }}" />
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class=" mb-7 fv-row">
            <!--begin::Label-->
            <label class="fs-6 fw-semibold form-label mb-2">Khu vực</label>
            <!--end::Label-->
            <select class="form-select" data-control="select2" aria-label="Select example" name="area_id">
                <option selected value="">Chọn khu vực </option>
                @foreach ($data['areas'] as $item)
                    <option value="{{ $item->id }}" {{ $table->area_id == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class=" mb-7 fv-row">
            <!--begin::Label-->
            <label class="fs-6 fw-semibold form-label mb-2">Trạng thái</label>
            <!--end::Label-->
            <select class="form-select" data-hide-search="true" data-control="select2" aria-label="Select example"
                name="status">
                <option selected value="">Trạng thái </option>
                @foreach ($data['status'] as $key => $item)
                    <option value="{{ $key }}" {{ $table->status == $key ? 'selected' : '' }}>
                        {{ $item[0] }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>
