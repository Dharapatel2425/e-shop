@extends('layouts.front')

@section('title')
Write a Review
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if($verified_purchase->count() > 0)
                    <h5>You are writing a review for {{$product->name}}</h5>
                    <form action="{{url('/add-review')}}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}"/>
                        <textarea class="form-control" name="user_review" rows="5" placeholder="Write a review"></textarea>
                        <button type="submit" class="btn btn-primary mt-2">Submit Review</button>
                    </form>
                    @else
                    <div class="alert alert-danger">
                        <h5>You are Not eligible to review the product</h5>
                        <p>
                            For the trustwothiness of the reviews, only customers who purchased
                            the product can write a review about the product.
                        </p>
                        <a href="{{url('/')}}" class="btn btn-primary mt-2"> Go to home page</a>

                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection