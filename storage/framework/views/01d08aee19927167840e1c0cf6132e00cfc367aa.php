<?php if(count(generateVariationOptions($product->variation_combinations)) > 0): ?>
    <?php $__currentLoopData = generateVariationOptions($product->variation_combinations); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <input type="hidden" name="variation_id[]" value="<?php echo e($variation['id']); ?>" class="variation-for-cart">
        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">

        <div class="d-flex align-items-center justify-content-between">
            <div class="fs-sm">
                <span class="heading-font fw-medium me-1"><?php echo e($variation['name']); ?>

            </div>
        </div>

        <ul
            class="product-radio-btn mt-1 mb-3 d-flex align-items-center gap-2 <?php if($loop->last): ?> mb-6 <?php endif; ?>">
            <?php if($variation['id'] != 2): ?>
                <?php $__currentLoopData = $variation['values']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <input type="radio" name="variation_value_for_variation_<?php echo e($variation['id']); ?>"
                            value="<?php echo e($value['id']); ?>" id="val-<?php echo e($value['id']); ?>">
                        <label for="val-<?php echo e($value['id']); ?>"><?php echo e($value['name']); ?></label>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <!-- color -> id=2 -->
                <div class="position-relative me-n4">
                    <?php $__currentLoopData = $variation['values']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <input type="radio" name="variation_value_for_variation_<?php echo e($variation['id']); ?>"
                                value="<?php echo e($value['id']); ?>" id="val-<?php echo e($value['id']); ?>">
                            <label for="val-<?php echo e($value['id']); ?>" class="px-1 py-2">
                                <span class="px-3 py-2 rounded" style="background-color:<?php echo e($value['code']); ?>">
                                </span>
                            </label>

                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <!-- color -> id=2 -->
            <?php endif; ?>
        </ul>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH F:\LARAVEL PROJECT\c-grostore-food-grocery-laravel update 9  1\resources\views/frontend/default/pages/partials/products/variations.blade.php ENDPATH**/ ?>