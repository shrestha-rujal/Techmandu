@extends('layout')

@section('extra-css')
<script src="https://js.stripe.com/v3"></script>
@endsection

@section('content')
<!-- Header -->
<div class="height-15 header-background bg-cover bg-center">
  <div class="h-full flex w-full opacity-slight items-end pl-48">
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

@if(session()->has('SUCCESS_MESSAGE'))
<div class="flex justify-center mt-3">
  <div class="notification bg-green-500 w-3/4">
    {{ session()->get('SUCCESS_MESSAGE') }}
  </div>
</div>
@endif

@if(session()->has('ERROR_MESSAGE'))
<div class="flex justify-center mt-3">
  <div class="notification bg-red-500 w-3/4">
    {{ session()->get('ERROR_MESSAGE') }}
  </div>
</div>
@endif

@if(count($errors) > 0)
<div class="flex flex-col items-center mt-3">
  @foreach ($errors->all() as $error)
  <div class="notification bg-red-500 w-3/4">
    {!! $error !!}
  </div>
  @endforeach
</div>
@endif

<div class="flex container mx-auto py-16">
<form class="flex-1"  id="payment-form" method="POST" action="{{ route('checkout.store') }}">
  {{ csrf_field() }}
    <div>
      <div class="my-4 font-semibold text-lg">Billing Details</div>
      <div class="flex">
        <input type="email" placeholder="Email Address" name="email" value="{{ old('email') }}" class="input-field" required>
        <input type="text" placeholder="Name" name="name" value="{{ old('name') }}" class="input-field" required>
      </div>
      <div class="flex">
        <input type="text" placeholder="Address" id="address" name="address" value="{{ old('address') }}" class="input-field" required>
        <input type="text" placeholder="City" id="city" name="city" value="{{ old('city') }}" class="input-field" required>
      </div>
      <div class="flex">
        <input type="text" placeholder="Province" name="province" id="state" value="{{ old('province') }}" class="input-field" required>
        <input type="text" placeholder="Postal code" id="postalCode" name="postalCode" value="{{ old('postalCode') }}" class="input-field" required>
        <input type="text" placeholder="Phone" name="phone" value="{{ old('phone') }}" class="input-field" required>
      </div>
    </div>
    <div class="my-10">
      <div class="my-4 font-semibold text-lg">Payment Details</div>
      <input type="text" placeholder="Name on Card" id="name_on_card" name="name_on_card"
        value="{{ old('name_on_card') }}" class="input-field" required>
      <div id="card-element">
      </div>
      <div id="card-errors" role="alert"></div>
    </div>
    <button type="submit" id="complete-order"
      class="bg-green-500 text-white hover:bg-green-400 w-full font-bold py-2 rounded">
      Complete Order
    </button>
  </form>
  <div class="w-2/5 p-8">
    <div class="font-bold text-lg mb-1">Your Order</div>
    <div class="border border-gray-400 rounded-sm p-3">
      <!-- PRODUCT -->
      @foreach( Cart::content() as $item)
      <div class="flex items-center justify-around h-20 bg-gray-100 py-2 my-1">
        <a class="h-full border rounded flex items-center justify-center p-1"
          href="{{ route('shop.show', $item->model->slug) }}">
          <img src="{{ asset('images/'.$item->model->slug.'.png') }}" class="object-contain w-16 h-full">
        </a>
        <div class="font-bold">
          <a href="{{ route('shop.show', $item->model->slug) }}">
            {{ $item->model->name }}
          </a>
          <div class="text-xs text-gray-600">{{ $item->model->details }}</div>
          <div class="text-xs text-gray-900">{{ presentPrice($item->model->price) }}</div>
        </div>
        <div class="py-1 px-3 border border-gray-500 rounded-sm">
          {{ $item->qty }}
        </div>
      </div>
      @endforeach
      <!-- PRODUCT ending -->
    </div>
    <div class="w-full flex justify-center py-5 my-4 bg-gray-200">
      <table class="w-3/4 rounded">
        <tr>
          <td>Subtotal</td>
          <td>{{ presentPrice(Cart::subtotal()) }}</td>
        </tr>
        @if(session()->has('coupon'))
        <tr class="border-t border-gray-400">
          <td class="py-1 flex items-center pt-2">
            Discount
            <form action="{{ route('coupon.destroy') }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('delete') }}
              <button type="submit" }}"
                class="text-red-500 shadow-sm border border-red-300 px-2 ml-2 rounded-full text-xs
                flex items-center hover:bg-red-200">
                <span><box-icon name='x' color="red" size="xs"></box-icon></span>
                <span class="ml-1">{{ session()->get('coupon')['name'] }}</span>
              </button>
            </form>
          </td>
          <td class="py-1">-{{ presentPrice($discount) }}</td>
        </tr>
        <tr class="border-b border-gray-400">
          <td>Discounted subtotal</td>
          <td>{{ presentPrice($newSubtotal) }}</td>
        </tr>
        @endif
        <tr>
          <td class="py-1">Tax (13%)</td>
          <td class="py-1">{{ presentPrice($newTax) }}</td>
        </tr>
        <tr class="font-bold text-black text-lg">
          <td>Total</td>
          <td>{{ presentPrice($newTotal) }}</td>
        </tr>
      </table>
    </div>
    <!-- CODE INPUT -->
    @if(!session()->has('coupon'))
    <form class="m-6" action="{{ route('coupon.store') }}" method="POST">
      {{ csrf_field() }}
      <label for="codeInput" class="font-bold">Have a coupon?</label>
      <div class="flex border h-12 rounded-sm overflow-hidden">
        <input class="flex-1 px-3" type="text" id="codeInput" name="code" placeholder="Enter discount code">
        <button class="bg-gray-500 text-white font-bold px-4 hover:bg-gray-600" type="submit">Apply</button>
      </div>
    </form>
    @endif
    <!-- CODE INPUT ending-->
  </div>
