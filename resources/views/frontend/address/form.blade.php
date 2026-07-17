<div class="row g-3">

    {{-- Full Name --}}
    <div class="col-md-6">
        <label class="form-label fw-semibold">
            Full Name <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            id="full_name"
            name="full_name"
            class="form-control @error('full_name') is-invalid @enderror"
            placeholder="Enter Full Name"
            autocomplete="name"
            value="{{ old('full_name', $address->full_name ?? auth()->user()->name) }}">

        @error('full_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Phone --}}
    <div class="col-md-6">
        <label class="form-label fw-semibold">
            Mobile Number <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            id="phone"
            name="phone"
            maxlength="10"
            class="form-control @error('phone') is-invalid @enderror"
            placeholder="10 Digit Mobile Number"
            autocomplete="tel"
            value="{{ old('phone', $address->phone ?? auth()->user()->phone) }}">

        @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Email --}}
    <div class="col-md-12">
        <label class="form-label fw-semibold">
            Email Address
        </label>

        <input
            type="email"
            id="email"
            name="email"
            class="form-control @error('email') is-invalid @enderror"
            placeholder="Enter Email Address"
            autocomplete="email"
            value="{{ old('email', $address->email ?? auth()->user()->email) }}">

        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- House No --}}
    <div class="col-md-6">
        <label class="form-label fw-semibold">
            House / Flat No <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            id="house_no"
            name="house_no"
            class="form-control @error('house_no') is-invalid @enderror"
            placeholder="House / Flat No"
            value="{{ old('house_no', $address->house_no ?? '') }}">

        @error('house_no')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Street --}}
    <div class="col-md-6">
        <label class="form-label fw-semibold">
            Street <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            id="street"
            name="street"
            class="form-control @error('street') is-invalid @enderror"
            placeholder="Street Name"
            value="{{ old('street', $address->street ?? '') }}">

        @error('street')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Area --}}
    <div class="col-md-12">
        <label class="form-label fw-semibold">
            Area / Locality <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            id="area"
            name="area"
            class="form-control @error('area') is-invalid @enderror"
            placeholder="Area / Locality"
            value="{{ old('area', $address->area ?? '') }}">

        @error('area')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- City --}}
    <div class="col-md-4">
        <label class="form-label fw-semibold">
            City <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            id="city"
            name="city"
            class="form-control @error('city') is-invalid @enderror"
            placeholder="City"
            value="{{ old('city', $address->city ?? '') }}">

        @error('city')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- State --}}
    <div class="col-md-4">
        <label class="form-label fw-semibold">
            State <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            id="state"
            name="state"
            class="form-control @error('state') is-invalid @enderror"
            placeholder="State"
            value="{{ old('state', $address->state ?? '') }}">

        @error('state')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Pincode --}}
    <div class="col-md-4">
        <label class="form-label fw-semibold">
            Pincode <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            id="pincode"
            name="pincode"
            maxlength="6"
            class="form-control @error('pincode') is-invalid @enderror"
            placeholder="Pincode"
            value="{{ old('pincode', $address->pincode ?? '') }}">

        @error('pincode')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Country --}}
    <div class="col-md-6">
        <label class="form-label fw-semibold">
            Country
        </label>

        <input
            type="text"
            id="country"
            name="country"
            class="form-control"
            value="India"
            readonly>
    </div>

    {{-- Landmark --}}
    <div class="col-md-6">
        <label class="form-label fw-semibold">
            Landmark
        </label>

        <input
            type="text"
            id="landmark"
            name="landmark"
            class="form-control"
            placeholder="Nearby Landmark"
            value="{{ old('landmark', $address->landmark ?? '') }}">
    </div>

    {{-- Address Type --}}
    <div class="col-md-6">

        <label class="form-label fw-semibold">
            Address Type
        </label>

        <div class="d-flex gap-4 mt-2">

            <div class="form-check">

                <input
                    class="form-check-input"
                    type="radio"
                    id="home"
                    name="type"
                    value="Home"
                    {{ old('type', $address->type ?? 'Home') == 'Home' ? 'checked' : '' }}>

                <label class="form-check-label" for="home">

                    🏠 Home

                </label>

            </div>

            <div class="form-check">

                <input
                    class="form-check-input"
                    type="radio"
                    id="office"
                    name="type"
                    value="Office"
                    {{ old('type', $address->type ?? '') == 'Office' ? 'checked' : '' }}>

                <label class="form-check-label" for="office">

                    🏢 Office

                </label>

            </div>

        </div>

    </div>

    {{-- Default --}}
    <div class="col-md-6 d-flex align-items-end">

        <div class="form-check">

            <input
                class="form-check-input"
                type="checkbox"
                id="is_default"
                name="is_default"
                value="1"
                {{ old('is_default', $address->is_default ?? false) ? 'checked' : '' }}>

            <label
                class="form-check-label fw-semibold"
                for="is_default">

                Make this my default address

            </label>

        </div>

    </div>

</div>