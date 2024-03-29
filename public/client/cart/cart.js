$(function () {
    // Lấy CSRF token từ meta tag trong trang web
    const csrfToken = $('meta[name="csrf-token"]').attr('content');

    getTotalValue();

    function getTotalValue() {
        let total = $(".total-price").data("price");
        let couponPrice = $(".coupon-div")?.data("price") ?? 0;
        $(".total-price-all").text(`$${total - couponPrice}`);
    }

    $(document).on("click", ".btn-remove-product", function (e) {
        let url = $(this).data("action");
        confirmDelete()
            .then(function () {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: { _token: csrfToken }, // Thêm CSRF token vào yêu cầu
                    success: function (res) {
                        let cart = res.cart;
                        let cartProductId = res.product_cart_id;
                        $("#productCountCart").text(cart.product_count);
                        $(".total-price")
                            .text(`$${cart.total_price}`)
                            .data("price", cart.product_count);
                        $(`#row-${cartProductId}`).remove();
                        getTotalValue();
                    },
                    error: function (xhr, status, error) {
                        // Xử lý lỗi nếu cần
                    }
                });
            })
            .catch(function () { });
    });

    const TIME_TO_UPDATE = 1000;

    $(document).on(
        "click",
        ".btn-update-quantity",
        _.debounce(function (e) {
            let url = $(this).data("action");
            let id = $(this).data("id");
            let data = {
                _token: csrfToken, // Thêm CSRF token vào yêu cầu
                product_quantity: $(`#productQuantityInput-${id}`).val(),
            };
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function (res) {
                    let cartProductId = res.product_cart_id;
                    let cart = res.cart;
                    $("#productCountCart").text(cart.product_count);
                    if (res.remove_product) {
                        $(`#row-${cartProductId}`).remove();
                    } else {
                        $(`#cartProductPrice${cartProductId}`).html(
                            `$${res.cart_product_price}`
                        );
                    }
                    getTotalValue();
                    $(".total-price").text(`$${cart.total_price}`);
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "success",
                        showConfirmButton: false,
                        timer: 1500,
                    });
                },
                error: function (xhr, status, error) {
                    // Xử lý lỗi nếu cần
                }
            });
        }, TIME_TO_UPDATE)
    );
});
