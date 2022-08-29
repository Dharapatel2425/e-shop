@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header text-white bg-primary">
            <h4>Registered User</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thread>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thred>
                <tbody>
                    @foreach($user as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name .' '.$item->lname}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone}}</td>
                        <td>
                            <a href="{{ url('view-user/'.$item->id)}}" class="btn btn-primary">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
