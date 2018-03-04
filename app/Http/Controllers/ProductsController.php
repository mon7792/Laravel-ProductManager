<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     // Page to display all or part of the product
    public function index()
    {
        $products = Product::all();
        return view('products.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // controller to get the view to add/create product
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // controller to handle the request before adding product to the database
    public function store(Request $request)
    {
      // Validate
      $this->validate($request,[
        'productName' => 'required'
      ]);
      //add
      $product = new Product();
      $product->name = $request->input('productName');
      $product->description = $request->input('productDescription');
      $product->category = $request->input('productCategory');
      // net to think of mechanism to include the required item
      $product->requiredItem = "primary";
      $product->productID = $request->input('productID');
      $product->save();
      //redirect
      return redirect('/products') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request,[
        'productName' => 'required'
      ]);
      //add
      $product = Product::find($id);
      $product->name = $request->input('productName');
      $product->description = $request->input('productDescription');
      $product->category = $request->input('productCategory');
      // net to think of mechanism to include the required item
      $product->requiredItem = "primary";
      $product->productID = $request->input('productID');
      $product->save();
      return redirect('/products') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete Products
        $product = Product::find($id);
        $product->delete();
        return redirect('/products');
    }
}
