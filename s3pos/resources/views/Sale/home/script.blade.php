<script>
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    let tableSelect = null;
    $(document).ready(function() {
        loadCategory();
        loadProduct();

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
                $('.payment').html(res.payment);
            })
        }
        $(document).on('click', '.btn-search-customer', function(e) {
            e.preventDefault();
            const phone = $('.phone').val();
            $.get("{{ route('sale.customer') }}", {
                phone: phone,
            }, function(res) {
                if (res) {
                    $('.customer-info').html(res.name);
                    $('.customer-info').attr('data-value', res.id);
                    $('.customer_name').val(res.name)
                } else {
                    $('.customer-info').html("Số điện thoại không tồn tại!")
                }

            })
        })
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
        $(document).on("click", ".btn-promotion", function(e) {
            e.preventDefault();
            $('#modal-add-promotion').modal('show');
        })
        $(document).on('click', '.btn-add-promtotion', function(e) {
            e.preventDefault();
            const search = $('.search').val();
            $.get("{{ route('sale.payment') }}", {
                search: search,
            }, function(res) {
                if (res.status == 200) {
                    if (res.promotion.length == 0) {

                        $('.promotion-none').html("Không tìm thấy khuyến mãi phù hợp!")
                    } else {
                        $('#modal-add-promotion').modal('hide');
                        $('.promotion-none').html("");
                        $('.payment').html(res.payment);
                        $('.promotion-id').val(res.promotion[0].id)
                        $('.discount-type').html(res.promotion[0].type_value == 'percent' ?
                            '%' : 'đ');
                        $('.discount-type').attr('data-value', res.promotion[0].type_value);
                        $('.discount-value').attr('data-value', res.promotion[0].value);
                        $total = ($('.total-payment').val());
                        $sub_total = $('.subtotal').attr('data-value');
                        if (res.promotion[0].type_value == 'percent') {
                            $total = $total - $total * (res.promotion[0].value / 100);
                            $('.discount-total').val($sub_total * (res.promotion[0].value /
                                100));
                        } else {
                            $total = $total - res.promotion[0].value;
                            $('.discount-total').val(res.promotion[0].value);
                        }
                        $('.total-payment').val($total);
                        $total = $total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                        $('.payment-total').html(($total))
                    }
                }
            })
        })

        $(document).on('click', '.btn-add-product', function(e) {
            const form_create = $('form#form-add-product');
            if (form_create) {
                const action = form_create.attr('action');
                e.preventDefault();
                $('.btn-add-product').html(`<span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                     <span role="status">Loading...</span>`);
                const data = new FormData(form_create[0]);
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
        $(document).on('click', '.sub-product', function(e) {
            e.preventDefault();
            const search = $('.search').val();
            const rowId = $(this).data('id');
            $.get("{{ route('sale.payment') }}", {
                type: 'sub',
                rowId: rowId,
                search: search
            }, function(res) {
                if (res.status == 200) {
                    $('.cart-product').html(res.cart);
                    $('.payment').html(res.payment);
                    if (res.promotion.length != 0) {
                        $('.discount-type').html(res.promotion[0].type_value == 'percent' ?
                            '%' : 'đ');
                        $total = ($('.total-payment').val());
                        if (res.promotion[0].type_value == 'percent') {
                            $total = $total - $total * (res.promotion[0].value / 100);
                        } else {
                            $total = $total - res.promotion[0].value;
                        }
                        $total = $total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                        $('.payment-total').html(($total))
                    }
                }
            })
        })
        $(document).on('click', '.add-product', function(e) {
            e.preventDefault();
            const rowId = $(this).data('id');
            const search = $('.search').val();
            $.get("{{ route('sale.payment') }}", {
                type: 'add',
                rowId: rowId,
                search: search
            }, function(res) {
                if (res.status == 200) {
                    $('.cart-product').html(res.cart);
                    $('.payment').html(res.payment);
                    if (res.promotion.length != 0) {
                        $('.discount-type').html(res.promotion[0].type_value == 'percent' ?
                            '%' : 'đ');
                        $total = ($('.total-payment').val());
                        if (res.promotion[0].type_value == 'percent') {
                            $total = $total - $total * (res.promotion[0].value / 100);
                        } else {
                            $total = $total - res.promotion[0].value;
                        }
                        $total = $total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                        $('.payment-total').html(($total))
                    }
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
        $('#modal_payment').modal('show');
        $total = ($('.total-payment').val());
        $total = $total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + ' đ';
        $('.payment_total').html($total);
        $('.btn-payment').click(function(e) {
            e.preventDefault();
            const payment_change = parseInt($('.payment_change').attr('data-value'));
            if ($('.customer-payment').val() == '') {
                alert("Vui lòng nhập số tiền khách đưa!")
            } else if (payment_change < 0) {
                alert("Số tiền khách đưa chưa đủ!")
            } else {
                $table_id = $('.table').val();
                $customer_id = $('.customer-info').attr('data-value');
                $promotion_id = $('.promotion-id').val();
                $discount = $('.discount-value').attr('data-value');
                $type_discount = $('.discount-type').attr('data-value');
                $discount_total = $('.discount-total').val();
                $total = $('.total-payment').val();
                $sub_total = $('.subtotal').attr('data-value');
                $payment_method = $('[name="payment_method"]:radio:checked').val();
                $status = 'finish',
                    $.get("{{ route('sale.acceptPayment') }}", {
                        table: $table_id,
                        customer: $customer_id,
                        promotion: $promotion_id,
                        discount: $discount,
                        type_discount: $type_discount,
                        discount_total: $discount_total,
                        total: $total,
                        sub_total: $sub_total,
                        payment_method: $payment_method,
                    }, function(res) {
                        if (res.status == 200) {
                            // tableSelect = null;
                            $('.cart-product').html('');
                            $('.payment').html(res.payment);
                            $('.customer-payment').val('');
                            $('.payment_change').html('');
                            $('.phone').val('');
                            $('.customer-info').html('');
                            $('#modal_payment').modal('hide');
                            Toast.fire({
                                icon: 'success',
                                title: 'Thanh toán thành công'
                            });
                        }
                    })
            }
        })
    }

    function saveOrderTmp() {
        $table_id = $('.table').val();
        $customer_id = $('.customer-info').attr('data-value');
        $promotion_id = $('.promotion-id').val();
        $discount = $('.discount-value').attr('data-value');
        $type_discount = $('.discount-type').attr('data-value');
        $discount_total = $('.discount-total').val();
        $total = $('.total-payment').val();
        $sub_total = $('.subtotal').attr('data-value');
        $customer_name = $('.customer_name').val();
        $.get("{{ route('sale.saveOrder') }}", {
            table: $table_id,
            customer: $customer_id,
            promotion: $promotion_id,
            discount: $discount,
            type_discount: $type_discount,
            discount_total: $discount_total,
            total: $total,
            sub_total: $sub_total,
            customer_name: $customer_name
        }, function(res) {
            $('.cart-product').html('');
            $('.payment').html(res.payment);
            $('.customer-payment').val('');
            $('.payment_change').html('');
            $('.phone').val('');
            $('.customer-info').html('');
            $('#modal_payment').modal('hide');
            Toast.fire({
                icon: 'success',
                title: 'Lưu đơn thành công'
            });
        })

    }

    function handleCalculate() {
        $total = ($('.total-payment').val());
        $customer_paid = $('.customer-payment').val();
        $total_change = ($customer_paid - $total).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + ' đ'
        $('.payment_change').html($total_change);
        $('.payment_change').attr('data-value', $customer_paid - $total);
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
