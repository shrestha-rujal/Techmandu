<div class="flex flex-col items-center justify-center py-16 mt-8 bg-gray-100">
  <div class="text-center">
    <div class="text-2xl font-bold">Similar Products</div>
  </div>
  <div class="flex justify-center items-center flex-wrap w-full px-32 py-8">
    @foreach ($recommendedProducts as $product)
    <a
      class="m-4 p-4 border rounded-sm cursor-pointer bg-white hover:bg-gray-200 flex flex-col
        items-center justify-center"
      href="{{ route('shop.show', $product->slug) }}">
      <img
        class="w-32 h-32 m-4 object-contain"
        src="{{ asset('images/'.$product->slug.'.png') }}"
        alt="product_image">
      <div class="flex flex-col items-center">
        <div class="font-bold text-gray-700">{{ $product->name }}</div>
        <div class="text-gray-600 text-sm"
        >{{ $product->presentPrice() }}</div>
      </div>
    </a>
    @endforeach
  </div>
</div>
