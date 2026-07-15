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

    // Add To Cart Button
    $(".addToCart").click(function () {

        let product = {
            product_id: $(this).data("id"),
            quantity: $(".qty-input").val()
        };

        // Guest User
        // Guest User
if (!isAuthenticated) {

    // Save the current product
    sessionStorage.setItem("pending_cart", JSON.stringify({
        product_id: product.product_id,
        quantity: product.quantity
    }));

    // Save the current page URL
    sessionStorage.setItem(
        "redirect_after_login",
        window.location.href
    );

    // Redirect to Login
    window.location.href = loginUrl;

    return;
}

        addToCart(product);

    });

    // Auto Add After Login
    let pendingCart = sessionStorage.getItem("pending_cart");

    if (pendingCart && isAuthenticated) {

        addToCart(JSON.parse(pendingCart));

        sessionStorage.removeItem("pending_cart");

    }

    loadCartCount();

});


// ------------------------------
// Add To Cart Function
// ------------------------------

function addToCart(product)
{

    let button = $(".addToCart");

    button.prop("disabled", true);

    $.ajax({

        url: cartAddUrl,

        type: "POST",

        data: {

            _token: csrfToken,

            product_id: product.product_id,

            quantity: product.quantity

        },

        success: function (res) {

            toastr.success(res.message);

            loadCartCount();

            loadFloatingCart();

            $("#cartItems").text(res.items);

            $("#cartTotal").text(res.total);

            $("#floatingCart").fadeIn();

            button.html('<i class="fas fa-check"></i> Added');

            setTimeout(function () {

                button
                    .html("🛒 Add to Cart")
                    .prop("disabled", false);

            }, 2000);

        },

        error: function () {

            if (xhr.status === 401) {

    $.ajax({

        url: storePendingCartUrl,

        type: "POST",

        data: {

            _token: csrfToken,

            product_id: button.data("id"),

            quantity: $(".qty-input").val(),
             url: window.location.href

        },

        success: function () {

            window.location.href = loginUrl;

        }

    });

    return;
}

        }

    });

}


// ------------------------------
// Cart Count
// ------------------------------

function loadCartCount()
{

    $.get(cartCountUrl, function (count) {

        $(".cart-count").text(count);

    });

}


// ------------------------------
// Floating Cart
// ------------------------------

function loadFloatingCart()
{

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