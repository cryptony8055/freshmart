<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use app\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Redirect;
use App\Models\productImage;
use App\Models\customer_cart;
use Auth;

class userController extends Controller
{

    public function index()
    {
        $data = Category::where('status',true)->pluck('name','id')->toArray();
        $category_data = Category::select('name','id','image_url')->where('status',true)->get();
        // dd($category_data);
        return view('user',compact('data','category_data'));
    }

    public function userslisting()
    {
        $data = User::select('id','name','email','created_at')->get();
        // dd($data);
        return view('users.usersindex',compact('data'));
    }

    public function catProducts(Request $request)
    {
        if($request->has('id')){
            $data = Product::where('catagory_id',$request->id)->get();
            $category = Category::where('id',$request->id)->first();
            $productImageData = collect(); 
            foreach($data as $product){
                $productImage = productImage::where('product_id',$product->id)->first();
                $productImageData->push($productImage);
            }
            // dd($productImageData);
            // dd($data);
            return view('customers.catProducts',compact(['data','productImageData','category']));
        }else{
            abort(404);
        }
    }

    public function cartProductIndex(){
            $loggedInUser = auth()->user();
            $user_id = $loggedInUser->id;
            $total = 0;
            $cartItems = customer_cart::with('product')->where('user_id',$user_id)->orderBy('id')->get();
            // dd($cartItems);
            foreach($cartItems as $item){
                $total += $item->product->product_price * $item->quantity;

                // dd($item->price);
            }
            return view('customers.cart',compact('cartItems','total'));
        
    }

    public function increaseQuantity(Request $request){
        if($request->product_id){
            $loggedInUser = auth()->user();
            $user_id = $loggedInUser->id;
            if($request->quantity > 0){
                $data = customer_cart::where('user_id', $user_id)->where('product_id', $request->product_id)->first();
                $data->quantity = $request->quantity;
                $data->save();
                $response['status'] = 'success';
                $response['message'] = 'item updated successfully';
            }
        } elseif($request->quantity == 0) {
            $data->delete(); 
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Something went wrong';
        }
        return $response;
    }

    public function addToCart(Request $request){
        $response = [];
        $product_id = $request->product_id;
        $loggedInUser = auth()->user();
        $user_id = $loggedInUser->id;
        if($user_id){
            if($user_id && $product_id){
                $cart = customer_cart::where('product_id',$product_id )->where('user_id', $user_id)->first();
                if ($cart && $cart->quantity > 0) {
                    $cart->quantity = $cart->quantity+1;
                    $cart->save();
                    $response['status'] = 'success';
                    $response['message'] = 'item added successfully';
                } else{
                    $cart = new customer_cart();
                    $cart->user_id = $user_id;
                    $cart->product_id = $request->product_id;
                    $cart->quantity = 1;
                    $cart->is_purchased = 0;
                    $cart->save();
                    $response['status'] = 'success';
                    $response['message'] = 'item added successfully';
                }
            } else {
                $response['status'] = 'error';
                $response['message'] = 'something went wrong';
            }
            return $response;
        } else {
            return Redirect::route('login');
        }
    }

    public function checkCart(Request $request){
        //updates status
        $response = [];
        $loggedInUser = auth()->user();
        $userId =  $loggedInUser->id;
        // dd($userId);
        if($userId){
            $cart = customer_cart::where('user_id', $userId)->groupby('product_id','id')->get();
            // dd($cart);
            if ($cart) {
                $response['status'] = 'success';
                $response['message'] = 'item added successfully';
                $response['data'] = count($cart);
            } else {
                $response['status'] = 'error';
                $response['message'] = 'issue in cart fetching';
                $response['data'] = 0;
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = 'user not found';
            $response['data'] = 0;
        }
        return $response;
    }

    public function deleteCartProduct(Request $request){
        $response = [];
        $loggedInUser = auth()->user();
        $userId =  $loggedInUser->id;
        $product_id = $request->product_id;
        if($product_id){
            $cart = customer_cart::where('product_id',$product_id )->where('user_id', $userId)->first();
            $cart->delete();
            $response['status'] = 'success';
            $response['message'] = 'item removed successfully';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'something went wrong';
        }
        return $response;

    }
    
}
