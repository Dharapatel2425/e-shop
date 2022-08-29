@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card_body">
            <div class="row p-4">
            <h1>Dashboard</h1>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 d-flex">
                <div class="col-md-4">
                    <div class="card p-4 my-auto bg-yellow">
                        <h4>Total Categories :{{$categories->count()}}</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 my-auto bg-success">
                        <h4>Total Products :{{$product->count()}}</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 my-auto bg-danger">
                        <h4>Total Users :{{$users->count()}}</h4>
                    </div>
                </div>
                </div>    
            </div>
            <div class="row mt-5">
                <div class="col-md-12 d-flex">
                <div class="col-md-4">
                    <div class="card p-4 my-auto bg-warning">
                        <h4>Total Orders : {{$total_orders->count()}}</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 my-auto bg-blue">
                        <h4>Completed Orders :{{$completed_orders->count()}}</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 my-auto bg-primary">
                        <h4>Pending Orders :{{$pending_orders->count()}}</h4>
                    </div>
                </div>
                </div>    
            </div>
        </div>
        <br>
    </div>
    
@endsection
