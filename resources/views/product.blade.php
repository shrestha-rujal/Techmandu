@extends('layout')
@section('content')
<!-- Header -->
<div class="height-15 header-background bg-cover bg-center">
  <div class="h-full flex w-full opacity-slight items-end pl-48">
    <div class="mb-16 p-1 text-white font-semibold text-xl flex items-center text-2xl">
      <a href="{{ route('home') }}">Home</a>
      <box-icon color="#ffffff" class="mx-2" name='chevron-right'></box-icon>
      <a href="{{ route('shop.index') }}">Products</a>
      <box-icon color="#ffffff" class="mx-2" name='chevron-right'></box-icon>
      <a> item {{ $product->id }}</a>
    </div>
  </div>
</div>
<!-- Header Ending-->

<div class="flex container mx-auto py-20">
  <div class="flex-1 flex items-center justify-center">
    <div class="w-3/4 h-auto border p-8">
      <img src="{{ asset('images/product.png') }}" alt="">
    </div>
  </div>
  <div class="flex-1 p-10 text-center">
    <div class="flex items-center justify-between pb-10">
      <div class="font-bold text-left">
        <div class="text-2xl text-gray-700">{{ $product->name }}</div>
        <div class="text-gray-600">{{ $product->details }}</div>
      </div>
      <div class="text-xl font-bold py-2 px-4 border border-teal-200 text-teal-500">
        {{ $product->presentPrice() }}
      </div>
    </div>
    <p class="text-gray-600 text-left">
      {{ $product->description }}
    </p>
    <form action="{{ route('cart.store') }}" method="POST">
      {{ csrf_field() }}
      <input type="hidden" name="id" value="{{ $product->id }}">
      <input type="hidden" name="name" value="{{ $product->name }}">
      <input type="hidden" name="price" value="{{ $product->price }}">
      <button class="rounded-sm bg-orange-500 hover:bg-orange-400 font-semibold
        text-white mt-16 px-6 py-2" type="submit">
          Add to Cart
      </button>
    </form>
  </div>
</div>

@include('recommended')
@endsection
