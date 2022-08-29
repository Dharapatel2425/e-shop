@extends('layouts.front')

@section('title')    
My Order
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('/')}}">
                Home
            </a>/
            <a href="{{url('/my-order')}}">
                My Order
            </a>            
        </h6>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>My Orders</h4>
                </div>
                <div class="card-body">
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order Date</th>
                        <th>Tracking Number</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($order->count() > 0)
                    @foreach($order as $item)
                    <tr>
                        <td>{{date('d-m-y',strtotime('$item->created_at')) }}</td>
                        <td>{{$item->tracking_no}}</td>
                        <td>{{$item->total_price}}</td>
                        <td>{{$item->status == '0' ? 'pending' : 'completed'}}</td>
                        <td>
                            <a href="{{url('view-order/'.$item->id)}}" class="btn btn-primary">View</a>
                        </td>

                    </tr>
                    @endforeach
                    @else
                    <tr><td colspan="4" class="text-center">You did not order Anything</td></tr>
                    @endif
                </tbody>
            </table>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection    