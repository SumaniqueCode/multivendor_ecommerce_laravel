<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script>
    $(document).ready(function () {
      $("#cartdesc").hide();

      $("#toggleDropdown").click(function () {
        $("#dropdownMenu").toggle();
      });

      $("#cart").hover(function () {
        $("#cartdesc").toggle();
      });
    });
    $("#cartdesc").hover(function () {
        $("#cartdesc").show();
      });
  </script>
  <title>Computer Components Hub</title>
</head>

<body class="">
  <section class="navbar">
    <?php 
      use App\Models\User\Cart;

      $carts = Cart::where('user_id', auth()->user()->id)->get();
    ?>
    {{-- navbar starts from here --}}
    <div class="bg-gradient-to-l from-purple-700 via-blue-600 to-blue-400">
      <div class="container mx-auto relative flex items-center p-2 text-lg">
        <div class="flex items-center mx-8">
          <a href="/dashboard" class="logo"><img class="w-12" src={{"/Images/System/logo.png"}} alt="Logo" /></a>
        </div>
        <div class="border rounded bg-white">
          <form class="form" action="">
            @csrf
            <div class="flex">
              <input type="text" name="" id="" class="me-4 px-2 text-sm rounded border-1 border-white focus:ring-blue-500 focus:border-blue-500" placeholder="Search Products">
              <a href=""><img src="{{"/Images/System/searchIcon.png"}}" class="w-8 mx-2"></a>
            </div>
          </form>
        </div>
        {{-- middle navbar starts --}}
        <div class="hidden lg:flex space-x-4 mx-4 gap-1">
          <a href="/dashboard"
            class="text-white hover:bg-white hover:text-black hover:font-bold mx-2 p-1 rounded">Home</a>
          <a href="/products" class="text-white hover:bg-white hover:text-black hover:font-bold mx-2 p-1 rounded">All Products</a>
          <a href="/orders" class="text-white hover:bg-white hover:text-black hover:font-bold mx-2 p-1 rounded">My Orders</a>
        </div>
        <div class="hidden lg:flex space-x-4 ms-auto me-10">
          <a href="/profile" class="text-white hover:bg-white hover:text-black hover:font-bold mx-2 my-auto p-1 rounded">Profile</a>
          <a href="/cart" id="cart" class="text-white mx-2 p-1 rounded">
            <span class="bg-red-500 text-sm font-bold px-1 border border-1 border-white rounded-full absolute mini_cart_icon_number">{{$carts->count()}}</span>
            <img src="{{"/Images/System/cartIcon.png"}}" alt="" class="w-12 p-2 mx-2 bg-white border-2 border-white rounded-2xl">
          </a>
          
          {{-- mini cart starts --}}
          <div id="cartdesc" class="cartdesc absolute right-16 top-12 border-4 border-gray-500 rounded-xl bg-white w-1/3">
            <div class="bg-indigo-500 text-white font-bold p-2 flex justify-center border rounded-2xl">
              <h3 class="mx-auto">CART DETAILS</h3>
            </div>
            @if ($carts)
            <table class="table table-dark">
              <tbody>
                @foreach ($carts as $cart)
                  
                <tr>
                  <td rowspan="2">
                    <img class="w-2/3 rounded" src={{asset($cart->product['product_image'])}} alt="">
                  </td>
                  <td>{{$cart->product['product_name']}}</td>
                  <td class="flex gap-1">
                    <button class="px-2 py-1 bg-green-500 text-white font-semibold rounded-lg">add</button> <button class="px-2 py-1 bg-red-500 text-white font-semibold rounded-lg">delete</button>
                  </td>
                </tr>
                <tr class="border-b-2 border-gray-500">
                  <td>Quantity:{{$cart->quantity}}</td>
                  <td colspan="">
                    Rs. {{ $cart->product['product_price'] * $cart->quantity }}
                  </td>
                </tr>

              @endforeach
              <tr class="border-b-2 border-gray-500 border-t-2">
                <td colspan="" class="text-center">Total:</td>
                <td>Quantity: {{$carts->count()}}</td>
                <td>
                  Rs. {{ $carts->sum(function ($cart) {
                        return $cart->product['product_price'] * $cart->quantity;
                      }) }}
                 </td>
              </tr>
            </tbody>
            </table>
            <div class="my-2 mx-4">
              <a href="/checkout"><button class="bg-green-700 border rounded px-2 py-1 text-white text-lg font-bold">CHECK OUT</button></a>
            </div>

            @else
            <p class="font-medium py-6 text-lg">Your Cart is Empty.</p>
                                      
            @endif
          </div>
          {{-- mini cart ends --}}
        </div>
        {{-- middle navbar ends --}}

        {{-- navbar toggle --}}
        <div class="flex items-center lg:hidden relative ms-auto z-50 lg:me-10">
          <a href="/profile" class="text-white hover:bg-white hover:text-black hover:font-bold mx-2 p-1 rounded">Profile</a>
          <button id="toggleDropdown" class="text-white ml-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 17 14" stroke="currentColor">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
          </button>
          <div id="dropdownMenu" class="absolute w-72 top-full right-0 mt-4 bg-blue-600 border border-white p-2 rounded-lg shadow-md">
            <a href="/dashboard" class="block text-white hover:bg-white hover:text-black hover:font-bold p-2 rounded">Home </a>
            <a href="/cart" class="block text-white hover:bg-white hover:text-black hover:font-bold p-2 rounded">Cart</a>
            <a href="/products" class="block border-t-2 text-white hover:bg-white hover:text-black hover:font-bold p-2 rounded">All Products</a>
            <a href="/orders" class="text-white hover:bg-white hover:text-black hover:font-bold mx-2 p-1 rounded">My Orders</a>
          </div>
        </div>
        {{-- navbar toggle ends --}}
      </div>
    </div>
    {{-- navbar ends here --}}
  </section>

  <section class="mainContent">
    @yield('content')
  </section>

  <section class="footer">
    <div class="bg-gradient-to-l from-purple-700 via-blue-600 to-blue-400 py-4 px-4 text-white  grid grid-cols-12">
      <div class="socialIcons col-span-12 sm:col-span-5 md:col-span-4 xl:col-span-3 mt-3">
        <div class="flex justify-center flex-col sm:flex-row">
        <a class="border rounded px-2 py-1 mx-1 hover:bg-blue-600 hover:border-white" href="/">About Us</a>
        <a class="border rounded px-2 py-1 mx-1 hover:bg-blue-600 hover:border-white" href="/">Contact Us</a>
        <a class="border rounded px-2 py-1 mx-1 hover:bg-blue-600 hover:border-white" href="/">FAQ</a>
    </div>
    </div>
      <div class="socialIcons col-span-12 sm:col-span-7 md:col-span-8 xl:col-span-9 sm:ms-auto mt-3">
        <div class="flex justify-center flex-col sm:flex-row">
        <a class="border rounded px-2 py-1 mx-1 hover:bg-gradient-to-r from-yellow-500 via-red-600 to-green-500 hover:border-white" href="www.google.com">Gmail</a>
        <a class="border rounded px-2 py-1 mx-1 hover:bg-blue-600 hover:border-white" href="www.facebook.com">Facebook</a>
        <a class="border rounded px-2 py-1 mx-1 hover:bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500 hover:border-white" href="www.instagram.com">Instagram</a>
        <a class="border rounded px-2 py-1 mx-1 hover:bg-blue-500 hover:border-white" href="www.twitter.com">Twitter</a>
        <a class="border rounded px-2 py-1 mx-1 hover:bg-black hover:border-white" href="www.thread.com">Thred</a>
    </div>
    </div>
      <div class="copyright col-span-12 mx-auto mt-3">
        &copy; Copyright 2021 - 2024 Computer Components hub
      </div>
    </div>
  </section>
</body>
</html>