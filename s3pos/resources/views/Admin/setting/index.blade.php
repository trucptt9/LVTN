@php
    use App\Models\AdminSetting;
    $group = $data['group'];
@endphp
@extends('Admin.layout.default')
@section('title', 'Cài đặt')
@push('css')
    <style>
        .image-setting {
            cursor: pointer;
            height: 50px;
            border: 1px dotted;
            margin-bottom: 5px;
        }
    </style>
@endpush
@section('content')
    <div class="d-flex justify-content-between">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            @foreach ($data['groups'] as $item)
                <li class="nav-item" role="presentation">
                    <a class="nav-link text-active-primary text-uppercase {{ $group->id == $item->id ? 'active' : '' }}"
                        href="{{ route('admin.setting.index') . '?type=' . $item->code }}">
                        {!! $item->icon !!}&nbsp; {{ $item->name }}
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-outline btn-outline-dashed btn-outline-primary btn-active-primary btn-update">
                Cập nhật
            </button>
        </div>
    </div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <form action="{{ route('admin.setting.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card mt-2">
                    <div class="card-body data-content">
                        <input type="hidden" name="type" value={{ $group->code }}>
                        @foreach ($group->settings as $setting)
                            @switch($setting->type)
                                @case(AdminSetting::TYPE_FILE)
                                    <div class="row">
                                        <label class="col-lg-3 mb-3">
                                            {{ $setting->name }}
                                            @if ($setting->description)
                                                <i class="fas fa-question-circle mr-2" data-bs-toggle="tooltip"
                                                    title="{{ $setting->description }}"></i>
                                            @endif
                                        </label>
                                        <div class="col-lg-9 mb-3">
                                            <img src="{{ show_s3_file($setting->value) }}" alt="" class="image-setting"
                                                onclick="clickElement('{{ $setting->code }}')">
                                            <input type="file" onchange="previewFile()" class="form-control"
                                                name="{{ $setting->code }}" class="{{ $setting->code }}"
                                                accept=".png, .jpg, .jpeg">
                                            <div class="form-text">(Chấp nhận kiểu tập tin: png, jpg, jpeg)</div>
                                        </div>
                                    </div>
                                @break

                                @case(AdminSetting::TYPE_SELECT)
                                    <div class="row">
                                        <label class="col-lg-3 mb-3">
                                            {{ $setting->name }}
                                            @if ($setting->description)
                                                <i class="fas fa-question-circle mr-2" data-bs-toggle="tooltip"
                                                    title="{{ $setting->description }}"></i>
                                            @endif
                                        </label>
                                        <div class="col-lg-9 mb-3">
                                            <select name="{{ $setting->code }}" class="form-select">
                                                <option value="">-- Chưa chọn --</option>
                                                @foreach ($data['bank_list'] as $item)
                                                    <option {{ $setting->value == $item['code'] ? 'selected' : '' }}
                                                        value="{{ $item['code'] }}">{{ $item['name'] }}
                                                        - {{ $item['shortName'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @break

                                @default
                                    <div class="row">
                                        <label class="col-lg-3 mb-3">
                                            {{ $setting->name }}
                                            @if ($setting->description)
                                                <i class="fas fa-question-circle mr-2" data-bs-toggle="tooltip"
                                                    title="{{ $setting->description }}"></i>
                                            @endif
                                        </label>
                                        <div class="col-lg-9 mb-3">
                                            <input type="text" name={{ $setting->code }} class="form-control"
                                                value="{{ $setting->value }}" />
                                        </div>
                                    </div>
                                @break
                            @endswitch
                        @endforeach
                    </div>
                    <div class="card-footer" style="display: none;">
                        <button type="submit" class="" class="btn-submit">Cập
                            nhật</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $(document).on("click", ".btn-update", function(e) {
                $(this).html(`<span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                <span role="status">Loading...</span>`);
                $('button[type="submit"]').trigger("click");
            })
        })
    </script>
@endpush
