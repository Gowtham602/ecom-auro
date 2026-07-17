$("#placeOrderBtn").click(function () {

    let address = $("input[name='address_id']:checked").val();

    if (!address) {
        toastr.error("Please select a delivery address.");
        return;
    }

    $.ajax({

        url: window.appConfig.placeOrderUrl,

        type: "POST",

        data: {

            _token: $('meta[name="csrf-token"]').attr('content'),

            address_id: address

        },

        success: function (response) {

            console.log(response);

            // Open Razorpay here

        },

        error: function (xhr) {

            toastr.error("Something went wrong.");

        }

    });

});