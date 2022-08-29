@extends('layouts.front')

@section('title')
Welcome To E-Shop
@endsection

@section('content')
@include('layouts.include.frontslider')

    <div class="py-5">
        <div class="container">
            <div class="row">
            <h4>Fetured Products</h4>
            <div class="owl-carousel fetured-carousel owl-theme">
                @foreach($feture_product as $item)
                <div class="item">
                    <div class="card" style="width:19rem; height:19rem;">
                        <img src="{{asset('assets/uploads/product/'.$item->image)}}" class="cate-image" alt="product image"/>
                        <div class="card-body">
                            <h5>{{$item->name}}</h5>
                            <span class="float-start">{{$item->selling_price}}</span>
                            <span class="float-end"><s>{{$item->original_price}}</s></span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>    
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
            <h4>Trending Category</h4>
            <div class="owl-carousel fetured-carousel owl-theme">
                @foreach($feture_category as $item)
                <div class="item">
                <a href="{{url('view_category/'.$item->slug)}}">
                    <div class="card" style="width:19rem; height:19rem;">
                        <img src="{{asset('assets/uploads/category/'.$item->image)}}" class="cate-image" alt="category image"/>
                        <div class="card-body">
                            <h5>{{$item->name}}</h5>
                            <p>{{$item->description}}</p>
                        </div>
                    </div>
                </a>    
                </div>
                @endforeach
            </div>    
            </div>
        </div>
    </div>


@endsection

@section('scripts')
<script>
$('.fetured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>
@endsection
