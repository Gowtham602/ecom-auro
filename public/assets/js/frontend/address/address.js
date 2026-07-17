$(document).ready(function () {

    $("#addressForm").validate({

        onkeyup: function(element) {
            $(element).valid();
        },

        onfocusout: function(element) {
            $(element).valid();
        },

        rules: {

            full_name: {
                required: true,
                minlength: 3
            },

            phone: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10
            },

            email: {
                required: true,
                email: true
            },

            house_no: {
                required: true
            },

            street: {
                required: true
            },

            area: {
                required: true
            },

            city: {
                required: true
            },

            state: {
                required: true
            },

            pincode: {
                required: true,
                digits: true,
                minlength: 6,
                maxlength: 6
            }

        },

        messages: {

            full_name: {
                required: "Please enter full name",
                minlength: "Minimum 3 characters"
            },

            phone: {
                required: "Please enter mobile number",
                digits: "Only numbers allowed",
                minlength: "Mobile number must be 10 digits",
                maxlength: "Mobile number must be 10 digits"
            },

            email: {
                required: "Please enter email",
                email: "Please enter a valid email"
            },

            house_no: {
                required: "Please enter house number"
            },

            street: {
                required: "Please enter street"
            },

            area: {
                required: "Please enter area"
            },

            city: {
                required: "Please enter city"
            },

            state: {
                required: "Please enter state"
            },

            pincode: {
                required: "Please enter pincode",
                digits: "Only numbers allowed",
                minlength: "Pincode must be 6 digits",
                maxlength: "Pincode must be 6 digits"
            }

        },

        errorElement: "small",

        errorClass: "text-danger",

        highlight: function(element) {

            $(element)
                .addClass("is-invalid")
                .removeClass("is-valid");

        },

        unhighlight: function(element) {

            $(element)
                .removeClass("is-invalid")
                .addClass("is-valid");

        }

    });


    // Full Name
    $("#full_name").on("input", function () {

        this.value = this.value.replace(/[^a-zA-Z ]/g, "");

        $(this).valid();

    });


    // Phone
    $("#phone").on("input", function () {

        this.value = this.value.replace(/\D/g, "");

        if(this.value.length > 10){
            this.value = this.value.substring(0,10);
        }

        $(this).valid();

    });


    // Pincode
    $("#pincode").on("input", function () {

        this.value = this.value.replace(/\D/g, "");

        if(this.value.length > 6){
            this.value = this.value.substring(0,6);
        }

        $(this).valid();

    });

});