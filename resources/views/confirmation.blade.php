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
<div class="flex items-center justify-center plain-background bg-cover bg-top">
  <div class="h-full w-full opacity-slight-2">
    <div class="text-center py-64">
      <div class="text-5xl font-black text-white">Thank you for your order!</div>
      <div class="text-gray-200 text-lg font-semibold">A confirmation email was sent.</div>
      <div class="mt-8">
        <a href="{{ route('home') }}"
          class="button-outline hover:bg-teal-500 font-bold text-white">
          Home Page
        </a>
      </div>
    </div>
  </div>
</div>
@endsection
