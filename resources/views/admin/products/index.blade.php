@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Product</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thread>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Selling Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thred>
                <tbody>
                    @foreach($product as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->category->name}}</td>
                        <td>{{$item->selling_price}}</td>
                        <td>
                            <img src="{{asset('assets/uploads/product/'.$item->image) }}" class="cate-image" alt="Ïmage here"/>
                        </td>
                        <td>
                            <a href="{{ url('edit-products/'.$item->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{ url('delete-products/'.$item->id)}}" class="btn btn-danger">Delete</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
