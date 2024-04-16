
<?php $__env->startSection('content'); ?>
    <script>
        $(document).ready(function() {
            $(".statusOptions").on('change', function() {
                let status = $(this).val();
                let orderId = $(this).closest('tr').find(".order_id").val(); 
                let orderStatusElement = $(this).closest('tr').find(".orderStatus");
                $.ajax({
                    url: "/edit-order",
                    method: "POST",
                    data: {
                        _token: '<?php echo e(csrf_token(), false); ?>',
                        'status': status,
                        'id': orderId
                    },
                    success: function(response) {
                        orderStatusElement.text(status);
                    },
                    error: function(error) {
                        console.log(error.responseJSON.message);
                    }
                });
            });
        });
    </script>
    <div class="mx-5">
        <div class="col-span-12">
            <?php if(session('success')): ?>
                <div class="border rounded text-center py-2 bg-green-500 mt-1 text-white">
                    <span><?php echo e(session('success'), false); ?></span>
                </div>
            <?php endif; ?>
        </div>
        <div class="overflow-x-auto shadow-md sm:rounded-lg mx-12 my-2 border-4 border-indigo-800">
            <table
                class="text-center w-full text-sm rtl:text-right text-blue-100 dark:text-blue-100 border-separate border-spacing-1">
                <thead class="text-xs text-white uppercase bg-blue-600 dark:text-white">
                    <tr class="bg-blue-600 border-b border-blue-400 hover:bg-blue-800">
                        <th scope="row" class="px-6 py-1.5 text-base font-bold">Image</th>
                        <th scope="row" class="px-6 py-1.5 text-base font-bold">Name</th>
                        <th scope="row" class="px-6 py-1.5 text-base font-bold">Quantity</th>
                        <th scope="row" class="px-6 py-1.5 text-base font-bold">Price</th>
                        <th scope="row" class="px-6 py-1.5 text-base font-bold">Payment Method</th>
                        <th scope="row" class="px-6 py-1.5 text-base font-bold">Status</th>
                        <th scope="row" class="px-6 py-1.5 text-base font-bold">Order Date</th>
                        <th scope="row" class="px-6 py-1.5 text-base font-bold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="bg-gray-100 border-b border-gray-200 text-gray-900 hover:bg-blue-300">
                            <td scope="row"
                                class="bg-gray-100 px-4 text-base font-medium whitespace-nowrap dark:text-blue-100"><img
                                    class="w-24 h-20" src="<?php echo e(asset(json_decode($order->productVariation['image'])[0]), false); ?>"
                                    alt=""></td>
                            <td scope="row" class="px-6 text-base font-medium whitespace-nowrap dark:text-blue-100">
                                <?php echo e($order->productVariation->product['name'], false); ?></td>
                            <td scope="row" class="px-6 text-base font-medium whitespace-nowrap dark:text-blue-100">
                                <?php echo e($order->quantity, false); ?></td>
                            <td scope="row" class="px-6 text-base font-medium whitespace-nowrap dark:text-blue-100">
                                <?php
                                echo $order->productVariation['price'] * $order->quantity;
                                ?>
                            </td>
                            <td scope="row" class="px-6 text-base font-medium whitespace-nowrap dark:text-blue-100">
                                <?php echo e($order->payment_method, false); ?></td>
                            <td scope="row" class="px-6 text-base font-medium whitespace-nowrap dark:text-blue-100">
                                <p class="orderStatus px-3 py-1 rounded text-white <?php echo e($order->status == 'Pending' ? 'bg-orange-500' : ($order->status == 'Processing' ? 'bg-yellow-500' : ($order->status == 'Shipped' ? 'bg-blue-600' : ($order->status == 'Delivered' ? 'bg-green-600' : 'bg-red-600'))), false); ?>">
                                    <?php echo e($order->status, false); ?> </p>
                            </td>
                            <td scope="row" class="px-6 text-base font-medium whitespace-nowrap dark:text-blue-100">
                                <?php echo e($order->created_at->format('Y/m/d'), false); ?></td>
                            <td scope="row" class="flex px-6 text-base font-medium whitespace-nowrap dark:text-blue-100">
                                <div class="my-auto me-1">
                                    <input type="hidden" class="order_id" value="<?php echo e($order->id, false); ?>">
                                    <select class="statusOptions rounded">
                                        <option value="Pending" class="font-semibold">
                                            Pending
                                        </option>
                                        <option value="Processing" class="font-semibold">
                                            Processing
                                        </option>
                                        <option value="Shipped" class="font-semibold">
                                            Shipped
                                        </option>
                                        <option value="Delivered" class="font-semibold">
                                            Delivered
                                        </option>
                                        <option value="Cancelled" class="font-semibold">
                                            Cancelled
                                        </option>
                                    </select>
                                </div>
                                <a href="/product/get-product-details/<?php echo e($order->productVariation->product['id'], false); ?>">
                                    <button class="my-2 mx-auto bg-blue-600 px-5 py-2 rounded text-white font-semibold">View
                                        Product</button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Visual Studio\VS Code Projects\Personal\Laravel\multi_vendor_ecommerce\resources\views/Seller/orders.blade.php ENDPATH**/ ?>