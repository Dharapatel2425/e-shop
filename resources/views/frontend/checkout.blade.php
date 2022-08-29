@extends('layouts.front')

@section('title')    
checkout
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('/')}}">
                Home
            </a>/
            <a href="{{url('/checkout')}}">
                Checkout
            </a>            
        </h6>
    </div>
</div>
<div class="container mt-5">
    <form action="{{url('place-order')}}" method="POST">
        {{csrf_field()}}
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h6>Basic Details</h6>
                    <hr>
                    <div class="row checkout-form">
                        <div class="col-md-6">
                            <label for="">First Name</label>
                            <input type="text" class="form-control fname" value="{{Auth::user()->name}}" name="fname" placeholder="Enter First Name">
                            <span id="fname_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control lname" value="{{Auth::user()->lname}}"  name="lname" placeholder="Enter Last Name">
                            <span id="lname_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Email</label>
                            <input type="text" class="form-control email" value="{{Auth::user()->email}}"  name="email" placeholder="Enter Email">
                            <span id="email_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Phone Number</label>
                            <input type="text" class="form-control phone" value="{{Auth::user()->phone}}"  name="phone" placeholder="Enter Phone Number">
                            <span id="phone_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Address 1</label>
                            <input type="text" class="form-control address1"  value="{{Auth::user()->address1}}" name="address1" placeholder="Enter Address 1">
                            <span id="address1_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Address 2</label>
                            <input type="text" class="form-control address2" value="{{Auth::user()->address2}}"  name="address2" placeholder="Enter Address 2">
                            <span id="address2_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">City</label>
                            <input type="text" class="form-control city" value="{{Auth::user()->city}}"  name="city" placeholder="Enter City">
                            <span id="city_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">State</label>
                            <input type="text" class="form-control state"  value="{{Auth::user()->state}}" name="state" placeholder="Enter State">
                            <span id="state_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Country</label>
                            <input type="text" class="form-control country" value="{{Auth::user()->country}}"  name="country" placeholder="Enter Country">
                            <span id="country_error" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Pin Code</label>
                            <input type="text" class="form-control pincode" value="{{Auth::user()->pincode}}"  name="pincode" placeholder="Enter Pin Code">
                            <span id="pincode_error" class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h6>Order-Details</h6>
                    <hr>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Qty</td>
                                <td>Price</td>
                            </tr>
                        </thead>
                        <tbody>
                        @php $total = 0; @endphp                  
                        @if($cart->count() > 0)   
                        @foreach($cart as $item)
                       
                            <tr>
                                <td>{{$item->product->name}}</td>
                                <td>{{$item->prod_qty}}</td>
                                <td>{{$item->product->selling_price}}</td>
                            </tr>
                            @php $total += $item->product->selling_price * $item->prod_qty; @endphp
                            
                        @endforeach
                        @else
                            <tr><td colspan="3" class="text-center">No Products in cart</td></tr>
                        @endif
                        
                        </tbody>
                    </table>
                    <h6 class="px-2">Grand Total: <span class="float-end">Rs {{$total}}</span></h6>
                    <hr>
                    <input type="hidden" name="payment_mode" value="COD">
                    <button type="submit" class="btn btn-success w-100">Place Order | COD </button><br>
                    <button type="button"  class="btn btn-primary mt-3 mb-3 razorpay_btn w-100">Pay with razorpay </button>
                    <div id="paypal-button-container"></div>
                </div>
            </div>
        </div>
    </div>
    </form>
    
</div>
@endsection

@section('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://www.paypal.com/sdk/js?client-id=Ab5BUVThLcy6bukNhi6MOtDKZKZkKPLHMs9s1_Q8HZZR1ymvoccQ4v41wPN4x72tD1FbfRKYt1Cn2Ysj"></script>
<script>
      paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '{{$total}}' // Can also reference a variable or function
              }
            }]
          });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(orderData) {           
        
            var fname = $('.fname').val();
            var lname = $('.lname').val();
            var email = $('.email').val();
            var phone = $('.phone').val();
            var address1 = $('.address1').val();
            var address2 = $('.address2').val();
            var city = $('.city').val();
            var state = $('.state').val();
            var country = $('.country').val();
            var pincode = $('.pincode').val();  
            $.ajax({
                        type: "POST",
                        url: "/place-order",
                        data: {
                            'fname' : fname,
                            'lname' : lname,
                            'email': email,
                            'phone' : phone,
                            'address1': address1,
                            'address2': address2,
                            'city': city,
                            'state': state,
                            'country': country,
                            'pincode': pincode,        
                            'payment_mode': 'Paid by Paypal',
                            'payment_id': orderData.id,  
                        },
                        success: function (responseb) {       
                            swal(responseb.status)
                            .then((value) => {
                                window.location.href = '/my-order';
                            });                     
                            
                        }
                    });
          });
        }
      }).render('#paypal-button-container');
    </script>
@endsection
