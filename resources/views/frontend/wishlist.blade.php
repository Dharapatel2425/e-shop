@extends('layouts.front')

@section('title')
    Whishlist
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('/')}}">
                Home
            </a>/
            <a href="{{url('/wishlist')}}">
                Whishlist
            </a>            
        </h6>
    </div>
</div>
    <div class="container my-5">
        <div class="card shadow wishlistitems ">
            @if($wishlist->count() > 0)
            <div class="card-body">
                @foreach($wishlist as $item)
                <div class="row product_data">
                    
                    <div class="col-md-2">
                        <img src="{{asset('assets/uploads/product/'.$item->product->image)}}" class="cart-image" alt="product image"/>
                    </div>
                    <div class="col-md-2 my-auto">
                        <h6>{{$item->product->name}}</h6>
                    </div>
                    <div class="col-md-2 my-auto">
                        <h6>Rs {{$item->product->selling_price}}</h6>
                    </div>
                    <div class="col-md-2 my-auto">
                        <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                        @if($item->product->qty >= $item->prod_qty)
                        <label for="Quantity">Quantity</label>
                        <div class="input-group text-center mb-3" style="width: 130px;">
                            <button class="input-group-text  decrement_btn">-</button>
                            <input type="text" name="quantity" value='1' class="form-control text-center qty-input" />
                            <button class="input-group-text  increment_btn">+</button>
                        </div>
                        @else
                        <h6>Out Of Stock</h6>
                        @endif
                    </div>
                    <div class="col-md-2 my-auto">
                        <button class="btn btn-success addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-md-2 my-auto">
                        <button class="btn btn-danger delete-wishlist-item"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </div>
                </div>                
                @endforeach
            </div>
            @else
            <div class="card-body text-center">
                <h2> There is No product in your wish list  </h2>
                <a href="{{url('category')}}" class="btn btn-outline-primary float-end">
                    Countinue Shopping</a>
            </div>
            @endif
        </div>            
    </div>
@endsection