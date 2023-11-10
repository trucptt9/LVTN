<input type="hidden" name="id" value="{{ $product->id }}">
<input type="hidden" name="type" value="all">
<div class="row">
    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
            <span class="required">Tên sản phẩm</span>
        </label>
        <!--end::Label-->
        <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="name"
            value="{{ $product->name }}" />
    </div>
    <div class=" col-md-6 d-flex flex-column mb-7 fv-row">
        <!--begin::Label-->
        <label class="fs-6 fw-semibold form-label mb-2">Trạng thái</label>
        <select class="form-select" data-hide-search="true" data-control="select2" aria-label="Select example"
            name="status">
            @foreach ($data['status'] as $key => $item)
                <option value="{{ $key }}" {{ $product->status == $key ? 'selected' : '' }}>
                    {{ $item[0] }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
            <span class="required">Giá bán</span>
        </label>
        <!--end::Label-->
        <input type="text" class="form-control" placeholder="Giá bán sản phẩm" name="price"
            value="{{ $product->price }}" />
    </div>
    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
            <span class="required">Giá vốn</span>
        </label>
        <!--end::Label-->
        <input type="text" class="form-control" placeholder="Giá vốn sản phẩm" name="cost"
            value="{{ $product->cost }}" />
    </div>
</div>
<div class="row">
    <div class=" col-md-6 d-flex flex-column mb-7 fv-row">
        <!--begin::Label-->
        <label class="fs-6 required fw-semibold form-label mb-2">Danh mục sản phẩm</label>
        <!--end::Label-->
        <select class="form-select" data-control="select2" aria-label="Select example" name="category_id">
            @foreach ($data['category'] as $item)
                <option value="{{ $item->id }}" {{ $product->category_id == $item->id ? 'selected' : '' }}>
                    {{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6 d-flex flex-column mb-7 fv-row">
        <!--begin::Label-->
        <label class=" fw-semibold fs-6 mb-2">Hình ảnh</label>
        <input type="file" name="image" accept=".png, .jpg, .jpeg" class="form-control" />
    </div>
</div>
