<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script>
    $(document).ready(function () {
      $("#toggleDropdown").click(function () {
        $("#dropdownMenu").toggle();
      });
    });
  </script>
  <title>Computer Components Hub</title>
</head>

<body class="">
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

  <section class="mainContent">
    <?php echo $__env->yieldContent('content'); ?>
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
        <a class="border rounded px-2 py-1 mx-1 hover:bg-black hover:border-white" href="www.thread.com">Thread</a>
    </div>
    </div>
      <div class="copyright col-span-12 mx-auto mt-3">
        &copy; Copyright 2021 - 2024 Computer Components hub
      </div>
    </div>
  </section>
</body>
</html><?php /**PATH D:\VS Code\VS Code Projects\Laravel\multi_vendor_ecommerce\resources\views/Seller/Layout/layout.blade.php ENDPATH**/ ?>