@extends('layout')
@section('content')
<!-- Header -->
<div class="height-15 header-background bg-cover bg-center">
  <div class="h-full flex w-full header-opacity-slight items-end pl-48">
    <div class="mb-16 p-1 text-white font-semibold text-xl flex items-center text-2xl">
      <a href="{{ route('home') }}">Home</a>
      <box-icon color="#ffffff" class="mx-2" name='chevron-right'></box-icon>
      <a href="{{ route('cart.index') }}">Shopping Cart</a>
      <box-icon color="#ffffff" class="mx-2" name='chevron-right'></box-icon>
      <a>Checkout</a>
    </div>
  </div>
</div>
<!-- Header Ending-->
<div class="flex container mx-auto py-16">
  <form class="flex-1">
    <div>
      <div class="my-4 font-semibold text-lg">Billing Details</div>
      <div class="flex">
        <input type="text" placeholder="Email Address" class="input-field">
        <input type="text" placeholder="Name" class="input-field">
      </div>
      <div class="flex">
        <input type="text" placeholder="Address" class="input-field">
        <input type="text" placeholder="City" class="input-field">
      </div>
      <div class="flex">
        <input type="text" placeholder="Province" class="input-field">
        <input type="text" placeholder="Postal code" class="input-field">
        <input type="text" placeholder="Phone" class="input-field">
      </div>
    </div>
    <div class="my-10">
      <div class="my-4 font-semibold text-lg">Payment Details</div>
      <div class="flex">
        <input type="text" placeholder="Credit Card Number" class="input-field">
        <input type="text" placeholder="Name on Card" class="input-field">
      </div>
      <div class="flex">
        <input type="text" placeholder="Address" class="input-field">
        <input type="text" placeholder="Expiry" class="input-field">
        <input type="text" placeholder="CVC Code" class="input-field">
      </div>
    </div>
    <button type="submit" class="bg-green-500 text-white hover:bg-green-400 w-full font-bold
      py-2 rounded">
      Complete Order
    </button>
  </form>
  <div class="w-2/5 p-8">
    <div class="font-bold text-lg mb-1">Your Order</div>
    <div class="border border-gray-400 rounded-sm p-3">
      <!-- PRODUCT -->
      @foreach( Cart::content() as $item)
      <div class="flex items-center justify-around h-20 bg-gray-100 py-2 my-1">
        <a class="w-16 h-full border rounded flex items-center justify-center p-1"
          href="{{ route('shop.show', $item->model->slug) }}">
          <img src="{{ asset('images/product.png') }}" class="w-full h-auto">
        </a>
        <div class="font-bold">
          <a href="{{ route('shop.show', $item->model->slug) }}">
            {{ $item->model->name }}
          </a>
          <div class="text-xs text-gray-600">{{ $item->model->details }}</div>
          <div class="text-xs text-gray-900">{{ presentPrice($item->model->price) }}</div>
        </div>
        <div class="py-1 px-3 border border-gray-500 rounded-sm">1</div>
      </div>
      @endforeach
      <!-- PRODUCT ending -->
    </div>
    <div class="w-full flex justify-center py-5 my-4 bg-gray-200">
      <table class="w-2/3 rounded">
        <tr>
          <td>Subtotal</td>
          <td>{{ presentPrice(Cart::subtotal()) }}</td>
        </tr>
        <tr>
          <td class="py-1">Tax (13%)</td>
          <td class="py-1">{{ presentPrice(Cart::tax()) }}</td>
        </tr>
        <tr class="font-bold text-black text-lg">
          <td>Total</td>
          <td>{{ presentPrice(Cart::total()) }}</td>
        </tr>
      </table>
    </div>
  </div>
</div>

@endsection
