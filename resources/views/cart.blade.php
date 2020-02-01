@extends('layout')
@section('content')
<!-- Header -->
<div class="height-15 header-background bg-cover bg-center">
  <div class="h-full flex w-full header-opacity-slight items-end pl-48">
    <div class="mb-16 p-1 text-white font-semibold text-xl flex items-center text-2xl">
      <a href="{{ route('home') }}">Home</a>
      <box-icon color="#ffffff" class="mx-2" name='chevron-right'></box-icon>
      <a>Shopping Cart</a>
    </div>
  </div>
</div>
<!-- Header Ending-->

<div class="container mx-auto py-20">
  <div class="w-3/4">
    <div class="font-bold text-xl p-4">3 items in cart</div>
    <div>
      <!-- PRODUCT -->
      <div class="flex items-center justify-around h-24 bg-gray-100 py-2 my-1">
        <div class="w-20 h-full border rounded flex items-center justify-center p-1">
          <img src="{{ asset('images/product.png') }}" class="w-full h-auto">
        </div>
        <div class="font-bold">
          <div class="">Macbook Pro</div>
          <div class="text-xs text-gray-600">16GB RAM, 15GB SSD, i5</div>
        </div>
        <div class="flex items-center h-full">
          <div class="h-full flex flex-col justify-around items-center">
            <a class="text-xs text-gray-600 cursor-pointer px-3 border border-gray-400
              hover:bg-gray-200 rounded uppercase">remove</a>
            <a class="text-xs text-gray-600 cursor-pointer px-3 border border-gray-400
              hover:bg-gray-200 rounded uppercase">save for later</a>
          </div>
          <div class="flex border rounded-sm items-center mx-8">
            <div class="px-3 h-full">1</div>
            <div class="flex flex-col justify-center items-center bg-teal-400 border border-teal-400">
              <button class="h-5 w-5 hover:bg-teal-500">
                <box-icon size="xs" color="white" name='chevron-up'></box-icon>
              </button>
              <button class="h-5 w-5 hover:bg-teal-500">
                <box-icon size="xs" color="white" name='chevron-down' ></box-icon>
              </button>
            </div>
          </div>
          <div class="text-lg font-bold">$155.00</div>
        </div>
      </div>
      <div class="flex items-center justify-around h-24 bg-gray-100 py-2 my-1">
        <div class="w-20 h-full border rounded flex items-center justify-center p-1">
          <img src="{{ asset('images/product.png') }}" class="w-full h-auto">
        </div>
        <div class="font-bold">
          <div class="">Macbook Pro</div>
          <div class="text-xs text-gray-600">16GB RAM, 15GB SSD, i5</div>
        </div>
        <div class="flex items-center h-full">
          <div class="h-full flex flex-col justify-around items-center">
            <a class="text-xs text-gray-600 cursor-pointer px-3 border border-gray-400
              hover:bg-gray-200 rounded uppercase">remove</a>
            <a class="text-xs text-gray-600 cursor-pointer px-3 border border-gray-400
              hover:bg-gray-200 rounded uppercase">save for later</a>
          </div>
          <div class="flex border rounded-sm items-center mx-8">
            <div class="px-3 h-full">1</div>
            <div class="flex flex-col justify-center items-center bg-teal-400 border border-teal-400">
              <button class="h-5 w-5 hover:bg-teal-500">
                <box-icon size="xs" color="white" name='chevron-up'></box-icon>
              </button>
              <button class="h-5 w-5 hover:bg-teal-500">
                <box-icon size="xs" color="white" name='chevron-down' ></box-icon>
              </button>
            </div>
          </div>
          <div class="text-lg font-bold">$155.00</div>
        </div>
      </div>
      <div class="flex items-center justify-around h-24 bg-gray-100 py-2 my-1">
        <div class="w-20 h-full border rounded flex items-center justify-center p-1">
          <img src="{{ asset('images/product.png') }}" class="w-full h-auto">
        </div>
        <div class="font-bold">
          <div class="">Macbook Pro</div>
          <div class="text-xs text-gray-600">16GB RAM, 15GB SSD, i5</div>
        </div>
        <div class="flex items-center h-full">
          <div class="h-full flex flex-col justify-around items-center">
            <a class="text-xs text-gray-600 cursor-pointer px-3 border border-gray-400
              hover:bg-gray-200 rounded uppercase">remove</a>
            <a class="text-xs text-gray-600 cursor-pointer px-3 border border-gray-400
              hover:bg-gray-200 rounded uppercase">save for later</a>
          </div>
          <div class="flex border rounded-sm items-center mx-8">
            <div class="px-3 h-full">1</div>
            <div class="flex flex-col justify-center items-center bg-teal-400 border border-teal-400">
              <button class="h-5 w-5 hover:bg-teal-500">
                <box-icon size="xs" color="white" name='chevron-up'></box-icon>
              </button>
              <button class="h-5 w-5 hover:bg-teal-500">
                <box-icon size="xs" color="white" name='chevron-down' ></box-icon>
              </button>
            </div>
          </div>
          <div class="text-lg font-bold">$155.00</div>
        </div>
      </div>
      <!-- PRODUCT ending -->
    </div>

    <!-- CODE INPUT -->
    <div class="py-10">
      <div class="text-lg font-semibold my-2">Have a Code?</div>
      <div class="flex border rounded-sm h-10 w-1/2">
        <input class="flex-1" type="text" name="codeInput">
        <button class="bg-gray-500 text-white font-bold px-4 hover:bg-gray-600">Apply</button>
      </div>
    </div>
    <!-- CODE INPUT ending-->

    <div class="bg-gray-100 h-32 flex items-center my-6">
      <div class="flex-1 text-center">Delivery free above $100!</div>
      <table class="w-1/3">
        <tr>
          <td>Subtotal</td>
          <td>$79.99</td>
        </tr>
        <tr>
          <td class="py-1">Tax</td>
          <td class="py-1">$12.99</td>
        </tr>
        <tr class="font-bold text-black">
          <td>Total</td>
          <td>$8474.99</td>
        </tr>
      </table>
    </div>

    <div class="flex justify-between w-full">
      <button class="button-outline hover:bg-gray-200">Continue Shopping</button>
      <button class="button-outline bg-teal-400 hover:bg-teal-500 font-bold text-white">Proceed to Checkout</button>
    </div>

    <!-- SAVED PRODUCTS -->
    <div class="mt-32">
      <div class="font-bold text-xl p-4">2 Items Saved For Later</div>
      <div>
        <!-- PRODUCT -->
        <div class="flex items-center justify-around h-24 bg-gray-100 py-2 my-1">
          <div class="w-20 h-full border rounded flex items-center justify-center p-1">
            <img src="{{ asset('images/product.png') }}" class="w-full h-auto">
          </div>
          <div class="font-bold">
            <div class="">Macbook Pro</div>
            <div class="text-xs text-gray-600">16GB RAM, 15GB SSD, i5</div>
          </div>
          <div class="flex items-center h-full">
            <a class="text-xs text-gray-600 cursor-pointer px-3 border border-gray-400
              hover:bg-gray-200 rounded uppercase mr-10">remove</a>
            <div class="text-lg font-bold">$155.00</div>
          </div>
        </div>
        <div class="flex items-center justify-around h-24 bg-gray-100 py-2 my-1">
          <div class="w-20 h-full border rounded flex items-center justify-center p-1">
            <img src="{{ asset('images/product.png') }}" class="w-full h-auto">
          </div>
          <div class="font-bold">
            <div class="">Macbook Pro</div>
            <div class="text-xs text-gray-600">16GB RAM, 15GB SSD, i5</div>
          </div>
          <div class="flex items-center h-full">
            <a class="text-xs text-gray-600 cursor-pointer px-3 border border-gray-400
              hover:bg-gray-200 rounded uppercase mr-10">remove</a>
            <div class="text-lg font-bold">$155.00</div>
          </div>
        </div>
        <!-- PRODUCT ending -->
      </div>
    </div>
    <!-- SAVED PRODUCTS ENDING -->
  </div>
</div>
@include('recommended')
@endsection
