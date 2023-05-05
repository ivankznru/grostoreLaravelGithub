<?php $__empty_1 = true; $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <li class="d-flex align-items-center pb-3 <?php if(!$loop->first): ?> pt-3 <?php endif; ?>">
        <div class="thumb-wrapper">
            <a href="<?php echo e(route('products.show', $cart->product_variation->product->slug)); ?>"><img
                    src="<?php echo e(uploadedAsset($cart->product_variation->product->thumbnail_image)); ?>" alt="products"
                    class="img-fluid rounded-circle"></a>
        </div>
        <div class="items-content ms-3">
            <a href="<?php echo e(route('products.show', $cart->product_variation->product->slug)); ?>">
                <h6 class="mb-0"><?php echo e($cart->product_variation->product->collectLocalization('name')); ?></h6>
            </a>

            <?php $__currentLoopData = generateVariationOptions($cart->product_variation->combinations); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class="fs-xs text-muted">
                    
                    <?php $__currentLoopData = $variation['values']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($value['name']); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!$loop->last): ?>
                        ,
                    <?php endif; ?>
                </span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="products_meta mt-1 d-flex align-items-center">
                <div>
                    <span
                        class="price text-primary fw-semibold"><?php echo e(formatPrice(variationDiscountedPrice($cart->product_variation->product, $cart->product_variation))); ?></span>
                    <span class="count fs-semibold">x <?php echo e($cart->qty); ?></span>
                </div>
                <button class="remove_cart_btn ms-2" onclick="handleCartItem('delete', <?php echo e($cart->id); ?>)"><i
                        class="fa-solid fa-trash-can"></i></button>
            </div>
        </div>
    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <li>
        <img src="<?php echo e(staticAsset('frontend/default/assets/img/empty-cart.svg')); ?>" alt="" srcset=""
            class="img-fluid">
    </li>
<?php endif; ?>
<?php /**PATH F:\LARAVEL PROJECT\cgrostorefoodgrocerylaravel 92\resources\views/frontend/default/pages/partials/carts/cart-navbar.blade.php ENDPATH**/ ?>