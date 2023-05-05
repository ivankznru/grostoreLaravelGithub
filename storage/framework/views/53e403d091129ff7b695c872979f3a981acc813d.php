<div class="product-info-tab bg-white rounded-2 overflow-hidden pt-6 mt-4">
    <ul class="nav nav-tabs border-bottom justify-content-center gap-5 pt-info-tab-nav">
        <li><a href="#description" class="active" data-bs-toggle="tab">Описание</a></li>
        <li><a href="#info" data-bs-toggle="tab">Дополнительная информация</a></li>

    </ul>
    <div class="tab-content">
        <div class="tab-pane fade show active px-4 py-5" id="description">
            <?php if($product->description): ?>
                <?php echo $product->description; ?>

            <?php else: ?>
                <div class="text-dark text-center border py-2">Нет в наличии
                </div>
            <?php endif; ?>
        </div>
        <div class="tab-pane fade px-4 py-5" id="info">
            <h6 class="mb-2">Дополнительная информация:</h6>
            <table class="w-100 product-info-table">
                <?php $__empty_1 = true; $__currentLoopData = generateVariationOptions($product->variation_combinations); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="text-dark fw-semibold"><?php echo e($variation['name']); ?></td>
                        <td>
                            <?php $__currentLoopData = $variation['values']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($value['name']); ?><?php if(!$loop->last): ?>
                                    ,
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td class="text-dark text-center" colspan="2">Нет в наличии
                            </td>
                        </tr>
                    <?php endif; ?>
                </table>
            </div>

        </div>
    </div>
    </div>
<?php /**PATH F:\LARAVEL PROJECT\c-grostore-food-grocery-laravel update 9  1\resources\views/frontend/default/pages/partials/products/description.blade.php ENDPATH**/ ?>