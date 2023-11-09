<input type="hidden" name="id" value="{{ $admin->id }}">
<input type="hidden" name="type" value="all">
<div class="mb-1 form-group">
    <label class="col-form-label">Tên *</label>
    <input type="text" class="form-control" value="{{ $admin->name }}" name="name">
</div>
<div class="mb-1 form-group">
    <label class="col-form-label">Email *</label>
    <input type="email" class="form-control" value="{{ $admin->email }}" name="email" placeholder="admin@gmail.com">
</div>
<div class="mb-1 form-group">
    <label class="col-form-label">Điện thoại</label>
    <input type="text" class="form-control" value="{{ $admin->phone }}" name="phone">
</div>
<div class="mb-1 form-group">
    <label class="col-form-label">Mật khẩu</label>
    <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
</div>
<div class="my-3">
    <div class="form-check form-switch">
        <input class="form-check-input" name="status" value="active" type="checkbox" role="switch"
            id="switch_status_update" {{ $admin->status == 'active' ? 'checked' : '' }}>
        <label class="form-check-label" for="switch_status_update">
            Kích hoạt
        </label>
    </div>
</div>
