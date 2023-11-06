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
$("form").submit(function () {
    const btn_submit = $(this).find('button[type="submit"]');
    btn_submit.html(`<span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
  <span role="status">Loading...</span>`);
    btn_submit.attr("disabled", true);
});

function copyToClipboard(current_element, elementId) {
    var icon_copy = '<i class="ki-outline ki-copy fs-4 ms-1"></i>';
    var icon_copy_done =
        '<i class="ki-outline text-success ki-check fs-4 ms-1"></i>';

    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($("#" + elementId).text()).select();
    document.execCommand("copy");
    $temp.remove();
    current_element.innerHTML = icon_copy_done;
    setTimeout(function () {
        current_element.innerHTML = icon_copy;
    }, 3000);
}

function toogle_key(btn) {
    $(btn).parent().find("span.key-hide").toggle();
    $(btn).parent().find("span.key-show").toggle();
}
