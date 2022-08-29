<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        $total_orders = Order::all();
        $completed_orders = Order::where('status','1')->get();
        $pending_orders = Order::where('status','0')->get();
        $users = User::all();
        $categories = Category::all();
        $product = Product::all();

        return view('admin.index',compact('total_orders','completed_orders','pending_orders','users','categories','product'));
    }
}
