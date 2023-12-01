<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('admin.license.insert') }}" id="form-create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Tạo license</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 py-1">
                    <div class="mb-1 form-group">
                        <label class="col-form-label">Cửa hàng *</label>
                        <select name="store_id" class="form-select select-picker">
                            <option value="" selected>-- Chọn --</option>
                            @foreach ($data['stores'] as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-1 form-group">
                        <label class="col-form-label">Gói dịch vụ *</label>
                        <select name="package_id" class="form-select select-package_id select-picker">
                            <option value="" selected>-- Chọn --</option>
                            @foreach ($data['packages'] as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-1 form-group">
                        <label class="col-form-label">Thời gian sử dụng *</label>
                        <select name="total_month" class="form-select select-total_month select-picker">
                            <option value="" selected>-- Chọn --</option>
                            <option value="1">1 tháng</option>
                            <option value="6">6 tháng</option>
                            <option value="12">12 tháng</option>
                        </select>
                    </div>
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
