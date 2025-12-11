@extends("layouts.app")

@section("content")
<div class="container my-5 text-dark">

    <h1 class="mb-5 text-center" style="font-size:40px">Checkout</h1>
    @if($errors->any())
    <div class="alert alert-warning">
        @foreach ($errors->all() as $error)
            <ol>
                {{$error}}
            </ol>
        @endforeach
    </div>
    @endif
    <form action="{{ url('/orders/checkout') }}" method="POST" class="row g-4">
        @csrf

        {{-- Left Column — Contact & Delivery Info --}}
        <div class="col-12 col-md-6">
            <h4 class="mb-3">Contact Information</h4>

            <div class="mb-3">
                <label for="contact" class="form-label">Email</label>
                <input type="email" id="contact" name="email" placeholder="Enter your email"
                    class="form-control" required>
            </div>

            <h4 class="mb-3">Delivery Information</h4>

            <div class="mb-3">
                <input type="text" name="first_name" placeholder="First name" class="form-control" required>
            </div>

            <div class="mb-3">
                <input type="text" name="last_name" placeholder="Last name" class="form-control">
            </div>

            <div class="mb-3">
                <textarea name="address" placeholder="Address" class="form-control" rows="2" required></textarea>
            </div>

            <div class="mb-3">
                <input type="text" name="city" placeholder="City" class="form-control" required>
            </div>

            <div class="mb-3">
                <input type="text" name="phone" placeholder="Phone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="payment" class="form-label">Payment Method</label>
                <select name="payment" id="payment" class="form-select">
                    <option value="wave">Wave Money</option>
                    <option value="kbz">KBZ</option>
                    <option value="aya">AYA</option>
                    <option value="cod">Cash on Delivery</option>
                </select>
            </div>
        </div>

        {{-- Right Column — Order Summary --}}
        <div class="col-12 col-md-6">
            <h4 class="mb-3">Order Summary</h4>

            @foreach ($items as $item)
                <div class="card d-flex flex-row align-items-center mb-3 p-2 shadow-sm">
                    <div class="position-relative me-3">
                        <img src="{{ asset('storage/products/' . $item->product->image) }}"
                             alt="{{ $item->product->name }}"
                             class="img-fluid rounded"
                             style="width: 80px; height: 80px; object-fit: cover;">
                        <span class="badge bg-danger text-white rounded-pill position-absolute top-0 start-100 translate-middle">
                            {{ $item->quantity }}
                        </span>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="mb-0">{{ $item->product->name }}</h6>
                    </div>
                    <div class="text-end fw-bold">
                        MMK {{ number_format($item->quantity * $item->product->price) }}
                    </div>
                </div>
            @endforeach

            <div class="d-flex justify-content-between align-items-center border-top pt-3">
                <h5 class="mb-0">Total</h5>
                <span class="fw-bold" style="font-size: 1.1rem;">
                    MMK {{ number_format($total) }}
                </span>
            </div>

            <div class="mt-4 text-center">
                <input type="submit" value="Purchase" class="btn btn-success w-100 py-2">
            </div>
        </div>

    </form>

</div>
@endsection
