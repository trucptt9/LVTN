<script>
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
        loadCart()

        function loadCart() {
            $.get("{{ url('/sale/cart') }}", function(res) {
                $('.cart-product').html(res);
            })
        }
        loadPayment()

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
            console.log(url)
            $.get(url, function(data) {

                console.log(data);
                $('.modal-order').html(data);
                $('#modalPosItem').modal('show');
            })
        })

        $(document).on("click", ".table", function(e) {

            e.preventDefault();
            const url = $(this).attr('href');
            console.log(url)
            $.get(url, function(data) {

                console.log(data);
                $('.modal-table').html(data);
                $('#modalTable').modal('show');
            })
        })

        $(document).on('click', '.btn-add-table', function(e) {
            e.preventDefault();
            alert(1)
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
            console.log($url);
            $.get($url, function(res) {
                if (res.status == 200) {
                    loadCart();
                }
            })

        })
    })
</script>
