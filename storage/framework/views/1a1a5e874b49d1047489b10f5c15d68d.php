<?php $__env->startSection('content'); ?>
    <section class="container">
        <div class="row">
            
            <div class="col-md-4 col-12 companyBanner mb-3">
                <img class="w-75 border rounded" src=<?php echo e("/Images/System/companyBanner.jpg", false); ?> alt="">
            </div>
            <div class="col-md-7 col-12 mb-3">
                <h1 class="">Introduction</h1>
                <p>Computer Component hub is an ecommerce website that provides platform for buying or selling
                    of computer components in very reasonable price. This is free to use platform and anyone can we it.
                    Our main motive is to decrease the huge margin in price of components taken by different
                    retailers and mediators.
                </p>
                <a href="/moreIntro" class="text-danger fw-bold my-auto">Read more...</a>
            </div>

            <div class="col-md-7 col-12 whyUs">
                <h1>Why choose Us</h1>
                <ul>
                    <li>We protect the people who are less aware about the genuine products and gets scammed easily.</li>
                    <li>Provide platforms to buy or sell computer components easily.</li>
                    <li>Provide actual price tagging of components.</li>
                    <li>Provide easily accessible marketplace for users and sellers.</li>
                    <li>Provide components to users as cheap as possible.</li>
                    <li>Decrease the mediators between Manufacturers and users in market.</li>
                </ul>
            </div>
            <div class="whyUsImage col-md-4 col-12 mx-auto mb-3">
                <img class="w-75 border rounded" src=<?php echo e("/Images/System/whyUs.jpg", false); ?> alt="">
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Visual Studio\VS Code Projects\Personal\Laravel\multi_vendor_ecommerce\resources\views/welcome.blade.php ENDPATH**/ ?>