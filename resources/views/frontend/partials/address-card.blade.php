<div class="card shadow-sm border-0 rounded-4 mb-4">

   <div class="card-header bg-white border-0 py-3 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2">

        <h5 class="mb-0 fw-bold">
            <i class="fas fa-map-marker-alt text-warning me-2"></i>
            Delivery Address
        </h5>

        <button class="btn btn-warning btn-sm rounded-pill"
                data-bs-toggle="modal"
                data-bs-target="#addressModal">
            <i class="fas fa-plus me-1"></i>
            Add Address
        </button>

    </div>

    <div class="card-body">
@forelse($addresses as $address)

<div class="card border mb-3 shadow-sm">
    <div class="card-body">

        <div class="row align-items-start">

            <!-- Left -->
            <div class="col-10">

                <div class="form-check">

                    <input class="form-check-input"
                           type="radio"
                           name="address_id"
                           value="{{ $address->id }}"
                           {{ $address->is_default ? 'checked' : '' }}>

                    <label class="form-check-label w-100">

                        <div class="d-flex align-items-center flex-wrap mb-2">

                            <h6 class="fw-bold mb-0 me-2">
                                {{ $address->full_name }}
                            </h6>

                            @if($address->is_default)
                                <span class="badge bg-success">
                                    Default
                                </span>
                            @endif

                        </div>

                        <p class="mb-1 text-muted">
                            {{ $address->house_no }},
                            {{ $address->street }},
                            {{ $address->area }}
                        </p>

                        <p class="mb-1 text-muted">
                            {{ $address->city }},
                            {{ $address->state }}
                            -
                            {{ $address->pincode }}
                        </p>

                        <p class="mb-0">
                            <i class="fas fa-phone text-primary me-1"></i>
                            {{ $address->phone }}
                        </p>

                    </label>

                </div>

            </div>

            <!-- Right -->
            <div class="col-2 text-end">

                <a href="{{ route('address.edit',$address->id) }}"
                   class="text-primary d-block mb-2">

                    <i class="fas fa-pen-to-square"></i>

                </a>

                <a href="#"
                   class="text-danger">

                    <i class="fas fa-trash-can"></i>

                </a>

            </div>

        </div>

    </div>
</div>

@empty

        <div class="text-center py-5">

            <i class="fas fa-map-marker-alt text-warning display-3"></i>

            <h5 class="mt-3">

                No Delivery Address

            </h5>

            <p class="text-muted">

                Add your delivery address to continue checkout.

            </p>

            <button class="btn btn-warning rounded-pill px-4"
                    data-bs-toggle="modal"
                    data-bs-target="#addressModal">

                <i class="fas fa-plus me-2"></i>

                Add New Address

            </button>

        </div>

        @endforelse

    </div>

</div>