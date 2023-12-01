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
            const url = "{{ route('sale.cart', $table->id) }}"
            $.get(url, function(res) {
                $('.cart-product').html(res);
                loadPayment();
            })
        }
        loadPayment();

        function loadPayment() {
            const url = "{{ route('sale.payment', $table->id) }}"
            $.get(url, function(res) {
                $('.payment').html(res.payment);
                $pro_val = localStorage.getItem('pro_value');
                $pro_type = localStorage.getItem('pro_type');
                $cou_val = localStorage.getItem('coupon_val');
                $cou_type = localStorage.getItem('coupon_type');
                if ($pro_val && $pro_type) {
                    apply_promotion($pro_val, $pro_type);
                } else if ($cou_val && $cou_type) {
                    apply_promotion($cou_val, $cou_type);
                }

            })
        }
        $(document).on('click', '.option-list .option-input', function(e) {
            if ($(this).is(':checked')) {
                $(this).closest('.option').find('.option-label').addClass('active');
            } else {
                $(this).closest('.option').find('.option-label').removeClass('active');
            }
        })
        $(document).on('click', '.btn-search-customer', function(e) {
            e.preventDefault();
            const phone = $('.phone').val();
            if (phone) {
                $(this).html(
                    `<span class="spinner-border spinner-border-sm" aria-hidden="true"></span>`);
                $('.btn-search-customer').prop('disabled', true);
                $.get("{{ route('sale.customer') }}", {
                    phone: phone,
                    type: 'show'
                }, function(res) {
                    $('.btn-search-customer').html(`Tìm`);
                    $('.btn-search-customer').prop('disabled', false);
                    $('.customer-list').html(res);
                })
            } else {
                Toast.fire({
                    icon: 'error',
                    title: 'Vui lòng nhập số điện thoại!!'
                });
            }
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
            if (localStorage.getItem('coupon_val')) {
                alert("Chỉ được chọn 1 loại giảm giá!")
            } else {
                $('#modal-add-promotion').modal('show');
            }

        })
        $(document).on('click', '.btn-add-promtotion', function(e) {
            e.preventDefault();
            $(this).html(`<span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                <span role="status">Loading...</span>`);
            $('button[type=submit]').prop('disabled', true);
            const search = $('.search').val();
            $.get("{{ route('sale.promotion') }}", {
                search: search,
            }, function(res) {
                if (res.status == 200) {
                    $('.btn-add-promtotion').html(`Xác nhận`);
                    $('button[type=submit]').prop('disabled', false);
                    if (res.promotion.length == 0) {
                        $('.promotion-none').html("Không tìm thấy khuyến mãi phù hợp!")
                    } else {
                        if (localStorage) {
                            deleteStoragePro();
                            localStorage.setItem('pro_value', res.promotion[0].value);
                            localStorage.setItem('pro_type', res.promotion[0].type_value);
                            localStorage.setItem('pro_id', res.promotion[0].id);
                        }
                        $('#modal-add-promotion').modal('hide');
                        $('.promotion-none').html("");
                        $('.promotion-id').val(res.promotion[0].id)
                        apply_promotion(res.promotion[0].value, res.promotion[0].type_value);
                    }
                } else {
                    $('.btn-add-promtotion').html(`Xác nhận`);
                    $('button[type=submit]').prop('disabled', false);
                    Toast.fire({
                        icon: 'error',
                        title: 'Có lỗi!!'
                    });
                }
            })
        })
        //coupon
        $('.coupons').click(function(e) {
            const value = localStorage.getItem('coupon_val');
            const type = localStorage.getItem('coupon_type');
            const code = localStorage.getItem('coupon_code');

            if (localStorage.getItem('pro_value')) {
                $('#coupon').html(
                    `<span class="small fw-semibold text-center px-3">Đã áp dụng khuyến mãi. Chỉ được chọn 1 khuyến mãi!</span>`
                );
            } else if (type && value) {
                const format = type == 'percent' ? value : value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                const type_format = type == 'percent' ? '%' : ' đ'
                const string = `<div class="card bg-success"><div class="card-body position-relative">
                <button class="btn btn-sm btn-danger position-absolute top-0 end-0 btn-cancle-coupon"><i
                                class="fa-solid fa-xmark"></i></button>
                        <div class="d-flex align-items-center">
                            <span class="fw-semibold">Mã : </span>
                            <span class="coupon-code">${code}</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="fw-semibold">Giá trị KM : </span>
                            <span>${format} ${type_format}</span>
                        </div>
                </div>
            </div>`
                $('#coupon').html(string);
            } else {
                $.get("{{ route('sale.coupon') }}", function(res) {
                    if (res.status == 200) {
                        $('#coupon').html(res.data);
                    }
                })
            }

        })
        $(document).on('click', '.coupon-choose', function(e) {
            e.preventDefault();
            const id = $(this).attr('data-value');
            const code = $('.coupon-code').attr('data-value');
            const value = $('.coupon-value').val();
            const type = $('.coupon-type').val();
            localStorage.setItem('coupon_val', value);
            localStorage.setItem('coupon_type', type);
            localStorage.setItem('coupon_code', code);
            localStorage.setItem('coupon_id', id);
            const format = type == 'percent' ? value : value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
            const type_format = type == 'percent' ? '%' : ' đ'
            const string = `<div class="card bg-success"><div class="card-body position-relative">
                <button class="btn btn-sm btn-danger position-absolute top-0 end-0 btn-cancle-coupon"><i
                                class="fa-solid fa-xmark"></i></button>
                        <div class="d-flex align-items-center">
                            <span class="fw-semibold">Mã : </span>
                            <span class="coupon-code">${code}</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="fw-semibold">Giá trị KM : </span>
                            <span>${format} ${type_format}</span>
                        </div>
                </div>
            </div>`
            $('#coupon').html(string);
            apply_promotion(value, type);
            active_chose();
        })
        $(document).on('click', '.btn-cancle-coupon', function(e) {
            deleteStorageCoupon();
            loadPayment();
        })
        $(document).on('click', '.btn-add-product', function(e) {
            e.preventDefault();
            const form_create = $('form#form-add-product');
            const quantity = $('#form-add-product').find('input[name="quantity"]').val();
            if (quantity > 0) {
                const action = form_create.attr('action');
                e.preventDefault();
                $('button[type=submit]').prop('disabled', true);
                $('.btn-add-product').html(`<span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                     <span role="status" disabled>Loading...</span>`);

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
                        $('button[type=submit]').prop('disabled', false);
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
                            `<i class="fas fa-plus"></i> Thêm vào giỏ hàng`);
                        $('button[type=submit]').prop('disabled', false);
                        Toast.fire({
                            icon: 'error',
                            title: 'Không thể thêm'
                        });
                    }
                });
            } else {
                Toast.fire({
                    icon: 'error',
                    title: 'Vui lòng chọn số lượng!'
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
        $(document).on('click', '.sub-product', function(e) {
            e.preventDefault();
            const search = $('.search').val();
            const quantity = $(this).closest('div').find('.quantity').val();
            const rowId = $(this).data('id');
            $.get("{{ route('sale.payment', $table->id) }}", {
                type: 'sub',
                rowId: rowId,
                search: search
            }, function(res) {
                if (res.status == 200) {
                    $('.cart-product').html(res.cart);
                    $('.payment').html(res.payment);
                    if (localStorage.getItem('pro_value') && localStorage.getItem('pro_type')) {
                        apply_promotion(localStorage.getItem('pro_value'), localStorage.getItem(
                            'pro_type'));
                    }
                    if (quantity == 1) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Đã xóa sản phẩm'
                        });
                    }
                }
            })
        })
        $(document).on('click', '.add-product', function(e) {
            e.preventDefault();
            const rowId = $(this).data('id');
            const search = $('.search').val();
            $.get("{{ route('sale.payment', $table->id) }}", {
                type: 'add',
                rowId: rowId,
                search: search
            }, function(res) {
                if (res.status == 200) {
                    $('.cart-product').html(res.cart);
                    $('.payment').html(res.payment);
                    if (localStorage.getItem('pro_value') && localStorage.getItem('pro_type')) {
                        apply_promotion(localStorage.getItem('pro_value'), localStorage.getItem(
                            'pro_type'));
                    }

                }
            })
        })
        //booking
        //choose customer
        $(document).on('click', '.customer-choose', function(e) {
            e.preventDefault();
            const phone = $(this).attr('data-value');
            $.get("{{ route('sale.customer') }}", {
                phone: phone,
            }, function(res) {
                localStorage.setItem('customer', res)
                $('#customer').html(res);
                $('.customer-chosed').removeAttr('hidden');
            })
        })
        $(document).on('click', '.btn-cancle-customer', function(e) {
            e.preventDefault();
            $string = `<div class="d-flex align-items-center my-2 px-2">
                            <input type="text" class="form-control phone" placeholder="Nhập số điện thoại" name="phone">
                            <button class="btn ms-2 btn-primary btn-search-customer">Tìm</button>
                        </div>
                        <div class="customer-list">
                                        
                        </div>`
            $('#customer').html($string);
            $('.customer-chosed').prop('hidden', true)

        })
    })

    function active_chose() {
        if (localStorage.getItem('coupon_val')) {
            $('.coupon-chosed').removeAttr('hidden')
        }
    }
    active_chose();

    function apply_promotion(value, type) {
        $('.discount-type').html(type == 'percent' ?
            '%' : 'đ');
        const format = type == 'percent' ? value : value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        $('.discount-value').html(format);
        $total = ($('.total-payment').val());
        $sub_total = $('.subtotal').attr('data-value');
        if (type == 'percent') {
            $total = $total - $total * (value / 100);
            $('.discount-total').val($sub_total * (value / 100));
        } else {
            $total = $total - value < 0 ? 0 : $total - value;
            $('.discount-total').val(value);
        }
        $('.total-payment').val($total);
        $total = $total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + ' đ';
        $('.payment-total').html(($total))
    }

    function deleteStorageCoupon() {
        localStorage.removeItem('coupon_val');
        localStorage.removeItem('coupon_type');
        localStorage.removeItem('coupon_code');
        localStorage.removeItem('coupon_id');
        $('.coupon-chosed').attr('hidden', '');
        $('#coupon').html('');
        $.get("{{ route('sale.coupon') }}", function(res) {
            if (res.status == 200) {
                $('#coupon').html(res.data);
                $('.coupon-chosed').prop('hidden', true)
            }
        })
    }

    function deleteStoragePro() {
        localStorage.removeItem('pro_value');
        localStorage.removeItem('pro_type');
        localStorage.removeItem('pro_id');
    }

    function deleteStorageCustomer() {
        $('.customer-chosed').attr('hidden', '');
        $('.btn-cancle-customer').trigger('click');
        $('.customer-list').html('');
    }

    function addBooking() {
        $('#modal-add-booking').modal('show');
        $('.btn-booking').click(function(e) {
            e.preventDefault();
            $customer_id = $('.customer-id').val();
            $customer_name = $('.customer-name').val();
            $name = $('.name-booking').val();
            $phone = $('.phone-booking').val();
            $quantity = $('.quantity-booking').val();
            $note = $('.note-booking').val();
            $table_id = $('.table').val();
            $('.btn-booking').html(`<span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                     <span role="status">Loading...</span>`);

            if ($name != '' && $phone != '' && $quantity != '') {
                $.get("{{ route('sale.booking') }}", {
                    customer_id: $customer_id,
                    table_id: $table_id,
                    name: $name,
                    phone: $phone,
                    quantity: $quantity,
                    note: $note,
                }, function(res) {
                    if (res.status == 200) {
                        $('.btn-booking').html(`Xác nhận`);
                        $('#modal-add-booking').modal('hide');
                        Toast.fire({
                            icon: 'success',
                            title: 'Đặt bàn thành công'
                        });
                        location.href = "{{ route('sale.index') }}"
                    } else {
                        $('.btn-booking').html(`Xác nhận`);
                        Toast.fire({
                            icon: 'error',
                            title: 'Không thể đặt bàn'
                        });
                    }
                })
            } else {
                $('.btn-booking').html(`Xác nhận`);
                Toast.fire({
                    icon: 'error',
                    title: 'Vui lòng nhập thông tin còn thiếu!'
                })
            }
        })
    }

    function destroyBooking() {
        if (confirm('Xác nhận hủy đặt bàn ?')) {
            $('.btn-cancle-booking').html(`<span class="spinner-border spinner-border-sm" aria-hidden="true"></span>`);
            $('button[type=submit]').prop('disabled', true);
            $.get("{{ route('sale.destroy_booking', $table->id) }}", function(res) {
                $('.btn-cancle-booking').html(
                    `Hủy đặt bàn`);
                $('button[type=submit]').prop('disabled', false);
                if (res.status == 200) {
                    Toast.fire({
                        icon: res?.type,
                        title: res.message
                    });
                    location.href = "{{ route('sale.index') }}"
                } else {
                    Toast.fire({
                        icon: res?.type,
                        title: res.message
                    });
                }
            })
        }
    }

    function DestroyCart() {
        if (confirm('Xác nhận xóa giỏ hàng?')) {
            $('.btn-destroy').html(`<span class="spinner-border spinner-border-sm" aria-hidden="true"></span>`);
            $('button[type=submit]').prop('disabled', true);
            $.get("{{ route('sale.destroy') }}", function(res) {
                $('.btn-destroy').html(`<span>
                    <i class="fas fa-trash fa-fw fa-lg my-10px d-block"></i>
                    <span class="small fw-semibold">Hủy</span>
                </span>`);
                $('button[type=submit]').prop('disabled', false);
                if (res.status == 200) {
                    resetCart();
                    Toast.fire({
                        icon: 'success',
                        title: 'Đã xóa giỏ hàng'
                    });
                }
            })
        }
    }

    function deleteOrder() {
        if (confirm('Xác nhận hủy giỏ hàng?')) {
            const id = $('.order-id').val();
            $('.btn-delete-order').html(`<span class="spinner-border spinner-border-sm" aria-hidden="true"></span>`);
            $('btn-delete-order').prop('disabled', true);
            $.get("{{ route('sale.delete_order') }}", {
                id: id
            }, function(res) {
                $('.btn-delete-order').html(` <span>
                    <i class="fas fa-trash fa-fw fa-lg my-10px d-block"></i>
                    <span class="small fw-semibold">Hủy</span>
                </span>`);
                $('btn-delete-order').prop('disabled', false);
                if (res.status == 200) {
                    resetCart();
                }
                Toast.fire({
                    icon: res?.type,
                    title: res.message
                });
                location.href = "{{ route('sale.index') }}"
            })
        }
    }

    function acceptPayment() {
        $('#modal_payment').modal('show');
        $total = ($('.total-payment').val());
        $('.customer-payment').val($total);
        $total = $total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + ' đ';
        $('.payment_total').html($total);
        $('.payment_change').html('0 đ');
        $('.btn-payment').click(function(e) {
            e.preventDefault();
            const payment_change = parseInt($('.payment_change').attr('data-value'));
            if ($('.customer-payment').val() == '') {
                alert("Vui lòng nhập số tiền khách đưa!")
            } else if (payment_change < 0) {
                alert("Số tiền khách đưa chưa đủ!")
            } else {
                $('.btn-payment').html(`<span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                <span role="status">Loading...</span>`);
                $('button[type=submit]').prop('disabled', true);
                $table_id = $('.table').val();
                $customer_id = $('.customer-id').val();
                $sale_source_id = $('.sale_source').val();
                $customer_name = $('.customer-name').val();
                if (localStorage.getItem('pro_id')) {
                    $promotion_id = localStorage.getItem('pro_id');
                    $promotion_type = 'promotion';
                } else {
                    $promotion_id = localStorage.getItem('coupon_id');
                    $promotion_type = 'coupon';
                }
                $discount = localStorage.getItem('pro_value') || localStorage.getItem('coupon_val');
                $type_discount = localStorage.getItem('pro_type') || localStorage.getItem('coupon_type');
                $discount_total = $('.discount-total').val();
                $total = $('.total-payment').val();
                $sub_total = $('.subtotal').attr('data-value');
                $payment_method = $('[name="payment_method"]:radio:checked').val();
                $total_cost = $('.total-cost').val();
                $topping_total = $('.topping_total').val();
                $.get("{{ route('sale.acceptPayment') }}", {
                    table: $table_id,
                    customer: $customer_id,
                    customer_name: $customer_name,
                    promotion: $promotion_id,
                    promotion_type: $promotion_type,
                    discount: $discount,
                    type_discount: $type_discount,
                    discount_total: $discount_total,
                    total: $total,
                    sub_total: $sub_total,
                    payment_method: $payment_method,
                    total_cost: $total_cost,
                    topping_total: $topping_total,
                    sale_source_id: $sale_source_id

                }, function(res) {
                    if (res.status == 200) {
                        resetCart();
                        $('#modal_payment').modal('hide');
                        Toast.fire({
                            icon: 'success',
                            title: 'Thanh toán thành công'
                        });
                        location.href = "{{ route('sale.index') }}"
                    } else {
                        $('.btn-payment').html(`Xác nhận`);
                        $('button[type=submit]').removeAttr('disabled');
                        Toast.fire({
                            icon: 'error',
                            title: 'Thanh toán lỗi'
                        });
                    }
                }, )
            }
        })
    }

    function paymentOrderTmp() {
        $('#modal_payment').modal('show');
        $total = ($('.total-payment').val());
        $('.customer-payment').val($total);
        $total = $total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + ' đ';
        $('.payment_total').html($total);
        $('.payment_change').html('0 đ');
        const id = $('.order-id').val();
        $('.order-id-payment').val(id)
        $('.btn-payment').click(function(e) {
            e.preventDefault();
            const form_payment = $('form#form-payment');
            const data = new FormData(form_payment[0]);
            const payment_change = parseInt($('.payment_change').attr('data-value'));
            if ($('.customer-payment').val() == '') {
                alert("Vui lòng nhập số tiền khách đưa!")
            } else if (payment_change < 0) {
                alert("Số tiền khách đưa chưa đủ!")
            } else {
                $('.btn-payment').html(`<span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                <span role="status">Loading...</span>`);
                const url = "{{ route('sale.paymentOrderTmp') }}"
                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        resetCart();
                        Toast.fire({
                            icon: 'success',
                            title: 'Thanh toán thành công'
                        });
                        location.href = "{{ route('sale.index') }}"
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        $('.btn-payment').html(`Xác nhận`);
                        $('button[type=submit]').removeAttr('disabled');
                        Toast.fire({
                            icon: 'error',
                            title: 'Thanh toán lỗi'
                        });
                    }
                });

            }
        })
    }

    function saveOrderTmp() {
        $table_id = $('.table').val();
        $customer_id = $('.customer-id').val();
        $customer_name = $('.customer-name').val();
        if (localStorage.getItem('pro_id')) {
            $promotion_id = localStorage.getItem('pro_id');
            $promotion_type = 'promotion';
        } else {
            $promotion_id = localStorage.getItem('coupon_id');
            $promotion_type = 'coupon';
        }
        $discount = localStorage.getItem('pro_value');
        $type_discount = localStorage.getItem('pro_type');
        $discount_total = $('.discount-total').val();
        $total = $('.total-payment').val();
        $sub_total = $('.subtotal').attr('data-value');
        $total_cost = $('.total-cost').val();
        $topping_total = $('.topping_total').val();
        $sale_source_id = $('.sale_source').val();
        $.get("{{ route('sale.saveOrder') }}", {
            table: $table_id,
            customer: $customer_id,
            promotion: $promotion_id,
            promotion_type: $promotion_type,
            discount: $discount,
            type_discount: $type_discount,
            discount_total: $discount_total,
            total: $total,
            sub_total: $sub_total,
            customer_name: $customer_name,
            total_cost: $total_cost,
            topping_total: $topping_total,
            sale_source_id: $sale_source_id
        }, function(res) {
            Toast.fire({
                icon: 'success',
                title: 'Lưu đơn thành công'
            });
            setTimeout(() => {
                location.href = "{{ route('sale.index') }}";
            }, 1000);
        })

    }

    function handleCalculate() {
        $total = ($('.total-payment').val());
        $customer_paid = $('.customer-payment').val();
        $total_change = (Math.round($customer_paid - $total)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + ' đ'
        $('.payment_change').html($total_change);
        $total_paid = Math.round($customer_paid - $total);

        $('.payment_change').attr('data-value', $total_paid);
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

    function resetCart() {
        deleteStorageCoupon();
        $('#coupon').html('');
        deleteStoragePro();
        deleteStorageCustomer();
        $('.cart-product').html('');
        $('.customer-payment').val('');
        $('.payment_change').html('');
        $('.phone').val('');
        $('.customer-info').html('');
        $('.subtotal').html('0đ');
        $('.discount-value').html('0');
        $('.discount-type').html('%');
        $('.payment-total').html('0đ');
        $('.btn-save-tmp').prop('disabled', true);
        $('.btn-destroy').prop('disabled', true);
        $('.btn-payment').prop('disabled', true);
        $('#modal_payment').modal('hide');
        localStorage.removeItem('pro_value');
        localStorage.removeItem('pro_type');
        $('.btn-payment').html(`Xác nhận`);
        $('.tab-cart').click();
        loadPayment();
    }
</script>
