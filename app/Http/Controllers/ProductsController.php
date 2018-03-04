<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
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
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // controller to get the view to add/create product
    public function create()
    {
        $category = Category::all();
        return view('products.create')->with('category',$category);
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

      // deal with the product category and change it to number
      $productCategoryId = Category::where('category',$request->input('productCategory'))->get();
      //add
      $product = new Product();
      $product->name = $request->input('productName');
      $product->description = $request->input('productDescription');
      $product->category = $productCategoryId[0]->id;
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
        $category = Category::all();
        $product = Product::find($id);
        // categorySelected: is to find the category a particular product belongs to
        $categorySelected = Category::find($product->category)->category;
        return view('products.edit', compact('product','category', 'categorySelected'));
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
      // deal with the product category and change it to number
      $productCategoryId = Category::where('category',$request->input('productCategory'))->get();
      //add
      $product = Product::find($id);
      $product->name = $request->input('productName');
      $product->description = $request->input('productDescription');
      $product->category = $productCategoryId[0]->id;
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
