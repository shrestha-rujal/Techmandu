@extends('layout')
@section('content')
<!-- Header -->
<div class="height-40 header-background parallax">
  <div class="h-full flex justify-center w-full opacity-slight">
    <div class="w-3/4 h-full flex mt-12">
      <div class="flex-1 flex flex-col items-start justify-center text-white p-10">
        <div class="text-5xl font-bold py-3">Tech Portal</div>
        <div class="text-lg">Nepal's #1 genuine portal for latest electronics and
          tech for unbelievably low prices.</div>
        <div class="flex justify-center m-4 my-12 w-full">
          <div class="button-outline hover:bg-gray-800 m-1">Blog Post</div>
          <div class="button-outline hover:bg-gray-800 m-1">Github</div>
        </div>
      </div>
      <div class="flex-1 flex items-center justify-center">
        <div class="px-2 py-6 rounded-lg">
          <img src="https://cdn11.bigcommerce.com/s-xt5en0q8kf/content/pages/refurbished-apple-products/images/device-group.png"
              class="w-full h-auto">
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Header Ending-->

<!-- Product Listing -->
<div class="flex flex-col items-center justify-center my-20">
  <div class="text-center">
    <div class="text-2xl font-bold m-6">Laravel Ecommerce</div>
    <div class="m-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Id nesciunt alias dolorum qui rerum iure, doloribus adipisci soluta nemo exercitationem!</div>
    <div class="flex flex justify-center mt-10">
      <div class="button-outline hover:bg-gray-400">Featured</div>
      <div class="button-outline hover:bg-gray-400">On sale</div>
    </div>
  </div>
  <div class="flex justify-center items-center flex-wrap w-full px-48 py-16">
    @foreach ($products as $product)
    <a
      class="m-4 p-4 border rounded-sm cursor-pointer hover:bg-gray-200 flex flex-col
        items-center justify-center"
      href="{{ route('shop.show', $product->slug) }}">
      <div class="my-4 mx-8">
        <img
          class="object-contain w-32 h-32"
          src="{{ asset('images/'.$product->slug.'.png') }}"
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
  <a href="{{ route('shop.index') }}"
    class="button-outline hover:bg-gray-400">
    View more products
  </a>
</div>
<!-- Product Listing Ending -->
@endsection
