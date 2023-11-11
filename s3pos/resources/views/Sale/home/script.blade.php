<script>
    let tableSelect = null;
    $(document).ready(function() {
        loadCategory();
        loadProduct();
        load_history_order();

        function loadCategory() {
            $.get("{{ route('sale.category') }}", function(res) {
                $('.category_product').html(res);
            })
        }

        function loadProduct() {
            $.get("{{ route('sale.product') }}", function(res) {
                $('.product').html(res);
            })
        }
        loadCart();

        function loadCart() {
            $.get("{{ url('/sale/cart') }}", function(res) {
                $('.cart-product').html(res);
                loadPayment();
            })
        }
        loadPayment();

        function loadPayment() {
            $.get("{{ route('sale.payment') }}", function(res) {
                $('.payment').html(res);
            })
        }

        $(document).on("click", ".btn-minus", function(e) {
            e.preventDefault();
            $quantity = $('.quantity').val();
            if ($quantity == 0) {
                $('.btn-minus').attr('disable')
            } else {
                $quantity--;
                $('.quantity').val($quantity);
            }
        })
        $(document).on("click", ".btn-add", function(e) {
            e.preventDefault();
            $quantity = $('.quantity').val();
            $quantity++;
            $('.quantity').val($quantity);
        })

        $(document).on("click", ".pos-product", function(e) {
            e.preventDefault();
            const url = $(this).attr('href');
            $.get(url, function(data) {
                $('.modal-order').html(data);
                $('#modalPosItem').modal('show');
            })
        })

        $(document).on("click", ".select-table", function(e) {
            e.preventDefault();
            const url = $(this).attr('href');
            $.get(url, function(data) {
                $('.modal-table').html(data);
                $('#modalTable').modal('show');
            })
        })

        $(document).on('click', '.option-table', function(e) {
            e.preventDefault();
            tableSelect = {
                id: $(this).data('id'),
                name: $(this).data('name'),
            };
            $('.info-table').html(`(${tableSelect.name})`);
            $('#modalTable').modal('hide');
        })

        $(document).on('click', '.btn-add-product', function(e) {
            const form_create = $('form#form-add-product');
            if (form_create) {
                const action = form_create.attr('action');
                form_create.submit(function(e) {
                    e.preventDefault();
                    $('.btn-add-product').html(`<span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                     <span role="status">Loading...</span>`);
                    const data = new FormData($(this)[0]);
                    $.ajax({
                        url: action,
                        data: data,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        success: function(rs) {
                            $('.btn-add-product').html(
                                `<i class="fas fa-plus"></i> Thêm vào giỏ hàng`);
                            $('button[type=submit]').removeAttr('disabled');
                            if (rs.status == 200) {
                                form_create[0].reset();
                                loadCart();
                                $('#modalPosItem').modal('hide');
                            }
                            Toast.fire({
                                icon: rs?.type,
                                title: rs.message
                            });
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            $('.btn-add-product').html(
                                `<i class="fas fa-plus"></i> Tạo mới`);
                            $('button[type=submit]').removeAttr('disabled');
                            Toast.fire({
                                icon: 'error',
                                title: 'Không thể thêm'
                            });
                        }
                    });
                });
            }
        })

        //delete
        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();
            $url = $(this).attr('href');
            $.get($url, function(res) {
                if (res.status == 200) {
                    loadCart();
                    Toast.fire({
                        icon: 'success',
                        title: 'Đã xóa sản phẩm'
                    });
                }
            })

        })
    })

    $(document).ready(function() {
        $(document).on('click', '.option-label', function(e) {
            e.preventDefault();
            $('.option-label').removeClass('active');
            $(this).addClass('active');
        })

        $(document).on('click', '.sub-product', function(e) {
            e.preventDefault();
            const rowId = $(this).data('id');
            $.get("{{ route('sale.update_item') }}", {
                type: 'sub',
                rowId: rowId
            }, function(res) {
                if (res.status == 200) {
                    $('.cart-product').html(res.cart);
                    $('.payment').html(res.payment);
                }
            })
        })

        $(document).on('click', '.add-product', function(e) {
            e.preventDefault();
            const rowId = $(this).data('id');
            $.get("{{ route('sale.update_item') }}", {
                type: 'add',
                rowId: rowId
            }, function(res) {
                if (res.status == 200) {
                    $('.cart-product').html(res.cart);
                    $('.payment').html(res.payment);
                }
            })
        })
    })

    function DestroyCart() {
        if (confirm('Xác nhận xóa giỏ hàng?')) {
            $.get("{{ route('sale.destroy') }}", function(res) {
                if (res.status == 200) {
                    $('.cart-product').html('');
                    Toast.fire({
                        icon: 'success',
                        title: 'Đã xóa giỏ hàng'
                    });
                }
            })
        }
    }

    function acceptPayment() {
        if (confirm('Xác nhận thanh toán?')) {
            $.get("{{ route('sale.acceptPayment') }}", {
                table_id: tableSelect?.id
            }, function(res) {
                if (res.status == 200) {
                    tableSelect = null;
                    $('.cart-product').html('');
                    $('.payment').html(res.payment);
                    $('.order-history-content').append(res.new_item);
                    Toast.fire({
                        icon: 'success',
                        title: 'Thanh toán thành công'
                    });
                }
            })
        }
    }

    function load_history_order() {
        $.get("{{ route('sale.load_history_order') }}", function(res) {
            $('.order-history-content').html(res);
        })
    }

    // Hàm để cập nhật thời gian
    function updateClock() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();

        // Định dạng giờ, phút, giây thành chuỗi
        var timeString = hours + ':' + minutes + ':' + seconds;

        // Hiển thị chuỗi thời gian trong phần tử có id là "clock"
        $('#clock').text(timeString);
    }

    // Gọi hàm updateClock mỗi giây
    setInterval(updateClock, 1000);

    // Gọi hàm để hiển thị thời gian ban đầu
    updateClock();
</script>
