@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-white bg-primary">
                        <h4>User Details
                        <a href="{{url('users')}}" class="btn btn-warning float-right">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-4 mt-3">
                                <label for="">Role</label>
                                <div class="border p-2">{{$user->role_as == '0' ? 'User' : 'Admin'}}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">First Name</label>
                                <div class="border p-2">{{$user->name}}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Last Name</label>
                                <div class="border p-2">{{$user->lname}}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Email</label>
                                <div class="border p-2">{{$user->email}}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Phone Number</label>
                                <div class="border p-2">{{$user->phone}}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Address 1</label>
                                <div class="border p-2">{{$user->address1}}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Address 2</label>
                                <div class="border p-2">{{$user->address2}}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">City</label>
                                <div class="border p-2">{{$user->city}}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">State</label>
                                <div class="border p-2">{{$user->state}}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Country</label>
                                <div class="border p-2">{{$user->country}}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">Pin code</label>
                                <div class="border p-2">{{$user->pincode}}</div>
                            </div>                                                   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
