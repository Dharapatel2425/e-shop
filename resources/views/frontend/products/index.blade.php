@extends('layouts.front')

@section('title')
{{$category->name}}
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
        <a href="{{url('category')}}">
                Collection
            </a>/
            <a href="{{url('view_category/'.$category->slug)}}">
                {{$category->name}}
            </a>

        </h6>
    </div>
</div>
<div class="py-5">
        <div class="container">
            <div class="row">
            <h4>{{$category->name}}</h4>
                @foreach($products as $item)
                <div class="col-md-3 mb-4">
                    <a href="{{url('category/'.$category->slug.'/'.$item->slug)}}">
                    <div class="card" style="width:19rem; height:19rem;">
                        <img src="{{asset('assets/uploads/product/'.$item->image)}}" class="cate-image" alt="product image"/>
                        <div class="card-body">
                            <h5>{{$item->name}}</h5>
                            <span class="float-start">{{$item->selling_price}}</span>
                            <span class="float-end"><s>{{$item->original_price}}</s></span>
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach  
            </div>
        </div>
    </div>
@endsection