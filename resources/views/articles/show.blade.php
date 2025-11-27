@extends("layouts.app")

@section("content")
<div class="container my-5 text-dark">

    {{-- Billing & Shipping Info --}}
    <div class="row mb-5">
        {{-- Billing Info --}}
        <div class="col-12 col-md-6 mb-4">
            <h3><strong>Billing Information</strong></h3>
            <div class="mt-3">
                <div class="mb-3">
                    <h5>Name</h5>
                    <p>{{ $receipt->first_name." ".$receipt->last_name }}</p>
                </div>
                <div class="mb-3">
                    <h5>Address</h5>
                    <p>{{ $receipt->address }}</p>
                </div>
                 <div class="mb-3">
                    <h5>City</h5>
                    <p>{{ $receipt->city }}</p>
                </div>
                <div class="mb-3">
                    <h5>Phone Number</h5>
                    <p>{{ $receipt->phone }}</p>
                </div>
                <div class="mb-3">
                    <h5>Email</h5>
                    <p>{{ $receipt->email }}</p>
                </div>
            </div>
        </div>

        {{-- Shipping Info --}}
        <div class="col-12 col-md-6">
            <h3><strong>Shipping Information</strong></h3>
            <div class="mt-3">
                <div class="mb-3">
                    <h5>Name</h5>
                    <p>{{$receipt->first_name." ".$receipt->last_name  }}</p>
                </div>
                <div class="mb-3">
                    <h5>Address</h5>
                    <p>{{ $receipt->address }}</p>
                </div>
                 <div class="mb-3">
                    <h5>City</h5>
                    <p>{{ $receipt->city }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Divider --}}
    <hr class="my-4 border-dark">

    {{-- Order Items --}}
    <div class="row justify-content-center text-center">
        <div class="col-12 col-lg-10">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Rate</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($receipt->items as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->price) }}</td>
                            <td>{{ number_format($item->quantity * $item->price) }} Ks</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Grand Total --}}
    <div class="row justify-content-end mt-4">
        <div class="col-auto">
            <h4><strong>Total : </strong> MMK {{ number_format($receipt->total) }}</h4>
        </div>
    </div>

</div>
@endsection
