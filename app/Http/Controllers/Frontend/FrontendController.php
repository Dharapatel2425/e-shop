<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Rating;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index(){
        $feture_product = Product::where('trending','1')->take(15)->get();
        $feture_category = Category::where('popular','1')->take(15)->get();
        $product = Product::all();
        return view('frontend.index',compact('feture_product','feture_category','product'));
    }

    public function category(){
        $category = Category::where('status','0')->get();
        return view('frontend.category',compact('category'));
    }

    public function viewCategory($slug){
        if(Category::where('slug',$slug)->exists()){
            $category = Category::where('slug',$slug)->first();
            $products = Product::where('cate_id',$category->id)->where('status','0')->get();
            return view('frontend.products.index',compact('products','category'));
        }
        else{
            return redirect('/')->with('status','Slug doesnot exists');
        }
    }

    public function productview($cat_slug,$prod_slug ){
        if(Category::where('slug',$cat_slug)->exists()){
            if(Product::where('slug',$prod_slug)->exists()){
                $products = Product::where('slug',$prod_slug)->first();
                $ratings = Rating::where('prod_id',$products->id)->get();
                $review = Review::where('prod_id',$products->id)->get();
                $rating_sum = Rating::where('prod_id',$products->id)->sum('stars_rated');
                $user_rating = Rating::where('prod_id',$products->id)->where('user_id',Auth::id())->first();
                
                if($ratings->count() > 0){
                    $rating_val = $rating_sum/$ratings->count(); 
                }else{
                    $rating_val = 0 ;
                }
                             


                return view('frontend.products.view',compact('products','review','ratings','rating_val','user_rating'));
            }else{
                return redirect('/')->with('status','The link was broken');
            }           
        }
        else{
            return redirect('/')->with('status','No such category found');
        }
    }

    public function getproduct()
    {
        $products = Product::select('name')->where('status','0')->get();
        $data = [];
        foreach ($products as $item){
            $data[] = $item['name'];        
        }
        return $data;
    }

    public function searchproduct(Request $request)
    {
        $name= $request->input('product-name');
        if($name != ""){
            $product = Product::where('name',"LIKE", "%$name%")->first();
            if($product){
                return redirect('category/'.$product->category->slug.'/'.$product->slug);
            }else{
                return redirect()->back()->with('status',"No products matched your search");
            }

        }else{
            return redirect()->back();
        }
    }

    
}
