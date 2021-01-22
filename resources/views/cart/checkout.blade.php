@extends('layouts.navbar')

@section('content')
<style>
    body{
        background-color: rgb(197, 196, 196);
    }
</style>
<body>
    <div class="container">
        <h2>Checkout</h2>
        <h3>Shipping Information</h3>
        <form action="{{route('orders.store')}}" method="post" class="row g-3">
            @csrf
            <div class="col-12">
                <label for="">Full Name</label>
                <input type="text" name="shipping_fullname" id="" class="form-control" required>
            </div>

            <div class="col-12">
                <label for="">Full Address</label>
                <input type="text" name="shipping_address" id="" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label for="">State</label>
                <input type="text" name="shipping_state" id="" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label for="">City</label>
                <input type="text" name="shipping_city" id="" class="form-control" required>
            </div>

            <div class="col-md-2">
                <label for="">Zip Code</label>
                <input type="text" name="shipping_zipcode" id="" class="form-control" required>
            </div>

            <div class="col-md-4">
                <label for="">Phone Number</label>
                <input type="text" name="shipping_phone" id="" class="form-control" required>
            </div>

            <div class="col-12">
                <hr>
                <h4>Payment option</h4>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="payment_method" id="" value="cash_on_delivery" required>
                        Cash on delivery
                    </label>
                </div>

                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="payment_method" id="" value="paypal" required>
                        Paypal
                    </label>
                </div>

                <button type="submit" class="btn btn-outline-dark mt-2">Place Order</button>
            </div>
        </form>
    </div>
</body>
@endsection
