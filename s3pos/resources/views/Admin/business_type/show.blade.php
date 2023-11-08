<input type="hidden" name="id" value="{{ $business_type->id }}">
<input type="hidden" name="type" value="all">
<div class="mb-1 form-group">
    <label class="col-form-label">Mã</label>
    <input type="text" class="form-control" value="{{ $business_type->code }}" name="code"
        placeholder="Tự sinh nếu không nhập">
</div>
<div class="mb-1 form-group">
    <label class="col-form-label">Tên *</label>
    <input type="text" class="form-control" value="{{ $business_type->name }}" name="name">
</div>
<div class="my-3">
    <div class="form-check form-switch">
        <input class="form-check-input" name="status" value="active" type="checkbox" role="switch"
            id="switch_status_update" {{ $business_type->status == 'active' ? 'checked' : '' }}>
        <label class="form-check-label" for="switch_status_update">
            Kích hoạt
        </label>
    </div>
</div>
