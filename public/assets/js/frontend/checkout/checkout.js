$(document).ready(function () {

    $("#placeOrderBtn").on("click", function () {

        let addressId = $("input[name='address_id']:checked").val();

        if (!addressId) {
            toastr.error("Please select a delivery address.");
            return;
        }

        $("#placeOrderBtn")
            .prop("disabled", true)
            .text("Please Wait...");

        $.ajax({

            url: window.appConfig.placeOrderUrl,

            type: "POST",

            data: {

                _token: window.appConfig.csrfToken,

                address_id: addressId

            },

            success: function (response) {

                if (!response.status) {

                    toastr.error(response.message);

                    resetButton();

                    return;
                }

                openRazorpay(response);

            },

            error: function (xhr) {

                resetButton();

                if (xhr.responseJSON && xhr.responseJSON.message) {

                    toastr.error(xhr.responseJSON.message);

                } else {

                    toastr.error("Unable to place order.");

                }

            }

        });

    });

});


function openRazorpay(response)
{

    var options = {

        key: response.key,

        amount: response.amount,

        currency: response.currency,

        name: window.appConfig.appName,

        description: "Order Payment",

        order_id: response.razorpay_order_id,

        prefill: {

            name: response.name,

            email: response.email,

            contact: response.contact

        },

        handler: function (payment) {

            verifyPayment(response.order_id, payment);

        },

        modal: {

            ondismiss: function () {

                resetButton();

                toastr.warning("Payment cancelled.");

            }

        },

        theme: {

            color: "#ff9800"

        }

    };

    var rzp = new Razorpay(options);

    rzp.open();

}


function verifyPayment(orderId, payment)
{

    $.ajax({

        url: window.appConfig.verifyPaymentUrl,

        type: "POST",

        data: {

            _token: window.appConfig.csrfToken,

            order_id: orderId,

            razorpay_payment_id: payment.razorpay_payment_id,

            razorpay_order_id: payment.razorpay_order_id,

            razorpay_signature: payment.razorpay_signature

        },

        success: function (response) {

            if (response.status) {

                window.location.href = response.redirect;

            } else {

                toastr.error(response.message);

                resetButton();

            }

        },

        error: function () {

            toastr.error("Payment verification failed.");

            resetButton();

        }

    });

}


function resetButton()
{

    $("#placeOrderBtn")
        .prop("disabled", false)
        .html("PLACE ORDER");

}