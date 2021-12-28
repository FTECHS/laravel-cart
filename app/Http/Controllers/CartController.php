<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function cart(){
        //dd(session('cartItems'));
       return view('cart.cart');
        $cartItems = session()->get('cartItems');
      // unset($cartItems);
    }


    public function addToCart($id){
        $product=Product::findOrfail($id);
        $cartItems=session()->get('cartItems', []); //session is the global session in php
        if(isset($cartItems[$id])){
            $cartItems[$id]['quantity']++;
        }else{
           $cartItems[$id]=[
             "name"=>$product->name,
             "image_path"=>$product->image_path,
             "details"=>$product->details,
             "price"=>$product->price,
             "quantity"=>1
           ];
        }
          session()->put('cartItems', $cartItems);
          return redirect()->back()->with('success', 'Product Added to cart successfully');
    }

  public function delFromCart(Request $request)
  {
    if ($request->id) {
      $cartItems = session()->get('cartItems');
      if ($cartItems[$request->id]) {
        unset($cartItems[$request->id]);
        session()->put('cartItems', $cartItems);
      }
     return redirect()->back()->with('success', 'Product removed from cart successfully');
    }
  }

  public function updateCart(Request $request){
    if($request->id && $request->quantity){
      $cartItems=session()->get('cartItems');
      $cartItems[$request->id]['quantity']=$request->quantity;
      session()->put('cartItems', $cartItems);
    }
    return redirect()->back()->with('success', 'Cart Update successfully');
  }
            

}
