
<?php $__env->startSection('content'); ?>

<div class="mx-5">
    <div class="overflow-x-auto shadow-md sm:rounded-lg mx-12 my-2 border-4 border-indigo-800">
        <table class="text-center w-full text-sm rtl:text-right text-blue-100 dark:text-blue-100 border-separate border-spacing-1">
            <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 dark:text-white">
                <tr class="bg-blue-600 border-b border-blue-400 hover:bg-blue-800">
                    <th scope="row" class="px-6 py-3 text-base font-bold">Image</th>
                    <th scope="row" class="px-6 py-3 text-base font-bold">Product Name</th>
                    <th scope="row" class="px-6 py-3 text-base font-bold">Quantity</th>
                    <th scope="row" class="px-6 py-3 text-base font-bold">Price</th>
                    <th scope="row" class="px-6 py-3 text-base font-bold">Payment Method</th>
                    <th scope="row" class="px-6 py-3 text-base font-bold">Status</th>
                    <th scope="row" class="px-6 py-3 text-base font-bold">Order Date</th>
                    <th scope="row" class="px-6 py-3 text-base font-bold">Actions</th>
                </tr>
            </thead>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="bg-gray-100 border-b border-gray-200 text-gray-900 hover:bg-blue-300">
                    <td scope="row" class="bg-gray-100 px-6 text-base font-medium whitespace-nowrap dark:text-blue-100"><img class="w-32 h-20" src="<?php echo e(asset($order->product['product_image']), false); ?>" alt=""></td>
                    <td scope="row" class="px-6 text-base font-medium whitespace-nowrap dark:text-blue-100"><?php echo e($order->product['product_name'], false); ?></td>
                    <td scope="row" class="px-6 text-base font-medium whitespace-nowrap dark:text-blue-100"><?php echo e($order->quantity, false); ?></td>
                    <td scope="row" class="px-6 text-base font-medium whitespace-nowrap dark:text-blue-100"><?php echo e($order->product['product_price'], false); ?></td>
                    <td scope="row" class="px-6 text-base font-medium whitespace-nowrap dark:text-blue-100"><?php echo e($order->payment_method, false); ?></td>
                    <td scope="row" class="px-6 text-base font-medium whitespace-nowrap dark:text-blue-100"><?php echo e($order->status, false); ?></td>
                    <td scope="row" class="px-6 text-base font-medium whitespace-nowrap dark:text-blue-100"><?php echo e($order->created_at->format('Y/m/d'), false); ?></td>
                    <td scope="row" class="px-6 text-base font-medium whitespace-nowrap dark:text-blue-100">
                        <a href="/seller/add-product">
                            <button class="my-2 mx-auto bg-red-600 px-5 py-2 rounded text-white font-semibold">Delete</button>
                        </a>
                        <a href="/get-product-details/<?php echo e($order->product['id'], false); ?>">
                            <button class="my-2 mx-auto bg-blue-600 px-5 py-2 rounded text-white font-semibold">View Product</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tbody></tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('User.Layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\VS Code\VS Code Projects\Laravel\multi_vendor_ecommerce\resources\views/User/orders.blade.php ENDPATH**/ ?>