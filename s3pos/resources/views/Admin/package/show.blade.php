<input type="hidden" name="id" value="{{ $package->id }}">
<input type="hidden" name="type" value="all">
<ul class="nav nav-tabs mt-2" id="tabUpdate" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active text-uppercase" id="basic-update-tab" data-bs-toggle="tab"
            data-bs-target="#basic-update-tab-pane" type="button" role="tab" aria-controls="basic-update-tab-pane"
            aria-selected="true">
            <i class="fas fa-info-circle"></i> Thông tin cơ bản
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link text-uppercase" id="option-update-tab" data-bs-toggle="tab"
            data-bs-target="#option-update-tab-pane" type="button" role="tab"
            aria-controls="option-update-tab-pane" aria-selected="false">
            <i class="fas fa-window-restore"></i> Danh sách modules
        </button>
    </li>
</ul>
<div class="tab-content" id="tabUpdateContent">
    <div class="tab-pane fade show active" id="basic-update-tab-pane" role="tabpanel" aria-labelledby="basic-update-tab"
        tabindex="0">
        <div class="mb-1 form-group">
            <label class="col-form-label">Mã</label>
            <input type="text" class="form-control" name="code" value="{{ $package->code }}"
                placeholder="Tự sinh nếu không nhập">
        </div>
        <div class="mb-1 form-group">
            <label class="col-form-label">Tên *</label>
            <input type="text" class="form-control" {{ $package->name }} name="name" value="{{ $package->name }}">
        </div>
        <div class="my-3">
            <div class="form-check form-switch">
                <input class="form-check-input" name="status" value="active" type="checkbox" role="switch"
                    id="switch_status_update" {{ $package->status == 'active' ? 'checked' : '' }}>
                <label class="form-check-label" for="switch_status_update">
                    Kích hoạt
                </label>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="option-update-tab-pane" role="tabpanel" aria-labelledby="option-update-tab"
        tabindex="0">
        <div class="data-content mt-2 px-3">
            <div class="row">
                @foreach ($data['modules'] as $item)
                    <div class="form-check form-switch col-sm-6">
                        <input class="form-check-input" name="modules[]" value="{{ $item->code }}" type="checkbox"
                            role="switch" id="switch_update_module_{{ $item->id }}"
                            {{ in_array($item->code, $modules) ? 'checked' : '' }}>
                        <label class="form-check-label" for="switch_update_module_{{ $item->id }}">
                            {{ $item->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
