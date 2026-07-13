$(document).on("click", ".category-card", function () {

    let id = $(this).data("id");

    $(".category-card").removeClass("active-category");

    $(this).addClass("active-category");

    $.ajax({

        url: "/category-products/" + id,

        type: "GET",

        success: function (response) {

            $("#product-list").html(response);

        },

        error: function (xhr) {

            console.log(xhr.responseText);

        }

    });

});