@extends('layouts.app')

@section('content')
<div class="container">
       
    <div class="card col-md-6 offset-md-3">
        <div class="card-body">
            <h5 class="card-title text-center">Payment</h5>
            <form action="#" method="" id="checkout-form">
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" name="name" value="{{$user->name}}" class="form-control" id="" required>
                </div>

                <div class="form-group">
                    <label for="Adress">Address</label>
                    <input type="text" name="address" value="{{$user->email}}" class="form-control" id="" required>
                </div>


                <div class="form-group">
                    <label for="Adress">Contact</label>
                    <input type="text" name="contact" value="" class="form-control" id="" required>
                </div>


                <div class="form-group">
                    <label for="credit card name">credit card name</label>
                    <input type="text" name="credit card name" placeholder="please enter your credit card name"
                        class="form-control" id="" required>
                </div>


                <div class="form-group">
                    <label for="credit card number">credit card number</label>
                    <input type="number" name="credit card number" placeholder="please enter your credit card number"
                        class="form-control" id="card-number" required>
                </div>

                <div class="row">
                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for=" expiration month">expiration month</label>
                            <input type="number" name=" expiration month"
                                placeholder="please enter your credit card expiration month" class="form-control" id="card-expiry-month" required>
                        </div>

                    </div>

                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for=" expiration year">expiration year</label>
                            <input type="number" name=" expiration year"
                                placeholder="please enter your credit card expiration year" class="form-control" id="card-expiry-year" required>
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <label for=" CVC">CVC</label>
                    <input type="number" name=" expiration year" placeholder="please enter your credit card CVC"
                        class="form-control" id="card-cvc" required>
                </div>

                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary">Checkout $ {{$user->cart->totalPrice}}</button>
                </div>
            </form>
        </div>
    </div>
                  
</div>
@endsection