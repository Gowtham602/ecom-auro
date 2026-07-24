@extends('layouts.frontend')

@section('title','Order Details')

@push('styles')
<style>

.order-card{
    border-radius:15px;
    overflow:hidden;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
}

.order-header{
    background:#0d6efd;
    color:#fff;
    padding:18px;
}

.order-header h4{
    margin:0;
    font-size:28px;
    font-weight:700;
}

.order-info strong{
    display:block;
    color:#555;
}

.product-card{
    border:1px solid #eee;
    border-radius:15px;
    padding:15px;
    margin-bottom:15px;
}

.product-img{
    width:100px;
    height:100px;
    object-fit:cover;
    border-radius:10px;
}

.summary-table td{
    padding:10px 0;
}

@media(max-width:768px){

.order-header{
    padding:15px;
}

.order-header h4{
    font-size:17px;
}

.product-card{
    padding:12px;
}

.product-img{
    width:80px;
    height:80px;
}

.mobile-center{
    text-align:center;
}

.mobile-right{
    text-align:left !important;
    margin-top:10px;
}

}

</style>
@endpush

@section('content')

<div class="container py-4">

    <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary mb-3">
        <i class="fas fa-arrow-left"></i>
        Back to Orders
    </a>

    <div class="order-card">

        {{-- Header --}}
        <div class="order-header d-flex justify-content-between align-items-center">

            <div>

                <h4>
                    Order #{{ $order->order_no }}
                </h4>

            </div>

            <span class="badge bg-light text-dark">

                {{ ucfirst($order->order_status) }}

            </span>

        </div>

        <div class="card-body p-4">

            {{-- Order Info --}}
            <div class="row g-3 order-info mb-4">

                <div class="col-md-4">

                    <strong>Order Date</strong>

                    {{ $order->created_at->format('d M Y h:i A') }}

                </div>

                <div class="col-md-4">

                    <strong>Payment</strong>

                    @if($order->payment_status=='paid')

                        <span class="badge bg-success">

                            Paid

                        </span>

                    @else

                        <span class="badge bg-danger">

                            Pending

                        </span>

                    @endif

                </div>

                <div class="col-md-4">

                    <strong>Total</strong>

                    ₹{{ number_format($order->total,2) }}

                </div>

            </div>

            <hr>

            <h5 class="mb-4">

                Ordered Products

            </h5>

            @foreach($order->items as $item)

            <div class="product-card">

                <div class="row align-items-center">

                    <div class="col-4 col-md-2 text-center">

                        <img
    src="{{ asset('uploads/products/'.$item->product->thumbnail) }}"
    class="product-img"
    alt="{{ $item->product->product_name }}">

                    </div>

                    <div class="col-8 col-md-5">

                        <h6 class="fw-bold mb-1">

                            {{ $item->product->product_name }}

                        </h6>

                        <small class="text-muted">

                            SKU :
                            {{ $item->product->sku }}

                        </small>

                    </div>

                    <div class="col-6 col-md-2 mt-3 mt-md-0 mobile-center">

                        <small>Qty</small>

                        <h6>

                            {{ $item->quantity }}

                        </h6>

                    </div>

                    <div class="col-6 col-md-3 mt-3 mt-md-0 text-end mobile-right">

                        <small>

                            ₹{{ number_format($item->price,2) }}

                        </small>

                        <h5 class="text-primary mb-0">

                            ₹{{ number_format($item->total,2) }}

                        </h5>

                    </div>

                </div>

            </div>

            @endforeach

            <hr>

            <div class="row mt-4">

                {{-- Address --}}
                <div class="col-md-6 mb-4">

                    <div class="card shadow-sm border-0">

                        <div class="card-header bg-light fw-bold">

                            Delivery Address

                        </div>

                        <div class="card-body">

                            {{ $order->address }}

                            <br><br>

                            <strong>

                                Phone :

                            </strong>

                            {{ $order->phone }}

                        </div>

                    </div>

                </div>

                {{-- Summary --}}
                <div class="col-md-6">

                    <div class="card shadow-sm border-0">

                        <div class="card-header bg-light fw-bold">

                            Order Summary

                        </div>

                        <div class="card-body">

                            <table class="table table-borderless summary-table">

                                <tr>

                                    <td>

                                        Subtotal

                                    </td>

                                    <td class="text-end">

                                        ₹{{ number_format($order->subtotal,2) }}

                                    </td>

                                </tr>

                                <tr>

                                    <td>

                                        Delivery

                                    </td>

                                    <td class="text-success text-end">

                                        FREE

                                    </td>

                                </tr>

                                <tr class="fw-bold fs-5">

                                    <td>

                                        Total

                                    </td>

                                    <td class="text-end text-primary">

                                        ₹{{ number_format($order->total,2) }}

                                    </td>

                                </tr>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection