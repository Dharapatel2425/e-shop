<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addtocart(Request $request){
        $prod_id = $request->input('prod_id');
        $prod_qty=$request->input('prod_qty');
        if(Auth::check()){
            $prod_check = Product::where('id',$prod_id)->first();
            if($prod_check){
                if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['status' => $prod_check->name.' Already added to cart']);                    
                }else{
                    $cartItem =  new Cart();
                    $cartItem->prod_id = $prod_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->prod_qty = $prod_qty;
                    $cartItem->save();
                    return response()->json(['status'  => $prod_check->name.' Added to cart']);
                }            
            }
        }else{
            return response()->json(['status'  => 'Login To Continue']);
        }
    }
    public function viewcart()
    {
        $cart = Cart::where('user_id',Auth::id())->get();
        return view('frontend.cart',compact('cart'));
        
    }
    public function deleteitem(Request $request)
    {        
        if(Auth::check())
        {
            $prod_id = $request->input('prod_id');
                if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
                {
                    $cartItem = Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                    $cartItem->delete();
                    return response()->json(['status'  => 'Item deleted Successfully']);       
                }
        }
        else{
            return response()->json(['status'  => 'Login To Continue']);
        }        
    }

    public function updatecart(Request $request)
    {
        if(Auth::check())
        {
            $prod_id = $request->input('prod_id');
            $prod_qty=$request->input('prod_qty');

                if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
                {
                    $cartItem = Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                    $cartItem->prod_qty = $prod_qty;
                    $cartItem->update();
                    return response()->json(['status'  => 'Item updated Successfully']);       
                }
        }
        else{
            return response()->json(['status'  => 'Login To Continue']);
        }

    }

    public function cartcount(){
        $cartcount = Cart::where('user_id',Auth::id())->count();
        return response()->json(['count'=>$cartcount]);
    }
}
