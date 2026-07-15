

$(document).ready(function () {

    /*
    |--------------------------------------------------------------------------
    | Increase Quantity
    |--------------------------------------------------------------------------
    */

    $(document).on("click", ".increaseQty", function () {

        let card = $(this).closest(".cart-card");

        let input = card.find(".qty-input");

        input.val(parseInt(input.val()) + 1);

        updateCart(card);

    });


    /*
    |--------------------------------------------------------------------------
    | Decrease Quantity
    |--------------------------------------------------------------------------
    */

    $(document).on("click", ".decreaseQty", function () {

        let card = $(this).closest(".cart-card");

        let input = card.find(".qty-input");

        let qty = parseInt(input.val());

        if (qty > 1) {

            input.val(qty - 1);

            updateCart(card);

        }

    });


    /*
    |--------------------------------------------------------------------------
    | Remove Item
    |--------------------------------------------------------------------------
    */

    $(document).on("click", ".btn-remove", function () {

    let button = $(this);

    $.ajax({

        url: button.data("url"),

        type: "POST",

        data: {

            _token: csrfToken,

            _method: "DELETE"

        },

        beforeSend: function () {

            button.prop("disabled", true);

        },

        success: function (res) {

    if (!res.status) return;

    button.closest(".cart-card").fadeOut(300, function () {

        $(this).remove();

    });

    $("#subTotal").text(
        "₹" + Number(res.grand).toLocaleString("en-IN")
    );

    $("#grandTotal").text(
        "₹" + Number(res.grand).toLocaleString("en-IN")
    );

    $(".cart-count").text(res.count);

    toastr.success("Item removed successfully");

    if (res.count == 0) {

        location.reload();

    }

},

       error: function (xhr) {

    // console.log(xhr);

    // console.log(xhr.responseText);

    toastr.error("Unable to remove item.");

}

    });

});

});


/*
|--------------------------------------------------------------------------
| Update Quantity
|--------------------------------------------------------------------------
*/

function updateCart(card) {

    let qty = parseInt(card.find(".qty-input").val());

    let cartId = card.find(".qty-input").data("id");

    $.ajax({

        url: cartRoutes.update,

        type: "POST",

        data: {

            _token: csrfToken,

            cart_id: cartId,

            quantity: qty

        },

        success: function (res) {

            if (!res.status) return;

            card.find(".item-total").text(
                "₹" + Number(res.itemTotal).toLocaleString("en-IN")
            );

            $("#subTotal").text(
                "₹" + Number(res.grand).toLocaleString("en-IN")
            );

            $("#grandTotal").text(
                "₹" + Number(res.grand).toLocaleString("en-IN")
            );

            $(".cart-count").text(res.count);

        },

        error: function (xhr) {

            console.log(xhr.responseText);

        }

    });

}