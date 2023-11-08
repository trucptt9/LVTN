<!-- ================== BEGIN BASE JS ================== -->
<script src="{{ asset('admin/assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/app.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/select-picker/dist/picker.min.js') }}"></script>
<!-- ================== END BASE JS ================== -->
<script>
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    const Toast = Swal.mixin({
        toast: true,
        position: "bottom-end",
        showConfirmButton: false,
        timer: 3000,
    });
    let page = 1;

    function confirmLogout() {
        if (confirm("Xác nhận thoát khỏi hệ thống?")) {
            location.href = "{{ route('admin.logout') }}";
        }
        return;
    }

    function showSpiner(elementClass) {
        var html =
            '<div class="text-center sniper-content"> <div class="spinner-border" role="status"> <span class="sr-only">Loading...</span> </div> </div>';
        $(elementClass).append(html);
    }

    function hideSniper(elementClass) {
        $(elementClass).closest(".card-body").find(".sniper-content").remove();
    }

    // function load data table
    function loadTable(
        uri = "",
        tableElement = "#load-table",
        formElement = "#form-filter",
        otherFunction
    ) {
        uri = uri != "" ? uri : routeList;
        showSpiner(".table-loading");
        var data = $(formElement).serialize();
        const url = uri + "?page=" + page + "&" + data;
        $.get(url, function(rs) {
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

    // function delete data table
    function deleteData(id, url, title = 'Xác nhận xóa dữ liệu này?') {
        if (confirm(title)) {
            showSpiner('.table-loading');
            $.post(url, {
                id: id
            }, function(rs) {
                hideSniper('.table-loading');
                if (rs.status == 200) {
                    filterTable();
                }
                Toast.fire({
                    icon: rs?.type,
                    title: rs.message
                });
            });
        }
    }

    @if (session('success'))
        Toast.fire({
            icon: 'success',
            title: "{{ session('success') }}"
        });
    @endif

    @if (session('error'))
        Toast.fire({
            icon: 'error',
            title: "{{ session('error') }}"
        });
    @endif

    // event update status of data table
    function changeStatus(id) {
        $.post(routeUpdate, {
            id
        }, function(rs) {
            Toast.fire({
                icon: rs?.type,
                title: rs.message
            });
        });
    }

    // event create new data
    const form_create = $('form#form-create');
    if (form_create) {
        const action = form_create.attr('action');
        form_create.submit(function(e) {
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
                    $('.btn-create').html(`<i class="fas fa-plus"></i> Tạo mới`);
                    $('button[type=submit]').removeAttr('disabled');
                    if (rs.status == 200) {
                        form_create[0].reset();
                        loadTable();
                        if (rs?.uri) {
                            location.href = rs?.uri;
                        }
                        $('.btn-close').click();
                    }
                    Toast.fire({
                        icon: rs?.type,
                        title: rs.message
                    });
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    $('.btn-create').html(`<i class="fas fa-plus"></i> Tạo mới`);
                    $('button[type=submit]').removeAttr('disabled');
                    Toast.fire({
                        icon: 'error',
                        title: 'Tạo mới lỗi'
                    });
                }
            });
        });
    }

    // event update form data table
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
                    $('.btn-create').html(`<i class="fas fa-plus"></i> Tạo mới`);
                    $('button[type=submit]').removeAttr('disabled');
                    if (rs.status == 200) {
                        form_update[0].reset();
                        loadTable();
                        if (rs?.uri) {
                            location.href = rs?.uri;
                        }
                        $('.btn-close').click();
                    }
                    Toast.fire({
                        icon: rs?.type,
                        title: rs.message
                    });
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    $('.btn-create').html(`<i class="fas fa-plus"></i> Tạo mới`);
                    $('button[type=submit]').removeAttr('disabled');
                    Toast.fire({
                        icon: 'error',
                        title: 'Tạo mới lỗi'
                    });
                }
            });
        });
    }
</script>
@stack('js')
<script src="{{ asset('admin/assets/js/custom.js') }}"></script>
