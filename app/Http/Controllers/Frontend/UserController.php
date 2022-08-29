<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $order = Order::where('user_id',Auth::id())->get();
        return view('frontend.order.index',compact('order'));
    }
    public function vieworder($id)
    {
        $order = Order::where('id',$id)->where('user_id',Auth::id())->first();
        return view('frontend.order.view',compact('order'));        
    }
}
