$(document).ready(function () {

    // Quantity Increase
    $(".plus").click(function () {

        let qty = $(".qty-input");

        qty.val(parseInt(qty.val()) + 1);

    });

    // Quantity Decrease
    $(".minus").click(function () {

        let qty = $(".qty-input");

        if (parseInt(qty.val()) > 1) {

            qty.val(parseInt(qty.val()) - 1);

        }

    });

    // Add to Cart
   $(".addToCart").click(function () {

    let button = $(this);

    if (button.prop("disabled")) {
        return;
    }

    button.prop("disabled", true);

    $.ajax({

        url: cartAddUrl,
        type: "POST",

        data: {
            _token: csrfToken,
            product_id: button.data("id"),
            quantity: $(".qty-input").val()
        },

        success: function (res) {

            toastr.success(res.message);

            loadCartCount();
             $("#cartItems").text(res.items);
    $("#cartTotal").text(res.total);
    loadFloatingCart();

    $("#floatingCart").fadeIn();

            button.html('<i class="fas fa-check"></i> Added');

            setTimeout(function () {

                button
                    .html('🛒 Add to Cart')
                    .prop("disabled", false);

            }, 2000);

        },

        error: function () {

            button.prop("disabled", false);

        }

    });

});

    function loadCartCount() {

        $.get(cartCountUrl, function (data) {

            $(".cart-count").text(data);

        });

    }

    loadCartCount();

});

function loadFloatingCart() {

    $.get(cartSummaryUrl, function (res) {

        $("#cartItems").text(res.items);
        $("#cartTotal").text(res.total);

        if (res.items > 0) {

            $("#floatingCart")
                .css("display", "flex")
                .hide()
                .fadeIn();

        } else {

            $("#floatingCart").hide();

        }

    });

}