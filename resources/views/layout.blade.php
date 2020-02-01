<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Beautipur</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  <body>
    <div>
      <!-- navbar -->
      <div class="absolute w-full">
        <div class="flex justify-between px-32 py-10 text-white items-center">
          <a href="{{ route('home') }}" class="text-2xl font-bold">
            <span class="bg-teal-400 rounded-sm p-1">Tech</span>mandu
          </a>
          <div class="flex">
            <a href="{{ route('shop.index') }}"
              class="cursor-pointer hover:bg-teal-500 px-6 py-2 rounded-sm"
            >Shop</a>
            <a href=" {{ route('cart.index')  }}"
              class="cursor-pointer hover:bg-teal-500 px-6 py-2 rounded-sm flex
                items-center">
              Cart
              @if( Cart::instance('default')->count() > 0)
              <span class="bg-orange-500 text-black font-bold rounded-full w-4 h-4 inline-block
                flex items-center justify-center text-xs ml-1">
                {{ Cart::instance('default')->count() }}
              </span>
              @endif
            </a>
            <a class="cursor-pointer hover:bg-teal-500 px-6 py-2 rounded-sm"
            >About</a>
            <a class="cursor-pointer hover:bg-teal-500 px-6 py-2 rounded-sm"
            >Blog</a>
          </div>
        </div>
      </div>
      <!-- navbar ending -->

      @yield('content')

      <!-- Footer -->
      <div class="bg-gray-600 h-64 flex justify-center">
        <div class="w-3/4 flex text-white">
          <div class="flex-1 p-12">
            <div class="text-3xl font-bold my-5">Follow us on</div>
            <div class="flex items-center w-1/3 justify-around">
              <div><box-icon color="white" size="md" type='logo' name='twitter'></box-icon></div>
              <div><box-icon color="white" size="md" name='facebook-circle' type='logo' ></box-icon></div>
              <div><box-icon color="white" size="md" name='linkedin-square' type='logo' ></box-icon></div>
            </div>
          </div>
          <div class="flex-1 p-12 flex justify-center">
            <div>
              <div class="font-bold text-xl my-2">Site Information</div>
              <div>Accessibility</div>
              <div>Terms and conditions</div>
              <div>Privacy notices</div>
              <div>Cookie policy</div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer ending -->
    </div>
    <script type="text/javascript" src="/js/app.js"></script>
  </body>
</html>
