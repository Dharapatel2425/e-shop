@extends('layouts.admin')

@section('title')    
 Order
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white bg-primary">
                    <h4>New Orders
                    <a href="{{url('order-history')}}" class="btn btn-warning float-right">Order History</a>
                    </h4>
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
                            <a href="{{url('admin/view-order/'.$item->id)}}" class="btn btn-primary">View</a>
                        </td>

                    </tr>
                    @endforeach
                    @else
                    <tr><td colspan="5" class="text-center">Did not have any pending order</td></tr>
                    @endif
                </tbody>
            </table>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection