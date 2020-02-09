<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;

class CheckoutController extends Controller
{
  private function getAmounts() {
    $tax = config('cart.tax') / 100;
    $discount = session()->get('coupon')['discount'] ?? 0;
    $newSubtotal = Cart::subtotal() - $discount;
    $newTax = $newSubtotal * $tax;
    $newTotal = $newSubtotal + $newTax;

    return Collect([
      'discount' => $discount,
      'newSubtotal' => $newSubtotal,
      'newTax' => $newTax,
      'newTotal' => $newTotal,
    ]);
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('checkout')->with([
      'discount' => $this->getAmounts()->get('discount'),
      'newSubtotal' => $this->getAmounts()->get('newSubtotal'),
      'newTax' => $this->getAmounts()->get('newTax'),
      'newTotal' => $this->getAmounts()->get('newTotal'),
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
  public function store(CheckoutRequest $request)
  {
    $contents = Cart::content()->map(function($item) {
      return $item->model->slug.', '.$item->qty;
    })->values()->tojson();

    try {
      $charge = Stripe::charges()->create([
        'amount' => $this->getAmounts()->get('newTotal') / 100,
        'currency' => 'USD',
        'source' => $request->stripeToken,
        'description' => 'Order',
        'receipt_email' => $request->email,
        'metadata' => [
            'contents' => $contents,
            'quantity' => Cart::instance('default')->count(),
            'discount' => collect($this->getAmounts()->get('discount'))->toJson(),
        ],
      ]);

      Cart::instance('default')->destroy();
      session()->forget('coupon');
      return redirect()->route('confirmation.index');

    } catch(CardErrorException $e) {
      return back()->with('ERROR_MESSAGE', $e->getMessage());
    }
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
