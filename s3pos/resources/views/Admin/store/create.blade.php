<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('admin.store.insert') }}" id="form-create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Tạo mới cửa hàng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 py-1">
                    <div class="mb-1 form-group">
                        <label class="col-form-label">Loại hình doanh nghiệp *</label>
                        <select name="business_type_id" class="form-select select-business_type_id select-picker">
                            <option value="" selected>-- Chọn --</option>
                            @foreach ($data['business_types'] as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-1 form-group">
                        <label class="col-form-label">Tên *</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-1 form-group">
                        <label class="col-form-label">Điện thoại</label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                    <div class="mb-1 form-group">
                        <label class="col-form-label">Địa chỉ</label>
                        <textarea name="address" rows="2" class="form-control"></textarea>
                    </div>
                    {{-- <div class="my-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="generate_data" value="1" type="checkbox"
                                role="switch" id="switch_auto_generate_data">
                            <label class="form-check-label" for="switch_auto_generate_data">
                                Tự tạo dữ liệu mẫu
                            </label>
                        </div>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-long-arrow-alt-left"></i> Thoát
                    </button>
                    <button type="submit" class="btn bg-gradient-cyan-blue btn-create text-white">
                        <i class="fas fa-plus"></i> Tạo mới
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
