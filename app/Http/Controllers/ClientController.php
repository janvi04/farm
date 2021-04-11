<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Cart;
use Session;

class ClientController extends Controller
{
    //

    public function home()
    {
        $sliders = Slider::get();
        $products = Product::get();

        return view('client.home')->with('sliders', $sliders)->with('products', $products);
    }

    public function cart()
    {
        if(!Session::has('cart')){
        return view('client.cart');
        }
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
       return view('client.cart' ,['products' =>$cart->items]);


    }

    public function updateqty(Request $request)
    {

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->updateQty($request->id, $request->quantity);
        Session::put('cart', $cart);

        //dd(Session::get('cart'));
        return redirect::to('/cart');

    }


    public function removeitem($id)
    {
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
       
        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }

        //dd(Session::get('cart'));
        return redirect::to('/cart');
    }

    public function shop()
    {
        $categories = Category::get();
        $products = Product::get();

        return view('client.shop')->with('products', $products)->with('categories',$categories);
    
    }

    public function checkout()
    {
        if(!Session::has('cart'))
        {
            return redirect('/cart');
        }

        return view('client.checkout');
    }


   

    public function login()
    {
        return view('client.login');
    }


    public function signup()
    {
        return view('client.signup');
    }
}
