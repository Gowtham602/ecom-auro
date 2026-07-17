<div class="card shadow rounded-4 order-summary">

    <div class="card-body">

        <h5 class="fw-bold mb-3">
            PRICE DETAILS
        </h5>

        <hr>

        @foreach($carts as $cart)

        <div class="d-flex justify-content-between mb-2">

            <div class="pe-2">
                {{ $cart->product->product_name }}
                × {{ $cart->quantity }}
            </div>

            <strong>
                ₹{{ number_format($cart->product->price * $cart->quantity) }}
            </strong>

        </div>

        @endforeach

        <hr>

        <div class="d-flex justify-content-between mb-2">
            <span>Subtotal</span>
            <strong>₹{{ number_format($subtotal) }}</strong>
        </div>

        <div class="d-flex justify-content-between mb-2">
            <span>Delivery</span>
            <span class="text-success">FREE</span>
        </div>

        <hr>

        <div class="d-flex justify-content-between fs-5">
            <strong>Total</strong>
            <strong>₹{{ number_format($subtotal) }}</strong>
        </div>

        <button
            type="button"
            id="placeOrderBtn"
            class="btn btn-warning w-100 rounded-pill mt-4">

            <i class="fas fa-lock me-2"></i>

            PLACE ORDER

        </button>

    </div>

</div>
<style>
    .order-summary{
    position: sticky;
    top:100px;
}

@media (max-width:991px){

    .order-summary{
        position: static;
        margin-top:20px;
    }

    .card-header{
        flex-direction:column;
        align-items:flex-start !important;
    }

    .card-header button{
        width:100%;
        margin-top:10px;
    }

    .form-check-label h6{
        font-size:15px;
    }

    .form-check-label p{
        font-size:13px;
    }

    .order-summary .d-flex{
        font-size:14px;
    }

    .order-summary button{
        font-size:15px;
    }
}
</style>