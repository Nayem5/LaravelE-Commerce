<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    function product(){

        $products = Product::all();
        return view('products', compact('products'));
    }

    public function cart(){
        return view('cart');
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }  else {
            $cart[$id] = [
                "product_name" => $product->product_name,
                "photo" => $product->photo,
                "price" => $product->price,
                "quantity" => 1
            ];
        }
  
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product add to cart successfully!');
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }

    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }


    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_name' => 'required',
            'product_descripton' => 'nullable',
            'price' => 'required|numeric|min:0.01|max:9999.99',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($photo = $request->file('photo')) {
            $destinationPath = 'img/';
            $profileImage = date('YmdHis') . "." . $photo->getClientOriginalExtension();
            $photo->move($destinationPath, $profileImage);
            $data['photo'] = $profileImage; 
        }

        $newProduct = Product::create($data);

        return redirect(route('product'))->with('success', 'Product created');
    }

    public function edit(Product $product){
        return view('product.edit', ['product'=> $product]);
    }

    public function updateProduct (Product $product, Request $request){
        $data = $request->validate([
            'product_name' => 'required',
            'product_descripton' => 'nullable',
            'price' => 'numeric|min:0.01|max:9999.99',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($photo = $request->file('photo')) {
            $destinationPath = 'img/';
            $profileImage = date('YmdHis') . "." . $photo->getClientOriginalExtension();
            $photo->move($destinationPath, $profileImage);
            $data['photo'] = $profileImage; 
        }

        $product ->update($data);

        return redirect (route('product'))->with('success','Product updated succesfully');


    }



}

    




    

    


