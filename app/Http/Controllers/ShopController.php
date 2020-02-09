<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ShopController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $pagination = 12;
    $isSorted = 0;
    $categories = Category::all();

    if(request()->category){
      $products = Product::with('categories')->whereHas('categories', function($query) {
        $query->where('slug', request()->category);
      });
      $categoryHeading = optional($categories->where('slug', request()->category)->first())->name;
    } else {
      $products = Product::where('featured', true);
      $categoryHeading = 'Featured';
    }

    if(request()->sort === 'price') {
      $isSorted = 2;
      $products = $products->orderBy('price')->paginate(12);
    } elseif(request()->sort === '-price') {
      $isSorted = 1;
      $products = $products->orderBy('price', 'DESC')->paginate(12);
    } else {
      $products = $products->paginate(12);
    }

    return view('shop')->with([
      'products' => $products,
      'categories' => $categories,
      'categoryHeading' => $categoryHeading,
      'bold' => 'font-bold',
      'sortOrder' => $isSorted,
    ]);
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
      $product = Product::where('slug', $slug)->firstOrFail();
      $recommendedProducts = Product::where('slug', '!=', $slug)->recommendedProducts()->get();
      return view('product')->with([
        'product' => $product,
        'recommendedProducts' => $recommendedProducts,
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
