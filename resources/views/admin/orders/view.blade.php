@extends('layouts.admin')

@section('title')
Orders
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white bg-primary">
                <h4>Order View
                    <a href="{{url('orders')}}" class="btn btn-warning float-right">Back</a>
                </h4>                             
                </div>
                <div class="card-body">
                    <div class="row ">
                        <div class="col-md-6 order-details">
                            <h4>Shipping Details</h4>
                            <hr>
                            <label for="">First Name</label>
                            <div class="border">{{$order->fname}}</div>
                            <label for="">Last Name</label>
                            <div class="border">{{$order->lname}}</div>
                            <label for="">Email</label>
                            <div class="border">{{$order->email}}</div>
                            <label for="">Phone Number</label>
                            <div class="border">{{$order->phone}}</div>
                            <label for="">Shipping Address</label>
                            <div class="border">
                                {{$order->address1}},<br>
                                {{$order->address2}},<br>
                                {{$order->city}},<br>
                                {{$order->state}},
                                {{$order->country}}
                            </div>
                            <label for="">Zip Code</label>
                            <div class="border">{{$order->pincode}}</div>

                        </div>
                        <div class="col-md-6">
                        <h4>Order Details</h4>
                        <hr>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->orderitems as $item)
                                    <tr>
                                        <td>{{$item->product->name}}</td>
                                        <td>{{$item->qty}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>
                                            <img src="{{asset('assets/uploads/product/'.$item->product->image)}}" width="50px" height="50px" alt="" />
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h4 class="px-2">Grand Total: <span class="float-end">{{$order->total_price}}</span></h4>
                            <h6 class="px-2">Payment Mode: {{$order->payment_mode}}</h6>
                            <div class="mt-3 px-2">
                            <label>Order Status</label>
                                <form action="{{url('update-order/'.$order->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                <select class="form-select" name="order_status">
                                    <option {{$order->status=='0' ? 'selected' : ''}} value="0">pending</option>
                                    <option {{$order->status=='1' ? 'selected' : ''}} value="1">completed</option>
                                </select>
                                <button type="submit" class="btn btn-primary mt-3">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
