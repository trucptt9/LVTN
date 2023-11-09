<!DOCTYPE html>
<html lang="vi">
<!--begin::Head-->

<head>
    <base href="{{ route('index') }}" />
    <title>{{ get_option_admin('short-name') }}</title>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon"href="{{ show_s3_file(get_option_admin('app-favicon')) }}" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    @yield('style')
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('user/assets/plugins/select-picker/dist/picker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/assets/plugins/global/plugins.bundle.css') }} " rel="stylesheet" type="text/css" />
    <link href="{{ asset('user/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Global Stylesheets Bundle-->
    <style>
        .row-header {
            padding-left: 30px;
            padding-right: 30px;

        }

        .box-icon {
            width: 50px;
            border: 1px solid snow;
            height: 50px;
            align-items: center;
            display: flex;
            justify-content: center;
            background: #6a99df;
        }

        .box {
            border: 1px solid #40a0bd;
            padding: 10px;
            border-radius: 10px;
            margin: 10px;

        }

        .box-info {
            margin-left: 10px;
            display: flex;
            flex-direction: column;
            /* align-items: center; */
            justify-content: center;

        }
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        document.documentElement.setAttribute("data-bs-theme", defaultThemeMode);
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                @include('User.layout.header')
                @include('User.layout.sidebar')
                @yield('content')
                @include('User.layout.footer')
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-arrow-up">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </div>
    <!--end::Scrolltop-->
    <!--end::Modals-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "user/assets/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('user/assets/plugins/select-picker/dist/picker.min.js') }}"></script>
    <script src="{{ asset('user/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('user/assets/js/scripts.bundle.js') }}"></script>

    <script>
        let page = 1;
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        })

        function confirmLogout() {
            if (confirm("Xác nhận thoát khỏi hệ thống?")) {
                location.href = "{{ route('logout') }}";
            }
            return;
        }

        @if (session('success'))
            Toast.fire({
                icon: 'success',
                title: "{{ session('success') }}"
            });

            console.log({{ session('success') }});
        @endif

        @if (session('error'))
            Toast.fire({
                icon: 'error',
                title: "{{ session('error') }}"
            });
        @endif

        function copyToClipboard(current_element, elementId) {
            var icon_copy =
                '<i class="ki-outline ki-copy fs-4 ms-1"></i>';
            var icon_copy_done =
                '<i class="ki-outline text-success ki-check fs-4 ms-1"></i>';

            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($("#" + elementId).text()).select();
            document.execCommand("copy");
            $temp.remove();
            current_element.innerHTML = icon_copy_done;
            setTimeout(function() {
                current_element.innerHTML = icon_copy;
            }, 3000);
        }

        function toogle_key(btn) {
            $(btn).parent().find('span.key-hide').toggle();
            $(btn).parent().find('span.key-show').toggle();
        }

        function showSpinner(elementClass) {
            var html =
                '<div class="text-center sniper-content"> <div class="spinner-border" role="status"> <span class="sr-only">Loading...</span> </div> </div>';
            $(elementClass).append(html);
        }

        function hideSniper(elementClass) {
            $(elementClass).closest(".card-body").find(".sniper-content").remove();
        }

        function loadTable(
            uri = "",
            tableElement = "#load-table",
            formElement = "#form-filter",
            otherFunction
        ) {
            uri = uri != "" ? uri : routeList;
            showSpinner(".table-loading");
            var data = $(formElement).serialize();
            console.log(data)
            const url = uri + "?page=" + page + "&" + data;
            console.log(url)
            $.get(url, function(rs) {
                // console.log(status)
                hideSniper(".table-loading");
                $("button[type=submit]").removeAttr("disabled");
                $(".btn-reload").html('<i class="fas fa-sync"></i>');
                if (rs.status == 200) {
                    $(tableElement).html(rs.data);
                    $('.total-item').html(`(${rs?.total})`);
                    if (otherFunction) {
                        otherFunction(rs);
                    }
                    const tooltipTriggerList = document.querySelectorAll(
                        '[data-bs-toggle="tooltip"]'
                    );
                    const tooltipList = [...tooltipTriggerList].map(
                        (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
                    );
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: rs.message
                    });
                }
            });
        }


        const form_update = $('form#form-update');
        if (form_update) {
            const action = form_update.attr('action');
            form_update.submit(function(e) {
                e.preventDefault();
                $('.btn-create').html(`<span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                <span role="status">Loading...</span>`);
                const data = new FormData($(this)[0]);
                $.ajax({
                    url: action,
                    data: data,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function(rs) {
                        $('.btn-create').html(`<span class="indicator-label">Cập nhật </span>`);
                        $('button[type=submit]').removeAttr('disabled');
                        if (rs.status == 200) {
                            form_update[0].reset();
                            loadTable();
                            if (rs?.uri) {
                                location.href = rs?.uri;
                            }

                            $('.close-btn').click();

                        }
                        Toast.fire({
                            icon: rs?.type,
                            title: rs.message
                        });
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {

                        $('button[type=submit]').removeAttr('disabled');
                        Toast.fire({
                            icon: 'error',
                            title: 'Tạo mới lỗi'
                        });
                    }
                });
            });
        }

        function deleteData(id, url, title = 'Xác nhận xóa dữ liệu này?') {
            if (confirm(title)) {
                showSpinner('.table-loading');
                $.get(url, {
                    id: id
                }, function(rs) {
                    hideSniper('.table-loading');
                    if (rs.status == 200) {
                        loadTable();
                    }
                    Toast.fire({
                        icon: rs?.type,
                        title: rs.message
                    });
                });
            }
        }
    </script>
    @stack('js')
    <!--end::Global Javascript Bundle-->
    @yield('script')
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
