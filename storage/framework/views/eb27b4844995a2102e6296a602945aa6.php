<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  
  <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
  <script>
    $(document).ready(function () {
      $("#cartdesc").hide();

      $("#toggleDropdown").click(function () {
        $("#dropdownMenu").toggle();
      });

      $("#cart").hover(function () {
        $("#cartdesc").show();
      });

      $(".mainContent").hover(function () {
        $("#cartdesc").hide();
      });

          //for updating cart value
    $("#miniCartQuantity").on('input', function () {
      var newQuantity = document.getElementById("miniCartQuantity").value;
      var cartData = document.getElementById("miniCartData").value;
      var cart = JSON.parse(cartData).cart;
      console.log(cart.id);
      console.log(newQuantity);
    // Send AJAX request to update the quantity
    $.ajax({
        url: '/update-cart',
        type: 'post',
        data: {
          _token: $('meta[name="csrf-token"]').attr('content'),
          id: cart.id,
          quantity: newQuantity,
        },
        success: function (response) {
          // Update the UI if needed
          console.log(response);
        },
        error: function (error) {
          console.error(error);
        }
      });
    });
    
    });
  </script>
  
  <title>Computer Components Hub</title>
</head>

<body class="flex flex-col min-h-screen">
  <?php 
    use App\Models\User\Cart;
    $carts = Cart::where('user_id', auth()->user()->id)->get();
  ?>
  <?php if(auth()->user()->role=="User"): ?>
  <section class="navbar">
    
    <div class="bg-gradient-to-l from-purple-700 via-blue-600 to-blue-400">
      <div class="container mx-auto relative flex items-center p-2 text-lg">
        <div class="flex items-center mx-8">
          <a href="/dashboard" class="logo"><img class="w-12" src=<?php echo e("/Images/System/logo.png", false); ?> alt="Logo" /></a>
        </div>
        <div class="border rounded bg-white">
          <form class="form" action="">
            <?php echo csrf_field(); ?>
            <div class="flex">
              <input type="text" name="" id="" class="me-4 px-2 text-sm rounded border-1 border-white focus:ring-blue-500 focus:border-blue-500" placeholder="Search Products">
              <a href=""><img src="<?php echo e("/Images/System/searchIcon.png", false); ?>" class="w-8 mx-2"></a>
            </div>
          </form>
        </div>
        
        <div class="hidden  lg:flex space-x-4 mx-4 gap-1">
          <a href="/dashboard"
            class="text-white hover:bg-white hover:text-black hover:font-bold mx-2 p-1 rounded">Home</a>
          <a href="/products" class="text-white hover:bg-white hover:text-black hover:font-bold mx-2 p-1 rounded">All Products</a>
          <a href="/orders" class="text-white hover:bg-white hover:text-black hover:font-bold mx-2 p-1 rounded">My Orders</a>
        </div>
        <div class="hidden lg:flex space-x-4 ms-auto me-10">
          <a href="/cart" id="cart" class="text-white mx-2 p-1 rounded">
            <span class="bg-red-500 text-sm font-bold px-1 border border-1 border-white rounded-full absolute mini_cart_icon_number"><?php echo e($carts->sum('quantity'), false); ?></span>
            <img src="<?php echo e("/Images/System/cartIcon.png", false); ?>" alt="" class="w-12 p-2 mx-2 bg-white border-2 border-white rounded-2xl">
          </a>
          <a href="/profile" class="text-white hover:bg-white hover:text-black hover:font-bold mx-2 my-auto p-1 rounded">Profile</a>
          
          <div id="cartdesc" class="cartdesc absolute right-16 top-12 border-4 border-gray-500 rounded-xl bg-white w-1/3">
            <div class="bg-indigo-500 text-white font-bold p-2 flex justify-center border rounded-2xl">
              <h3 class="mx-auto">CART DETAILS</h3>
            </div>
            <?php if($carts->count()>0): ?>
            <table class="table table-dark w-full">
              <tbody class="">
                <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td rowspan="2" class="">
                    <img class="rounded my-auto h-20 w-24 ms-2" src="<?php echo e(asset(json_decode($cart->productVariation['image'])[0]), false); ?>" alt="">
                  </td>
                  <td class="w-28"><?php echo e($cart->productVariation->product['product_name'], false); ?></td>
                  <td class="flex gap-1 w-48">
                    <input type="hidden" id="miniCartData" name="cart_id" value="<?php echo e(json_encode(['cart' => $cart, 'product' => $cart->product]), false); ?>" class="border rounded">
                    <label for="" class="my-auto mx-1">Quantity: </label>
                      <input class="w-36 pl-2 border rounded-xl" type="number" id="miniCartQuantity" name="quantity" value="<?php echo e($cart->quantity, false); ?>">
                  </td>
                </tr>
                <tr class="border-b-2 border-gray-500">
                  <td colspan="">
                    Rs. <?php echo e($cart->productVariation['price'] * $cart->quantity, false); ?>

                  </td>
                  <td class="text-right">
                    <a class="me-2 my-auto" href="/delete-cart/<?php echo e($cart->id, false); ?>"><button class="px-5 py-1 bg-red-500 text-white font-semibold rounded-lg">Remove Cart</button></a>
                  </td>
                </tr>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <tr class="border-b-2 border-gray-500 border-t-2">
                <td colspan="" class="text-center">Total</td>
                <td>
                  Rs. <?php echo e($carts->sum(function ($cart) {
                        return $cart->productVariation['price'] * $cart->quantity;
                      }), false); ?>

                 </td>
                 <td class="text-end pe-2">
                  Quantity: <?php echo e($carts->count(), false); ?>

               </td>
              </tr>
            </tbody>
            </table>
            <div class="my-2 mx-4">
              <a href="/cart"><button class="bg-green-700 border rounded px-2 py-1 text-white text-lg font-bold">CHECK OUT</button></a>
            </div>
            <?php else: ?>
            <p class="font-medium py-6 text-lg text-center">Your Cart is Empty.</p>
                                      
            <?php endif; ?>
          </div>
          
        </div>
        

        
        <div class="flex items-center lg:hidden relative ms-auto z-50 lg:me-10">
          <a href="/profile" class="text-white hover:bg-white hover:text-black hover:font-bold mx-2 p-1 rounded">Profile</a>
          <button id="toggleDropdown" class="text-white ml-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 17 14" stroke="currentColor">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
          </button>
          <div id="dropdownMenu" class="absolute w-72 top-full right-0 mt-4 bg-blue-600 border border-white p-2 rounded-lg shadow-md">
            <a href="/dashboard" class="block text-white hover:bg-white hover:text-black hover:font-bold p-2 rounded">Home </a>
            <a href="/cart" class="block border-t-2 text-white hover:bg-white hover:text-black hover:font-bold p-2 rounded">Cart</a>
            <a href="/products" class="block border-t-2 text-white hover:bg-white hover:text-black hover:font-bold p-2 rounded">All Products</a>
            <a href="/orders" class="block border-t-2 text-white hover:bg-white hover:text-black hover:font-bold p-2 rounded">My Orders</a>
          </div>
        </div>
        
      </div>
    </div>
    
  </section>
  <?php else: ?>
  <section class="navbar">
    
    <div class="bg-gradient-to-l from-purple-700 via-blue-600 to-blue-400">
      <div class="container mx-auto relative flex items-center p-2 text-lg">
        <div class="flex items-center mx-8">
          <a href="/seller" class="logo"><img class="w-12" src=<?php echo e("/Images/System/logo.png", false); ?> alt="Logo" /></a>
        </div>
        <div class="border rounded bg-white">
          <form class="form" action="">
            <?php echo csrf_field(); ?>
            <div class="flex">
              <input type="text" name="" id="" class="me-4 px-2 text-sm rounded border-1 border-white focus:ring-blue-500 focus:border-blue-500" placeholder="Search Products">
              <a href=""><img src="<?php echo e("/Images/System/searchIcon.png", false); ?>" class="w-8 mx-2"></a>
            </div>
          </form>
        </div>
        
        <div class="hidden lg:flex space-x-4 mx-4 gap-1">
          <a href="/seller"
            class="text-white hover:bg-white hover:text-black hover:font-bold mx-2 p-1 rounded">Home</a>
          <a href="/seller/products" class="text-white hover:bg-white hover:text-black hover:font-bold mx-2 p-1 rounded">Products</a>
          <a href="/seller/orders" class="text-white hover:bg-white hover:text-black hover:font-bold mx-2 p-1 rounded">Orders</a>
        </div>
        <div class="hidden lg:flex space-x-4 ms-auto me-10">
          <a href="/seller/profile" class="text-white hover:bg-white hover:text-black hover:font-bold mx-2 my-auto p-1 rounded">Profile</a>
        </div>
        

        
        <div class="flex items-center lg:hidden relative ms-auto z-50 lg:me-10">
          <a href="/seller/profile" class="text-white hover:bg-white hover:text-black hover:font-bold mx-2 p-1 rounded">Profile</a>
          <button id="toggleDropdown" class="text-white ml-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 17 14" stroke="currentColor">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
          </button>
          <div id="dropdownMenu" class="absolute w-72 top-full right-0 mt-4 bg-blue-600 border border-white p-2 rounded-lg shadow-md">
            <a href="/seller/dashboard" class="block text-white hover:bg-white hover:text-black hover:font-bold p-2 rounded">Home </a>
            <a href="/seller/products" class="block border-t-2 text-white hover:bg-white hover:text-black hover:font-bold p-2 rounded">Products</a>
            <a href="/seller/orders" class="block border-t-2 text-white hover:bg-white hover:text-black hover:font-bold p-2 rounded">Orders</a>
          </div>
        </div>
        
      </div>
    </div>
    
  </section>
  <?php endif; ?>

  <section class="mainContent">
    <?php if(session('success')): ?>
    <div id="notification" class="border rounded text-center py-2 bg-green-500 mt-1 text-white w-max absolute right-0.5 top-16 px-5 py-2 transition ease-in-out duration-300">
      <span><?php echo e(session('success'), false); ?></span>
    </div>
    <?php endif; ?>
    <?php if(session('error')): ?>
      <div id="notification" class="border rounded text-center py-2 bg-red-500 mt-1 text-white w-max absolute right-0.5 top-16 px-5 py-2 transition ease-in-out duration-300">
          <span><?php echo e(session('error'), false); ?></span>
      </div>
    <?php endif; ?>

    <script>
      setTimeout(() => {
        document.getElementById('notification').classList.add('hidden');
      }, 4000);
    </script>
    <?php echo $__env->yieldContent('content'); ?>
  </section>

  <section class="footer mt-auto">
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
        <a class="border rounded px-2 py-1 mx-1 hover:bg-black hover:border-white" href="www.thread.com">Thread</a>
    </div>
    </div>
      <div class="copyright col-span-12 mx-auto mt-3">
        &copy; Copyright 2021 - 2024 Computer Components hub
      </div>
    </div>
  </section>
</body>
</html><?php /**PATH D:\Visual Studio\VS Code Projects\Personal\Laravel\multi_vendor_ecommerce\resources\views/User/Layout/layout.blade.php ENDPATH**/ ?>