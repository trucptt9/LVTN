<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('admin.package.insert') }}" id="form-create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Tạo mới gói dịch vụ</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 py-1">
                    <ul class="nav nav-tabs mt-2" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active text-uppercase" id="basic-tab" data-bs-toggle="tab"
                                data-bs-target="#basic-tab-pane" type="button" role="tab"
                                aria-controls="basic-tab-pane" aria-selected="true">
                                <i class="fas fa-info-circle"></i> Thông tin cơ bản
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-uppercase" id="option-tab" data-bs-toggle="tab"
                                data-bs-target="#option-tab-pane" type="button" role="tab"
                                aria-controls="option-tab-pane" aria-selected="false">
                                <i class="fas fa-window-restore"></i> Danh sách modules
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="basic-tab-pane" role="tabpanel"
                            aria-labelledby="basic-tab" tabindex="0">
                            <div class="mb-1 form-group">
                                <label class="col-form-label">Mã</label>
                                <input type="text" class="form-control" name="code"
                                    placeholder="Tự sinh nếu không nhập">
                            </div>
                            <div class="mb-1 form-group">
                                <label class="col-form-label">Tên *</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="mb-1 form-group">
                                <label class="col-form-label">Đơn giá/ Tháng *</label>
                                <input type="number" class="form-control" value="0" name="amount">
                            </div>
                            <div class="mb-1 form-group">
                                <label class="col-form-label">Số user tối đa *</label>
                                <input type="number" class="form-control" name="max_user" value="1">
                            </div>
                            <div class="my-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="status" value="active" type="checkbox"
                                        role="switch" id="switch_status" checked>
                                    <label class="form-check-label" for="switch_status">
                                        Kích hoạt
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="option-tab-pane" role="tabpanel" aria-labelledby="option-tab"
                            tabindex="0">
                            <div class="data-content mt-2 px-3">
                                <div class="row">
                                    @foreach ($data['modules'] as $item)
                                        <div class="form-check form-switch col-sm-6">
                                            <input class="form-check-input" name="modules[]" value="{{ $item->code }}"
                                                type="checkbox" role="switch" id="switch_module_{{ $item->id }}">
                                            <label class="form-check-label" for="switch_module_{{ $item->id }}">
                                                {{ $item->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
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