</div>
@endsection

@section('extra-js')
<script>
  (function() {
    // Create a Stripe client.
    var stripe = Stripe('pk_test_e0nuQ60Y39XDAWiIC2khmrnp005MRcJwCZ');

    // Create an instance of Elements.
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
      base: {
        color: '#32325d',
        fontSmoothing: 'antialiased',
        '::placeholder': {
          color: '#aab7c4'
        }
      },
      invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
      }
    };

    // Create an instance of the card Element.
    var card = elements.create('card', {
      style: style,
      hidePostalCode: true,
    });

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');

    // Handle real-time validation errors from the card Element.
    card.addEventListener('change', function(event) {
      var displayError = document.getElementById('card-errors');
      if (event.error) {
        displayError.textContent = event.error.message;
      } else {
        displayError.textContent = '';
      }
    });

    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
      event.preventDefault();

      document.getElementById('complete-order').disabled = true;

      var options = {
        name: document.getElementById('name_on_card').value,
        address_line1: document.getElementById('address').value,
        address_city: document.getElementById('city').value,
        address_state: document.getElementById('state').value,
        address_zip: document.getElementById('postalCode').value
      };

      stripe.createToken(card, options).then(function(result) {
        if (result.error) {
          // Inform the user if there was an error.
          var errorElement = document.getElementById('card-errors');
          errorElement.textContent = result.error.message;
          document.getElementById('complete-order').disabled=true;
        } else {
          // Send the token to your server.
          stripeTokenHandler(result.token);
        }
      });
    });

    // Submit the form with the token ID.
    function stripeTokenHandler(token) {
      // Insert the token ID into the form so it gets submitted to the server
      var form = document.getElementById('payment-form');
      var hiddenInput = document.createElement('input');
      hiddenInput.setAttribute('type', 'hidden');
      hiddenInput.setAttribute('name', 'stripeToken');
      hiddenInput.setAttribute('value', token.id);
      form.appendChild(hiddenInput);

      // Submit the form
      form.submit();
    }
  })();
</script>
@endsection
