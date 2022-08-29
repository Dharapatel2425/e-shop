@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit/Update Product</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update_products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" value="{{$product->name}}" class="form-control" name="name"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" value="{{$product->slug}}" class="form-control" name="slug"/>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Category</label>
                        <select class="form-select" name="cate_id">
                            <option value=''>{{$product->category->name}}</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Small Description</label>
                        <textarea rows="3"  class="form-control" name="small_description">{{$product->small_description}}</textarea>
                    </div>  
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea rows="3"  class="form-control" name="description">{{$product->description}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Original Price</label>
                        <input type="number" value="{{$product->original_price}}" class="form-control" name="original_price"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Selling Price</label>
                        <input type="number"  value="{{$product->selling_price}}" class="form-control" name="selling_price"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Quantity</label>
                        <input type="number" value="{{$product->qty}}" class="form-control" name="qty"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Tax</label>
                        <input type="number" value="{{$product->tax}}" class="form-control" name="tax"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" {{$product->status == '1' ? 'checked' : ''}} name="status"/>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Trending</label>
                        <input type="checkbox" {{$product->trending == '1' ? 'checked' : ''}} name="trending"/>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" value="{{$product->meta_title}}" class="form-control" name="meta_title"/>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keyword</label>
                        <textarea rows="3" class="form-control" name="meta_keyword">{{$product->meta_keyword}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea rows="3"  class="form-control" name="meta_description">{{$product->meta_description}}</textarea>
                    </div>
                    @if($product->image)
                        <img class="cate-image" src="{{asset('assets/uploads/product/'.$product->image)}}" alt="product image"/>
                    @endif
                    <div class="col-md-12">
                        <input type="file" name="image" class="foem-control" />
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </div>


            </form>
        </div>
    </div>
@endsection
