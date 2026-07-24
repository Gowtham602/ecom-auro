@extends('layouts.frontend')

@section('title','My Orders')

@push('styles')
<style>
.order-card{
    border:none;
    border-radius:18px;
    overflow:hidden;
    transition:.3s;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
}

.order-card:hover{
    transform:translateY(-3px);
    box-shadow:0 10px 30px rgba(0,0,0,.12);
}

.order-header{
    background:linear-gradient(90deg,#4b136e,#7b1fa2);
    color:#fff;
    padding:15px 20px;
}

.order-header h5{
    margin:0;
    font-weight:700;
}

.order-body{
    padding:20px;
}

.order-info i{
    width:22px;
    color:#6c757d;
}

.order-total{
    color:#4b136e;
    font-size:20px;
    font-weight:700;
}

.badge-status{
    padding:8px 18px;
    border-radius:50px;
    font-size:13px;
    font-weight:600;
}

.badge-processing{
    background:#0d6efd;
}

.badge-pending{
    background:#ffc107;
    color:#000;
}

.badge-shipped{
    background:#0dcaf0;
}

.badge-delivered{
    background:#198754;
}

.badge-cancelled{
    background:#dc3545;
}

.badge-paid{
    background:#198754;
}

.badge-failed{
    background:#dc3545;
}

.btn-view{
    background:#4b136e;
    color:#fff;
    border-radius:50px;
    padding:10px 28px;
    font-weight:600;
}

.btn-view:hover{
    background:#651a96;
    color:#fff;
}

@media(max-width:767px){

.order-header{
    text-align:center;
}

.order-total{
    font-size:18px;
}

.status-area{
    margin-top:20px;
}

.btn-view{
    width:100%;
    margin-top:15px;
}

}
</style>
@endpush

@section('content')

<div class="container py-4">

    <h3 class="fw-bold mb-4">
        <i class="fas fa-bag-shopping text-warning"></i>
        My Orders
    </h3>

    @forelse($orders as $order)

    <div class="card order-card mb-4">

        <div class="order-header d-flex justify-content-between align-items-center">

            <h5>{{ $order->order_no }}</h5>

            <small>
                {{ $order->created_at->format('d M Y') }}
            </small>

        </div>

        <div class="order-body">

            <div class="row align-items-center">

                <div class="col-lg-6">

                    <div class="order-info mb-2">
                        <i class="fas fa-calendar-alt"></i>
                        {{ $order->created_at->format('d M Y, h:i A') }}
                    </div>

                    <div class="order-info">
                        <i class="fas fa-wallet"></i>

                        <span class="order-total">
                            ₹{{ number_format($order->total,2) }}
                        </span>
                    </div>

                </div>

                <div class="col-lg-3 status-area">

                    <div class="mb-3">

                        <span class="badge badge-status

                        @if($order->order_status=='pending')
                            badge-pending
                        @elseif($order->order_status=='processing')
                            badge-processing
                        @elseif($order->order_status=='shipped')
                            badge-shipped
                        @elseif($order->order_status=='delivered')
                            badge-delivered
                        @else
                            badge-cancelled
                        @endif">

                            {{ ucfirst($order->order_status) }}

                        </span>

                    </div>

                    <div>

                        <span class="badge badge-status
                        {{ $order->payment_status=='paid'
                        ? 'badge-paid'
                        : 'badge-failed' }}">

                            {{ ucfirst($order->payment_status) }}

                        </span>

                    </div>

                </div>

                <div class="col-lg-3 text-lg-end">

                    <a href="{{ route('orders.show',$order) }}"
                       class="btn btn-view">

                        <i class="fas fa-eye me-2"></i>

                        View Details

                    </a>

                </div>

            </div>

        </div>

    </div>

    @empty

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body text-center py-5">

            <img src="{{ asset('assets/images/empty-order.png') }}"
                 width="180"
                 class="mb-4">

            <h4>No Orders Found</h4>

            <p class="text-muted">
                You haven't placed any orders yet.
            </p>

            <a href="{{ route('home') }}"
               class="btn btn-warning rounded-pill px-4">

                Continue Shopping

            </a>

        </div>

    </div>

    @endforelse

    <div class="mt-4">

        {{ $orders->links() }}

    </div>

</div>

@endsection