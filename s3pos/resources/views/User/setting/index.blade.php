@php
    use App\Models\Settings;
    $group = $data['group'];
@endphp
@extends('User.layout.main')
@section('content')
    <!--begin::Toolbar-->
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Toolbar container-->
        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Toolbar wrapper-->
            <div class="d-flex justify-content-between py-5">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading text-white d-flex flex-column justify-content-center fw-bold fs-3 m-0">
                        {{ $group->name }}
                    </h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-white">
                            <a href="{{ route('index') }}" class="text-muted text-hover-primary">
                                Trang chủ
                            </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-white active">Cấu hình</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                        <!--begin::Nav item-->
                        @foreach ($data['groups'] as $item)
                            <li class="nav-item mt-2">
                                <a class="nav-link text-white ms-0 me-10 py-5 {{ $group->id == $item->id ? 'active' : '' }}"
                                    href="{{ route('setting.index') . '?type=' . $item->code }}">
                                    {!! $item->icon !!}&nbsp; {{ $item->name }}
                                </a>
                            </li>
                        @endforeach
                        <!--end::Nav item-->
                    </ul>
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar wrapper-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container">
            <!--begin::details View-->
            <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                <!--begin::Card body-->
                <form action="{{ route('setting.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body p-9">
                        <input type="hidden" name="type" value={{ $group->code }}>
                        <!--begin::Row-->
                        @foreach ($group->settings as $setting)
                            @switch($setting->type)
                                @case(Settings::TYPE_FILE)
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label
                                            class="col-lg-5 col-form-label {{ !$setting->empty ? 'required' : '' }} fw-semibold fs-6">
                                            {{ $setting->name }}
                                            @if ($setting->description)
                                                <i class="ki-outline ki-information-2 fs-3 mr-2" data-bs-toggle="tooltip"
                                                    title="{{ $setting->description }}"></i>
                                            @endif
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-7 fv-row">
                                            <div class="image-input image-input-outline" data-kt-image-input="true"
                                                style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                                <!--begin::Preview existing avatar-->
                                                <div class="image-input-wrapper w-125px h-125px bgi-position-center"
                                                    style="background-size: 75%; background-image: url('{{ $setting->value }}')">
                                                </div>
                                                <!--end::Preview existing avatar-->
                                                <!--begin::Label-->
                                                <label
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                    data-kt-image-input-action="change" data-kt-initialized="1">
                                                    <i class="ki-outline ki-pencil fs-7"></i>
                                                    <!--begin::Inputs-->
                                                    <input type="file" name="{{ $setting->code }}" accept=".png, .jpg, .jpeg">
                                                    <input type="hidden" name="avatar_remove">
                                                    <!--end::Inputs-->
                                                </label>
                                                <!--end::Label-->
                                            </div>
                                            <div class="form-text">Chấp nhận kiểu tập tin: png, jpg, jpeg.</div>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                @break

                                @case(Settings::TYPE_SELECT)
                                @break

                                @case(Settings::TYPE_RADIO)
                                    <div class="row mb-0">
                                        <!--begin::Label-->
                                        <label
                                            class="col-lg-5 col-form-label {{ !$setting->empty ? 'required' : '' }} fw-semibold fs-6">
                                            {{ $setting->name }}
                                            @if ($setting->description)
                                                <i class="ki-outline ki-information-2 fs-3 mr-2" data-bs-toggle="tooltip"
                                                    title="{{ $setting->description }}"></i>
                                            @endif
                                        </label>
                                        <!--begin::Label-->
                                        <!--begin::Label-->
                                        <div class="col-lg-7 d-flex align-items-center">
                                            <div class="form-check form-check-solid form-switch form-check-custom fv-row">
                                                <input class="form-check-input w-45px h-30px" type="checkbox"
                                                    id="{{ $setting->code }}" {{ $setting->value == 1 ? 'checked' : '' }}
                                                    name="{{ $setting->code }}" />
                                                <label class="form-check-label" for="{{ $setting->code }}"></label>
                                            </div>
                                        </div>
                                        <!--begin::Label-->
                                    </div>
                                @break

                                @default
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label
                                            class="col-lg-5 col-form-label {{ !$setting->empty ? 'required' : '' }} fw-semibold fs-6">
                                            {{ $setting->name }}
                                            @if ($setting->description)
                                                <i class="ki-outline ki-information-2 fs-3 mr-2" data-bs-toggle="tooltip"
                                                    title="{{ $setting->description }}"></i>
                                            @endif
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-7 fv-row">
                                            <input type="text" name={{ $setting->code }}
                                                {{ !$setting->empty ? 'required' : '' }}
                                                class="form-control form-control-lg form-control-solid"
                                                value="{{ $setting->value }}" />
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                @break
                            @endswitch
                        @endforeach
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="submit" class="btn btn-primary" id="kt_submit">
                                <span class="indicator-label">Cập nhật</span>
                                <span class="indicator-progress">Đang xử lý ...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </div>
                </form>
                <!--end::Card body-->
            </div>
        </div>
        <!--end::details View-->
    </div>
    <!--end::Content-->
@endsection

@section('script')
    <script>
        const btn = $('#kt_submit');
        btn.click(function() {
            btn.attr('data-kt-indicator', 'on');
        });
    </script>
@endsection
