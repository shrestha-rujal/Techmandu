<?php

namespace App\Http\Controllers;

use Cart;
use App\Product;
use Validator;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recommendedProducts = Product::recommendedProducts()->get();
        return view('cart')->with('recommendedProducts', $recommendedProducts);
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
      $duplicates = Cart::search(function($cartItem, $rowId) use ($request) {
        return $cartItem->id === $request->id;
      });

      if($duplicates->isNotEmpty()) {
        return redirect()->route('cart.index')->with('SUCCESS_MESSAGE', 'Item already exists!');
      }

      Cart::add($request->id, $request->name, 1, $request->price)
        ->associate('App\Product');
      return redirect()->route('cart.index')->with('SUCCESS_MESSAGE', 'Item added to cart!');
    }

    /**
     * Switch from savedForLater to cart.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToCart($id)
    {
      $item = Cart::instance('savedForLater')->get($id);
      Cart::instance('savedForLater')->remove($id);

      $duplicates = Cart::instance('default')->search(function($cartItem, $rowId) use ($id) {
        return $rowId === $id;
      });

      if($duplicates->isNotEmpty()) {
        return redirect()->route('cart.index')->with('SUCCESS_MESSAGE', 'Item already exists!');
      }

      Cart::instance('default')->add($item->id, $item->name, 1, $item->price)->associate('App\Product');
      return redirect()->route('cart.index')->with('SUCCESS_MESSAGE', 'Item shifted to cart!');
    }

        /**
     * Switch item in default cart to savedForLater cart instance.
     *
     * @param  $itemId
     * @return \Illuminate\Http\Response
     */
    public function switchToSaveForLater($itemRowId)
    {
      $item = Cart::get($itemRowId);
      Cart::remove($itemRowId);

      $duplicates = Cart::instance('savedForLater')->search(function($cartItem, $rowId) use ($itemRowId) {
        return $rowId === $itemRowId;
      });

      if($duplicates->isNotEmpty()) {
        return redirect()->route('cart.index')->with('SUCCESS_MESSAGE', 'Item already exists in Saved!');
      }

      Cart::instance('savedForLater')->add($item->id, $item->name, 1, $item->price)
        ->associate('App\Product');
      return redirect()->route('cart.index')->with('SUCCESS_MESSAGE', 'Item saved for later!');
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
      $validator = Validator::make($request->all(), [
        'quantity' => 'required|numeric|between:1,50'
      ]);

      if($validator->fails()) {
        session()->flash('errors', collect(['Invalid Item Quantity']));
        return response()->json(['success' => false ]);
      }

      Cart::update($id, $request->quantity);
      session()->flash('SUCCESS_MESSAGE', 'Quantity updated successfully!');
      return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return back()->with('SUCCESS_MESSAGE', 'Item removed from cart!');
    }

        /**
     * Remove the specified resource from savedforlater.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroySavedForLater($id)
    {
        Cart::instance('savedForLater')->remove($id);
        return back()->with('SUCCESS_MESSAGE', 'Item removed from saved for later!');
    }

       /**
     * Remove the all resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyAll()
    {
        Cart::instance('default')->destroy();
        return back()->with('SUCCESS_MESSAGE', 'Cart Emptied!');
    }
}
