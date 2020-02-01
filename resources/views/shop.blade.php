@extends('layout')
@section('content')
<!-- Header -->
<div class="height-15 header-background bg-cover bg-center">
  <div class="h-full flex w-full header-opacity-slight items-end pl-48">
    <div class="mb-16 p-1 text-white font-semibold text-xl flex items-center text-2xl">
      <a href="{{ route('home') }}">Home</a>
      <box-icon color="#ffffff" class="mx-2" name='chevron-right'></box-icon>
      <a>Products</a>
    </div>
  </div>
</div>
<!-- Header Ending-->

<div class="flex container mx-auto py-20">
  <div class="pr-20 flex flex-col border-r">
    <div class="font-semibold w-full my-4">By Category</div>
    <ul class="pl-3 text-sm">
      <li class="my-2">Laptops</li>
      <li class="my-2">Desktops</li>
      <li class="my-2">Mobile Phones</li>
      <li class="my-2">Tablets</li>
      <li class="my-2">Appliances</li>
    </ul>
    <hr class="my-4">
    <div class="font-semibold w-full my-4">By Price</div>
    <ul class="pl-3 text-sm">
      <li class="my-2">$0 - $700</li>
      <li class="my-2">$700 - $2500</li>
      <li class="my-2">$2500+</li>
    </ul>
  </div>
  <div class="flex-1">
    <div class="text-3xl px-10 ">
      <span class="font-semibold border-b-2 border-teal-500">Laptops</span>
    </div>
    <div class="flex flex-wrap pl-16 py-16">
      @foreach ($products as $product)
        <a
            class="m-4 p-4 rounded-sm cursor-pointer hover:bg-gray-200 flex flex-col
                items-center justify-center"
            href="{{ route('shop.show', $product->slug) }}"
        >
            <div class="w-32 h-32 my-4 mx-8">
                <img
                    class=""
                    src="{{ asset('images/product.png') }}"
                    alt="product_image"
                >
            </div>
            <div class="flex flex-col items-center">
                <div class="font-bold text-gray-700">{{ $product->name }}</div>
                <div
                    class="text-gray-600 text-sm"
                >{{ $product->presentPrice() }}</div>
            </div>
        </a>
      @endforeach
    </div>
    <!-- PAGINATION -->
    <div class="flex justify-center items-center h-10">
      <div class="flex h-full rounded-lg bg-gray-200 shadow-md">
        <button class="h-full px-2 flex items-center rounded-l hover:bg-gray-300">
          <box-icon name='chevron-left' color="gray"></box-icon>
        </button>
        <span class="px-4 h-full flex items-center font-bold">1</span>
        <button class="h-full px-2 flex items-center rounded-r hover:bg-gray-300">
          <box-icon name='chevron-right' color="gray"></box-icon>
        </button>
      </div>
    </div>
    <!-- PAGINATION ENDING-->
  </div>
</div>
@endsection
