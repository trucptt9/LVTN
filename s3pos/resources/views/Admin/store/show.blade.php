<input type="hidden" name="id" value="{{ $store->id }}">
<div class="form-group mb-1">
    <label class="col-form-label">Tên *</label>
    <input type="text" class="form-control" value="{{ $store->name }}" name="name">
</div>
<div class="form-group mb-1 ">
    <label class="col-form-label">Loại *</label>
    <select name="type_id" class="form-select select-picker">
        <option value="" selected>-- Chọn --</option>
        @foreach ($data['business_types'] as $item)
            <option {{ $store->business_type_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}"
                {{ $store->type_id == $item->id ? 'selected' : '' }}>
                {{ $item->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group mb-1 ">
    <label class="col-form-label">Điện thoại</label>
    <input type="text" class="form-control" value="{{ $store->phone }}" name="phone">
</div>
<div class="form-group mb-1 ">
    <label class="col-form-label">Địa chỉ</label>
    <textarea name="address" rows="2" class="form-control">{{ $store->address }}</textarea>
</div>
